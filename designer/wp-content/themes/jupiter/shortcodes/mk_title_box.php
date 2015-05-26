<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'color' => '',
			'highlight_color' => '',
			'highlight_opacity' => 0.3,
			"size" => '18',
			'letter_spacing' => 0,
			'stroke' => 0,
			'stroke_color' => '',
			'font_weight' => 'normal',
			'margin_bottom' => '20',
			'margin_top' => '0',
			'line_height' => '34',
			"align" => 'left',
			'animation' => '',
			"font_family" => '',
			"font_type" => '',
		), $atts ) );
$id = uniqid();
$output = $stroke_style_css = $animation_css = $highlight_css = '';

$output .= mk_get_fontfamily( "#fancy-title-", $id, $font_family, $font_type );

if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

if($stroke > 0) {
	$stroke_color = $stroke_color ? $stroke_color : $color;
	$stroke_style_css = 'border:'.$stroke.'px solid '.$stroke_color.';padding-left:'.($line_height/2.5).'px;padding-right:'.($line_height/2.5).'px;display:inline-block;';
}
if(!empty($highlight_color)) {
	if($stroke > 0) {
		$highlight_css = 'background-color:'.mk_color( $highlight_color, $highlight_opacity ).';';	
	} else {
		$highlight_css = 'background-color:'.mk_color( $highlight_color, $highlight_opacity ).'; box-shadow: 8px 0 0 '.mk_color( $highlight_color, $highlight_opacity ).', -8px 0 0 '.mk_color( $highlight_color, $highlight_opacity ).';';
	}
}


$output .= '<h3 style="font-size: '.$size.'px;text-align:'.$align.';color: '.$color.';font-weight:'.$font_weight.';letter-spacing:'.$letter_spacing.'px;margin-top:'.$margin_top.'px;margin-bottom:'.$margin_bottom.'px;" id="fancy-title-'.$id.'" class="mk-shortcode mk-title-box '.$animation_css.' '.$el_class.'"><span style="'.$stroke_style_css.$highlight_css.'line-height:'.$line_height.'px">' . wpb_js_remove_wpautop( $content ). '</span></h3><div class="clearboth"></div>';

echo $output;
