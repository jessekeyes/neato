<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<meta name="description" content="">
		<meta name="author" content="">
		
		<meta name="viewport" content="width=device-width">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."assets/css/main.css") ?>
	
		
		<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
		<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."assets/js/lib/modernizr-2.6.2.min.js") ?>
	
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
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->

	<header role="banner">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</header>

	<div class="container">
