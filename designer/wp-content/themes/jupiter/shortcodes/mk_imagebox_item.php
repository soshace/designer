<?php

extract( shortcode_atts( array(
      'icon_type' => '',
      'item_video' => '',
      'mp4' => '',
      'webm' => '',
      'ogv' => '',
      'preview_image' => '',
      'item_image' => '',
      'image_padding' => 'true',
      "background_color" => '',
      'item_title' => '',
      'title_text_size' => '',
      'title_color' => '',
      'title_font_weight' => '',
      'text_color' => '',
      'btn_text' => '',
      'btn_text_color' => '',
      'btn_background_color' => '',
      'btn_hover_background_color' => '',
      'btn_url' => '',
      'el_class' => '',
    ), $atts ) );


$output = $imageboxContent = $preview_image = '';

$id = uniqid();

/* Re-factor the options for empty cases */
$title_color = $title_color ? ('color:'.$title_color.';') : '';
$text_color = $text_color ? ('color:'.$text_color.';') : '';
$title_font_weight = $title_font_weight ? ('font-weight:'.$title_font_weight.';') : '';
$background_color = $background_color ? ('background-color:'.$background_color.';') : '';
$btn_background_color = $btn_background_color ? ('background-color:'.$btn_background_color.';') : '';
$btn_text_color = $btn_text_color ? ('color:'.$btn_text_color.';') : '';
$btn_hover_background_color = $btn_hover_background_color ? ('background-color:'.$btn_hover_background_color.';') : '';

if($icon_type == 'video'){
  $imageboxContent .= '<div class="mk-imagebox-video mk-video-wrapper"><div class="mk-video-container"><video poster="" muted="muted" preload="auto" loop="true" autoplay="true">';

  if ( !empty( $mp4 ) ) {
    //MP4 must be first for iPad!
    $imageboxContent .= '<source type="video/mp4" src="'.$mp4.'" />';
  }
  if ( !empty( $webm ) ) {
    $imageboxContent .= '<source type="video/webm" src="'.$webm.'" />';
  }
  if ( !empty( $ogv ) ) {
    $imageboxContent .= '<source type="video/ogg" src="'.$ogv.'" />';
  }

  $imageboxContent .= '</video></div></div>';

  $imageboxContent .= '<div class="mk-imagebox-item-image mk-imagebox-video-preview padding-'.$image_padding.'"><img src="'.$preview_image.'" alt="" /></div>';

}
else{
  $imageboxContent .= '<div class="mk-imagebox-item-image padding-'.$image_padding.'"><img src="'.$item_image.'" alt="" /></div>';
}
if(!empty($item_title)) {
  $imageboxContent .= '<div class="mk-imagebox-item-title"><h5 style="'.$title_color.$title_font_weight.'">'.$item_title.'</h5></div>';
}

if(!empty($content)) {
  $imageboxContent .= '<div class="mk-imagebox-item-text"><span>'.wpb_js_remove_wpautop($content, true).'</span></div>';
}

$imageboxContent .= !empty( $btn_url ) ? ('<div class="mk-imagebox-item-button"> <a href="'.$btn_url.'">'. $btn_text.'</a></div>') : '' ;

$output .= '<div class="swiper-slide"><div id="imagebox-item-'.$id.'" class="mk-imagebox-item"><div class="item-holder"><div class="mk-imagebox-item-content" style="'.$background_color.'">'.$imageboxContent.'</div></div></div></div>';

// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;

$app_styles = '
#imagebox-item-'.$id.' .mk-imagebox-item-title{ font-size:'.$title_text_size.'px;}
#imagebox-item-'.$id.' .mk-imagebox-item-text, #imagebox-item-'.$id.' .mk-imagebox-item-text p {'.$text_color.'}
#imagebox-item-'.$id.' .mk-imagebox-item-button a {'.$btn_background_color.$btn_text_color.'}
#imagebox-item-'.$id.' .mk-imagebox-item-button a:hover{'.$btn_hover_background_color.'}';


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);

echo $output;
