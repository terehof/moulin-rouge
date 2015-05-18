<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); wp_title(); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/select2.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css"/>
    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="girl"></div>
                    <a href="<? echo get_home_url(); ?>" class="logo-big"></a>
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </header>