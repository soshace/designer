<?php

extract( shortcode_atts( array(
            'mp3_file' => '',
            'ogg_file' => '',
            'audio_author' => '',
            'thumb'=> '',
            'remove_thumb' => 'false',
            'el_class' => '',
            'large_player_class' => 'mk-audio-shortcode',
            'img_dimension' => 170
        ), $atts ) );


$output = $has_image = '';
$audio_id = uniqid();


/* Random Color variations for Audio box background */
$audio_box_color  = array( '#00c8d7', '#e1ba05', '#da4c26', '#f56a5f', '#00b89a', '#95c76a', '#acacac', '#d19760' );
$random_colors = array_rand( $audio_box_color, 1 );




$output .='<div class="mk-audio-section '.$large_player_class.'" style="background-color:'.$audio_box_color[$random_colors].'">';
if ( $thumb && $remove_thumb == 'false') {
    require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
    $image_src = bfi_thumb( $thumb, array('width' => $img_dimension, 'height' => $img_dimension)); 
    $output .='<img class="audio-thumb" alt="" title="" src="'.mk_thumbnail_image_gen($image_src, $img_dimension,$img_dimension).'" />';
    $has_image = 'audio-has-img';
}

$output .='<div id="jquery_jplayer_'.$audio_id.'" class="jp-jplayer mk-blog-audio" data-mp3="'.$mp3_file.'" data-ogg="'.$ogg_file.'"></div>
    <div id="jp_container_'.$audio_id.'" class="jp-audio '.$has_image.'">
        <div class="jp-type-single">
            <div class="jp-gui jp-interface">
                <div class="jp-time-holder">
                    <div class="jp-current-time"></div>
                    <div class="jp-duration"></div>
                </div>

                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar">
                    <i class="mk-moon-volume-mute"></i><div class="inner-value-adjust"><div class="jp-volume-bar-value"></div></div>
                </div>
                <ul class="jp-controls">
                    <li><a href="javascript:;" class="jp-play" tabindex="1"><i class="mk-icon-play"></i></a></li>
                    <li><a href="javascript:;" class="jp-pause" tabindex="1"><i class="mk-icon-pause"></i></a></li>
                </ul>';
if ( $audio_author ) {
    $output .='<span class="mk-audio-author">'.$audio_author.'</span>';
}
$output .= '</div>
            <div class="jp-no-solution">
                <span>Update Required</span>
                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
            </div>
        </div>
</div>';
$output .='<div class="clearboth"></div></div>';        
   
echo $output;

/*
global $app_modules;

$app_modules[] = array(
  'name' => 'audio-player',
  'params' => array(
      'id'      => 'jquery_jplayer_'.$audio_id,
      'player'  => 'jp_container_'.$audio_id,
      'swfPath' => THEME_JS . '/require/plugins',
      'mp3'     => $mp3_file,
      'ogg'     => $ogg_file
    )
);
*/