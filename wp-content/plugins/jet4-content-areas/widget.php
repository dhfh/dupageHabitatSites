<?php
/*
Author: Jamie Todd
Author URI: http://jet4plugins.com
License: GPL2
*/
class JET4_Content_Area_Widget extends WP_Widget {
	function JET4_Content_Area_Widget() {
		$widget_ops = array('description' => __( "Select any Content Area by title" ) );
		$this->WP_Widget('jet4-content-areas', __('Content Area'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);

		//Get page info
		do_action('jet4-content-areas-before-get');
		$pid = ($instance['post_id']) ? (int)$instance['post_id'] : 0;
		if ($pid==0) {
			echo 'Sorry, the content area could not be found.';
		} else {
			$pdata = get_page($pid);
			$ptitle = ($instance['show_title']) ? $before_title.$pdata->post_title.$after_title : '';
			$ptxt = $pdata->post_content;
			$pimg = (function_exists('get_the_post_thumbnail') && $instance['show_image']) ? get_the_post_thumbnail($pid,'full') : '';
	
			//Display Widget
			echo apply_filters('jet4-content-areas-before-widget', $before_widget);
			do_action('jet4-content-areas-before-show');
			echo apply_filters('jet4-content-areas-image', $pimg, $pid);
			echo apply_filters('jet4-content-areas-title', $ptitle, $pid);
			echo do_shortcode(apply_filters('jet4-content-areas-content', $ptxt, $pid));
			do_action('jet4-content-areas-after-show');
			echo apply_filters('jet4-content-areas-after-widget', $after_widget);
		}
	}

	function update( $new_instance, $old_instance ) {
		//Set new settings and return the updated instance
		$updated_instance = $new_instance;
		return $updated_instance;
	}

	function form( $instance ) {
	?>
    <p><!--|| Page ID ||-->
          <?php $content_areas = get_posts('post_type=jet4_content_area&showposts=-1'); ?>
          <?php if (empty($content_areas)) : ?>
          	No content areas have been created yet.<br /><a href="<?php echo get_site_url();?>/wp-admin/edit.php?post_type=jet4_content_area">Create some.</a>
          <?php else : ?>
              <p><label for="<?php echo $this->get_field_id( 'post_id' ); ?>">
              <?php _e( 'Select Content:' ); ?><br />
              <select id="<?php echo $this->get_field_id( 'post_id' ); ?>" name="<?php echo $this->get_field_name( 'post_id' ); ?>">
              <?php foreach ($content_areas as $ca) : ?>
                <option value="<?php echo $ca->ID?>" <?php echo ($instance['post_id']==$ca->ID) ? 'selected="selected"' : '';?>><?php echo $ca->post_title?></option>
              <?php endforeach; ?>
              </select>
            </label></p>
            
            <p><label for="<?php echo $this->get_field_id( 'show_title' ); ?>">
            <input id="<?php echo $this->get_field_id( 'show_title' ); ?>"
                   <?php echo ((bool)$instance['show_title']) ? 'checked="checked"' : '';?>
                   type="checkbox"
                   name="<?php echo $this->get_field_name( 'show_title' ); ?>" />
                   &nbsp<?php _e( 'Show Title' ); ?>
            </label></p>
            
            <?php if (function_exists('get_the_post_thumbnail')) : ?>
            <p><label for="<?php echo $this->get_field_id( 'show_image' ); ?>">
            <input id="<?php echo $this->get_field_id( 'show_image' ); ?>"
                   <?php echo ((bool)$instance['show_image']) ? 'checked="checked"' : '';?>
                   type="checkbox"
                   name="<?php echo $this->get_field_name( 'show_image' ); ?>" />
                   &nbsp<?php _e( 'Show Featured Image' ); ?>
            </label></p>
            <?php endif; ?>
        <?php endif; ?>
    </p>
	<?php
	}
}

add_action('widgets_init','JET4_Content_Area_Widget_init');
function JET4_Content_Area_Widget_init() {
	 register_widget('JET4_Content_Area_Widget');
}
?>
