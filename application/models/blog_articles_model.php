<?php

/**
 * Class Blog_Articles_model
 * Model for blog articles
 */
class Blog_Articles_model extends MY_Model {

    protected $_table_name = 'blog_articles';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[blog_articles.title]'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[blog_articles.slug]'
        ),
        'short_text' => array(
            'field' => 'short_text',
            'label' => 'Short Text',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'full_text' => array(
            'field' => 'full_text',
            'label' => 'Full Text',
            'rules' => 'trim|required|min_length[2]|xss_clean'
        ),
        'category_id' => array(
            'field' => 'category_id',
            'label' => 'Category',
            'rules' => 'required'
        ),
        'published' => array(
            'field' => 'published',
            'label' => 'Published',
            'rules' => 'integer'
        )
    );
    protected $_order_by = 'created_at desc';



    public function __construct()
    {
        parent::__construct();
    }

    /**
         * Counts all category articles that are published
         * For category navigation
         * @param string $cat_slug Category Slug
         * @return int Number of articles
         */
    public function count_category_articles_published($cat_slug)
    {
        $this->db->select('a.id');
        $this->db->from('blog_articles as a');
        $this->db->join('blog_categories as c', "a.category_id = c.id AND a.published = 1 AND c.slug = '$cat_slug'", 'inner');
        return $this->db->count_all_results();
    }

    /**
     * Get published articles:
     * 1) two first params equal to null - all articles
     * 2) $category specified - all articles in category
     * 3) $search specified - all articles that match search string
     * @param null|string $category Category Slug (optional)
     * @param null|string $search Search String (optional)
     * @param int $limit
     * @param int $start
     * @return array Array of objects
     */
    public function get_articles($category = null, $search = null, $limit = 10, $start = 0)
    {
        $this->db->select('a.title, a.slug, c.title as category, c.slug as cat_slug, short_text, a.created_at', FALSE);
        $this->db->join('blog_categories as c', 'a.category_id = c.id', 'left');
        $this->db->where('a.published', 1);
        if(!empty($category))
        {
            $this->db->where('c.slug', $category);

        }
        if(!empty($search))
        {
            $this->db->where("MATCH(a.title,a.full_text) AGAINST('{$search}' IN NATURAL LANGUAGE MODE)", NULL, FALSE);
        }
        else
        {
            $this->db->order_by('a.created_at', 'DESC');
        }
        $this->db->limit($limit, $start);
        return $this->db->get('blog_articles as a')->result();
    }

    /**
         * Get published article by it's slug
         * @param string $slug Article slug
         * @return object
         */
    public function get_article_by_slug($slug)
    {
        $this->db->select('a.title, c.title as category, c.slug as cat_slug, a.full_text, a.created_at');
        $this->db->from('blog_articles as a');
        $this->db->join('blog_categories as c', 'a.category_id=c.id', 'left');
        $this->db->where('a.slug', $slug);
        $this->db->where('a.published = 1');
        return $this->db->get()->row();
    }

    /**
         * Get number of articles that match search criteria
         * @param string $search Search string
         * @return object
         */
    public function get_num_search_results($search)
    {
        $this->db->select('COUNT(id) as total', FALSE);
        $this->db->where('published', 1);
        $this->db->where("MATCH(title,full_text) AGAINST('{$search}' IN NATURAL LANGUAGE MODE)", NULL, FALSE);
        return $this->db->get('blog_articles', 10, 0)->row();
    }


    /**
     * Get all blog articles for listing in admin panel
     * Or blog articles by category if specified
     * @param null|int $id Article Category ID (optional)
     * @return array Array of objects
     */
    public function get_all_articles_admin($id = NULL)
    {
        $this->db->select('a.id, a.title, c.id as cat_id, c.title as cat_title, a.published, a.created_at, a.updated_at');
        $this->db->from('blog_articles as a');
        $this->db->join('blog_categories as c', 'a.category_id = c.id', 'left');
        if(!empty($id))
        {
            $this->db->where('a.category_id', $id);
        }
        $this->db->order_by('a.created_at desc');
        return $this->db->get()->result();
    }

    /**
         * Adding/editing of blog article depending on ID
         * @param null|int $id Blog Article ID (optional)
         * @return int Blog Article ID
         */
    public function save($id = NULL)
    {
        if ($id)
        {
            $_POST['updated_at'] = time();
        }
        else
        {
            $_POST['created_at'] = $_POST['updated_at'] = time();
        }

        parent::save($id);
    }
}

