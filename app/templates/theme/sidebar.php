<?php
/**
 * Sidebar 
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>
<aside class="sidebar">
  <?php if ( is_active_sidebar( 'sidebar' ) ) :
    dynamic_sidebar( 'sidebar' );
  endif; ?>
  <section>
    <?php get_search_form(); ?>
  </section>
  
  <nav role="navigation">
    <?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>

  </nav>
</aside>

