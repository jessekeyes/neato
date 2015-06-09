<?php
/**
 * @package WordPress
 * @subpackage <%= themeName %>
 */

get_header(); ?>

  <main class="site-main" role="main">

    <?php get_template_part( 'template-parts/content', 'none' ); ?> 

  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>