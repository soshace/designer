<?php

$title = $link = $size = $el_position = $width = $el_class = '';
extract( shortcode_atts( array(
			'title' => '',
			'link' => '',
			'el_class' => '',
			'animation' => '',
		), $atts ) );
$output = $animation_css ='';

if ( $link == '' ) { return null; }


if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
global $wp_embed;
$embed = $wp_embed->run_shortcode( '[embed width="1140" height="641"]'.$link.'[/embed]' );

$output .= "\n\t".'<div class="wpb_video_widget '.$animation_css.$el_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= '<div class="video-container">' . $embed . '</div>';
$output .= "\n\t\t".'</div>';
$output .= "\n\t".'</div>';
echo $output;
