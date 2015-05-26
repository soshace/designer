<?php

extract( shortcode_atts( array(
      'flip_direction' => '',
      'front_background_color' => '',
      'back_background_color' => '',
      'min_height' => '',
      'icon_type' => '',
      "image" => '',
      "icon" => '',
      'icon_size' => '',
      'icon_color' => '',
      'front_title' => '',
      'front_title_size' => '',
      'front_title_color' => '',
      'back_title' => '',
      'back_title_size' => '',
      'back_title_color' => '',
      'font_weight' => '',
      'front_desc' => '',
      'front_desc_size' => '',
      'front_desc_color' => '',
      'back_desc' => '',
      'back_desc_size' => '',
      'back_desc_color' => '',
      'button_url' => '',
      'button_text' => '',
      'button_bg_color' => '',
      'button_bg_hover_color' => '',
      'button_text_skin' => '',
      'el_class' => ''
    ), $atts ) );

$output = $front = $flip = '';

/*Flipbox Front*/
$front .= '<div class="mk-flipbox-front " style="'.($front_background_color ? ('background-color: '.$front_background_color.';') : '').'" >';
$front .= ' <div class="mk-flipbox-content">';
if($icon_type == 'icon'){
      $front .= ' <div class="front-icon"><i class="'.$icon.'" style="font-size:'.$icon_size.'px; '.($icon_color ? ('color:'.$icon_color.';') : '').'"></i></div>';
}else{
      $front .= '<div class="front-icon"><img src="'.$image.'" alt="" /></div>';
}
$front .= '       <div class="front-title" style="'.($font_weight ? ('font-weight:'.$font_weight.';') : '').' font-size:'.$front_title_size.'px; '.($front_title_color ? ('color:'.$front_title_color.';') : '').'">'.$front_title.'</div>';
$front .= '       <div class="front-desc" style="font-size:'.$front_desc_size.'px; '.($front_desc_color ? ('color:'.$front_desc_color.';') : '').'">'.$front_desc.'</div>';
$front .= ' </div>';
$front .= '</div>';

/*Flipbox Back*/
$flip .= '<div class="mk-flipbox-back" style="'.($back_background_color ? ('background-color: '.$back_background_color.';') : '').'">';
$flip .= '  <div class="mk-flipbox-content">';
$flip .= '        <div class="back-title" style="font-weight:'.$font_weight.'; font-size:'.$back_title_size.'px; '.($back_title_color ? ('color:'.$back_title_color.';') : '').'">'.$back_title.'</div>';
$flip .= '        <div class="back-desc" style="font-size:'.$back_desc_size.'px; '.($back_desc_color ? ('color:'.$back_desc_color.';') : '').' ">'.$back_desc.'</div>';

$flip .= !empty( $button_url ) ? (do_shortcode( '[mk_button dimension="flat" corner_style="pointed" outline_skin="dark" size="small" align="center" bg_color="'.$button_bg_color.'" btn_hover_bg="'.$button_bg_hover_color.'" text_color="'.$button_text_skin.'"  url="'.$button_url.'" el_class="back-button"]'.$button_text.'[/mk_button]' )) : '' ;

$flip .= '  </div>';
$flip .= '</div>';

$output .= '<div class="mk-flipbox-container flip-'.$flip_direction.' '.$el_class.'" style="height:1px; min-height:'.$min_height.'px">';
$output .= '      <div class="mk-flipbox-flipper">';
$output .=              $front;
$output .=              $flip;
$output .= '            <div class="clearboth"></div>';
$output .= '      </div>';
$output .= '</div>';


echo $output;
