<?php
namespace Sage\Theme;

function _get_featured_image($id = false, $size = 'full') {
  // if there is no id
  if (!$id) {
    return new \WP_Error( 'err', __( "Please specify the post ID", "sage" ) );
  }

  $post_id = '';

  //if $id contain a post object
  if (is_object($id) && isset($id->ID)) {
    $post_id = $id->ID;
  } else {
    $post_id = $id;
  }

  // if post didn't has a featured image
  if (!has_post_thumbnail($post_id)) {
    return new \WP_Error( 'err', __( "This post didn't has a featured image", "sage" ) );
  }

  $image = wp_get_attachment_image_url( get_post_thumbnail_id($post_id), $size );

  return $image;

}

function _get_excerpt($id = false, $max_char = 100) {
  $post = null;
  // if $id isn't defined
  if (!$id) {
    global $post;
  }
  // if $id isn't an object
  if (!is_object($id)) {

    // check if id is valid integer
    if (intval($id) === 0) {
      return new \WP_Error( 'err', __( "Invalid id", "sage" ) );
    }

    $post = get_post( intval($id) );

  } elseif (is_object($id)) { // if $id is an object
    $post = $id;
  }

  $excerpt = '';

  if ($post->post_excerpt) {
    $excerpt = substr($post->post_excerpt, 0, $max_char);
  } else {
    $excerpt = substr(strip_tags($post->post_content), 0, $max_char);
  }

  // check if last char isn't a space
  if (substr($excerpt, -1) !== ' ') {
    return $excerpt.'...';
  }

  $excerpt = substr($excerpt, 0, -1).'...';

  return $excerpt;
}
