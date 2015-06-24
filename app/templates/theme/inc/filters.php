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

//****************** adjust video embeds, give them all iframe ids (for tracking) *************************//

if ( ! function_exists( '<%= themeNameSpace %>_video_params' ) ) :
  function <%= themeNameSpace %>_video_params( $html, $url, $args ) {
      
    //generate random id for each
    $randomID = uniqid('video');

    /* Force https */
    $html = str_replace('http://', '//', $html);

    /* Modify video parameters. */
    if ( strstr( $html, 'youtube.com/embed/' ) ) {
        $html = str_replace( '?feature=oembed', '?html5=1&feature=oembed&enablejsapi=1&controls=1&showinfo=0&rel=0&autohide=1&wmode=opaque', $html );
    } elseif ( strstr( $html, 'vimeo.com/video/' ) ) {
        $html = str_replace( '" width', '?api=1&player_id='.$randomID.'&badge=0&byline=0&title=0&portrait=0" width', $html );
    }

    //add id to iframe 
    $html = str_replace( '<iframe', '<iframe id="'. $randomID .'"', $html );


    return '<p class="video">'.$html.'</p>';
  }
add_filter( 'embed_oembed_html', '<%= themeNameSpace %>_video_params', 10, 3 );