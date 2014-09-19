<?php

/**
 * Class Portfolio_Items_model
 * Model for portfolio items
 */
class Portfolio_Items_model extends MY_Model {

    protected $_table_name = 'portfolios';
    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[portfolios.title]'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|min_length[3]|xss_clean|callback_unique[portfolios.slug]'
        ),
        'description' => array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required|min_length[3]|xss_clean'
        ),
        'technologies' => array(
            'field' => 'technologies',
            'label' => 'Technologies',
            'rules' => 'trim|min_length[2]|xss_clean'
        ),
        'link' => array(
            'field' => 'link',
            'label' => 'Link',
            'rules' => 'trim|required|min_length[4]|xss_clean|callback_unique[portfolios.link]|prep_url'
        ),
        'img' => array(
            'field' => 'img',
            'label' => 'Image',
            'rules' => 'callback_portfolio_upload_handle[img]'
        ),
        'categories' => array(
            'field' => 'categories',
            'label' => 'Categories',
            'rules' => 'required'
        ),
        'completion_date' => array(
            'field' => 'completion_date',
            'label' => 'Completed',
            'rules' => 'trim|required|date_to_timestamp'
        ),
        'published' => array(
            'field' => 'published',
            'label' => 'Published',
            'rules' => 'integer'
        )
    );
    protected $_order_by = 'completion_date desc';



    public function __construct()
    {
        parent::__construct();
    }

    /**
         * Gets all published portfolio items and their categories
         * @return array Array of objects
         */
    public function get_all_portfolio_front()
    {
        $this->db->select("p.title, p.slug, GROUP_CONCAT(c.slug SEPARATOR ' ') as cat_slug, p.img, CONCAT('img', p.id, '_small.jpg') as thumbnail", FALSE);
        $this->db->from('portfolios as p');
        $this->db->join('port_cat as pc', 'pc.portfolio_id=p.id AND p.published = 1', 'inner');
        $this->db->join('portfolio_categories as c', 'pc.category_id=c.id', 'inner');
        $this->db->group_by('p.title');
        $this->db->order_by('p.completion_date', 'DESC');
        return $this->db->get()->result();
    }

    /**
         * Gets portfolio item by slug
         * @param string $slug Portfolio Item slug
         * @return object
         */
    public function get_item_front($slug)
    {
        $this->db->select("title, description, technologies, link, img, CONCAT('img', id, '_big.jpg') as image, completion_date", FALSE);
        $this->db->where('slug', $slug);
        $this->db->where('published', 1);
        return $this->db->get('portfolios')->row();
    }


    /**
         * Gets item categories
         * @param int $id Portfolio Item ID
         * @return array
         */
    public function get_item_categories($id)
    {
        $this->db->select('c.id, c.title');
        $this->db->from('portfolio_categories as c');
        $this->db->join('port_cat as pc', 'pc.category_id = c.id', 'inner');
        $this->db->where('pc.portfolio_id', $id);
        $cats =  $this->db->get()->result();
        $array = array();
        foreach ($cats as $cat)
        {
            $array[$cat->id] = $cat->title;
        }
        return $array;
    }

    /**
         * Gets all portfolio items with their categories
         * @return array Array of objects
         */
    public function get_all_portfolio_admin()
    {
        $this->db->select("id, title, link, img, CONCAT('img', id, '_small.jpg') as thumbnail, completion_date, published", FALSE);
        $this->db->order_by('completion_date', 'DESC');
        $portfolios = $this->db->get('portfolios')->result();
        $array = array();
        foreach ($portfolios as $item)
        {
            $categories = $this->get_item_categories($item->id);
            $item->categories = $categories;
            array_push($array, $item);
        }
        return $array;
    }

    /**
         * Get all portfolio items by category ID
         * @param null|int $id Portfolio Category ID
         * @return mixed
         */
    public function get_portfolio_by_cat_admin($id = NULL)
    {
        if ($id == NULL)
        {
            return FALSE;
        }
        $this->db->select("p.id, p.title, p.link, p.img, CONCAT('img', p.id, '_small.jpg') as thumbnail, p.completion_date, p.published, c.title as cat_title", FALSE);
        $this->db->from('portfolios as p');
        $this->db->join('port_cat as pc', 'pc.portfolio_id = p.id', 'inner');
        $this->db->join('portfolio_categories as c', 'pc.category_id = c.id', 'inner');
        $this->db->where('c.id', $id);
        $this->db->order_by('p.completion_date', 'DESC');
        return $this->db->get()->result();
    }

    /**
         * Get one portfolio item for editing
         * @param null|int $id Portfolio Item ID
         * @return object
         */
    public function get_one_portfolio_admin($id = NULL)
    {
        if ($id == NULL)
        {
            return FALSE;
        }
        $this->db->select('id, title, slug, description, technologies, link, img, CONCAT("img", id, "_small.jpg") as thumbnail, completion_date, published', FALSE);
        $this->db->where('id', $id);
        $item = $this->db->get('portfolios')->row();
        $item->categories = $this->get_item_categories($id);
        return $item;
    }

    /**
         * Save portfolio item and all chosen categories
         * @param int|null $id Portfolio Item ID (optional)
         * @return int Portfolio Item ID
         */
    public function save($id)
    {
        $categories = $this->input->post('categories');
        unset($_POST['categories']);
        $id = parent::save($id);

        // delete from port_cat
        $this->db->delete('port_cat', array('portfolio_id' => $id));

        // insert into port_cat
        $data = array();
        foreach($categories as $cat)
        {
            array_push($data, array(
                'portfolio_id' => $id,
                'category_id' => $cat
            ));
        }
        $this->db->insert_batch('port_cat', $data);

        return $id;
    }

    /**
         * Resize uploaded portfolio image and save 2 versions:
         * 1) big image width 750px; 2) thumbnail 360x236
         * @param null|int $id Portfolio Item ID
         * @return bool
         */
    public function resize_img($id = NULL)
    {
        if ($id == NULL)
        {
            return FALSE;
        }

        $this->load->library('image_lib');

        // resize big image
        $config = array(
            'image_library' => 'ImageMagick',
            'library_path' => '/usr/bin',
            'overwrite' => TRUE,
            'source_image' => TMP_FULL_PORTFOLIO,
            'maintain_ratio' => TRUE,
            'width' => 750,
            'new_image' => 'img'.$id.'_big.jpg'
        );
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        // resize small image to width=360px
        $thumb = 'img'.$id.'_small.jpg';
        $config = array(
            'image_library' => 'ImageMagick',
            'library_path' => '/usr/bin',
            'overwrite' => TRUE,
            'source_image' => TMP_FULL_PORTFOLIO,
            'maintain_ratio' => TRUE,
            'width' => 360,
            'new_image' => $thumb
        );
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        // crop small image if its height > 236px
        $thumb = UPLOAD_DIR_PORTFOLIO.$thumb;
        $size = getimagesize($thumb);
        $height = $size[1];
        if ($height > 236)
        {
            $config = array(
                'image_library' => 'ImageMagick',
                'library_path' => '/usr/bin',
                'source_image' => $thumb,
                'maintain_ratio' => FALSE,
                'height' => 236
            );
            $this->image_lib->initialize($config);
            $this->image_lib->crop();
            $this->image_lib->clear();
        }

        // delete tmp img
        unlink(TMP_FULL_PORTFOLIO);
        return TRUE;
    }

    /**
         * Deletes portfolio images by ID
         * @param null|int $id Portfolio Item ID
         * @return bool
         */
    public function delimg($id)
    {
        if ($id == NULL)
        {
            return FALSE;
        }
        $this->db->where($this->_pk, $id);
        $this->db->update($this->_table_name, array('img' => 0));

        unlink(UPLOAD_DIR_PORTFOLIO.'img'.$id.'_big.jpg');
        unlink(UPLOAD_DIR_PORTFOLIO.'img'.$id.'_small.jpg');
        return TRUE;
    }

}