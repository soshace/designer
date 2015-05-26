<?php

extract( shortcode_atts( array(
			'heading_title' => '',
			'image_width' => 770,
			'image_height' => 350,
			'lightbox' => 'true',
			'svg' => 'false',
			'crop' => 'true',
			'custom_lightbox' => '',
			'margin_bottom' => 10,
			'group' => '',
			'frame_style' => 'simple',
			'src' => '',
			'link' => '',
			'target' => '',
			'animation' => '',
			'title'=> '',
			'desc'=> '',
			'align' => 'left',
			'caption_location' => '',
			'visibility' => '',
			'el_class' => '',
		), $atts ) );

require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
$animation_css =  $lightbox_enabled = $src_lightbox = '';

if ( $lightbox == 'true' ) {
	$lightbox_enabled = 'lightbox-enabled';
	$custom_lightbox = !empty( $custom_lightbox ) ? ( $src_lightbox = $custom_lightbox ) : $src_lightbox = $src ;
}
if ( $animation != '' ) {
	$animation_css = 'mk-animate-element ' . $animation . ' ';
}


$image_id = mk_get_attachment_id_from_url($src);
$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

$image_alt = !(empty($alt)) ? $alt : $title;
$image_title =  !(empty($title)) ? $title : $alt;


$output .= '<div class="mk-image-shortcode mk-shortcode '.$visibility.' '.$lightbox_enabled.' align-'.$align.' '.$animation_css.$frame_style.'-frame '.$caption_location.' '.$el_class.'" style="max-width: '.$image_width.'px; margin-bottom:'.$margin_bottom.'px">';
if ( !empty( $heading_title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$heading_title.'</span></h3>';
}

$svg = ($svg == 'true') ? ('style="max-width:'.$image_width.'px" ') : '';

$output .= '<div class="mk-image-inner">';
	$output .= ($link) ? '<a href="'.$link.'" target="'.$target.'" class="mk-image-shortcode-link">' : '';
if ( $crop == 'true' ) {
	$image_src = bfi_thumb( $src, array('width' => $image_width, 'height' => $image_height)); 
	$output .= '<img class="lightbox-'.$lightbox.'" alt="'.$image_alt.'" title="'.$image_title.'" src="'.mk_thumbnail_image_gen($image_src, $image_width, $image_height).'" '.$svg.'/>';
} else {
	$output .= '<img class="lightbox-'.$lightbox.'" alt="'.$image_alt.'" title="'.$image_title.'" src="'.$src.'" '.$svg.'/>';
}
	$output .= ($link) ? '</a>' : '';

if ( $lightbox == 'true' ) {
	$output .= '<div class="mk-image-overlay"></div>';
	$output .= '<a href="'.$src_lightbox.'" alt="'.$image_alt.'" data-fancybox-group="image-shortcode-'.$group.'" title="'.$title.'" class="mk-lightbox '.$group.' mk-image-shortcode-lightbox"><i class="mk-jupiter-icon-plus-circle"></i></a>';
}
/*if ( $link ) {
	$output .= '<a href="'.$link.'" target="'.$target.'" class="mk-image-shortcode-link">&nbsp;</a>';
}*/
$output .= '</div>';
if ( ( !empty( $title ) || !empty( $desc ) ) ) {
	$output .= '<div class="mk-image-caption">';
			if(!empty( $title )) {
            	$output .= '<span class="mk-caption-title">'.$title.'</span>';
        	}	
        	if(!empty( $desc )) {
				$output .= '<span class="mk-caption-desc">'.$desc.'</span>';
			}
    $output .= '</div>';
}
$output .= '<div class="clearboth"></div></div>';

echo $output;
