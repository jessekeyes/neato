<?php
/**
 * @package WordPress
 * @subpackage <%= themeName %>
 */

get_header(); ?>

<main role="main">
  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'page' ); ?> 
  
  <?php endwhile; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
