<?php
/**
 * @package WordPress
 * @subpackage <%= themeName %>
 */

get_header(); ?>

<main role="main">
  <?php if ( have_posts() ) : ?>
  
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts', 'content' ); ?>

    <?php endwhile; ?> 

      <?php get_template_part( 'template-parts', 'nav' ); ?>

  <?php else : ?>
    
    <?php get_template_part( 'template-parts/content', 'none' ); ?>

  <?php endif; ?>
  
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


