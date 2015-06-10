<?php
/**
 * Filters or hooks to modify wordpress
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */


//****************** body classes *************************//

if ( ! function_exists( '<%= themeNameSpace %>_body_class' ) ) :
  /**
   * Some extra classes for the body.
   *
   * @param $classes
   *
   *
   * @return $classes
   */

  function <%= themeNameSpace %>_body_class( $classes ) {
    global $post;
    
    $postType = ( get_query_var( 'post_type' ) ) ? get_query_var( 'post_type' ) : 1;
    
    if ( is_page() )
      $classes[] = $post->post_type . '-' . $post->post_name;

    
    if ( is_page() && !is_home() && !is_front_page() )
      $classes[] = 'single-page';

    return $classes;
  }
endif; // <%= themeNameSpace %>_body_class

add_filter( 'body_class', '<%= themeNameSpace %>_body_class' );