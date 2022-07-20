<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-10559177-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-10559177-1');
    </script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.min.css">
    <?php wp_head(); ?>

    <meta name="theme-color" content="#6E32FF" />
</head>

<body data-barba="wrapper">
    <?php wp_body_open(); ?>
    <?php get_template_part('template-parts/topbar'); ?>
    <div class="page-position"></div>
    <?php get_template_part('template-parts/main-nav'); ?>