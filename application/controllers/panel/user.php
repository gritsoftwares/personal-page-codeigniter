<?php

/**
 * Class User
 * Here you can edit your personal information, like
 * avatar, name, occupation, email, password
 */
class User extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Personal Information';
    }

    /**
         * Method for editing user information
         */
    public function index()
    {
        $this->data['user'] = $this->user_model->get(1);

        // Set up the form
        $rules_admin = $this->user_model->rules_admin;
        $this->form_validation->set_rules($rules_admin);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->user_model->save(1);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/user');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/compiled/new-user.css'
            );

            // Load View
            $this->load_view('user/edit');
        }
    }

    /**
         *  Login a user and redirect him to dashboard
         */
    public function login()
    {
        // Redirect if already logged in
        if ($this->user_model->logged_in() == TRUE)
        {
            redirect('panel');
        }

        // Validate the form
        $this->form_validation->set_rules($this->user_model->rules);
        if ($this->form_validation->run() == TRUE)
        {
            // Check user email and password
            if ($this->user_model->login($this->input->post('email'), $this->input->post('password')) == TRUE)
            {
                redirect('panel');
            }
            else
            {
                $this->data['error'] = 'Email or password is incorrect';
            }
        }

        // Load view
        $this->load_view(null, 'signin');
    }

    /**
         * Log out user and redirect him to login page
         */
    public function logout()
    {
        $this->user_model->logout();
        redirect('panel');
    }

    /**
         * Ajax method for image deletion
         * @param int $id User ID
         */
    public function delimg($id)
    {
        echo $this->user_model->delimg($id);
    }
}