<?php

/*
 *
 *
 * Functions to simplify setting up socail shares
 *
 */

function facebook_link()
{
  $frontpage_id = get_option('page_on_front');
  return "https://facebook.com/sharer.php?u=" .
    urlencode(get_permalink($frontpage_id));
}

function twitter_link()
{
  $frontpage_id = get_option('page_on_front');
  $meta_desc = get_post_meta(
    $frontpage_id,
    '_yoast_wpseo_twitter-description',
    true
  );
  return "https://twitter.com/intent/tweet?url=" .
    urlencode(get_permalink($frontpage_id)) .
    "&text=" .
    urlencode($meta_desc);
}

function mailto_link()
{
  $frontpage_id = get_option('page_on_front');
  $body = str_replace(
    "<br />",
    "\n",
    get_field('email_share_body', $frontpage_id)
  );

  return "mailto:?subject=" .
    rawurlencode(get_field('email_share_subject', $frontpage_id)) .
    "&body=" .
    rawurlencode($body);
}

function tweet_this($text)
{
  return "https://twitter.com/intent/tweet?url=" .
    urlencode(get_permalink()) .
    "&text=" .
    urlencode(strip_tags($text));
}

function mail_this($text)
{
  $body = "\n\n" . get_permalink();

  return "mailto:?subject=" .
    rawurlencode(strip_tags($text)) .
    "&body=" .
    rawurlencode($body);
}

/**
Re-activate if needed, works with both Yoast and the seo framework plugin.
*/
if (false):
  /*
   *
   *
   * Handle custom og tags on homepage when GET variable $sd is set.
   *
   */

  function _3tone_custom_ogdesc_tags($description, $the_real_ID = false)
  {
    if (isset($_GET['md'])) {
      $description = $_GET['x'];
    } elseif (isset($_GET['scr'])) {
      $description = get_field('long_pullquote', (int) $_GET['scr']);
    }

    return $description;
  }
  add_filter(
    'the_seo_framework_description_output',
    '_3tone_custom_ogdesc_tags',
    10,
    2
  );
  add_filter(
    'the_seo_framework_ogdescription_output',
    '_3tone_custom_ogdesc_tags',
    10,
    2
  );
  add_filter(
    'the_seo_framework_twitterdescription_output',
    '_3tone_custom_ogdesc_tags',
    10,
    2
  );
  add_filter('wpseo_metadesc', '_3tone_custom_ogdesc_tags', 10, 2);

  function _3tone_custom_ogtitle_tags($title, $the_real_ID = false)
  {
    if (isset($_GET['md'])) {
      $title = $_GET['t'];
    } elseif (isset($_GET['scr'])) {
      $title = get_the_title((int) $_GET['scr']);
    }
    return $title;
  }
  add_filter(
    'the_seo_framework_ogtitle_output',
    '_3tone_custom_ogtitle_tags',
    10,
    2
  );
  add_filter(
    'the_seo_framework_twittertitle_output',
    '_3tone_custom_ogtitle_tags',
    10,
    2
  );
  add_filter('wpseo_title', '_3tone_custom_ogtitle_tags', 10, 2);

  function _3tone_custom_ogimage_tags($image, $the_real_ID = false)
  {
    if (isset($_GET['md'])) {
      $image = $_GET['i'];
    } elseif (isset($_GET['scr'])) {
      $image = get_field('social_share_image', (int) $_GET['scr'])['url'];
    }
    return $image;
  }
  add_filter(
    'the_seo_framework_ogimage_output',
    '_3tone_custom_ogimage_tags',
    10,
    2
  );
  add_filter(
    'the_seo_framework_twitterimage_output',
    '_3tone_custom_ogimage_tags',
    10,
    2
  );
  add_filter('wpseo_opengraph_image', '_3tone_custom_ogimage_tags', 10, 2);

  function _3tone_custom_canonical_tags($canonical, $the_real_ID = false)
  {
    if (isset($_GET['md']) || isset($_GET['scr'])) {
      $canonical = site_url() . $_SERVER['REQUEST_URI'];
      return $canonical;
    } else {
      return $canonical;
    }
  }
  add_filter(
    'the_seo_framework_rel_canonical_output',
    '_3tone_custom_canonical_tags',
    10,
    2
  );
  add_filter(
    'the_seo_framework_ogurl_output',
    '_3tone_custom_canonical_tags',
    10,
    2
  );
  add_filter('wpseo_canonical', '_3tone_custom_canonical_tags', 10, 2);
  add_filter('wpseo_opengraph_url', '_3tone_custom_canonical_tags', 10, 2);
endif;
