<?php

extract( shortcode_atts( array(
			'title' => false,
			'style' => 'simple',
			'icon' => '',
			"el_class" => '',
		), $atts ) );

$id = uniqid();
$output = '';

if(!empty( $icon )) {
    $icon = (strpos($icon, 'mk-') !== FALSE) ? ( $icon ) : ( 'mk-'.$icon );    
} else {
	$icon = '';
}

$output .= '<div id="mk-toggle-'.$id.'" class="mk-toggle mk-shortcode '.$style.'-style '.$el_class.'">';
if ( $icon && $style != 'simple' ) {
	$output .= '<span class="mk-toggle-title"><i class="' . $icon . '"></i><span>' .$title . '</span></span>';
} else {
	$output .= '<span class="mk-toggle-title">' .$title . '</span>';
}
$output .= '<div class="mk-toggle-pane">' . wpb_js_remove_wpautop( do_shortcode( trim( $content ) ), true ) . '</div></div>';
echo $output;
