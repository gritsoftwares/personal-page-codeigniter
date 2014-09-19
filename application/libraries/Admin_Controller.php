<?php

/**
 * Class Admin_Controller
 * Parent controller for admin panel controllers
 */
class Admin_Controller extends MY_Controller {

    // Backend views folder
    protected $_folder = 'admin';



    public function __construct()
    {
        parent::__construct();

        // Load models
        $this->load->model('user_model');

        // Check Authentication
        $no_redirect = array(
            'panel/login'
        );
        if ($this->user_model->logged_in() == FALSE && !in_array(uri_string(), $no_redirect))
        {
            redirect('panel/login');
        }

        // Load admin helpers, libs, models
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Page title
        $this->data['title'] = 'Detail Admin | ';
    }

    /**
         * Custom form validation callback function
         * checks if entered value is unique for specified Table.Field
         * @param mixed $value Input value
         * @param string $string Table.Field
         * @return bool
         */
    public function unique($value, $string)
    {
        list($table, $field) = explode('.', $string);

        $this->db->select('id');
        if (empty($value))
        {
            $this->db->where("(length($field) = 0 or $field is null)", NULL, FALSE);
        }
        else
        {
            $this->db->where($field, $value);
        }
        if (!empty($this->input->post('id')))
        {
            $this->db->where('id !=', $this->input->post('id'));
        }
        $row = $this->db->get($table)->row();
        if (count($row))
        {
            $this->form_validation->set_message('unique', 'The %s field must be unique.');
            return FALSE;
        }
        return TRUE;
    }

    /**
         * Custom form validation callback function
         * Validates and uploads portfolio item thumbnail
         * @param mixed $value
         * @param string $string Form field name
         * @return bool
         */
    public function portfolio_upload_handle($value, $string = 'img')
    {
        if (!empty($_FILES[$string]['name']))
        {
            $config = array(
                'upload_path' => UPLOAD_PATH_PORTFOLIO,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048',
                'overwrite' => TRUE,
                'file_name' => TMP_IMG
            );
            $this->load->library('upload', $config);

            if (isset($_FILES[$string]['error']) && $_FILES[$string]['error'] != 0)
            {
                $this->form_validation->set_message('portfolio_upload_handle', 'There was an error while uploading file. Please try again');
                return FALSE;
            }
            elseif(!$this->upload->do_upload($string))
            {
                $this->form_validation->set_message('portfolio_upload_handle', $this->upload->display_errors());
                return FALSE;
            }
            else
            {
                $_POST[$string] = 1;
                return TRUE;
            }
        }
        return TRUE;
    }

    /**
         * Custom form validation callback function
         * Validates and uploads personal image
         * @param mixed $value
         * @param string $string Form field name
         * @return bool
         */
    public function personal_upload_handle($value, $string = 'avatar')
    {
        if (!empty($_FILES[$string]['name']))
        {
            $config = array(
                'upload_path' => UPLOAD_PATH_PERSONAL,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048',
                'overwrite' => TRUE,
                'file_name' => TMP_IMG
            );
            $this->load->library('upload', $config);

            if (isset($_FILES[$string]['error']) && $_FILES[$string]['error'] != 0)
            {
                $this->form_validation->set_message('personal_upload_handle', 'There was an error while uploading file. Please try again');
                return FALSE;
            }
            elseif(!$this->upload->do_upload($string))
            {
                $this->form_validation->set_message('personal_upload_handle', $this->upload->display_errors());
                return FALSE;
            }
            else
            {
                $this->load->library('image_lib');

                // resize small image to width=192px
                $img = 'personal.jpg';
                $config = array(
                    'image_library' => 'ImageMagick',
                    'library_path' => '/usr/bin',
                    'source_image' => TMP_FULL_PERSONAL,
                    'overwrite' => TRUE,
                    'maintain_ratio' => TRUE,
                    'width' => 192,
                    'new_image' => $img
                );
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();

                // crop small image if its height > 192px
                $img = UPLOAD_DIR_PERSONAL.$img;
                $size = getimagesize($img);
                $height = $size[1];
                if ($height > 192)
                {
                    $config = array(
                        'image_library' => 'ImageMagick',
                        'library_path' => '/usr/bin',
                        'source_image' => $img,
                        'maintain_ratio' => FALSE,
                        'height' => 192
                    );
                    $this->image_lib->initialize($config);
                    $this->image_lib->crop();
                    $this->image_lib->clear();
                }

                // delete tmp img
                unlink(TMP_FULL_PERSONAL);

                $_POST[$string] = 1;
                return TRUE;
            }
        }
        return TRUE;
    }

    /**
         * Custom form validation callback function
         * Used when adding/editing user websites
         * Checks user website account for uniqueness
         * Otherwise you can't add the same account twice
         * @param mixed $value
         * @param string $string Table.website.account
         * @return bool
         */
    public function combpk($value, $string)
    {
        list($table, $field1, $field2) = explode('.', $string);
        $val1 = $this->input->post($field1);
        $val2 = $this->input->post($field2);

        $this->db->where($field1, $val1);
        $this->db->where($field2, $val2);
        if (!empty($this->input->post('id')))
        {
            $this->db->where('id !=', $this->input->post('id'));
        }
        $result = $this->db->get($table);
        if ($result->num_rows() > 0)
        {
            $this->form_validation->set_message('combpk', 'Account field must be unique for the same website');
            return FALSE;
        }
        return TRUE;
    }

    /**
         * Custom form validation callback function
         * Used when changing user password
         * If you specify new password, old one is required
         * @param string $value New Password
         * @param string $string Old Password Form Field Name
         * @return bool
         */
    public function requires($value, $string)
    {
        /*
                 * empty new pass - true
                 * !empty new pass:
                 * - empty old pass - false
                 * - !empty old pass:
                 * -- old pass bad - false
                 * -- old pass good - true
                 */
        if (!empty($value))
        {
            $old_pass = $this->input->post($string);
            if(empty($old_pass))
            {
                $this->form_validation->set_message('requires', 'In order to change your password you have to provide an old one.');
                return FALSE;
            }

            $user = $this->user_model->get(1);
            if (!password_verify($old_pass, $user->password))
            {
                $this->form_validation->set_message('requires', 'Old password is wrong.');
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
         * To load a page view you have to specify view and optional layout file name
         * @param null|string $view View file
         * @param string $layout Layout file
         */
    public function load_view($view = null, $layout = 'main')
    {
        $layout = $this->_folder.'/layouts/'.$layout;
        !$view || ($this->data['view'] = $this->_folder.'/'.$view);

        $this->load->view($layout, $this->data);
    }
} 