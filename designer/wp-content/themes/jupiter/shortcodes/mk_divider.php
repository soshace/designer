<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'divider_width' => 'full',
			'custom_width' => '',
			'style' => 'double_dot',
			'align' => 'center',
			'thickness'=> 1,
			'border_color' => '',
			'margin_top' => '20',
			'margin_bottom' => '20',

		), $atts ) );
$output = $border_style = '';

if($style == 'thick_solid' || $style == 'thin_solid' || $style == 'single_dotted') {
	$border_style .= ($border_color != '') ? ('border-top-color:'.$border_color.';') : '';
}

if($style == 'thin_solid') {	
	$border_style .= ($thickness != '') ? ('border-top-width:'.$thickness.'px;') : '';
}

if ($divider_width == 'custom_width') {
	$output .= '<div style="padding: '.$margin_top.'px 0 '.$margin_bottom.'px; width: '.$custom_width.'px " class="mk-divider mk-shortcode custom-width '.$align.' '.$style.' '.$el_class.'">';
} else {
	$output .= '<div style="padding: '.$margin_top.'px 0 '.$margin_bottom.'px;'.'" class="mk-divider mk-shortcode divider_'.$divider_width.' '.$align.' '.$style.' '.$el_class.'">';
}

// $output .= '<div style="padding: '.$margin_top.'px 0 '.$margin_bottom.'px; width: '.$divider_width.'px " class="mk-divider mk-shortcode divider_'.$divider_width.' '.$style.' '.$el_class.'">';
if ( $style == 'shadow_line' ) {
	$output .= '<div class="divider-inner"><span class="divider-shadow-left"></span><span class="divider-shadow-right"></span></div>';
} elseif ( $style == 'go_top' || $style == 'go_top_thick' ) {
	$output .= '<div class="divider-inner"><a href="#" class="divider-go-top"><i class="mk-jupiter-icon-arrow-top"></i></a></div>';
} else {
	$output .= '<div class="divider-inner" style="'.$border_style.'"></div>';
}
$output .= '</div><div class="clearboth"></div>';

echo $output;


