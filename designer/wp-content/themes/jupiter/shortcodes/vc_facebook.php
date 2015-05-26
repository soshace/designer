<?php

$type = $url = '';
extract( shortcode_atts( array(
			'type' => 'standard', //standard, button_count, box_count
			'custom_url' => '',
		), $atts ) );
if ( $custom_url == '' ) $custom_url = get_permalink();
$output .= '<div class="wpb_fb_like fb_type_'.$type.'"><iframe src="http://www.facebook.com/plugins/like.php?href='.$custom_url.'&amp;layout='.$type.'&amp;show_faces=false&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>';
echo $output;
