<?php
extract( shortcode_atts( array(
            'el_class' => '',
            'id' => '',
            'size' => 'medium',
            'button_custom_width' => '0',
            'corner_style' => 'pointed', // new added
            'btn_hover_bg' => '',
            'btn_hover_txt_color' => '',
            'icon' => '',
            'bg_color' => '',
            'outline_skin' => '',
            'outline_hover_skin' => '',
            'outline_active_color' => '#fff',
            'outline_hover_color' => '#333',
            'dimension' => 'three',
            'text_color' => 'light',
            'icon_anim' => 'none',
            "url" => '',
            "target" => '',
            'margin_bottom' => 15,
            'margin_top' => '',
            'animation' => '',
            'visibility' => '',
            'fullwidth' => '',
            "align" => '',
        ), $atts ) );

$animation_css = $button = $style = $icon_animate = '';

$style_id = uniqid();


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= '
    .button-'.$style_id.' {
                margin-bottom: '.$margin_bottom.'px;
                margin-top: '.$margin_top.'px;
                min-width: '.$button_custom_width.'px !important;

        }
';

if ( $dimension == 'outline' ) {
        if($outline_skin != 'custom') {
                $outline_skin = !empty( $outline_skin ) ? ('outline-btn-'.$outline_skin) : 'outline-btn-dark';
        } else {

            $app_styles .= '
                 .button-'.$style_id.' {
                    border-color: '.$outline_active_color.' !important;
                    color: '.$outline_active_color.';
                }

                 .button-'.$style_id.':hover {
                    background-color:'.$outline_active_color.' !important;
                    color: '.$outline_hover_color.' !important;
                }
                .button-'.$style_id.':hover i {
                 color: '.$outline_hover_color.';   
                }
                ';
        }




} else if ( $dimension == 'savvy' ) {
        if($outline_skin != 'custom') {
                $outline_skin = !empty( $outline_skin ) ? ('outline-btn-'.$outline_skin) : 'outline-btn-dark';
        } else {

            $app_styles .= '
                 .button-'.$style_id.' {
                    border-color: '.$outline_active_color.' !important;
                    color: '.$outline_active_color.';
                }

                 .button-'.$style_id.':after {
                    background-color:'.$outline_active_color.';
                 }
                 .button-'.$style_id.':hover {
                    border-color: '.$outline_hover_skin.' !important;
                    color: '.$outline_hover_color.' !important;  
                }
                 .button-'.$style_id.':hover:after {
                    background-color:'.$outline_hover_skin.';
                }
                .button-'.$style_id.':hover i {
                 color: '.$outline_hover_color.';   
                }

                ';
        }

        


} else if($dimension == 'three' || $dimension == 'two' || $dimension == 'flat') {
    $app_styles .= '
        .button-'.$style_id.' {
                background-color:' . $bg_color . ';

        }
        ';
   if($dimension == 'flat') {
        $btn_hover_txt_color = $btn_hover_txt_color ? ('color:' . $btn_hover_txt_color . ' !important;') : '';
        $app_styles .= '
            .mk-button.button-'.$style_id.'.flat-dimension:hover {
                    background-color:' . $btn_hover_bg . ' !important;
                    '.$btn_hover_txt_color.'
            }
        ';    
     }   
        
    $text_color = !empty( $text_color ) ? ($text_color.'-color ') : 'light-color ';  
} 

 if($dimension == 'three' || $dimension == 'two') {
    $app_styles .= '
         .button-'.$style_id.':hover {
                background-color:' . hexDarker( $bg_color, 7 ). ';

        }
        .button-'.$style_id.'.three-dimension  {
             box-shadow: 0px 3px 0px 0px '.hexDarker( $bg_color, 20 ).';
        }
        .button-'.$style_id.'.three-dimension:active  {
             box-shadow: 0px 1px 0px 0px '.hexDarker( $bg_color, 20 ).';
        } 
    ';
}


if ( $animation != '' ) {
    $animation_css = ' mk-animate-element ' . $animation . ' ';
}

if ($icon_anim != 'none') {
    $icon_animate = ' mk-btn-anim ' . $icon_anim. ' ';
}

if(!empty( $icon )) {
    $icon = (strpos($icon, 'mk-') !== FALSE) ? ( '<i class="'.$icon.'"><span>&nbsp;</span></i>' ) : ( '<i class="mk-'.$icon.'"><span>&nbsp;</span></i>' );    
} else {
    $icon = '';
}

$id = !empty( $id ) ? ( 'id="'.$id.'"' ) : '';
$target = !empty( $target ) ? ( 'target="'.$target.'"' ) : '';
$fullwidth =  ($fullwidth == 'true') ? 'fullwidth-button ' : '';

$url_is_smooth = (preg_match('/#/',$url)) ? 'mk-smooth ' : '';

$button = '<a href="'.$url.'" '.$target.' '.$id.' class="mk-button '.$outline_skin.' button-'.$style_id.' '.$animation_css.$text_color.' '.$url_is_smooth.$dimension.'-dimension '.$size.' '.$corner_style.' '.$icon_animate.$visibility.' '.$fullwidth.' '.$el_class.'"><span>'.$icon.do_shortcode( strip_tags( $content ) ).'</span></a>';
$output = ( !empty( $align ) ? '<div class="mk-button-align '.$fullwidth.$align.'">' : '' ) . $button . ( !empty( $align ) ? '</div>' : '' );
echo $output . "\n\n" . $style;


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$style_id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$style_id ,
  'inject' => $app_styles
);