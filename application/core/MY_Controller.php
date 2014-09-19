<?php

/**
 * Class MY_Controller
 * Parent Controller for Admin and Frontend Controllers
 */
class MY_Controller extends CI_Controller {

    public $data = array();

    public function __construct()
    {
        parent::__construct();

        //$this->output->enable_profiler(TRUE);
    }
} 