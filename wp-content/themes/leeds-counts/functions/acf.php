<?php


/*
*
*
* Includes the ACF Pro Plugin, licensed to 3tone LLC and included as
* part of the build scope.
* Distribution or use of the ACF files outside of this
* Wordpress theme is strictly forbidden.
*
* @link https://www.advancedcustomfields.com/resources/including-acf-in-a-plugin-theme/
*
*/


add_filter('acf/settings/path', 'i10n_acf_settings_path');
function i10n_acf_settings_path( $path ) {


    $path = get_stylesheet_directory() . '/functions/advanced-custom-fields-pro/';

    return $path;

}

add_filter('acf/settings/dir', 'i10n_acf_settings_dir');
function i10n_acf_settings_dir( $dir ) {


    $dir = get_stylesheet_directory_uri() . '/functions/advanced-custom-fields-pro/';

    return $dir;

}


// Hide ACF field group menu item on all but localhost
add_filter('acf/settings/show_admin', 'i10n_show_acf_on_localhost');
function i10n_show_acf_on_localhost(){
  return(false !== strpos($_SERVER['HTTP_HOST'], 'localhost'));
}


// Include ACF pro
include_once( get_stylesheet_directory() . '/functions/advanced-custom-fields-pro/acf.php' );





/**
 * ACF Field Registration
 *
 * @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
 *
 * -----------------------------------------------*/


$acf_includes = array(
  'functions/acf-fields/main_page_fields.php',
  'functions/acf-fields/story_fields.php',
  'functions/acf-fields/story_callout.php',
);

include_files($acf_includes);




/**
 * Advanced Custom Fields filters/actions
 *
 * @link https://www.advancedcustomfields.com/resources/
 *
 * -----------------------------------------------*/


/*
 * Run the_content filter on all textarea values
 */
function _3tone_clean_acf_wysiwyg( $value, $post_id, $field ){
  $value = apply_filters('the_content', $value);

  return $value;
}
add_filter('acf/format_value/type=wysiwyg', '_3tone_clean_acf_wysiwyg', 10, 3);
