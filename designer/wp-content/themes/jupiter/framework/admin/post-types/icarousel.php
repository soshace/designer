<?php

/*-----------------------------------------------------------------------------------*/
/* Manage icarousel's columns */
/*-----------------------------------------------------------------------------------*/
function edit_icarousel_columns($icarousel_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" =>__('Slider Item Title','mk_framework'),
		"thumbnail" => 'Thumbnail',
		"date" => 'Date',
	);

	return $columns;
}
add_filter('manage_edit-icarousel_columns', 'edit_icarousel_columns');


function manage_icarousel_columns($column) {
	global $post;

	if ($post->post_type == "icarousel") {
		switch($column){
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_icarousel_columns', 10, 2);
/*-----------------------------------------------------------------------------------*/
/* Add image size for icarousel */
/*-----------------------------------------------------------------------------------*/
if ((isset($_REQUEST['post_id']) && get_post_type($_REQUEST['post_id']) == 'icarousel') ||
	(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete')) {
	add_image_size('icarousel', 1920, 440, true);
}





/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types */
/*-----------------------------------------------------------------------------------*/
function register_icarousel_post_type(){

	global $mk_options;
   		if($mk_options['iCarousel-post-type'] == 'false') return false;


	register_post_type('icarousel', array(
		'labels' => array(
			'name' => __('iCarousel','mk_framework'),
			'singular_name' => __('iCarousel Item','mk_framework'),
			'add_new' => __('Add New Slider','mk_framework'),
			'add_new_item' => __('Add New Slider Item', 'mk_framework' ),
			'edit_item' => __('Edit Slider Item','mk_framework'),
			'new_item' => __('New Slider Item','mk_framework'),
			'view_item' => __('View Slider Item','mk_framework'),
			'search_items' => __('Search Slider Items','mk_framework'),
			'not_found' =>  __('No slider item found','mk_framework'),
			'not_found_in_trash' => __('No slider items found in Trash','mk_framework'),
			'parent_item_colon' => '',
		),
		'singular_label' => 'icarousel',
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-feedback',
		'menu_position' => 100,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'query_var' => false,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'thumbnail', 'page-attributes', 'revisions')
	));
}
add_action('init','register_icarousel_post_type');

function icarousel_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'icarousel' ) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'icarousel_context_fixer' );


