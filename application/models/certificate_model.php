<?php

/**
 * Class Certificate_model
 * Model for user certificates
 */
class Certificate_model extends MY_Model {

    protected $_table_name = 'certificates';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'center' => array(
            'field' => 'center',
            'label' => 'Certification Center',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'link' => array(
            'field' => 'link',
            'label' => 'Link',
            'rules' => 'trim|required|min_length[4]|xss_clean|callback_unique[certificates.link]|prep_url'
        ),
        'score' => array(
            'field' => 'score',
            'label' => 'Score',
            'rules' => 'trim|required|numeric'
        )
    );
    protected $_order_by = 'order asc';
    protected $_set_order = TRUE;



    public function __construct()
    {
        parent::__construct();
    }

} 