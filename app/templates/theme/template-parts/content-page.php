<?php
/**
 * Page content
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>

  <article id="page-<?php the_ID(); ?>" <?php post_class() ?>>

    <header class="page-header">
      <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
    </header>

  	<div class="content">
	    <?php the_content( _e( 'Continue reading &raquo;', '<%= themeName %>' ) ); ?>
	  </div>

  </article>