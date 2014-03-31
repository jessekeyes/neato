<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>


</div> <!--! end of .container -->

<footer>
    <p>
      <?php bloginfo('name'); ?> is proudly powered by
      <a href="http://wordpress.org/">WordPress</a>, and built using the <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.
      <br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
      and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
      <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
    </p>
</footer>

			   
  <?php wp_footer(); ?>

</body>
</html>
