<?php

/**
 * Class Portfolio_Categories_model
 * Model for portfolio categories
 */
class Portfolio_Categories_model extends MY_Model {

    protected $_table_name = 'portfolio_categories';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|xss_clean|callback_unique[portfolio_categories.title]'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|min_length[2]|xss_clean|callback_unique[portfolio_categories.slug]'
        )
    );
    protected $_order_by = 'order asc';
    protected $_set_order = TRUE;



    public function __construct()
    {
        parent::__construct();
    }

    /**
         * Gets all portfolio categories that have published portfolios
         * @return array Array of objects
         */
    public function get_categories_front()
    {
        $this->db->select('c.title, c.slug');
        $this->db->from('portfolio_categories as c');
        $this->db->join('port_cat as pc', 'pc.category_id = c.id', 'inner');
        $this->db->join('portfolios as p', 'pc.portfolio_id = p.id AND p.published = 1', 'inner');
        $this->db->group_by('c.title');
        $this->db->order_by('c.order', 'asc');
        return $this->db->get()->result();
    }


    /**
         * Gets all portfolio categories
         * @return array Array of objects
         */
    public function get_all_categories_admin()
    {
        $this->db->select('c.id, c.title, c.slug, c.order, COUNT(pc.id) as num_projects', FALSE);
        $this->db->from('portfolio_categories as c');
        $this->db->join('port_cat as pc', 'pc.category_id = c.id', 'left');
        $this->db->group_by('c.title');
        $this->db->order_by('order', 'asc');
        return $this->db->get()->result();
    }

    /**
         * Checks if portfolio category has at least one project
         * @param int $id Portfolio Category ID
         * @return object
         */
    public function check_portfolio_by_cat($id)
    {
        $this->db->select('id');
        $this->db->where('category_id', $id);
        $this->db->limit(1);
        return $this->db->get('port_cat')->row();
    }

    /**
         * Deletes Portfolio Category only if it doesn't have any projects
         * @param int $id Portfolio Category ID
         * @return bool
         */
    public function delete($id)
    {
        if (empty($id))
        {
            return FALSE;
        }

        // get portfolios by category id
        $portfolios = $this->check_portfolio_by_cat($id);
        if (!empty((array) $portfolios))
        {
            return json_encode(array('error' => 1));
        }

        return parent::delete($id);
    }
} 