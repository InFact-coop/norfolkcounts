<?php

/**
 * Custom Taxonomies
 *
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * -----------------------------------------------*/

$tax_includes = array(
  'functions/taxonomies/custom_tax.php'
);

include_files($tax_includes);

/*
 * Template :
 *
function custom_taxonomy() {
  $labels = array(
    'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', '3tone' ),
    'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', '3tone' ),
    'menu_name'                  => __( 'Taxonomy', '3tone' ),
    'all_items'                  => __( 'All Items', '3tone' ),
    'parent_item'                => __( 'Parent Item', '3tone' ),
    'parent_item_colon'          => __( 'Parent Item:', '3tone' ),
    'new_item_name'              => __( 'New Item Name', '3tone' ),
    'add_new_item'               => __( 'Add New Item', '3tone' ),
    'edit_item'                  => __( 'Edit Item', '3tone' ),
    'update_item'                => __( 'Update Item', '3tone' ),
    'view_item'                  => __( 'View Item', '3tone' ),
    'separate_items_with_commas' => __( 'Separate items with commas', '3tone' ),
    'add_or_remove_items'        => __( 'Add or remove items', '3tone' ),
    'choose_from_most_used'      => __( 'Choose from the most used', '3tone' ),
    'popular_items'              => __( 'Popular Items', '3tone' ),
    'search_items'               => __( 'Search Items', '3tone' ),
    'not_found'                  => __( 'Not Found', '3tone' ),
  );

  $rewrite = array(
    'slug'                       => '',
    'with_front'                 => true,
    'hierarchical'               => false,
  );

  $capabilities = array(
    'manage_terms'               => 'manage_categories',
    'edit_terms'                 => 'manage_categories',
    'delete_terms'               => 'manage_categories',
    'assign_terms'               => 'edit_posts',
  );

  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
    'capabilities'               => $capabilities,
  );

  register_taxonomy( 'taxonomy', array( 'post' ), $args );
}

add_action( 'init', 'custom_taxonomy', 0 );

*/
