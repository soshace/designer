<?php

extract( shortcode_atts( array(
			'title' => '',
			'el_class' => '',
			'flickr_id' => '95572727@N00',
			'count' => '6',
			'thumb_size' => 's',
			'type' => 'user',
			'display' => 'latest'
		), $atts ) );


$output = "\n\t".'<div class="mk-flickr-feeds-shortcode flickr-widget-wrapper '.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= "\n\t\t\t".'<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='. $count . '&amp;display='. $display .'&amp;size='.$thumb_size.'&amp;layout=x&amp;source='. $type .'&amp;'. $type .'='. $flickr_id .'"></script>';
$output .= "\n\t\t\t".'<div class="flickr_stream_wrap"></div>';
$output .= "\n\t".'</div>';

echo $output;
