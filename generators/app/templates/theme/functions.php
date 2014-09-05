<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */



if ( ! function_exists( 'PREFIX_setup' ) ) :

  function PREFIX_setup() {

    //thumb sizes

    //custom post types & taxonomies
    PREFIX_register_custom_post_types(); //load them all in one function
    PREFIX_register_custom_taxonomies(); //load them all in one function

  };

endif; // PREFIX_setup

add_action( 'after_setup_theme', 'PREFIX_setup' );



// ALL custom post types declared here

if ( ! function_exists( 'PREFIX_register_custom_post_types' ) )
{
  /**
    * Register custom post types for Project
    *
    * @uses register_post_types
  */
  function PREFIX_register_custom_post_types()
  {


  }

}; // end post types

// ALL custom taxonomies declared here

if ( ! function_exists( 'PREFIX_register_custom_taxonomies' ) )
{
  /**
    * Register custom taxonomies for Project
    *
    * @uses register_taxonomy
  */
  function PREFIX_register_custom_taxonomies()
  {


  }

}; // end post types


//****************** markup functions *************************//

// Custom HTML5 Comment Markup
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      <article id="comment-<?php comment_ID(); ?>">
        <div class="comment-author vcard">
          <?php echo get_avatar( $comment, 40 ); ?>
          <?php printf( __( '%s <span class="says">says:</span>', 'boilerplate' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
        </div><!-- .comment-author .vcard -->
        <?php if ( $comment->comment_approved == '0' ) : ?>
          <em><?php _e( 'Your comment is awaiting moderation.', 'boilerplate' ); ?></em>
          <br />
        <?php endif; ?>
        <footer class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
          <?php
            /* translators: 1: date, 2: time */
            printf( __( '%1$s at %2$s', 'boilerplate' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'boilerplate' ), ' ' );
          ?>
        </footer><!-- .comment-meta .commentmetadata -->
        <div class="comment-body"><?php comment_text(); ?></div>
        <div class="reply">
          <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div><!-- .reply -->
      </article><!-- #comment-##  -->
    <!-- </li> is added by wordpress automatically -->
<?php
}

automatic_feed_links();


// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}


//****************** widgets *************************//

// Widgetized Sidebar HTML5 Markup
if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'before_widget' => '<section>',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));
}

//****************** script reg/queue etc. *************************//
function substance_scripts() {


  if ( !is_admin() ) {
    wp_register_script( 'App', get_stylesheet_directory_uri().'/assets/js/app.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'App' );

    // wp_register_script( 'Modernizr', get_template_directory_uri().'/assets/js/lib/modernizr-2.6.2.min.js', array( 'jquery' ), '2.6.2', false );
    // wp_enqueue_script( 'Modernizr' );

    if( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) {
      wp_enqueue_style( 'PREFIX', get_template_directory_uri() . "/assets/src/css/main.css", array(), NULL );
    } else {
      wp_enqueue_style( 'PREFIX', get_template_directory_uri() . "/assets/css/main.min.css", array(), NULL );
    }

  }

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'substance_scripts' );


//****************** Filters *************************//
// all scripts that filter or add filtrs to WP content before display




//****************** live functions *************************//

// place functions needed in the template to generate on the fly like custom headlines, date formatting, etc.







