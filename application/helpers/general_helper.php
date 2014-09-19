<?php

/**
 * Custom 404 function
 */
function custom_404()
{
    include(APPPATH.'controllers/error.php');
    $error = new Error();
    $error->_404();
}

/**
 * Navigation menu for homepage and blog
 * @return string
 */
function nav_menu()
{
    $menu  = "";
    $menu .= '<ul class="nav navbar-nav navbar-right">';
    $menu .= '<li><a href="'.site_url('#home').'">Home</a></li>';
    $menu .= '<li><a href="'.site_url('#about').'">About Me</a></li>';
    $menu .= '<li><a href="'.site_url('#whatdo').'">What i do</a></li>';
    $menu .= '<li><a href="'.site_url('#work').'">My Work</a></li>';
    $menu .= '<li><a href="'.site_url('blog').'">Blog</a></li>';
    $menu .= '<li><a href="'.site_url('#contact').'">Contact</a></li>';
    $menu .= '</ul>';
    return $menu;
}

/**
 * Defines if admin panel menu is active
 * @return string CSS Class
 */
function active_menu()
{
    $CI =& get_instance();

    $class = '';
    if($CI->router->fetch_class() == 'blog') {
        $class = 'class="navbar-item-active"';
    }
    return $class;
}

/**
 * Generates admin menu panel
 * @return string
 */
function admin_nav_menu()
{
    $CI =& get_instance();
    $seg2 = $CI->uri->segment(2);
    $controller = $CI->router->fetch_class();
    $menu = array(
        'Home' => array(
            'uri' => 'dashboard',
            'icon' => 'fa fa-home fa-fw',
        ),
        'Resume' => array(
            'sub' => array(
                'Skills' => 'skills',
                'Services' => 'services',
                'Testimonials' => 'testimonials',
                'Companies' => 'companies',
                'Courses' => 'courses',
                'Certificates' => 'certificates'
            ),
            'icon' => 'fa fa-mortar-board fa-fw',
        ),
        'Portfolio' => array(
            'sub' => array(
                'Portfolios' => 'portfolio/items',
                'Portfolio categories' => 'portfolio/categories'
            ),
            'icon' => 'fa fa-briefcase fa-fw',
        ),
        'Blog' => array(
            'sub' => array(
                'Articles' => 'blog/articles',
                'Categories' => 'blog/categories'
            ),
            'icon' => 'fa fa-edit fa-fw',
        ),
        'Websites' => array(
            'uri' => 'websites',
            'icon' => 'fa fa-globe fa-fw',
        ),
        'Personal info' => array(
            'uri' => 'user',
            'icon' => 'fa fa-user fa-fw',
        ),
        'Settings' => array(
            'uri' => 'settings',
            'icon' => 'fa fa-cog fa-fw',
        ),
        'SEO' => array(
            'uri' => 'seo',
            'icon' => 'fa fa-search fa-fw',
        ),
    );

    $nav = '<div id="sidebar-nav">
                <ul id="dashboard-menu">'.PHP_EOL;
    foreach ($menu as $k => $v)
    {
        if (array_key_exists('uri', $v))
        {
            $active = ($controller == $v['uri']) ? true : false;
            $nav .= '<li'.($active ? ' class="active"' : '').'>'.PHP_EOL;
            $nav .= $active ?
                '<div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>'.PHP_EOL : '';
            $nav .= '<a href="'.site_url('panel/'.$v['uri']).'">
                        <i class="'.$v['icon'].'"></i>
                        <span>'.$k.'</span>
                    </a>
                </li>'.PHP_EOL;
        }
        elseif (array_key_exists('sub', $v))
        {
            if ($seg2 == $controller)
            {
                $active = (in_array($controller, array_values($v['sub']))) ? true : false;
                $nav .= '<li'.($active ? ' class="active"' : '').'>'.PHP_EOL;
                $nav .= $active ?
                    '<div class="pointer">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>'.PHP_EOL : '';
                $nav .= '<a class="dropdown-toggle" href="#">
                            <i class="'.$v['icon'].'"></i>
                            <span>'.$k.'</span>
                            <i class="fa fa-angle-down fa-fw"></i>
                        </a>'.PHP_EOL;
                $nav .= '<ul class="submenu'.($active ? ' active' : '' ).'">'.PHP_EOL;
                foreach ($v['sub'] as $key => $val)
                {
                    $active_item = ($controller == $val) ? true : false;
                    $nav .= '<li><a'.($active_item ? ' class="active"' : '').' href="'.site_url('panel/'.$val).'">'.$key.'</a></li>'.PHP_EOL;
                }
                $nav .= '</ul>
                    </li>'.PHP_EOL;
            }
            else
            {
                $active = (in_array($seg2.'/'.$controller, array_values($v['sub']))) ? true : false;
                $nav .= '<li'.($active ? ' class="active"' : '').'>'.PHP_EOL;
                $nav .= $active ?
                    '<div class="pointer">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>'.PHP_EOL : '';
                $nav .= '<a class="dropdown-toggle" href="#">
                            <i class="'.$v['icon'].'"></i>
                            <span>'.$k.'</span>
                            <i class="fa fa-angle-down fa-fw"></i>
                        </a>'.PHP_EOL;
                $nav .= '<ul class="submenu'.($active ? ' active' : '' ).'">'.PHP_EOL;
                foreach ($v['sub'] as $key => $val)
                {
                    $active_item = ($seg2.'/'.$controller == $val) ? true : false;
                    $nav .= '<li><a'.($active_item ? ' class="active"' : '').' href="'.site_url('panel/'.$val).'">'.$key.'</a></li>'.PHP_EOL;
                }
                $nav .= '</ul>
                    </li>'.PHP_EOL;
            }
        }

    }
    $nav .= '</ul>
        </div>'.PHP_EOL;

    return $nav;

}

/**
 * Link shortener
 * @param int $url Link URL
 * @return string Domain name
 */
function link_short($url)
{
    if (($www = strpos($url, 'www')) !== FALSE)
    {
        $url = substr($url, $www+4);
    }
    elseif (($http = strpos($url, '://')) !== FALSE)
    {
        $url = substr($url, $http+3);
    }

    if (($slash = strpos($url, '/')) !== FALSE)
    {
        $url = substr($url, 0, $slash);
    }
    return $url;
}

/**
 * Generates comma separated list of categories for
 * Portfolios and Blog Articles listings
 * @param array $categories Categories
 * @return bool|string
 */
function cats_list($categories = array())
{
    if (! is_array($categories))
    {
        return FALSE;
    }

    $str = '';
    foreach($categories as $id => $title)
    {
        $str .= "<a href='".site_url('panel/portfolio/items/category/'.$id)."'>{$title}</a>, ";
    }

    return substr(trim($str), 0, -1);
}