<?php
/*
Author: Jamie Todd
Author URI: http://jet4plugins.com
License: GPL2
*/
add_action('init', 'jet4_content_areas_init');
function jet4_content_areas_init() 
{
  $labels = array(
    'name' => __('Content Areas'),
    'singular_name' => __('Content Area'),
    'add_new' => __('Add New'),
    'add_new_item' => __('Add New Content Area'),
    'edit_item' => __('Edit Content Area'),
    'new_item' => __('New Content Area'),
    'view_item' => __('View Content Area'),
    'search_items' => __('Search Content Areas'),
    'not_found' =>  __('No content area found'),
    'not_found_in_trash' => __('No content area found in Trash'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 6,
    'supports' => array('title','editor','thumbnail','revisions')
  ); 
  register_post_type('jet4_content_area',$args);
}

add_filter('post_updated_messages', 'jet4_content_area_updated_messages');
function jet4_content_area_updated_messages( $messages ) {
  $messages['content_area'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Content Area updated. <a href="%s">View content area</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Content Area updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Content Area restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Content Area published. <a href="%s">View content area</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Content Area saved.'),
    8 => sprintf( __('Content Area submitted. <a target="_blank" href="%s">Preview content area</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Content Area scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview content area</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Content Area draft updated. <a target="_blank" href="%s">Preview content area</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}

?>