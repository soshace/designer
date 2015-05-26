<?php

function register_news_post_type() {

	global $mk_options;
   		if($mk_options['news-post-type'] == 'false') return false;

	register_post_type( 'news', array(
			'labels' => array(
				'name' => __( 'News', 'mk_framework' ),
				'singular_name' => __( 'News', 'mk_framework' ),
				'add_new' => __( 'Add New', 'mk_framework' ),
				'add_new_item' => __( 'Add New News', 'mk_framework' ),
				'edit_item' => __( 'Edit News', 'mk_framework' ),
				'new_item' => __( 'New News', 'mk_framework' ),
				'view_item' => __( 'View News', 'mk_framework' ),
				'search_items' => __( 'Search News', 'mk_framework' ),
				'not_found' =>  __( 'No news found', 'mk_framework' ),
				'not_found_in_trash' => __( 'No News found in Trash', 'mk_framework' ),
				'parent_item_colon' => '',
			),
			'singular_label' => __( 'News', 'mk_framework' ),
			'public' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'menu_icon' => 'dashicons-welcome-widgets-menus',
			'capability_type' => 'post',
			'menu_position' => 100,
			'hierarchical' => false,
			'rewrite' => array( 'slug' => $mk_options['news_slug'] ),
			'query_var' => false,
			'show_in_nav_menus' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' , 'revisions')
		) );

	//register taxonomy for news
	register_taxonomy( 'news_category', 'news', array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'News Categories', 'mk_framework' ),
				'singular_name' => __( 'news Category', 'mk_framework' ),
				'search_items' =>  __( 'Search Categories', 'mk_framework' ),
				'popular_items' => __( 'Popular Categories', 'mk_framework' ),
				'all_items' => __( 'All Categories', 'mk_framework' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit News Category', 'mk_framework' ),
				'update_item' => __( 'Update News Category', 'mk_framework' ),
				'add_new_item' => __( 'Add New News Category', 'mk_framework' ),
				'new_item_name' => __( 'New News Category Name', 'mk_framework' ),
				'separate_items_with_commas' => __( 'Separate News category with commas', 'mk_framework' ),
				'add_or_remove_items' => __( 'Add or remove News category', 'mk_framework' ),
				'choose_from_most_used' => __( 'Choose from the most used News category', 'mk_framework' ),

			),
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => false,
			'show_in_nav_menus' => false,
		) );
}
add_action( 'init', 'register_news_post_type' );

function news_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'news' ) {
		global $wp_query;
		$wp_query->is_home = false;
	}
	if ( get_query_var( 'taxonomy' ) == 'news_category' ) {
		global $wp_query;
		$wp_query->is_404 = true;
		$wp_query->is_tax = false;
		$wp_query->is_archive = false;
	}
}
add_action( 'template_redirect', 'news_context_fixer' );

/*-----------------------------------------------------------------------------------*/
/* Manage portfolio's columns */
/*-----------------------------------------------------------------------------------*/
function edit_news_columns($gallery_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('news Name', 'column name', 'mk_framework' ),
		"news_categories" => __('Categories', 'mk_framework' ),
		"description" => __('Description', 'mk_framework' ),
		"thumbnail" => __('Thumbnail', 'mk_framework' )
	);

	return $columns;
}
add_filter('manage_edit-news_columns', 'edit_news_columns');

function manage_news_columns($column) {
	global $post;
	
	if ($post->post_type == "news") {
		switch($column){
			case "description":
				the_excerpt();
				break;
			case "news_categories":
				$terms = get_the_terms($post->ID, 'news_category');
				
				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=news&news_tag=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'news_tag', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('news_category');
					$output = "No $t->label";
				}
				
				echo $output;
				break;
			
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_news_columns', 10, 2);

?>