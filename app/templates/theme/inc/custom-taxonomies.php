<?php
/**
 * Custom post taxonomies should all be declared here
 *
 * @package WordPress
 * @subpackage <%= themeName %>
 */

//****************** All custom taxonimies declared here *************************//

if ( ! function_exists( '<%= themeNameSpace %>_register_custom_taxonomies' ) )
{
  /**
    * Register custom taxonomies for Project
    *
    * @uses register_taxonomy
  */
  function <%= themeNameSpace %>_register_custom_taxonomies()
  {

    /* Example format
      function <%= themeNameSpace %>_taxonomy_name() {
        register_taxonomy( 'whatever', $args );
      }
      //then declare the function explicitly, since only this wrapper function is called in set up.
      <%= themeNameSpace %>_taxonomy_name();
    */

  }

}; // end taxonomies