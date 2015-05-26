<?php

extract( shortcode_atts( array(
			"images" => '',
			"image_width" => 770,
			"image_height" => 350,
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"direction" => 'horizontal',
			"direction_nav" => "true",
			"pagination" => "false",
			"freeModeFluid"=> "true",
			"freeMode" => "false",
			'loop' => 'true',
			"mousewheelControl" => 'false',
			"el_class" => '',
		), $atts ) );


if ( $images == '' ) return null;
require_once(THEME_FUNCTIONS . "/bfi_cropping.php");

$id = uniqid();
$slides = $output = '';
$images = explode( ',', $images );
$i = -1;

foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height)); 


	$slides .= '<div class="swiper-slide">';
	$slides .= '<img alt="" src="' .mk_thumbnail_image_gen($image_src, $image_width, $image_height) .'" />';
	$slides .= '</div>' . "\n\n";

}

$output .= '<div class="mk-swipe-slideshow" style="max-width:' . $image_width . 'px;"><div id="mk-swiper-'.$id.'" data-loop="'.$loop.'" data-freeModeFluid="'.$freeModeFluid.'" data-slidesPerView="1" data-pagination="'.$pagination.'" data-freeMode="'.$freeMode.'" data-mousewheelControl="'.$mousewheelControl.'" data-direction="'.$direction.'" data-slideshowSpeed="'.$slideshow_speed.'" data-animationSpeed="'.$animation_speed.'" data-directionNav="'.$direction_nav.'" class="mk-swiper-container mk-swiper-slider '.$el_class.'">';

$output .= '<div class="mk-swiper-wrapper">' .$slides . '</div>';

if($direction_nav == 'true') {
	$output .= '<a class="mk-swiper-prev swiper-arrows"><i class="mk-jupiter-icon-arrow-left"></i></a>';
	$output .= '<a class="mk-swiper-next swiper-arrows"><i class="mk-jupiter-icon-arrow-right"></i></a>';
}

$output .= '</div></div>';

echo $output;