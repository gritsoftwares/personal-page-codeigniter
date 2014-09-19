<?php

/**
 * Class Company_model
 * Model for user experiences (companies he worked int)
 */
class Company_model extends MY_Model {

    protected $_table_name = 'companies';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'company_title' => array(
            'field' => 'company_title',
            'label' => 'Company',
            'rules' => 'trim|required|xss_clean'
        ),
        'company_website' => array(
            'field' => 'company_website',
            'label' => 'Website',
            'rules' => 'trim|required|xss_clean|prep_url'
        ),
        'description' => array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required|xss_clean'
        ),
        'technologies' => array(
            'field' => 'technologies',
            'label' => 'Technologies',
            'rules' => 'trim|xss_clean'
        ),
        'start_date' => array(
            'field' => 'start_date',
            'label' => 'Start',
            'rules' => 'trim|required|date_to_timestamp'
        ),
        'end_date' => array(
            'field' => 'end_date',
            'label' => 'End',
            'rules' => 'trim|date_to_timestamp'
        ),
    );
    protected $_order_by = 'start_date desc';



    public function __construct()
    {
        parent::__construct();
    }

} 