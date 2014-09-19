<?php

/**
 * Class Blog_Categories_model
 * Model for blog categories
 */
class Blog_Categories_model extends MY_Model {

    protected $_table_name = 'blog_categories';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[blog_categories.title]'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[blog_categories.slug]'
        )
    );
    protected $_order_by = 'title asc';



    public function __construct()
    {
        parent::__construct();
    }

    /**
         * Gets all blog categories and total amount of published articles in each category
         * @return array Array of objects
         */
    public function get_categories()
    {
        $this->db->select('c.title, c.slug, COUNT(a.id) as total', FALSE);
        $this->db->join('blog_articles as a', 'c.id = a.category_id AND a.published = 1', 'left');
        $this->db->group_by('c.title');
        $this->db->order_by('c.title', 'ASC');
        return $this->db->get('blog_categories as c')->result();
    }

    /**
         * Gets category title to check if it exists (the slug is correct)
         * @param string $cat_slug Category slug
         * @return object
         */
    public function get_category_title($cat_slug)
    {
        $this->db->select('title');
        $this->db->from('blog_categories');
        $this->db->where('slug', $cat_slug);
        return $this->db->get()->row();
    }


    /**
         * Gets all blog categories
         * @return array Array of objects
         */
    public function get_all_categories_admin()
    {
        $this->db->select('c.id, c.title, c.slug, COUNT(a.id) as num_articles', FALSE);
        $this->db->from('blog_categories as c');
        $this->db->join('blog_articles as a', 'a.category_id = c.id', 'left');
        $this->db->group_by('c.title');
        $this->db->order_by('title', 'asc');
        return $this->db->get()->result();
    }

    /**
         * Checks if blog category has at least one article in it
         * @param int $id Blog Category ID
         * @return object
         */
    public function check_article_by_cat($id)
    {
        $this->db->select('id');
        $this->db->where('category_id', $id);
        $this->db->limit(1);
        return $this->db->get('blog_articles')->row();
    }

    /**
         * Deletes a blog category only if it doesn't have any articles in it
         * @param int $id Blog Category ID
         * @return bool
         */
    public function delete($id)
    {
        if (empty($id))
        {
            return FALSE;
        }

        // get portfolios by category id
        $articles = $this->check_article_by_cat($id);
        if (!empty((array) $articles))
        {
            return json_encode(array('error' => 1));
        }

        return parent::delete($id);
    }
}

