<?php

/**
 * Class Course_model
 * Model for user courses/trainings
 */
class Course_model extends MY_Model {

    protected $_table_name = 'courses';
    public $rules = array(
        'category' => array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[courses.title]'
        ),
        'author' => array(
            'field' => 'author',
            'label' => 'Author',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'link' => array(
            'field' => 'link',
            'label' => 'Link',
            'rules' => 'trim|required|min_length[4]|xss_clean|callback_unique[courses.link]|prep_url'
        )
    );
    protected $_order_by = 'title asc';



    public function __construct()
    {
        parent::__construct();
    }

} 