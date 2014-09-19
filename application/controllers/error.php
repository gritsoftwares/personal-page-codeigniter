<?php

/**
 * Class Error
 * Error controller. Rewrites default 404 behavior
 * Show different error pages for front and admin panel
 */
class Error extends MY_Controller {

    function _404()
    {
        set_status_header('404');

        if ($this->uri->segment(1) == 'panel')
        {
            // Check Authentication
            $this->load->model('user_model');
            $no_redirect = array(
                'panel/login'
            );
            if ($this->user_model->logged_in() == FALSE && !in_array(uri_string(), $no_redirect))
            {
                redirect('panel/login');
            }

            // load admin error page
            $this->data['view'] = 'admin/errors/404';
            $this->load->view('admin/layouts/main', $this->data);
        }
        else
        {
            // load front error page
            $this->load->view('front/404');
        }
    }
}