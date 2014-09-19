<?php

/**
 * Class Courses
 * CRUD for user courses/trainings
 */
class Courses extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Courses';

        // Load Models
        $this->load->model('course_model');
    }

    /**
         * List all user courses/trainings
         */
    public function index()
    {
        // Load Data
        $this->data['courses'] = $this->course_model->get();

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
        $this->load_view('resume/courses/index');
    }

    /**
         * Add/edit course
         * If ID is passed - edit, otherwise add
         * @param null|int $id Course ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL)
        {
            // check if item exists
            $this->data['course'] = $this->course_model->get($id);
            if(empty($this->data['course']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/courses');
            }
            $view = 'resume/courses/edit';
        }
        else
        {
            $view = 'resume/courses/add';
        }

        // Set up the form
        $rules = $this->course_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->course_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/courses');
        }
        else
        {
            // Page specific styles
            $this->data['styles'] = array(
                'admin/css/compiled/new-user.css'
            );
            // Page specific scripts
            $this->data['scripts'] = array();

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
        echo $this->course_model->delete($id);
    }
}