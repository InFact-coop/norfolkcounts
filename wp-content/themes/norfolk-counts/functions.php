<?php

/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/setup.php',     // Theme setup
  'lib/wrapper.php',   // Theme wrapper class
  'functions/acf.php',
  'functions/admin-tweaks.php',
  'functions/extras.php',
  'functions/get_featured_image_src.php',
  'functions/helpers.php',
  'functions/imgix.php',
  'functions/links.php',
  'functions/modules.php',
  'functions/navigation.php',
  'functions/post-types.php',
  'functions/taxonomies.php',
  'functions/shortcodes.php',
  'functions/render-partial.php'
];


include_files($sage_includes);

function include_files($files){
  foreach ($files as $file) {
    if (!$filepath = locate_template($file)) {
      trigger_error(sprintf(__('Error locating %s for inclusion', '3tone'), $file), E_USER_ERROR);
    }

    require_once $filepath;
  }
  unset($file, $filepath);
}
