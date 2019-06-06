<?php

/*
 *
 *
 * IMGIX CONFIG
 *
 */
// if('production' === WP_ENV){
//   define("IMGIX_HOST", "http://leeds.imgix.net");
// }elseif ('development' === WP_ENV) {
//   define("IMGIX_HOST", "http://leeds.imgix.net");
// }else{
//   define("IMGIX_HOST", false);
// }

define("IMGIX_HOST", false); #imgix not used on this project
/*
 *
 *
 * END IMGIX CONFIG
 *
 */

/**
 * Produce an image URL (using imgix if appropriate) from an image ID or image path
 *
 * @param int     $img_id   Post ID of the attachment, or image path
 * @param array   $options  The options to be applied to the query string. https://www.imgix.com/docs/reference
 *                          E.g. array('w' => 150);
 *
 * @return string A sanitized, full-qualified URL.
 */
function get_image_url($img_id = false, $options = array())
{
  if (!$img_id) {
    $img_id = get_post_thumbnail_id();
  }
  if (!$img_id) {
    write_log('No image found / No ID provided');
    return false;
  }

  // If the imgix plugin is installed
  if (
    function_exists('replace_host') &&
    ((is_admin() && defined('DOING_AJAX') && DOING_AJAX) ||
      (!is_admin() && !defined('DOING_AJAX')))
  ) {
    // Always add auto format
    $options['auto'] = 'format,compress';
    if (!isset($options['q'])) {
      $options['q'] = 80;
    }

    if (is_numeric($img_id)) {
      $img_url = wp_get_attachment_url($img_id);
    } else {
      $img_url = $img_id;
    }

    $imgix_url = replace_host($img_url);

    if (!empty($options)) {
      $imgix_url = add_query_arg($options, $imgix_url);
    }

    return $imgix_url;
  }
}

/**
 * Get the image tag from its ID.
 *
 * @param int     $img_id   Post ID of the attachment. Leave blank to use current post ID
 * @param array   $options  The options to be applied to the query string. https://www.imgix.com/docs/reference. E.g. array('w' => 150);
 * @param string  $classes  Classes to be applied to the image tag
 *
 * @return string A sanitized, full-qualified URL.
 */

function _3t_the_image_tag($img_id, $options = array(), $classes = '')
{
  echo _3t_get_image_tag($img_id, $options, $classes);
}

function _3t_get_image_tag($img_id, $options = array(), $classes = '')
{
  if (!$img_id || $img_id == '') {
    $img_id = get_post_thumbnail_id();
  }
  if (!$img_id || $img_id == '') {
    write_log('No image found / No ID provided');
    return false;
  }

  $img_url = get_image_url($img_id, $options);
  $img_meta = wp_get_attachment_metadata($img_id)['image_meta'];
  $img_tag =
    '<img src="' .
    $img_url .
    '" alt="' .
    $img_meta['caption'] .
    '" ' .
    ($classes ? 'class="' . $classes . '"' : '') .
    ' />';
  $img_tag = add_retina($img_tag);

  return $img_tag;
}

/**
 * Get the picture tag from its ID
 *
 * @param int     $img_id   Post ID of the attachment. Leave blank to use current post ID
 * @param array   $options  The options to be applied to the query string. Options can be set for each image within the array on that 'size' https://www.imgix.com/docs/reference.
 *                          E.g. array(
 *                            'options' => array(
 *                              'w' => 150
 *                             ),
 *                             'sizes'=> array(
 *                               array(
 *                                 'media' => 'm', // +/- for all options
 *                                 'default' => true,
 *                                 'options' => array(
 *                                   'w' => 1000,
 *                                   'h' => 500,
 *                                 )
 *                               ),
 *                               array(
 *                                 'media' => 'tp', // +/- for all options
 *                                 'options' => array(
 *                                   'w' => 1000,
 *                                   'h' => 500
 *                                 )
 *                               ),
 *                              )
 *                           );
 * @param string  $classes  Classes to be applied to the image tag
 *
 * @return string A full picture element.
 */

function the_picture_tag($img_id, $options = array(), $classes = '')
{
  echo get_picture_tag($img_id, $options, $classes);
}

function get_picture_tag($img_id, $options = array(), $classes = '')
{
  if (!$img_id || $img_id == '') {
    $img_id = get_post_thumbnail_id();
  }
  if (!$img_id || $img_id == '') {
    write_log('No image found / No ID provided');
    return false;
  }

  $img_url = get_image_url($img_id, array());
  $img_meta = wp_get_attachment_metadata($img_id)['image_meta'];
  $picture = build_picture($img_url, $options, $img_meta, $classes);

  return $picture;
}

/*
 *
 *
 * Substitutes Foundation's interchange data attributes for the src attribute.
 * The options array can include anything imgix's API understands. In addition,
 * pixel widths for the small, medium, large, xlarge, and retina queries should be supplied
 * as array elements with those keys. Defaults are:
 * small: 640
 * medium: 1024
 * large: 1200
 * xlarge: 1440
 * retina: 1440
 * If you use the 'h' parameter, it will be interpreted as relevant to the retina size
 * and other sizes will be scaled appropriately.
 *
 */
function get_interchange_image_tag($img_id, $options = array(), $classes = '')
{
  if (!$img_id || $img_id == '') {
    $img_id = get_post_thumbnail_id();
  }
  if (!$img_id || $img_id == '') {
    write_log('No image found / No ID provided');
    return false;
  }

  $img_meta = wp_get_attachment_metadata($img_id)['image_meta'];
  $img_tag =
    '<img ' .
    get_interchange_data_attribute($img_id, $options) .
    ' alt="' .
    $img_meta['caption'] .
    '" ' .
    ($classes ? 'class="' . $classes . '"' : '') .
    ' >';

  return $img_tag;
}

function get_interchange_data_attribute($img_id, $options = array())
{
  return "data-interchange=\"" .
    get_interchange_data_attribute_contents($image_id, $options) .
    '"';
}

function get_interchange_data_attribute_contents($img_id, $options = array())
{
  $sizes = array(
    "small" => 640,
    "medium" => 1024,
    "large" => 1200,
    "xlarge" => 1440,
    "retina" => 1440
  );

  //override defaults and remove from options so IMGIX doesn't get garbage keys
  foreach ($sizes as $size => $default):
    if (isset($options[$size])) {
      $sizes[$size] = $options[$size];
      unset($options[$size]);
    }
  endforeach;
  if (!isset($options['fit'])) {
    $options['fit'] = 'max';
  }

  if (isset($options['h'])) {
    $ratio = $options['h'] / $sizes['retina'];
    $original_h = $options['h'];
  } else {
    $ratio = false;
  }
  $interchange_sizes = array();
  foreach ($sizes as $size => $width):
    if ($ratio) {
      $options['h'] = (int) ($width * $ratio);
    }
    $options['w'] = $width;
    $interchange_sizes[] = "[" . get_image_url($img_id, $options) . ", $size]";
  endforeach;

  return implode(", ", $interchange_sizes);
}

/**
 * Get the base media url.
 * @return string Either the S3 bucket URL configured within WP or return the WP home_url
 */
function get_media_base_url()
{
  global $as3cf;

  if (isset($as3cf)):
    $bucket = $as3cf->get_setting('bucket');
    $region = $as3cf->get_setting('region');
    $scheme = $as3cf->get_s3_url_scheme();
    $domain_bucket =
      $scheme . '://' . $as3cf->get_s3_url_domain($bucket, $region) . '/';

    $img_url = $domain_bucket;
  else:
    $img_url = home_url('/');
  endif;

  return $img_url;
}

/**
 * Find all img tags with sources matching "imgix.net" without the parameter
 * "srcset" and add the "srcset" parameter to all those images, appending a new
 * source using the "dpr=2" modifier.
 *
 * @return string Content with retina-enriched image tags.
 */

function add_retina($content)
{
  $pattern = '/<img((?![^>]+srcset)([^>]*)';
  $pattern .=
    'src=[\'"]([^\'"]*imgix.net[^\'"]*\?[^\'"]*w=[^\'"]*)[\'"]([^>]*)*?)>/i';
  $repl =
    '<img$2src="$3" srcset="${3}, ${3}&amp;dpr=2 2x, ${3}&amp;dpr=3 3x,"$4>';
  $content = preg_replace($pattern, $repl, $content);
  return preg_replace($pattern, $repl, $content);
}

/**
 * Extract all img tags from a given $content block into an array.
 *
 * @return array An array of matching arrays with two keys: 'url' and 'params'
 */
function imgix_extract_imgs($content)
{
  preg_match_all('/src=["\']http.+\/([^\s]+?)["\']/', $content, $matches);
  $results = array();
  if ($matches) {
    foreach ($matches[1] as $url) {
      array_push($results, $url);
    };
  }
  return $results;
}

/**
 * Finds references to the wordpress site URL in the given string,
 * and changes them to the imgix URL.
 *
 * @return string the string with IMGIX urls substituted
 */
function replace_host($str)
{
  if (false === IMGIX_HOST) {
    return $str;
  }

  $base_url = get_media_base_url();
  $src = '(' . preg_quote($base_url, '/') . '|\/\/)';

  $patt = '/' . $src . '/i';
  $str = preg_replace($patt, IMGIX_HOST, $str, -1, $count);
  return $str;
}
