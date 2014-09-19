<!DOCTYPE html>
<html>
<head>
    <title><?php echo !empty($title) ? $title : '404 Not Found'; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <!-- bootstrap -->
    <link href="<?php echo base_url('admin/css/bootstrap/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('admin/css/bootstrap/bootstrap-overrides.css'); ?>" type="text/css" rel="stylesheet" />


    <?php
    if(!empty($styles))
    {
        echo '<!-- page specific styles -->';
        foreach($styles as $style)
        {
            echo link_tag($style).PHP_EOL;
        }
    }
    ?>

    <!-- libraries -->
    <link href="<?php echo base_url('admin/css/lib/font-awesome.css'); ?>" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/compiled/layout.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/compiled/elements.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/compiled/icons.css'); ?>" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    -->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<!-- navbar -->
<header class="navbar navbar-inverse" role="banner">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
            <span class="sr-only">Toggle navigation</span>
            <span style="color:#ffffff" class="fa fa-bars fa-2x"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('panel'); ?>">
            <img src="<?php echo base_url('admin/img/logo.png'); ?>" alt="logo" />
        </a>
    </div>
    <ul class="nav navbar-nav pull-right">
        <li class="settings hidden-xs">
            <a target="_blank" href="<?php echo site_url(); ?>">Back to website</a>
        </li>
        <li class="settings hidden-xs">
            <a href="<?php echo site_url('panel/user'); ?>">Personal info</a>
        </li>
        <li class="settings hidden-xs">
            <a href="<?php echo site_url('panel/settings'); ?>" title="Site settings" role="button">
                <i class="fa fa-cog"></i>
            </a>
        </li>
        <li class="settings">
            <a href="<?php echo site_url('panel/logout'); ?>" title="Log out" role="button">
                <i class="fa fa-sign-out"></i>
            </a>
        </li>
    </ul>

</header>
<!-- end navbar -->

<!-- sidebar -->
<?php echo admin_nav_menu(); ?>
<!--
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="<?php echo site_url('panel'); ?>">
                <i class="fa fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="fa fa-laptop"></i>
                <span>Resume</span>
                <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo site_url('panel/skills'); ?>">Skills</a></li>
                <li><a href="<?php echo site_url('panel/services'); ?>">Services</a></li>
                <li><a href="<?php echo site_url('panel/testimonials'); ?>">Testimonials</a></li>
                <li><a href="<?php echo site_url('panel/companies'); ?>">Experience</a></li>
                <li><a href="<?php echo site_url('panel/courses'); ?>">Courses</a></li>
                <li><a href="<?php echo site_url('panel/certificates'); ?>">Certificates</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="fa fa-briefcase"></i>
                <span>Portfolio</span>
                <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo site_url('panel/portfolio/items'); ?>">Portfolios</a></li>
                <li><a href="<?php echo site_url('panel/portfolio/categories'); ?>">Portfolio categories</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="fa fa-edit"></i>
                <span>Blog</span>
                <i class="fa fa-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo site_url('panel/blog/articles'); ?>">Articles</a></li>
                <li><a href="<?php echo site_url('panel/blog/categories'); ?>">Categories</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('panel/websites'); ?>">
                <i class="fa fa-compass"></i>
                <span>Websites</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('panel/user'); ?>">
                <i class="fa fa-info"></i>
                <span>Personal Info</span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('panel/settings'); ?>">
                <i class="fa fa-cog"></i>
                <span>Site Settings</span>
            </a>
        </li>
    </ul>
</div>
-->
<!-- end sidebar -->


<!-- main container -->
<div class="content">
