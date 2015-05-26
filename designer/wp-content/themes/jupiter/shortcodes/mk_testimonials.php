<?php

extract( shortcode_atts( array(
			'title' => '',
			'show_as' => 'slideshow',
			'column' => 3,
			'style' => 'boxed',
			'count'=> 10,
			'orderby'=> 'date',
			'testimonials' => '',
			"animation_speed" => 500,
			"slideshow_speed" => 7000,
			'order'=> 'DESC',
			'skin' => 'dark',
			"el_class"=> '',
			'animation' => '',
		), $atts ) );

require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$id = uniqid();
$animation_css = $skin_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

if ( $style == 'simple' || $style == "avantgarde" ) {
	$skin_css = $skin.'-version ';
}



if($style == 'modern') {
	$controlNav = 'true';
	$directionNav = 'false';
} else {
	$controlNav = 'false';
	$directionNav = 'true';
}




$query = array(
	'post_type' => 'testimonial',
	'showposts' => $count,
);

if ( $testimonials ) {
	$query['post__in'] = explode( ',', $testimonials );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$loop = new WP_Query( $query );

$output = $heading_title = $column_class = '';

if($show_as == 'column') {

	$slideshow_class = array('testimonial-column', 'testimonial-ul', '');

	switch($column) {
		case 1 :
		$column_class = 'one-column';
		break;
		case 2 :
		$column_class = 'two-column';
		break;
		case 3 :
		$column_class = 'three-column';
		break;
		case 4 :
		$column_class = 'four-column';
		continue;
	}

} else {

	$directionNavArrowsLeft = 'mk-jupiter-icon-arrow-left';
	$directionNavArrowsRight = 'mk-jupiter-icon-arrow-right';


	$slideshow_class = array('mk-flexslider', 'mk-flex-slides', 'data-arrow-left="'.$directionNavArrowsLeft.'" data-arrow-right="'.$directionNavArrowsRight.'" data-animation="fade" data-easing="swing" data-direction="horizontal" data-smoothHeight="false" data-animationSpeed="'.$animation_speed.'" data-slideshowSpeed="'.$slideshow_speed.'" data-pauseOnHover="true" data-controlNav="'.$controlNav.'" data-directionNav="'.$directionNav.'" data-isCarousel="false"');
}



if ( !empty( $title ) ) {
	if( $style == 'avantgarde' ) {
		$heading_title = '<h3 class="mk-shortcode title-line-style mk-shortcode-heading '.$skin_css.'"><span>'.$title.'</span></h3>';
	} else {
		$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
	}
}
$i = 0;
while ( $loop->have_posts() ):
	$loop->the_post();
$i++;
$url = get_post_meta( get_the_ID(), '_url', true );
$company = get_post_meta( get_the_ID(), '_company', true );
if ( $style == 'boxed' || $style == 'modern' || $style == 'avantgarde') {
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 120, 'height' => 120)); 
}
if ( $style != 'modern' ) {

	$output .= '<li class="'.$column_class.' testimonial-item">';
	$output .= '<div class="mk-testimonial-content">';
	$output .= '<p class="mk-testimonial-quote">'. get_post_meta( get_the_ID(), '_desc', true ).'</p>';
	$output .= '</div>';
	if ( ($style == 'boxed' || $style == 'avantgarde') && has_post_thumbnail() ) {
		$output .= '<div class="mk-testimonial-image '.$animation_css.'"><img width="95" height="95" src="'.mk_thumbnail_image_gen($image_src, 120, 120).'" alt="'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'" /></div>';
	}
	$output .= '<span class="mk-testimonial-author">'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'</span>';

	$output .= !empty( $url ) ? '<a target="_blank" href="'.$url.'">' : '';
	$output .= !empty( $company ) ? '<span class="mk-testimonial-company">'. strip_tags( $company ).'</span>' : '';
	$output .= !empty( $url ) ? '</a>' : '';
	$output .= '</li>'. "\n\n";



} else {

	$output .= '<li class="'.$column_class.' testimonial-item">';
	$output .= '<div class="mk-testimonial-content">';
	$output .= '<p class="mk-testimonial-quote">'. get_post_meta( get_the_ID(), '_desc', true ).'</p>';
	if (has_post_thumbnail()) {
		$output .= '<div class="mk-testimonial-image '.$animation_css.'"><img width="50" height="50" src="'.mk_thumbnail_image_gen($image_src, 120, 120).'" alt="'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'" /></div>';
	}
	$output .= '<span class="mk-testimonial-author">'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'</span>';
	$output .= !empty( $company ) ? ( '<a '.( !empty( $url ) ? ( 'href="'.$url.'" target="_blank"' ) : '' ).' class="mk-testimonial-company">'. strip_tags( $company ).'</a>' ) : '';
	$output .= '<div class="clearboth"></div></div>';
	$output .= '</li>'. "\n\n";
}

if($show_as == 'column' && ($i%$column == 0)) {
	$output .= '<div class="clearboth"></div>';
}

endwhile;

wp_reset_query();



$final_output = $heading_title;
$final_output .= '<div class="mk-testimonial mk-script-call '.$style.'-style '.$slideshow_class[0].' '.$skin_css.$el_class.'" id="testimonial_'.$id.'" '.$slideshow_class[2].'>';
if ( $style == 'simple' ) {
	$output .= '<i class="mk-moon-quotes-left"></i>';
	$output .= '<i class="mk-moon-quotes-right"></i>';
}
$final_output .= '<ul class="'.$slideshow_class[1].'">' . $output . '</ul></div>';

echo $final_output;
