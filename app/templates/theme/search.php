<?php
/**
 * Search template
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */

get_header(); ?>

  <main class="site-main" role="main">

  <?php if ( have_posts() ) : ?>

    <header class="page-header">
      <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', '<%= themeName %>' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/content', 'excerpt' ); ?>

    <?php endwhile; ?>

    <?php get_template_part( 'template-parts', 'nav' ); ?>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

  <?php endif; ?>

  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
