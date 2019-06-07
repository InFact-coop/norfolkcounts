<?php

/**
 * Custom Post Types
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 *
 * -----------------------------------------------*/

$cpt_includes = array();

include_files($cpt_includes);

/*
 * Template :

function register_options_post_type() {
	$labels = array(
		'name'                => _x( 'Option Groups', 'Post Type General Name', '3tone' ),
		'singular_name'       => _x( 'Option Group', 'Post Type Singular Name', '3tone' ),
		'menu_name'           => __( 'Options', '3tone' ),
		'name_admin_bar'      => __( 'Options', '3tone' ),
		'parent_item_colon'   => __( 'Parent Option Group', '3tone' ),
		'all_items'           => __( 'All Option Groups', '3tone' ),
		'add_new_item'        => __( 'Add New Option Group', '3tone' ),
		'add_new'             => __( 'Add New', '3tone' ),
		'new_item'            => __( 'New Option Group', '3tone' ),
		'edit_item'           => __( 'Edit Option Group', '3tone' ),
		'update_item'         => __( 'Update Option Group', '3tone' ),
		'view_item'           => __( 'View Option Group', '3tone' ),
		'search_items'        => __( 'Search Option Groups', '3tone' ),
		'not_found'           => __( 'No Option Groups found', '3tone' ),
		'not_found_in_trash'  => __( 'No Option Groups found in Trash', '3tone' )
	);

	$rewrite = array(
		'slug' 								=> 'options',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true
	);

	$supports = array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', );

	// Optional
	$capabilities = array(
		'edit_post'           => 'edit_post',
		'read_post'           => 'read_post',
		'delete_post'         => 'delete_post',
		'edit_posts'          => 'edit_posts',
		'edit_others_posts'   => 'edit_others_posts',
		'publish_posts'       => 'publish_posts',
		'read_private_posts'  => 'read_private_posts',
	);

	$args = array(
		'label'               => __( 'options', '3tone' ),
		'description'         => __( 'Groups of global options', '3tone' ),
		'labels'              => $labels,
		'supports'            => $supports,
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-edit',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
		'capabilities' 				=> $capabilities
	);
	register_post_type( 'options', $args );
}
add_action('init', 'register_options_post_type', 0);

*/
