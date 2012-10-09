<?php
//nav menus
$navmenus = array(
	'Header Menu',
	'Footer Menu',
	'Top Quick Links'
);
//widget areas
$widgetareas = array(
	'Sidebar'
);
 
//enable theme features
add_theme_support('menus'); //enable menus
add_theme_support('post-thumbnails'); //enable post thumbnails
 
//register nav menus
add_action('init','jet4_register_nav_menus');
function jet4_register_nav_menus() {
	global $navmenus;
	if (function_exists('register_nav_menus')) {
		$navmenus_proc = array();
		foreach($navmenus as $menu) {
			$key = sanitize_title($menu);
			$val = $menu;
			$navmenus_proc[$key] = $val;
		}
		register_nav_menus($navmenus_proc);
	}
}

//register widget areas
add_action('init','jet4_register_widget_areas');
function jet4_register_widget_areas() {
	global $widgetareas;
	if (function_exists('register_sidebar')) {
		foreach ($widgetareas as $widgetarea) {
			register_sidebar(array(
				'name'          => $widgetarea,
				'id'            => sanitize_title($widgetarea),
				'before_widget' => '<div id="%1$s" class="widget '.(string)sanitize_title($widgetarea).' %2$s %1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => ''
			));
		}
	}
}

//register theme script
add_action('init','jet4_register_theme_script');
function jet4_register_theme_script() {
	if ( !is_admin() ) {
		wp_register_script('jet4_theme_script',
			get_bloginfo('template_directory') . '/script.js',
			array('jquery','jquery-ui-core','jquery-ui-tabs'));
		wp_enqueue_script('jet4_theme_script');
	}
}

//template file redirects
add_action("template_redirect", 'dphfh_custom_templates');
function dphfh_custom_templates() {
	if (is_parent_page())
	{
		include(TEMPLATEPATH . "/page-tabs.php");
		die();
	}
	elseif (is_child_page())
	{
		wp_redirect(get_permalink(get_topmost_parent_id()));
	}
}

//Custom Menu Output Option
class Walker_Habitat_Top_Menu extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<h1>';
           $append = '</h1>';
           $description  = ! empty( $item->description ) ? '<h2>'.esc_attr( $item->description ).'</h2>' : '<h2>Please Enter Description</h2>';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before;
			$item_output .= $prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= $description;
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

//Add aside areas to pages admin
add_action( 'add_meta_boxes', 'dphfh_add_additional_page_field_meta' );
add_action( 'save_post', 'dphfh_save_additional_page_fields' );
function dphfh_add_additional_page_field_meta() {
	add_meta_box('dphfh-additonal-page-fields','Additional Theme Options for This Page','dphfh_show_additional_page_fields','page','normal','high');
}
function dphfh_show_additional_page_fields() {
	global $post;
	
	$pageH2 = get_post_meta($post->ID, '_dphfh-page-h2', true); 
	$pageH1 = get_post_meta($post->ID, '_dphfh-page-h1', true); 
	$pageHeader = get_post_meta($post->ID, '_dphfh-page-header', true); 
	$pageFooter = get_post_meta($post->ID, '_dphfh-page-footer', true);
	
	wp_nonce_field( 'dphfh_additional_field_nonce', '_dphfh_additional_field_nonce' );
	echo '<h2>Page Title Shown (<em>will fall back to main title if not set</em>)</h2>';
	echo '<label for="_dphfh-page-h2">Small Text: </label><input type="text" id="_dphfh-page-h2" name="_dphfh-page-h2" size="50" value="'.$pageH2.'" /><br />';
	echo '<label for="_dphfh-page-h1">Large Text: </label><input type="text" id="_dphfh-page-h1" name="_dphfh-page-h1" size="50" value="'.$pageH1.'" /><br />';
	echo '<h2>Page Header Content</h2>';
	wp_editor($pageHeader,'_dphfh-page-header',array('textarea_name'=>'_dphfh-page-header'));
	echo '<h2>Page Footer Content</h2>';
	wp_editor($pageFooter,'_dphfh-page-footer',array('textarea_name'=>'_dphfh-page-footer'));
}
function dphfh_save_additional_page_fields($post_id) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
	if ( !wp_verify_nonce( $_POST['_dphfh_additional_field_nonce'], 'dphfh_additional_field_nonce' ) )
      return;
	if ( !current_user_can( 'edit_page', $post_id ) )
	  return;
	
	//Get Old Values
	$pageH2Old = get_post_meta($post_id, '_dphfh-page-h2', true); 
	$pageH1Old = get_post_meta($post_id, '_dphfh-page-h1', true); 
	$pageHeaderOld = get_post_meta($post_id, '_dphfh-page-header', true); 
	$pageFooterOld = get_post_meta($post_id, '_dphfh-page-footer', true);
	
	//Get New Values
	$pageH2New = $_POST['_dphfh-page-h2']; 
	$pageH1New = $_POST['_dphfh-page-h1']; 
	$pageHeaderNew = $_POST['_dphfh-page-header']; 
	$pageFooterNew = $_POST['_dphfh-page-footer'];
	
	//Save H2 Value or Delete
	if ($pageH2New && $pageH2New!=$pageH2Old)
		update_post_meta($post_id,'_dphfh-page-h2',$pageH2New);
	elseif ($pageH2New=='' && $pageH2Old)
		delete_post_meta($post_id, '_dphfh-page-h2', $pageH2Old);
	
	//Save H1 Value or Delete
	if ($pageH1New && $pageH1New!=$pageH1Old)
		update_post_meta($post_id,'_dphfh-page-h1',$pageH1New);
	elseif ($pageH1New=='' && $pageH1Old)
		delete_post_meta($post_id, '_dphfh-page-h1', $pageH1Old);

	//Save Header Value or Delete
	if ($pageHeaderNew && $pageHeaderNew!=$pageHeaderOld)
		update_post_meta($post_id,'_dphfh-page-header',$pageHeaderNew);
	elseif ($pageHeaderNew=='' && $pageHeaderOld)
		delete_post_meta($post_id, '_dphfh-page-header', $pageHeaderOld);

	//Save Footer Value or Delete
	if ($pageFooterNew && $pageFooterNew!=$pageFooterOld)
		update_post_meta($post_id,'_dphfh-page-footer',$pageFooterNew);
	elseif ($pageFooterNew=='' && $pageFooterOld)
		delete_post_meta($post_id, '_dphfh-page-footer', $pageFooterOld);
}

add_filter('dphfh_page_title','dphfh_page_title_mod', 10, 2);
function dphfh_page_title_mod($title, $id=-1) {
	global $post;
	$pageH2 = ($id!=-1) ? get_post_meta($id, '_dphfh-page-h2', true) : get_post_meta($post->ID, '_dphfh-page-h2', true); 
	$pageH1 = ($id!=-1) ? get_post_meta($id, '_dphfh-page-h1', true) : get_post_meta($post->ID, '_dphfh-page-h1', true);
	
	$newTitle = '';
	
	if  ($pageH2!='')
		$newTitle = '<h2>'.$pageH2.'</h2>';
	if  ($pageH1!='')
		$newTitle = $newTitle.'<h1>'.$pageH1.'</h1>';
	else
		$newTitle = $newTitle.'<h1>'.$title.'</h1>';
	
	return $newTitle;
}

function is_parent_page() {
	global $post;
	$children = get_pages(array('child_of'=>$post->ID));
	if (!empty($children))
		return true;
	else
		return false;
}
function is_child_page() {
	global $post;
	$parents = get_ancestors($post->ID,'page');
	if (!empty($parents))
		return true;
	else
		return false;
}
function get_topmost_parent_id() {
	global $post;
	$parents = get_ancestors($post->ID,'page');
	if (!empty($parents)) {
		$parents = array_reverse($parents);
		return $parents[0];
	}
	else
		return false;
}

//Add postit option to widgets
$dphfh_widget_field['h2'] = "dphfh-widget-h2";
$dphfh_widget_field['h1'] = "dphfh-widget-h1";

add_filter('dynamic_sidebar_params', 'dphfh_widget_titles_show');
add_filter('widget_update_callback', 'dphfh_widget_titles_save', 1, 3);
add_action('in_widget_form', 'dphfh_widget_titles_admin', 1, 3);
function dphfh_widget_titles_show($args) {
	global $dphfh_widget_field;
	$widget_id = $args[0]['widget_id'];
	$dpos = strrpos($widget_id,"-");
	
	$widget_info['number'] = substr($widget_id, $dpos+1);
	$widget_info['type'] = substr($widget_id, 0, $dpos);
	$opts = get_option('widget_'.$widget_info['type']);
	$instance = $opts[(int)$widget_info['number']];
	
	$pageH2 = $instance[$dphfh_widget_field['h2']]; 
	$pageH1 = $instance[$dphfh_widget_field['h1']];
	
	$newTitle = '';
	
	if  ($pageH2!='')
		$newTitle = '<h2>'.$pageH2.'</h2>';
	if  ($pageH1!='')
		$newTitle = $newTitle.'<h1>'.$pageH1.'</h1>';
	else
		$newTitle = $newTitle.'<h1>'.$instance['title'].'</h1>';
	
	$args[0]['before_title'] = '<hgroup>'.$newTitle.'<h3 class="hide">';
	$args[0]['after_title'] = '</h3></hgroup>';

	return $args;
}
function dphfh_widget_titles_save($instance, $new_instance, $old_instance){
	global $dphfh_widget_field;
	
	$instance[$dphfh_widget_field['h2']] = $new_instance[$dphfh_widget_field['h2']];
	$instance[$dphfh_widget_field['h1']] = $new_instance[$dphfh_widget_field['h1']];
	
	return $instance;
}
function dphfh_widget_titles_admin($widget, $return, $instance) {
	global $dphfh_widget_field;
?>
<p style="padding-top:5px;">
	<?php _e( 'Widget Title Shown<br />(<em>Overrides Regular Widget Title</em>)' ); ?><br />
	<label for="<?php echo $widget->get_field_id( $dphfh_widget_field['h2'] ); ?>">
    <?php _e( 'Small Text' ); ?>: 
    <input id="<?php echo $widget->get_field_id( $dphfh_widget_field['h2'] ); ?>"
           type="text"
           name="<?php echo $widget->get_field_name( $dphfh_widget_field['h2'] ); ?>"
           value="<?php echo $instance[$dphfh_widget_field['h2']]; ?>" />
    </label><br />
	<label for="<?php echo $widget->get_field_id( $dphfh_widget_field['h1'] ); ?>">
    <?php _e( 'Large Text' ); ?>: 
    <input id="<?php echo $widget->get_field_id( $dphfh_widget_field['h1'] ); ?>"
           type="text"
           name="<?php echo $widget->get_field_name( $dphfh_widget_field['h1'] ); ?>"
           value="<?php echo $instance[$dphfh_widget_field['h1']]; ?>" />
    </label>
</p>
<?php
}

add_filter('jet4-content-areas-content','jet4_add_autop_to_widgets');
function jet4_add_autop_to_widgets($content){
	$content = wpautop($content);
	return $content;
}

//add_filter('the_content','jet4_remove_empty_p_tags');
function jet4_remove_empty_p_tags($content) {
	$pattern = "/<p[^>]*><\\/p[^>]*>/"; 
	return preg_replace($pattern, '', $content); 
}
?>