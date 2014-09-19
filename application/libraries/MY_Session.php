<?php

/**
 * Class MY_Session
 * Extends CI_Session
 */
class MY_Session extends CI_Session {

    /**
         * Update session when not ajax request
         */
    public function sess_update()
    {
        /*
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest')
        {
            // This is not an Ajax call
            parent::sess_update();
        }
        */
        $CI =& get_instance();

        if ( ! $CI->input->is_ajax_request())
        {
            parent::sess_update();
        }
    }

}