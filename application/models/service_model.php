<?php

/**
 * Class Service_model
 * Model for user services/jobs
 */
class Service_model extends MY_Model {

    protected $_table_name = 'services';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[services.title]'
        ),
        'description' => array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required|xss_clean'
        ),
        'icon' => array(
            'field' => 'icon',
            'label' => 'Icon',
            'rules' => 'trim|required|alpha-dash|xss_clean|callback_unique[services.icon]'
        )
    );
    protected $_order_by = 'order asc';
    protected $_set_order = TRUE;



    public function __construct()
    {
        parent::__construct();
    }

} 