<?php

extract( shortcode_atts( array(
			'el_class' => '',
			"style" => 'quote-style',
			"text_size" => '12',
			"align" => 'left',
			"font_family" => '',
			'animation' => '',
			"font_type" => '',
		), $atts ) );
$id = uniqid();
$output = $animation_css ='';
$output .= mk_get_fontfamily( "#blockquote-", $id, $font_family, $font_type );
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
$output .= '<div style="font-size: '.$text_size.'px;" id="blockquote-'.$id.'" class="mk-shortcode mk-blockquote '.$style.' '.$animation_css.$el_class.'">' .wpb_js_remove_wpautop($content). '</div>';

echo $output;
