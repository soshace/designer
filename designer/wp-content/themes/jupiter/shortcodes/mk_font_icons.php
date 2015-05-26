<?php
global $mk_options;
extract( shortcode_atts( array(
			'size' => 'medium',
			'icon' => '',
			'margin_horizental' => 4,
			'margin_vertical' => 4,
			'color' => $mk_options['skin_color'],
			'circle' => 'false',
			'circle_color' => '',
			'align' => '',
			'animation' => '',
			'smooth_scroll' => 'false',
			'link' => '',
			'target' => '_self',
			'el_class' => '',
		), $atts ) );

$color = !empty( $color ) ? ( 'color:' . $color .';' ) : '';

$circle_class =  $circle_style = $animation_css = '';
if ( $circle == 'true' ) {
	$circle_class = 'circle-enabled';
	$circle_style = 'background-color:'.$circle_color.';';
}
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

$output = '<span class="mk-font-icons mk-shortcode icon-align-'.$align.' '.$animation_css.$el_class.'">';
if ( $link ) {
	$smooth_scroll_css = (preg_match('/#/',$link)) ? ' class="mk-smooth"' : '';
	$output .= '<a target="'.$target.'" href="'.$link.'"'.$smooth_scroll_css.'>';
}
if(!empty( $icon )) {
    $icon = (strpos($icon, 'mk-') !== FALSE) ? $icon : ( 'mk-'.$icon.'' );    
}
$output .= '<i style="'.$color.'margin:'.$margin_vertical.'px;'.$margin_horizental.'px;'.$circle_style.'" class="'.$icon.' '.$circle_class.' mk-size-'.$size.'"></i>';

if ( $link ) {
	$output .= '</a>';
}
$output .= '</span>';

echo $output;
