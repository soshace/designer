<?php

extract( shortcode_atts( array(
			'heading_title' => '',
			'image_diameter' => 770,
			'image_height' => 350,
			'src' => '',
			'animation' => '',
			'link' => '',
			'visibility' => '',
			'el_class' => '',
		), $atts ) );

require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$image_src = bfi_thumb( $src, array('width' => $image_diameter, 'height' => $image_diameter)); 
$animation_css = '';
if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

$output .= '<div class="mk-circle-image  mk-shortcode '.$visibility.' '.$animation_css.$el_class.'">';
if ( !empty( $heading_title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$heading_title.'</span></h3>';
}
$output .= '<span class="item-holder">';
if ( $link ) {
	$output .= '<a href="'.$link.'"><img alt="'.$heading_title.'" title="'.$heading_title.'" src="'.$image_src.'" /></a>';
} else {
	$output .= '<img alt="'.$heading_title.'" title="'.$heading_title.'" src="'.mk_thumbnail_image_gen($image_src, $image_diameter, $image_diameter).'" />';
}

$output .= '</span></div><div class="clearboth"></div>';

echo $output;
