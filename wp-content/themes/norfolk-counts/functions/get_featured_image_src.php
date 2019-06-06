<?php


/*
*
*
* Simplifies pulling a featured image src url for a post
* Accepts post objects or IDs. Defaults to the global $post object.
*
*
*/


function get_featured_image_src($post = false, $prefer_alternate = false) {


  if(false === $post){
    global $post;
  }

  if(is_numeric($post)){

    $id = $post;

  }elseif(is_object($post)){

    $id = $post->ID;

  }

  /*
  *
  *
  * Some posts have an alternate image to be used on the inner view page
  *
  *
  */
  $alt = get_field('alternate_featured_image', $id);
  if($alt && $prefer_alternate){
    return($alt['url']);
  }


  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );

  if( $image ){
    return $image[0];
  }


}


function get_featured_image_caption($post = false) {


  if(false === $post){
    global $post;
  }

  if(is_numeric($post)){

    $id = $post;

  }elseif(is_object($post)){

    $id = $post->ID;

  }

  return( get_post(get_post_thumbnail_id($id))->post_excerpt );



}


/*
*
*
* Same as above, pulls a smaller (600px) width image.
*
*
*/

function get_featured_image_src_medium($post = false, $prefer_alternate = false) {


  if(false === $post){
    global $post;
  }

  if(is_numeric($post)){

    $id = $post;

  }elseif(is_object($post)){

    $id = $post->ID;

  }

  /*
  *
  *
  * Some posts have an alternate image to be used on the inner view page
  *
  *
  */
  $alt = get_field('alternate_featured_image', $id);
  if($alt && $prefer_alternate){
    return($alt['sizes']['medium-large']);
  }

  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' );

  if( $image ){
    return $image[0];
  }


  return( get_field('default_image','rsf_image_options')['sizes']['medium_large'] );



}
