<?php

/**
 * Class Services
 * CRUD for user services
 */
class Services extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->data['title'] .= 'Services';

        // Load Models
        $this->load->model('service_model');
    }

    /**
         * List all services and icons
         */
    public function index()
    {
        // Load Data
        $this->data['services'] = $this->service_model->get();

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/compiled/tables.css'
        );
        // page specific scripts
        $this->data['scripts'] = array(
            'admin/js/jquery-ui.min.js',
            'admin/js/jquery.mjs.nestedSortable.js',
        );

        // Load View
        $this->load_view('resume/services/index');
    }

    /**
         * Add/edit service
         * If ID is passed - edit, otherwise add
         * It may take a while to load, because a list of 600+ font-awesome icons has to be loaded
         * @param null|id $id Service ID (optional)
         */
    public function edit($id = NULL)
    {
        $this->load->library('FA_icons');

        if ($id != NULL) {
            // check if item exists
            $this->data['service'] = $this->service_model->get($id);
            if(empty($this->data['service']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/services');
            }
            $view = 'resume/services/edit';
        }
        else
        {
            $view = 'resume/services/add';
        }

        // Currently fa icons are parsed and stored as php array in model class
        // I decided not to store them in XML, because it'll take more time to read file and build an array
        $this->data['icons'] = $this->fa_icons->get_icons();

        // Set up the form
        $rules = $this->service_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->service_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/services');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/compiled/new-user.css',
                'admin/css/bootstrap/bootstrap-select.css'
            );
            // Page specific scripts
            $this->data['scripts'] = array(
                'admin/js/bootstrap-select.min.js'
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
        echo $this->service_model->delete($id);
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
            echo $this->service_model->save_order($this->input->post('sortable'));
        }
    }
}