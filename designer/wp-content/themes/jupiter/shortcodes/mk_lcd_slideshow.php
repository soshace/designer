<?php

extract( shortcode_atts( array(
			'title' => '',
			"images" => '',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			'animation' => '',
			"el_class" => '',
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
                jQuery("#flexslider_'.$id.'").find(".mk-lcd-image").fadeIn();
        });
        </script>';
$final_output = $heading_title = '';

if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

$output = '';
$images = explode( ',', $images );
$i = -1;


foreach ( $images as $attach_id ) {
	$i++;
	$image_src_array = wp_get_attachment_image_src( $attach_id, 'full', true );
	$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 810, 'height' => 475)); 

	$output .= '<li>';
	$output .= '<img alt="" src="' . mk_thumbnail_image_gen($image_src, 810, 475).'" />';
	$output .= '</li>'. "\n\n";

}

$final_output .= $heading_title.'<div style="max-width:872px;" data-animation="fade" data-smoothHeight="false" data-animationSpeed="'.$animation_speed.'" data-slideshowSpeed="'.$slideshow_speed.'" data-pauseOnHover="'.$pause_on_hover.'" data-controlNav="false" data-directionNav="true" data-isCarousel="false" class="mk-lcd-slideshow mk-script-call mk-flexslider '.$animation_css.$el_class.'" id="flexslider_'.$id.'"><img style="display:none" class="mk-lcd-image" src="'.THEME_IMAGES.'/theme-lcd-slideshow.png" alt="" /><div class="slideshow-container"><ul class="mk-flex-slides" style="max-width:838px;max-height:506px;">' . $output . '</ul></div></div>' . "\n\n\n\n" . $script_out;
echo $final_output;
