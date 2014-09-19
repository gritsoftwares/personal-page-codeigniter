<?php

/**
 * Class Categories
 * CRUD for portfolio categories
 */
class Categories extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Portfolio Categories';

        // Load Models
        $this->load->model('portfolio_categories_model');
    }

    /**
         * List all portfolio categories with number of items in each category
         */
    public function index()
    {
        // Load Data
        $this->data['portfolio_cats'] = $this->portfolio_categories_model->get_all_categories_admin();

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/compiled/tables.css'
        );
        // page specific scripts
        $this->data['scripts'] = array(
            'admin/js/jquery-ui.min.js',
            'admin/js/jquery.mjs.nestedSortable.js'
        );

        // Load View
        $this->load_view('portfolio/categories/index');
    }

    /**
         * Add/edit portfolio category
         * If ID is passed - edit, otherwise add
         * @param null|int $id Portfolio Category ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL)
        {
            // check if item exists
            $this->data['category'] = $this->portfolio_categories_model->get($id);
            if(empty($this->data['category']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/portfolio/categories');
            }
            $view = 'portfolio/categories/edit';
        }
        else
        {
            $view = 'portfolio/categories/add';
        }

        // Set up the form
        $rules = $this->portfolio_categories_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->portfolio_categories_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/portfolio/categories');
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
        echo $this->portfolio_categories_model->delete($id);
    }

    /**
         * Ajax method for item reordering
         */
    public function order()
    {
        // Save order from ajax call
        if ($this->input->post('sortable'))
        {
            echo $this->portfolio_categories_model->save_order($this->input->post('sortable'));
        }
    }

    /**
         * Ajax method for generating portfolio category slug based on title
         */
    public function makeslug()
    {
        echo $this->portfolio_categories_model->make_slug();
    }


}