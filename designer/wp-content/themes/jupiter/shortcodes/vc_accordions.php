<?php
$title = $interval = $el_class = $output = '';

extract( shortcode_atts( array(
			'title' => '',
			'heading_title' => '',
			'interval' => 0,
			'style' => '',
			'container_bg_color' => '',
			'el_position' => '',
			'open_toggle' => '',
			'action_style' => 'accordion-style',
			'el_class' => ''
		), $atts ) );


$id = uniqid();

if ( !empty( $heading_title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$heading_title.'</span></h3>';
}
$output .= '<div data-initialIndex="'.$open_toggle.'" id="mk-accordion-'.$id.'" class="mk-accordion mk-shortcode '.$action_style.' '.$style.' '.$el_class.'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>';


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$container_bg_color = !empty($container_bg_color) ? ('background-color:'.$container_bg_color.';') : '';
$app_styles = '
 #mk-accordion-'.$id.' .mk-accordion-pane{
    '.$container_bg_color.'
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