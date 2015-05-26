<?php

extract( shortcode_atts( array(
			'author' => '',
			'posts' => '',
			'cat' => '',
			'offset' => '',
			'order'=> 'DESC',
			'orderby'=> 'date',
			'excerpt_length' => 100,
			'el_class' => '',
		), $atts ) );
$output = '';
$id = uniqid();
$query = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'ignore_sticky_posts' => 1
);
if ( $cat ) {
	$query['cat'] = $cat;
}
if ( $author ) {
	$query['author'] = $author;
}
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $posts ) {
	$query['post__in'] = explode( ',', $posts );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$r = new WP_Query( $query );


$output .= '<div class="mk-shortcode mk-blog-showcase '.$el_class.'">';
$output .= '<ul>';

$i = 0;
if ( $r->have_posts() ):
	while ( $r->have_posts() ) :
		$r->the_post();
	$i++;

$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 260, 'height' => 180)); 

$first_el_class = $i == 1 ? 'mk-blog-first-el' : '';

$output .= '<li class="'.$first_el_class.'">';
$output .= '<div class="mk-blog-showcase-thumb"><div class="showcase-blog-overlay"></div><a href="'.get_permalink().'"><i class="mk-jupiter-icon-plus-circle"></i></a><img src="'.mk_thumbnail_image_gen($image_src, 260, 180).'" alt="'.get_the_title().'" title="'.get_the_title().'" /></div>';
$output .= '<div class="blog-showcase-extra-info">';
$output .='<time datetime="'.get_the_date().'">';
$output .='<a href="'.get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ).'">'.get_the_date().'</a>';
$output .='</time>';
$output .= '<a class="blog-showcase-title" href="'.get_permalink().'">'.get_the_title().'</a><div class="clearboth"></div>';
if($excerpt_length != 0) {
	ob_start();
	the_excerpt_max_charlength($excerpt_length);
	$output .= '<div class="the-excerpt">' . ob_get_clean() . '</div>';
}
$output .='<a href="'.get_permalink().'" class="blog-showcase-more">'.__( 'Read more' , 'mk_framework' ).'<i class="mk-icon-double-angle-right"></i></a>';
$output .= '</div>';

$output .= '</li>';

endwhile;
wp_reset_query();
endif;


$output .= '<div class="clearboth"></div></ul></div>';
echo $output;
