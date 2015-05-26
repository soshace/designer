<?php

extract( shortcode_atts( array(
			'count'=> -1,
			'column' => 3,
			'style' => 'simple',
			'rounded_image' => 'true',
			'box_blur' => 'true',
			'employees' => '',
			'animation' => '',
			'description' => 'true',
			'el_class' => '',
			'offset' => '',
			'orderby'=> 'date',
			'order'=> 'DESC',
		), $atts ) );

$output = $animation_css = '';


$query = array(
	'post_type' => 'employees',
	'showposts' => $count,
);

if ( $employees ) {
	$query['post__in'] = explode( ',', $employees );
}
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

$loop = new WP_Query( $query );
$image_dimension = $column_css = $blur_css = $blur_item_css = '';
switch ( $column ) {
case 1 :
	if($style == 'classic') {
		$image_dimension = 225;	
	} else {
		$image_dimension = 225;
	}
	
	$column_css = 'one-column';
	break;
case 2 :
	if($style == 'classic') {
		$image_dimension = 500;	
	} else {
		$image_dimension = 225;
	}
	$column_css = 'two-column';
	break;
case 3 :
	if($style == 'classic') {
		$image_dimension = 500;	
	} else {
		$image_dimension = 225;
	}
	$column_css = 'three-column';
	break;
case 4 :
	if($style == 'classic') {
		$image_dimension = 500;	
	} else {
		$image_dimension = 225;
	}
	$column_css = 'four-column';
	break;
case 5 :
	if($style == 'classic') {
		$image_dimension = 500;	
	} else {
		$image_dimension = 225;
	}
	$column_css = 'five-column';
	break;
}
if ( $style == 'boxed' ) {
	$image_dimension = 90;
	if ( $box_blur == 'true' ) {
		$blur_css = 'employee-blur';
		$blur_item_css = 'employee-item-blur';
	}
}


$output .= '<div class="mk-employees mk-shortcode '.$el_class.' '.$column_css.' '.$style.'-style '.$blur_css.'"><ul>';

$i = 0;
while ( $loop->have_posts() ):
	$loop->the_post();
$i++;
$link = get_post_meta( get_the_ID(), '_permalink', true );
$facebook = get_post_meta( get_the_ID(), '_facebook', true );
$linkedin = get_post_meta( get_the_ID(), '_linkedin', true );
$twitter = get_post_meta( get_the_ID(), '_twitter', true );
$email = get_post_meta( get_the_ID(), '_email', true );
$googleplus = get_post_meta( get_the_ID(), '_googleplus', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_dimension*2, 'height' => $image_dimension*2)); 

$first_column = '';
if ( ( $i-1 )%$column == 0 ) {
	$first_column = 'em-first-column';
}

if ( !empty( $link ) ) {
	$link_array = explode( '||', $link );
	switch ( $link_array[ 0 ] ) {
	case 'page':
		$link = get_page_link( $link_array[ 1 ] );
		break;
	case 'cat':
		$link = get_category_link( $link_array[ 1 ] );
		break;
	case 'portfolio':
		$link = get_permalink( $link_array[ 1 ] );
		break;
	case 'post':
		$link = get_permalink( $link_array[ 1 ] );
		break;
	case 'manually':
		$link = $link_array[ 1 ];
		break;
	}
}

$social_output = '<ul class="mk-employeee-networks">';
if ( !empty( $email ) ) {
	$social_output .= '<li><a target="_blank" href="mailto:'.antispambot( $email ).'" title="'.__( 'Get In Touch With', 'mk_framework' ).' '.get_the_title().'"><i class="mk-icon-envelope"></i></a></li>';
}
if ( !empty( $facebook ) ) {
	$social_output .= '<li><a target="_blank" href="'.$facebook.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Facebook"><i class="mk-moon-facebook"></i></a></li>';
}
if ( !empty( $twitter ) ) {
	$social_output .= '<li><a target="_blank" href="'.$twitter.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Twitter"><i class="mk-moon-twitter"></i></a></li>';
}
if ( !empty( $googleplus ) ) {
	$social_output .= '<li><a target="_blank" href="'.$googleplus.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Google Plus"><i class="mk-moon-google-plus"></i></a></li>';
}
if ( !empty( $linkedin ) ) {
	$social_output .= '<li><a target="_blank" href="'.$linkedin.'" title="'.get_the_title().' '.__( 'On', 'mk_framework' ).' Linked In"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>';
}
$social_output .= '</ul>';



$output .= '<li class="mk-employee-item '.$first_column.' '.$blur_item_css.'">';
$output .= '<div class="team-thumbnail rounded-'.$rounded_image.' '.$animation_css.'">';
$output .= (!empty($link) ? '<a href="'.$link.'"  class="test">' : '');
$output .= '<img alt="'.get_the_title().'" title="'.get_the_title().'" src="'. mk_thumbnail_image_gen($image_src, $image_dimension, $image_dimension).'" />';
$output .= (!empty($link) ? '</a>' : '');

if($style == 'classic') {
	$output .= $social_output;
	$output .= '<div class="employee-hover-overlay"></div>';
}

$output .= '</div>';



$output .= '<div class="team-info-wrapper">';
$output .= (!empty($link) ? '<a href="'.$link.'">' : '') . '<span class="team-member-name">'.get_the_title().'</span>' . (!empty($link) ? '</a>' : '');
$output .= '<span class="team-member-position">'.get_post_meta( get_the_ID(), '_position', true ).'</span>';
if ( $description == 'true' ) {

	$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', get_post_meta( get_the_ID(), '_desc', true ) ) );
	
	$output .= '<span class="team-member-desc">'.$content.'</span>';
}
$output .= '<div class="clearboth"></div>';

if($style != 'classic') {
	$output .= $social_output;
}

$output .= '</div>';
$output .= '</li>';

if ( $i%$column == 0 ) {
	$output .= '<div class="clearboth"></div>';
}
endwhile;
wp_reset_query();

$output .= '</ul><div class="clearboth"></div></div>';


echo $output;