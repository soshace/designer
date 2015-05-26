<?php
vc_map(array(
    "name" => __("Row", "mk_framework"),
    'base' => 'vc_row',
    'is_container' => true,
    'icon' => 'icon-mk-row vc_mk_element-icon',
    'show_settings_on_create' => false,
    'category' => __( 'Content', 'mk_framework' ),
    'description' => __( 'Place content elements inside the row', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "toggle",
            "heading" => __("Fullwidth Row", "mk_framework"),
            "param_name" => "fullwidth",
            "value" => "false",
            "description" => __("When enabled, this row will no longer follow the main grid width and will stretch 100% to screen width.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Attached Colums", "mk_framework"),
            "param_name" => "attached",
            "value" => "false",
            "description" => __("When enabled, this option attachs child columns to each other. In other words columns inside this row will be stuck to each other.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Column Paddings", "mk_framework"),
            "param_name" => "padding",
            "value" => "0",
            "min" => "0",
            "max" => "5",
            "step" => "1",
            "unit" => '%',
            "description" => __("This option creates paading space inside columns. This option will work when 'Attached Colums' option is enabled. Note that padding unit is by percent and will be applied to all directions.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Row ID", "mk_framework"),
            "param_name" => "id",
            "description" => __("This option comes handy when you are creating One page scroll website and here you can set ID which you used in your navigation anchor tag.", "mk_framework")
        ),
        $add_device_visibility,
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        ),
    ),
    "js_view" => 'VcRowView'
));
vc_map(array(
    "name" => __("Row", "mk_framework"),
    'base' => 'vc_row_inner',
    'content_element' => false,
    'is_container' => true,
    'icon' => 'icon-wpb-row',
    'weight' => 1000,
    'show_settings_on_create' => false,
    'description' => __( 'Place content elements inside the row', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "toggle",
            "heading" => __("Attached Colums", "mk_framework"),
            "param_name" => "attached",
            "value" => "false",
            "description" => __("When enabled, this option attachs child columns to each other. In other words columns inside this row will be stuck to each other.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Column Paddings", "mk_framework"),
            "param_name" => "padding",
            "value" => "0",
            "min" => "0",
            "max" => "5",
            "step" => "1",
            "unit" => '%',
            "description" => __("This option creates paading space inside columns. This option will work when 'Attached Colums' option is enabled. Note that padding unit is by percent and will be applied to all directions.", "mk_framework")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    ),
    "js_view" => 'VcRowView'
));
$column_width_list = array(
    __('1 column - 1/12', 'mk_framework') => '1/12',
    __('2 columns - 1/6', 'mk_framework') => '1/6',
    __('3 columns - 1/4', 'mk_framework') => '1/4',
    __('4 columns - 1/3', 'mk_framework') => '1/3',
    __('5 columns - 5/12', 'mk_framework') => '5/12',
    __('6 columns - 1/2', 'mk_framework') => '1/2',
    __('7 columns - 7/12', 'mk_framework') => '7/12',
    __('8 columns - 2/3', 'mk_framework') => '2/3',
    __('9 columns - 3/4', 'mk_framework') => '3/4',
    __('10 columns - 5/6', 'mk_framework') => '5/6',
    __('11 columns - 11/12', 'mk_framework') => '11/12',
    __('12 columns - 1/1', 'mk_framework') => '1/1'
);
vc_map(array(
    "name" => __("Column", "mk_framework"),
    "base" => "vc_column",
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "colorpicker",
            "heading" => __("Column Border Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("You can optionally add border color to columns.", "mk_framework")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        ),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'mk_framework' ),
            'param_name' => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mk_framework' ),
            'group' => __( 'Design options', 'mk_framework' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Width', 'mk_framework' ),
            'param_name' => 'width',
            'value' => $column_width_list,
            'group' => __( 'Width & Responsiveness', 'mk_framework' ),
            'description' => __( 'Select column width.', 'mk_framework' ),
            'std' => '1/1'
        ),
        array(
            'type' => 'column_offset',
            'heading' => __('Responsiveness', 'mk_framework'),
            'param_name' => 'offset',
            'group' => __( 'Width & Responsiveness', 'mk_framework' ),
            'description' => __('Adjust column for different screen sizes. Control width, offset and visibility settings.', 'mk_framework')
        )
    ),
    "js_view" => 'VcColumnView'
));

vc_map( array(
    "name" => __( "Column", 'mk_framework' ),
    "base" => "vc_column_inner",
    "class" => "",
    "icon" => "",
    "wrapper_class" => "",
    "controls" => "full",
    "allowed_container_element" => false,
    "content_element" => false,
    "is_container" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __( "Extra class name", 'mk_framework' ),
            "param_name" => "el_class",
            "value" => "",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'mk_framework' )
        ),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'mk_framework' ),
            'param_name' => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mk_framework' ),
            'group' => __( 'Design options', 'mk_framework' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Width', 'mk_framework' ),
            'param_name' => 'width',
            'value' => $column_width_list,
            'group' => __( 'Width & Responsiveness', 'mk_framework' ),
            'description' => __( 'Select column width.', 'mk_framework' ),
            'std' => '1/1'
        ),
    ),
    "js_view" => 'VcColumnView'
) );

vc_map(array(
    "name" => __("Page Section", "mk_framework"),
    "base" => "mk_page_section",
    "category" => __('General', 'mk_framework'),
    "as_parent" => array('only' => 'vc_row',),
    'icon' => 'icon-mk-page-section vc_mk_element-icon',
    "content_element" => true,
    "is_container" => true,
    "show_settings_on_create" => true,
    'description' => __( 'Customisable full width page section.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Section Layout", "mk_framework"),
            "param_name" => "layout_structure",
            "width" => 300,
            "value" => array(
                __('Full Layout', "mk_framework") => "full",
                __('One Half Layout (Background Image on Left & Content in Right)', "mk_framework") => "half_left",
                __('One Half Layout (Background Image on Right & Content in Left)', "mk_framework") => "half_right"
            ),
            "description" => __("If you choose One Half layout, uploaded background image will be displayed in one half of the screen width. The shortcodes placed in this section will occupy the rest of the half (not screen wide, rather it will follow half of the main grid width).", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Top and Bottom Border Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "mk_framework"),
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
            "heading" => __("Background Pattern", 'mk_framework'),
            "description" => __("You can optionally select a pattern for the background. This option works only when background image field is empty (above option).", 'mk_framework'),
            "param_name" => "predefined_bg",
            "border" => 'true',
            "value" => array(
                'pattern/no-image.png' => "",
                'pattern/1.png' => "1",
                'pattern/2.png' => "2",
                'pattern/3.png' => "3",
                'pattern/4.png' => "4",
                'pattern/5.png' => "5",
                'pattern/6.png' => "6",
                'pattern/7.png' => "7",
                'pattern/8.png' => "8",
                'pattern/9.png' => "9",
                'pattern/10.png' => "10",
                'pattern/11.png' => "11",
                'pattern/12.png' => "12",
                'pattern/13.png' => "13",
                'pattern/14.png' => "14",
                'pattern/15.png' => "15",
                'pattern/16.png' => "16",
                'pattern/17.png' => "17",
                'pattern/18.png' => "18",
                'pattern/19.png' => "19",
                'pattern/20.png' => "20",
                'pattern/21.png' => "21",
                'pattern/22.png' => "22",
                'pattern/23.png' => "23",
                'pattern/24.png' => "24",
                'pattern/25.png' => "25",
                'pattern/26.png' => "26",
                'pattern/27.png' => "27",
                'pattern/28.png' => "28",
                'pattern/29.png' => "29",
                'pattern/30.png' => "30",
                'pattern/31.png' => "31",
                'pattern/32.png' => "32",
                'pattern/33.png' => "33"
            ),
            "type" => "visual_selector"
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
            "description" => __("This option sets whether the background image is fixed or scrolls with the rest of the page. <a href='http://www.w3schools.com/CSSref/pr_background-attachment.asp'>Read More</a>", "mk_framework"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
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
            "description" => __("First value defines horizontal position and second vertical position.", "mk_framework"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Background Repeat", "mk_framework"),
            "param_name" => "bg_repeat",
            "width" => 300,
            "value" => array(
                __('Repeat', "mk_framework") => "repeat",
                __('No Repeat', "mk_framework") => "no-repeat",
                __('Horizontal Repeat', "mk_framework") => "repeat-x",
                __('Vertical Repeat', "mk_framework") => "repeat-y"
            ),
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __('Cover whole background', 'mk_framework'),
            "description" => __("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area.", "mk_framework"),
            "param_name" => "bg_stretch",
            "value" => "false"
        ),
        array(
            "type" => "toggle",
            "heading" => __("Enable Parallax Background", "mk_framework"),
            "param_name" => "enable_3d",
            "value" => "false",
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
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
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Background Video", "mk_framework"),
            "param_name" => "bg_video",
            "width" => 300,
            "value" => array(
                __('No', "mk_framework") => "no",
                __('Yes', "mk_framework") => "yes"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Video Source", "mk_framework"),
            "param_name" => "video_source",
            "width" => 300,
            "value" => array(
                __('Self Hosted', "mk_framework") => "self",
                __('Social Hosted', "mk_framework") => "social"
            ),
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "bg_video",
                'value' => array(
                    'yes'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Video (.MP4)", "mk_framework"),
            "param_name" => "mp4",
            "value" => "",
            "description" => __("Upload your video with .MP4 extension. (Compatibility for Safari and IE9)", "mk_framework"),
            "dependency" => array(
                'element' => "video_source",
                'value' => array(
                    'self'
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
                'element' => "video_source",
                'value' => array(
                    'self'
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
                'element' => "video_source",
                'value' => array(
                    'self'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Video Preview image (fallback image)", "mk_framework"),
            "param_name" => "poster_image",
            "value" => "",
            "description" => __("This Image will be showed up until video is loaded. If video is not supported or could not load on user's machine, the image will stay in background.", "mk_framework"),
            "dependency" => array(
                'element' => "video_source",
                'value' => array(
                    'self'
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
                'element' => "video_source",
                'value' => array(
                    'social'
                )
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Video ID", "mk_framework"),
            "param_name" => "stream_video_id",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "video_source",
                'value' => array(
                    'social'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Overlay Mask Pattern?", "mk_framework"),
            "param_name" => "video_mask",
            "description" => __("Creates an overlay repeated pattern on your video background.", "mk_framework"),
            "value" => "false",
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),


        array(
            "type" => "dropdown",
            "heading" => __("Gradient Overlay Orientation", "mk_framework"),
            "param_name" => "bg_gradient",
            "width" => 150,
            "value" => array(
                __('-- No Gradient ↓', "mk_framework") => "false",
                __('Vertical ', "mk_framework") => "vertical",
                __('Horizontal →', "mk_framework") => "horizontal",
                __('Diagonal ↘', "mk_framework") => "left_top",
                __('Diagonal ↗', "mk_framework") => "left_bottom",
                __('Radial ○', "mk_framework") => "radial",
            ),
            "description" => __("Choose the orientation of gradient overlay", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Overlay Color #1", "mk_framework"),
            "param_name" => "video_color_mask",
            "value" => "",
            "description" => __("The starting color of gradient overlay.", "mk_framework"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Overlay Color #2", "mk_framework"),
            "param_name" => "gr_end",
            "value" => "#1e73be",
            "description" => __("The ending color of gradient fill. Leave this blank if you do not want gradient overlay.", "mk_framework")
        ),

        array(
            "type" => "range",
            "heading" => __("Overlay Color Mask Opacity", "mk_framework"),
            "param_name" => "video_opacity",
            "value" => "0.6",
            "min" => "0",
            "max" => "1",
            "step" => "0.1",
            "unit" => 'alpha',
            "description" => __("The opacity of overlay layer which you set above. ", "mk_framework"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Inner Shadow", "mk_framework"),
            "description" => __("When enabled, a light inner shadow appears inside the page section (below top border).", 'mk_framework'),
            "param_name" => "top_shadow",
            "value" => "false"
        ),
        array(
            "heading" => __("Select Section Layout", 'mk_framework'),
            "description" => __("If you choose left or right sidebar layout you can then assign a side bar in the next option or create a new custom sidebar in Theme Options", 'mk_framework'),
            "param_name" => "section_layout",
            "border" => 'false',
            "value" => array(
                "page-layout-full.png" => 'full',
                "page-layout-left.png" => 'left',
                "page-layout-right.png" => 'right'
            ),
            "type" => "visual_selector",
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            'type' => 'widgetised_sidebars',
            'heading' => __( 'Sidebar', 'mk_framework' ),
            'param_name' => 'sidebar',
            'description' => __( 'Please select the sidebar you would like to show in this page section.', 'mk_framework' ),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Page Section Minimum Height", "mk_framework"),
            "param_name" => "min_height",
            "value" => "100",
            "min" => "0",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Full Width?", "mk_framework"),
            "description" => __("If you enable this option page section content will be screen width full width.", 'mk_framework'),
            "param_name" => "full_width",
            "value" => "false"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Full Screen Height?", "mk_framework"),
            "param_name" => "full_height",
            "value" => array(
                __('No', "mk_framework") => "false",
                __('Yes', "mk_framework") => "true"
            ),
            "description" => __("Using this option you can make this page section's height to cover the whole visible screen height (Not document height). Please note that if the inner content is larger than the window height, this feature will be disabled. Full height is browser resize sensitive and completely responsive.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Page Section Intro Effect", "mk_framework"),
            "param_name" => "intro_effect",
            "value" => array(
                __('None', "mk_framework") => "false",
                __('Shuffle', "mk_framework") => "shuffle",
                __('Zoom Out', "mk_framework") => "zoom_out",
                __('Fade In', "mk_framework") => "fade"
            ),
            "description" => __("Note that this page section must be the first element in the page with full height enabled above.", "mk_framework"),
            "dependency" => array(
                'element' => "full_height",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Top", "mk_framework"),
            "param_name" => "padding_top",
            "value" => "10",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The space between the content and top border of page section", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Bottom", "mk_framework"),
            "param_name" => "padding_bottom",
            "value" => "10",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The space between the content and bottom border of page section", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "0",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The space between the bottom border of page section and the next shortcode", "mk_framework")
        ),


        array(
            "type" => "dropdown",
            "heading" => __("Scroll to Bottom Arrow", "mk_framework"),
            "param_name" => "skip_arrow",
            "value" => array(
                __('No', "mk_framework") => "false",
                __('Yes', "mk_framework") => "true"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Scroll to Bottom Arrow", "mk_framework"),
            "param_name" => "skip_arrow_skin",
            "value" => array(
                __('Light', "mk_framework") => "light",
                __('Dark', "mk_framework") => "dark"
            ),
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "skip_arrow",
                'value' => array(
                    'true'
                )
            )
        ),
        
        array(
            "type" => "textfield",
            "heading" => __("Section ID", "mk_framework"),
            "param_name" => "section_id",
            "value" => "",
            "description" => __("Give your page section a unique ID. please note that this ID value should be used only once in a page.", "mk_framework")
        ),
        $add_device_visibility,
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Remove space before this section. <span style='color:red'>Note : Deprecated! Use Stick Template in Meta Options.</span>", "mk_framework"),
            "param_name" => "first_page",
            "description" => __("If and only if this shortcode is the First element on current page, enable this option to remove extra space between page header and this section otherwise any content before this section will be hidden.", "mk_framework"),
            "value" => "false"
        ),
        array(
            "type" => "toggle",
            "heading" => __("Remove Space after this section. <span style='color:red'>Note : Deprecated! Use Stick Template in Meta Options.</span>", "mk_framework"),
            "param_name" => "last_page",
            "description" => __("Removes extra space after this section. This option works only when this shortcode is last one in page or there is an other page section after this shortcode.", "mk_framework"),
            "value" => "false"
        ),
    ),
    "js_view" => 'VcRowView'
));
vc_map(array(
    "name" => __("Text block", "mk_framework"),
    "base" => "vc_column_text",
     'icon' => 'icon-mk-text-block vc_mk_element-icon',
     'wrapper_class' => 'clearfix',
     'category' => __( 'Content', 'mk_framework' ),
     'description' => __( 'A block of text with WYSIWYG editor', 'mk_framework' ),
        "params" => array(
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Text", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("Enter your content.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("You can optionally have global style title for this text block or leave this blank if you create your own title. Moreover you can disable this heading title's pattern divider using below option.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Title Pattern?", "mk_framework"),
            "param_name" => "disable_pattern",
            "value" => "true",
            "description" => __("If you want to remove the title pattern, disable this option.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Text Align", "mk_framework"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                __('Left', "mk_framework") => "left",
                __('Right', "mk_framework") => "right",
                __('Center', "mk_framework") => "center"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "0",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        ),
    )
));

vc_map(array(
    "name" => __("Slideshow Box", "mk_framework"),
    "base" => "mk_slideshow_box",
    "as_parent" => array('except' => 'mk_page_section'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "description" => __("Slideshow Box For your contents.","mk_framework"),
    'icon' => 'icon-mk-custom-box vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    "params" => array(
        array(
            "type" => "attach_images",
            "heading" => __("Add Images", "mk_framework"),
            "param_name" => "images",
            "value" => "",
            "description" => __("Add images to your background slideshow", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Images Position", "mk_framework"),
            "param_name" => "img_position",
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
            "type" => "range",
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "slideshow_speed",
            "min" => "1000",
            "max" => "10000",
            "step" => "1",
            "unit" => 'ms',
            "value" => "3000"
        ),
        array(
            "type" => "range",
            "heading" => __("Transition Speed", "mk_framework"),
            "param_name" => "transition_speed",
            "min" => "100",
            "max" => "5000",
            "step" => "1",
            "unit" => 'ms',
            "value" => "1000"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Color Overlay", "mk_framework"),
            "param_name" => "overlay",
            "value" => "",
            "description" => __("The overlay layer Color. You will need to change the alpha using this color picker to give an opacity to the color you choose.", "mk_framework"),
        ),
        array(
            "type" => "toggle",
            "heading" => __("Overlay Mask Pattern?", "mk_framework"),
            "param_name" => "slideshow_mask",
            "description" => __("Creates an overlay repeated pattern on your slideshow.", "mk_framework"),
            "value" => "false"
        ),
        array(
            "type" => "range",
            "heading" => __("Section Min Height", "mk_framework"),
            "param_name" => "section_height",
            "value" => "400",
            "min" => "0",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Full Screen Height?", "mk_framework"),
            "param_name" => "full_height",
            "value" => array(
                __('No', "mk_framework") => "false",
                __('Yes', "mk_framework") => "true"
            ),
            "description" => __("Using this option you can make this slideshow box's height to cover the whole visible screen height (Not document height). Please note that if the inner content is larger than the window height, this feature will be disabled. Full height is browser resize sensitive and completely responsive.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Full Screen Width Content?", "mk_framework"),
            "param_name" => "full_width_cnt",
            "value" => array(
                __('No', "mk_framework") => "false",
                __('Yes', "mk_framework") => "true"
            ),
            "description" => __("If you enable this option you're shortcodes within Slideshow Box will become full width", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Top", "mk_framework"),
            "param_name" => "padding_top",
            "value" => "10",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The space between the content and top border of slideshow content section", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Bottom", "mk_framework"),
            "param_name" => "padding_bottom",
            "value" => "10",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The space between the content and bottom border of slideshow content section", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        ),
    ),
    "js_view" => 'VcColumnView'
));

vc_map(array(
    "name" => __("Custom Box", "mk_framework"),
    "base" => "mk_custom_box",
    "as_parent" => array('except' => 'vc_row,mk_page_section'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "description" => __("Custom Box For your contents.","mk_framework"),
    'icon' => 'icon-mk-custom-box vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    "params" => array(
        array(
            "type" => "colorpicker",
            "heading" => __("Border Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Border Width", "mk_framework"),
            "param_name" => "border_width",
            "value" => "1",
            "min" => "1",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "mk_framework"),
            "param_name" => "bg_color",
            "value" => "#f6f6f6",
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
            "type" => "dropdown",
            "heading" => __("Background Repeat", "mk_framework"),
            "param_name" => "bg_repeat",
            "width" => 300,
            "value" => array(
                __('Repeat', "mk_framework") => "repeat",
                __('No Repeat', "mk_framework") => "no-repeat",
                __('Horizontally repeat', "mk_framework") => "repeat-x",
                __('Vertically Repeat', "mk_framework") => "repeat-y"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __('Cover whole background', 'mk_framework'),
            "description" => __("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area.", "mk_framework"),
            "param_name" => "bg_stretch",
            "value" => "false"
        ),
        array(
            "heading" => __("Background Pattern", 'mk_framework'),
            "description" => __("You can optionally select a pattern for this section background. This option only works when background image field is empty.", 'mk_framework'),
            "param_name" => "predefined_bg",
            "border" => 'true',
            "value" => array(
                'pattern/no-image.png' => "",
                'pattern/1.png' => "1",
                'pattern/2.png' => "2",
                'pattern/3.png' => "3",
                'pattern/4.png' => "4",
                'pattern/5.png' => "5",
                'pattern/6.png' => "6",
                'pattern/7.png' => "7",
                'pattern/8.png' => "8",
                'pattern/9.png' => "9",
                'pattern/10.png' => "10",
                'pattern/11.png' => "11",
                'pattern/12.png' => "12",
                'pattern/13.png' => "13",
                'pattern/14.png' => "14",
                'pattern/15.png' => "15",
                'pattern/16.png' => "16",
                'pattern/17.png' => "17",
                'pattern/18.png' => "18",
                'pattern/19.png' => "19",
                'pattern/20.png' => "20",
                'pattern/21.png' => "21",
                'pattern/22.png' => "22",
                'pattern/23.png' => "23",
                'pattern/24.png' => "24",
                'pattern/25.png' => "25",
                'pattern/26.png' => "26",
                'pattern/27.png' => "27",
                'pattern/28.png' => "28",
                'pattern/29.png' => "29",
                'pattern/30.png' => "30",
                'pattern/31.png' => "31",
                'pattern/32.png' => "32",
                'pattern/33.png' => "33"
            ),
            "type" => "visual_selector"
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Top and Bottom", "mk_framework"),
            "param_name" => "padding_vertical",
            "value" => "30",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Left and Right", "mk_framework"),
            "param_name" => "padding_horizental",
            "value" => "20",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "10",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Section Min Height", "mk_framework"),
            "param_name" => "min_height",
            "value" => "100",
            "min" => "0",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        $add_device_visibility,
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    ),
    "js_view" => 'VcColumnView'
));

vc_map(array(
    "name" => __("Page Title Box", "mk_framework"),
    "base" => "mk_page_title_box",
    'icon' => 'icon-mk-animated-columns vc_mk_element-icon',
    'description' => __( 'Page title area with effects.', 'mk_framework' ),
    "category" => __('General', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Enter Page Title", "mk_framework"),
            "param_name" => "page_title",
            "value" => "",
            "description" => __("Enter the title of your page and adjust font settings below", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Enter Page Subtitle", "mk_framework"),
            "param_name" => "page_subtitle",
            "value" => "",
            "description" => __("Enter the subtitle of your page and adjust font settings below", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Section Height", "mk_framework"),
            "param_name" => "section_height",
            "value" => "400",
            "min" => "0",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Background Type", "mk_framework"),
            "param_name" =>"bg_type",
            "value" => array(
                __('Image', "mk_framework") => "image",
                __('Video', "mk_framework") => "video",
                __('Color', "mk_framework") => "color"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Video (.MP4)", "mk_framework"),
            "param_name" => "mp4",
            "value" => "",
            "description" => __("Upload your video with .MP4 extension. (Compatibility for Safari and IE9)", "mk_framework"),
            "dependency" => array(
                'element' => "bg_type",
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
                'element' => "bg_type",
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
            "description" => __("Upload your video with .OGV extension. (Compatibility for Firefox4, Opera, and Chrome)", "mk_framework"),
            "dependency" => array(
                'element' => "bg_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Video Preview Image", "mk_framework"),
            "param_name" => "video_preview",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "bg_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => __("Background Image", "mk_framework"),
            "param_name" => "bg_image",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "bg_type",
                'value' => array(
                    'image'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background color", "mk_framework"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => __("", "mk_framework"),            
            "dependency" => array(
                'element' => "bg_type",
                'value' => array(
                    'color'
                )
            )
        ),
        // array(
        //     "type" => "upload",
        //     "heading" => __("Background Image", "mk_framework"),
        //     "param_name" => "bg_image",
        //     "value" => "",
        //     "description" => __("", "mk_framework")
        // ),
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
            "description" => __("First value defines horizontal position and second vertical position.", "mk_framework"),
            "dependency" => array(
                'element' => "bg_type",
                'value' => array(
                    'image'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __('Cover whole background', 'mk_framework'),
            "description" => __("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area.", "mk_framework"),
            "param_name" => "bg_stretch",
            "value" => "false",            
            "dependency" => array(
                'element' => "bg_type",
                'value' => array(
                    'image'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Color Overlay", "mk_framework"),
            "param_name" => "overlay",
            "value" => "",
            "description" => __("The overlay layer Color. You will need to change the alpha using this color picker to give an opacity to the color you choose.", "mk_framework"),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Background Effects", "mk_framework"),
            "param_name" => "bg_effects",
            "width" => 300,
            "value" => array(
                __('-- No Effect', "mk_framework") => "",
                __('Parallax', "mk_framework") => "parallax",
                __('Parallax Zoom Out', "mk_framework") => "parallaxZoomOut",
                __('Gradient Fade In', "mk_framework") => "gradient"
            ),
            "description" => __("Choose effects for your page title", "mk_framework"),       
            "dependency" => array(
                'element' => "bg_type",
                'value' => array(
                    'image',
                    'video'
                )
            )
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
            "description" => __("This option sets whether the background image is fixed or scrolls with the rest of the page. <a href='http://www.w3schools.com/CSSref/pr_background-attachment.asp'>Read More</a>", "mk_framework"),
            "dependency" => array(
                'element' => "bg_effects",
                'value' => array(
                    ''
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Text Align", "mk_framework"),
            "param_name" => "text_align",
            "width" => 150,
            "value" => array(
                __('Center', "mk_framework") => "center",
                __('Left', "mk_framework") => "left",
                __('Right', "mk_framework") => "right"
            ),
            "description" => __("", "mk_framework")
        ),  
        array(
            "type" => "range",
            "heading" => __("Title Font Size", "mk_framework"),
            "param_name" => "font_size",
            "min" => "10",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "value" => "50"
        ),
        array(
            "type" => "range",
            "heading" => __("Title Letter Spacing", "mk_framework"),
            "param_name" => "title_letter_spacing",
            "min" => "1",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "value" => "3"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Title Color", "mk_framework"),
            "param_name" => "font_color",
            "value" => "#ddd",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Title Font Weight", "mk_framework"),
            "param_name" => "font_weight",
            "width" => 150,
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
            "type" => "toggle",
            "heading" => __('Title Underline', 'mk_framework'),
            "description" => __("", "mk_framework"),
            "param_name" => "underline",
            "value" => "true"
        ),
        array(
            "type" => "range",
            "heading" => __("Title Padding", "mk_framework"),
            "param_name" => "padding",
            "min" => "10",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "value" => "20"
        ),
        array(
            "type" => "range",
            "heading" => __("Subtitle Font Size", "mk_framework"),
            "param_name" => "sub_font_size",
            "min" => "10",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "value" => "30"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Subtitle Color", "mk_framework"),
            "param_name" => "sub_font_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Subtitle Font Weight", "mk_framework"),
            "param_name" => "sub_font_weight",
            "width" => 150,
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
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    )
));

vc_map(array(
    "name" => __("Content Box", "mk_framework"),
    "base" => "mk_content_box",
    "as_parent" => array('except' => 'vc_row', 'mk_page_section'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-content-box vc_mk_element-icon',
    'description' => __( 'Content Box with heading', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title Heading", "mk_framework"),
            "param_name" => "heading",
            "value" => "",
            "description" => __("Add a title to your container box.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        $add_css_animations,
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    ),
    "js_view" => 'VcColumnView'
));
vc_map(array(
    "name" => __("Image", "mk_framework"),
    "base" => "mk_image",
    "category" => __('General', 'mk_framework'),
    'description' => __( 'Adds Image element with many styles.', 'mk_framework' ),
    'icon' => 'icon-mk-image vc_mk_element-icon',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "heading_title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "upload",
            "heading" => __("Upload Your image", "mk_framework"),
            "param_name" => "src",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Image Width", "mk_framework"),
            "param_name" => "image_width",
            "value" => "800",
            "min" => "10",
            "max" => "2600",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Image Height", "mk_framework"),
            "param_name" => "image_height",
            "value" => "350",
            "min" => "10",
            "max" => "5000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Image Cropping", "mk_framework"),
            "param_name" => "crop",
            "value" => "true",
            "description" => __("If you dont want to crop your image based on the dimensions you defined above disable this option. Only wdith will be used to give the image container max-width property.", "mk_framework")
        ),
         array(
            "type" => "toggle",
            "heading" => __("SVG Enable?", "mk_framework"),
            "param_name" => "svg",
            "value" => "false",
            "description" => __("If enabled max-width property will be added to image tag and you should enable this option if you are using SVG format in this image shortcode.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Lightbox", "mk_framework"),
            "param_name" => "lightbox",
            "value" => "false",
            "description" => __("If you would like to have lightbox (image zoom in a frame) enable this option.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Custom Lightbox URL", "mk_framework"),
            "param_name" => "custom_lightbox",
            "value" => "",
            "description" => __("You can use this field to add your custom lightbox URL to appear in pop up box. it can be image SRC, youtube URL.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Lightbox Group rel", "mk_framework"),
            "param_name" => "group",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Image Frame Style", "mk_framework"),
            "param_name" => "frame_style",
            "value" => array(
                "No Frame" => "simple",
                "Rounded Frame" => "rounded",
                "Single Line Frame" => "single_line",
                "Gray Border Frame" => "gray_border",
                "Border With Shadow" => "border_shadow",
                "Shadow Only" => "shadow_only"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image Link", "mk_framework"),
            "param_name" => "link",
            "value" => "",
            "description" => __("Optionally you can link your image.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", "mk_framework"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image Caption Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image Caption Description", "mk_framework"),
            "param_name" => "desc",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Image Caption Location", "mk_framework"),
            "param_name" => "caption_location",
            "value" => array(
                "Inside Image" => "inside-image",
                "Outside Image" => "outside-image"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Align", "mk_framework"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                __('Left', "mk_framework") => "left",
                __('Right', "mk_framework") => "right",
                __('Center', "mk_framework") => "center"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "10",
            "min" => "-50",
            "max" => "300",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        $add_device_visibility,
        $add_css_animations,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Circle Image Frame", "mk_framework"),
    "base" => "mk_circle_image",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-circle-image-frame vc_mk_element-icon',
    'description' => __( 'Adds a circled image element.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "heading_title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "upload",
            "heading" => __("Upload Your image", "mk_framework"),
            "param_name" => "src",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Image Diameter", "mk_framework"),
            "param_name" => "image_diameter",
            "value" => "500",
            "min" => "10",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The diameter of circle containing your image", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image Link", "mk_framework"),
            "param_name" => "link",
            "value" => "",
            "description" => __("Optionally you can link your image.", "mk_framework")
        ),
        $add_css_animations,
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Moving Image", "mk_framework"),
    "base" => "mk_moving_image",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-moving-image vc_mk_element-icon',
    'description' => __( 'Images powered by CSS3 moving animations.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "upload",
            "heading" => __("Upload Your image", "mk_framework"),
            "param_name" => "src",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animation Style", "mk_framework"),
            "param_name" => "axis",
            "value" => array(
                "Vertical" => "vertical",
                "Horizontally" => "horizontal",
                "Pulse" => "pulse",
                "Tossing" => "tossing"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Align", "mk_framework"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                __('Left', "mk_framework") => "left",
                __('Right', "mk_framework") => "right",
                __('Center', "mk_framework") => "center"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title & Alt", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("For SEO purposes you may need to fill out the title and alt property for this image", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "mk_framework"),
            "param_name" => "link",
            "value" => "",
            "description" => __("Link this image to a URL. Include http://", "mk_framework")
        ),
        $add_css_animations,
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Image Gallery", "mk_framework"),
    "base" => "mk_gallery",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-image-gallery vc_mk_element-icon',
    'description' => __( 'Adds images in grids in many styles.', 'mk_framework' ),
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
            "type" => "textfield",
            "heading" => __("Custom Links", "mk_framework"),
            "param_name" => "custom_links",
            "value" => "",
            "description" => __("Please add your links, If you use custom links the lightbox will be converted to external links. separate your URLs with comma ','", "mk_framework")
        ),
        array(
            "heading" => __("Gallery Style", 'mk_framework'),
            "description" => __("In grid style you will need to set column and image heights. For Mansory Styles Structure see below image :</br><img src='".THEME_ADMIN_ASSETS_URI."/images/gallery-mansory-styles.png' /><br>", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Grid", 'mk_framework') => "grid",
                __("Masnory Style 1", 'mk_framework') => "style1",
                __("Masnory Style 2", 'mk_framework') => "style2",
                __("Masnory Style 3", 'mk_framework') => "style3"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("How many Column?", "mk_framework"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "8",
            "step" => "1",
            "unit" => 'column',
            "description" => __("How many columns would you like to appear in one row?", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),
        array(
            "heading" => __("Image Size", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "image_size",
            "value" => array(
                __("Resize & Crop", 'mk_framework') => "crop",
                __("Original Size", 'mk_framework') => "full",
                __("Large Size", 'mk_framework') => "large",
                __("Medium Size", 'mk_framework') => "medium"
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Image Heights", "mk_framework"),
            "param_name" => "height",
            "value" => "500",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("Define your gallery image's height.", "mk_framework"),
            "dependency" => array(
                'element' => "image_size",
                'value' => array(
                    'crop'
                )
            )
        ),
        array(
            "heading" => __("Hover Scenarios", 'mk_framework'),
            "description" => __("This is what happens when user hovers over a gallery item.", 'mk_framework'),
            "param_name" => "hover_scenarios",
            "value" => array(
                __("Fade Box", 'mk_framework') => "fadebox",
                __("Slow Zoom", 'mk_framework') => "slow_zoom",
                __("Overlay Layer", 'mk_framework') => "overlay_layer",
                __("No Overlay", 'mk_framework') => "none",
            ),
            "type" => "dropdown",
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Overlay Color", "mk_framework"),
            "param_name" => "overlay_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Item Spacing", 'mk_framework'),
            "description" => __("Space between items.", 'mk_framework'),
            "param_name" => "item_spacing",
            "value" => "8",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "type" => "range",
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "20",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Image Frame Style", "mk_framework"),
            "param_name" => "frame_style",
            "value" => array(
                "No Frame" => "simple",
                "Grid" => "grid",
                "Rounded Frame" => "rounded",
                "Gray Border Frame" => "gray_border"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Collection Title", "mk_framework"),
            "param_name" => "collection_title",
            "value" => "",
            "description" => __("This title will be replaced with all captions you define in Wordpress media. If you just want to give one title for all gallery images you can use this option. Image alt tag will still follow the media section image alt field.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Hover Captions", "mk_framework"),
            "param_name" => "disable_title",
            "value" => "false",
            "description" => __("Using this option you can enable / disable image hover captions. This option is disabled by default.", "mk_framework"),
            "dependency" => array(
                'element' => "hover_scenarios",
                'value' => array(
                    'fadebox'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Increase Quality of Image", "mk_framework"),
            "param_name" => "image_quality",
            "value" => array(
                __("Normal Quality", 'mk_framework') => "1",
                __("Images 2 times bigger (retina compatible)", 'mk_framework') => "2",
                __("Images 3 times bigger (fullwidth row compatible)", 'mk_framework') => "3"
            ),
            "description" => __("If you want gallery images to be retina compatible or you just want to use it in full width row, you may consider increasing the image size. This option will help you to manually define the image quality.", "mk_framework")
        ),
        array(
            "heading" => __("Pagination?", 'mk_framework'),
            "description" => __("Enable / Disable pagination for this image loop.", 'mk_framework'),
            "param_name" => "pagination",
            "value" => array(
                __("No", 'mk_framework') => "false",
                __("Yes", 'mk_framework') => "true"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("How many Images per page?", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "1",
            "max" => "50",
            "step" => "1",
            "unit" => 'images',
            "description" => __("How many Image would you like to show per page?", "mk_framework"),
            "dependency" => array(
                'element' => "pagination",
                'value' => array(
                    "true"
                )
            )
        ),
        array(
            "heading" => __("Pagination Style", 'mk_framework'),
            "description" => __("Select which pagination style you would like to use on this loop.", 'mk_framework'),
            "param_name" => "pagination_style",
            "value" => array(
                __("Classic Pagination Navigation", 'mk_framework') => "1",
                __("Load more button", 'mk_framework') => "2",
                __("Load more on page scroll", 'mk_framework') => "3"
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "pagination",
                'value' => array(
                    "true"
                )
            )
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
            "description" => __("Sorts retrieved gallery items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        ),
         array(
            'type' => 'item_id',
            'heading' => __( 'Item ID', 'mk_framework' ),
            'param_name' => "item_id"
        )
    )
));
vc_map(array(
    "name" => __("Button", "mk_framework"),
    "base" => "mk_button",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-button vc_mk_element-icon',
    'description' => __( 'Powerful & versatile button shortcode', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "dimension",
            "value" => array(
                __("3D", "mk_framework") => "three",
                __("2D", "mk_framework") => "two",
                __("Flat", "mk_framework") => "flat",
                __("Outline", "mk_framework") => "outline",
                __("Savvy", "mk_framework") => "savvy"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "heading" => __("Button Text", "mk_framework"),
            "param_name" => "content",
            "rows" => 1,
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        //new added
        array(
            "type" => "dropdown",
            "heading" => __("Corner style", "mk_framework"),
            "param_name" => "corner_style",
            "value" => array(
                "Pointed" => "pointed",
                "Rounded" => "rounded",
                "Full Rounded" => "full_rounded"
            ),
            "description" => __("How will your button corners look like?", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Size", "mk_framework"),
            "param_name" => "size",
            "value" => array(
                "Small" => "small",
                "Medium" => "medium",
                "Large" => "large",
                "X-Large" => "x-large",
                "XX-Large" => "xx-large"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Skin", "mk_framework"),
            "param_name" => "outline_skin",
            "value" => array(
                "Dark Color" => "dark",
                "Light Color" => "light",
                "Custom Color" => "custom"
            ),
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "dimension",
                'value' => array(
                    'outline',
                    'savvy'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Active Color", "mk_framework"),
            "param_name" => "outline_active_color",
            "value" => "#fff",
            "description" => __("The border and text color of button", "mk_framework"),
            "dependency" => array(
                'element' => "outline_skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Hover Text Color", "mk_framework"),
            "param_name" => "outline_hover_color",
            "value" => "#333333",
            "description" => __("The text color when hovered on button", "mk_framework"),
            "dependency" => array(
                'element' => "outline_skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Background Color", "mk_framework"),
            "param_name" => "bg_color",
            "value" => $skin_color,
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "dimension",
                'value' => array(
                    'two',
                    'three',
                    'flat'
                )
            )
        ),
         array(
            "type" => "colorpicker",
            "heading" => __("Button Hover Background Color", "mk_framework"),
            "param_name" => "btn_hover_bg",
            "value" => '#252525',
            "description" => __("Please note that this option is only for Flat style", "mk_framework"),
            "dependency" => array(
                'element' => "dimension",
                'value' => array(
                    'flat'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Text Color (Hover)", "mk_framework"),
            "param_name" => "btn_hover_txt_color",
            "value" => "",
            "description" => __("", "mk_framework"),
             "dependency" => array(
                'element' => "dimension",
                'value' => array(
                    'flat'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Text Color", "mk_framework"),
            "param_name" => "text_color",
            "value" => array(
                "Light" => "light",
                "Dark" => "dark"
            ),
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "dimension",
                'value' => array(
                    'two',
                    'three',
                    'flat'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Animate Icon?", "mk_framework"),
            "param_name" => "icon_anim",
            "value" => array(
                __('No animation', "mk_framework") => "none",
                __('Side animation', "mk_framework") => "side",
                __('Vertical animation ', "mk_framework") => "vertical"
            ),
            "description" => __("Button icon animates once the user's mouse rolls over the button", "mk_framework"),
            "dependency" => array(
                'element' => 'dimension',
                'value' => array(
                    'two',
                    'three',
                    'flat',
                    'outline'
                    )
                )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button URL", "mk_framework"),
            "param_name" => "url",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", "mk_framework"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Align", "mk_framework"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                __('Left', "mk_framework") => "left",
                __('Right', "mk_framework") => "right",
                __('Center', "mk_framework") => "center"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Full Width button?", "mk_framework"),
            "param_name" => "fullwidth",
            "value" => "false",
            "description" => __("Using this option you can make the button full width and cover one row.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Custom Button Width", "mk_framework"),
            "param_name" => "button_custom_width",
            "value" => "0",
            "min" => "0",
            "max" => "1500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button ID", "mk_framework"),
            "param_name" => "id",
            "value" => "",
            "description" => __("If your want to use id for this button to refer it in your custom JS, fill this textbox.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Top", "mk_framework"),
            "param_name" => "margin_top",
            "value" => "0",
            "min" => "-30",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Buttom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "15",
            "min" => "-30",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        $add_css_animations,
        $add_device_visibility,
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
    "name" => __("Mini Callout Box", "mk_framework"),
    "base" => "mk_mini_callout",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-mini-callout-box vc_mk_element-icon',
    'description' => __( 'Small callout box for important infos.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Description", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("Enter your content.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Text", "mk_framework"),
            "param_name" => "button_text",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button URL", "mk_framework"),
            "param_name" => "button_url",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Message Box", "mk_framework"),
    "base" => "mk_message_box",
    'icon' => 'icon-mk-message-box vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    'description' => __( 'Message Box with multiple types.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Write your message inside the text box", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Type", "mk_framework"),
            "param_name" => "type",
            "value" => array(
                "Comment" => "comment-message",
                "Warning" => "warning-message",
                "Confirm" => "confirm-message",
                "Error" => "error-message",
                "Info" => "info-message"
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
    "name" => __("Icon Box", "mk_framework"),
    "base" => "mk_icon_box",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-icon-box vc_mk_element-icon',
    'description' => __( 'Powerful & versatile Icon Boxes.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "mk-li-smile",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Title Font Size", "mk_framework"),
            "param_name" => "text_size",
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
            "param_name" => "font_weight",
            "width" => 200,
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
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Description", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("Enter your content.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Read More Text", "mk_framework"),
            "param_name" => "read_more_txt",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Read More URL", "mk_framework"),
            "param_name" => "read_more_url",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "width" => 300,
            "value" => array(
                __('Simple Minimal', "mk_framework") => "simple_minimal",
                __('Simple Ultimate', "mk_framework") => "simple_ultimate",
                __('Boxed', "mk_framework") => "boxed"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Icon Size", "mk_framework"),
            "param_name" => "icon_size",
            "width" => 150,
            "value" => array(
                __('Small', "mk_framework") => "small",
                __('Medium', "mk_framework") => "medium",
                __('Large', "mk_framework") => "large",
                __('X-large', "mk_framework") => "x-large"
            ),
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple_ultimate',
                    'simple_minimal'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Circle container", "mk_framework"),
            "param_name" => "rounded_circle",
            "value" => "false",
            "description" => __("Enable this option if you want your icon to be contained by a circle. This option will only work for icon size of Small and Medium.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple_ultimate'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Icon Location", "mk_framework"),
            "param_name" => "icon_location",
            "width" => 150,
            "value" => array(
                __('Left', "mk_framework") => "left",
                __('Top', "mk_framework") => "top"
            ),
            "description" => __("The horizontal and vertical location of Icon related to the box content", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple_ultimate',
                    'boxed'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Circle container", "mk_framework"),
            "param_name" => "circled",
            "value" => "false",
            "description" => __("Enable this option if you want your icon to be contained by a circle.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple_minimal'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => $skin_color,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Container (circle) Background Color", "mk_framework"),
            "param_name" => "icon_circle_color",
            "value" => $skin_color,
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'boxed',
                    'simple_minimal'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Container (circle) Border Color", "mk_framework"),
            "param_name" => "icon_circle_border_color",
            "value" => "",
            "description" => __("Optionally you can set a border for icon circle container. To disable border just leave this field blank.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'boxed',
                    'simple_minimal'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Box Blur", "mk_framework"),
            "param_name" => "box_blur",
            "value" => "false",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'boxed'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Title Color", "mk_framework"),
            "param_name" => "title_color",
            "value" => "",
            "description" => __("Optionally you can modify Title color inside this shortcode.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Paragraph Color", "mk_framework"),
            "param_name" => "txt_color",
            "value" => "",
            "description" => __("Optionally you can modify text color inside this shortcode.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Paragraph Link Color", "mk_framework"),
            "param_name" => "txt_link_color",
            "value" => "",
            "description" => __("Optionally you can modify links color that are inside description.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Buttom", "mk_framework"),
            "param_name" => "margin",
            "value" => "30",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        $add_css_animations,
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Icon Box 2", "mk_framework"),
    "base" => "mk_icon_box2",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-icon-box vc_mk_element-icon',
    'description' => __( 'Powerful & versatile Icon Boxes.', 'mk_framework' ),
    "params" => array(
        array(
            "heading" => __("Icon Type?", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "icon_type",
            "value" => array(
                __("Icon", 'mk_framework') => "icon",
                __("Image", 'mk_framework') => "image"
            ),
            "type" => "dropdown"
        ),

        array(
            "heading" => __("Icon/Image Size", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "icon_size",
            "value" => array(
                __("16", 'mk_framework') => "16",
                __("32", 'mk_framework') => "32",
                __("48", 'mk_framework') => "48",
                __("64", 'mk_framework') => "64",
                __("128", 'mk_framework') => "128",
                __("No Limit (Images only)", 'mk_framework') => "inherit"
            ),
            "type" => "dropdown"
        ),

        array(
            "type" => "upload",
            "heading" => __("Icon Image", "mk_framework"),
            "param_name" => "icon_image",
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
            "type" => "textfield",
            "heading" => __("Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "mk-li-smile",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Background Color", "mk_framework"),
            "param_name" => "icon_background_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Border Color", "mk_framework"),
            "param_name" => "icon_border_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Icon Hover Color", "mk_framework"),
            "param_name" => "icon_hover_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Hover Background Color", "mk_framework"),
            "param_name" => "icon_hover_background_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Hover Border Color", "mk_framework"),
            "param_name" => "icon_hover_border_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),

        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Title Font Size", "mk_framework"),
            "param_name" => "title_size",
            "value" => "20",
            "min" => "5",
            "max" => "40",
            "step" => "1",
            "unit" => 'px'
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Title Font Weight", "mk_framework"),
            "param_name" => "title_weight",
            "width" => 150,
            "value" => array(
                __('Default', "mk_framework") => "inherit",
                __('Bold', "mk_framework") => "bold",
                __('Bolder', "mk_framework") => "bolder",
                __('Normal', "mk_framework") => "normal",
                __('Light', "mk_framework") => "300"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Title Font Color", "mk_framework"),
            "param_name" => "title_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Title Top Padding", "mk_framework"),
            "param_name" => "title_top_padding",
            "value" => "10",
            "min" => "5",
            "max" => "60",
            "step" => "1",
            "unit" => 'px'
        ),
        array(
            "type" => "range",
            "heading" => __("Title Bottom Padding", "mk_framework"),
            "param_name" => "title_bottom_padding",
            "value" => "10",
            "min" => "5",
            "max" => "60",
            "step" => "1",
            "unit" => 'px'
        ),

        array(
            "type" => "textarea_html",
            "holder" => "div",
            'toolbar' =>  'full',
            "heading" => __("Description", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("Enter your content.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Box Align", "mk_framework"),
            "param_name" => "align",
            "description" => __("This option will align the whole box content.", "mk_framework"),
            "value" => array(
                "Center" => "center",
                "Left" => "left",
                "Right" => "right",
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
    "name" => __("Divider", "mk_framework"),
    "base" => "mk_divider",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-divider vc_mk_element-icon',
    'description' => __( 'Dividers with many styles & options.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "value" => array(
                "Double Dotted" => "double_dot",
                "Thick Solid Line" => "thick_solid",
                "Thin Solid Line" => "thin_solid",
                "Thin Dotted Line" => "single_dotted",
                "Shadow Line" => "shadow_line",
                "Go Top with Thin Line" => "go_top",
                "Go Top with Thick Line" => "go_top_thick",
                "Empty Space" => "padding_space"
            ),
            "description" => __("Choose the divider style.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Divider Width", "mk_framework"),
            "param_name" => "divider_width",
            "value" => array(
                "Full Width" => "full_width",
                "One Half" => "one_half",
                "One Third" => "one_third",
                "One Fourth" => "one_fourth",
                "Custom Width" => "custom_width"
            ),
            "description" => __("There are 5 predefined and one user defined values for width. If you want to divide the page into 2 sections, you can simply place this shortcode into a row and enable 'Fullwidth Row'.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Divider Custom Width", "mk_framework"),
            "param_name" => "custom_width",
            "value" => "10",
            "min" => "1",
            "max" => "900",
            "step" => "1",
            "unit" => 'px',
            "description" => __("Choose any custom width for divider", "mk_framework"),
            "dependency" => array(
                'element' => "divider_width",
                'value' => array(
                    'custom_width'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Align", "mk_framework"),
            "param_name" => "align",
            "value" => array(
                "Center" => "center",
                "Left" => "left",
                "Right" => "right",
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Divider Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'thick_solid',
                    'thin_solid',
                    'single_dotted'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Divider Thickness", "mk_framework"),
            "param_name" => "thickness",
            "value" => "1",
            "min" => "1",
            "max" => "20",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'thin_solid'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Top", "mk_framework"),
            "param_name" => "margin_top",
            "value" => "20",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("How much space would you like to have before divider? This value will be applied to top.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Padding Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "20",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("How much space would you like to have after divider? This value will be applied to bottom.", "mk_framework")
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
    "name" => __("Table", "mk_framework"),
    "base" => "mk_table",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-table vc_mk_element-icon',
    'description' => __( 'Adds styles to your data tables.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "style2"
            )
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Table HTML content. You can use below sample and create your own data tables.", "mk_framework"),
            "param_name" => "content",
            "value" => '<table width="100%">
<thead>
<tr>
<th>Column 1</th>
<th>Column 2</th>
<th>Column 3</th>
<th>Column 4</th>
</tr>
</thead>
<tbody>
<tr>
<td>Item #1</td>
<td>Description</td>
<td>Subtotal:</td>
<td>$3.00</td>
</tr>
<tr>
<td>Item #2</td>
<td>Description</td>
<td>Discount:</td>
<td>$4.00</td>
</tr>
<tr>
<td>Item #3</td>
<td>Description</td>
<td>Shipping:</td>
<td>$7.00</td>
</tr>
<tr>
<td>Item #4</td>
<td>Description</td>
<td>Tax:</td>
<td>$6.00</td>
</tr>
<tr>
<td><strong>All Items</strong></td>
<td><strong>Description</strong></td>
<td><strong>Your Total:</strong></td>
<td><strong>$20.00</strong></td>
</tr>
</tbody>
</table>',
            "description" => __("Paste your table HTML code here.", "mk_framework")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Skill Meter", "mk_framework"),
    "base" => "mk_skill_meter",
    'icon' => 'icon-mk-skill-meter vc_mk_element-icon',
    'description' => __( 'Show skills in bars by percent.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("What skill are you demonstrating?", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Percent", "mk_framework"),
            "param_name" => "percent",
            "value" => "50",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("How many percent would you like to show for this skill bar?", "mk_framework")
        ),

        array(
            "type" => "range",
            "heading" => __("Bar Thickness", "mk_framework"),
            "param_name" => "line_height",
            "value" => "22",
            "min" => "1",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Title Text Color", "mk_framework"),
            "param_name" => "txt_color",
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Percentage Text Color", "mk_framework"),
            "param_name" => "percent_color",
            "value" => 'rgba(0,0,0,0.5)',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Bar Track Color", "mk_framework"),
            "param_name" => "bar_color",
            "value" => 'rgba(0,0,0,0.12)',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Bar Progress Color", "mk_framework"),
            "param_name" => "color",
            "value" => $skin_color,
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
    "name" => __("Diagram Progress Bar", "mk_framework"),
    "base" => "mk_skill_meter_chart",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-diagram-progress-bar vc_mk_element-icon',
    'description' => __( 'Show skills & data in diagram charts.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Data 1 : Percent", "mk_framework"),
            "param_name" => "percent_1",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("Measure your data in percent", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Data 1 : Arch Color", "mk_framework"),
            "param_name" => "color_1",
            "value" => "#e74c3c",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Data 1 : Name", "mk_framework"),
            "param_name" => "name_1",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("The name of data you are demonstrating", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Data 2 : Percent", "mk_framework"),
            "param_name" => "percent_2",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("Measure your data in percent", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Data 2 : Arch Color", "mk_framework"),
            "param_name" => "color_2",
            "value" => "#8c6645",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Data 2 : Name", "mk_framework"),
            "param_name" => "name_2",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("The name of data you are demonstrating", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Data 3 : Percent", "mk_framework"),
            "param_name" => "percent_3",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("Measure your data in percent", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Data 3 : Arch Color", "mk_framework"),
            "param_name" => "color_3",
            "value" => "#265573",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Data 3 : Name", "mk_framework"),
            "param_name" => "name_3",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("The name of data you are demonstrating", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Data 4 : Percent", "mk_framework"),
            "param_name" => "percent_4",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("Measure your data in percent", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Data 4 : Arch Color", "mk_framework"),
            "param_name" => "color_4",
            "value" => "#008b83",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Data 4 : Name", "mk_framework"),
            "param_name" => "name_4",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("The name of data you are demonstrating", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Data 5 : Percent", "mk_framework"),
            "param_name" => "percent_5",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("Measure your data in percent", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Data 5 : Arch Color", "mk_framework"),
            "param_name" => "color_5",
            "value" => "#d96b52",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Data 5 : Name", "mk_framework"),
            "param_name" => "name_5",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("The name of data you are demonstrating", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Data 6 : Percent", "mk_framework"),
            "param_name" => "percent_6",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("Measure your data in percent", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Data 6 : Arch Color", "mk_framework"),
            "param_name" => "color_6",
            "value" => "#82bf56",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Data 6 : Name", "mk_framework"),
            "param_name" => "name_6",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("The name of data you are demonstrating", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Data 7 : Percent", "mk_framework"),
            "param_name" => "percent_7",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("Measure your data in percent", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Data 7 : Arch Color", "mk_framework"),
            "param_name" => "color_7",
            "value" => "#4ecdc4",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Data 7 : Name", "mk_framework"),
            "param_name" => "name_7",
            "value" => "",
            "margin_bottom" => 40,
            "description" => __("The name of data you are demonstrating", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Default Text", "mk_framework"),
            "param_name" => "default_text",
            "value" => "Skill",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Center Circle Background Color", "mk_framework"),
            "param_name" => "center_color",
            "value" => "#1e3641",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Default Text Color", "mk_framework"),
            "param_name" => "default_text_color",
            "value" => "#fff",
            "description" => __("", "mk_framework")
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
    "name" => __("Chart", "mk_framework"),
    "base" => "mk_chart",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-chart vc_mk_element-icon',
    'description' => __( 'Powerful & versatile Chart element.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "range",
            "heading" => __("Percent", "mk_framework"),
            "param_name" => "percent",
            "value" => "50",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Bar Color", "mk_framework"),
            "param_name" => "bar_color",
            "value" => $skin_color,
            "description" => __("The color of the circular bar.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Track Color", "mk_framework"),
            "param_name" => "track_color",
            "value" => "#ececec",
            "description" => __("The color of the track for the bar.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Line Width", "mk_framework"),
            "param_name" => "line_width",
            "value" => "10",
            "min" => "1",
            "max" => "20",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The bar stroke thickness", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Bar Size", "mk_framework"),
            "param_name" => "bar_size",
            "value" => "150",
            "min" => "1",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The Diameter of the bar.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Content inside the chart", "mk_framework"),
            "param_name" => "content_type",
            "width" => 200,
            "value" => array(
                "Percentage" => "percent",
                "Icon" => "icon",
                "Custom Text" => "custom_text"
            ),
            "description" => __("The content inside the circular bar.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework"),
                "dependency" => array(
                    'element' => "content_type",
                    'value' => 'icon'
                )
        ),
        array(
            "type" => "range",
            "heading" => __("Icon Size", "mk_framework"),
            "param_name" => "icon_size",
            "value" => "32",
            "min" => "1",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            "dependency" => array(
                    'element' => "content_type",
                    'value' => 'icon'
                )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => "#444",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                    'element' => "content_type",
                    'value' => 'icon'
                )
        ),
        
        array(
            "type" => "textfield",
            "heading" => __("Custom Text", "mk_framework"),
            "param_name" => "custom_text",
            "value" => "",
            "description" => __("This will appear inside the circular chart.", "mk_framework"),
            "dependency" => array(
                'element' => "content_type",
                'value' => 'custom_text'
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Percentage Text Size", "mk_framework"),
            "param_name" => "percentage_text_size",
            "value" => "15",
            "min" => "10",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            "dependency" => array(
                    'element' => "content_type",
                    'value' => 'percent'
                )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Percentage Text Color", "mk_framework"),
            "param_name" => "percentage_color",
            "value" => "#444",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                    'element' => "content_type",
                    'value' => 'percent'
                )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", "mk_framework"),
            "param_name" => "desc",
            "value" => "",
            "description" => __("Description will appear below each chart.", "mk_framework")
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
    "name" => __("Process Builder", "mk_framework"),
    "base" => "mk_steps",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-process-builder vc_mk_element-icon',
    'description' => __( 'Adds process steps element.', 'mk_framework' ),
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
            "heading" => __("How Many Steps?", "mk_framework"),
            "param_name" => "step",
            "value" => "4",
            "min" => "3",
            "max" => "5",
            "step" => "1",
            "unit" => 'step',
            "description" => __("How many steps for the whole process? Each represented in a circular container.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Container Hover Color", "mk_framework"),
            "param_name" => "hover_color",
            "value" => $skin_color,
            "description" => __("This color will be showed up once user rolls over the circular container.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 1 : Add Icon Class Name", "mk_framework"),
            "param_name" => "icon_1",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 1 : Title", "mk_framework"),
            "param_name" => "title_1",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 1 : Description", "mk_framework"),
            "param_name" => "desc_1",
            'margin_bottom' => 40,
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 1 : Link", "mk_framework"),
            "param_name" => "url_1",
            'margin_bottom' => 30,
            "value" => "",
            "description" => __("If you add a URL the title will be converted to a link. add http://", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 2 : Add Icon Class Name", "mk_framework"),
            "param_name" => "icon_2",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 2 : Title", "mk_framework"),
            "param_name" => "title_2",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 2 : Description", "mk_framework"),
            "param_name" => "desc_2",
            'margin_bottom' => 40,
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 2 : Link", "mk_framework"),
            "param_name" => "url_2",
            'margin_bottom' => 30,
            "value" => "",
            "description" => __("If you add a URL the title will be converted to a link. add http://", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 3 : Add Icon Class Name", "mk_framework"),
            "param_name" => "icon_3",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 3 : Title", "mk_framework"),
            "param_name" => "title_3",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 3 : Description", "mk_framework"),
            "param_name" => "desc_3",
            'margin_bottom' => 40,
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 3 : Link", "mk_framework"),
            "param_name" => "url_3",
            'margin_bottom' => 30,
            "value" => "",
            "description" => __("If you add a URL the title will be converted to a link. add http://", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 4 : Add Icon Class Name", "mk_framework"),
            "param_name" => "icon_4",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 4 : Title", "mk_framework"),
            "param_name" => "title_4",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 4 : Description", "mk_framework"),
            "param_name" => "desc_4",
            'margin_bottom' => 40,
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 4 : Link", "mk_framework"),
            "param_name" => "url_4",
            'margin_bottom' => 30,
            "value" => "",
            "description" => __("If you add a URL the title will be converted to a link. add http://", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 5 : Add Icon Class Name", "mk_framework"),
            "param_name" => "icon_5",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 5 : Title", "mk_framework"),
            "param_name" => "title_5",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 5 : Description", "mk_framework"),
            "param_name" => "desc_5",
            'margin_bottom' => 40,
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Step 5 : Link", "mk_framework"),
            "param_name" => "url_5",
            'margin_bottom' => 30,
            "value" => "",
            "description" => __("If you add a URL the title will be converted to a link. add http://", "mk_framework")
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
    "name" => __("News Tab", "mk_framework"),
    "base" => "mk_news_tab",
    "category" => __('General', 'mk_framework'),
    'icon' => 'icon-mk-news-tab vc_mk_element-icon',
    'description' => __( 'News feed in tabs style.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget Title", "mk_framework"),
            "param_name" => "widget_title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tab Title", "mk_framework"),
            "param_name" => "tab_title",
            "value" => "News",
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
    "name" => __("Widgetized Sidebar", "mk_framework"),
    "base" => "mk_custom_sidebar",
    'icon' => 'icon-mk-custom-sidebar vc_mk_element-icon',
    'description' => __( 'Place Widgetized sidebar', 'mk_framework' ),
    "category" => __('Structure', 'mk_framework'),
    "params" => array(
        array(
          'type' => 'widgetised_sidebars',
          'heading' => __( 'Sidebar', 'mk_framework' ),
          'param_name' => 'sidebar',
          'description' => __( 'Select the widget area to be shown in this sidebar.', 'mk_framework' )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Padding Space", "mk_framework"),
    "base" => "mk_padding_divider",
    'icon' => 'icon-mk-padding-space vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    'description' => __( 'Adds space between elements', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "range",
            "heading" => __("Padding Size (Px)", "mk_framework"),
            "param_name" => "size",
            "value" => "40",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("How much empty space would you like to add?", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Event Countdown", "mk_framework"),
    "base" => "mk_countdown",
    'icon' => 'icon-mk-event-countdown vc_mk_element-icon',
    'description' => __( 'Countdown module for your events.', 'mk_framework' ),
    "category" => __('General', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Upcoming Event Date", "mk_framework"),
            "param_name" => "date",
            "value" => "12/24/2016 12:00:00",
            "description" => __("Enter the due date for Event. eg : 12/24/2016 12:00:00 => month/day/year hour:minute:second", "mk_framework")
        ),
        array(
            "heading" => __("UTC Timezone", "mk_framework"),
            "param_name" => "offset",
            "value" => array(
                "-12" => "-12",
                "-11" => "-11",
                "-10" => "-10",
                "-9" => "-9",
                "-8" => "-8",
                "-7" => "-7",
                "-6" => "-6",
                "-5" => "-5",
                "-4" => "-4",
                "-3" => "-3",
                "-2" => "-2",
                "-1" => "-1",
                "0" => "0",
                "+1" => "+1",
                "+2" => "+2",
                "+3" => "+3",
                "+4" => "+4",
                "+5" => "+5",
                "+6" => "+6",
                "+7" => "+7",
                "+8" => "+8",
                "+9" => "+9",
                "+10" => "+10",
                "+12" => "+12"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Milestones", "mk_framework"),
    "base" => "mk_milestone",
    'icon' => 'icon-mk-milestone vc_mk_element-icon',
    'description' => __( 'Milestone numbers to show statistics.', 'mk_framework' ),
    "category" => __('General', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Icon & Text Size", "mk_framework"),
            "param_name" => "icon_size",
            "value" => array(
                __("Small", "mk_framework") => "small",
                __("Medium", "mk_framework") => "medium",
                __("Large", "mk_framework") => "large"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Align", "mk_framework"),
            "param_name" => "align",
            "value" => array(
                __("Left", "mk_framework") => "left",
                __("center", "mk_framework") => "center",
                __("right", "mk_framework") => "right",
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => $skin_color,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Number Starts at:", "mk_framework"),
            "param_name" => "start",
            "value" => "0",
            "min" => "0",
            "max" => "100000",
            "step" => "1",
            "unit" => '',
            "description" => __("Choose at which number it should start.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Number Stops at:", "mk_framework"),
            "param_name" => "stop",
            "value" => "100",
            "min" => "0",
            "max" => "100000",
            "step" => "1",
            "unit" => '',
            "description" => __("Choose at which number it should Stop.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Speed", "mk_framework"),
            "param_name" => "speed",
            "value" => "2000",
            "min" => "0",
            "max" => "10000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("Speed of the animation from start to stop in milliseconds.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Number Prefix", "mk_framework"),
            "param_name" => "prefix",
            "value" => "",
            "description" => __("This text goes before the Number.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Number Suffix", "mk_framework"),
            "param_name" => "suffix",
            "value" => "",
            "description" => __("This text goes after the Number.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description", "mk_framework"),
            "param_name" => "text",
            "value" => "",
            "description" => __("Description that goes below the Number.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Text Color", "mk_framework"),
            "param_name" => "text_color",
            "value" => "",
            "description" => __("This option will affect Prefix, suffix, number and description.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Number Text Size (Number, Prefix and Suffix)", "mk_framework"),
            "param_name" => "text_size",
            "value" => "0",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '',
            "description" => __("Text Size will change based on \"Icon & Text Size\" option, however you can set a custom size using this option.", "mk_framework")
        ),
        array(
            "type" => "theme_fonts",
            "heading" => __("Font Family", "mk_framework"),
            "param_name" => "font_family",
            "value" => "",
            "description" => __("You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "mk_framework")
        ),
        array(
            "type" => "hidden_input",
            "param_name" => "font_type",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Number Font Weight", "mk_framework"),
            "param_name" => "font_weight",
            "width" => 150,
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
            "type" => "range",
            "heading" => __("Description Text Size", "mk_framework"),
            "param_name" => "desc_size",
            "value" => "14",
            "min" => "10",
            "max" => "100",
            "step" => "1",
            "unit" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link (optional)", "mk_framework"),
            "param_name" => "link",
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
    "name" => __("Audio Player", "mk_framework"),
    "base" => "mk_audio",
    'icon' => 'icon-mk-audio-player vc_mk_element-icon',
    'description' => __( 'Adds player to your audio files.', 'mk_framework' ),
    "category" => __('General', 'mk_framework'),
    "params" => array(
        array(
            "type" => "upload",
            "heading" => __("Upload MP3 file format", "mk_framework"),
            "param_name" => "mp3_file",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "upload",
            "heading" => __("Upload OGG file format", "mk_framework"),
            "param_name" => "ogg_file",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "upload",
            "heading" => __("Upload A Thumbnail for this audio", "mk_framework"),
            "param_name" => "thumb",
            "value" => "",
            "description" => __("It will automatically cropped to 50x50 pixels.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Sound Author", "mk_framework"),
            "param_name" => "audio_author",
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
if (is_plugin_active('gravityforms/gravityforms.php')) {
    $gravity_forms_array[__("No Gravity forms found.", "mk_framework")] = '';
    if (class_exists('RGFormsModel')) {
        $gravity_forms = RGFormsModel::get_forms(1, "title");
        if ($gravity_forms) {
            $gravity_forms_array = array(
                __("Select a form to display.", "mk_framework") => ''
            );
            foreach ($gravity_forms as $gravity_form) {
                $gravity_forms_array[$gravity_form->title] = $gravity_form->id;
            }
        }
    }
    vc_map(array(
        "name" => __("Gravity Form", "mk_framework"),
        "base" => "gravityform",
        "icon" => "icon-wpb-vc_gravityform",
        "category" => __("Plugins", "mk_framework"),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __("Form", "mk_framework"),
                "param_name" => "id",
                "value" => $gravity_forms_array,
                "description" => __("Select a form to add to your post or page.", "mk_framework"),
                "admin_label" => true
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Display Form Title", "mk_framework"),
                "param_name" => "title",
                "value" => array(
                    __("No", "mk_framework") => 'false',
                    __("Yes", "mk_framework") => 'true'
                ),
                "description" => __("Would you like to display the form title?", "mk_framework"),
                "dependency" => array(
                    'element' => "id",
                    'not_empty' => true
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Display Form Description", "mk_framework"),
                "param_name" => "description",
                "value" => array(
                    __("No", "mk_framework") => 'false',
                    __("Yes", "mk_framework") => 'true'
                ),
                "description" => __("Would you like to display the forms description?", "mk_framework"),
                "dependency" => array(
                    'element' => "id",
                    'not_empty' => true
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Enable AJAX?", "mk_framework"),
                "param_name" => "ajax",
                "value" => array(
                    __("No", "mk_framework") => 'false',
                    __("Yes", "mk_framework") => 'true'
                ),
                "description" => __("Enable AJAX form submission?", "mk_framework"),
                "dependency" => array(
                    'element' => "id",
                    'not_empty' => true
                )
            ),
            array(
                "type" => "textfield",
                "heading" => __("Tab Index", "mk_framework"),
                "param_name" => "tabindex",
                "description" => __("(Optional) Specify the starting tab index for the fields of this form. Leave blank if you're not sure what this is.", "mk_framework"),
                "dependency" => array(
                    'element' => "id",
                    'not_empty' => true
                )
            )
        )
    ));
}
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
    global $wpdb;
    $cf7           = $wpdb->get_results("
    SELECT ID, post_title
    FROM $wpdb->posts
    WHERE post_type = 'wpcf7_contact_form'
    ");
    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->post_title] = $cform->ID;
        }
    } else {
        $contact_forms["No contact forms found"] = 0;
    }
    vc_map(array(
        "base" => "contact-form-7",
        "name" => __("Contact Form 7", "mk_framework"),
        "icon" => "icon-wpb-contactform7",
        "category" => __('Plugins', 'mk_framework'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Form title", "mk_framework"),
                "param_name" => "title",
                "admin_label" => true,
                "description" => __("The title for your form. Leave blank if no title is needed.", "mk_framework")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Select contact form", "mk_framework"),
                "param_name" => "id",
                "value" => $contact_forms,
                "description" => __("Choose previously created contact form from the drop down list.", "mk_framework")
            )
        )
    ));
}
if ( class_exists( 'woocommerce' ) ) {
vc_map(array(
    "base" => "mk_woocommerce_recent_carousel",
    "name" => __("WooCommerce Carousel", "mk_framework"),
    "category" => __('Plugins', 'mk_framework'),
    'icon' => 'icon-mk-woo-recent-carousel vc_mk_element-icon',
    "params" => array(
        array(
            "heading" => __("Style", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Modern", 'mk_framework') => "modern",
                __("Classic", 'mk_framework') => "classic"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => "New Arrivals",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Featured Products?", "mk_framework"),
            "param_name" => "featured",
            "value" => "false",
            "description" => __("Enable this option if you want to show featured products.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Products Per View", "mk_framework"),
            "param_name" => "per_view",
            "value" => "4",
            "min" => "1",
            "max" => "8",
            "step" => "1",
            "unit" => 'products',
            "description" => __("", "mk_framework"),
             "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("How many Posts?", "mk_framework"),
            "param_name" => "per_page",
            "value" => "-1",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("How many Posts you would like to show? ( -1 means unlimited, please note that unlimited will be overridden by the limit you defined at : Wordpress Sidebar > Settings > Reading > Blog pages show at most.)", "mk_framework")
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
            "description" => __("Sort retrieved Woocommerce items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
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
    "name" => __("Raw HTML", "mk_framework"),
    "base" => "vc_raw_html",
    'icon' => 'icon-mk-raw-html vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    'description' => __( 'Output raw HTML code in your page', 'mk_framework' ),
    "wrapper_class" => "clearfix",
    "params" => array(
        array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "heading" => __("Raw HTML", "mk_framework"),
            "param_name" => "content",
            "value" => base64_encode("<p>I am raw html block.<br/>Click edit button to change this html</p>"),
            "description" => __("Enter your HTML content here.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Raw JS", "mk_framework"),
    "base" => "vc_raw_js",
    'icon' => 'icon-mk-raw-js vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    'description' => __( 'Output raw javascript code in your page', 'mk_framework' ),
    "wrapper_class" => "clearfix",
    "params" => array(
        array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "heading" => __("Raw js", "mk_framework"),
            "param_name" => "content",
            "value" => __(base64_encode("<script type='text/javascript'> alert('Enter your js here!'); </script>"), "mk_framework"),
            "description" => __("Enter your JS code here.", "mk_framework")
        )
    )
));

vc_map(array(
    "name" => __("Animated Columns", "mk_framework"),
    "base" => "mk_animated_columns",
    'icon' => 'icon-mk-animated-columns vc_mk_element-icon',
    'description' => __( 'Columns with cool animations.', 'mk_framework' ),
    "category" => __('General', 'mk_framework'),
    "params" => array(
        array(
            "type" => "range",
            "heading" => __("Column Height", "mk_framework"),
            "param_name" => "column_height",
            "value" => "500",
            "min" => "100",
            "max" => "1200",
            "step" => "1",
            "unit" => 'px',
            "description" => __("Set the columns height", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("How many Columns?", "mk_framework"),
            "param_name" => "column_number",
            "value" => "4",
            "min" => "1",
            "max" => "8",
            "step" => "1",
            "unit" => 'columns',
            "description" => __("How many columns would you like to show in one row?", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Choose the Animated Columns", "mk_framework"),
            "param_name" => "columns",
            "value" => '',
            "options" => $animated_columns,
            "description" => __("If you do not see anything here, it means you have no animated columns yet. First you should create animated column post types here: Wordpress Side Menu > Animated Columns. ", "mk_framework")
        ),

        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved pricing items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Column Content & Style", "mk_framework"),
            "param_name" => "style",
            "value" => array(
                "Full featured (All content)" => "full",
                "Simple (Icon + Title)" => "simple",
            ),
            "description" => __("Choose what type of content should be placed inside columns. Each style has different content and hover scenarios.", "mk_framework")
        ),
        array(
            'type' => 'range',
            "heading" => __("Title Font Size", "mk_framework"),
            "param_name" => "title_size",
            "value" => "20",
            "min" => "9",
            "max" => "60",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")

        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Columns Border Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Columns background Color", "mk_framework"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Columns background Hover Color", "mk_framework"),
            "param_name" => "bg_hover_color",
            "value" => "",
            "description" => __("Columns background color will change to this color once the user's mouse rolls over on a particular column.", "mk_framework")
        ),

        array(
            "type" => "dropdown",
            "heading" => __("Icon Size", "mk_framework"),
            "param_name" => "icon_size",
            "value" => array(
                __('16px', "mk_framework") => "16",
                __('32px', "mk_framework") => "32",
                __('48px', "mk_framework") => "48",
                __('64px', "mk_framework") => "64",
                __('128px', "mk_framework") => "128"
            ),
            "description" => __("Choose the icon size by pixel.", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Icon Hover Color", "mk_framework"),
            "param_name" => "icon_hover_color",
            "value" => "",
            "description" => __("Columns Icon color will change to this color once the user's mouse rolls over on a particular column.", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Text Color (Active)", "mk_framework"),
            "param_name" => "txt_color",
            "value" => "",
            "description" => __("The color of title and description inside the column. Description text though, is 70% translucent.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Text Color (Hover)", "mk_framework"),
            "param_name" => "txt_hover_color",
            "value" => "",
            "description" => __("Column's title and description color will change to this color once the user's mouse rolls over on a particular column.", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Button Color (Active)", "mk_framework"),
            "param_name" => "btn_color",
            "value" => "",
            "description" => __("The color of button inside the column.", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Button Color (Hover)", "mk_framework"),
            "param_name" => "btn_hover_color",
            "value" => "",
            "description" => __("Column's button color will change to this color once the user's mouse rolls over on a particular column.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Text Color (Hover)", "mk_framework"),
            "param_name" => "btn_hover_txt_color",
            "value" => "",
            "description" => __("", "mk_framework")
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
    "name" => __("Tab Slider", "mk_framework"),
    "base" => "mk_tab_slider",
    'icon' => 'icon-mk-tab-slider vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    'description' => __( 'Tab based slider.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "multiselect",
            "heading" => __("Choose the Tabs", "mk_framework"),
            "param_name" => "tabs",
            "value" => '',
            "options" => $tab_slider,
            "description" => __("", "mk_framework")
        ),

        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
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
            "heading" => __("Slideshow Speed", "mk_framework"),
            "param_name" => "autoplay_time",
            "value" => "5000",
            "min" => "0",
            "max" => "50000",
            "step" => "1",
            "unit" => 'ms',
            "description" => __("If set to zero the autoplay will be disabled, any number above zeo will define the delay between each slide transition.", "mk_framework"),
            'type' => 'range'
        ),
        $add_css_animations,
        array(
            "heading" => __("Navigation Button Size", "mk_framework"),
            "param_name" => "button_size",
            "value" => "20",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Navigation Button Color", "mk_framework"),
            "param_name" => "button_color",
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
    "name" => __("Flip Box", "mk_framework"),
    "base" => "mk_flipbox",
    'icon' => 'icon-mk-tab-slider vc_mk_element-icon',
    "category" => __('General', 'mk_framework'),
    'description' => __( 'Flip based boxes.', 'mk_framework' ),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => __("Flip Direction", "mk_framework"),
            "param_name" => "flip_direction",
            "width" => 300,
            "value" => array(
                __('Horizontal', "mk_framework") => "horizontal",
                __('Vertical', "mk_framework") => "vertical"
            ),
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "colorpicker",
            "heading" => __("Front Background Color", "mk_framework"),
            "param_name" => "front_background_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Back Background Color", "mk_framework"),
            "param_name" => "back_background_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "heading" => __("Minimum Height", "mk_framework"),
            "param_name" => "min_height",
            "value" => "300",
            "min" => "250",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            'type' => 'range'
        ),

        array(
            "heading" => __("Icon Type", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "icon_type",
            "value" => array(
                __("Image", 'mk_framework') => "image",
                __("Icon", 'mk_framework') => "icon"
            ),
            "type" => "dropdown"
        ),

        array(
            "type" => "upload",
            "heading" => __("Image", "mk_framework"),
            "param_name" => "image",
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
            "type" => "textfield",
            "heading" => __("Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "mk-li-smile",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "heading" => __("Icon Size", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "icon_size",
            "value" => array(
                __("16px", 'mk_framework') => "16",
                __("32px", 'mk_framework') => "32",
                __("64px", 'mk_framework') => "64",
                __("128px", 'mk_framework') => "128",
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),

        array(
            "type" => "textfield",
            "heading" => __("Front Title", "mk_framework"),
            "param_name" => "front_title",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "heading" => __("Front Title Font Size", "mk_framework"),
            "param_name" => "front_title_size",
            "value" => "20",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Front Title Font Color", "mk_framework"),
            "param_name" => "front_title_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "textfield",
            "heading" => __("Back Title", "mk_framework"),
            "param_name" => "back_title",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "heading" => __("Back Title Font Size", "mk_framework"),
            "param_name" => "back_title_size",
            "value" => "20",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Back Title Font Color", "mk_framework"),
            "param_name" => "back_title_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Title Font Weight", "mk_framework"),
            "param_name" => "font_weight",
            "width" => 200,
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
            "type" => "textarea",
            "heading" => __("Front Description", "mk_framework"),
            "param_name" => "front_desc",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "heading" => __("Front Description Font Size", "mk_framework"),
            "param_name" => "front_desc_size",
            "value" => "20",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Front Description Font Color", "mk_framework"),
            "param_name" => "front_desc_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "textarea",
            "heading" => __("Back Description", "mk_framework"),
            "param_name" => "back_desc",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "heading" => __("Back Description Font Size", "mk_framework"),
            "param_name" => "back_desc_size",
            "value" => "20",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Back Description Font Color", "mk_framework"),
            "param_name" => "back_desc_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),

        array(
            "type" => "textfield",
            "heading" => __("Button Url", "mk_framework"),
            "param_name" => "button_url",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Text", "mk_framework"),
            "param_name" => "button_text",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Background Color", "mk_framework"),
            "param_name" => "button_bg_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Hover Background Color", "mk_framework"),
            "param_name" => "button_bg_hover_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Text Skin", "mk_framework"),
            "param_name" => "button_text_skin",
            "width" => 300,
            "value" => array(
                __('Light', "mk_framework") => "light",
                __('Dark', "mk_framework") => "dark"
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
