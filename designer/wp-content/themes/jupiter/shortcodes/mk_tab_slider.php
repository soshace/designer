<?php

extract( shortcode_atts( array(
         'tabs' => '',
		 'orderby'=> 'date',
		 'order'=> 'DESC',
		 'autoplay_time' => '',
         'animation' => '',
         'button_size' => '',
         'button_color' => '',
		 "el_class" => '',
		), $atts ) );

global $post, $mk_options;

$query = array(
	'post_type' => 'tab_slider',
);

if ( $orderby ) {
    $query['orderby'] = $orderby;
}
if ( $order ) {
    $query['order'] = $order;
}
if($tabs) {
	$query['post__in'] = explode(',' , $tabs);
}

$r = new WP_Query( $query );
global $post;

$id = uniqid();

$animation_css = ( $animation != '' ) ? ' mk-animate-element ' . $animation . ' ' : '';


$page_permalink = get_permalink();

$nav_output = '<div class="mk-tab-slider-nav" data-id="'.$id.'">';

$output = '<div id="mk-tab-slider-'.$id.'" data-id="'.$id.'" data-autoplay="'.$autoplay_time.'" class="mk-tab-slider '.$animation_css.$el_class.'">';
	$output .= '<div class="mk-tab-slider-wrapper">';
	while ( $r->have_posts() ) : $r->the_post();

	   $menu_icon = get_post_meta( $post->ID, '_menu_icon', true );
	   $menu_text = get_post_meta( $post->ID, '_menu_text', true );
	   $image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	   $skin_color = get_post_meta( $post->ID, '_skin_color', true );
	   $content_background = get_post_meta( $post->ID, '_bg_color', true );
	   $title = get_post_meta( $post->ID, '_title', true );
	   $image_align = get_post_meta( $post->ID, '_image_align', true );
	   $desc = get_post_meta( $post->ID, '_desc', true );
		$button_text = get_post_meta( $post->ID, '_button_text', true );
		$button_url = get_post_meta( $post->ID, '_button_url', true );
		$share_button = get_post_meta( $post->ID, '_share_button', true );



	   if ( empty( $menu_text ) ) {
			$nav_output .= '<a href="#" title="" style="font-size:'.$button_size.'px; color:'.$button_color.';"><i class="'.$menu_icon.'"></i></a>';
		}else{
			$nav_output .= '<a href="#" title="" style="font-size:'.$button_size.'px; color:'.$button_color.';">'.$menu_text.'</a>';
		}

		$social_output = '<ul class="mk-tab-slider-share" style="">';
		if ($share_button == "true") {
			$social_output .= '<li><a class="facebook-share" data-title="' . $title . '" data-url="' . $page_permalink . '" href="#"><i class="mk-icon-facebook"></i></a></li>';
			$social_output .= '<li><a class="twitter-share" data-title="' . $title . '" data-url="' . $page_permalink . '" href="#"><i class="mk-moon-twitter"></i></a></li>';
			$social_output .= '<li><a class="googleplus-share" data-title="' . $title  . '" data-url="' . $page_permalink . '" href="#"><i class="mk-icon-google-plus"></i></a></li>';
		}
		$social_output .= '</ul>';

	  	$output .= '<div id="'.$id.'" class="mk-tab-slider-item float-'.$image_align.' skin-'.$skin_color.'" style="background-color:'.$content_background.';">';

	   if ($image_align == 'left'){
	   	$output .= '<div class="mk-slider-image">';
	   		$output .= '<img src="'.mk_thumbnail_image_gen($image_src_array[0], false, false).'" alt="" />';
	   	$output .= '</div>';
	   	$output .= '<div class="mk-slider-content" style="float:right;">';
	   }else{
	   	$output .= '<div class="mk-slider-image">';
	   		$output .= '<img src="'.mk_thumbnail_image_gen($image_src_array[0], false, false).'" alt="" />';
	   	$output .= '</div>';
	   	$output .= '<div class="mk-slider-content" style="float:left;">';
	   }

	   	$output .= '<div class="mk-slider-content-inside">';
	   		$output .= '<h3 class="mk-slider-title"><span>'.$title.'</span><hr /></h3>';
	   		$output .= '<div class="mk-slider-description">'.wpb_js_remove_wpautop($desc, true).'</div>';
		   		if($skin_color == 'dark'){
		   			$output .= !empty( $button_url ) ? (do_shortcode( '[mk_button dimension="outline" corner_style="pointed" outline_skin="dark" size="medium" align="left" url="'.$button_url.'" el_class="mk-slider-read-more"]'.$button_text.'[/mk_button]' )) : '' ;
		   		}else{
		   			$output .= !empty( $button_url ) ? (do_shortcode( '[mk_button dimension="outline" corner_style="pointed" outline_skin="light" size="medium" align="left" url="'.$button_url.'" el_class="mk-slider-read-more"]'.$button_text.'[/mk_button]' )) : '' ;
		   		}
	   			$output .= $social_output;
	   		$output .= '</div>';
	   	$output .= '</div>';
	  	$output .= '</div>';
	endwhile;
	$output .= '</div>';
$output .= '</div>';
$nav_output .= '</div>';

wp_reset_postdata();

echo $nav_output;
echo $output;

