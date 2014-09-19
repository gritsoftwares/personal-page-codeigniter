<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>Detail Admin - Sign in</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <!-- bootstrap  -->
    <link href="<?php echo base_url('admin/css/bootstrap/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('admin/css/bootstrap/bootstrap-overrides.css'); ?>" type="text/css" rel="stylesheet" />

    <!-- global styles   -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/compiled/elements.css'); ?>" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo base_url('admin/css/compiled/signin.css'); ?>" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>


<div class="login-wrapper">

    <img class="logo" src="<?php echo base_url('admin/img/logo-white.png'); ?>" alt="logo" />

    <div class="box">
        <div class="content-wrap">
            <h6>Log in</h6>
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>
            <?php echo !empty($error) ? '<div class="alert alert-danger">'.$error.'</div>' : ''; ?>
            <?php echo form_open(); ?>
            <?php echo form_input(array(
                'name' => 'email',
                'value' => set_value('email'),
                'class' => 'form-control',
                'placeholder' => 'E-mail address'
            )); ?>
            <?php echo form_password(array(
                'name' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Your password'
            )); ?>
            <?php echo form_submit(array(
                'value' => 'Log in',
                'class' => 'btn-glow primary login'
            )); ?>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

</body>
</html>