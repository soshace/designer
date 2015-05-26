<?php
$title  = $el_position = $el_class = '';
extract( shortcode_atts( array(
			'heading_title' => '',
			'style' => 'default',
            'orientation' => 'horizental',
			'title' => '',
			"container_bg_color" => '',
			'tab_location' => '',
            'inner_padding' => '',
			'el_class' => '',
		), $atts ) );
$output = $tab_location_css =  $orientation_css = '';


$id = uniqid();
if ( !empty( $heading_title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$heading_title.'</span></h3>';
}


$output = '<ul class="mk-tabs-tabs">';
if ( preg_match_all( "/(.?)\[(vc_tab)\b(.*?)(?:(\/))?\]/s", $content, $matches ) ) {
        for ( $i = 0; $i < count( $matches[ 0 ] ); $i++ ) {
            $matches[ 3 ][ $i ] = shortcode_parse_atts( $matches[ 3 ][ $i ] );
        }
        for ( $i = 0; $i < count( $matches[ 0 ] ); $i++ ) {
            $icon = isset($matches[ 3 ][ $i ][ 'icon' ]) ? $matches[ 3 ][ $i ][ 'icon' ] : '';
            if($icon == '') {
                $output .= '<li><a href="#'.$matches[ 3 ][ $i ][ 'tab_id' ].'">' . $matches[ 3 ][ $i ][ 'title' ] . '</a></li>';
            } else {
                $icon = (strpos($icon, 'mk-') !== FALSE) ? $icon : ( 'mk-'.$icon.'' );    
                $output .= '<li class="tab-with-icon"><a href="#'. $matches[ 3 ][ $i ][ 'tab_id' ] .'"><i class="' . $icon . '"></i>' . $matches[ 3 ][ $i ][ 'title' ] . '</a></li>';
            }
    }
}

$output .= '<div class="clearboth"></div></ul>';
$output .= '<div class="mk-tabs-panes">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop( $content );
$output .= '<div class="clearboth"></div></div>';

if($style == 'default') {
    $orientation_css = ' '.$orientation.'-style ';
    if ( $orientation == 'vertical') {
    	$tab_location_css = ' vertical-'.$tab_location;
    }
}    
echo $heading_title.'<div id="mk-tabs-'.$id.'" class="mk-shortcode mk-tabs'.$tab_location_css.' '.$style.'-style '.$orientation_css.' ' . $el_class . '">' . $output . '<div class="clearboth"></div></div>';

// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$container_bg_color = !empty($container_bg_color) ? ('background-color:'.$container_bg_color.';') : '';
$app_styles = '
#mk-tabs-'.$id.' .mk-tabs-tabs li.ui-tabs-active a, #mk-tabs-'.$id.' .mk-tabs-panes, #mk-tabs-'.$id.' .mk-fancy-title span{
    '.$container_bg_color.'
}';


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);