<?php

/**
 * Class Seo
 * CRUS for SEO customization
 * You can edit pages title and description
 * Currently you should load data in each page controller
 * Later I'll figure out how to load data based on url
 */
class Seo extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'SEO';

        // Load Models
        $this->load->model('seo_model');
    }

    /**
         * List all pages
         */
    public function index()
    {
        // Load Data
        $this->data['seo'] = $this->seo_model->get();

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/compiled/tables.css'
        );

        // Load View
        $this->load_view('seo/index');
    }

    /**
         * Add/edit page
         * If ID is passed - edit, otherwise add
         * @param null|int $id Page ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL) {
            // check if item exists
            $this->data['page'] = $this->seo_model->get($id);
            if(empty($this->data['page']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/seo');
            }
            $view = 'seo/edit';
        }
        else
        {
            $view = 'seo/add';
        }

        // Set up the form
        $rules = $this->seo_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->seo_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/seo');
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
        echo $this->seo_model->delete($id);
    }
}