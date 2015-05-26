<?php

function register_faq_post_type(){

	global $mk_options;
   		if($mk_options['faq-post-type'] == 'false') return false;

	register_post_type('faq', array(
		'labels' => array(
			'name' => __('FAQ', 'mk_framework' ),
			'singular_name' => __('FAQ', 'mk_framework' ),
			'add_new' => __('Add New', 'mk_framework' ),
			'add_new_item' => __('Add New FAQ', 'mk_framework' ),
			'edit_item' => __('Edit FAQ', 'mk_framework' ),
			'new_item' => __('New FAQ', 'mk_framework' ),
			'view_item' => __('View FAQs', 'mk_framework' ),
			'search_items' => __('Search FAQs', 'mk_framework' ),
			'not_found' =>  __('No FAQs found', 'mk_framework' ),
			'not_found_in_trash' => __('No FAQs found in Trash', 'mk_framework' ), 
			'parent_item_colon' => '',
		),
		'singular_label' => __('FAQ', 'mk_framework' ),
		'public' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'menu_icon'=> 'dashicons-editor-help',
		'capability_type' => 'post',
		'menu_position' => 100,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'faq'),
		'query_var' => false,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor', 'page-attributes', 'revisions')
	));

	//register taxonomy for FAQ
	register_taxonomy('faq_category','faq',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'FAQ Categories', 'mk_framework' ),
			'singular_name' => __( 'FAQ Category', 'mk_framework' ),
			'search_items' =>  __( 'Search FAQs', 'mk_framework' ),
			'popular_items' => __( 'Popular Categories', 'mk_framework' ),
			'all_items' => __( 'All Categories', 'mk_framework' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit FAQ Category', 'mk_framework' ), 
			'update_item' => __( 'Update FAQ Category', 'mk_framework' ),
			'add_new_item' => __( 'Add New FAQ Category', 'mk_framework' ),
			'new_item_name' => __( 'New FAQ Category Name', 'mk_framework' ),
			'separate_items_with_commas' => __( 'Separate FAQ category with commas', 'mk_framework' ),
			'add_or_remove_items' => __( 'Add or remove FAQ category', 'mk_framework' ),
			'choose_from_most_used' => __( 'Choose from the most used FAQ category', 'mk_framework' ),
			
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => false,
		'show_in_nav_menus' => false,
	));
}
add_action('init','register_faq_post_type');

function faq_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'faq' ) {
		global $wp_query;
		$wp_query->is_home = false;
	}
	if ( get_query_var( 'taxonomy' ) == 'faq_category' ) {
		global $wp_query;
		$wp_query->is_404 = true;
		$wp_query->is_tax = false;
		$wp_query->is_archive = false;
	}
}
add_action( 'template_redirect', 'faq_context_fixer' );

/*-----------------------------------------------------------------------------------*/
/* Manage portfolio's columns */
/*-----------------------------------------------------------------------------------*/
function edit_faq_columns($faq_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('FAQ Name', 'column name', 'mk_framework' ),
		"faq_categories" => __('Categories', 'mk_framework' ),
	);

	return $columns;
}
add_filter('manage_edit-faq_columns', 'edit_faq_columns');

function manage_faq_columns($column) {
	global $post;
	
	if ($post->post_type == "faq") {
		switch($column){

			case "faq_categories":
				$terms = get_the_terms($post->ID, 'faq_category');
				
				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=faq&faq_tag=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'faq_tag', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('faq_category');
					$output = "No $t->label";
				}
				
				echo $output;
				break;
			
		}
	}
}
add_action('manage_posts_custom_column', 'manage_faq_columns', 10, 2);

?>