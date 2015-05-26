<?php

extract( shortcode_atts( array(
			'title' => '',
			"images" => '',
			"image_width" => 770,
			"image_height" => 350,
			"effect" => 'fade',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			"smooth_height" => "true",
			"direction_nav" => "true",
			"el_class" => '',
		), $atts ) );


if ( $images == '' ) return null;
require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$heading_title = '';
if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}


$output = '';
$images = explode( ',', $images );
$i = -1;

foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height)); 


	$output .= '<li>';
	$output .= '<img alt="" src="' . mk_thumbnail_image_gen($image_src, $image_width, $image_height) .'" />';
	$output .= '</li>'. "\n\n";

}

echo $heading_title.'<div style="max-width:' . $image_width . 'px;" class="mk-slideshow-shortcode mk-flexslider mk-script-call '.$el_class.'" data-animation="'.$effect.'" data-easing="swing" data-direction="horizontal" data-smoothHeight="'.$smooth_height.'" data-animationSpeed="'.$animation_speed.'" data-slideshowSpeed="'.$slideshow_speed.'" data-pauseOnHover="'.$pause_on_hover.'" data-controlNav="false" data-directionNav="'.$direction_nav.'" data-isCarousel="false"><ul class="mk-flex-slides">' . $output . '</ul></div>';
