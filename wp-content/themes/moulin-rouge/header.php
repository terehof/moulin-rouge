<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/select2.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css"/>
    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <header class="narrow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<? echo get_home_url(); ?>" class="logo"></a>
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </header>