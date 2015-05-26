<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'title' => '',
			'style' => 'f00c',
			'icon_color'=> '#444',
			'animation' => '',
			'align' => 'none',
			'margin_bottom' => '',
		), $atts ) );

$id = uniqid();
$output = $animation_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

if ( substr( $style, 0, 1 ) == 'f' ) {
	$font_family = 'FontAwesome';
} else if(substr( $style, 0, 2 ) == 'e6' ) {
	$font_family = 'Pe-icon-line';
} else {
	$font_family = 'Icomoon';
}

$output .= '<div id="list-style-'.$id.'" class="mk-list-styles mk-shortcode mk-align-'.$align.' '.$animation_css.$el_class.'" style="margin-bottom:'.$margin_bottom.'px">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= wpb_js_remove_wpautop( $content, true );
$output .= '</div>';


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= '
#list-style-'.$id.' ul li:before {
    font-family:'.$font_family.';
    content: "\\'.$style.'";
    color:'.$icon_color.'
}';

echo $output;

// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);