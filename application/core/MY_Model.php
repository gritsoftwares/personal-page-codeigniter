<?php

/**
 * Class MY_Model
 * Base model with a series of CRUD functions.
 * Uses Active Record Class
 * Inspired by
 * @link http://code.tutsplus.com/courses/build-a-cms-in-codeigniter
 */
class MY_Model extends CI_Model {

    // table name
    protected $_table_name = '';

    // form validation rules array
    public $rules = array();

    // primary key
    protected $_pk = 'id';

    // which field to order by when listing items
    protected $_order_by = '';

    // whether to generate order number or not
    protected $_set_order = FALSE;



    public function __construct()
    {
        parent::__construct();
    }

    /**
         * Counts all rows in table
         * If parameter set to TRUE counts all published items
         * (for portfolios and articles)
         * @param bool $published Published only (optional)
         * @return mixed Array of objects
         */
    public function count_all($published = FALSE)
    {
        if ($published)
        {
            $this->db->where('published', 1);
            $this->db->from($this->_table_name);
            return $this->db->count_all_results();
        }
        return $this->db->count_all($this->_table_name);
    }

    /**
         * Get db results by ID or by where condition
         * If no arguments passed get all rows from table
         * @param null|int $id ID (optional)
         * @param bool $single Get one row (optional)
         * @return mixed Array of objects (or one object)
         */
    public function get($id = NULL, $single = FALSE)
    {
        if ($id != NULL)
        {
            $this->db->where($this->_pk, $id);
            $method = 'row';
        }
        elseif ($single == TRUE)
        {
            $method = 'row';
        }
        else
        {
            $this->db->order_by($this->_order_by);
            $method = 'result';
        }
        return $this->db->get($this->_table_name)->$method();
    }

    /**
     * Get db results by where condition
     * If second param is set to TRUE get only one row
     * @param mixed $where Where condition (array or string)
     * @param bool $single Get one row (optional)
     * @return mixed Array of objects (or one object)
     */
    public function get_by($where, $single = FALSE)
    {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    /**
     * Computes order value that equals largest order in db +1
     * Used when adding items that can be reordered manually
     * So item you add appears at the end of the list
     * @return int Last number in order
     */
    public function get_last_order()
    {
        $this->db->select_max('order', 'max_order');
        $max = $this->db->get($this->_table_name)->row()->max_order;
        return $max+1;
    }

    /**
         * Saves new order of items in table
         * Works with nestedSortable jQuery plugin
         * @link https://github.com/ilikenwf/nestedSortable
         * @param array $pages Serialized array of items IDs and order number
         */
    public function save_order($pages = array())
    {
        if (count($pages))
        {
            $data = array();
            foreach ($pages as $order => $page)
            {
                if ($page['item_id'] != '')
                {
                    array_push($data, array(
                        'id' => (int) $page['item_id'],
                        'order' => (int) $order
                    ));
                }
            }
            $this->db->update_batch($this->_table_name, $data, 'id');
        }
    }

    /**
         * Insert data to db if second param is omitted,
         * otherwise update row by ID
         * @param null|int $id ID (optional)
         * @return int ID or inserted/updated row
         */
    public function save($id = NULL)
    {
        $data = $this->input->post();
        if (isset($data['end_date']) && empty($data['end_date'])) $data['end_date'] = NULL;

        // Insert
        if ($id == NULL)
        {
            if ($this->_set_order) $data['order'] = $this->get_last_order();
            //var_dump($data); exit;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else
        {
            if (isset($data[$this->_pk])) unset($data[$this->_pk]);
            //var_dump($data); exit;
            $this->db->where($this->_pk, $id);
            $this->db->update($this->_table_name, $data);
        }
        return $id;
    }

    /**
     * Delete a db row by ID
     * @param int $id ID
     * @return bool
     */
    public function delete($id)
    {
        if (empty($id))
        {
            return FALSE;
        }

        $this->db->where($this->_pk, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
        return TRUE;
    }

    /**
         * Make a slug based on title
         * @return string Slug
         */
    public function make_slug()
    {
        $slug = '';
        if ($this->input->post('title') != '')
        {
            $title = $this->input->post('title');
            $slug = url_title($title, '-', TRUE);
        }
        return json_encode(array('slug' => $slug));
    }

    /**
         * (Un)publish item by ID
         * @param int $id ID
         * @return bool
         */
    public function publish($id)
    {
        if ($id == NULL)
        {
            return FALSE;
        }
        $this->db->where($this->_pk, $id);
        $this->db->set('published', '!published', FALSE);
        $this->db->update($this->_table_name);
        return TRUE;
    }
} 