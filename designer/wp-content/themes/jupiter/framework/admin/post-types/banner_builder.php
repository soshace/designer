<?php

/*-----------------------------------------------------------------------------------*/
/* Manage banner builder's columns */
/*-----------------------------------------------------------------------------------*/
function edit_banner_builder_columns($banner_builder_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" =>__('Slider Item Title','mk_framework'), 
		"thumbnail" => 'Thumbnail', 
		"date" => 'Date',
	);

	return $columns;
}
add_filter('manage_edit-banner_builder_columns', 'edit_banner_builder_columns');




/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types */
/*-----------------------------------------------------------------------------------*/
function register_banner_builder_post_type(){

	global $mk_options;
   		if($mk_options['banner-post-type'] == 'false') return false;


	register_post_type('banner_builder', array(
		'labels' => array(
			'name' => __('Banner Builder','mk_framework'),
			'singular_name' => __('Banner Builder Item','mk_framework'),
			'add_new' => __('Add New Banner','mk_framework'),
			'add_new_item' => __('Add new banner builder item', 'mk_framework' ),
			'edit_item' => __('Edit banner builder item','mk_framework'),
			'new_item' => __('New banner builder item','mk_framework'),
			'view_item' => __('View banner builder item','mk_framework'),
			'search_items' => __('Search banner builder items','mk_framework'),
			'not_found' =>  __('No banner builder item found','mk_framework'),
			'not_found_in_trash' => __('No slider items found in Trash','mk_framework'),
			'parent_item_colon' => '',
		),
		'singular_label' => 'banner_builder',
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-format-image',
		'menu_position' => 100,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'query_var' => false,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions')
	));
}
add_action('init','register_banner_builder_post_type');

