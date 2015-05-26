<?php

extract( shortcode_atts( array(
			'text' => '',
			'tooltip_text' => '',
			'href' => '#',
			'el_class' => '',
		), $atts ) );

global $mk_options;

$bg_color = !empty( $bg_color ) ? $bg_color : $mk_options['skin_color'];
$text_color = !empty( $text_color ) ? $text_color : "#fff";

echo '<span class="mk-tooltip mk-shortcode '.$el_class.'"><a href="'.$href.'" class="tooltip-init">'.$text.'</a><span class="tooltip-text">'.$tooltip_text.'</span></span>';
