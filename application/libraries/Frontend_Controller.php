<?php

/**
 * Class Frontend_Controller
 * Parent controller for front controllers
 */
class Frontend_Controller extends MY_Controller {

    // Frontend view folder
    protected $_folder = 'front';



    public function __construct()
    {
        parent::__construct();

        // Load Models
        $this->load->model('setting_model');
        $this->load->model('seo_model');

        // Load data from database
        $this->data['settings'] = $this->setting_model->get(1);
    }

    /**
         * To load a page view you have to specify layout and optional content file name
         * @param string $layout Layout file
         * @param null|string $content Content file
         */
    public function load_view($layout, $content = null)
    {
        $this->data['layout'] = $this->_folder.'/'.$layout;
        !$content || ($this->data['content'] = $this->_folder.'/'.$content);

        $this->load->view("{$this->_folder}/layouts/main", $this->data);
    }
} 