<?php
/**
 * not found or no results
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>

  <article class="not-found no-results">

    <header class="page-header">
      <h1 class="page-title"><?php esc_html_e( 'Nothing Found', '<%= themeNameSpace %>_domain' ); ?></h1>
    </header>

  	<div class="content">
	    <?php if( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '<%= themeNameSpace %>_domain' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '<%= themeNameSpace %>_domain' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
	  </div>

  </article>