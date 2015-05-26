<?php

extract( shortcode_atts( array(
			'title' => '',
			'count'=> 10,
			'orderby'=> 'date',
			'slides' => '',
			'order'=> 'DESC',
			"image_width" => 770,
			"image_height" => 350,
			"effect" => 'fade',
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"pause_on_hover" => "false",
			"smooth_height" => "true",
			"direction_nav" => "true",
			"caption_bg_color" => "",
			"caption_color" => "#fff",
			"caption_bg_opacity" => 0.8,
			"el_class" => '',
		), $atts ) );

global $mk_options;
$caption_bg_color = !empty( $caption_bg_color ) ? $caption_bg_color : $mk_options['skin_color'];

$query = array(
	'post_type' => 'slideshow',
	'showposts' => $count,
);

if ( $slides ) {
	$query['post__in'] = explode( ',', $slides );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}
$heading_title = '';
if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

$loop = new WP_Query( $query );

$output = '';
while ( $loop->have_posts() ):
	$loop->the_post();
$url = get_post_meta( get_the_ID(), '_link_to', true );
$caption = get_post_meta( get_the_ID(), '_title', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height)); 

if ( !empty( $url ) ) {
		$link_array = explode( '||', $url );
		switch ( $link_array[ 0 ] ) {
		case 'page':
			$url = get_page_link( $link_array[ 1 ] );
			break;
		case 'cat':
			$url = get_category_link( $link_array[ 1 ] );
			break;
		case 'portfolio':
			$url = get_permalink( $link_array[ 1 ] );
			break;
		case 'post':
			$url = get_permalink( $link_array[ 1 ] );
			break;
		case 'manually':
			$url = $link_array[ 1 ];
			break;
		}
	}


$output .= '<li>';
$output .= !empty( $url ) ? '<a href="'.$url.'">' : '' ;
$output .= '<img alt="'.$caption.'" src="' . $image_src_array[ 0 ] .'" />';
$output .= !empty( $url ) ? '</a>' : '' ;
$output .= !empty( $caption ) ?  '<div class="mk-flex-caption">
                    <div style="background-color:'.$caption_bg_color.'; -webkit-opacity: '.$caption_bg_opacity.';-moz-opacity: '.$caption_bg_opacity.';-o-opacity: '.$caption_bg_opacity.';filter: alpha(opacity='.( $caption_bg_opacity * 100 ).'); -ms-filter:\'progid:DXImageTransform.Microsoft.Alpha(Opacity='. ($caption_bg_opacity * 100) .')\'; opacity: '.$caption_bg_opacity.';" class="color-mask"></div>
                    <span style="color:'.$caption_color.'">'.$caption.'</span>
                    </div>' : '';

$output .= '</li>'. "\n\n";
endwhile;
wp_reset_query();
echo $heading_title.'<div style="max-width:' . $image_width . 'px;" data-animation="'.$effect.'" data-easing="swing" data-direction="horizontal" data-smoothHeight="'.$smooth_height.'" data-animationSpeed="'.$animation_speed.'" data-slideshowSpeed="'.$slideshow_speed.'" data-pauseOnHover="'.$pause_on_hover.'" data-controlNav="false" data-directionNav="'.$direction_nav.'" data-isCarousel="false" class="mk-slideshow-shortcode mk-script-call mk-flexslider '.$el_class.'"><ul class="mk-flex-slides">' . $output . '</ul></div>';



