<?php

/**
 * Class Skill_model
 * Model for user skills
 */
class Skill_model extends MY_Model {

    protected $_table_name = 'skills';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[skills.title]'
        ),
        'level_id' => array(
            'field' => 'level_id',
            'label' => 'Level',
            'rules' => 'required|integer'
        )
    );
    protected $_order_by = 'order asc';
    protected $_set_order = TRUE;



    public function __construct()
    {
        parent::__construct();
    }

    /**
         * Gets all user skills with levels of expertise
         * @return array Array of objects
         */
    public function get_all_skills()
    {
        $this->db->select('s.id, s.title, l.title as level, l.percent');
        $this->db->from('skills as s');
        $this->db->join('skill_levels as l', 's.level_id=l.id', 'left');
        $this->db->order_by('order', 'asc');
        return $this->db->get()->result();
    }

    /**
         * Gets all levels for adding/editing a skill
         * @return array Array of objects
         */
    public function get_all_levels()
    {
        $this->db->select('id, title');
        $this->db->order_by('percent', 'asc');
        return $this->db->get('skill_levels')->result();
    }

} 