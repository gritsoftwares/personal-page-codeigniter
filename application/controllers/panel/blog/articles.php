<?php

/**
 * Class Articles
 * CRUD for blog articles
 */
class Articles extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Blog Articles';

        // Load Models
        $this->load->model('blog_articles_model');
    }

    /**
         * List all blog articles in order of creation
         * If ID is specified, show articles by category
         * @param null|int $id Article Category (optional)
         */
    public function index($id = NULL)
    {
        if ($id != NULL)
        {
            // Load Data
            $this->data['articles'] = $this->blog_articles_model->get_all_articles_admin($id);
            $view = 'blog/articles/category';
        }
        else
        {
            // Load Data
            $this->data['articles'] = $this->blog_articles_model->get_all_articles_admin();
            $view = 'blog/articles/index';
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
         * Add/edit blog article
         * If ID is passed - edit, otherwise add
         * @param null|int $id Blog Article ID (optional)
         */
    public function edit($id = NULL)
    {
        // Load model
        $this->load->model('blog_categories_model');

        if ($id != NULL)
        {
            // check if item exists
            $this->data['article'] = $this->blog_articles_model->get($id);
            if(empty($this->data['article']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/blog/articles');
            }
            $view = 'blog/articles/edit';
        }
        else
        {
            $view = 'blog/articles/add';
        }

        // Load all available categories
        $this->data['categories'] = $this->blog_categories_model->get();

        // Set up the form
        $rules = $this->blog_articles_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->blog_articles_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/blog/articles');
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
        echo $this->blog_articles_model->delete($id);
    }

    /**
         * Ajax method for generating article page slug based on title
         */
    public function makeslug()
    {
        echo $this->blog_articles_model->make_slug();
    }

    /**
         * Ajax method for (un)publishing portfolio item
         * @param int $id Portfolio Item ID
         */
    public function publish($id)
    {
        echo $this->blog_articles_model->publish($id);
    }
}