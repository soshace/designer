<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'type' => 'confirm-message',
		), $atts ) );
$id = uniqid();

$output = '';

$output .= '<div id="message-box-'.$id.'" class="mk-message-box mk-shortcode '.$el_class.' mk-'.$type.'-box">';
$output .= '<a class="box-close-btn" href="#"><i class="mk-icon-remove"></i></a>';
$output .= '<span>'.strip_tags( do_shortcode( $content ) ).'</span>';
$output .= '<div class="clearboth"></div></div>';

echo $output;
