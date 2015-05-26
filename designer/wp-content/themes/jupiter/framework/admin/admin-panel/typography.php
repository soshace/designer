<?php
$theme_options_typography = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_typography'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_fonts" => __("Fonts", "mk_framework"),
            "mk_options_general_typography" => __("General Typography", "mk_framework"),
            "mk_options_main_navigation_typography" => __("Main Navigation", "mk_framework"),
            "mk_options_page_introduce_typography" => __("Page Title", "mk_framework"),
            "mk_options_dashboard_typography" => __("Side Dashboard", "mk_framework"),
            "mk_options_fullscreen_nav_typography" => __("Full Screen Navigation", "mk_framework"),
            "mk_options_sidebar_typography" => __("Sidebar", "mk_framework"),
            "mk_options_footer_typography" => __("Footer", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_fonts'
    ),
    array(
        "name" => __("Typography / Fonts", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Body Font-Family', "mk_framework"),
        "id" => "font_family",
        "desc" => __("Please choose the safe font family. This font family will be used as backup font (If the below none-safe fonts failed to load for any reason) and be applied to all site elements.", "mk_framework"),
        "default" => '',
        "options" => array(
            'Arial Black, Gadget, sans-serif' => 'Arial Black, Gadget, sans-serif',
            'Bookman Old Style, serif' => 'Bookman Old Style, serif',
            'Comic Sans MS, cursive' => 'Comic Sans MS, cursive',
            'Courier, monospace' => 'Courier, monospace',
            'Courier New, Courier, monospace' => 'Courier New, Courier, monospace',
            'Garamond, serif' => 'Garamond, serif',
            'Georgia, serif' => 'Georgia, serif',
            'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
            'Lucida Console, Monaco, monospace' => 'Lucida Console, Monaco, monospace',
            'Lucida Sans, Lucida Grande, Lucida Sans Unicode, sans-serif' => 'Lucida Grande, Lucida Sans, Lucida Sans Unicode, sans-serif',
            'HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, sans-serif' => 'HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, sans-serif',
            'MS Sans Serif, Geneva, sans-serif' => 'MS Sans Serif, Geneva, sans-serif',
            'MS Serif, New York, sans-serif' => 'MS Serif, New York, sans-serif',
            'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype, Book Antiqua, Palatino, serif',
            'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
            'Times New Roman, Times, serif' => 'Times New Roman, Times, serif',
            'Trebuchet MS, Helvetica, sans-serif' => 'Trebuchet MS, Helvetica, sans-serif',
            'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif'
        ),
        "type" => "dropdown"
    ),
    array(
        "heading" => __("Font Family 1", "mk_framework"),
        "above_content" => '<img src="' . THEME_ADMIN_ASSETS_URI . '/images/typography-google-fonts.png" />',
        "type" => "groupset"
    ),
    array(
        "name" => __("<span class='mk-highlighted-text'>Step 1</span> Choose a font", "mk_framework"),
        "id" => "special_fonts_list_1",
        "desc" => __("Choose your font family name.", "mk_framework"),
        "default" => 'Open+Sans',
        "function" => 'mk_fonts_list',
        "type" => "custom"
    ),
    array(
        "id" => __("special_fonts_type_1", "mk_framework"),
        "default" => 'google',
        "type" => "special_font"
    ),
    array(
        "name" => __("Google Font character sets", "mk_framework"),
        "desc" => __("Please choose your desired character sets hers as a comma separated list. This option is going to work if you choose Google Fonts and need to have glyphs other than English."),
        "id" => "google_font_subset_1",
        "options" => array(
            'latin' => 'latin',
            'latin-ext' => 'latin-ext',
            'cyrillic-ext' => 'cyrillic-ext',
            'greek-ext' => 'greek-ext',
            'greek' => 'greek',
            'vietnamese' => 'vietnamese',
            'cyrillic' => 'cyrillic',
            ),
        "type" => "dropdown"
    ),
    
    
    
    array(
        "name" => __("<span class='mk-highlighted-text'>Step 2</span> Site Elements to Set.", "mk_framework"),
        "desc" => __("Please choose elements that you would to set for the above font family. setting it to Body will affect all elements.", "mk_framework"),
        "id" => "special_elements_1",
        "default" => array(
            'body'
        ),
        "options" => $font_replacement_objects,
        "type" => "multiselect"
    ),
    array(
        "type" => "groupset_end"
    ),
    
    
    
    
    array(
        "heading" => __("Font Family 2", "mk_framework"),
        "above_content" => '<img src="' . THEME_ADMIN_ASSETS_URI . '/images/typography-google-fonts.png" />',
        "type" => "groupset"
    ),
    array(
        "name" => __("<span class='mk-highlighted-text'>Step 1</span> Choose a font", "mk_framework"),
        "id" => "special_fonts_list_2",
        "desc" => __("Choose your font family name.", "mk_framework"),
        "default" => '',
        "function" => 'mk_fonts_list',
        "type" => "custom"
    ),
    array(
        "id" => "special_fonts_type_2",
        "default" => 'google',
        "type" => "special_font"
    ),
    array(
        "name" => __("Google Font character sets", "mk_framework"),
         "desc" => __("Please choose your desired character sets hers as a comma separated list. This option is going to work if you choose Google Fonts and need to have glyphs other than English."),
        "id" => "google_font_subset_2",
        "options" => array(
            'latin' => 'latin',
            'latin-ext' => 'latin-ext',
            'cyrillic-ext' => 'cyrillic-ext',
            'greek-ext' => 'greek-ext',
            'greek' => 'greek',
            'vietnamese' => 'vietnamese',
            'cyrillic' => 'cyrillic',
            ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("<span class='mk-highlighted-text'>Step 2</span> Site Elements to Set.", "mk_framework"),
        "desc" => __("Please choose elements that you would to set for the above font family. setting it to Body will affect all elements.", "mk_framework"),
        "id" => "special_elements_2",
        "default" => array(),
        "options" => $font_replacement_objects,
        "type" => "multiselect"
    ),
    array(
        "type" => "groupset_end"
    ),
    
    
    
    
    
    
    
    
    array(
        "heading" => __("Font Family 3", "mk_framework"),
        "above_content" => '<img src="' . THEME_ADMIN_ASSETS_URI . '/images/typekit.png" /><span class="mk-groupset-desc">Note: Adobe Typekit is a premium service. <a target="_blank" href="http://artbees.freshdesk.com/support/solutions/articles/1000126904">Learn more</a>.</span>',
        "type" => "groupset"
    ),
    
    
    array(
        "name" => __("<span class='mk-highlighted-text'>Step 1</span> Choose a font", "mk_framework"),
        "desc" => __("Type the name of the font family you have picked from typekit library.", "mk_framework"),
        "id" => "typekit_font_family_1",
        "default" => "",
        "type" => "text"
    ),
    
    array(
        "name" => __("<span class='mk-highlighted-text'>Step 2</span> Site Elements to Set.", "mk_framework"),
        "desc" => __("Please choose elements that you would to set for the above font family. setting it to Body will set it all elements.", "mk_framework"),
        "id" => "typekit_elements_1",
        "default" => array(),
        "options" => $font_replacement_objects,
        "type" => "multiselect"
    ),
    array(
        "type" => "groupset_end"
    ),
    
    array(
        "heading" => __("Font Family 4", "mk_framework"),
        "above_content" => '<img src="' . THEME_ADMIN_ASSETS_URI . '/images/typekit.png" /><span class="mk-groupset-desc">Note: Adobe Typekit is a premium service. <a target="_blank" href="http://artbees.freshdesk.com/support/solutions/articles/1000126904">Learn more</a>.</span>',
        "type" => "groupset"
    ),
    array(
        
        "name" => __("<span class='mk-highlighted-text'>Step 1</span> Choose a font", "mk_framework"),
        "desc" => __("Type the name of the font family you have picked from typekit library.", "mk_framework"),
        "id" => "typekit_font_family_2",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("<span class='mk-highlighted-text'>Step 2</span> Site Elements to Set.", "mk_framework"),
        "desc" => __("Please choose elements that you would to set for the above font family. setting it to Body will set it all elements.", "mk_framework"),
        "id" => "typekit_elements_2",
        "default" => array(),
        "options" => $font_replacement_objects,
        "type" => "multiselect"
    ),
    array(
        "type" => "groupset_end"
    ),
    
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_general_typography'
    ),
    array(
        "name" => __("Typography / General Typography", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Body Text Size', "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "body_font_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Body Text Line Height', "mk_framework"),
        "desc" => __("This option will let you change the line height of texts in site. Please note that some elements has their own direct line height property, so you can not change them from here. The unit is in 'em'", "mk_framework"),
        "id" => "body_line_height",
        "min" => "1",
        "max" => "4",
        "step" => "0.01",
        "unit" => 'em',
        "default" => "1.66",
        "type" => "range"
    ),
    array(
        "name" => __('Body Text Weight', "mk_framework"),
        "id" => "body_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Pragraph (p) Text Size', "mk_framework"),
        "id" => "p_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "16",
        "type" => "range"
    ),
    array(
        "name" => __('Pragraph (p) Text Line Height', "mk_framework"),
        "desc" => __("This option will let you change the line height of paragraphs. The unit is in 'em'", "mk_framework"),
        "id" => "p_line_height",
        "min" => "1",
        "max" => "4",
        "step" => "0.01",
        "unit" => 'em',
        "default" => "1.66",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 1 (h1) Size', "mk_framework"),
        "id" => "h1_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "36",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 1 (h1) Weight', "mk_framework"),
        "id" => "h1_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 1 (h1) Text Case', "mk_framework"),
        "id" => "h1_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 2 (h2) Size', "mk_framework"),
        "id" => "h2_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "30",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 2 (h2) Weight', "mk_framework"),
        "id" => "h2_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 2 (h2) Text Case', "mk_framework"),
        "id" => "h2_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 3 (h3) Size', "mk_framework"),
        "id" => "h3_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "24",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 3 (h3) Weight', "mk_framework"),
        "id" => "h3_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 3 (h3) Text Case', "mk_framework"),
        "id" => "h3_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 4 (h4) Size', "mk_framework"),
        "id" => "h4_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "18",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 4 (h4) Weight', "mk_framework"),
        "id" => "h4_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 4 (h4) Text Case', "mk_framework"),
        "id" => "h4_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 5 (h5) Size', "mk_framework"),
        "id" => "h5_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "16",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 5 (h5) Weight', "mk_framework"),
        "id" => "h5_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 5 (h5) Text Case', "mk_framework"),
        "id" => "h5_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 6 (h6) Size', "mk_framework"),
        "id" => "h6_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 6 (h6) Weight', "mk_framework"),
        "id" => "h6_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 6 (h6) Text Case', "mk_framework"),
        "id" => "h6_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Header Start Tour Link Font Size', "mk_framework"),
        "id" => "start_tour_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_main_navigation_typography'
    ),
    array(
        "name" => __("Typography / Main Navigation", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Main Menu Items Gutter Space', "mk_framework"),
        "desc" => __("This Value will be applied as padding to left and right of the item.", "mk_framework"),
        "id" => "main_nav_item_space",
        "min" => "0",
        "max" => "100",
        "step" => "1",
        "unit" => 'px',
        "default" => "20",
        "type" => "range"
    ),
    array(
        "name" => __('Top Level Menu Item Text Size', "mk_framework"),
        "id" => "main_nav_top_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "13",
        "type" => "range"
    ),
    array(
        "name" => __('Top Menu Level Text Case', "mk_framework"),
        "id" => "main_menu_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Top Menu Level Text Weight', "mk_framework"),
        "id" => "main_nav_top_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    
    
    array(
        "name" => __('Sub Level Menu Item Text Size', "mk_framework"),
        "id" => "main_nav_sub_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "12",
        "type" => "range"
    ),
    array(
        "name" => __('Sub Menu Level Text Case', "mk_framework"),
        "id" => "main_nav_sub_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Sub Menu Level Text Weight', "mk_framework"),
        "id" => "main_nav_sub_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Top Level Menu Item Letter Spacing', "mk_framework"),
        "id" => "main_nav_top_letter_spacing",
        "min" => "0",
        "max" => "5",
        "step" => "1",
        "unit" => 'px',
        "default" => "0",
        "type" => "range"
    ),
    array(
        "name" => __('Sub Level Menu Item Letter Spacing', "mk_framework"),
        "id" => "main_nav_sub_letter_spacing",
        "min" => "0",
        "max" => "5",
        "step" => "1",
        "unit" => 'px',
        "default" => "1",
        "type" => "range"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_page_introduce_typography'
    ),
    array(
        "name" => __("Typography / Page Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Page Title Size', 'mk_framework'),
        "id" => "page_introduce_title_size",
        "min" => "10",
        "max" => "120",
        "step" => "1",
        "unit" => 'px',
        "default" => "20",
        "type" => "range"
    ),
    array(
        "name" => __('Page Title Letter Spacing', 'mk_framework'),
        "id" => "page_introduce_title_letter_spacing",
        "min" => "0",
        "max" => "10",
        "step" => "1",
        "unit" => 'px',
        "default" => "2",
        "type" => "range"
    ),
    array(
        "name" => __('Page Title Weight', 'mk_framework'),
        "id" => "page_introduce_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Page Title Text Case', "mk_framework"),
        "id" => "page_title_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Page Subtitle Size', 'mk_framework'),
        "id" => "page_introduce_subtitle_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Page Subtitle Text Case', "mk_framework"),
        "id" => "page_introduce_subtitle_transform",
        "default" => 'none',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_dashboard_typography'
    ),
    array(
        "name" => __("Typography / Side Dashboard", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Side Dashboard Title Size', "mk_framework"),
        "id" => "dash_title_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Side Dashboard Title Weight', "mk_framework"),
        "id" => "dash_title_weight",
        "default" => '800',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Side Dashboard Title Text Case', "mk_framework"),
        "id" => "dash_title_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Side Dashboard Text Size', "mk_framework"),
        "id" => "dash_text_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "12",
        "type" => "range"
    ),
    array(
        "name" => __('Side Dashboard Text Weight', "mk_framework"),
        "id" => "dash_text_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "type" => "end_sub_pane"
    ),

    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_fullscreen_nav_typography'
    ),
    array(
        "name" => __("Typography / Full Screen Navigation", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Logo Margin?', "mk_framework"),
        "desc" => __("This value will be applied as margin-bottom to logo.", "mk_framework"),
        "id" => "fullscreen_nav_logo_margin",
        "min" => "0",
        "max" => "250",
        "step" => "1",
        "unit" => 'px',
        "default" => "125",
        "type" => "range"
    ),
    array(
        "name" => __('Menu Items Gutter Space', "mk_framework"),
        "desc" => __("This value will be applied as padding to top and bottom of the item.", "mk_framework"),
        "id" => "fullscreen_nav_menu_gutter",
        "min" => "0",
        "max" => "100",
        "step" => "1",
        "unit" => 'px',
        "default" => "25",
        "type" => "range"
    ),
    array(
        "name" => __('Menu Items Font Size', "mk_framework"),
        "id" => "fullscreen_nav_menu_font_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "16",
        "type" => "range"
    ),
    array(
        "name" => __('Menu Items Font Weight', "mk_framework"),
        "id" => "fullscreen_nav_menu_font_weight",
        "default" => '800',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Menu Items Text Case', "mk_framework"),
        "id" => "fullscreen_nav_menu_text_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Menu Items Letter Spacing', "mk_framework"),
        "id" => "fullscreen_nav_menu_letter_spacing",
        "min" => "0",
        "max" => "10",
        "step" => "1",
        "unit" => 'px',
        "default" => "0",
        "type" => "range"
    ),
    array(
        "type" => "end_sub_pane"
    ),

    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_sidebar_typography'
    ),
    array(
        "name" => __("Typography / Sidebar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Sidebar Title Size', "mk_framework"),
        "id" => "sidebar_title_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Sidebar Title Weight', "mk_framework"),
        "id" => "sidebar_title_weight",
        "default" => 'bolder',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Sidebar Title Text Case', "mk_framework"),
        "id" => "sidebar_title_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Sidebar Text Size', "mk_framework"),
        "id" => "sidebar_text_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Sidebar Text Weight', "mk_framework"),
        "id" => "sidebar_text_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_footer_typography'
    ),
    array(
        "name" => __("Typography / Footer", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Footer Title Size', "mk_framework"),
        "id" => "footer_title_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Footer Title Weight', "mk_framework"),
        "id" => "footer_title_weight",
        "default" => '800',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Footer Title Text Case', "mk_framework"),
        "id" => "footer_title_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Footer Text Size', "mk_framework"),
        "id" => "footer_text_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Footer Text Weight', "mk_framework"),
        "id" => "footer_text_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Footer Copyright Font Size', "mk_framework"),
        "id" => "copyright_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "11",
        "type" => "range"
    ),
    array(
        "name" => __('Footer Copyright Letter Spacing', "mk_framework"),
        "id" => "copyright_letter_spacing",
        "min" => "0",
        "max" => "10",
        "step" => "1",
        "unit" => 'px',
        "default" => "1",
        "type" => "range"
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
