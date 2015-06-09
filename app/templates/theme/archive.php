<?php
/**
 * template for archive and listings
 * 
 * @package WordPress
 * @subpackage <%= themeName %>
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
      </header><!-- .page-header -->

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'excerpt' ); ?>

      <?php endwhile; ?>

      <?php get_template_part( 'template-parts', 'nav'); ?>

    <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
