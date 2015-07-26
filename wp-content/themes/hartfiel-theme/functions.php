<?php
/**
 * Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions including 
 * custom template tags, actions and filter hooks to change core functionality.
 *
 *
 * @package photography-theme
 */


/** 
*Set the content width based on the theme's design and stylesheet 
*/
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
};	//endif


//function that runs during theme initialization for basic setup, registration and init actions
function photography_theme_setup(){
	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	*/
  load_theme_textdomain( 'photography-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
   add_theme_support( 'automatic-feed-links' );

   // Enable support for Post Thumbnails on posts and pages
   add_theme_support( 'post-thumbnails' );
   set_post_thumbnail_size(1200, 99999);

   // Enable support for Post Formats.
   add_theme_support( 'post-formats', array( 
       'aside',
       'image',
       'video',
       'quote',
       'link'
   ) );

   // Enable support for HTML5 markup.
 	add_theme_support( 'html5', array(
     'comment-list',
     'search-form',
     'comment-form',
     'gallery',
  ) );
 	// Enable support for editable menus via Appearance > Menus
  register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'photography-theme' ),
      //'footer' => __('Footer Menu', 'photography-theme')
  ) );

  // Add custom image sizes
    add_image_size( 'large', 1024, 1024);
    add_image_size( 'head-img', 610, 9999);
    add_image_size( 'feat-img', 550, 350);
    add_image_size( 'post_thumb_img', 550, 550);
    add_image_size( 'med-large', 9999, 330 );
    add_image_size( 'medium', 480, 480);
};

add_action('after_setup_theme', 'photography_theme_setup');

//remove the default WYSIWYG editor from pages

function init_remove_support(){
    $post_type = 'page';
    remove_post_type_support( $post_type, 'editor');

}
add_action('init', 'init_remove_support',100);

/*******************************
// Pagination
********************************/

//Add numeric pagination by calling the function below
function wp_pagination() {
  global $wp_query;
  $big = 12345678;
  $page_format = paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
      'type'  => 'array'
  ) );
  if( is_array($page_format) ) {
      $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
      foreach ( $page_format as $page ) {
        echo $page;
      }
  };
}

/*******************************
// Register Sidebars and Widgets
********************************/

function photography_theme_widget_init(){
	$args = array (
		'name' => __('Sidebar', 'photography-theme'),
		'id' => 'sidebar-1',
		'description' => 'First sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_widget' => '</h3>'
	);

	register_sidebar($args);
};

add_action('widgets_init', 'photography_theme_widget_init');



/*******************************
// Enqueue Scripts & Styles
********************************/
function photography_theme_scripts(){
	//theme style.css file
	wp_enqueue_style( 'photo-general-style', get_stylesheet_uri() );
  
  //enqueue google fonts
  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700|Playfair+Display:400,600,700|');

  //enqueue main stylesheet in build folder
  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/build/css/main.min.css', array('google-fonts') );


	// threaded comments
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
  };

  // vendor scripts
   wp_enqueue_script('jquery');

   wp_enqueue_script(
       'main',
       get_template_directory_uri() . '/assets/app/js/main.js',
       array('jquery'),
       true
   );


  //font awesome script
  wp_enqueue_style( 
    'prefix-font-awesome', 
    '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', 
    array(), 
    '4.0.3' 
  );
      // theme scripts
  //  wp_enqueue_script(
  //      'theme-init',
  //      get_template_directory_uri() . '/assets/theme.js',
  //      array('jquery')
  //  );
}

add_action('wp_enqueue_scripts', 'photography_theme_scripts');




/*******************************
// Excerpt Functions
********************************/

function custom_excerpt_length( $length ) {
  return 22;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
  global $post;
  return '<br><br><a class="moretag" href="'. get_permalink($post->ID) . '"> Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*******************************
// ACF Specific Functions
********************************/

// Create an options page
if ( function_exists('acf_add_options_page') ) {

  $options_arg = array(
    'page_title' => 'Theme General',
    'menu_title' => 'Theme Settings',
    'menu_slug' => 'theme-general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  );

  $footer_arg = array(
    'page_title' => 'Theme Footer Settings',
    'menu_title' => 'Footer',
    'parent_slug' => 'theme-general-settings'
  );

  acf_add_options_page($options_arg);
  acf_add_options_sub_page($footer_arg);

}


/*******************************
// Clean Up WP
********************************/

// remove junk from head
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link');// remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'feed_links_extra', 3); 
remove_action('wp_head', 'start_post_rel_link', 10, 0);// remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links



/**
 * @author    Brad Dalton
 * @example   http://wpsites.net/
 * @copyright 2014 WP Sites
 */
function wpsites_custom_tiled_gallery_width($width){
    // $winWidth = window.innerWidth;
    $tiled_gallery_content_width = $width;
    $width = 4000;
    return $width;
};

add_filter( 'tiled_gallery_content_width', 'wpsites_custom_tiled_gallery_width' );


