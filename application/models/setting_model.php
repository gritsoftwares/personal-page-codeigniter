<?php

/**
 * Class Setting_model
 * Model for website settings
 */
class Setting_model extends MY_Model {

    protected $_table_name = 'settings';
    public $rules = array(
        'logo' => array(
            'field' => 'logo',
            'label' => 'Logo',
            'rules' => 'trim|required|xss_clean'
        ),
        'homepage_intro' => array(
            'field' => 'homepage_intro',
            'label' => 'Homepage intro',
            'rules' => 'trim|required|xss_clean'
        ),
        'homepage_intro2' => array(
            'field' => 'homepage_intro2',
            'label' => 'Homepage intro line 2',
            'rules' => 'trim|required|xss_clean'
        ),
        'about_intro' => array(
            'field' => 'about_intro',
            'label' => 'About intro',
            'rules' => 'trim|required|xss_clean'
        ),
        'about_intro2' => array(
            'field' => 'about_intro2',
            'label' => 'About text',
            'rules' => 'trim|required|xss_clean'
        ),
        'blog_intro' => array(
            'field' => 'blog_intro',
            'label' => 'Blog intro',
            'rules' => 'trim|required|xss_clean'
        ),
        'blog_intro2' => array(
            'field' => 'blog_intro2',
            'label' => 'Blog intro line 2',
            'rules' => 'trim|required|xss_clean'
        ),
        'resume_intro' => array(
            'field' => 'resume_intro',
            'label' => 'Resume intro',
            'rules' => 'trim|required|xss_clean'
        ),
        'resume_intro2' => array(
            'field' => 'resume_intro2',
            'label' => 'Resume intro line 2',
            'rules' => 'trim|required|xss_clean'
        )
    );



    public function __construct()
    {
        parent::__construct();
    }

} 