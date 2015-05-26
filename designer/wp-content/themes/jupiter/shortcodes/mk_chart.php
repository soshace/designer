<?php

extract( shortcode_atts( array(
			'desc' => '',
			'percent' => '',
			'bar_color' => '',
			'track_color' => '',
			'line_width' => '',
			'bar_size' => '',
			'content' => '',
			'content_type' => '',
			'icon' => '',
			'custom_text' => '',
			'percentage_text_size' => '',
			'percentage_color' => '',
			'el_class' => '',
			'icon_size' => '',
			'icon_color' => '',
			'visibility' => '',
			'animation' => '',
		), $atts ) );

$animation_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

$icon = (strpos($icon, 'mk-') !== FALSE) ? $icon : ( 'mk-'.$icon.'' );

$output = '<div class="'.$animation_css.' '.$visibility.'">';
$output .= '<div class="mk-chart" style="width:'.$bar_size.'px;height:'.$bar_size.'px;" data-percent="'.$percent.'" data-barColor="'.$bar_color.'" data-trackColor="'.$track_color.'" data-lineWidth="'.$line_width.'" data-barSize="'.$bar_size.'">';
if ( $content_type == 'icon' ) {
	$icon_size = (!empty($icon_size)) ? $icon_size : floor( $bar_size/4 );
	$icon_color =  (!empty($icon_color)) ? $icon_color : '#444';
	$output .= '<i style="line-height:'.$bar_size.'px; font-size:'.$icon_size.'px;color:'.$icon_color.'" class="'.$icon.'"></i>';
} elseif ( $content_type == 'custom_text' ) {
	$output .= '<span class="chart-custom-text">'.$custom_text.'</span>';
} else {
	$output .= '<div class="chart-percent" style="color:'.$percentage_color.'; font-size:'.$percentage_text_size.'px;"><span>'.$percent.'</span>%</div>';
}
$output .= '</div>';
$output .= '<div class="mk-chart-desc">'.$desc.'</div>';
$output .= '</div>';
echo $output;
