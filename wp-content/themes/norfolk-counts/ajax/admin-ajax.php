<?php

/*
*
* @file admin_ajax.php
* This file is excluded from WPEngine's caching layer by default so we must use it for
* AJAX requests or risk issues with outdated content.
*
*/

define( 'DOING_AJAX', true );


/** Load WordPress Bootstrap */
require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );



switch($_GET['a']):

    /*
    *
    *
    * HTML for the main carousel is returned here.
    *
    */
    case "ca":
      $first_story = (int)$_GET['f'];
      $stories = get_all_stories(array(
        'first' => $first_story
      ));
      global $post;
      $response = new StdClass();
      $response->nav_html = "";
      $response->slider_html = "";
      $cs = count($stories);
      $frontpage_id = get_option( 'page_on_front' );
      $download_url = get_field('download_the_posters', $frontpage_id);
      for($i=0;$i<$cs;$i++): $post = $stories[$i];
        setup_postdata($post);
        $response->nav_html .= render_partial_html('nav_slide',array("post"=>$post,"i"=>$i));
        $response->slider_html .= render_partial_html('slide',array("post"=>$post,'download_url' => $download_url));
      endfor;
      echo(json_encode($response));
    break;

endswitch;
