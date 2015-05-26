<?php
vc_map(array(
    "name" => __("Image Slideshow", "mk_framework"),
    "base" => "mk_image_slideshow",
    'icon' => 'icon-mk-image-slideshow vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Simple image slideshow.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "attach_images",
            "heading" => __("Add Images", "mk_framework"),
            "param_name" => "images",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Width", "mk_framework"),
            "param_name" => "image_width",
            "value" => "770",
            "min" => "100",
            "max" => "1380",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Height", "mk_framework"),
            "param_name" => "image_height",
            "value" => "350",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Animation Effect", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "effect",
            "value" => array(
                __("Fade", 'mk_framework') => "fade",
                __("Slide", 'mk_framework') => "slide"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pause on Hover", "mk_framework"),
            "param_name" => "pause_on_hover",
            "value" => "false",
            "description" => __("Pauses the slideshow when hovering over slider, then resumes when no longer hovering", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Smooth Height", "mk_framework"),
            "param_name" => "smooth_height",
            "value" => "true",
            "description" => __("Allows height of slider to animate smoothly in horizontal mode", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Direction Nav", "mk_framework"),
            "param_name" => "direction_nav",
            "value" => "true",
            "description" => __("The next/pervious buttons to navigate between slides", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));



vc_map(array(
    "name" => __("Swipe Slideshow", "mk_framework"),
    "base" => "mk_swipe_slideshow",
    'icon' => 'icon-mk-swipe-slideshow vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Swipe enabled slideshow.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "attach_images",
            "heading" => __("Add Images", "mk_framework"),
            "param_name" => "images",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Width", "mk_framework"),
            "param_name" => "image_width",
            "value" => "770",
            "min" => "100",
            "max" => "1380",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Height", "mk_framework"),
            "param_name" => "image_height",
            "value" => "350",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Slide Direction", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "direction",
            "value" => array(
                __("Horizontal", 'mk_framework') => "horizontal",
                __("Vertical", 'mk_framework') => "vertical"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Direction Nav", "mk_framework"),
            "param_name" => "direction_nav",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Fullwidth Slideshow", "mk_framework"),
    "base" => "mk_fullwidth_slideshow",
    'icon' => 'icon-mk-fullwidth-slideshow vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Fullwdith image slider.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "range",
            "heading" => __("Top & Bottom Padding", "mk_framework"),
            "param_name" => "padding",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "value" => "30",
            "type" => "range"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Top and Bottom Borders Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Box Background Color", "mk_framework"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Image", "mk_framework"),
            "param_name" => "bg_image",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Background Attachment", "mk_framework"),
            "param_name" => "attachment",
            "width" => 150,
            "value" => array(
                __('Scroll', "mk_framework") => "scroll",
                __('Fixed', "mk_framework") => "fixed"
            ),
            "description" => __("The background-attachment property sets whether a background image is fixed or scrolls with the rest of the page. <a href='http://www.w3schools.com/CSSref/pr_background-attachment.asp'>Read More</a>", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Background Position", "mk_framework"),
            "param_name" => "bg_position",
            "width" => 300,
            "value" => array(
                __('Left Top', "mk_framework") => "left top",
                __('Center Top', "mk_framework") => "center top",
                __('Right Top', "mk_framework") => "right top",
                __('Left Center', "mk_framework") => "left center",
                __('Center Center', "mk_framework") => "center center",
                __('Right Center', "mk_framework") => "right center",
                __('Left Bottom', "mk_framework") => "left bottom",
                __('Center Bottom', "mk_framework") => "center bottom",
                __('Right Bottom', "mk_framework") => "right bottom"
            ),
            "description" => __("First value defines horizontal position and second vertical positioning.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Enable 3D background", "mk_framework"),
            "param_name" => "enable_3d",
            "value" => "false"
        ),
        array(
            "type" => "range",
            "heading" => __("3D Speed Factor", "mk_framework"),
            "param_name" => "speed_factor",
            "min" => "-10",
            "max" => "10",
            "step" => "0.1",
            "unit" => 'factor',
            "value" => "0.3",
            "type" => "range"
        ),
        array(
            "type" => "attach_images",
            "heading" => __("Add Images", "mk_framework"),
            "param_name" => "images",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Animation Effect", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "effect",
            "value" => array(
                __("Fade", 'mk_framework') => "fade",
                __("Slide", 'mk_framework') => "slide"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pause on Hover", "mk_framework"),
            "param_name" => "pause_on_hover",
            "value" => "false",
            "description" => __("Pauses the slideshow when hovering over slider, then resumes when no longer hovering", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Smooth Height", "mk_framework"),
            "param_name" => "smooth_height",
            "value" => "true",
            "description" => __("Allows height of slider to animate smoothly in horizontal mode", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Direction Nav", "mk_framework"),
            "param_name" => "direction_nav",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Laptop Slideshow", "mk_framework"),
    "base" => "mk_laptop_slideshow",
    'icon' => 'icon-mk-laptop-slideshow vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Slider inside laptop frame', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "attach_images",
            "heading" => __("Add Images", "mk_framework"),
            "param_name" => "images",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Size", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "size",
            "value" => array(
                __("Full Width", 'mk_framework') => "full",
                __("One Half", 'mk_framework') => "one-half",
                __("One Third", 'mk_framework') => "one-third",
                __("One Fourth", 'mk_framework') => "one-fourth"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pause on Hover", "mk_framework"),
            "param_name" => "pause_on_hover",
            "value" => "false",
            "description" => __("Pauses the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework")
        ),
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("LCD Slideshow", "mk_framework"),
    "base" => "mk_lcd_slideshow",
    'icon' => 'icon-mk-lcd-slideshow vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Slider inside LCD frame', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "attach_images",
            "heading" => __("Add Images", "mk_framework"),
            "param_name" => "images",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pause on Hover", "mk_framework"),
            "param_name" => "pause_on_hover",
            "value" => "false",
            "description" => __("Pauses the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework")
        ),
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Flexslider", "mk_framework"),
    "base" => "mk_flexslider",
    'icon' => 'icon-mk-flex-slider vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Flexslider with captions.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Count", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'slides',
            "description" => __("How many slides you would like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific slides", "mk_framework"),
            "param_name" => "slides",
            "value" => '',
            "options" => $flexslider,
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved slides items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Height", "mk_framework"),
            "param_name" => "image_height",
            "value" => "350",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Width", "mk_framework"),
            "param_name" => "image_width",
            "value" => "770",
            "min" => "100",
            "max" => "1380",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Animation Effect", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "effect",
            "value" => array(
                __("Fade", 'mk_framework') => "fade",
                __("Slide", 'mk_framework') => "slide"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pause on Hover", "mk_framework"),
            "param_name" => "pause_on_hover",
            "value" => "false",
            "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Smooth Height", "mk_framework"),
            "param_name" => "smooth_height",
            "value" => "true",
            "description" => __("Allow height of the slider to animate smoothly in horizontal mode", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Direction Nav", "mk_framework"),
            "param_name" => "direction_nav",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Caption Background Color", "mk_framework"),
            "param_name" => "caption_bg_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Caption Text Color", "mk_framework"),
            "param_name" => "caption_color",
            "value" => "#fff",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Caption Opacity", "mk_framework"),
            "param_name" => "caption_bg_opacity",
            "value" => "0.6",
            "min" => "0.1",
            "max" => "1",
            "step" => "0.1",
            "unit" => 'alpha',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
if (is_plugin_active('LayerSlider/layerslider.php')) {
    global $wpdb;
    $ls            = $wpdb->get_results("
      SELECT id, name, date_c
      FROM " . $wpdb->prefix . "layerslider
      WHERE flag_hidden = '0' AND flag_deleted = '0'
      ORDER BY date_c ASC LIMIT 999
      ");
    $layer_sliders = array();
    if ($ls) {
        foreach ($ls as $slider) {
            $layer_sliders[$slider->name] = $slider->id;
        }
    } else {
        $layer_sliders["No sliders found"] = 0;
    }
    vc_map(array(
        "name" => __("Layerslider", "mk_framework"),
        "base" => "mk_layerslider",
        'icon' => 'icon-mk-layerslider vc_mk_element-icon',
        "category" => __('Slideshows', 'mk_framework'),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __("Select Slideshow", "mk_framework"),
                "param_name" => "id",
                "value" => $layer_sliders,
                "description" => __("", "mk_framework")
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "mk_framework"),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
            )
        )
    ));
}
if (is_plugin_active('revslider/revslider.php')) {
    global $wpdb;
    $rs         = $wpdb->get_results("
      SELECT id, title, alias
      FROM " . $wpdb->prefix . "revslider_sliders
      ORDER BY id ASC LIMIT 999
      ");
    $revsliders = array();
    if ($rs) {
        foreach ($rs as $slider) {
            $revsliders[$slider->title] = $slider->alias;
        }
    } else {
        $revsliders["No sliders found"] = 0;
    }
    vc_map(array(
        "name" => __("Revolution Slider", "mk_framework"),
        "base" => "mk_revslider",
        'icon' => 'icon-mk-image-slideshow vc_mk_element-icon',
        "category" => __('Slideshows', 'mk_framework'),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __("Select Slideshow", "mk_framework"),
                "param_name" => "id",
                "value" => $revsliders,
                "description" => __("", "mk_framework")
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "mk_framework"),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
            )
        )
    ));
}
vc_map(array(
    "name" => __("Edge Slider", "mk_framework"),
    "base" => "mk_edge_slider",
    'icon' => 'icon-mk-edge-slider vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Powerful Edge Slider.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "toggle",
            "heading" => __("First Element?", "mk_framework"),
            "param_name" => "first_el",
            "value" => "false",
            "description" => __("If you are not using this slideshow as first element in content then disable this option. This option is useful only when Transparent Header style is enabled in this page, having this option enabled will allow the header skin follow slide item's => header skin.", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Slideshow Background Color", "mk_framework"),
            "param_name" => "swiper_bg",
            "value" => "#000",
            "description" => __("Choose it for a color behind the slides. Useful with some animation types where background is revealed.", "mk_framework")
        ),

        array(
            "type" => "toggle",
            "heading" => __("Enable Parallax Background", "mk_framework"),
            "param_name" => "parallax",
            "value" => "false",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific slides", "mk_framework"),
            "param_name" => "slides",
            "value" => '',
            "options" => $edge_posts,
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved slides items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => __("Full Height?", "mk_framework"),
            "param_name" => "full_height",
            "value" => "true",
            "description" => __("If you do not want full screen height slideshow disable this option. If you disable this option set the height of slideshow using below option.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Height", "mk_framework"),
            "param_name" => "height",
            "value" => "700",
            "min" => "100",
            "max" => "2000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("This option only works when above option is disabled.", "mk_framework")
        ),        
        array(
            "heading" => __("Animation Effect", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "animation_effect",
            "value" => array(
                __("Slide", 'mk_framework') => "slide",
                __("Slide Vertical", 'mk_framework') => "vertical_slide",
                __("Zoom", 'mk_framework') => "zoom",
                __("Zoom Out", 'mk_framework') => "zoom_out",
                __("Horizontal Curtain", 'mk_framework') => "horizontal_curtain",
                __("Fade", 'mk_framework') => "fade",
                __("Perspective Flip", 'mk_framework') => "perspective_flip",
                __("Kenburned", 'mk_framework') => "kenburned"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Pause Time", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("How long each slide will show.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Direction Nav", "mk_framework"),
            "param_name" => "direction_nav",
            "width" => 300,
            "value" => array(
                __('Rounded Slide', "mk_framework") => "roundslide",
                __('Rounded', "mk_framework") => "round",
                __('Split', "mk_framework") => "slit",
                __('Thumbnail Flip', "mk_framework") => "thumbflip",
                __('-- No Navigation', "mk_framework") => "none"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Pagination", "mk_framework"),
            "param_name" => "pagination",
            "width" => 300,
            "value" => array(
                __('Stroke', "mk_framework") => "stroke",
                __('Small Dot With Stroke', "mk_framework") => "small_dot_stroke",
                __('-- No Pagination', "mk_framework") => "none"
            ),
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "toggle",
            "heading" => __("Scroll to Bottom Arrow", "mk_framework"),
            "param_name" => "skip_arrow",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),


        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));

vc_map(array(
    "name" => __("Edge One Pager", "mk_framework"),
    "base" => "mk_edge_one_pager",
    'icon' => 'icon-mk-edge-one-pager vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Converts Edge Slider to vertical scroll.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "multiselect",
            "heading" => __("Select specific slides", "mk_framework"),
            "param_name" => "slides",
            "value" => '',
            "options" => $edge_posts,
            "description" => __("", "mk_framework")
        ),

        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved slides items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Pagination", "mk_framework"),
            "param_name" => "pagination",
            "width" => 300,
            "value" => array(
                __('Stroke', "mk_framework") => "stroke",
                __('Small Dot With Stroke', "mk_framework") => "small_dot_stroke"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));

vc_map(array(
    "name" => __("Testimonials", "mk_framework"),
    "base" => "mk_testimonials",
    'icon' => 'icon-mk-testimonial-slideshow vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Shows Testimonials in multiple styles.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Style", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Avant garde", 'mk_framework') => "avantgarde",
                __("Boxed", 'mk_framework') => "boxed",
                __("Modern", 'mk_framework') => "modern",
                __("Simple Centered", 'mk_framework') => "simple"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Show as?", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "show_as",
            "value" => array(
                __("Slideshow", 'mk_framework') => "slideshow",
                __("Column Based", 'mk_framework') => "column"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("How many Columns", "mk_framework"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'columns',
            "description" => __("If Column based is selected from the option above, you will need to set in how many columns, testimonials will be showed up.", "mk_framework"),
            "dependency" => array(
                'element' => "show_as",
                'value' => array(
                    'column'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Skin", "mk_framework"),
            "param_name" => "skin",
            "value" => array(
                __('Dark', "mk_framework") => "dark",
                __('Light', "mk_framework") => "light"
            ),
            "description" => __("This option is only for 'Simple Centered' style and you can use it when you need to place this shortcode inside a page section with dark background.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple',
                    'avantgarde'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Count", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'testimonial',
            "description" => __("How many testimonial you would like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific testimonials", "mk_framework"),
            "param_name" => "testimonials",
            "value" => '',
            "options" => $testimonials,
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved client items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework"),
             "dependency" => array(
                'element' => "show_as",
                'value' => array(
                    'slideshow'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework"),
             "dependency" => array(
                'element' => "show_as",
                'value' => array(
                    'slideshow'
                )
            )
        ),
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));

vc_map(array(
    "name" => __("Image Box", "mk_framework"),
    "base" => "mk_imagebox",
    "content_element" => true,
    'icon' => 'icon-mk-content-box vc_mk_element-icon',
    "as_parent" => array('only' => 'mk_imagebox_item'),
    "category" => __('Slideshows', 'mk_framework'),
    'params' => array(
        array(
            "heading" => __("Show as?", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "show_as",
            "value" => array(
                __("Slideshow", 'mk_framework') => "slideshow",
                __("Column Based", 'mk_framework') => "column"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => __("Slideshow Navigation?", "mk_framework"),
            "param_name" => "scroll_nav",
            "value" => "",
            "description" => __("This option will give you the ability to turn on/off the slider next/previous navigation.", "mk_framework"),
            "dependency" => array(
                'element' => "show_as",
                'value' => array(
                    'slideshow'
                )
            ),
        ),
        array(
            "type" => "range",
            "heading" => __("Slides Per View", "mk_framework"),
            "param_name" => "per_view",
            "value" => "4",
            "min" => "1",
            "max" => "10",
            "step" => "1",
            "unit" => 'slides',
            "description" => __("How many Boxes per view?", "mk_framework"),
            "dependency" => array(
                'element' => "show_as",
                'value' => array(
                    'slideshow'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("How many Columns?", "mk_framework"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "6",
            "step" => "1",
            "unit" => 'columns',
            "description" => __("If Column based is selected from the option above, you will need to set in how many columns, image boxes will be showed up.", "mk_framework"),
            "dependency" => array(
                'element' => "show_as",
                'value' => array(
                    'column'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Item Padding", "mk_framework"),
            "param_name" => "padding",
            "value" => "20",
            "min" => "5",
            "max" => "40",
            "step" => "1",
            "unit" => 'px',
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "5000",
            "min" => "0",
            "max" => "50000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("If set to zero the autoplay will be disabled, any number above zeo will define the delay between each slide transition.", "mk_framework"),
            'type' => 'range'
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    ),
    "js_view" => 'VcColumnView'
));

vc_map(array(
    "name" => __("Imagebox Item", "mk_framework"),
    "base" => "mk_imagebox_item",
    "as_child" => array('only' => 'mk_imagebox'),
    'icon' => 'icon-mk-content-box vc_mk_element-icon',
    "content_element" => true,
    "category" => __('Slideshows', 'mk_framework'),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => __("Icon Type", "mk_framework"),
            "param_name" => "icon_type",
            "value" => array(
                __('Image', "mk_framework") => "image",
                __('Video', "mk_framework") => "video"
            ),
            "description" => __("Choose Box Type.", "mk_framework")
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Video (.MP4)", "mk_framework"),
            "param_name" => "mp4",
            "value" => "",
            "description" => __("Upload your video with .MP4 extension. (Compatibility for Safari and IE9)", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Video (.WebM)", "mk_framework"),
            "param_name" => "webm",
            "value" => "",
            "description" => __("Upload your video with .WebM extension. (Compatibility for Firefox4, Opera, and Chrome)", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Video (.OGV)", "mk_framework"),
            "param_name" => "ogv",
            "value" => "",
            "description" => __("Upload preview image for mobile devices", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Preview Image", "mk_framework"),
            "param_name" => "preview_image",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Item Image", "mk_framework"),
            "param_name" => "item_image",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'image'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Add Padding to Image?", "mk_framework"),
            "param_name" => "image_padding",
            "value" => "true",
            "description" => __("", "mk_framework"),
            // "dependency" => array(
            //     'element' => "icon_type",
            //     'value' => array(
            //         'image'
            //     )
            // )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "mk_framework"),
            "param_name" => "background_color",
            "value" => "#eaeaea",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Item Title", "mk_framework"),
            "param_name" => "item_title",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "type" => "range",
            "heading" => __("Title Font Size", "mk_framework"),
            "param_name" => "title_text_size",
            "value" => "16",
            "min" => "10",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Title Font Weight", "mk_framework"),
            "param_name" => "title_font_weight",
            "value" => array(
                 __('Default', "mk_framework") => "inherit",
                __('Light', "mk_framework") => "300",
                __('Normal', "mk_framework") => "normal",
                __('Bold', "mk_framework") => "bold",
                __('Bolder', "mk_framework") => "bolder",
                __('Extra Bold', "mk_framework") => "900",
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Title Color", "mk_framework"),
            "param_name" => "title_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textarea",
            "heading" => __("Description", "mk_framework"),
            "param_name" => "content",
            "holder" => 'div',
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Description Color", "mk_framework"),
            "param_name" => "text_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Text", "mk_framework"),
            "param_name" => "btn_text",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Url", "mk_framework"),
            "param_name" => "btn_url",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Background Color", "mk_framework"),
            "param_name" => "btn_background_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Text Color", "mk_framework"),
            "param_name" => "btn_text_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Hover Background Color", "mk_framework"),
            "param_name" => "btn_hover_background_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));

vc_map(array(
    "name" => __("Banner Builder", "mk_framework"),
    "base" => "mk_banner_builder",
    'icon' => '',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'Banner Builder.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "multiselect",
            "heading" => __("Select specific slides", "mk_framework"),
            "param_name" => "slides",
            "value" => '',
            "options" => $banner_builder,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Min Height", "mk_framework"),
            "param_name" => "height",
            "value" => "200",
            "min" => "50",
            "max" => "1200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("You can adjust a min height to avoid height changes between your slide items which may distract the viewer.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Top & Bottom Padding", "mk_framework"),
            "param_name" => "padding",
            "value" => "30",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("This option will help you to give your own custom vertical spacing.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "mk_framework"),
            "param_name" => "animation_style",
            "width" => 300,
            "value" => array(
                __('Fade', "mk_framework") => "fade",
                __('Slide', "mk_framework") => "slide"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved slides items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),

        array(
            "type" => "toggle",
            "heading" => __("Autoplay", "mk_framework"),
            "param_name" => "autoplay",
            "value" => "true",
            "description" => __("Enable this option if you would like slider to autoplay.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "value" => "5000",
            "min" => "2000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("Time elapsed between each autoplay sliding case.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Animation Duration", "mk_framework"),
            "param_name" => "animation_duration",
            "value" => "600",
            "min" => "200",
            "max" => "10000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("Speed of animation.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));

vc_map(array(
    "name" => __("iCarousel", "mk_framework"),
    "base" => "mk_icarousel",
    'icon' => '',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( 'iCarousel.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "multiselect",
            "heading" => __("Select specific slides", "mk_framework"),
            "param_name" => "slides",
            "value" => '',
            "options" => $icarousel,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Number of Slides", "mk_framework"),
            "param_name" => "slide_count",
            "value" => "3",
            "min" => "3",
            "max" => "30",
            "step" => "1",
            "unit" => 'Slides',
            "description" => __("Set how many Slides to be shown on your slider. Please note that slide items number should be odd, therefore we made this option to take only odd numbers. you should have minimum of 3 slide items.", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved slides items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => __("Autoplay", "mk_framework"),
            "param_name" => "autoplay",
            "value" => "true",
            "description" => __("Enable this option if you would like slider to autoplay.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Make 3D", "mk_framework"),
            "param_name" => "make_3d",
            "value" => "true",
            "description" => __("To Enable or Disable 3D effect.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Perspective", "mk_framework"),
            "param_name" => "perspective",
            "value" => "35",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The 3D perspective option. (Min 0 & Max 100)", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pause on Hover", "mk_framework"),
            "param_name" => "pause_on_hover",
            "value" => "true",
            "description" => __("If true & the slideshow is active, the slideshow will pause on hover.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Slider Easing", "mk_framework"),
            "param_name" => "slider_easing",
            "width" => 300,
            "value" => array(
                __('Linear', "mk_framework") => "linear",
                __('Swing', "mk_framework") => "swing",
                __('easeInQuad', "mk_framework") => "slide",
                __('easeOutQuad', "mk_framework") => "slide",
                __('easeInCubic', "mk_framework") => "slide",
                __('easeOutCubic', "mk_framework") => "slide",
                __('easeInOutCubic', "mk_framework") => "slide",
                __('easeInQuart', "mk_framework") => "slide",
                __('easeOutQuart', "mk_framework") => "slide",
                __('easeInOutQuart', "mk_framework") => "slide",
                __('easeInQuint', "mk_framework") => "slide",
                __('easeOutQuint', "mk_framework") => "slide",
                __('easeInOutQuint', "mk_framework") => "slide",
                __('easeInSine', "mk_framework") => "slide",
                __('easeOutSine', "mk_framework") => "slide",
                __('easeInOutSine', "mk_framework") => "slide",
                __('easeInExpo', "mk_framework") => "slide",
                __('easeOutExpo', "mk_framework") => "slide",
                __('easeInOutExpo', "mk_framework") => "slide",
                __('easeInCirc', "mk_framework") => "slide",
                __('easeOutCirc', "mk_framework") => "slide",
                __('easeInOutCirc', "mk_framework") => "slide",
                __('easeInElastic', "mk_framework") => "slide",
                __('easeOutElastic', "mk_framework") => "slide",
                __('easeInOutElastic', "mk_framework") => "slide",
                __('easeInBack', "mk_framework") => "slide",
                __('easeOutBack', "mk_framework") => "slide",
                __('easeInBounce', "mk_framework") => "slide",
                __('easeOutBounce', "mk_framework") => "slide",
                __('easeInOutBounce', "mk_framework") => "slide",
                __('easeInOutExpo', "mk_framework") => "slide",
                __('easeInOutExpo', "mk_framework") => "slide"
            ),
            "description" => __("Set the easing of the sliding animation.", "mk_framework")
        ),

        array(
            "type" => "range",
            "heading" => __("Animation Speed", "mk_framework"),
            "param_name" => "animation_speed",
            "value" => "500",
            "min" => "100",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("Slide transition speed.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Pause Time", "mk_framework"),
            "param_name" => "pause_time",
            "value" => "5000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("How long each slide will show.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Direction Navigation", "mk_framework"),
            "param_name" => "direction_nav",
            "value" => "true",
            "description" => __("Next & Previous navigation.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));


vc_map(array(
    "name" => __("Theatre Slider", "mk_framework"),
    "base" => "mk_theatre_slider",
    'icon' => 'vc_mk_element-icon',
    "category" => __('Slideshows', 'mk_framework'),
    'description' => __( '', 'mk_framework' ),
    "params" => array(
        array(
            "heading" => __("Background Style", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "background_style",
            "value" => array(
                __("Desktop", 'mk_framework') => "desktop_style",
                __("Laptop", 'mk_framework') => "laptop_style"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Slider Max Width", "mk_framework"),
            "param_name" => "max_width",
            "value" => "900",
            "min" => "320",
            "max" => "1200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Video Host", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "host",
            "value" => array(
                __("Self Hosted", 'mk_framework') => "self_hosted",
                __("Social Hosted", 'mk_framework') => "social_hosted"
            ),
            "type" => "dropdown"
        ), 
        array(
            "type" => "upload",
            "heading" => __("MP4 Format", "mk_framework"),
            "param_name" => "mp4",
            "value" => "",
            "description" => __("Compatibility for Safari, IE9", "mk_framework"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("WebM Format", "mk_framework"),
            "param_name" => "webm",
            "value" => "",
            "description" => __("Compatibility for Firefox4, Opera, and Chrome", "mk_framework"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("OGV Format", "mk_framework"),
            "param_name" => "ogv",
            "value" => "",
            "description" => __("Compatibility for older Firefox and Opera versions", "mk_framework"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Video Preview image (and fallback image)", "mk_framework"),
            "param_name" => "poster_image",
            "value" => "",
            "description" => __("This Image will shown until video load. in case of video is not supported or did not load the image will remain as fallback.", "mk_framework"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "heading" => __("Stream Host Website", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "stream_host_website",
            "value" => array(
                __("Youtube", 'mk_framework') => "youtube",
                __("Vimeo", 'mk_framework') => "vimeo"
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'social_hosted'
                )
            ),
        ),
        array(
            "type" => "toggle",
            "heading" => __("Show Social Video Controls", "mk_framework"),
            "param_name" => "video_controls",
            "value" => "true",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "stream_host_website",
                'value' => array(
                    'youtube'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Video ID", "mk_framework"),
            "param_name" => "stream_video_id",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'social_hosted'
                )
            )
        ),
        array(
            "heading" => __("Slider Align", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "align",
            "value" => array(
                __("Left", 'mk_framework') => "left",
                __("Center", 'mk_framework') => "center",
                __("Right", 'mk_framework') => "right"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "25",
            "min" => "10",
            "max" => "250",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
