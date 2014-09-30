<?php
/**
 * @package WordPress
 * @subpackage <%= themeName %>
 */



if ( ! function_exists( '<%= themeNameSpace %>_setup' ) ) :

  function <%= themeNameSpace %>_setup() {

    //post thumbs/featured images
    add_post_type_support( 'attachment:audio', 'thumbnail' );
    add_post_type_support( 'attachment:video', 'thumbnail' );
     
    add_theme_support( 'post-thumbnails' );

    // html5 semantic markup
    add_theme_support( 'html5' );

    //custom post types & taxonomies
    <%= themeNameSpace %>_register_custom_post_types(); // ~*~ one function to rule them all ~*~
    <%= themeNameSpace %>_register_custom_taxonomies(); // ~*~ one function to rule them all ~*~

  };

endif; // <%= themeNameSpace %>_setup

add_action( 'after_setup_theme', '<%= themeNameSpace %>_setup' );



// Widgetized Sidebar HTML5 Markup - default
if ( ! function_exists( '<%= themeNameSpace %>_widgets_init' ) ) :
  function <%= themeNameSpace %>_widgets_init() {
    register_sidebar(array(
      'before_widget' => '<section>',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widgettitle">',
      'after_title' => '</h2>',
    ));
  }
endif; // <%= themeNameSpace %>_widgets_init
add_action( 'widgets_init', '<%= themeNameSpace %>_widgets_init' );



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

}; // end post types



//****************** script reg/queue etc. *************************//
function <%= themeNameSpace %>_scripts_styles() {


  if ( !is_admin() ) {
    wp_register_script( 'App', get_stylesheet_directory_uri().'/assets/js/app.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'App' );

    // wp_register_script( 'Modernizr', get_template_directory_uri().'/assets/js/lib/modernizr-2.6.2.min.js', array( 'jquery' ), '2.6.2', false );
    // wp_enqueue_script( 'Modernizr' );

    if( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) {
      wp_enqueue_style( '<%= themeNameSpace %>', get_template_directory_uri() . "/assets/src/css/main.css", array(), NULL );
    } else {
      wp_enqueue_style( '<%= themeNameSpace %>', get_template_directory_uri() . "/assets/css/main.min.css", array(), NULL );
    }

  }

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', '<%= themeNameSpace %>_scripts_styles' );


//****************** Filters *************************//
// all scripts that filter or add filtrs to WP content before display




//****************** live functions *************************//

// place functions needed in the template to generate on the fly like custom headlines, date formatting, etc.







