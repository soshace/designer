<?php

extract( shortcode_atts( array(
            'title' => '',
            'email' => get_bloginfo( 'admin_email' ),
            'style' => 'classic',
            'skin' => 'dark',
            'bg_color' => '#f6f6f6',
            'border_color' => '#f6f6f6',
            'button_color' => '#373737',
            'button_font_color' => '#fff',
            'font_color' => '#373737',
            'phone' => 'false',
            'captcha' => 'true',
            'el_class' => '',
        ), $atts ) );
$id = uniqid();
$tabindex_1 = $id;
$tabindex_2 = $id + 1;
$tabindex_3 = $id + 2;
$tabindex_4 = $id + 3;
$tabindex_5 = $id + 4;

$fancy_title = $output = '';
if ( !empty( $title ) ) {
    $fancy_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

if ( $style == 'classic' ) {

    $output .= $fancy_title;
    $output .= '<div class="mk-contact-form-wrapper classic-style mk-shortcode '.$el_class.'">';
    $output .= '<form class="mk-contact-form" method="post" novalidate="novalidate">';
    $output .= '<div class="mk-form-row"><i class="mk-li-user"></i><input placeholder="'.__( 'Your Name', 'mk_framework' ).'" type="text" required="required" name="contact_name" class="text-input" value="" tabindex="'.$tabindex_1.'" /></div>';
    if($phone == 'true') {
        $output .= '<div class="mk-form-row"><i class="mk-li-call"></i><input placeholder="'.__( 'Your Phone Number', 'mk_framework' ).'" type="text" name="contact_phone" class="text-input" value="" tabindex="'.$tabindex_2.'" /></div>';
    }
    $output .= '<div class="mk-form-row"><i class="mk-li-mail"></i><input placeholder="'.__( 'Your Email', 'mk_framework' ).'" type="email" required="required" name="contact_email" class="text-input" value="" tabindex="'.$tabindex_3.'" /></div>';
    $output .= '<div class="mk-form-row"><i class="mk-li-pencil"></i><textarea required="required" placeholder="'.__( 'Your message', 'mk_framework' ).'" name="contact_content" class="mk-textarea" tabindex="'.$tabindex_4.'"></textarea></div>';
    
    // CAPTCHA 
    if($captcha == 'true') {
    $output .= '<div class="mk-form-row">
                    <i class="mk-li-lock"></i>
                    <input placeholder="'.__( 'Enter Captcha', 'mk_framework' ).'" type="text" name="captcha" class="captcha-form text-input full" required="required" autocomplete="off" />
                        <img src="'.THEME_DIR_URI.'/captcha/captcha.php" class="captcha-image" alt="captcha txt"> <br/>
                        <a href="#" class="captcha-change-image">'.__( 'Not readable?', 'mk_framework' ).' '.__( 'Change text.', 'mk_framework' ).'</a>
                </div>';
    }    

    $output .= '<div class="mk-form-row" style="float:left;">
                    <button tabindex="'.$tabindex_5.'" class="mk-progress-button mk-button mk-skin-button flat-dimension contact-form-button medium" data-style="move-up">
                        <span class="mk-progress-button-content">'.__( 'Submit', 'mk_framework' ).'</span>
                        <span class="mk-progress">
                            <span class="mk-progress-inner"></span>
                        </span>
                        <span class="state-success"><i class="mk-moon-checkmark"></i></span>
                        <span class="state-error"><i class="mk-moon-close"></i></span>
                    </button>
                </div>';    
    $output .= '<input type="hidden" value="'.antispambot($email).'" name="contact_to"/>';
    $output .= '</form>';
    $output .= '<div class="clearboth"></div></div>';

} else if($style == 'modern') {
    $output .= $fancy_title;
    $output .= '<div class="mk-contact-form-wrapper mk-shortcode contact-'.$skin.' modern-style '.$el_class.'">';
    $output .= '<form class="mk-contact-form" method="post" novalidate="novalidate">';
    $output .= '<div class="mk-form-row"><input placeholder="'.__( 'Your Name', 'mk_framework' ).'" type="text" required="required" name="contact_name" class="text-input" value="" tabindex="'.$tabindex_1.'" /></div>';
    if($phone == 'true') {
        $output .= '<div class="mk-form-row"><input placeholder="'.__( 'Your Phone Number', 'mk_framework' ).'" type="text" required="required" name="contact_phone" class="text-input" value="" tabindex="'.$tabindex_2.'" /></div>';
    }
    $output .= '<div class="mk-form-row"><input placeholder="'.__( 'Your Email', 'mk_framework' ).'" type="email" required="required" name="contact_email" class="text-input" value="" tabindex="'.$tabindex_3.'" /></div>';
    $output .= '<div class="mk-form-row"><textarea required="required" placeholder="'.__( 'Your message', 'mk_framework' ).'" name="contact_content" class="mk-textarea" tabindex="'.$tabindex_4.'"></textarea></div>';
    
    // CAPTCHA 
    if($captcha == 'true') {
    $output .= '<div class="mk-form-row">
                    <input placeholder="'.__( 'Enter Captcha', 'mk_framework' ).'" type="text" name="captcha" class="captcha-form text-input full" required="required" autocomplete="off" />
                        <img src="'.THEME_DIR_URI.'/captcha/captcha.php" class="captcha-image" alt="captcha txt">
                        <a href="#" class="captcha-change-image">'.__( 'Not readable?', 'mk_framework' ).'<br/>'.__( 'Change text.', 'mk_framework' ).'</a>
                </div>';
    }

    $output .= '<div class="mk-form-row">
                    <button tabindex="'.$tabindex_5.'" class="mk-progress-button mk-button outline-btn-'.$skin.' outline-dimension contact-form-button medium" data-style="move-up">
                        <span class="mk-progress-button-content">'.__( 'Submit', 'mk_framework' ).'</span>
                        <span class="mk-progress">
                            <span class="mk-progress-inner"></span>
                        </span>
                        <span class="state-success"><i class="mk-moon-checkmark"></i></span>
                        <span class="state-error"><i class="mk-moon-close"></i></span>
                    </button>
                </div>';
    $output .= '<input type="hidden" value="'.antispambot($email).'" name="contact_to"/>';
    $output .= '</form>';
    $output .= '<div class="clearboth"></div></div>';

} else if($style == 'outline') {
    $output .= $fancy_title;
    $output .= '<div class="mk-contact-form-wrapper mk-shortcode contact-'.$skin.' outline-style '.$el_class.'">';
    $output .= '<form class="mk-contact-form" method="post" novalidate="novalidate">';
    $output .= '<div class="mk-form-row">';
    $output .= '<input placeholder="'.__( 'Your Name', 'mk_framework' ).'" type="text" required="required" name="contact_name" class="text-input '.(($phone == 'true')? 'two-third' : 'half').'" value="" tabindex="'.$tabindex_1.'" />';
    if($phone == 'true') {
        $output .= '<input placeholder="'.__( 'Your Phone Number', 'mk_framework' ).'" type="text" required="required" name="contact_phone" class="text-input two-third" value="" tabindex="'.$tabindex_2.'" />';
    }
    $output .= '<input placeholder="'.__( 'Your Email', 'mk_framework' ).'" type="email" required="required" name="contact_email" class="text-input '.(($phone == 'true')? 'two-third' : 'half').'" value="" tabindex="'.$tabindex_3.'" />';
    $output .= '</div>';
    $output .= '<div class="mk-form-row"><textarea required="required" placeholder="'.__( 'Your message', 'mk_framework' ).'" name="contact_content" class="mk-textarea" tabindex="'.$tabindex_4.'"></textarea></div>';
    
    // CAPTCHA 
    if($captcha == 'true') {
    $output .= '<div class="mk-form-row">
                    <input placeholder="'.__( 'Enter Captcha', 'mk_framework' ).'" type="text" name="captcha" class="captcha-form text-input full" required="required" autocomplete="off" />
                    <div class="captcha-block">
                        <img src="'.THEME_DIR_URI.'/captcha/captcha.php" class="captcha-image" alt="captcha txt">
                        <a href="#" class="captcha-change-image">'.__( 'Not readable?', 'mk_framework' ).'<br/>'.__( 'Change text.', 'mk_framework' ).'</a>
                    </div>
                </div>';
    }

    $output .= '<div class="mk-form-row">
                    <button tabindex="'.$tabindex_5.'" class="mk-progress-button contact-outline-submit outline-btn-'.$skin.'" data-style="move-up">
                        <span class="mk-progress-button-content">'.__( 'Submit', 'mk_framework' ).'</span>
                        <span class="mk-progress">
                            <span class="mk-progress-inner"></span>
                        </span>
                        <span class="state-success"><i class="mk-moon-checkmark"></i></span>
                        <span class="state-error"><i class="mk-moon-close"></i></span>
                    </button>
                </div>';
    $output .= '<input type="hidden" value="'.antispambot($email).'" name="contact_to"/>';
    $output .= '</form>';
    $output .= '<div class="clearboth"></div></div>';


} else if($style == 'corporate') {
    $output .= $fancy_title;
    $output .= '<div class="mk-contact-form-wrapper mk-shortcode contact-dark corporate-style '.$el_class.'">';
    $output .= '<form id="mk-contact-form-'.$id.'" class="mk-contact-form" method="post" novalidate="novalidate">';
    $output .= '<div class="mk-form-row">';
    $output .= '<div class="mk-form-half"><input placeholder="'.__( 'First Name*', 'mk_framework' ).'" type="text" required="required" name="contact_name" class="text-input" value="" tabindex="'.$tabindex_1.'" /></div>';
    $output .= '<div class="mk-form-half"><input placeholder="'.__( 'Last Name*', 'mk_framework' ).'" type="text" required="required" name="contact_last_name" class="text-input" value="" tabindex="'.$tabindex_3.'" /></div>';
    $output .= '</div>';
    $output .= '<div class="mk-form-row">';
    $output .= '<div class="'.(($phone == 'true')? 'mk-form-third' : 'mk-form-half').'"><input placeholder="'.__( 'Email*', 'mk_framework' ).'" type="email" required="required" name="contact_email" class="text-input" value="" tabindex="'.$tabindex_1.'" /></div>';
    $output .= '<div class="'.(($phone == 'true')? 'mk-form-third' : 'mk-form-half').'"><input placeholder="'.__( 'Website', 'mk_framework' ).'" type="text" required="required" name="contact_website" class="text-input" value="" tabindex="'.$tabindex_3.'" /></div>';
    if($phone == 'true') {
        $output .= '<div class="'.(($phone == 'true')? 'mk-form-third' : 'mk-form-half').'"><input placeholder="'.__( 'Your Phone Number', 'mk_framework' ).'" type="text" required="required" name="contact_phone" class="text-input two-third" value="" tabindex="'.$tabindex_2.'" /></div>';
    }
    $output .= '</div>';
    $output .= '<div class="mk-form-row"><div class="mk-form-full"><textarea required="required" placeholder="'.__( 'Message', 'mk_framework' ).'" name="contact_content" class="mk-textarea" tabindex="'.$tabindex_4.'"></textarea></div></div>';
    
    // CAPTCHA 
    if($captcha == 'true') {
    $output .= '<div class="mk-form-row">
                    <div class="mk-form-full">
                        <input placeholder="'.__( 'Enter Captcha', 'mk_framework' ).'" type="text" name="captcha" class="captcha-form text-input full" required="required" autocomplete="off" />
                            <img src="'.THEME_DIR_URI.'/captcha/captcha.php" class="captcha-image" alt="captcha txt"> <br/>
                            <a href="#" class="captcha-change-image">Not readable? Change text.</a>
                    </div>
                </div>';
    }  

    $output .= '<div class="mk-form-row">
                    <button tabindex="'.$tabindex_5.'" class="mk-progress-button mk-button contact-submit contact-form-button medium" data-style="move-up">
                        <span class="mk-progress-button-content">'.__( 'Contact Us', 'mk_framework' ).'</span>
                        <span class="mk-progress">
                            <span class="mk-progress-inner"></span>
                        </span>
                        <span class="state-success"><i class="mk-moon-checkmark"></i></span>
                        <span class="state-error"><i class="mk-moon-close"></i></span>
                    </button>
                </div>';
    $output .= '<input type="hidden" value="'.antispambot($email).'" name="contact_to"/>';
    $output .= '</form>';
    $output .= '<div class="clearboth"></div></div>';

}



$rgba = mk_hex2rgba($font_color, 0.6);


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= '
    .corporate-style #mk-contact-form-'.$id.' .text-input,
    .corporate-style #mk-contact-form-'.$id.' .mk-textarea {
        background-color: '.$bg_color.';
        border-color: '.$border_color.';
        color: '.$font_color.';
    }   

    .corporate-style #mk-contact-form-'.$id.' ::-webkit-input-placeholder {
       color: '.$rgba.';
    }

    .corporate-style #mk-contact-form-'.$id.' :-moz-placeholder { /* Firefox 18- */
       color: '.$rgba.';  
    }

    .corporate-style #mk-contact-form-'.$id.' ::-moz-placeholder {  /* Firefox 19+ */
       color: '.$rgba.';  
    }

    .corporate-style #mk-contact-form-'.$id.' :-ms-input-placeholder {  
       color: '.$rgba.';  
    }

    .corporate-style #mk-contact-form-'.$id.' .contact-submit {
        background-color: '.$button_color.';
        color: '.$button_font_color.';
    }
    .corporate-style #mk-contact-form-'.$id.' .mk-progress-inner {
        background-color: '.$button_font_color.';
        opacity: .4;
    }';

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