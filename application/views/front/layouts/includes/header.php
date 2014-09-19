<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $seo->title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $seo->description; ?>">
    <!--bootstrap css-->
    <link href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("bootstrap/css/bootstrap-overrides.css"); ?>" rel="stylesheet">
    <!--google web fonts css-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <!-- font-awesome -->
    <link href="<?php echo base_url('css/font-awesome.css'); ?>" type="text/css" rel="stylesheet" />

    <?php
    if(!empty($styles))
    {
        foreach($styles as $style)
        {
            echo link_tag($style).PHP_EOL;
        }
    }
    ?>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="<?php echo base_url('js/respond.js'); ?>"></script>
    <![endif]-->
</head>