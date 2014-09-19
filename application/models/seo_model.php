<?php

/**
 * Class Seo_model
 * Model for seo optimization (page title and description)
 */
class Seo_model extends MY_Model {

    protected $_table_name = 'seo';
    public $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean|callback_unique[seo.name]'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|xss_clean|callback_unique[seo.slug]'
        ),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|xss_clean|max_length[60]'
        ),
        'description' => array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required|xss_clean|max_length[160]'
        ),
    );
    protected $_order_by = 'name asc';



    public function __construct()
    {
        parent::__construct();
    }

}