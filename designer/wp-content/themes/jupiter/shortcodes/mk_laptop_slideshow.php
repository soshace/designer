<?php

extract( shortcode_atts( array(
			"title" => '',
			"images" => '',
			"size" => 'full',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			"el_class" => '',
			'animation' => '',
		), $atts ) );

if ( $images == '' ) return null;
$id = uniqid();
require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$animation_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}


$script_out = '<script type="text/javascript">
        jQuery(document).ready(function() {
                jQuery("#flexslider_'.$id.'").find(".mk-laptop-image").fadeIn();
        });
        </script>';

$heading_title = '';
if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

$output = '';
$images = explode( ',', $images );
$i = -1;

$image_width = 635;
$image_height = 405;
$container_width = 836;
$container_height = 481;

foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height)); 

	$output .= '<li>';
	$output .= '<img alt="" src="' . mk_thumbnail_image_gen($image_src, $image_width, $image_height) .'" />';
	$output .= '</li>'. "\n\n";

}

echo $heading_title.'<div data-animation="fade" data-smoothHeight="false" data-animationSpeed="'.$animation_speed.'" data-slideshowSpeed="'.$slideshow_speed.'" data-pauseOnHover="'.$pause_on_hover.'" data-controlNav="false" data-directionNav="true" data-isCarousel="false" style="max-height:'.$container_height.'px;max-width:'.$container_width.'px;" class="mk-laptop-slideshow-shortcode mk-script-call '.$animation_css.$size.'-laptop mk-flexslider '.$el_class.'" id="flexslider_'.$id.'"><img style="display:none" class="mk-laptop-image" src="'.THEME_IMAGES.'/theme-laptop-full.png" alt="" /><div class="slideshow-container"><ul class="mk-flex-slides" style="max-width:'.$image_width.'px;max-height:'.$image_height.'px;">' . $output . '</ul></div></div>' . "\n\n\n\n" . $script_out;




