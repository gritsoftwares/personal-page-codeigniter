<?php

/**
 * Class Testimonial_model
 * Model for user testimonials
 */
class Testimonial_model extends MY_Model {

    protected $_table_name = 'testimonials';
    public $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'company' => array(
            'field' => 'company',
            'label' => 'Company',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|xss_clean|valid_email'
        ),
        'text' => array(
            'field' => 'text',
            'label' => 'Text',
            'rules' => 'trim|required|xss_clean|callback_unique[testimonials.text]'
        )
    );
    protected $_order_by = 'order asc';
    protected $_set_order = TRUE;



    public function __construct()
    {
        parent::__construct();
    }
} 