<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'style' => 'true',
			'color' => '#3d3d3d',
			"size" => '30',
			'font_weight' => 'normal',
			'margin_bottom' => '20',
			'txt_transform' => '',
			'letter_spacing' => '',
			'margin_top' => '0',
			"align" => 'left',
			'animation' => '',
			"font_family" => '',
			'tag_name' => 'h2',
			'font_style' => 'inherit',
			"font_type" => '',
), $atts ) );
$id = uniqid();
$output = '';
$divider_css = $animation_css = $span_padding = '';
$force_responsive = ($size > 35) ? ' mk-force-responsive' : '';
$style = ( $style == 'true' ) ? 'pattern' : 'simple';
$output .= mk_get_fontfamily( "#fancy-title-", $id, $font_family, $font_type );
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
if ( $style == 'pattern' ) {
	if ( $align == 'left' ) {$span_padding = 'padding-right:8px;';}
	else if ( $align == 'center' ) {$span_padding = 'padding:0 8px;';}
	else if ( $align == 'right' ) {$span_padding = 'padding-left:8px;';}
	$echo_output = strip_tags( $content );
} else {
	$echo_output = wpb_js_remove_wpautop( $content );
}
$letter_spacing = ($letter_spacing != '') ? ('letter-spacing:'.$letter_spacing.'px;') : '';
$txt_transform = ($txt_transform != '') ? ('text-transform:'.$txt_transform.';') : '';
$output .= '<'.$tag_name.' style="font-size: '.$size.'px;text-align:'.$align.';color: '.$color.';font-style:'.$font_style.';font-weight:'.$font_weight.';padding-top:'.$margin_top.'px;padding-bottom:'.$margin_bottom.'px; '.$divider_css.$txt_transform.$letter_spacing.'" id="fancy-title-'.$id.'" class="mk-shortcode mk-fancy-title fancy-title-align-'.$align.$force_responsive.' '.$animation_css.$style.'-style '.$el_class.'"><span style="'.$span_padding.'">';
$output .= $echo_output;
$output .= '</span></'.$tag_name.'><div class="clearboth"></div>';

echo $output;
