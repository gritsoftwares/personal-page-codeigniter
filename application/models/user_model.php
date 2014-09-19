<?php

/**
 * Class User_model
 * Model for user personal information and authentication
 */
class User_model extends MY_Model {

    protected $_table_name = 'user';

    // form validation rules for logging in
    public $rules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );

    // form validation rules for editing user info
    public $rules_admin = array(
        'avatar' => array(
            'field' => 'avatar',
            'label' => 'Avatar',
            'rules' => 'callback_personal_upload_handle[avatar]'
        ),
        'first_name' => array(
            'field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'last_name' => array(
            'field' => 'last_name',
            'label' => 'Last Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'country' => array(
            'field' => 'country',
            'label' => 'Country',
            'rules' => 'trim|required|xss_clean'
        ),
        'company' => array(
            'field' => 'company',
            'label' => 'Company',
            'rules' => 'trim|required|xss_clean'
        ),
        'occupation' => array(
            'field' => 'occupation',
            'label' => 'Occupation',
            'rules' => 'trim|required|xss_clean'
        ),
        'phone' => array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'trim|xss_clean'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'old_password' => array(
            'field' => 'old_password',
            'label' => 'Old Password',
            'rules' => 'trim'
        ),
        'new_password' => array(
            'field' => 'new_password',
            'label' => 'New Password',
            'rules' => 'trim|matches[confirm_password]|callback_requires[old_password]'
        ),
        'confirm_password' => array(
            'field' => 'confirm_password',
            'label' => 'Confirm password',
            'rules' => 'trim|matches[new_password]'
        )
    );



    public function __construct()
    {
        parent::__construct();
    }


    /**
         * Log in user method
         * Uses password_verify() function, that works only in >=PHP5.5.0
         * Sets a session, that is stored in DB
         * @param string $email Email
         * @param string $password Password
         * @return bool
         */
    public function login($email, $password)
    {
        $user = $this->get_by(array(
            'email' => $email
        ), TRUE);

        if (!empty($user) && password_verify($password, $user->password))
        {
            // Log in user
            $data = array(
                'name' => $user->first_name.' '.$user->last_name,
                'email' => $user->email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data);
            return TRUE;
        }
        return FALSE;
    }

    /**
         * Log out method
         * Destroys user session
         */
    public function logout()
    {
        $this->session->sess_destroy();
    }

    /**
         * Checks if user is logged in
         * @return bool
         */
    public function logged_in()
    {
        return (bool) $this->session->userdata('logged_in');
    }

    /**
         * Wrapper-method for password_hash() function.
         * Works in >= PHP5.5.0
         * Refer to documentation for further information.
         * @link http://php.net/password_hash
         * @param string $string Password
         * @param array $user_opt User options. You should pass custom 'cost' and 'salt' values (optional)
         * @return string Password Hash
         */
    public function hash($string, $user_opt = array())
    {
        $default_opt = [
            'cost' => 12,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $options = array_merge($default_opt, $user_opt);

        return password_hash($string, PASSWORD_BCRYPT, $options);
    }

    /**
         * Save method
         * If new password is specified, generates a hash and inserts in to $_POST array.
         * Deletes unnecessary values
         * @param null|int $id User ID
         * @return int User ID
         */
    public function save($id = NULL)
    {
        $new_pass = $this->input->post('new_password');
        if (!empty($new_pass))
        {
            // generate hash
            $hash = $this->hash($new_pass);
            $_POST['password'] = $hash;
        }

        // delete password fields
        unset($_POST['old_password']);
        unset($_POST['new_password']);
        unset($_POST['confirm_password']);

        return parent::save($id);
    }

    /**
         * Deletes user avatar
         * @param int $id User ID
         * @return bool
         */
    public function delimg($id)
    {
        if ($id == NULL)
        {
            return FALSE;
        }
        $this->db->where($this->_pk, $id);
        $this->db->update($this->_table_name, array('avatar' => 0));

        unlink(UPLOAD_DIR_PERSONAL.'personal.jpg');
        return TRUE;
    }
} 