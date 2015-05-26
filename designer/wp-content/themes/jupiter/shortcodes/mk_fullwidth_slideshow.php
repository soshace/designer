<?php

extract( shortcode_atts( array(
            "images" => '',
            "effect" => 'fade',
            'padding' => 30,
            "animation_speed" => 700,
            "slideshow_speed" => 7000,
            "pause_on_hover" => "false",
            "smooth_height" => "true",
            "direction_nav" => "true",
            'bg_color' => '',
            'attachment' => 'scroll',
            'bg_position' => 'left top',
            'border_color' => '',
            'bg_image' => '',
            'enable_3d' => 'false',
            'speed_factor' => '',
            "el_class" => '',
        ), $atts ) );

if ( $images == '' ) return null;


$enable_3d = ( $enable_3d == 'true' ) ? 'parallax-slideshow ' : '';


$output = $item = '';
$images = explode( ',', $images );
$i = -1;

foreach ( $images as $attach_id ) {
    $i++;
    $image_src  = wp_get_attachment_image_src( $attach_id, 'full' );


    $item .= '<li>';
    $item .= '<img alt="" src="' . $image_src[0] .'" />';
    $item .= '</li>'. "\n\n";

}

$border_color = !empty($border_color) ? ('border:1px solid '.$border_color.';') : '';

$backgroud_image = !empty( $bg_image ) ? 'background-image:url('.$bg_image.'); ' : '';
$output .= '<div class="mk-fullwidth-slideshow mk-script-call mk-flexslider '.$enable_3d.$el_class.'" data-speedFactor="'.$speed_factor.'" style="padding:'.$padding.'px 0;'. $backgroud_image.'background-color:'.$bg_color.'; background-position:'.$bg_position.';background-attachment:'.$attachment.';'.$border_color.'border-left:none;border-right:none;" data-animation="'.$effect.'" data-easing="swing" data-direction="horizontal" data-smoothHeight="'.$smooth_height.'" data-animationSpeed="'.$animation_speed.'" data-slideshowSpeed="'.$slideshow_speed.'" data-pauseOnHover="'.$pause_on_hover.'" data-controlNav="false" data-directionNav="'.$direction_nav.'" data-isCarousel="false">';
$output .= '<ul class="mk-flex-slides">' . $item . '</ul>';
$output .= '</div><div class="clearboth"></div>';

echo $output;
