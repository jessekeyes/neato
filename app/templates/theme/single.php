<?php
/**
 * @package WordPress
 * @subpackage <%= themeName %>
 */

get_header(); ?>

<section id="main" role="main">

  <?php get_template_part( 'parts', 'loop' ); ?>

</section>

<?php get_footer(); ?>
