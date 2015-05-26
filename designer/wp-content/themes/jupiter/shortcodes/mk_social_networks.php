<?php

$el_class ='';

extract( shortcode_atts( array(
			'el_class' => '',
			'size' => 'medium',
			'style' => '',
			'align' => 'none',
			'margin' => '',
			'border_color' => '#ccc',
			'bg_color' => '',
			'bg_hover_color' => '#232323',
			'icon_color' => '#ccc',
			'icon_hover_color' => '#eee',
			'facebook' => "",
			'twitter' => "",
			'rss' => "",
			'dribbble' => "",
			'digg' => "",
			'pinterest' => "",
			'flickr' => "",
			'google_plus' => "",
			'linkedin' => "",
			'blogger' => "",
			'youtube' => "",
			'last_fm' => "",
			'live_journal' => "",
			'stumble_upon' => "",
			'tumblr' => "",
			'vimeo' => "",
			'wordpress' => "",
			'instagram' => "",
			'soundcloud' => "",
			'yelp' => "",
			'reddit' => "",
			'imdb' => "",
            'qzone' => "",
            'renren' => "",
            'vk' => "",
            'wechat' => "",
            'weibo' => "",
            'whatsapp' => "",
		), $atts ) );

$id = uniqid();
if (empty($bg_color)) {
	$bg_color = 'rgba(255,255,255,0)';
}

switch ( $style ) {
case 'rounded' :
	$icon_style = 'mk-jupiter-icon-square-';
	break;
case 'simple' :
	$icon_style = 'mk-jupiter-icon-simple-';
	break;
case 'circle' :
	$icon_style = 'mk-jupiter-icon-';
	break;
default :
	$icon_style = 'mk-jupiter-icon-simple-';
}

$output = '';

$output .= '<div class=" '.$el_class.'">';
$output .= '<div id="social-networks-'.$id.'" class="mk-social-network-shortcode mk-shortcode social-align-'.$align.' '.$size.' '.$el_class.' social-style-'.$style.'">';
$output .= '<ul>';
$output .= !empty( $facebook )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="facebook-hover" href="'.$facebook.'"><i class="'.$icon_style.'facebook"></i></a></li>' : '';
$output .= !empty( $twitter )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="twitter-hover" href="'.$twitter.'"><i class="'.$icon_style.'twitter"></i></a></li>' : '';
$output .= !empty( $rss )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="rss-hover" href="'.$rss.'"><i class="'.$icon_style.'rss"></i></a></li>' : '';
$output .= !empty( $dribbble )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="dribbble-hover" href="'.$dribbble.'"><i class="'.$icon_style.'dribbble"></i></a></li>' : '';
$output .= !empty( $instagram )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="instagram-hover" href="'.$instagram.'"><i class="'.$icon_style.'instagram"></i></a></li>' : '';
$output .= !empty( $soundcloud )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="soundcloud-hover" href="'.$soundcloud.'"><i class="'.$icon_style.'soundcloud"></i></a></li>' : '';
$output .= !empty( $digg )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="digg-hover" href="'.$digg.'"><i class="'.$icon_style.'digg"></i></a></li>' : '';
$output .= !empty( $pinterest )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="pinterest-hover" href="'.$pinterest.'"><i class="'.$icon_style.'pinterest"></i></a></li>' : '';
$output .= !empty( $flickr )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="flickr-hover" href="'.$flickr.'"><i class="'.$icon_style.'flickr"></i></a></li>' : '';
$output .= !empty( $google_plus )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="googleplus-hover" href="'.$google_plus.'"><i class="'.$icon_style.'googleplus"></i></a></li>' : '';
$output .= !empty( $linkedin )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="linkedin-hover" href="'.$linkedin.'"><i class="'.$icon_style.'linkedin"></i></a></li>' : '';
$output .= !empty( $blogger )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="blogger-hover" href="'.$blogger.'"><i class="'.$icon_style.'blogger"></i></a></li>' : '';
$output .= !empty( $youtube )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="youtube-hover" href="'.$youtube.'"><i class="'.$icon_style.'youtube"></i></a></li>' : '';
$output .= !empty( $last_fm )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="lastfm-hover" href="'.$last_fm.'"><i class="'.$icon_style.'lastfm"></i></a></li>' : '';
$output .= !empty( $stumble_upon )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="stumbleupon-hover" href="'.$stumble_upon.'"><i class="'.$icon_style.'stumbleupon"></i></a></li>' : '';
$output .= !empty( $tumblr )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="tumblr-hover" href="'.$tumblr.'"><i class="'.$icon_style.'tumblr"></i></a></li>' : '';
$output .= !empty( $vimeo )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="vimeo-hover" href="'.$vimeo.'"><i class="'.$icon_style.'vimeo"></i></a></li>' : '';
$output .= !empty( $wordpress )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="wordpress-hover" href="'.$wordpress.'"><i class="'.$icon_style.'wordpress"></i></a></li>' : '';
$output .= !empty( $yelp )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="yelp-hover" href="'.$yelp.'"><i class="'.$icon_style.'yelp"></i></a></li>' : '';
$output .= !empty( $reddit )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="reddit-hover" href="'.$reddit.'"><i class="'.$icon_style.'reddit"></i></a></li>' : '';
$output .= !empty( $whatsapp )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="whatsapp-hover" href="'.$whatsapp.'"><i class="'.$icon_style.'whatsapp"></i></a></li>' : '';
$output .= !empty( $weibo )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="weibo-hover" href="'.$weibo.'"><i class="'.$icon_style.'weibo"></i></a></li>' : '';
$output .= !empty( $wechat )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="wechat-hover" href="'.$wechat.'"><i class="'.$icon_style.'wechat"></i></a></li>' : '';
$output .= !empty( $vk )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="vk-hover" href="'.$vk.'"><i class="'.$icon_style.'vk"></i></a></li>' : '';
$output .= !empty( $qzone )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="qzone-hover" href="'.$qzone.'"><i class="'.$icon_style.'qzone"></i></a></li>' : '';
$output .= !empty( $imdb )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="imdb-hover" href="'.$imdb.'"><i class="'.$icon_style.'imdb"></i></a></li>' : '';
$output .= !empty( $renren )  ? '<li><a style="margin: '.$margin.'px;" target="_blank" class="renren-hover" href="'.$renren.'"><i class="'.$icon_style.'renren"></i></a></li>' : '';

$output .= '</ul>';
$output .= '</div>';
$output .= '</div>';


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .='
#social-networks-'.$id.' a i{
	color:'.$icon_color.';
}
#social-networks-'.$id.' a:hover i{
	color:'.$icon_hover_color.';
}';
if ( $style == 'square-pointed' || $style == 'square-rounded' || $style == 'simple-rounded' ) {
	$bg_color = !empty($bg_color) ? ('background-color:'.$bg_color.';') : '';
	$app_styles .= '
	#social-networks-'.$id.' a {
		border-color: '.$border_color.';
		'.$bg_color.'
	}
	#social-networks-'.$id.' a:hover {
		border-color: '.$bg_hover_color.';
		background-color: '.$bg_hover_color.';
	}';
}

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
