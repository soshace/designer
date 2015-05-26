<?php

/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types - Tab Slider */
/*-----------------------------------------------------------------------------------*/
function register_tab_slider_post_type(){

	global $mk_options;
   		if(isset($mk_options['tab-slider-post-type']) && $mk_options['tab-slider-post-type']  == 'false') return false;


	register_post_type('tab_slider', array(
		'labels' => array(
			'name' => __('Tab Slider','mk_framework'),
			'singular_name' => __('Tab Item','mk_framework'),
			'add_new' => __('Add New Tab Slider','mk_framework'),
			'add_new_item' => __('Add New Tab Slider Item', 'mk_framework'),
			'edit_item' => __('Edit Tab Slider Item','mk_framework'),
			'new_item' => __('New Tab Slider Item','mk_framework'),
			'view_item' => __('View Tab Slider Item','mk_framework'),
			'search_items' => __('Search Tab Slider Items','mk_framework'),
			'not_found' =>  __('No Tab slider item found','mk_framework'),
			'not_found_in_trash' => __('No Tab slider items found in Trash','mk_framework'),
			'parent_item_colon' => '',
		),
		'singular_label' => 'Tab',
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-slides',
		'menu_position' => 100,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'query_var' => false,
		'show_in_nav_menus' => false,
		'supports' => array('title','thumbnail', 'page-attributes', 'revisions')
	));
}
add_action('init','register_tab_slider_post_type');


function tab_slider_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'tab_slider' ) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'tab_slider_context_fixer' );


