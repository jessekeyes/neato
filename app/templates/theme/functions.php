<?php
/**
 * Main functions.php file use for set up. Include other modules as necessary
 *
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

    //custom menus
    <%= themeNameSpace %>_register_menus();

  };

endif; // <%= themeNameSpace %>_setup

add_action( 'after_setup_theme', '<%= themeNameSpace %>_setup' );


//****************** menus/widgets/image sizes ****************************//

function <%= themeNameSpace %>_register_menus() {
  register_nav_menus(
    array(
      'primary_nav' => __( 'Primary Nav' ),
      'footer_nav' => __( 'Footer Nav' )
    )
  );
}

// Widgetized Sidebar HTML5 Markup - default
if ( ! function_exists( '<%= themeNameSpace %>_widgets_init' ) ) :
  function <%= themeNameSpace %>_widgets_init() {
    register_sidebar(array(
      'name'          => __( 'Sidebar', '<%= themeNameSpace %>_domain' ),
      'id'            => 'sidebar-1',
      'description'   => __( 'default sidebar', '<%= themeNameSpace %>_domain' ),
      'before_widget' => '<section>',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widgettitle">',
      'after_title' => '</h2>',
    ));
  }
endif; // <%= themeNameSpace %>_widgets_init
add_action( 'widgets_init', '<%= themeNameSpace %>_widgets_init' );


//****************** remove extraneous *************************//

add_action( 'wp_head', 'remove_widget_action', 1);
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );  
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
remove_filter( 'the_content', 'prepend_attachment' );

function remove_widget_action() {
  global $wp_widget_factory;
  
  remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
}

function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


//****************** script reg/queue etc. *************************//
function <%= themeNameSpace %>_scripts_styles() {


  if ( !is_admin() ) {

    wp_enqueue_style( '<%= themeNameSpace %>', get_template_directory_uri() . "/assets/css/main.min.css", array(), NULL );

    wp_register_script( 'App', get_stylesheet_directory_uri().'/assets/js/app.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'App' );

    // scripts that need to be in the head, like modernizr.js
    wp_register_script( 'headJS', get_template_directory_uri().'/assets/js/head.js', array( 'jquery' ), 1.0, false );
    wp_enqueue_script( 'headJS' );

  }

};

function <%= themeNameSpace %>_admin_scripts_styles() {
  wp_enqueue_style( '<%= themeNameSpace %>-admin', get_template_directory_uri() . "/assets/css/admin.min.css", array(), NULL );

  wp_register_script( 'Admin', get_stylesheet_directory_uri().'/assets/js/admin.js', array( 'jquery' ), 1.0, true );
  wp_enqueue_script( 'Admin' );


};

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', '<%= themeNameSpace %>_scripts_styles' );

// Hook into the 'admin_enqueue_scripts' action
add_action( 'admin_enqueue_scripts', '<%= themeNameSpace %>_admin_scripts_styles' );


//****************** Custom Post Types *************************//
// declare custom post types 
require get_template_directory() . '/inc/custom-posts.php';

//****************** Custom Taxonomies *************************//
// declare custom post types 
require get_template_directory() . '/inc/custom-taxonomies.php';


//****************** Filters & hooks *************************//
// all scripts that filter or add filters to WP content before display
require get_template_directory() . '/inc/filters.php';

//****************** Admin functions *************************//
// all functions that affect the admin screen and interface
require get_template_directory() . '/inc/admin.php';


//****************** View functions *************************//
// place functions needed in the template to generate on the fly like custom headlines, date formatting, etc.
require get_template_directory() . '/inc/views.php';

//****************** Utilty functions *************************//
// place functions needed in the template to generate on the fly like custom headlines, date formatting, etc.
require get_template_directory() . '/inc/utils.php';

