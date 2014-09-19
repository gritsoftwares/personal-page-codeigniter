<?php

/**
 * Class Categories
 * CRUD for blog article categories
 */
class Categories extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Blog Categories';

        // Load Models
        $this->load->model('blog_categories_model');
    }

    /**
         * List all article categories
         */
    public function index()
    {
        // Load Data
        $this->data['categories'] = $this->blog_categories_model->get_all_categories_admin();

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/compiled/tables.css'
        );

        // Load View
        $this->load_view('blog/categories/index');
    }

    /**
         * Add/edit blog article category
         * If ID is passed - edit, otherwise add
         * @param null|int $id Article Category ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL)
        {
            // check if item exists
            $this->data['category'] = $this->blog_categories_model->get($id);
            if(empty($this->data['category']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/blog/categories');
            }
            $view = 'blog/categories/edit';
        }
        else
        {
            $view = 'blog/categories/add';
        }

        // Set up the form
        $rules = $this->blog_categories_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->blog_categories_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/blog/categories');
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
        echo $this->blog_categories_model->delete($id);
    }

    /**
         * Ajax method for generating article category slug based on title
         */
    public function makeslug()
    {
        echo $this->blog_categories_model->make_slug();
    }


}