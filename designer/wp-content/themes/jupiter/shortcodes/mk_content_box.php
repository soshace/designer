<?php

$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'heading' => '',
			'icon' => '',
			'visibility' => '',
			'animation' => '',
		), $atts ) );

$output = $animation_css = '';

if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

if(!empty( $icon )) {
    $icon = (strpos($icon, 'mk-') !== FALSE) ? $icon : ( 'mk-'.$icon );    
} else {
	$icon = '';
}

$output .= '<div class="mk-content-box mk-shortcode '.$visibility.' '.$animation_css.$el_class.'">';
$output .= '<span class="content-box-heading"><i class="'.$icon.'"></i> '.strip_tags( $heading ).'</span>';
$output .= '<div class="content-box-content">'.wpb_js_remove_wpautop( $content, true ).'</div>';
$output .= '<div class="clearboth"></div></div>';

echo $output;
