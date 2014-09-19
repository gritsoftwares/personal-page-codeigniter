<?php

/**
 * Class Certificates
 * CRUD for user certificates and tests
 */
class Certificates extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Certificates';

        // Load Models
        $this->load->model('certificate_model');
    }

    /**
         * List all of user methods
         */
    public function index()
    {
        // Load Data
        $this->data['certificates'] = $this->certificate_model->get();

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/compiled/tables.css',
        );
        // page specific scripts
        $this->data['scripts'] = array(
            'admin/js/jquery-ui.min.js',
            'admin/js/jquery.mjs.nestedSortable.js',
        );

        // Load View
        $this->load_view('resume/certificates/index');
    }

    /**
         * Add/edit certificate
         * If ID is passed - edit, otherwise add
         * @param null|id $id Certificate ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL)
        {
            // check if item exists
            $this->data['certificate'] = $this->certificate_model->get($id);
            if(empty($this->data['certificate']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/certificates');
            }
            $view = 'resume/certificates/edit';
        }
        else
        {
            $view = 'resume/certificates/add';
        }

        // Set up the form
        $rules = $this->certificate_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->certificate_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/certificates');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/compiled/new-user.css',
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
        echo $this->certificate_model->delete($id);
    }

    /**
         * Ajax method for reordering items
         * @return bool
         */
    public function order()
    {
        // Save order from ajax call
        if ($this->input->post('sortable'))
        {
            echo $this->certificate_model->save_order($this->input->post('sortable'));
        }
    }
}