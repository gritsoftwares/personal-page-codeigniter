<?php

/**
 * Class Skills
 * CRUD for user skills
 */
class Skills extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Skills';

        // Load Models
        $this->load->model('skill_model');
    }

    /**
         * List all user skills and specified levels of expertise
         */
    public function index()
    {
        // Load Data
        $this->data['skills'] = $this->skill_model->get_all_skills();

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
        $this->load_view('resume/skills/index');
    }

    /**
         * Add/edit skill
         * If ID is passed - edit, otherwise add
         * @param null|id $id Skill ID (optional)
         */
    public function edit($id = NULL)
    {
        if ($id != NULL)
        {
            // check if item exists
            $this->data['skill'] = $this->skill_model->get($id);
            if(empty($this->data['skill']))
            {
                $this->session->set_flashdata('fail', 'Wrong id is specified');
                redirect('panel/skills');
            }
            $view = 'resume/skills/edit';
        }
        else
        {
            $view = 'resume/skills/add';
        }

        // Set up the form
        $rules = $this->skill_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE)
        {
            $this->skill_model->save($id);
            $this->session->set_flashdata('success', 'Data has been successfully saved');
            redirect('panel/skills');
        }
        else
        {
            // Load Data
            $this->data['levels'] = $this->skill_model->get_all_levels();

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
        echo $this->skill_model->delete($id);
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
            echo $this->skill_model->save_order($this->input->post('sortable'));
        }
    }
}