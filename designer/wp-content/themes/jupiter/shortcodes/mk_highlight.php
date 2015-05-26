<?php

extract( shortcode_atts( array(
			'text' => '',
			'bg_color' => '',
			'text_color' => '',
			'el_class' => '',
		), $atts ) );
global $mk_options;

$bg_color = !empty( $bg_color ) ? $bg_color : $mk_options['skin_color'];
$text_color = !empty( $text_color ) ? $text_color : "#fff";

echo '<span style="background-color:'.$bg_color.';color:'.$text_color.'" class="mk-highlight mk-shortcode '.$el_class.'">'.$text.'</span>';
