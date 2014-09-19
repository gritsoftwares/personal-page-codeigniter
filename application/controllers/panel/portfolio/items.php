<?php

/**
 * Class Items
 * CRUD for user portfolio items
 */
class Items extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Portfolios';

        // Load Models
        $this->load->model('portfolio_items_model');
    }

    /**
         * List all portfolio items in order of project completion
         * If ID is specified, show portfolios by category
         * @param null|int $id Portfolio Category (optional)
         */
    public function index($id = NULL)
    {
        if ($id != NULL)
        {
            // Load portfolios by category
            $this->data['portfolios'] = $this->portfolio_items_model->get_portfolio_by_cat_admin($id);
            $view = 'portfolio/items/category';
        }
        else
        {
            // Load all portfolios
            $this->data['portfolios'] = $this->portfolio_items_model->get_all_portfolio_admin();
            $view = 'portfolio/items/index';
        }

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/lib/jquery.dataTables.css',
            'admin/css/compiled/datatables.css'
        );
        // page specific scripts
        $this->data['scripts'] = array(
            'admin/js/jquery.dataTables.min.js'
        );

        // Load View
        $this->load_view($view);
    }

    /**
         * Add/edit portfolio item
         * If ID is passed - edit, otherwise add
         * @param null|int $id Portfolio Item ID (optional)
         */
    public function edit($id = NULL)
    {
        // Load models
        $this->load->model('portfolio_categories_model');
        $this->load->helper('date');

        if ($id != NULL)
        {
            // check if item exists
            $this->data['portfolio'] = $this->portfolio_items_model->get_one_portfolio_admin($id);
            if(empty($this->data['portfolio']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/portfolio/items');
            }
            $view = 'portfolio/items/edit';
        }
        else
        {
            $view = 'portfolio/items/add';
        }

        // Get all available categories
        $this->data['categories'] = $this->portfolio_categories_model->get_all_categories_admin();

        // Set up the form
        $rules = $this->portfolio_items_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            // Save data to db and get ID
            $id = $this->portfolio_items_model->save($id);

            // Using ID save portfolio thumbnails if uploaded
            $this->portfolio_items_model->resize_img($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/portfolio/items');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/lib/datepicker.css',
                'admin/css/compiled/new-user.css',
                'admin/css/lib/select2.css'
            );
            // Page specific scripts
            $this->data['scripts'] = array(
                'admin/js/bootstrap-datepicker.js',
                'admin/js/select2.min.js',
                'admin/js/ckeditor/ckeditor.js',
                'admin/js/ckeditor/adapters/jquery.js'
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
        echo $this->portfolio_items_model->delete($id);
    }

    /**
         * Ajax method for thumbnail deletion
         * @param int $id Portfolio Item ID
         */
    public function delimg($id)
    {
        echo $this->portfolio_items_model->delimg($id);
    }

    /**
         * Ajax method for generating portfolio page slug based on title
         */
    public function makeslug()
    {
        echo $this->portfolio_items_model->make_slug();
    }

    /**
         * Ajax method for (un)publishing portfolio item
         * @param int $id Portfolio Item ID
         */
    public function publish($id)
    {
        echo $this->portfolio_items_model->publish($id);
    }
}