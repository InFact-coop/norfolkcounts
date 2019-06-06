<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('3tone', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');



/**
 * Theme assets
 */
function assets() {
  $css_ver = filemtime( get_template_directory().'/dist/css/app.css' );
  wp_enqueue_style('3tone/css', Assets\asset_path('css/app.css?v='.$css_ver), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
   wp_enqueue_script('comment-reply');
  }


  $js_ver = filemtime( get_template_directory().'/dist/js/app.js' );
  wp_enqueue_script('3tone/js', Assets\asset_path('js/app.js?v='.$js_ver), [], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


/**
 * Don't show the admin bar
 */
show_admin_bar(false);



/**
 * ----- ENABLE IF USING IMGIX -----
 *
 * Disable WP built in responsive
 */
// add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );



/**
 * Disable Plugin update notifications
 */
if(defined('WP_ENV') && WP_ENV != 'development'){
  remove_action('load-update-core.php','wp_update_plugins');
  add_filter('pre_site_transient_update_plugins','__return_null');
}
