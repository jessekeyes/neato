<?php
/**
 * Generic loop
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */

$is_blog = ( is_home() || is_singular('post') || is_post_type_archive('post') )


?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <header>
      <h1><?php the_title(); ?></h1>
    </header>
  	<div class="content">
	    <?php the_content( 'Continue reading &raquo;' ); ?>
	  </div>

    <?php if( $is_blog ) : // true blog posts ?>
    <footer>
      <?php the_tags('Tags: ', ', ', '<br>'); ?> 
      Posted in <?php the_category(', ') ?>
      | <?php edit_post_link('Edit', '', ' | '); ?>
      <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
    </footer>
    <?php endif; ?>
  </article>
<?php endwhile; ?>

	<nav>
	  <div><?php next_posts_link('&laquo; Previous') ?></div>
	  <div><?php previous_posts_link('Next &raquo;') ?></div>
	</nav>

	<?php if( $is_blog && comments_open() ) comments_template(); ?>

<?php else : ?>

  <article <?php post_class() ?> id="post-not-found">
    <header>
      <h1>Not Found</h1>
    </header>
    <div class="content">
      <p>Sorry, but you are looking for something that isn't here.</p>

      <?php get_search_form(); ?>
    </div>
  </article>

 <?php endif; ?>