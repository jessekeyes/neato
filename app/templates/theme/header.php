<?php
/**
 * header of the theme
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="<?php bloginfo('name'); ?>">
	<meta name="viewport"  content="width=device-width, initial-scale=1">
	<title><?php wp_title(''); ?></title>
	<? // favicon/icons are most reliable when put at web root, but other systems need them so generate them using http://realfavicongenerator.net ?>

<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_url');?>/assets/js/vendor/html5shiv.min.js"></script>
<![endif]-->


<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<!--[if lte IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> to better experience this site.</p>
	<![endif]-->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '<%= themeName %>' ); ?></a>
	<header class="site-header" role="banner">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</header>

	<div class="container">
