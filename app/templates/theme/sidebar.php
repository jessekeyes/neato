<?php
/**
 * Sidebar 
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>
<aside class="sidebar">

  <?php if ( is_active_sidebar( 'sidebar-1' ) ) :
    dynamic_sidebar( 'sidebar-1' );
  else: ?>
  <section>
    <?php get_search_form(); ?>
  </section>
  
  <nav role="navigation">
  	<ul>
	    <?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
	  </ul>
  </nav>
	<?php endif; ?>

</aside>

