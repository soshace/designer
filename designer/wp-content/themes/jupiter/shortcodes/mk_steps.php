<?php
global $mk_options;
extract( shortcode_atts( array(
			'title' => '',
			'step' => 4,
			'hover_color' => $mk_options['skin_color'],
			'icon_1' => '',
			'title_1' => '',
			'desc_1' => '',
			'url_1' => '',

			'icon_2' => '',
			'title_2' => '',
			'desc_2' => '',
			'url_2' => '',

			'icon_3' => '',
			'title_3' => '',
			'desc_3' => '',
			'url_3' => '',

			'icon_4' => '',
			'title_4' => '',
			'desc_4' => '',
			'url_4' => '',

			'icon_5' => '',
			'title_5' => '',
			'desc_5' => '',
			'url_5' => '',

			'el_class' => '',
			'animation' => '',
		), $atts ) );

$animation_css = $output = '';

$id = uniqid();

if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
$output .= '<div id="mk-process-'.$id.'" class="mk-process-steps mk-shortcode process-steps-'.$step.' '.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading" style="text-align:left;"><span>'.$title.'</span></h3>';
}
$output .= '<ul>' . "\n";
for ( $i=1; $i <= $step; $i++ ) {

	if ( !empty( ${'icon_'.$i} ) ) {
        ${'icon_'.$i} = (strpos(${'icon_'.$i}, 'mk-') !== FALSE) ? ${'icon_'.$i} : ( 'mk-'.${'icon_'.$i}.'' );        
	} 

	$output .= !empty( ${'url_'.$i} ) ? ('<li><a href="'.${'url_'.$i}.'"><span class="mk-process-icon'.$animation_css.'"><i class="'.${'icon_'.$i}.'"></i></span></a>') : ('<li><span class="mk-process-icon'.$animation_css.'"><i class="'.${'icon_'.$i}.'"></i></span>');
	$output .= '<div class="mk-process-detail">';
	$output .= !empty( ${'url_'.$i} ) ? ( '<h3><a href="'.${'url_'.$i}.'">'.${'title_'.$i}.'</a></h3>' ) : ( '<h3>'.${'title_'.$i}.'</h3>' );
	$output .= '<div class="clearboth"></div>';
	if(${'desc_'.$i} != '') {
		$output .= '<p>'.${'desc_'.$i}.'</p>';
	}
	$output .= '</div>';
	$output .= '</li>' . "\n";
}

$output .= '<div class="clearboth"></div></ul></div>' . "\n";


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= '#mk-process-'.$id.' ul li:hover .mk-process-icon {background-color:'.$hover_color.';}';

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
