<?php

extract( shortcode_atts( array(
			'background_style' => '',
			'max_width' => '',
			'host' => '',
			'mp4' => '',
			'webm' => '',
			'ogv' => '',
			'poster_image' => '',
			'stream_host_website' => '',
			'stream_video_id' => '',
			'video_controls' => '',
			'align' => '',
			'margin_bottom' => '10',
			'el_class' => '',

		), $atts ) );

$output = $video_output = $style_css = $option_control = '';


$id = uniqid();

/* control options */
/* -------------------------------------------------------------------- */

if($video_controls == 'true'){
	$option_control .= 1;
}else{
	$option_control .= 0;
}

/* video output */
/* -------------------------------------------------------------------- */
if($host == 'self_hosted'){
	$video_output .= '<video poster="'.$poster_image.'" controls>';
	if ( !empty( $mp4 ) ) {
		$video_output .= '<source type="video/mp4" src="'.$mp4.'" />';
	}
	if ( !empty( $webm ) ) {
		$video_output .= '<source type="video/webm" src="'.$webm.'" />';
	}
	if ( !empty( $ogv ) ) {
		$video_output .= '<source type="video/ogg" src="'.$ogv.'" />';
	}
	$video_output .= '</video>';
}else{
	if($stream_host_website == 'youtube'){
		$video_output = '<iframe width="560" height="315" src="//www.youtube.com/embed/'.$stream_video_id.'?rel=0&amp;controls='.$option_control.'&amp;showinfo=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}else if($stream_host_website == 'vimeo'){
		$video_output = '<iframe src="//player.vimeo.com/video/'.$stream_video_id.'?badge=0&amp;autoplay=0&amp;loop=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
}

/* content */
/* -------------------------------------------------------------------- */

// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$max_width = !empty($max_width) ? ('max-width:'.$max_width.'px !important;') : '';
$margin_bottom = !empty($margin_bottom) ? ('margin-bottom:'.$margin_bottom.'px;') : '';

$output .= '<div class="theatre-slider-container '.$align.'-align">';
if($background_style == 'desktop_style'){
	$output .= '<div class="computer-theatre-slider">';
	$output .= '	<img src="'.THEME_DIR_URI.'/images/lcd-theatre-slideshow.png" />';
	$output .= '	<div class="player-container"><div class="player">'.$video_output.'</div></div>';
	$output .= '</div>';
	
$app_styles .= '
.theatre-slider-container{
	'.$margin_bottom.'
}
.computer-theatre-slider {
    '.$max_width.'
}';

}else if($background_style == 'laptop_style'){
	$output .= '<div class="laptop-theatre-slider">';
	$output .= '	<img src="'.THEME_DIR_URI.'/images/laptop-theatre-slideshow.png" />';
	$output .= '	<div class="player-container"><div class="player">'.$video_output.'</div></div>';
	$output .= '</div>';
	
$app_styles .= '
.theatre-slider-container{
	'.$margin_bottom.'
}
.laptop-theatre-slider {
    '.$max_width.'
}';
}

$output .= '</div>';

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