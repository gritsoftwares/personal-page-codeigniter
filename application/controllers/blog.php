<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Blog
 * Blog controller
 */
class Blog extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load models
        $this->load->model('blog_articles_model');
        $this->load->model('blog_categories_model');
        $this->load->model('website_model');
        $this->load->library('pagination');

        // Load data
        $this->data['categories'] = $this->blog_categories_model->get_categories();
        $this->data['websites'] = $this->website_model->get_my_websites_admin();

        // Load page specific styles and scripts
        $this->data['styles'] = array(
            'css/blog.css'
        );
    }

    /**
         * Blog index method
         */
    public function index()
    {
        // // Page title and description
        $this->data['seo'] = $this->seo_model->get_by(array('name' => 'Blog'), TRUE);

        // Configure pagination for articles
        $config['base_url'] = site_url('blog/page/');
        $config['total_rows'] = $this->blog_articles_model->count_all(TRUE);
        $config['first_url'] = site_url('blog');
        $config['uri_segment'] = 3;
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3)-1 : 0;
        $this->data['articles'] = $this->blog_articles_model->get_articles(NULL, NULL, $config["per_page"], $page);
        $this->data['links'] = $this->pagination->create_links();

        // Load layout and content view
        $this->load_view('layouts/blog', 'blog_listing');
    }

    /**
         * List blog articles by category
         * @param string $cat_slug Category slug
         */
    public function category($cat_slug)
    {
        // Check if category exists
        $this->data['category'] = $this->blog_categories_model->get_category_title($cat_slug);
        if ( ! count($this->data['category']))
        {
            custom_404();
        }
        else
        {
            // Redirect if /blog/category/slug
            if($this->uri->segment(1) == 'blog')
            {
                $url = $this->uri->segment(2) . '/' . $this->uri->segment(3);
                redirect($url, 'location', '301');
            }

            // Page title and description
            $this->data['seo'] = $this->seo_model->get_by(array('name' => 'Category'), TRUE);
            $this->data['seo']->title .= ' '.$this->data['category']->title;

            // Configure pagination for articles
            $config['base_url'] = site_url("category/{$cat_slug}/page/");
            $config['total_rows'] = $this->blog_articles_model->count_category_articles_published($cat_slug);
            $config['first_url'] = site_url("category/{$cat_slug}");
            $config['uri_segment'] = 4;
            $config['per_page'] = 10;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(4)) ? $this->uri->segment(4)-1 : 0;
            $this->data['articles'] = $this->blog_articles_model->get_articles($cat_slug, NULL, $config["per_page"], $page);
            $this->data['links'] = $this->pagination->create_links();

            // Load layout and content view
            $this->load_view('layouts/blog', 'category_listing');
        }
    }

    /**
         * Show blor article page by article slug
         * @param string $slug Post slug
         */
    public function post($slug)
    {
        // Check if article exists
        $this->data['article'] = $this->blog_articles_model->get_article_by_slug($slug);
        if ( ! count($this->data['article']))
        {
            custom_404();
        }
        else
        {
            // Redirect if /blog/post/slug
            if($this->uri->segment(1) == 'blog')
            {
                $url = $this->uri->segment(2) . '/' . $this->uri->segment(3);
                redirect($url, 'location', '301');
            }

            // Page title and description
            $this->data['seo'] = $this->seo_model->get_by(array('name' => 'Post'), TRUE);
            $this->data['seo']->title .= ' '.$this->data['article']->title;
            $this->data['seo']->description = $this->data['article']->title;

            // Load layout and content view
            $this->load_view('layouts/blog', 'blog_post');
        }
    }

    /**
         * Method for listing search results
         * @param string $search Search string
         */
    public function search($search)
    {
        // Decode search string
        $search = rawurldecode($search);

        // Check if there are any results matching search string
        $this->data['search_query'] = $search;
        $this->data['num_results'] = $this->blog_articles_model->get_num_search_results($search);
        if ($this->data['num_results']->total)
        {
            // Configure pagination for listing
            $config['base_url'] = site_url("search/{$search}/page/");
            $config['total_rows'] = $this->data['num_results']->total;
            $config['first_url'] = site_url("search/{$search}");
            $config['uri_segment'] = 4;
            $config['per_page'] = 10;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(4)) ? $this->uri->segment(4)-1 : 0;
            $this->data['articles'] = $this->blog_articles_model->get_articles(NULL, $search, $config["per_page"], $page);
            $this->data['links'] = $this->pagination->create_links();
        }

        // Page title and description
        $this->data['seo'] = $this->seo_model->get_by(array('name' => 'Search'), TRUE);
        $this->data['seo']->title .= ' '.$search;
        $this->data['seo']->description = 'Search results for '.$search;

        // Load layout and content view
        $this->load_view('layouts/blog', 'blog_search');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */