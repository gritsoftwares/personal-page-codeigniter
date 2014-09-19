<?php

/**
 * Class Companies
 * CRUD for user experience (companies)
 */
class Companies extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Companies';

        // Load Models
        $this->load->model('company_model');
        $this->load->helper('date');
    }

    /**
         * List all user companies he worked in
         * in order of starting his job
         */
    public function index()
    {

        // Load Data
        $this->data['companies'] = $this->company_model->get();

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/compiled/tables.css',
        );

        // Load View
        $this->load_view('resume/companies/index');
    }

    /**
         * Add/edit company
         * If ID is passed - edit, otherwise add
         * @param null|id $id Company ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL)
        {
            // check if item exists
            $this->data['company'] = $this->company_model->get($id);
            if(empty($this->data['company']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/companies');
            }
            $view = 'resume/companies/edit';
        }
        else
        {
            $view = 'resume/companies/add';
        }

        // Set up the form
        $rules = $this->company_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->company_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/companies');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/lib/datepicker.css',
                'admin/css/compiled/new-user.css'
            );
            // Page specific scripts
            $this->data['scripts'] = array(
                'admin/js/bootstrap-datepicker.js'
            );

            // Load View
            $this->load_view($view);
        }
    }

    /**
         * Ajax method for item deletion
         * @param int $id Item ID
         */
    public function delete($id)
    {
        echo $this->company_model->delete($id);
    }
}