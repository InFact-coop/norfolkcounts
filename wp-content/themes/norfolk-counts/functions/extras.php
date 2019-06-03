<?php


/*
*
*
* SET WP_ENV if it is not set already so development HTML tooling functions correctly
*
*/
if( !defined("WP_ENV") ){

  switch($_SERVER['HTTP_HOST']){
    case "norfolkcounts.org.uk":
      define("WP_ENV","production");
    break;
    default:
      define("WP_ENV","development");
    break;
  }

}


//prevent default WP jquery
if (!is_admin()) add_action("wp_enqueue_scripts", "remove_jquery", 11);
function remove_jquery() {
   wp_deregister_script('jquery');
}

// Title support
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );



// Remove bullshit extra WP JS
function deregister_bullshit_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_enqueue_scripts', 'deregister_bullshit_scripts' );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');



/*
*
*
* Pulls the story objects in the custom field and then makes sure any other
* published stories are added to the array
*
* @param $options object - property bag
*   - $first - post to force to the top of the list
*   - $exclude - array of IDs to exclude from the pull (for stories already viewed when pulling via AJAX)
*
*/
function get_all_stories($options = array()){

  if(! isset($options['first']) ){
    $options['first'] = 0;
  }

  if(! isset($options['exclude']) ){
    $options['exclude'] = array();
  }


  $frontpage_id = get_option( 'page_on_front' );
  $arr = get_field('story_order', $frontpage_id);
  $arr = array_merge(array_filter($arr, function($e) use ($options){
    return( !in_array($e, $options['exclude']) );
  }));

  $ids = $options['exclude'];
  foreach($arr as $p){
    $ids []= $p->ID;
  }
  $remaining_stories = new WP_Query(array(
    'post_type' => 'post',
    'nopaging' => true,
    'orderby' => 'post_date',
    'post__not_in' => $ids
  ));

  foreach($remaining_stories->posts as $p){
    $arr []= $p;
  }
  $ca = count($arr);
  for($i=0;$i<$ca;$i++){
    if($arr[$i]->ID == $options['first']){
      $first = array_splice($arr,$i,1)[0];
      array_unshift($arr, $first);

    }
  }

  return($arr);
}
