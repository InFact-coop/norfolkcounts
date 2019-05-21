<?php namespace leeds;


/*
*
*
* Declare our aux and main nav
*
*
*/

// Register wp_nav_menu() menus
// http://codex.wordpress.org/Function_Reference/register_nav_menus


function register_menus() {

  register_nav_menus( array(
    'main-navigation' => 'Main Navigation',
    'aux-navigation' => 'Auxiliary Navigation'
    ) );

}


add_action( 'init', 'leeds\register_menus' );





/*
*
*
* Set containers and classes for the main nav
*
*
*/
function main_navigation(){

  $args = array(
    'theme_location' => 'main-navigation',
    'menu_class' => '',
    'container' => 'nav',
    'container_class' => 'main-nav',
    'depth' => 1,
    'items_wrap' => '<ul id="%1$s">%3$s</ul>'
  );

  wp_nav_menu( $args );

}



/*
*
*
* Output aux nav, automatically appending the search icon link
*
*
*/
function aux_navigation(){

  $args = array(
    'theme_location' => 'aux-navigation',
    'menu_class' => '',
    'container' => 'div',
    'container_class' => '',
    'depth' => 1,
    'items_wrap' => '<ul id="%1$s">%3$s</ul>'
  );

  ob_start();
  wp_nav_menu( $args );
  $nav = ob_get_clean();


  $nav = str_ireplace("</ul>", "<li class='show-for-medium'><form action=\"".site_url('/search')."\"><input type='search' name='srch'><input type='hidden' name='c' value='all'></form></li></ul>", $nav);
  echo $nav;

}
