<?php
/**
 * Generic content
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class() ?>>

    <header class="post-header">
      <?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    </header>

  	<div class="content">
	    <?php the_content( _e( 'Continue reading &raquo;', '<%= themeNameSpace %>_domain' ) ); ?>
	  </div>

  </article>