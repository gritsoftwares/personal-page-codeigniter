<?php

/**
 * Class Websites
 * CRUD for user contact websites, like
 * fb, twitter, skype etc.
 * For now you can only choose from websites hardcoded into db table `websites`
 */
class Websites extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Websites';

        // Load Models
        $this->load->model('website_model');
    }

    /**
         * List all user websites
         */
    public function index()
    {
        // Load Data
        $this->data['websites'] = $this->website_model->get_my_websites_admin();

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
        $this->load_view('websites/index');
    }

    /**
         * Add/edit website account info
         * If ID is passed - edit, otherwise add
         * @param null|int $id Website ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL) {
            // check if item exists
            $this->data['website'] = $this->website_model->get_my_websites_admin($id);
            if(empty($this->data['website']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/websites');
            }
            $view = 'websites/edit';
        }
        else
        {
            $view = 'websites/add';
        }

        // Load all available websites
        $this->data['social_nets'] = $this->website_model->get_all_websites();

        // Set up the form
        $rules = $this->website_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->website_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/websites');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/compiled/new-user.css',
                'admin/css/lib/select2.css'
            );
            // Page specific scripts
            $this->data['scripts'] = array(
                'admin/js/select2.min.js'
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
        echo $this->website_model->delete($id);
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
            echo $this->website_model->save_order($this->input->post('sortable'));
        }
    }
}