<?php
$theme_options_styling = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_skining'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_general_skin" => __("General Colors", "mk_framework"),
            "mk_options_backgrounds_skin" => __("Backgrounds", "mk_framework"),         
            "mk_options_backgrounds_header" => __("Header", "mk_framework"),            
            "mk_options_main_navigation_skin" => __("Main Navigation", "mk_framework"),
            "mk_options_header_toolbar_skin" => __("Header Toolbar", "mk_framework"),
            "mk_options_header_banner_skin" => __("Page Title", "mk_framework"),
            "mk_options_dashboard_skin" => __("Side Dashboard", "mk_framework"),
            "mk_options_fullscreen_nav_skin" => __("Full Screen Navigation", "mk_framework"),
            "mk_options_sidebar_skin" => __("Sidebar", "mk_framework"),
            "mk_options_footer_skin" => __("Footer", "mk_framework")
        )
    ),
    
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_general_skin'
    ),
    array(
        "name" => __("Styling & Coloring / General Colors", "mk_framework"),
        "desc" => __("These options defines your site's general colors.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "heading" => __("Theme General Color Options", "mk_framework"),
        "above_content" => '',
        "type" => "groupset"
    ),
    array(
        "name" => __('Theme Accent Color', "mk_framework"),
        "desc" => __("The theme main color that will be applied to some elements.", "mk_framework"),
        "id" => "skin_color",
        "default" => "#f97352",
        "type" => "color"
    ),
    array(
        "name" => __('Body Text Color', "mk_framework"),
        "id" => "body_text_color",
        "default" => "#777777",
        "type" => "color"
    ),
     array(
        "name" => __('Paragraph (p)', "mk_framework"),
        "id" => "p_color",
        "default" => "#777777",
        "type" => "color"
    ),
    array(
        "name" => __('Content Links Color', "mk_framework"),
        "id" => "a_color",
        "default" => "#2e2e2e",
        "type" => "color"
    ),
    array(
        "name" => __('Content Links Hover Color', "mk_framework"),
        "id" => "a_color_hover",
        "default" => "#f97352",
        "type" => "color"
    ),
    array(
        "name" => __('Content Strong tag Color', "mk_framework"),
        "id" => "strong_color",
        "default" => "#f97352",
        "type" => "color"
    ),
    array(
        "type" => "groupset_end"
    ),
    array(
        "heading" => __("Theme Headings Color Options", "mk_framework"),
        "above_content" => '',
        "type" => "groupset"
    ),
    array(
        "name" => __('Heading 1', "mk_framework"),
        "id" => "h1_color",
        "default" => "#404040",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 2', "mk_framework"),
        "id" => "h2_color",
        "default" => "#404040",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 3', "mk_framework"),
        "id" => "h3_color",
        "default" => "#404040",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 4', "mk_framework"),
        "id" => "h4_color",
        "default" => "#404040",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 5', "mk_framework"),
        "id" => "h5_color",
        "default" => "#404040",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 6', "mk_framework"),
        "id" => "h6_color",
        "default" => "#404040",
        "type" => "color"
    ),
    array(
        "type" => "groupset_end"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_backgrounds_skin'
    ),
    array(
        "name" => __("Styling / Backgrounds", "mk_framework"),
        "desc" => __("In this section you can modify all the backgrounds of your site including header, page, body, footer. Here, you can set the layout you would like your site to look like, then click on different layout sections to add/create different backgrounds.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Choose between boxed and full width layout", 'mk_framework'),
        "desc" => __("Choose between a full or a boxed layout to set how your website's layout will look like.", 'mk_framework'),
        "id" => "background_selector_orientation",
        "default" => "full_width_layout",
        "item_padding" => "0px 30px 20px 0",
        "options" => array(
            "boxed_layout" => 'boxed-layout.png',
            "full_width_layout" => 'full-width-layout.png'
        ),
        "type" => "visual_selector"
    ),
    array(
        "name" => __("Boxed Layout Outer Shadow Size", "mk_framework"),
        "desc" => __("You can have a outer shadow around the box. using this option you in can modify its range size", "mk_framework"),
        "id" => "boxed_layout_shadow_size",
        "default" => "0",
        "min" => "0",
        "max" => "60",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Boxed Layout Outer Shadow Intensity", "mk_framework"),
        "desc" => __("determines how darker the shadow to be.", "mk_framework"),
        "id" => "boxed_layout_shadow_intensity",
        "default" => "0",
        "min" => "0",
        "max" => "1",
        "step" => "0.01",
        "unit" => 'alpha',
        "type" => "range"
    ),
    array(
        "name" => __("Background color & texture", 'mk_framework'),
        "desc" => __("Please click on the different sections to modify their backgrounds.", 'mk_framework'),
        "id" => 'general_backgounds',
        "type" => "general_background_selector"
    ),
    array(
        "id" => "body_color",
        "default" => "#fff",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_color",
        "default" => "#fff",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_color",
        "default" => "#fff",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_color",
        "default" => "#f7f7f7",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_size",
        "default" => "true",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_color",
        "default" => "#3d4045",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_backgrounds_header'
    ),
    array(
        "name" => __("Styling / Backgrounds", "mk_framework"),
        "desc" => __("In this section you can modify all the backgrounds of your site including header, page, body, footer. Here, you can set the layout you would like your site to look like, then click on different layout sections to add/create different backgrounds.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Header Background Opacity.", "mk_framework"),
        "desc" => __("You can change the opacity of your header section.", "mk_framework"),
        "id" => "header_opacity",
        "min" => "0",
        "max" => "1",
        "step" => "0.1",
        "unit" => 'opacity',
        "default" => "1",
        "type" => "range"
    ),
    array(
        "name" => __("Sticky Header Background Opacity", "mk_framework"),
        "desc" => __("The opacity of the sticky header section (after scroll header will be fixed to the top of window).", "mk_framework"),
        "id" => "header_sticky_opacity",
        "min" => "0",
        "max" => "1",
        "step" => "0.1",
        "unit" => 'opacity',
        "default" => "1",
        "type" => "range"
    ),
    array(
        "name" => __("Header Bottom Border Thickness", "mk_framework"),
        "desc" => __("This option will set the header bottom border thickness.", "mk_framework"),
        "id" => "header_btn_border_thickness",
        "min" => "0",
        "max" => "10",
        "step" => "1",
        "unit" => 'px',
        "default" => "1",
        "type" => "range"
    ),
    array(
        "name" => __('Header Bottom Border Color', "mk_framework"),
        "desc" => __("In all header styles this option will add/remove border bottom color to header section. This option will also add Main Navigation wrapper top border in header style 2.", "mk_framework"),
        "id" => "header_border_color",
        "default" => "#ededed",
        "type" => "color"
    ),
    array(
        "name" => __('Sticky Header Bottom Border Color', "mk_framework"),
        "desc" => __("This border color will be used for sticky header border color. If left blank above option will used instead.", "mk_framework"),
        "id" => "sticky_header_border_color",
        "default" => "",
        "type" => "color"
    ),
    
    array(
        "heading" => __("Header Social Networks Color Options", "mk_framework"),
        "above_content" => '',
        "type" => "groupset"
    ),
    array(
        "name" => __('Icon Color', "mk_framework"),
        "id" => "header_social_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Icon Hover Color', "mk_framework"),
        "id" => "header_social_hover_color",
        "default" => "#ccc",
        "type" => "color"
    ),
    array(
        "name" => __('Border Color', "mk_framework"),
        "id" => "header_social_border_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Background Color', "mk_framework"),
        "id" => "header_social_bg_main_color",
        "default" => "#232323",
        "type" => "color"
    ),
    array(
        "name" => __('Hover Background Color', "mk_framework"),
        "id" => "header_social_bg_color",
        "default" => "#232323",
        "type" => "color"
    ),
     array(
        "type" => "groupset_end"
    ),

    array(
        "name" => __('Header Start Tour Link Color', "mk_framework"),
        "id" => "start_tour_color",
        "default" => "#333",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_main_navigation_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Main Navigation", "mk_framework"),
        "desc" => __("In this section you can modify the coloring of Main Navigation Section.", "mk_framework"),
        "type" => "heading"
    ),
    
        array(
        "name" => __("Header Main Navigation Hover Style", "mk_framework"),
        "desc" => __("Please note that hover style 5 does not work in header style 4.", "mk_framework"),
        "id" => "main_nav_hover",
        "default" => "5",
        "options" => array(
            "1" => 'header-hover-1.jpg',
            "2" => 'header-hover-2.jpg',
            "3" => 'header-hover-3.jpg',
            "4" => 'header-hover-4.jpg',
            "5" => 'header-hover-5.jpg',
        ),
        "type" => "visual_selector"
    ),
        array(
        "name" => __('Container Color Background Color', "mk_framework"),
        "desc" => __("This option will put your main navigation in a colored container. Use this option in header style #2", "mk_framework"),
        "id" => "main_nav_bg_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Top Level Text Color', "mk_framework"),
        "id" => "main_nav_top_text_color",
        "default" => "#444444",
        "type" => "color"
    ),
    array(
        "name" => __('Top Level Hover & Current Skin Color', "mk_framework"),
        "desc" => __("The Main Menu hover & current menu item hover skin color. This color will be applied to the hover style you have chosen in above option (Header Main Navigation Hover Style).", "mk_framework"),
        "id" => "main_nav_top_hover_skin",
        "default" => "#f97352",
        "type" => "color"
    ),
    array(
        "name" => __('Top Level Hover & Current Text Color (Hover Style 3 & 4 Only)', "mk_framework"),
        "desc" => __("This option will only work for main navigation hover style 3 current item text color and style 4 current & hover text color.", "mk_framework"),
        "id" => "main_nav_top_hover_txt_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Box Width', "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "main_nav_sub_width",
        "min" => "100",
        "max" => "500",
        "step" => "1",
        "unit" => 'px',
        "default" => "230",
        "type" => "range"
    ),
    array(
        "name" => __('Sub Level Box Border Top Color', "mk_framework"),
        "desc" => __("If you want to remove this border leave this option empty.", "mk_framework"),
        "id" => "main_nav_sub_border_top_color",
        "default" => "#f97352",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Background Color', "mk_framework"),
        "id" => "main_nav_sub_bg_color",
        "default" => "#333333",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Text Color', "mk_framework"),
        "id" => "main_nav_sub_text_color",
        "default" => "#b3b3b3",
        "type" => "color"
    ),

    array(
        "name" => __('Sub Level Text Hover Color', "mk_framework"),
        "id" => "main_nav_sub_text_color_hover",
        "default" => "#ffffff",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Icon Color', "mk_framework"),
        "id" => "main_nav_sub_icon_color",
        "default" => "#e0e0e0",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Hover Background Color', "mk_framework"),
        "id" => "main_nav_sub_hover_bg_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Mega menu title color ', "mk_framework"),
        "id" => "main_nav_mega_title_color",
        "default" => "#ffffff",
        "type" => "color"
    ),
     array(
        "name" => __("Sub Level Box Shadow", "mk_framework"),
        "desc" => __("This option will add shadow to menu sub level boxes.", "mk_framework"),
        "id" => "nav_sub_shadow",
        "default" => 'false',
        "type" => "toggle"
    ),
     array(
        "name" => __('Sub Level Box Border Color', "mk_framework"),
        "id" => "sub_level_box_border_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __("Mega Menu column Vertical Divders Color", "mk_framework"),
        "desc" => __("Using this option you can change mega menu vertical dividers color. If you dont want those dividers simply clear the option value.", "mk_framework"),
        "id" => "mega_menu_divider_color",
        "default" => '',
        "type" => "color"
    ),
    
    array(
        "name" => __('Mobile Menu Trigger Icon Color', "mk_framework"),
        "desc" => __("If this option left blank 'Top Level Text Color' option will be used instead. This option is useful for header style 2.", "mk_framework"),
        "id" => "responsive_icon_text_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Responsive Navigation Background Color', "mk_framework"),
        "id" => "responsive_nav_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Responsive Navigation Text Color', "mk_framework"),
        "id" => "responsive_nav_txt_color",
        "default" => "#444444",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_toolbar_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Header Toolbar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Background Color', "mk_framework"), 
        "id" => "header_toolbar_bg",
        "default" => "#ffffff",
        "type" => "color"
    ),
    array(
        "name" => __('Border Bottom Color', "mk_framework"),
        "id" => "header_toolbar_border_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Text Color', "mk_framework"),
        "id" => "header_toolbar_txt_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Link Color', "mk_framework"),
        "id" => "header_toolbar_link_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Social Network Icon Color', "mk_framework"),
        "id" => "header_toolbar_social_network_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Search Form Input Background Color', "mk_framework"),
        "id" => "header_toolbar_search_input_bg",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Search Form Input Text Color', "mk_framework"),
        "id" => "header_toolbar_search_input_txt",
        "default" => "#c7c7c7",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_banner_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Page Title", "mk_framework"),
        "desc" => __("In this section you can modify coloring of Header Page Title and Subtitle.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Page Title Color', 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "page_title_color",
        "default" => "#4d4d4d",
        "type" => "color"
    ),
    array(
        "name" => __("Text Shadow for Title?", "mk_framework"),
        "desc" => __("If you enable this option 1px gray shadow will appear in page title.", "mk_framework"),
        "id" => "page_title_shadow",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
        "name" => __('Page Subtitle Color', 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "page_subtitle_color",
        "default" => "#a3a3a3",
        "type" => "color"
    ),
    array(
        "name" => __("Breadcrumb Skin", "mk_framework"),
        "id" => "breadcrumb_skin",
        "default" => 'dark',
        "options" => array(
            "light" => __('For Light Background', "mk_framework"),
            "dark" => __('For Dark Background', "mk_framework")
        ),
        "type" => "radio"
    ),
    array(
        "name" => __('Page Title Border Bottom Color', 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "banner_border_color",
        "default" => "#ededed",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_dashboard_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Side Dashboard", "mk_framework"),
        "desc" => __("This section allows you to modify the coloring of Side Dashboard elements.", "mk_framework"),
        "type" => "heading"
    ),
     array(
        "name" => __('Side Dashboard Background Color', "mk_framework"),
        "id" => "dash_bg_color",
        "default" => "#444",
        "type" => "color"
    ),
    array(
        "name" => __('Side Dashboard Widget Title Color', "mk_framework"),
        "id" => "dash_title_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Side Dashboard Widget Text Color', "mk_framework"),
        "id" => "dash_text_color",
        "default" => "#eee",
        "type" => "color"
    ),
    array(
        "name" => __('Side Dashboard Widget Links Color', "mk_framework"),
        "id" => "dash_links_color",
        "default" => "#fafafa",
        "type" => "color"
    ),
    array(
        "name" => __('Side Dashboard Widget Links Hover Color', "mk_framework"),
        "id" => "dash_links_hover_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Side Dashboard Navigation Links Color', "mk_framework"),
        "id" => "dash_nav_link_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Side Dashboard Navigation Links Hover Color', "mk_framework"),
        "id" => "dash_nav_link_hover_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Side Dashboard Navigation Links Hover Background Color', "mk_framework"),
        "id" => "dash_nav_bg_hover_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),

    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_fullscreen_nav_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Full Screen Navigation", "mk_framework"),
        "desc" => __("This section allows you to modify the coloring of Full Screen navigation.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Logo', "mk_framework"),
        "id" => "fullscreen_nav_logo",
        "default" => 'dark',
        "options" => array(
            "none" => 'None',
            "light" => 'Light',
            "dark" => 'Dark',
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Background Color', "mk_framework"),
        "id" => "fullscreen_nav_bg_color",
        "default" => "#444",
        "type" => "color"
    ),
    array(
        "name" => __('Link Color', "mk_framework"),
        "id" => "fullscreen_nav_link_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Link Hover Color', "mk_framework"),
        "id" => "fullscreen_nav_link_hov_color",
        "default" => "#444",
        "type" => "color"
    ),
    array(
        "name" => __('Link Hover Background Color', "mk_framework"),
        "id" => "fullscreen_nav_link_hov_bg_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),


    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_sidebar_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Sidebar", "mk_framework"),
        "desc" => __("This section allows you to modify the coloring of sidebar elements.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Sidebar Title Color', "mk_framework"),
        "id" => "sidebar_title_color",
        "default" => "#333333",
        "type" => "color"
    ),
    array(
        "name" => __('Sidebar Text Color', "mk_framework"),
        "id" => "sidebar_text_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Sidebar Links Color', "mk_framework"),
        "id" => "sidebar_links_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Sidebar Links Hover Color', "mk_framework"),
        "id" => "sidebar_links_hover_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_footer_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Footer", "mk_framework"),
        "desc" => __("Here, you can modify coloring of Footer section.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Footer Top Border Thickness', "mk_framework"),
        "id" => "footer_top_thickness",
        "min" => "0",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "0",
        "type" => "range"
    ),
    array(
        "name" => __('Footer Top Border Color', "mk_framework"),
        "id" => "footer_top_border_color",
        "default" => "",
        "type" => "color"
    ),

    array(
        "name" => __('Footer Title Color', "mk_framework"),
        "id" => "footer_title_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Footer Text Color', "mk_framework"),
        "id" => "footer_text_color",
        "default" => "#808080",
        "type" => "color"
    ),
    array(
        "name" => __('Footer Links Color', "mk_framework"),
        "id" => "footer_links_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Footer Links Hover Color', "mk_framework"),
        "id" => "footer_links_hover_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Footer Background Color', "mk_framework"),
        "id" => "sub_footer_bg_color",
        "default" => "#43474d",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Footer Navigation and Copyright Text Color', "mk_framework"),
        "id" => "sub_footer_nav_copy_color",
        "default" => "#8c8e91",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    )
);