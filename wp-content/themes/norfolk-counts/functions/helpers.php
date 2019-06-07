<?php

/*
 * Remove width & height attributes from thumbnail images
 * -----------------------------------------------*/
function _3tone_remove_width_height_attributes($html)
{
  $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
  return $html;
}
add_filter(
  'post_thumbnail_html',
  '_3tone_remove_width_height_attributes',
  21,
  8
);

/*
 * Remove 'more' from excerpt
 * -----------------------------------------------*/
function _3tone_new_excerpt_more($more)
{
  return '...';
}
add_filter('excerpt_more', '_3tone_new_excerpt_more');

/*
 * Add PDF filter to Media Library
 * -----------------------------------------------*/
function _3tone_modify_post_mime_types($post_mime_types)
{
  $post_mime_types['application/pdf'] = array(
    __('PDFs'),
    __('Manage PDFs'),
    _n_noop(
      'PDF <span class="count">(%s)</span>',
      'PDFs <span class="count">(%s)</span>'
    )
  );

  return $post_mime_types;
}
add_filter('post_mime_types', '_3tone_modify_post_mime_types');

/*
 * Fix for relevanssi search using ampersands
 * -----------------------------------------------*/
function _3tone_saveampersands_1($a)
{
  $a = str_replace('&amp;', 'AMPERSAND', $a);
  $a = str_replace('&', 'AMPERSAND', $a);
  return $a;
}
add_filter('relevanssi_remove_punctuation', '_3tone_saveampersands_1', 9);

function _3tone_saveampersands_2($a)
{
  $a = str_replace('AMPERSAND', '&', $a);
  return $a;
}
add_filter('relevanssi_remove_punctuation', '_3tone_saveampersands_2', 11);

/**
 * Build the inline SVG icon URL
 * -----------------------------------------------*/
function _3tone_the_icon_path($icon)
{
  echo _3tone_get_icon_path($icon);
}

function _3tone_get_icon_path($icon)
{
  return get_template_directory_uri() . '/dist/icons/icons.svg#' . $icon;
}

/**
 * Build the inline SVG icon SVG
 *
 * Set aria hidden to false if it's a stand alone icon or a linked icon.
 * The icon description should be placed in `aria-label` on the wrapping `<a>`
 *
 * @link https://css-tricks.com/accessible-svgs/#article-header-id-8
 * -----------------------------------------------*/
function _3tone_the_icon(
  $icon_name,
  $title = true,
  $classes = '',
  $aria_hidden = false,
  $role = false
) {
  echo _3tone_get_icon($icon_name, $title, $classes, $aria_hidden, $role);
}

function _3tone_get_icon(
  $icon_name,
  $title = true,
  $classes = '',
  $aria_hidden = false,
  $role = false
) {
  if (!$icon_name) {
    return false;
  }

  $svg = '';
  $path = _3tone_get_icon_path($icon_name);

  if ($title === true):
    $title = $icon_name;
  endif;

  $svg .=
    '<svg class="icon icon--' .
    $icon_name .
    ' ' .
    $classes .
    '"' .
    ($aria_hidden ? ' aria-hidden="true"' : '') .
    '' .
    ($role ? ' role="img"' : '') .
    '>';

  if ($title):
    $svg .= '<title>' . $title . '</title>';
  endif;

  $svg .= '<use xlink:href="' . $path . '"></use>';
  $svg .= '</svg>';

  return $svg;
}

/*
 * ----- REQUIRES YOAST SEO PLUGIN -----
 *
 * Modify meta tags to use imgix images.
 * -----------------------------------------------*/
function modify_og_image($image)
{
  if (false === IMGIX_HOST) {
    return $image;
  }
  $img_options = array(
    'w' => 1280,
    'h' => 1280,
    'fit' => 'max'
  );
  $imgix_url = replace_host($image);
  $image = add_query_arg($img_options, $imgix_url);

  return $image;
}
add_filter('wpseo_twitter_image', 'modify_og_image', 10, 1);
add_filter('wpseo_opengraph_image', 'modify_og_image', 10, 1);

/*
 * Return breakpoint dims for picture element
 * -----------------------------------------------*/
function get_breakpoint_directions($breakpoints)
{
  $_bps = array();

  foreach ($breakpoints as $k => $bp):
    $_bps = array_merge($_bps, [$k => $bp]);
    $start = $bp['start'];
    $end = $bp['end'];

    if ($end != null && $start != null):
      $down_key = $k . '-';
      $_bps = array_merge($_bps, [
        $down_key => [
          'start' => null,
          'end' => $end
        ]
      ]);
    endif;

    if ($start != null && $end != null):
      $up_key = $k . '+';
      $_bps = array_merge($_bps, [
        $up_key => [
          'start' => $start,
          'end' => null
        ]
      ]);
    endif;
  endforeach;

  return $_bps;
}

function _3tone_get_breakpoint($media)
{
  $bp = array(
    's' => ['start' => null, 'end' => 567],
    'm' => ['start' => 568, 'end' => 767],
    'tp' => ['start' => 768, 'end' => 979],
    'tl' => ['start' => 980, 'end' => 1259],
    'd' => ['start' => 1260, 'end' => null]
  );

  $breakpoints = get_breakpoint_directions($bp);

  if (array_key_exists($media, $breakpoints)):
    return $breakpoints[$media];
  else:
    return false;
  endif;
}

function _3tone_get_breakpoint_mq($media)
{
  $bp = _3tone_get_breakpoint($media);
  $start = $bp['start'];
  $end = $bp['end'];
  $str = 'screen and (';

  if ($start != null) {
    $str .= 'min-width: ' . $start . 'px';
  }

  if ($start != null && $end != null) {
    $str .= ') and (';
  }

  if ($end != null) {
    $str .= 'max-width: ' . $end . 'px';
  }

  $str .= ')';

  return $str;
}
