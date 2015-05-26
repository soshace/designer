<?php
class mkOptionGenerator {
    var $name;
    var $options;
    var $saved_options;
    function __construct( $name, $options ) {
        $this->name = $name;
        $this->options = $options;
        $this->render();
    }
    function mkOptionGenerator( $name, $options ) {
        $this->__construct( $name, $options );
    }



    function render() {

        $this->saved_options = get_option( THEME_OPTIONS );

?>



        <div class="masterkey-options-page  mk-resets">
        <form action="" type="post" name="masterkey_settings" id="masterkey_settings">

        <div id="mk-are-u-sure" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/warning-icon.png" alt="" class="mk-loading-gif" />
        <span style="padding-bottom:20px;" class="mk-message-text"><?php _e( 'Are you sure you want to reset to default? Please Note all masterkey settings will be restored to defaults.', 'mk_framework' ); ?></span>
        <a href="#" class="mk-button dominant-color mk-secondary mk_reset_ok" id="mk_reset_ok"><?php _e( 'OK', 'mk_framework' ); ?></a>
        <a href="#" class="mk-button highlight-color mk-secondary mk_reset_cancel" id="mk_reset_cancel"><?php _e( 'Cancel', 'mk_framework' ); ?></a>
        </div>


        <div id="mk-saving-settings" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/mk-loading.gif" alt="" class="mk-loading-gif" />
        <span class="mk-message-text"><?php _e( 'Saving changes...', 'mk_framework' ); ?></span>
        </div>

        <div id="mk-success-save" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/mk-success-icon.png" alt="" class="mk-loading-gif" />
        <span class="mk-message-text"><?php _e( 'The changes were saved successfully', 'mk_framework' ); ?></span>
        </div>

        <div id="mk-success-reset" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/mk-success-icon.png" alt="" class="mk-loading-gif" />
        <span class="mk-message-text"><?php _e( 'All options restored to defaults', 'mk_framework' ); ?></span>
        </div>

        <div id="mk-success-import" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/mk-success-icon.png" alt="" class="mk-loading-gif" />
        <span class="mk-message-text"><?php _e( 'All options have been imported successfully', 'mk_framework' ); ?></span>
        </div>


        <div id="mk-already-saved" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/warning-icon.png" alt="" class="mk-loading-gif" />
        <span class="mk-message-text"><?php _e( 'You have already saved the changes', 'mk_framework' ); ?></span>
        </div>

        <div id="mk-fail-import" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/warning-icon.png" alt="" class="mk-loading-gif" />
        <span class="mk-message-text"><?php _e( 'Nothing has been imported...', 'mk_framework' ); ?></span>
        </div>


        <div id="mk-not-saved" class="mk-message-box">
        <img src="<?php echo THEME_ADMIN_ASSETS_URI; ?>/images/warning-icon.png" alt="" class="mk-loading-gif" />
        <span class="mk-message-text"><?php _e( 'The changes could not be saved', 'mk_framework' ); ?></span>
        </div>

<div class="mk-options-container">



<?php
        foreach ( $this->options as $option ) {
            if ( method_exists( $this, $option['type'] ) ) {
                $this->$option['type']( $option );
            }
        }
?>
<div class="mk-footer-buttons">
<a type="submit" id="mk_reset_confirm" href="#" class="mk-button highlight-color"><span><?php _e( 'Restore Defaults', 'mk_framework' ); ?></span></a>
<button type="submit" id="reset_theme_options" name="reset_theme_options" class="visuallyhidden"></button>

<button type="submit" id="save_theme_options_top" name="save_theme_options_top" class="button-primary"><span><?php _e( 'Save Settings', 'mk_framework' ); ?></span></button>
<button type="submit" id="save_theme_options_bottom" name="save_theme_options_bottom" class="button-primary"><span><?php _e( 'Save Settings', 'mk_framework' ); ?></span></button>



</div>
<input type="hidden" name="action" value="theme_data_save" />
<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'theme-data' ); ?>" />
<input type="hidden" name="option_storage" value="<?php echo THEME_OPTIONS; ?>" />
<div class="clearboth"></div>
</div>


       </form>
   </div>

<?php
    }




    function start( $value ) {
        $theme_data = wp_get_theme();
        echo '<div class="main-left-section">';
        echo '<span class="masterkey-branding"><a href="#" alt="" title="" class="mk-logo"></a><span title="Theme Version" class="mk-theme-version">ver '.$theme_data['Version'].'</span></span>';
        echo '<ul class="mk-main-navigator">';

        echo '<li><a href="#mk_options_general"><i class="icon-globe-2"></i>'.__( 'General', 'mk_framework' ).'</a></li>';
        echo '<li><a href="#mk_options_skining"><i class="icon-droplet3"></i>'.__( 'Styling', 'mk_framework' ).'</a></li>';
        echo '<li><a href="#mk_options_typography"><i class="icon-type"></i>'.__( 'Typography', 'mk_framework' ).'</a></li>';
        echo '<li><a href="#mk_options_portfolio"><i class="icon-briefcase3"></i>'.__( 'Portfolio', 'mk_framework' ).'</a></li>';
        echo '<li><a href="#mk_options_blog"><i class="icon-blog"></i>'.__( 'Blog / News', 'mk_framework' ).'</a></li>';
        echo '<li><a href="#mk_options_woocommrce"><i class="dashicons-cart dashicons-before"></i>'.__( 'Woocommerce', 'mk_framework' ).'</a></li>';
        echo '<li><a href="#mk_options_advanced"><i class="icon-lab"></i>'.__( 'Advanced', 'mk_framework' ).'</a></li>';

        echo '</ul>';
        echo '</div>';
        echo '<div class="mk-main-panes">';
    }


    function heading( $value ) {

        echo '<div class="mk-heading-option">';
        echo '<span class="mk-page-heading">'.$value['name'] .'</span>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }
        echo '</div>';
    }


    function end() {

        echo '</div>';
    }


    function start_main_pane( $value ) {

        echo '<div id="'.$value['id'].'" class="mk-main-pane">';

    }


    function end_main_pane() {

        echo '</div>';

    }


    function start_sub( $value ) {

        echo '<ul class="mk-sub-navigator">';

        foreach ( $value['options'] as $key => $option ) {
            echo '<li  class="'.$key.'"><a href="#'.$key.'">'.$option.'</a></li>';
        }

        echo'</ul>';
        echo'<div class="mk-sub-panes">';

    }



    function end_sub() {

        echo '</div>';

    }


    function start_sub_pane( $value ) {

        echo '<div id="'.$value['id'].'" class="mk-sub-pane">';

    }


    function end_sub_pane() {

        echo '</div>';

    }






    /*
**
**
** Type : Text Box
-------------------------------------------------------------*/

    function text( $value ) {
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo "<input name='" . $value['id'] . "' id='" . $value['id'] . "' type='text' class='mk-textbox' size='40' value='";
        if ( isset( $this->saved_options[$value['id']] ) ) {
            echo htmlspecialchars( $this->saved_options[$value['id']], ENT_QUOTES );
        }
        else {
            echo htmlspecialchars( $value['default'], ENT_QUOTES );
        }
        echo "' />";
        echo '</div>';

    }




    /*
**
**
** Type : Upload Image
-------------------------------------------------------------*/
    function upload( $value ) {

        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }
        echo '<div class="mk-single-option upload-option" id="' . $value['id'] . '_wrapper">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }
            echo '<input class="mk-upload-url" type="text" id="' . $value['id'] . '" name="' . $value['id'] . '" size="50"  value="';

            echo $default;

            echo '" /><a class="option-upload-button button thickbox" id="' . $value['id'] . '_button" href="#">'.__( 'Upload', 'mk_framework' ).'</a>';


        echo '<span id="'.$value['id'].'-preview" class="show-upload-image" alt="'.$value['name'] .'"><img src="'.$default.'" title="" /></span>';
        echo '</div>';

    }








    /*
**
**
** Type : Toggle Button
-------------------------------------------------------------*/
    function toggle( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<span class="mk-toggle-button"><span class="toggle-handle"></span><input type="hidden" value="' . $default . '" name="' . $value['id'] . '" id="' . $value['id'] . '"/></span>';

        echo '</div>';
    }













    /*
**
**
** Type : Color Picker
-------------------------------------------------------------*/

    function color( $value ) {
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="color-picker-holder"><input name="' . $value['id'] . '" id="' . $value['id'] . '" size="8" data-default-color="' . $value['default'] . '" class="color-picker" value="';
        if ( isset( $this->saved_options[$value['id']] ) ) {
            echo stripslashes( $this->saved_options[$value['id']] );
        }
        else {
            echo $value['default'];
        }
        echo '" /></div>';
        echo '</div>';
    }



    /*
**
**
** Type : Range Input
-------------------------------------------------------------*/
    function range( $value ) {
        echo '<div class="mk-single-option mk-range-option" id="' . $value['id'] . '_wrapper">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="mk-ui-input-slider">';
        echo '<div class="mk-range-input"';

        if ( isset( $this->saved_options[$value['id']] ) ) {
            echo '" data-value="'.stripslashes( $this->saved_options[$value['id']] ).'"';
        }
        else {
            echo '" data-value="'.$value['default'].'"';
        }

        if ( isset( $value['min'] ) ) {
            echo '" data-min="' . $value['min'];
        }
        if ( isset( $value['max'] ) ) {
            echo '" data-max="' . $value['max'];
        }
        if ( isset( $value['step'] ) ) {
            echo '" data-step="' . $value['step'].'"';
        }
        echo '></div>';
        echo '<input class="range-input-selector" name="' . $value['id'] . '" id="' . $value['id'] . '" type="text" value="';
        if ( isset( $this->saved_options[$value['id']] ) ) {
            echo stripslashes( $this->saved_options[$value['id']] );
        }
        else {
            echo $value['default'];
        }
        echo '" />';

        if ( isset( $value['unit'] ) ) {
            echo '<span class="unit">' . $value['unit'] . '</span>';
        }

        echo '</div>';
        echo '</div>';


    }


    /*
**
**
** Type : Textarea
-------------------------------------------------------------*/
    function textarea( $value ) {
        $rows = isset( $value['rows'] ) ? $value['rows'] : '8';
        $el_class = isset( $value['el_class'] ) ? $value['el_class'] : '';
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<textarea id="' . $value['id'] . '" rows="' . $rows . '" name="' . $value['id'] . '" type="' . $value['type'] . '" class="code '.$el_class.'">';
        if ( isset( $this->saved_options[$value['id']] ) ) {
            echo stripslashes( $this->saved_options[$value['id']] );
        }
        else {
            if ( isset( $value['default'] ) ) {
                echo $value['default'];
            }

        }
        echo '</textarea>';
        echo '</div>';
    }







    /*
**
**
** Type : Textbox
-------------------------------------------------------------*/
    function checkbox( $value ) {
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label><span>'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="mk-select-radio">';

        $i = 0;
        foreach ( $value['options'] as $key => $option ) {
            $i++;
            $checked = '';
            if ( isset( $this->saved_options[$value['id']] ) ) {
                if ( is_array( $this->saved_options[$value['id']] ) ) {
                    if ( in_array( $key, $this->saved_options[$value['id']] ) ) {
                        $checked = ' checked="checked"';
                    }
                }
            } else if ( in_array( $key, $value['default'] ) ) {
                    $checked = ' checked="checked"';
                }

            echo '<input type="checkbox" value="' . $key . '" id="' . $value['id'] . '-checkbox-' . $key . '" name="' . $value['id'] . '[]" ' . $checked . ' /><label for="' . $value['id'] . '-checkbox-' . $key . '"><span></span>' . $option . '</label>';
        }
        echo '</div>';
        echo '</div>';
    }



    /*
**
**
** Type : Gourpset
-------------------------------------------------------------*/
    function groupset( $value ) {
        echo '<div class="mk-groupset-above">'.$value['above_content'] .'</div>';
        echo '<div class="mk-groupset-holder">';
        echo '<h3>'.$value['heading'] .'</h3>';
        
    }

    function groupset_end( $value ) {

        echo '</div>';

    }



    /*
**
**
** Type : Radio Button
-------------------------------------------------------------*/
    function radio( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $checked_key = $this->saved_options[$value['id']];
        } else {
            $checked_key = $value['default'];
        }
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label><span>'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="mk-select-radio">';

        $i = 0;
        foreach ( $value['options'] as $key => $option ) {
            $i++;
            $checked = '';
            if ( $key == $checked_key ) {
                $checked = ' checked="checked"';
            }

            echo '<input type="radio" value="' . $key . '" ' . $checked . ' id="' . $value['id'] . '-radio-' . $key . '" name="' . $value['id'] . '"><label for="' . $value['id'] . '-radio-' . $key . '"><span></span>' . $option . '</label>';
        }
        echo '</div>';
        echo '</div>';
    }






    /*
**
**
** Type : chosen Select
-------------------------------------------------------------*/
    function dropdown( $value ) {
        if ( isset( $value['target'] ) ) {
            if ( isset( $value['options'] ) ) {
                $value['options'] = $value['options'] + $this->get_select_target_options( $value['target'] );
            }
            else {
                $value['options'] = $this->get_select_target_options( $value['target'] );
            }
        }

        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label><span>'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<select class="mk-select" name="' . $value['id'] . '" id="' . $value['id'] . '">';
        if(!isset( $value['placeholder'] )) {
            echo '<option value="">'. __( 'Select Option', 'mk_framework' ).'</option>';    
        }
        if ( !empty( $value['options'] ) && is_array( $value['options'] ) ) {
            foreach ( $value['options'] as $key => $option ) {
                echo '<option value="' . $key . '"';
                if ( isset( $this->saved_options[$value['id']] ) ) {
                    if ( stripslashes( $this->saved_options[$value['id']] ) == $key ) {
                        echo ' selected="selected"';
                    }
                }
                else if ( $key == $default ) {
                        echo ' selected="selected"';
                    }
                echo '>' . $option . '</option>';
            }
        }
        echo '</select>';

        echo '</div>';
    }


    /*
**
**
** Type : Multi Select
-------------------------------------------------------------*/
    function multiselect( $value ) {
        if ( isset( $value['target'] ) ) {
            if ( isset( $value['options'] ) ) {
                $value['options'] = $value['options'] + $this->get_select_target_options( $value['target'] );
            }
            else {
                $value['options'] = $this->get_select_target_options( $value['target'] );
            }
        }
        echo '<div class="mk-single-option" id="' . $value['id'] . '_wrapper">';

        echo '<label><span>'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<select class="mk-chosen" name="' . $value['id'] . '[]" id="' . $value['id'] . '" multiple="multiple" style="width:500px;">';

        if ( !empty( $value['options'] ) && is_array( $value['options'] ) ) {
            foreach ( $value['options'] as $key => $option ) {
                echo '<option value="' . $key . '"';
                if ( isset( $this->saved_options[$value['id']] ) ) {
                    if ( is_array( $this->saved_options[$value['id']] ) ) {
                        if ( in_array( $key, $this->saved_options[$value['id']] ) ) {
                            echo ' selected="selected"';
                        }
                    }
                }
                else if ( in_array( $key, $value['default'] ) ) {
                        echo ' selected="selected"';
                    }
                echo '>' . $option . '</option>';
            }
        }
        echo '</select>';
        echo '</div>';
    }






    /*
**
**
** Type : Visual Selector
-------------------------------------------------------------*/
    function visual_selector( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }
        echo '<div class="mk-single-option '.$value['id'].'" id="' . $value['id'] . '_wrapper">';

        echo '<label><span>'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="mk-visual-selector">';
        foreach ( $value['options'] as $key => $option ) {
            echo '<a href="#" rel="'.$key.'"><img  src="' . THEME_ADMIN_ASSETS_URI . '/images/'.$option.'" /></a>';
        }
        echo '<input type="hidden" value="' .  $default . '" name="' . $value['id'] . '" id="' . $value['id'] . '"/>';
        echo '</div>';
        echo '</div>';
    }






    /*
**
**
** Type : Header Styles
-------------------------------------------------------------*/
    function header_styles($value) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }

        echo '<div class="mk-single-option '.$value['id'].'" id="' . $value['id'] . '_wrapper">';

        echo '<label><span>'.$value['name'] .'</span></label>';

                if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div id="mk-header-switcher">';
            echo '<div class="header-style-unit">';

                echo '<div class="mk-header-preview"><div></div></div>';

                echo '<div class="mk-header-styles-number">';
                    echo '<span rel="4">4</span>';
                    echo '<span rel="3">3</span>';
                    echo '<span rel="2">2</span>';
                    echo '<span rel="1">1</span>';
                echo '</div>';

                echo '<div class="mk-header-style-tools">';
                echo '<div class="mk-header-align">';
                    echo '<div class="label">'.__('Align','mk_framework').'</div>';
                    echo '<span rel="left" class="header-align-left"></span>';
                    echo '<span rel="center" class="header-align-center"></span>';
                    echo '<span rel="right" class="header-align-right"></span>';
                echo '</div>';


                echo '<div class="mk-header-toolbar-toggle">';
                    echo '<div class="label">'.__('Toolbar','mk_framework').'</div>';
                    echo '<span class="header-toolbar-toggle-button"></span>';
                echo '</div>';

                echo '</div>';


            echo '</div>';

        echo '<input type="hidden" value="' .  $default . '" name="' . $value['id'] . '" id="' . $value['id'] . '"/>';

        echo '</div>';
        echo '</div>';




    }






    /*
**
**
** Type : HomePage Tabbed Content
-------------------------------------------------------------*/
    function header_social_networks( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }

        $sites_names = array(
            'px',
            'aim',
            'amazon',
            'apple',
            'bebo',
            'behance',
            'blogger', 
            'delicious', 
            'deviantart', 
            'digg', 
            'dribbble', 
            'dropbox', 
            'envato', 
            'facebook', 
            'flickr', 
            'github', 
            'google', 
            'googleplus', 
            'lastfm', 
            'linkedin',
            'instagram', 
            'myspace', 
            'path', 
            'pinterest', 
            'reddit', 
            'rss', 
            'skype', 
            'stumbleupon', 
            'tumblr', 
            'twitter', 
            'vimeo', 
            'wordpress', 
            'yahoo', 
            'yelp', 
            'youtube',
            'xing',
            'imdb',
            'qzone',
            'renren',
            'vk',
            'wechat',
            'weibo',
            'whatsapp',
            'soundcloud',

        );

        if ( !empty( $default ) ) {
            $sites = explode( ',', $default );
        }
        else {
            $sites = array();
        }

        echo '<div class="mk-single-option">';

        echo '<label for="add_tab"><span class="option-title-main">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="header-social-wrapper">';
        echo '<span class="header-social-option-row"><span class="header-social-option-label">Select a Site</span><div class="mk-fancy-selectbox text-based" id="header_social_sites" style="width:320px">';


        echo '<select class="mk-select" name="header_social_sites_select" id="header_social_sites_select">';
        echo '<option value="">'.__( 'Select Option...', 'mk_framework' ).'</option>';
        foreach ( $sites_names as $key ) {
            echo '<option value="' . $key . '" >' . str_replace( '-', '', $key ). '</option>';
        }
        echo '</select></div></span>';

        echo '<span class="header-social-option-row"><span class="header-social-option-label">Enter Full URL</span><input type="text" id="header_social_url" name="header_social_url" size="35" /></span>';

        echo '<a href="#" class="button-primary" id="add_header_social_item">'.__( 'Add New', 'mk_framework' ).'</a></div>';


        echo '<span class="option-title-sub" style="margin-bottom:20px;">'.__( 'Current Social Networks', 'mk_framework' ) .'</span>';
        echo '<div id="mk-current-social" class="mk-current-social">';

        echo '<div class="default-social-item">
                            <div class="social-item-icon"></div>
                            <div class="social-item-url"></div>
                            <a href="#" class="delete-social-item"><i class="icon-close2"></i></a>
                            <input type="hidden" class="mk-social-item-site" value=""/>
                            <input type="hidden" class="mk-social-item-url" value=""/>
                     </div>';

        if ( !empty( $sites ) ) {
            foreach ( $sites as $site ) {
                echo '<div class="mk-social-item added-item">
                            <div class="social-item-icon"><i class="mk-jupiter-icon-simple-'.$site.'"></i></div>
                            <div class="social-item-url"></div>
                            <a href="#" class="delete-social-item"><i class="icon-close2"></i></a>
                            <input type="hidden" class="mk-social-item-site" value="' . $site . '"/>
                            <input type="hidden" class="mk-social-item-url" value=""/>
                     </div>';
            }
        }

        echo '</div>';
        echo '<input type="hidden" value="' . $default . '" name="header_social_networks_site" id="header_social_networks_site"/>';
        echo '</div>';
        echo "
        <script type='text/javascript'>
        jQuery(document).ready(function() {
          var mk_social_site_url = jQuery('#header_social_networks_url').val().split(',');

            jQuery('.mk-social-item.added-item').each(function(i) {

                jQuery(this).find('.mk-social-item-url').attr('value', mk_social_site_url[i]);
                jQuery(this).find('.social-item-url').text(mk_social_site_url[i]);
            })
        })
    </script>
";
    }




    /*
**
**
** Type : Custom Sidebar
-------------------------------------------------------------*/
    function custom_sidebar( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }

        if ( !empty( $default ) ) {
            $sidebars = explode( ',', $default );
        }
        else {
            $sidebars = array();
        }

        echo '<div class="mk-single-option">';

        echo '<label for="add_sidebar"><span>'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="custom-sidebar-wrapper">';
        echo '<input type="text" id="add_sidebar" name="add_sidebar" size="50" /><a href="#" class="button-primary" id="add_sidebar_item">'.__( 'Create', 'mk_framework' ).'</a>';
        echo '</div>';

        echo '<span class="option-title-sub" style="margin-bottom:20px;">'.__( 'Current sidebars', 'mk_framework' ) .'</span>';

        echo '<div id="selected-sidebar" class="selected-sidebar">';
        echo '<div id="sidebar-item" class="default-sidebar-item"><div class="slider-item-text"></div><a href="#" class="delete-sidebar"><i class="icon-close2"></i></a><input type="hidden" class="sidebar-item-value" /></div>';
        if ( !empty( $sidebars ) ) {
            foreach ( $sidebars as $sidebar ) {
                echo '<div id="sidebar-item" class="sidebar-item"><div class="slider-item-text">' . $sidebar . '</div><a href="#" class="delete-sidebar"><i class="icon-close2"></i></a><input type="hidden" class="sidebar-item-value" value="' . $sidebar . '"/></div>';
            }
        }
        echo '</div>';
        echo '<input type="hidden" value="' . $default . '" name="' . $value['id'] . '" id="sidebars"/>';
        echo '</div>';
    }



    /*
**
**
** Type : Import
-------------------------------------------------------------*/

    function import( $value ) {
        echo '<div class="mk-single-option">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<textarea id="' . $value['id'] . '" rows="30" name="' . $value['id'] . '" type="' . $value['type'] . '" class="code">';
        echo $value['default'];
        echo '</textarea>';

        echo '<button style="float:right; margin-bottom:20px;" type="submit" id="import_theme_options" name="import_theme_options" class="button-primary"><span>'. __( 'Import', 'mk_framework' ).'</span></button>';
        echo '<div class="clearboth"></div>';
        echo '</div>';

    }




    /*
**
**
** Type : Export
-------------------------------------------------------------*/

    function export( $value ) {
        echo '<div class="mk-single-option">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<textarea id="' . $value['id'] . '" rows="30" onclick="this.focus();this.select()" readonly="readonly" name="' . $value['id'] . '" type="' . $value['type'] . '" class="code">';
        echo base64_encode( serialize( get_option( THEME_OPTIONS ) ) );
        echo '</textarea>';
        echo '</div>';
    }






    /*
**
**
** Type : General Background Selector
-------------------------------------------------------------*/
    function general_background_selector( $value ) {

        echo '<div class="mk-single-option ">';

        echo '<label><span class="option-title-main">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }
?>

<div class="mk-general-bg-selector">
<div class="outer-wrapper">
  <div rel="body" class="body-section"><span class="hover-state-body"><span class="section-indicator">
    <?php _e( 'Body', 'mk_framework' ) ?>
    </span></span><div class="mk-bg-preview-layer"></div><div class="mk-transparent-bg-indicator"></div></div>
  <div class="main-sections-wrapper">
    <div rel="header" class="header-section"><span class="hover-state"><span class="section-indicator">
      <?php _e( 'Header', 'mk_framework' ) ?>
      </span></span><div class="mk-bg-preview-layer"></div><div class="mk-transparent-bg-indicator"></div></div>
      <div rel="banner" class="banner-section"><span class="hover-state"><span class="section-indicator">
      <?php _e( 'Page Title Section', 'mk_framework' ) ?>
      </span></span><div class="mk-bg-preview-layer"></div><div class="mk-transparent-bg-indicator"></div></div>
    <div rel="page" class="page-section"><span class="hover-state"><span class="section-indicator">
      <?php _e( 'Page', 'mk_framework' ) ?>
      </span></span><div class="mk-bg-preview-layer"></div><div class="mk-transparent-bg-indicator"></div></div>
    <div rel="footer" class="footer-section"><span class="hover-state"><span class="section-indicator">
      <?php _e( 'Footer', 'mk_framework' ) ?>
      </span></span><div class="mk-bg-preview-layer"></div><div class="mk-transparent-bg-indicator"></div></div>
  </div>
</div>
<div id="mk-bg-edit-panel" class="mk-bg-edit-panel">
  <div class="mk-bg-panel-heading"> <a class="mk-bg-edit-panel-heading-cancel" href="#"><i class="icon-close2"></i></a> <span class="mk-bg-edit-panel-heading-text">Edit color & texture - <span class="mk-edit-panel-heading"></span></span> </div>
  <div style="border-bottom:1px solid #ccc;">
    <div class="mk-bg-edit-right">
      <div class="mk-bg-edit-option"> <span class="mk-bg-edit-label">
        <?php  _e( 'Background Image', 'mk_framework' )  ?>
        </span>
        <ul class="bg-background-type-tabs">
          <li><a rel="no-image" href="#" class="mk-bg-edit-option-no-image-button button bg-image-buttons">
            <?php  _e( 'No Image', 'mk_framework' )  ?>
            </a></li>
          <li><a rel="preset" href="#" class="mk-bg-edit-option-preset-button button bg-image-buttons">
            <?php  _e( 'Presets', 'mk_framework' )  ?>
            </a></li>
          <li><a rel="custom" href="#" class="mk-bg-edit-option-upload-button button bg-image-buttons">
            <?php  _e( 'Custom', 'mk_framework' )  ?>
            </a></li>
        </ul>
        <div class="clearboth"></div>

      <div class="bg-background-type-panes">
        <div class="bg-background-type-pane bg-no-image"> </div>
        <div class="bg-background-type-pane bg-image-preset">
          <div class="bg-image-preset-wrapper">
                <ul class="bg-image-preset-thumbs">
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/1.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/1.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/2.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/2.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/3.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/3.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/4.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/4.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/5.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/5.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/6.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/6.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/7.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/7.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/8.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/8.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/9.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/9.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/10.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/10.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/11.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/11.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/12.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/12.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/13.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/13.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/14.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/14.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/15.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/15.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/16.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/16.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/17.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/17.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/18.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/18.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/19.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/19.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/20.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/20.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/21.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/21.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/22.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/22.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/23.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/23.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/24.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/24.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/25.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/25.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/26.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/26.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/27.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/27.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/28.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/28.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/29.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/29.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/30.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/30.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/31.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/31.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/32.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/32.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/33.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/33.png" /></a></li>
                </ul>
              </div>
            </div>
        <div class="bg-background-type-pane bg-edit-panel-upload" style="padding-top:60px;">
          <div class="upload-option">
            <div id="bg_panel_upload-preview" class="custom-image-preview-block show-upload-image"><img src="" title="" /></div>
            <span class="bg-edit-panel-upload-title">
            <?php  _e( 'Upload a new custom image', 'mk_framework' )  ?>
            </span>


 <?php
            echo '<div class="mk-upload-bg-wrapper"><input class="mk-upload-url" type="text" id="bg_panel_upload" name="bg_panel_upload" size="40"  value="" /><a class="option-upload-button button thickbox" id="bg_panel_upload_button" href="#">'.__( 'Upload', 'mk_framework' ).'</a></div>';

?>
</div>
        </div>
      </div>
      <div class="clearboth"></div>
    </div>
</div>
    <div class="mk-bg-edit-left">
      <div class="mk-bg-edit-option mk-bg-edit-bg-color"> <span class="mk-bg-edit-label">
        <?php  _e( 'Background color', 'mk_framework' ) ?>
        </span>
        <div class="bg-edit-panel-color">
          <div class="color-picker-holder"><input name="bg_panel_color" id="bg_panel_color" size="8" class="color-picker" value="" /></div>
        </div>
        <div class="clearboth"></div>
      </div>
      <div class="mk-bg-edit-option mk-bg-edit-option-repeat"> <span class="mk-bg-edit-label">
        <?php  _e( 'Background Repeat', 'mk_framework' )  ?>
        </span>
        <div class="bg-repeat-option"><a style="border:none" class="no-repeat" href="#" rel="no-repeat" title="no-repeat"></a><a href="#" rel="repeat" class="repeat" title="repeat"></a><a href="#" rel="repeat-x" class="repeat-x" title="repeat-x"></a><a href="#" rel="repeat-y" class="repeat-y" title="repeat-y"></a></div>
        <div class="clearboth"></div>
      </div>
      <div class="mk-bg-edit-option mk-bg-edit-option-attachment"> <span class="mk-bg-edit-label">
        <?php  _e( 'Background Attachment', 'mk_framework' )  ?>
        </span>
        <div class="bg-attachment-option"> <a style="border:none" href="#" rel="fixed" class="fixed" title="fixed"></a><a href="#" rel="scroll" class="scroll" title="scroll"></a></div>
        <div class="clearboth"></div>
      </div>
      <div class="mk-bg-edit-option mk-bg-edit-option-position"> <span class="mk-bg-edit-label"><?php  _e( 'Background Position', 'mk_framework' )  ?></span>
        <div class="bg-position-option">
            <a style="border-left:none" href="#" rel="left top" class="left-top" title="left top"></a><a href="#" rel="center top" class="center-top" title="center top"></a><a href="#" rel="right top" class="right-top" title="right top"></a>
          <div class="clearboth"></div>
          <a style="border-left:none" href="#" rel="left center" class="left-center" title="left center"></a><a href="#" rel="center center" class="center-center" title="center center"></a><a href="#" rel="right center" class="right-center" title="right center"></a>
          <div class="clearboth"></div>
          <a style="border-left:none; border-bottom:none;" href="#" rel="left bottom" class="left-bottom" title="left bottom"></a><a style="border-bottom:none;" href="#" rel="center bottom" class="center-bottom" title="center bottom"></a><a style="border-bottom:none;" href="#" rel="right bottom" class="right-bottom" title="right bottom"></a>
      </div>
        <div class="clearboth"></div>
      </div>
      <div class="mk-bg-edit-option mk-bg-edit-option-stretch"> <span class="mk-bg-edit-label">
        <?php  _e( 'Cover whole background', 'mk_framework' )  ?>
        </span>
        <span class="mk-toggle-button"><span class="toggle-handle"></span><input type="hidden" value="false" name="bg_panel_stretch" id="bg_panel_stretch"/></span>
        <div class="clearboth"></div>
      </div>
      <div class="clearboth"></div>
    </div>
    <div class="clearboth"></div>
  </div>
  <div class="mk-bg-edit-buttons"> <a id="mk_cancel_bg_selector" href="#" class="button"><span>
    <?php _e( 'Cancel', 'mk_framework' ) ?>
    </span></a> <a id="mk_apply_bg_selector" href="#" class="button-primary"><span>
    <?php _e( 'Apply', 'mk_framework' ) ?>
    </span></a> </div>
</div>


<?php


        echo'</div>';
        echo '</div>';


    }


    function hidden_input( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }

        echo '<input class="hidden-input-'. $value['id'] .'" type="hidden" value="'.$default.'" name="' . $value['id'] . '" id="' . $value['id'] . '"/>';
    }










    /*
**
**
** Type : Specific Background Selector
-------------------------------------------------------------*/
    function specific_background_selector_start( $value ) {

        echo '<div class="mk-single-option ">';

        echo '<label><span class="option-title-sub">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }
?>

<div class="mk-specific-bg-selector" id="<?php echo $value['id']; ?>">
    <div class="mk-specific-bg-selector-left">
  <div class="mk-bg-edit-option mk-specific-edit-bg-color">

<?php

    }



    /*
**
**
** Type : Specific Background Selector Color
-------------------------------------------------------------*/
    function specific_background_selector_color( $value ) {

        if ( isset( $this->saved_options[$value['id']] ) ) {
            $color = $this->saved_options[$value['id']];
        }
        else {
            $color = $value['default'];
        }

?>
<span class="mk-bg-edit-label">
        <?php  _e( 'Background color', 'mk_framework' ) ?>
        </span>
        <div class="bg-edit-panel-color">

          <div class="color-picker-holder"><input name="<?php echo $value['id'] ?>" id="<?php echo $value['id'] ?>" size="8" class="color-picker" value="<?php echo $color; ?>" /></div>

        </div>
        <div class="clearboth"></div>
   </div>


<?php
    }






    /*
**
**
** Type : Specific Background Selector Repeat
-------------------------------------------------------------*/
    function specific_background_selector_repeat( $value ) {

        if ( isset( $this->saved_options[$value['id']] ) ) {
            $repeat = $this->saved_options[$value['id']];
        }
        else {
            $repeat = $value['default'];
        }

?>
   <div class="mk-bg-edit-option mk-specific-edit-option-repeat"> <span class="mk-bg-edit-label">
        <?php  _e( 'Background Repeat', 'mk_framework' )  ?>
        </span>
        <div class="bg-repeat-option"><a style="border:none" class="no-repeat" href="#" rel="no-repeat" title="no-repeat"></a><a href="#" rel="repeat" class="repeat" title="repeat"></a><a href="#" rel="repeat-x" class="repeat-x" title="repeat-x"></a><a href="#" rel="repeat-y" class="repeat-y" title="repeat-y"></a>
            <input class="specific-input-repeat" type="hidden" value="<?php echo $repeat; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"/>
        </div>
        <div class="clearboth"></div>

    </div>

<?php
    }





    /*
**
**
** Type : Specific Background Selector Attachment
-------------------------------------------------------------*/
    function specific_background_selector_attachment( $value ) {

        if ( isset( $this->saved_options[$value['id']] ) ) {
            $attachment = $this->saved_options[$value['id']];
        }
        else {
            $attachment = $value['default'];
        }

?>
      <div class="mk-bg-edit-option mk-specific-edit-option-attachment"> <span class="mk-bg-edit-label">
        <?php  _e( 'Background Attachment', 'mk_framework' )  ?>
        </span>
        <div class="bg-attachment-option"> <a style="border:none" href="#" rel="fixed" class="fixed" title="fixed"></a><a href="#" rel="scroll" class="scroll" title="scroll"></a>
        <input class="specific-input-attachment" type="hidden" value="<?php echo $attachment; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"/>
        </div>
        <div class="clearboth"></div>
      </div>

<?php
    }









    /*
**
**
** Type : Specific Background Selector Position
-------------------------------------------------------------*/
    function specific_background_selector_position( $value ) {

        if ( isset( $this->saved_options[$value['id']] ) ) {
            $position = $this->saved_options[$value['id']];
        }
        else {
            $position = $value['default'];
        }

?>
      <div class="mk-bg-edit-option mk-specific-edit-option-position"> <span class="mk-bg-edit-label"><?php  _e( 'Background Position', 'mk_framework' )  ?></span>
        <div class="bg-position-option">
            <a style="border-left:none" href="#" rel="left top" class="left-top" title="left top"></a><a href="#" rel="center top" class="center-top" title="center top"></a><a href="#" rel="right top" class="right-top" title="right top"></a>
          <div class="clearboth"></div>
          <a style="border-left:none" href="#" rel="left center" class="left-center" title="left center"></a><a href="#" rel="center center" class="center-center" title="center center"></a><a href="#" rel="right center" class="right-center" title="right center"></a>
          <div class="clearboth"></div>
          <a style="border-left:none; border-bottom:none;" href="#" rel="left bottom" class="left-bottom" title="left bottom"></a><a style="border-bottom:none;" href="#" rel="center bottom" class="center-bottom" title="center bottom"></a><a style="border-bottom:none;" href="#" rel="right bottom" class="right-bottom" title="right bottom"></a>
          <input class="specific-input-position" type="hidden" value="<?php echo $position; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"/>
      </div>
 <div class="clearboth"></div>
    </div>

<div class="clearboth"></div></div>
<?php
    }
















    /*
**
**
** Type : Specific Background Selector Source
-------------------------------------------------------------*/
    function specific_background_selector_source( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $image_source = $this->saved_options[$value['id']];
        }
        else {
            $image_source = $value['default'];
        }
?>

      <div class="clearboth"></div>
      <input class="specific-image-source" type="hidden" value="<?php echo $image_source; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"/>
 </div>

</div>

<div class="clearboth"></div>
</div>







<?php



    }






    /*
**
**
** Type : Specific Background Selector Image
-------------------------------------------------------------*/
    function specific_background_selector_image( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $preset_image = $this->saved_options[$value['id']];
        }
        else {
            $preset_image = $value['default'];
        }
?>
<div class="mk-specific-bg-selector-right">
      <div class="mk-bg-edit-option specific-background-image"> <span class="mk-bg-edit-label">
        <?php  _e( 'Background Image', 'mk_framework' )  ?>
        </span>
        <div class="clearboth"></div>
        <ul class="bg-background-type-tabs">
          <li><a rel="no-image" href="#" class="mk-specific-edit-option-no-image-button mk-button highlight-color bg-image-buttons">
            <?php  _e( 'No Image', 'mk_framework' )  ?>
            </a></li>
          <li><a rel="preset" href="#" class="mk-specific-edit-option-preset-button mk-button highlight-color bg-image-buttons">
            <?php  _e( 'Presets', 'mk_framework' )  ?>
            </a></li>
          <li><a rel="custom" href="#" class="mk-specific-edit-option-upload-button mk-button highlight-color bg-image-buttons">
            <?php  _e( 'Custom', 'mk_framework' )  ?>
            </a></li>
        </ul>
        <div class="clearboth"></div>

      <div class="bg-background-type-panes">
        <div class="bg-background-type-pane specific-no-image"> </div>



        <div class="bg-background-type-pane specific-image-preset">
          <div class="bg-image-preset-wrapper">
                 <ul class="bg-image-preset-thumbs">
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/1.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/1.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/2.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/2.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/3.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/3.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/4.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/4.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/5.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/5.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/6.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/6.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/7.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/7.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/8.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/8.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/9.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/9.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/10.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/10.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/11.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/11.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/12.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/12.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/13.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/13.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/14.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/14.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/15.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/15.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/16.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/16.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/17.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/17.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/18.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/18.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/19.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/19.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/20.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/20.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/21.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/21.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/22.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/22.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/23.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/23.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/24.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/24.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/25.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/25.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/26.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/26.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/27.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/27.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/28.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/28.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/29.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/29.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/30.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/30.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/31.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/31.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/32.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/32.png" /></a></li>
                    <li><a href="#" rel="<?php echo THEME_IMAGES  ?>/pattern/33.png"><img title="" alt="" src="<?php echo THEME_ADMIN_ASSETS_URI ?>/images/pattern/33.png" /></a></li>
                </ul>
              </div>
                <input class="specific-preset-image-url" type="hidden" value="<?php echo $preset_image; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"/>
        </div>


<?php


    }



    /*
**
**
** Type : Specific Background Selector Custom Image
-------------------------------------------------------------*/
    function specific_background_selector_custom_image( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $custom_image = $this->saved_options[$value['id']];
        }
        else {
            $custom_image = $value['default'];
        }
?>

        <div class="bg-background-type-pane specific-edit-panel-upload">
              <div class="upload-option">

                        <span class="bg-edit-panel-upload-title">
                        <?php  _e( 'Upload a new custom image', 'mk_framework' )  ?>
                        </span>

            <input class="mk-upload-url" type="text" id="<?php echo $value['id'] ?>" name="<?php echo $value['id'] ?>" size="40"  value="<?php echo $custom_image; ?>" />
            <a class="option-upload-button button thickbox" id="<?php echo $value['id'] ?>_button" href="#"><?php _e( 'Upload', 'mk_framework' ) ?></a>
            <span id="<?php echo $value['id']; ?>-preview" class="show-upload-image" alt="<?php echo $value['name']; ?>"><img src="<?php echo $custom_image; ?>" title="" />
            </div>
        </div>

<?php


    }




    /*
**
**
** Type : Specific Background Selector End
-------------------------------------------------------------*/
    function specific_background_selector_end( $value ) {
        echo '<div class="clearboth"></div></div></div>';
    }









    /*
**
**
** Type : Custom
-------------------------------------------------------------*/
    function custom( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }

        $value['function']( $value, $default );


    }



    /*
**
**
** Type : Special Font
-------------------------------------------------------------*/
    function special_font( $value ) {

        echo '<input type="hidden" id="'. $value['id']. '" name="' . $value['id'] .'"  value="';

        if ( isset( $this->saved_options[$value['id']] ) ) {
            echo $this->saved_options[$value['id']];
        }
        else {
            echo $value['default'];
        }

        echo '"/>';

    }



    function nummerize( $size ) {
        $let = substr( $size, -1 );
        $ret = substr( $size, 0, -1 );
        switch ( strtoupper( $let ) ) {
        case 'P':
            $ret *= 1024;
        case 'T':
            $ret *= 1024;
        case 'G':
            $ret *= 1024;
        case 'M':
            $ret *= 1024;
        case 'K':
            $ret *= 1024;
        }
        return $ret;
    }

    /*
**
**
** Type : System Diagnose
-------------------------------------------------------------*/
    function sys_diagnose( $value ) {

        if ( function_exists( 'wp_get_theme' ) ) {
            $theme_data = wp_get_theme();
            $item_uri = $theme_data->get( 'ThemeURI' );
            $theme_name = $theme_data->get( 'Name' );
            $version = $theme_data->get( 'Version' );
        }
        echo '<div class="mk-single-option with-divider">';

        echo '<label><span class="option-title-sub">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="mk-system-diagnose"><ul>';
        echo'<li><strong>Theme Name:</strong>'.$theme_name.'</li>';
        echo '<li><strong>Theme Version:</strong>'.$version.'</li>';
        echo'<li><strong>Site URL:</strong>'.home_url().'</li>';
        echo '<li><strong>Author URL:</strong>'.$item_uri.'</li>';

        if ( is_multisite() ) {
            echo '<li><strong>WordPress Version:</strong>'. 'WPMU ' . get_bloginfo( 'version' ).'</li>';
        } else {
            echo '<li><strong>WordPress Version:</strong>'. 'WP ' . get_bloginfo( 'version' ).'</li>';
        }
        echo '<li><strong>Web Server Info:</strong>'.esc_html( $_SERVER['SERVER_SOFTWARE'] ).'</li>';
        if ( function_exists( 'phpversion' ) ) {
            echo '<li><strong>PHP Version:</strong>'. esc_html( phpversion() ).'</li>';
        }
        if ( function_exists( 'size_format' ) ) {
            echo '<li><strong>WP Memory Limit:</strong>';
            $mem_limit = $this->nummerize( WP_MEMORY_LIMIT );
            if ( $mem_limit < 67108864 ) {
                echo '<span class="error">' . size_format( $mem_limit ) .' - Recommended memory limit should be at least 64MB. Please refer to : <a target="_blank" href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP">Increasing memory allocated to PHP</a> for more information</span>';
            } else {
                echo '<span>' . size_format( $mem_limit ) . '</span>';
            }
            echo '</li>';
            echo'<li><strong>WP Max Upload Size:</strong>'. size_format( wp_max_upload_size() ) .'</li>';
        }
        if ( function_exists( 'ini_get' ) ) {
            echo '<li><strong>PHP Time Limit:</strong>'. ini_get( 'max_execution_time' ) .'</li>';
        }
        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            echo '<li><strong>WP Debug Mode:</strong><span>Enabled</span></li>';
        } else {
            echo '<li><strong>WP Debug Mode:</strong><span class="error">Disabled</span></li>';
        }
        echo '</ul></div>';
        echo '<a href="http://support.artbees.net" style="margin-left:0;" target="_blank" class="mk-button dominant-color mk-secondary">Help Desk</a>';
        echo '<a href="http://artbees.net/themes/jupiter/docs" target="_blank" class="mk-button dominant-color mk-secondary">Documentation</a>';
        echo '</div>';
    }



    /*
**
**
** Type : Super Links
-------------------------------------------------------------*/

    function superlink( $value ) {
        $target = $target_value ='';

        if ( isset( $this->saved_options[$value['id']] ) ) {
            if ( count( explode( '||', $this->saved_options[$value['id']] ) )>=2 )
                list( $target, $target_value ) = explode( '||', $this->saved_options[$value['id']] );
            $value['default'] = $this->saved_options[$value['id']];
        }
        else {
            list( $target, $target_value ) = explode( '||', $value['default'] );
        }
        echo '<div class="mk-single-option">';

        echo '<label for="'.$value['id'].'"><span>'.$value['name'] .'</label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<input type="hidden" id="' . $value['id'] . '" name="' . $value['id'] . '" value="' . $value['default'] . '"/>';

        $method_options = array(
            'page' => 'Link to page',
            'cat' => 'Link to category',
            'post' => 'Link to post',
            'portfolio'=> 'Link to portfolio',
            'manually' => 'Link manually'
        );
        echo '<select class="mk-select" name="' . $value['id'] . '_selector" id="' . $value['id'] . '_selector">';
        echo '<option value="">' . __( 'Select Linking method', 'mk_framework' ) . '</option>';
        foreach ( $method_options as $key => $option ) {
            echo '<option value="' . $key . '"';
            if ( $key == $target ) {
                echo ' selected="selected"';
            }
            echo '>' . $option . '</option>';
        }
        echo '</select>';

        echo '<div style="margin-top:15px;" class="superlink-wrap">';

        //render page selector
        $hidden = ( $target != "page" ) ? 'class="hidden"' : '';
        echo '<select name="' . $value['id'] . '_page" id="' . $value['id'] . '_page" ' . $hidden . '>';
        echo '<option value="">' . __( 'Select Page', 'mk_framework' ) . '</option>';
        foreach ( $this->get_select_target_options( 'page' ) as $key => $option ) {
            echo '<option value="' . $key . '"';
            if ( $target == "page" && $key == $target_value ) {
                echo ' selected="selected"';
            }
            echo '>' . $option . '</option>';
        }
        echo '</select>';

        //render portfolio selector
        $hidden = ( $target != "portfolio" ) ? 'class="hidden"' : '';
        echo '<select name="' . $value['id'] . '_page" id="' . $value['id'] . '_portfolio" ' . $hidden . '>';
        echo '<option value="">' . __( 'Select Portfolio', 'mk_framework' ) . '</option>';
        foreach ( $this->get_select_target_options( 'portfolio' ) as $key => $option ) {
            echo '<option value="' . $key . '"';
            if ( $target == "portfolio" && $key == $target_value ) {
                echo ' selected="selected"';
            }
            echo '>' . $option . '</option>';
        }
        echo '</select>';

        //render category selector
        $hidden = ( $target != "cat" ) ? 'class="hidden"' : '';
        echo '<select name="' . $value['id'] . '_cat" id="' . $value['id'] . '_cat" ' . $hidden . '>';
        echo '<option value="">' . __( 'Select Category', 'mk_framework' ) . '</option>';
        foreach ( $this->get_select_target_options( 'cat' ) as $key => $option ) {
            echo '<option value="' . $key . '"';
            if ( $target == "cat" && $key == $target_value ) {
                echo ' selected="selected"';
            }
            echo '>' . $option . '</option>';
        }
        echo '</select>';

        //render post selector
        $hidden = ( $target != "post" ) ? 'class="hidden"' : '';
        echo '<select name="' . $value['id'] . '_post" id="' . $value['id'] . '_post" ' . $hidden . '>';
        echo '<option value="">' . __( 'Select Post', 'mk_framework' ) . '</option>';
        foreach ( $this->get_select_target_options( 'post' ) as $key => $option ) {
            echo '<option value="' . $key . '"';
            if ( $target == "post" && $key == $target_value ) {
                echo ' selected="selected"';
            }
            echo '>' . $option . '</option>';
        }
        echo '</select>';

        //render manually
        $hidden = ( $target != "manually" ) ? 'class="hidden"' : '';
        echo '<input name="' . $value['id'] . '_manually" id="' . $value['id'] . '_manually" type="text" value="';
        if ( $target == 'manually' ) {
            echo $target_value;
        }
        echo '" size="35" ' . $hidden . '/>';
        echo '</div>';

        if ( isset( $value['more_help'] ) ) {

            echo '<div class="option-more-help"><a target="_blank" href="'.$value['more_help'].'">'.__( 'More Help', 'mk_framework' ).'</a></div>';
        }

        echo '</div>';
        if ( isset( $value['divider'] ) && $value['divider'] == true ) {

            echo '<div class="option-divider"></div>';
        }
    }


    /*
Extract Array data from sources
*/
    function get_select_target_options( $type ) {

        $options = array();
        switch ( $type ) {
        case 'page':
            $entries = get_pages( 'title_li=&orderby=name&number=30' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->ID] = $entry->post_title;
            }
            break;
        case 'cat':
            $entries = get_categories( 'orderby=name&hide_empty=0' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->term_id] = $entry->name;
            }
            break;
        case 'author':
            $mk_user_query = get_users();
            if ( ! empty( $mk_user_query) ) {
                foreach ( $mk_user_query as $user ) {
                    $options[$user_id] = $user->display_name;
                }
            }

            break;
        case 'post':
            $entries = get_posts( 'orderby=title&numberposts=20&order=ASC&suppress_filters=0' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->ID] = $entry->post_title;
            }
            break;
        case 'portfolio':
            $entries = get_posts( 'post_type=portfolio&orderby=title&numberposts=20&order=ASC&suppress_filters=0' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->ID] = $entry->post_title;
            }
            break;
        case 'slideshow':
            $entries = get_posts( 'post_type=slideshow&orderby=title&numberposts=20&order=ASC&suppress_filters=0' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->ID] = $entry->post_title;
            }
            break;

        case 'icarousel':
            $entries = get_posts( 'post_type=icarousel&orderby=title&numberposts=20&order=ASC&suppress_filters=0' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->ID] = $entry->post_title;
            }
            break;
        case 'portfolio_category':
            $entries = get_terms( 'portfolio_category', 'orderby=name&hide_empty=0' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->slug] = $entry->name;
            }
            break;
        case 'portfolio_category_id':
            $entries = get_terms( 'portfolio_category', 'orderby=name&hide_empty=0' );
            foreach ( $entries as $key => $entry ) {
                $options[$entry->term_id] = $entry->name;
            }
            break;

        }
        return $options;
    }
}
