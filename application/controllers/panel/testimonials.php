<?php

/**
 * Class Testimonials
 * CRUD for user testimonials/recommendation
 * You are going to provide testimonials from real people, aren't you?
 */
class Testimonials extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Testimonials';

        // Load Models
        $this->load->model('testimonial_model');
    }

    /**
         * List all testimonials
         */
    public function index()
    {
        // Load Data
        $this->data['testimonials'] = $this->testimonial_model->get();

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
        $this->load_view('resume/testimonials/index');
    }

    /**
         * Add/edit skill
         * If ID is passed - edit, otherwise add
         * @param null|int $id Testimonial ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL)
        {
            // check if item exists
            $this->data['testimonial'] = $this->testimonial_model->get($id);
            if(empty($this->data['testimonial']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/testimonials');
            }
            $view = 'resume/testimonials/edit';
        }
        else
        {
            $view = 'resume/testimonials/add';
        }

        // Set up the form
        $rules = $this->testimonial_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->testimonial_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/testimonials');
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
        echo $this->testimonial_model->delete($id);
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
            echo $this->testimonial_model->save_order($this->input->post('sortable'));
        }
    }
}