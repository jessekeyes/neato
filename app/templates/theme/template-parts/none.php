<?php
/**
 * not found or no results
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>

  <article class="not-found no-results">

    <header class="post-header">
      <h1 class="post-title"><?php esc_html_e( 'Nothing Found', '<%= themeName %>' ); ?></h1>
    </header>

  	<div class="content">
	    <?php if( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '<%= themeName %>' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '<%= themeName %>' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
	  </div>

  </article>