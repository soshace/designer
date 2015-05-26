<?php
$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'title' => '',
			'style' => 'style1',
			'visibility' => '',
		), $atts ) );

$output = '';

$output .= "\n\t".'<div class="'.$el_class.' '.$visibility.'"><div class="mk-fancy-table mk-shortcode table-'.$style.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= "\n\t\t\t".wpb_js_remove_wpautop( $content );
$output .= "\n\t".'</div></div>';

echo $output;
