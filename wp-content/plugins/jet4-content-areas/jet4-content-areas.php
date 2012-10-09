<?php
/*
Plugin Name: JET4 Content Areas
Plugin URI: http://jet4plugins.com/content-areas/
Description: This plugin provides a post type for which content can be accessed from a widget, shortcode or php function call.
Version: 0.5.1
Author: Jamie Todd
Author URI: http://jet4plugins.com
License: GPL2
*/
require_once(WP_PLUGIN_DIR.'/jet4-content-areas/widget.php');
require_once(WP_PLUGIN_DIR.'/jet4-content-areas/post-type.php');

function jet4_get_content_area($slug_or_id, $show_title=false, $show_image=false, $widget_args=NULL){
		$instance = array(
			'post_id'=>0,
			'show_title'=>$show_title,
			'show_image'=>$show_image
		);
		$before_title = '<h2>';
		$after_title = '</h2>';
		$pid = $instance['post_id'];
		if (is_int($slug_or_id)) {
			$pid=(int)$slug_or_id;
		}
		else {
			$ca = get_posts('post_type=jet4_content_area&name='.sanitize_title($slug_or_id));
			$pid=$ca[0]->ID;
		}
		do_action('jet4-content-areas-before-get');
		if ($pid==0) {
			return '';
		} else {
		$pdata = get_page($pid);
		$ptitle = ($instance['show_title']) ? $before_title.$pdata->post_title.$after_title : '';
		$ptxt = $pdata->post_content;
		$pimg = (function_exists('get_the_post_thumbnail') && $instance['show_image']) ? get_the_post_thumbnail($pid,'full') : '';

		//Display Widget
		$ca_out = apply_filters('jet4-content-areas-before-widget', $before_widget);
		do_action('jet4-content-areas-before-show');
		$ca_out .= apply_filters('jet4-content-areas-image', $pimg, $pid);
		$ca_out .= apply_filters('jet4-content-areas-title', $ptitle, $pid);
		$ca_out .= do_shortcode(apply_filters('jet4-content-areas-content', $ptxt, $pid));
		do_action('jet4-content-areas-after-show');
		$ca_out .= apply_filters('jet4-content-areas-after-widget', $after_widget);
		
		return $ca_out;
		}
		return '';
}

function jet4_show_content_area($slug_or_id, $show_title=false, $show_image=false, $widget_args=NULL) {
	echo jet4_get_content_area($slug_or_id, $show_title, $show_image, $widget_args);
}

add_shortcode('jet4-content-area','jet4_content_area_shortcode');
function jet4_content_area_shortcode($atts) {
	extract( shortcode_atts( array(
      'name' => 0,
      'show_title' => false,
	  'show_image' => false
      ), $atts ) );
	return jet4_get_content_area($atts['name'],$atts['show_title'],$atts['show_image']);
}
?>
