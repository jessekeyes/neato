<?php
/**
 * @package WordPress
 * @subpackage <%= themeName %>
 */

/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="main">

  <h2>Links:</h2>
  <ul>
    <?php wp_list_bookmarks(); ?>
  </ul>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
