<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pubblicitario_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script src="<?=get_bloginfo('template_url')?>/js/swiper.min.js"></script>
<script src="<?=get_bloginfo('template_url')?>/js/jquery.marquee.js"></script>
<link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/css/swiper.min.css">
<link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/css/style.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

