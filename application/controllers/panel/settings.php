<?php

/**
 * Class Settings
 * Here you can edit website settings, such as
 * logo sign and intro lines for homepage, resume, blog etc.
 */
class Settings extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Website Settings';
    }

    /**
         * Method for editing website settings
         */
    public function index()
    {
        $this->load->model('setting_model');

        $this->data['settings'] = $this->setting_model->get(1);

        // Set up the form
        $rules = $this->setting_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->setting_model->save(1);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/settings');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/compiled/new-user.css'
            );

            // Load View
            $this->load_view('settings/edit');
        }
    }
}