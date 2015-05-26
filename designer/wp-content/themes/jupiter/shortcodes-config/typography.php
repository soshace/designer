<?php

vc_map(array(
    "name" => __("Fancy Title", "mk_framework"),
    "base" => "mk_fancy_title",
    'icon' => 'icon-mk-fancy-title vc_mk_element-icon',
    "category" => __('Typography', 'mk_framework'),
    'description' => __( 'Advanced headings with cool styles.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Content.", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Tag Name", "mk_framework"),
            "param_name" => "tag_name",
            "value" => array(
                "h2" => "h2",
                "h3" => "h3",
                "h4" => "h4",
                "h5" => "h5",
                "h6" => "h6",
                "h1" => "h1"
            ),
            "description" => __("For SEO reasons you might need to define your titles tag names according to priority. Please note that H1 can only be used only once in a page due to the SEO reasons. So try to use lower than H2 to meet SEO best practices.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pattern?", "mk_framework"),
            "param_name" => "style",
            "value" => "false",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Text Color", "mk_framework"),
            "param_name" => "color",
            "value" => "#393836",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Font Size", "mk_framework"),
            "param_name" => "size",
            "value" => "14",
            "min" => "12",
            "max" => "70",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Font Weight", "mk_framework"),
            "param_name" => "font_weight",
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
            "type" => "dropdown",
            "heading" => __("Font Style", "mk_framework"),
            "param_name" => "font_style",
            "value" => array(
                __('Default', "mk_framework") => "inhert",
                __('Normal', "mk_framework") => "normal",
                __('Italic', "mk_framework") => "italic",
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Text Transform", "mk_framework"),
            "param_name" => "txt_transform",
            "value" => array(
                __('Default', "mk_framework") => "",
                __('None', "mk_framework") => "none",
                __('Uppercase', "mk_framework") => "uppercase",
                __('Lowercase', "mk_framework") => "lowercase",
                __('Capitalize', "mk_framework") => "capitalize"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Letter Spacing", "mk_framework"),
            "param_name" => "letter_spacing",
            "value" => "0",
            "min" => "0",
            "max" => "10",
            "step" => "1",
            "unit" => 'px',
            "description" => __("Space between each character.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Top", "mk_framework"),
            "param_name" => "margin_top",
            "value" => "0",
            "min" => "-40",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "18",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
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
    "name" => __("Title Box", "mk_framework"),
    "base" => "mk_title_box",
    "category" => __('Typography', 'mk_framework'),
    'icon' => 'icon-mk-title-box vc_mk_element-icon',
    'description' => __( 'Adds title text into a highlight box.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textarea_html",
            "rows" => 2,
            "holder" => "div",
            "heading" => __("Content.", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("Allowed Tags [br] [strong] [i] [u] [b] [a] [small]. Please note that [p] tags will be striped out.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Text Color", "mk_framework"),
            "param_name" => "color",
            "value" => "#393836",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Highlight Background Color", "mk_framework"),
            "param_name" => "highlight_color",
            "value" => "",
            "description" => __("The Highlight Background color. you can change color opacity from below option.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Highlight Color Opacity", "mk_framework"),
            "param_name" => "highlight_opacity",
            "value" => "0.3",
            "min" => "0",
            "max" => "1",
            "step" => "0.01",
            "unit" => 'px',
            "description" => __("The Opacity of the highlight background", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Font Size", "mk_framework"),
            "param_name" => "size",
            "value" => "18",
            "min" => "12",
            "max" => "70",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Line Height (Important)", "mk_framework"),
            "param_name" => "line_height",
            "value" => "34",
            "min" => "12",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("Since every font family with differnt sizes need different line heights to get a nice looking highlighted titles you should set them manually. as a hint generally (font-size * 2) - 2 works in many cases, but you may need to give more space in between, so we opened your hands with this option. :) ", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Font Weight", "mk_framework"),
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
            "heading" => __("Letter Spacing", "mk_framework"),
            "param_name" => "letter_spacing",
            "value" => "0",
            "min" => "0",
            "max" => "10",
            "step" => "1",
            "unit" => 'px',
            "description" => __("Space between each character.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Stroke Width", "mk_framework"),
            "param_name" => "stroke",
            "value" => "0",
            "min" => "0",
            "max" => "10",
            "step" => "1",
            "unit" => 'px',
            "description" => __("Using this option you can set a frame around the title.", "mk_framework")
        ),
         array(
            "type" => "colorpicker",
            "heading" => __("Stroke Color", "mk_framework"),
            "param_name" => "stroke_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Top", "mk_framework"),
            "param_name" => "margin_top",
            "value" => "0",
            "min" => "-40",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("In some ocasions you may on need to define a top margin for this title.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Bottom", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "18",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
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
    "name" => __("Blockquote", "mk_framework"),
    "base" => "mk_blockquote",
    "category" => __('Typography', 'mk_framework'),
    'icon' => 'icon-mk-blockquote vc_mk_element-icon',
    'description' => __( 'Blockquote modules', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Blockquote Message", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                __('Quote Style', "mk_framework") => "quote-style",
                __('Line Style', "mk_framework") => "line-style"
            ),
            "description" => __("Using this option you can choose blockquote style.", "mk_framework")
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
            "type" => "range",
            "heading" => __("Text Size", "mk_framework"),
            "param_name" => "text_size",
            "value" => "12",
            "min" => "12",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("You can set blockquote text size from the below option.", "mk_framework")
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
    "name" => __("Dropcaps", "mk_framework"),
    "base" => "mk_dropcaps",
    'icon' => 'icon-mk-dropcaps vc_mk_element-icon',
    "category" => __('Typography', 'mk_framework'),
    'description' => __( 'Dropcaps element shortcode.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => __("Dropcaps Character", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework"),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                __('Simple', "mk_framework") => "simple-style",
                __('Fancy', "mk_framework") => "fancy-style"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Font Size", "mk_framework"),
            "param_name" => "size",
            "value" => "14",
            "min" => "12",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'fancy-style'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Padding", "mk_framework"),
            "param_name" => "padding",
            "value" => "10",
            "min" => "5",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("You can set padding for dropcaps.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'fancy-style'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "mk_framework"),
            "param_name" => "background_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'fancy-style'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Text Color", "mk_framework"),
            "param_name" => "text_color",
            "value" => "",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'fancy-style'
                )
            )
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
    "name" => __("Highlight Text", "mk_framework"),
    "base" => "mk_highlight",
    'icon' => 'icon-mk-highlight vc_mk_element-icon',
    "category" => __('Typography', 'mk_framework'),
    'description' => __( 'adds highlight to an inline text.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Highlight Text", "mk_framework"),
            "param_name" => "text",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Text Color", "mk_framework"),
            "param_name" => "text_color",
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
/*        array(
            "type" => "fonts",
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
*/        
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
    "name" => __("Tooltip", "mk_framework"),
    "base" => "mk_tooltip",
    'icon' => 'icon-mk-tooltip vc_mk_element-icon',
    "category" => __('Typography', 'mk_framework'),
    'description' => __( 'Adds Tooltips to inline texts.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Text", "mk_framework"),
            "param_name" => "text",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tooltip Text", "mk_framework"),
            "param_name" => "tooltip_text",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tooltip URL", "mk_framework"),
            "param_name" => "href",
            "value" => "",
            "description" => __("You can optionally link the tooltip text to a webpage.", "mk_framework")
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
    "name" => __("Custom List", "mk_framework"),
    "base" => "mk_custom_list",
    "category" => __('Typography', 'mk_framework'),
    'icon' => 'icon-mk-custom-list vc_mk_element-icon',
    'description' => __( 'Powerful list styles with icons.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("List Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Add your unordered list into this textarea. Allowed Tags : [ul][li][strong][i][em][u][b][a][small]", "mk_framework"),
            "param_name" => "content",
            "value" => "<ul><li>List Item</li></ul>",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Character Code", "mk_framework"),
            "param_name" => "style",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon Character code.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icons Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => $skin_color,
            "description" => __("", "mk_framework"),
            "group" => "Design",
        ),
        array(
            "type" => "range",
            "heading" => __("Margin Button", "mk_framework"),
            "param_name" => "margin_bottom",
            "value" => "30",
            "min" => "-30",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework"),
            "group" => "Design",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Align", "mk_framework"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                __('No Align', "mk_framework") => "none",
                __('Left', "mk_framework") => "left",
                __('Right', "mk_framework") => "right"
            ),
            "description" => __("Please note that align left and right will make the shortcode to float, therefore in order to keep your page elements from wrapping into each other you should add a padding divider shortcode right after this shortcode.", "mk_framework"),
            "group" => "Design",
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
    "name" => __("Font icons", "mk_framework"),
    "base" => "mk_font_icons",
    'icon' => 'icon-mk-font-icon vc_mk_element-icon',
    "category" => __('Typography', 'mk_framework'),
    'description' => __( 'Advanced font icon element', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("icon Color", "mk_framework"),
            "param_name" => "color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Icon Size", "mk_framework"),
            "param_name" => "size",
            "value" => array(
                "16px" => "small",
                "32px" => "medium",
                "48px" => "large",
                "64px" => "x-large",
                "128px" => "xx-large",
                "256px" => "xxx-large"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Horizontal Margin", "mk_framework"),
            "param_name" => "margin_horizental",
            "value" => "4",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("You can give padding to the icon. this padding will be applied to left and right side of the icon", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Vertical Margin", "mk_framework"),
            "param_name" => "margin_vertical",
            "value" => "4",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("You can give padding to the icon. this padding will be applied to top and bottom of them icon", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Circle Box?", "mk_framework"),
            "param_name" => "circle",
            "value" => "false",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Circle Color", "mk_framework"),
            "param_name" => "circle_color",
            "value" => "",
            "description" => __("If Circle Enabled you can set the rounded box background color using this color picker.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Icon Align", "mk_framework"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                __('No Align', "mk_framework") => "none",
                __('Left', "mk_framework") => "left",
                __('Right', "mk_framework") => "right",
                __('Center', "mk_framework") => "center"
            ),
            "description" => __("Please note that align left and right will make the icons to float, therefore in order to keep your page elements from wrapping into each other you should add a padding divider shortcode right after the last icon.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "mk_framework"),
            "param_name" => "link",
            "value" => "",
            "description" => __("You can optionally link your icon. please provide full URL including http://", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Link Target", "mk_framework"),
            "param_name" => "target",
            "value" => $target_arr,
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
    "name" => __("Toggle", "mk_framework"),
    "base" => "mk_toggle",
    "wrapper_class" => "clearfix",
    'icon' => 'icon-mk-toggle vc_mk_element-icon',
    "category" => __('Typography', 'mk_framework'),
    'description' => __( 'Expandable toggle element', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                __('Simple', "mk_framework") => "simple",
                __('Fancy', "mk_framework") => "fancy"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Toggle Title", "mk_framework"),
            "param_name" => "title",
            "value" => ""
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Toggle Content.", "mk_framework"),
            "param_name" => "content",
            "value" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name for Title", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework"),
             "dependency" => array(
                'element' => "style",
                'value' => array(
                    'fancy'
                )
            ),
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
$tab_id_1 = time() . '-1-' . rand(0, 100);
$tab_id_2 = time() . '-2-' . rand(0, 100);
vc_map(array(
    "name" => __("Tabs", "mk_framework"),
    "base" => "vc_tabs",
    "show_settings_on_create" => false,
    "is_container" => true,
    'icon' => 'icon-mk-tabs vc_mk_element-icon',
    "category" => __('Content', 'mk_framework'),
    'description' => __( 'Tabbed content', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "heading_title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "value" => array(
                "Default" => "default",
                "Simple" => "simple"
            ),
            "description" => __("Please choose your tabs style", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Orientation", "mk_framework"),
            "param_name" => "orientation",
            "value" => array(
                "Horizontal" => "horizental",
                "Vertical" => "vertical"
            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'default'
                )
            ),
            "description" => __("Note : This option is only for deafult style", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Tab location", "mk_framework"),
            "param_name" => "tab_location",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "description" => __("Which side would you like the tabs list appear?", "mk_framework"),
            "dependency" => array(
                'element' => "orientation",
                'value' => array(
                    'vertical'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Container Background Color", "mk_framework"),
            "param_name" => "container_bg_color",
            "value" => "#fff",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    ),
    "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>',
    'default_content' => '
  [vc_tab title="' . __('Tab 1', 'mk_framework') . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
  [vc_tab title="' . __('Tab 2', 'mk_framework') . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
  ',
    "js_view" => 'VcTabsView'
));
vc_map(array(
    "name" => __("Tab", "mk_framework"),
    "base" => "vc_tab",
    "allowed_container_element" => 'vc_row',
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "description" => __("Tab title.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name (optional)", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        )
    ),
    'js_view' => 'VcTabView'
));
vc_map(array(
    "name" => __("Accordion", "mk_framework"),
    "base" => "vc_accordions",
    "show_settings_on_create" => false,
    "is_container" => true,
    'icon' => 'icon-mk-accordion vc_mk_element-icon',
    'description' => __( 'Collapsible content panels', 'mk_framework' ),
    "category" => __('Content', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "heading_title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                __('Fancy', "mk_framework") => "fancy-style",
                __('Simple', "mk_framework") => "simple-style"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Action Style", "mk_framework"),
            "param_name" => "action_style",
            "width" => 400,
            "value" => array(
                __('One Toggle Open At A Time', "mk_framework") => "accordion-action",
                __('Multiple Toggles Open At A Time', "mk_framework") => "toggle-action"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Initial Index", "mk_framework"),
            "param_name" => "open_toggle",
            "value" => "0",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'index',
            "description" => __("Specify which toggle to be open by default when The page loads. please note that this value is zero based therefore zero is the first item. this option works when you have chosen [One Toggle Open At A Time] option from above setting. -1 will close all accordions on page load.", "mk_framework"),
            "dependency" => array(
                "element" => "action_style",
                "value" => array(
                    "accordion-action"
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Container Background Color", "mk_framework"),
            "param_name" => "container_bg_color",
            "value" => "#fff",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "mk_framework")
        )
    ),
    "custom_markup" => '
  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
  %content%
  </div>
  <div class="tab_controls">
  <a class="add_tab" title="' . __( 'Add section', 'mk_framework' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . __( 'Add section', 'mk_framework' ) . '</span></a>
  </div>
  ',
    'default_content' => '
  [vc_accordion_tab title="' . __('Section 1', "mk_framework") . '"][/vc_accordion_tab]
  [vc_accordion_tab title="' . __('Section 2', "mk_framework") . '"][/vc_accordion_tab]
  ',
    'js_view' => 'VcAccordionView'
));
vc_map(array(
    "name" => __("Accordion Section", "mk_framework"),
    "base" => "vc_accordion_tab",
    "allowed_container_element" => 'vc_row',
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "description" => __("Accordion section title.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Add Icon Class Name (optional)", "mk_framework"),
            "param_name" => "icon",
            "value" => "",
            "description" => __("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "mk_framework")
        )
    ),
    'js_view' => 'VcAccordionTabView'
));
