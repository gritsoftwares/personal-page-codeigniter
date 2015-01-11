<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Welcome
 * Default controller
 */
class Welcome extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    /**
         *  Home page method
         */
	public function index()
	{
        // Load Models
        $this->load->model('user_model');
        $this->load->model('website_model');
        $this->load->model('skill_model');
        $this->load->model('service_model');
        $this->load->model('testimonial_model');
        $this->load->model('portfolio_items_model');
        $this->load->model('portfolio_categories_model');
        $this->load->library('twitteroauth');
        $this->config->load('twitter');

        // Load data from database
        $this->data['user'] = $this->user_model->get(1);
        $this->data['websites'] = $this->website_model->get_my_websites_admin();
        $this->data['skills'] = $this->skill_model->get_all_skills();
        $this->data['services'] = $this->service_model->get();
        $this->data['testimonials'] = $this->testimonial_model->get();
        $this->data['portfolios'] = $this->portfolio_items_model->get_all_portfolio_front();
        $this->data['portfolio_categories'] = $this->portfolio_categories_model->get_categories_front();

        // Page title and description
        $this->data['seo'] = $this->seo_model->get_by(array('name' => 'Home'), TRUE);

        // Load last tweet
        $connection = $this->twitteroauth->create(
            $this->config->item('twitter_consumer_token'),
            $this->config->item('twitter_consumer_secret'),
            $this->config->item('twitter_access_token'),
            $this->config->item('twitter_access_secret')
        );
        $this->data['tweet'] = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=alex_kravchuk&count=1");

        // Generate captcha for feedback form
        $a = mt_rand(1, 10);
        $b = mt_rand(1, 10);
        $captcha = array(
            'captcha_string' => "$a + $b =",
            'captcha_value' => $a+$b
        );
        $this->session->set_userdata($captcha);

        // Define page specific styles and scripts
        $this->data['styles'] = array(
            'css/animate.css',
            'css/owl.carousel.css',
            'css/owl.theme.css',
            'css/style.css',
        );
        $this->data['scripts'] = array(
            'js/owl.carousel.min.js',
            'js/jquery.easing.1.3.min.js',
            'js/jquery.mixitup.min.js',
            'js/wow.min.js',
            'js/jquery.stellar.min.js'
        );

        // Load layout and content view
        $this->load_view('layouts/home');

        // Cache home page for 1 hour
        $this->output->cache(60);
	}

    /**
         * Portfolio item page method
         * @param string $slug Portfolio item slug
         */
    public function portfolio($slug)
    {
        // Load Models
        $this->load->model('portfolio_items_model');

        // Load data
        $this->data['portfolio'] = $this->portfolio_items_model->get_item_front($slug);
        if( ! count($this->data['portfolio']))
        {
            // Show 404 error page for frontend
            custom_404();
        }
        else
        {
            // Page title and description
            $this->data['seo'] = $this->seo_model->get_by(array('name' => 'Portfolio'), TRUE);

            // Define page specific styles and scripts
            $this->data['styles'] = array(
                'css/style.css',
            );

            // Load layout and content view
            $this->load_view('layouts/portfolio');
        }

        // Cache home page for 1 hour
        $this->output->cache(60);
    }

    /**
         * Resume page method
         */
    public function resume()
    {
        // Load Models
        $this->load->model('company_model');
        $this->load->model('course_model');
        $this->load->model('certificate_model');
        $this->load->helper('date');

        // Load data
        $this->data['companies'] = $this->company_model->get();
        $this->data['courses'] = $this->course_model->get();
        $this->data['certificates'] = $this->certificate_model->get();

        // Page title and description
        $this->data['seo'] = $this->seo_model->get_by(array('name' => 'Resume'), TRUE);

        // Define page specific styles and scripts
        $this->data['styles'] = array(
            'css/style.css',
            'css/jquery.dataTables.css'
        );
        $this->data['scripts'] = array(
            'js/jquery.dataTables.min.js'
        );

        // Load layout and content view
        $this->load_view('layouts/resume');

        // Cache home page for 1 hour
        $this->output->cache(60);
    }

    /**
         * Ajax feedback form method
         */
    public function email()
    {
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR
                  $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest')
        {
            // No direct access allowed
            custom_404();
        }
        else
        {
            // Set up the form
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|xss_clean|htmlentities');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[3]|xss_clean|htmlentities');
            $this->form_validation->set_rules('website', 'Website', 'trim|min_length[4]|xss_clean|htmlentities');
            $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[1000]|xss_clean|htmlentities');
            $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|integer|callback__captcha');

            // Process the form
            if ($this->form_validation->run() == TRUE)
            {
                // get user email
                $this->load->model('user_model');
                $user_email = $this->user_model->get(1)->email;

                // send email
                $this->load->library('email');
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $this->email->from('test@alkrav.com', 'Mypersonal feedback form');
                $this->email->reply_to($this->input->post('email'), $this->input->post('name'));
                $this->email->to($user_email);
                $this->email->subject($this->input->post('subject'));

                $data = array();
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['subject'] = $this->input->post('subject');
                $data['website'] = $this->input->post('website');
                $data['message'] = $this->input->post('message');
                $message = "<div style=\"width:100%;font-family:Arial;font-size:14px;color:#333;\">
    <p>
        <strong>From: </strong>{$data['name']}<br/>
        <strong>Email: </strong><a href=\"mailto:{$data['email']}\">{$data['email']}</a><br/>
        <strong>Subject: </strong>{$data['subject']}<br/>
        <strong>Website: </strong><a href=\"{$data['website']}\">{$data['website']}</a><br/>
        <strong>Message: </strong><br/>{$data['message']}
    </p>
</div>";
                $this->email->message($message);
                $this->email->send();

                $errors = FALSE;
                $mes = '<p>Mail has been sent</p>';
            } else {
                $errors = validation_errors();
                $mes = FALSE;
            }

            // Generate new captcha
            $a = mt_rand(1, 10);
            $b = mt_rand(1, 10);
            $captcha = array(
                'captcha_string' => "$a + $b =",
                'captcha_value' => $a + $b
            );
            $this->session->set_userdata($captcha);

            // return json data to client
            echo json_encode(array('errors' => $errors, 'mes' => $mes, 'captcha' => $this->session->userdata('captcha_string')));
        }
    }

    /**
         *  Custom callback function for form validation
         *  Checks if captcha entered equals to its session value
         *  @param int $value Captcha value
         *  @return boolean
         */
    public function _captcha($value)
    {
        $captcha = $this->session->userdata('captcha_value');
        if ($captcha != $value) {
            $this->form_validation->set_message('captcha', 'The %s is wrong.');
            return FALSE;
        }
        return TRUE;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */