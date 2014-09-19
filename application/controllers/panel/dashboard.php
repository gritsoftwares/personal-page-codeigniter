<?php

/**
 * Class Dashboard
 * Tiles that provide links to quick adding of content
 * Also showing you total amount of content in specific categories so far
 * Couldn't come up with anything better than this
 */
class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        // Page title
        $this->data['title'] .= 'Dashboard';

        // page specific styles
        $this->data['styles'] = array(
            'admin/css/bootstrap/metro-bootstrap.css',
            'admin/css/compiled/dashboard.css',
        );
        // page specific scripts
        $this->data['scripts'] = array();
    }

    /**
         * Show tiles that show you total amount of content and
         * give you links for adding content
         */
    public function index()
    {
        // Load Models
        $this->load->model('skill_model');
        $this->load->model('service_model');
        $this->load->model('testimonial_model');
        $this->load->model('company_model');
        $this->load->model('course_model');
        $this->load->model('certificate_model');
        $this->load->model('portfolio_items_model');
        $this->load->model('blog_articles_model');
        $this->load->model('website_model');

        // Load data from the database
        // for more colors and settings of bootstrap tiles
        // @see http://talkslab.github.io/metro-bootstrap/components.html
        $this->data['tiles'] = array(
            'skill' => array(
                'total' => $this->skill_model->count_all(),
                'url' => 'skills',
                'color' => 'wet-asphalt'
            ),
            'service' => array(
                'total' => $this->service_model->count_all(),
                'url' => 'services',
                'color' => 'purple'
            ),
            'testimonial' => array(
                'total' => $this->testimonial_model->count_all(),
                'url' => 'testimonials',
                'color' => 'pomegranate'
            ),
            'company' => array(
                'total' => $this->company_model->count_all(),
                'url' => 'companies',
                'color' => 'teal'
            ),
            'course' => array(
                'total' => $this->course_model->count_all(),
                'url' => 'courses',
                'color' => 'river'
            ),
            'certificate' => array(
                'total' => $this->certificate_model->count_all(),
                'url' => 'certificates',
                'color' => 'silver'
            ),
            'portfolio' => array(
                'total' => $this->portfolio_items_model->count_all(),
                'url' => 'portfolio/items',
                'color' => 'green'
            ),
            'article' => array(
                'total' => $this->blog_articles_model->count_all(),
                'url' => 'blog/articles',
                'color' => 'orange'
            ),
            'website' => array(
                'total' => $this->website_model->count_all(),
                'url' => 'websites',
                'color' => 'alizarin'
            ),
        );

        // Load layout and content view
        $this->load_view('dashboard/index');
    }
}