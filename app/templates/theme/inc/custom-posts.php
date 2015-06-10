<?php
/**
 * Custom post types should all be declared here
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */

//****************** All custom post types declared here. *************************//

if ( ! function_exists( '<%= themeNameSpace %>_register_custom_post_types' ) )
{
  /**
    * Register custom post types for Project
    *
    * @uses register_post_types
  */
  function <%= themeNameSpace %>_register_custom_post_types()
  {
    /* Example format
      function <%= themeNameSpace %>_post_type_name() {
        register_post_type( 'whatever', $args );
      }
      //then declare the function explicitly, since only this wrapper function is called in set up.
      <%= themeNameSpace %>_post_type_name();
    */
  }

}; // end post types

