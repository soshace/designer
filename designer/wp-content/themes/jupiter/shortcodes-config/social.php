<?php
vc_map(array(
    "name" => __("Social Networks", "mk_framework"),
    "base" => "mk_social_networks",
    'icon' => 'icon-mk-social-networks vc_mk_element-icon',
    'description' => __( 'Adds social network icons.', 'mk_framework' ),
    "category" => __('Social', 'mk_framework'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Size", "mk_framework"),
            "param_name" => "size",
            "value" => array(
                "Small" => "small",
                "Medium" => "medium",
                "Large" => "large",
                "X Large" => "x-large",
                "XX Large" => "xx-large"
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "value" => array(
                "Rounded" => "rounded",
                "Circle" => "circle",
                "Simple" => "simple",
                "Simple Rounded" => "simple-rounded",
                "Square Pointed Corner" => "square-pointed",
                "Square Rounded Corner" => "square-rounded"

            )
        ),
        array(
            "type" => "range",
            "heading" => __("Margin", "mk_framework"),
            "param_name" => "margin",
            "value" => "4",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => __("The distance between icons. This margin will be applied to all directions.", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Border Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "#ccc",
            "description" => __("(default: #ccc)", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'square-pointed',
                    'square-rounded',
                    'simple-rounded'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "mk_framework"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => __("(default: transparent)", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple-rounded',
                    'square-pointed',
                    'square-rounded'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Hover Color", "mk_framework"),
            "param_name" => "bg_hover_color",
            "value" => "#232323",
            "description" => __("(default: #232323)", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple-rounded',
                    'square-pointed',
                    'square-rounded'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icons Color", "mk_framework"),
            "param_name" => "icon_color",
            "value" => "#ccc",
            "description" => __("(default: #ccc)", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icons Hover Color", "mk_framework"),
            "param_name" => "icon_hover_color",
            "value" => "#eee",
            "description" => __("(default: #eee)", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Icons Align", "mk_framework"),
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
            "heading" => __("Facebook URL", "mk_framework"),
            "param_name" => "facebook",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Twitter URL", "mk_framework"),
            "param_name" => "twitter",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("RSS URL", "mk_framework"),
            "param_name" => "rss",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Dribbble URL", "mk_framework"),
            "param_name" => "dribbble",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Digg URL", "mk_framework"),
            "param_name" => "digg",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Pinterest URL", "mk_framework"),
            "param_name" => "pinterest",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Flickr URL", "mk_framework"),
            "param_name" => "flickr",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Google Plus URL", "mk_framework"),
            "param_name" => "google_plus",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Instagram URL", "mk_framework"),
            "param_name" => "instagram",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Linkedin URL", "mk_framework"),
            "param_name" => "linkedin",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Blogger URL", "mk_framework"),
            "param_name" => "blogger",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Youtube URL", "mk_framework"),
            "param_name" => "youtube",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Last-fm URL", "mk_framework"),
            "param_name" => "last_fm",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Stumble-upon URL", "mk_framework"),
            "param_name" => "stumble_upon",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Sound Cloud URL", "mk_framework"),
            "param_name" => "soundcloud",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Tumblr URL", "mk_framework"),
            "param_name" => "tumblr",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Vimeo URL", "mk_framework"),
            "param_name" => "vimeo",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Wordpress URL", "mk_framework"),
            "param_name" => "wordpress",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Yelp URL", "mk_framework"),
            "param_name" => "yelp",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Reddit URL", "mk_framework"),
            "param_name" => "reddit",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Xing URL", "mk_framework"),
            "param_name" => "xing",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("IMDB URL", "mk_framework"),
            "param_name" => "imdb",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Qzone URL", "mk_framework"),
            "param_name" => "qzone",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Renren URL", "mk_framework"),
            "param_name" => "renren",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("VK.com URL", "mk_framework"),
            "param_name" => "vk",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Wechat URL", "mk_framework"),
            "param_name" => "wechat",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Weibo URL", "mk_framework"),
            "param_name" => "weibo",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Whatsapp URL", "mk_framework"),
            "param_name" => "whatsapp",
            "value" => "",
            "description" => __("Enter the full URL of your corresponding social network. Include (http://). If left blank, this social network icon will not be shown.", "mk_framework")
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
    "name" => __("Skype Number", "mk_framework"),
    "base" => "mk_skype",
    'icon' => 'icon-mk-skype vc_mk_element-icon',
    'description' => __( 'Adds your Skype ID or Number.', 'mk_framework' ),
    "category" => __('Social', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Skype Number (For Display)", "mk_framework"),
            "param_name" => "display_number",
            "value" => "",
            "description" => __("Please provide your skype number. Once user clicks on the link it will make a calls if user has already installed skype. Feel Free to make spaces.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Your Skype Number (For making a call - exact number)", "mk_framework"),
            "param_name" => "number",
            "value" => "",
            "description" => __("Please enter your skype number exactly how you dial a number. Without spaces.", "mk_framework")
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
    "name" => __("Twitter Feeds", "mk_framework"),
    "base" => "vc_twitter",
    'icon' => 'icon-mk-twitter-feeds vc_mk_element-icon',
    'description' => __( 'Adds Twitter Feeds.', 'mk_framework' ),
    "category" => __('Social', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Twitter name", "mk_framework"),
            "param_name" => "twitter_name",
            "value" => "",
            "description" => __("Type in twitter profile name from which load tweets.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Tweets count", "mk_framework"),
            "param_name" => "tweets_count",
            "value" => "5",
            "min" => "1",
            "max" => "30",
            "step" => "1",
            "unit" => 'tweets',
            "description" => __("How many recent tweets to load.", "mk_framework")
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
    "name" => __("Video player", "mk_framework"),
    "base" => "vc_video",
    'icon' => 'icon-mk-video-player vc_mk_element-icon',
    'description' => __( 'Youtube, Vimeo,..', 'mk_framework' ),
    "category" => __('Social', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Video link", "mk_framework"),
            "param_name" => "link",
            "value" => "",
            "description" => __('Link to the video. More about supported formats at <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>.', "mk_framework")
        ),
        $add_css_animations,
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
    "name" => __("Advanced Google Maps", "mk_framework"),
    "base" => "mk_advanced_gmaps",
    'icon' => 'icon-mk-advanced-google-maps vc_mk_element-icon',
    'description' => __( 'Powerful Google Maps element.', 'mk_framework' ),
    "category" => __('Social', 'mk_framework'),
    "params" => array(
        
        array(
            "type" => "textfield",
            "heading" => __("Address 1 : Latitude", "mk_framework"),
            "param_name" => "latitude",
            "value" => "",
            "description" => __('Example : 40.748829', "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Address 1 : Longitude", "mk_framework"),
            "param_name" => "longitude",
            "value" => "",
            "description" => __('Example : -73.984118', "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Address 1 : Full Address Text (shown in tooltip)", "mk_framework"),
            "param_name" => "address",
            "value" => "",
            "description" => __('', "mk_framework")
        ),
        
        array(
            "type" => "textfield",
            "heading" => __("Address 2 : Latitude", "mk_framework"),
            "param_name" => "latitude_2",
            "value" => "",
            "description" => __('', "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Address 2 : Longitude", "mk_framework"),
            "param_name" => "longitude_2",
            "value" => "",
            "description" => __('', "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Address 2 : Full Address Text (shown in tooltip)", "mk_framework"),
            "param_name" => "address_2",
            "value" => "",
            "description" => __('', "mk_framework")
        ),
        
        
        
        array(
            "type" => "textfield",
            "heading" => __("Address 3 : Latitude", "mk_framework"),
            "param_name" => "latitude_3",
            "value" => "",
            "description" => __('', "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Address 3 : Longitude", "mk_framework"),
            "param_name" => "longitude_3",
            "value" => "",
            "description" => __('', "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Address 3 : Full Address Text (shown in tooltip)", "mk_framework"),
            "param_name" => "address_3",
            "value" => "",
            "description" => __('', "mk_framework")
        ),
        
        
        
        array(
            "type" => "upload",
            "heading" => __("Upload Marker Icon", "mk_framework"),
            "param_name" => "pin_icon",
            "value" => "",
            "description" => __("If left blank Google Default marker will be used.", "mk_framework")
        ),


         array(
            "type" => "dropdown",
            "heading" => __("Map Height", "mk_framework"),
            "param_name" => "map_height",
            "value" => array(
                __("Custom (choose from below option)", "mk_framework") => "custom",
                __("Screen Height", "mk_framework") => "full",
            ),

        ),
         array(
            "type" => "range",
            "heading" => __("Custom Map Height", "mk_framework"),
            "param_name" => "height",
            "value" => "300",
            "min" => "1",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __('Enter map height in pixels. Example: 200).', "mk_framework"),
             "dependency" => array(
                'element' => "map_height",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Zoom", "mk_framework"),
            "param_name" => "zoom",
            "value" => "14",
            "min" => "1",
            "max" => "19",
            "step" => "1",
            "unit" => '',
            "description" => __('', "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pan Control", "mk_framework"),
            "param_name" => "pan_control",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Draggable", "mk_framework"),
            "param_name" => "draggable",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Zoom Control", "mk_framework"),
            "param_name" => "zoom_control",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Type", "mk_framework"),
            "param_name" => "map_type",
            "value" => array(
                __("ROADMAP (Displays a normal, default 2D map)", "mk_framework") => "ROADMAP",
                __("HYBRID (Displays a photographic map + roads and city names)", "mk_framework") => "HYBRID",
                __("SATELLITE (Displays a photographic map)", "mk_framework") => "SATELLITE",
                __("TERRAIN (Displays a map with mountains, rivers, etc.)", "mk_framework") => "TERRAIN"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Map Type Control", "mk_framework"),
            "param_name" => "map_type_control",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Scale Control", "mk_framework"),
            "param_name" => "scale_control",
            "value" => "true",
            "description" => __("", "mk_framework")
        ),
        
        array(
            "type" => "dropdown",
            "heading" => __("Modify Google Maps Hue, Saturation, Lightness", "mk_framework"),
            "param_name" => "modify_coloring",
            "value" => array(
                __("No", "mk_framework") => "false",
                __("Yes", "mk_framework") => "true"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Hue", "mk_framework"),
            "param_name" => "hue",
            "value" => "#ccc",
            "description" => __("Sets the hue of the feature to match the hue of the color supplied. Note that the saturation and lightness of the feature is conserved, which means, the feature will not perfectly match the color supplied .", "mk_framework"),
            "dependency" => array(
                'element' => "modify_coloring",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Saturation", "mk_framework"),
            "param_name" => "saturation",
            "value" => "1",
            "min" => "-100",
            "max" => "100",
            "step" => "1",
            "unit" => '',
            "description" => __('Shifts the saturation of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].', "mk_framework"),
            "dependency" => array(
                'element' => "modify_coloring",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Lightness", "mk_framework"),
            "param_name" => "lightness",
            "value" => "1",
            "min" => "-100",
            "max" => "100",
            "step" => "1",
            "unit" => '',
            "description" => __('Shifts lightness of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].', "mk_framework"),
            "dependency" => array(
                'element' => "modify_coloring",
                'value' => array(
                    'true'
                )
            )
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
    "base" => "vc_flickr",
    "name" => __("Flickr Feeds", "mk_framework"),
    'icon' => 'icon-mk-flickr-feeds vc_mk_element-icon',
    'description' => __( 'Show your Flickr Feeds.', 'mk_framework' ),
    "category" => __('Social', 'mk_framework'),
    "params" => array(
       array(
               "type" => "textfield",
               "heading" => __("Widget Title", "mk_framework"),
               "param_name" => "title",
               "value" => "",
               "description" => __("", "mk_framework")
          ),
          array(
               "type" => "textfield",
               "heading" => __("Flickr ID", "mk_framework"),
               "param_name" => "flickr_id",
               "value" => "",
               "description" => __('To find your flickID visit <a href="http://idgettr.com/" target="_blank">idGettr</a>', "mk_framework")
          ),
          array(
               "type" => "range",
               "heading" => __("Number of photos", "mk_framework"),
               "param_name" => "count",
               "value" => "6",
               "min" => "1",
               "max" => "30",
               "step" => "1",
               "unit" => 'photos'
          ),
          array(
               "type" => "dropdown",
               "heading" => __("Thumbnail Size", "mk_framework"),
               "param_name" => "thumb_size",
               "value" => array(
                    __("Small", "mk_framework") => "s",
                    __("Medium", "mk_framework") => "m",
                    __("Thumbnail", "mk_framework") => "t"
               ),
               "description" => __("Photo order", "mk_framework")
          ),
          array(
               "type" => "dropdown",
               "heading" => __("Type", "mk_framework"),
               "param_name" => "type",
               "value" => array(
                    __("User", "mk_framework") => "user",
                    __("Group", "mk_framework") => "group"
               ),
               "description" => __("Photo stream type", "mk_framework")
          ),
          array(
               "type" => "dropdown",
               "heading" => __("Display", "mk_framework"),
               "param_name" => "display",
               "value" => array(
                    __("Latest", "mk_framework") => "latest",
                    __("Random", "mk_framework") => "random"
               ),
               "description" => __("Photo order", "mk_framework")
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
    "base" => "mk_contact_form",
    "name" => __("Contact Form", "mk_framework"),
    'icon' => 'icon-mk-contact-form vc_mk_element-icon',
    'description' => __( 'Adds Contact form element.', 'mk_framework' ),
    "category" => __('Social', 'mk_framework'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "value" => array(
                __("Outline", "mk_framework") => "outline",
                __("Modern", "mk_framework") => "modern",
                __("Classic", "mk_framework") => "classic",
                __("Corporate", "mk_framework") => "corporate"
            ),
            "description" => __("Choose your contact form style", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Skin", "mk_framework"),
            "param_name" => "skin",
            "value" => array(
                __("Dark", "mk_framework") => "dark",
                __("Light", "mk_framework") => "light"
            ),
            "description" => __("Choose your contact form style", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern',
                    'outline'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "mk_framework"),
            "param_name" => "bg_color",
            "description" => __("", "mk_framework"),
            "value" => "#f6f6f6",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'corporate'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Border Color", "mk_framework"),
            "param_name" => "border_color",
            "description" => __("", "mk_framework"),
            "value" => "#f6f6f6",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'corporate'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Font Color", "mk_framework"),
            "param_name" => "font_color",
            "description" => __("", "mk_framework"),
            "value" => "#373737",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'corporate'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Background Color", "mk_framework"),
            "param_name" => "button_color",
            "description" => __("", "mk_framework"),
            "value" => "#373737",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'corporate'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Button Font Color", "mk_framework"),
            "param_name" => "button_font_color",
            "description" => __("", "mk_framework"),
            "value" => "#fff",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'corporate'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Email", "mk_framework"),
            "param_name" => "email",
            "value" => "",
            "description" => sprintf(__('Which email would you like the contacts to be sent, if left empty emails will be sent to admin email : "%s"', "mk_framework"), get_bloginfo('admin_email'))
        ),
        array(
            "type" => "toggle",
            "heading" => __("Show Phone Number Field?", "mk_framework"),
            "param_name" => "phone",
            "value" => "false",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Captcha authentication?", "mk_framework"),
            "param_name" => "captcha",
            "value" => "true",
            "description" => __("Keep away spam bots.", "mk_framework")
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
    "base" => "mk_contact_info",
    "name" => __("Contact Info", "mk_framework"),
    'icon' => 'icon-mk-contact-info vc_mk_element-icon',
    "category" => __('Social', 'mk_framework'),
    'description' => __( 'Adds Contact info details.', 'mk_framework' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "mk_framework"),
            "param_name" => "title",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Phone", "mk_framework"),
            "param_name" => "phone",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Fax", "mk_framework"),
            "param_name" => "fax",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Email", "mk_framework"),
            "param_name" => "email",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Address", "mk_framework"),
            "param_name" => "address",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Person", "mk_framework"),
            "param_name" => "person",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Company", "mk_framework"),
            "param_name" => "company",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Skype Username", "mk_framework"),
            "param_name" => "skype",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Website", "mk_framework"),
            "param_name" => "website",
            "value" => ""
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




