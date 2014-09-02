<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">

		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="<?php bloginfo('name'); ?>">
		
	<meta name="viewport"  content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-144x144-precomposed.png">

	<? // favicon/icons are most reliable when put at web root ?>

	
		<!-- Wordpress Head Items -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>


	<script>
		Modernizr.load({
			test: Modernizr.input.placeholder,
			nope:
			[
				'<?= "{$template_url}assets/css/placeholder_polyfill.min.css" ?>',
				'<?= "{$template_url}assets/js/lib/placeholder_polyfill.jquery.min.combo.js" ?>'
			]
		});
	</script>

</head>
<body <?php body_class(); ?>>
	<!--[if lte IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> to better experience this site.</p>
	<![endif]-->

	<header role="banner">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</header>

	<div class="container">
