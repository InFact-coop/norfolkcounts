<?php namespace norfolk;


/*
*
*
* Gets our CSS tweaks for the admin screens in the mix
*
*
*/



function load_custom_wp_admin_style() {
        wp_register_style( 'theme_admin_css', get_template_directory_uri() . '/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'theme_admin_css' );
}


add_action( 'admin_enqueue_scripts', 'norfolk\load_custom_wp_admin_style' );

