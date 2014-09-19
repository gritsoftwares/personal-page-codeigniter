<?php

/**
 * Class Website_model
 * Model for user websites
 */
class Website_model extends MY_Model {

    protected $_table_name = 'contacts';
    public $rules = array(
        'website_id' => array(
            'field' => 'website_id',
            'label' => 'Website',
            'rules' => 'required'
        ),
        'account' => array(
            'field' => 'account',
            'label' => 'Account',
            'rules' => 'trim|required|xss_clean|callback_combpk[contacts.website_id.account]'
        )
    );
    protected $_order_by = 'order asc';
    protected $_set_order = TRUE;



    public function __construct()
    {
        parent::__construct();
    }

    /**
         * Get all user websites or the one by ID
         * @param null|int $id Website ID (optional)
         * @return array Array of objects
         */
    public function get_my_websites_admin($id = NULL)
    {
        $this->db->select('c.id, w.title, w.link, w.icon, w.color, c.account', FALSE);
        $this->db->from('contacts as c');
        $this->db->join('websites as w', 'c.website_id = w.id', 'left');
        if ($id != NULL)
        {
            $this->db->where('c.id', $id);
        }
        $this->db->order_by('order asc');
        $result = $this->db->get()->result();

        foreach($result as $item)
        {
            // calculate link to account
            if ( ! in_array($item->title, array('deviantART', 'Skype')))
            {
                $item->url = $item->link . $item->account;
            }
            else
            {
                $item->url = str_replace('name', $item->account, $item->link);
            }
        }

        return $id ? $result[0] : $result;
    }

    /**
         * Gets all available websites for adding/editing user account
         * @return array Array of objects
         */
    public function get_all_websites()
    {
        $this->db->select('id, title');
        $this->db->order_by('title asc');
        return $this->db->get('websites')->result();
    }
} 