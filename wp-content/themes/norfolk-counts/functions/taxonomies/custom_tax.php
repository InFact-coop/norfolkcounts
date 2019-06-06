<?php

/*
 * {{ name }} Taxonomy
 * -----------------------------------------------*/

function register_xxx_taxonomy()
{
  $labels = array(
    'name' => 'xxxx Types',
    'singular_name' => 'xxx Type',
    'menu_name' => 'xxx Types',
    'all_items' => 'All xxx Types',
    'parent_item' => 'Parent xxx Type',
    'parent_item_colon' => 'Parent xxx Type:',
    'new_item_name' => 'New xxx Type Name',
    'add_new_item' => 'Add New xxx Type',
    'edit_item' => 'Edit xxx Type',
    'update_item' => 'Update xxx Type',
    'view_item' => 'View xxx Type',
    'separate_items_with_commas' => 'Separate items with commas',
    'add_or_remove_items' => 'Add or remove items',
    'choose_from_most_used' => 'Choose from the most used',
    'popular_items' => 'Popular xxx Types',
    'search_items' => 'Search xxx Types',
    'not_found' => 'Not Found',
    'no_terms' => 'No items',
    'items_list' => 'xxx Types list',
    'items_list_navigation' => 'xxx Types list navigation'
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'public' => false,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => false,
    'show_tagcloud' => false
  );
  //register_taxonomy( 'xxxx', array( slug, post_type ), $args );
}

///add_action( 'init', 'register_xxxx_taxonomy', 0 );

/*
 *
 *
 * The  xxx taxonomy may hold terms that should be present on theme load.
 *
 */
function populate_xxxx_taxonomy()
{
  //
  //
  // // The theme activation hook may have run already on this system so check
  // // to see if the term actually needs to be added.
  // if( ! get_term_by( 'slug', 'brand', 'client_type' ) ) {
  //
  //   wp_insert_term(
  //     'Brand', // the term
  //     'client_type', // the taxonomy
  //     array(
  //       'slug' => 'brand',
  //       'parent'=> 0
  //     )
  //   );
  //
  // }
  //
  // if( ! get_term_by( 'slug', 'urban', 'client_type' ) ) {
  //
  //   wp_insert_term(
  //     'Urban', // the term
  //     'client_type', // the taxonomy
  //     array(
  //       'slug' => 'urban',
  //       'parent'=> 0
  //     )
  //   );
  //
  // }
}

add_action('after_switch_theme', 'populate_xxxx_taxonomy', 1);
