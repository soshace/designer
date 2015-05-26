<?php

$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'border_color' => '',
			'border_width' => 1,
			'bg_color' => 'transparent',
			'bg_image' => '',
			'bg_position' => 'center center',
			'bg_repeat' => 'repeat',
			'bg_stretch' => '',
			'predefined_bg' => '',
			'padding_horizental' => '20',
			'padding_vertical' => '20',
			'min_height' => '100',
			'margin_bottom' => '10',
			'visibility' => '',
			'animation' => '',
		), $atts ) );

$output = $bg_stretch_class = $animation_css ='';
$id = uniqid();

if ( $bg_stretch == 'true' ) {
	$bg_stretch_class = 'mk-background-stretch';
}
if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}

if ( !empty( $bg_image ) ) {
	$backgroud_image = !empty( $bg_image ) ? 'background-image:url('.$bg_image.'); ' : '';
} else {
	$backgroud_image = !empty( $predefined_bg ) ? 'background-image:url('.THEME_IMAGES.'/pattern/'.$predefined_bg.'.png);' : '';
}
$border = !empty( $border_color ) ? ( 'border:'.$border_width.'px solid '.$border_color.';' ) : '';

$output .= '<div id="mk-custom-box-'.$id.'" class="mk-custom-boxed mk-blur-parent mk-blur-'.$id.' mk-shortcode '.$visibility.' '.$bg_stretch_class.' '.$animation_css.$el_class.'" style="margin-bottom:'.$margin_bottom.'px">';
$output .= wpb_js_remove_wpautop( $content, true );
$output .= '<div class="clearboth"></div></div>';

// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= '
#mk-custom-box-'.$id.' {
    min-height:'.$min_height.'px;
    padding:'.$padding_vertical.'px '.$padding_horizental.'px;
    '. $backgroud_image.'
    background-attachment:scroll;
    background-repeat:'.$bg_repeat.';
    background-color:'.$bg_color.';
    background-position:'.$bg_position.';
    margin-bottom:'.$margin_bottom.'px;
    '.$border.'

}
#mk-custom-box-'.$id.' .mk-fancy-title.pattern-style span{
    background-color: '.$bg_color.' !important;
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
