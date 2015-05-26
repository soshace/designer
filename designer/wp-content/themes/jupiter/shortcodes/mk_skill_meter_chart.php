<?php

extract( shortcode_atts( array(
			'title' => '',
			'percent_1' => false,
			'name_1' => false,
			'color_1' => false,
			'percent_2' => false,
			'name_2' => false,
			'color_2' => false,
			'percent_3' => false,
			'name_3' => false,
			'color_3' => false,
			'percent_4' => false,
			'name_4' => false,
			'color_4' => false,
			'percent_5' => false,
			'color_5' => false,
			'name_5' => false,
			'percent_6' => false,
			'name_6' => false,
			'color_6' => false,
			'percent_7' => false,
			'name_7' => false,
			'color_7' => false,
			'center_color' => '',
			'default_text' => 'Skills',
			'default_text_color' => '#fff',
			'animation' => '',
			'el_class' => '',
		), $atts ) );


$output = $animation_css = '';

$id = uniqid();
wp_enqueue_script( 'jquery-raphael' );

if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}


$output .= '<div class="mk-skill-chart mk-shortcode '.$animation_css.$el_class.'">';
$f = 0;
for ( $i = 1; $i <= 7; $i++ ) {
	if ( !empty( ${'name_'.$i} ) && ${'percent_'.$i} != 0 ) {
		$f++;
		$output .= '<div class="mk-meter-arch">
                               <input type="hidden" class="name" value="'.${'name_'.$i}.'" />
                               <input type="hidden" class="percent" value="'.${'percent_'.$i}.'" />
                               <input type="hidden" class="color" value="'.${'color_'.$i}.'" />
                           </div>';

	}
}
$diag_dimension = ( $f * 56 ) + 190;
$output .= '<div id="mk_skill_diagram" data-dimension="'.$diag_dimension.'" data-circle-color="'.$center_color.'" data-default-text-color="'.$default_text_color.'" data-default-text="'.$default_text.'"></div></div>';
echo $output;
