<?php
namespace Sage\Theme;

function get_featured_image($id = false, $size = 'full') {
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
