<?php
extract( shortcode_atts( array(
			'title' => __( "Section", "mk_framework" ),
			'icon' => '',
		), $atts ) );

$output = '';
if(!empty( $icon )) {
    $icon = (strpos($icon, 'mk-') !== FALSE) ? ( '<i class="'.$icon.'"></i>' ) : ( '<i class="mk-'.$icon.'"></i>' );    
} else {
	$icon = '';
}
$output .= "\n\t\t\t\t" . '<div class="mk-accordion-single"><div class="mk-accordion-tab">'.$icon.'<span>'.$title.'</span></div>';
$output .= "\n\t\t\t\t" . '<div class="mk-accordion-pane">';
$output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", 'mk_framework') : "\n\t\t\t\t" . wpb_js_remove_wpautop($content, true);
$output .= "\n\t\t\t\t" . '<div class="clearboth"></div></div></div>';

echo $output;
