<?php

/**
 * EXAMPLE shortcode
 * -----------------------------------------------*/
function _3tone_example_shortcode( $atts , $content = null ) {
  global $wp_embed;
  $atts_array = shortcode_atts(array(
    'id' => null
  ), $atts);

  if($atts_array['id']):
    $img_url = get_image_url( $atts_array['id'] );
    $content = '<div class="imgix-fluid-bg" data-src="'. $img_url .'"></div>';
  endif;

  return $content;
}
add_shortcode( 'example', '_3tone_example_shortcode' );
