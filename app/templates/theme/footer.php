<?php
/**
	* the footer of the doc, could have content, could just end the document.
	*
 * @package WordPress
 * @subpackage <%= themeName %>
 */
?>


</div> <!-- /.container -->

<footer>
    <p>
      <?php bloginfo('name'); ?> is proudly powered by
      <a href="http://wordpress.org/">WordPress</a>.
      <br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>.
      <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
    </p>
</footer>

			   
  <?php wp_footer(); ?>

</body>
</html>
