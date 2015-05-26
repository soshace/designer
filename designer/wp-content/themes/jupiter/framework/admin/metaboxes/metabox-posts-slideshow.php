<?php
$config  = array(
  'title' => sprintf( '%s Slideshow Settings <span style="color: red;">(Deprecated)</span>', THEME_NAME ),
  'id' => 'mk-posts-slideshow-metabox',
  'pages' => array(
    'page',
    'post',
    'portfolio',
    'news'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'low'
);
$options = array(
  
  array(
    "name" => __( "Enable Slideshow For this page", "mk_framework" ),
    "desc" => __( "You can enable slideshow for this Post and choose which items to slide. You can also use one item which will give one static image.", "mk_framework" ),
    "id" => "_enable_slidehsow",
    "default" => 'false',
    "type" => "toggle"
  ),
  array(
    "name" => __( "Select Your Slideshow Type", "mk_framework" ),
    "desc" => __( "You can select the slideshow type using this option.", "mk_framework" ),
    "id" => "_slideshow_source",
    "default" => 'layerslider',
    "options" => array(
        "edge" => __("Edge Slider", 'mk_framework'),
        "layerslider" => __("Layer Slider", 'mk_framework'),
        "revslider" => __('Revolution Slider', 'mk_framework'),
        "flexslider" => __('Flexslider', 'mk_framework'),
        "icarousel" => __('iCarousel', 'mk_framework'),
        "banner_builder" => __('Banner Builder', 'mk_framework'),
    ),
    "type" => "select"
  ),




  array(
    "name" => __( "Select Slideshow", 'mk_framework' ),
    "desc" => __( "You can select your slideshow using this option.", 'mk_framework' ),
    "id" => "_layer_slider_source",
    "default" => '1',
    "target" => 'layer_slider_source',
    "type" => "select"
  ),

  array(
    "name" => __( "Select Slideshow", 'mk_framework' ),
    "desc" => __( "You can select your slideshow using this option.", 'mk_framework' ),
    "id" => "_rev_slider_source",
    "default" => '1',
    "target" => 'revolution_slider',
    "type" => "select"
  ),




  array(
    "type" => "general_wrapper_start",
    "id" => '_edge_section_wrapper'
  ),

  array(
    "name" => __( "Choose your Slides", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_edge_items",
    "default" => array(),
    "target" => 'edge',
    "type" => "multiselect"
  ),

    array(
    "name" => __( "Full Height?", "mk_framework" ),
    "desc" => __( "If you dont want full screen height slideshow disable this option. If you disable this option set the height of slideshow using below option.", "mk_framework" ),
    "id" => "_edge_full_height",
    "default" => "true",
    "type" => "toggle"
  ),

    array(
    "name" => __( "Slideshow Height", "mk_framework" ),
    "desc" => __( "This option only works when above option is disabled.", "mk_framework" ),
    "id" => "_edge_height",
    "min" => "100",
    "max" => "2000",
    "step" => "1",
    "unit" => 'px',
    "default" => "700",
    "type" => "range"
  ),

  
  array(
    "name" => __( "Orderby", 'mk_framework' ),
    "desc" => __( "Sort retrieved Slideshow items by parameter.", 'mk_framework' ),
    "id" => "_edge_orderby",
    "default" => 'menu_order',
    "options" => array(
      "none" => __( "No order", 'mk_framework' ),
      "menu_order" => __( 'Menu Order', 'mk_framework' ),
      "id" => __( "Order by post id", 'mk_framework' ),
      "title" => __( "Order by title", 'mk_framework' ),
      "date" => __( "Order by date", 'mk_framework' ),
      "rand" => __( "Random order", 'mk_framework' ),
    ),
    "type" => "select"
  ),
  array(
    "name" => __( "Order", 'mk_framework' ),
    "desc" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
    "id" => "_edge_order",
    "default" => 'ASC',
    "options" => array(
      "ASC" => __( "ASC (ascending order)", 'mk_framework' ),
      "DESC" => __( "DESC (descending order)", 'mk_framework' )
    ),
    "type" => "select"
  ),

   array(
    "name" => __( "Animation Speed", "mk_framework" ),
    "desc" => __( "Slide transition speed.", "mk_framework" ),
    "id" => "_edge_animation_speed",
    "min" => "100",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "600",
    "type" => "range"
  ),

  array(
    "name" => __( "Pause Time", "mk_framework" ),
    "desc" => __( "How long each slide will show.", "mk_framework" ),
    "id" => "_edge_pause_time",
    "min" => "1000",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "15000",
    "type" => "range"
  ),
  array(
    "name" => __( "Direction Navigation", "mk_framework" ),
    "desc" => __( "Next & Previous navigation.", "mk_framework" ),
    "id" => "_edge_direction_nav",
    "default" => "true",
    "type" => "toggle"
  ),

  array(
    "type" => "general_wrapper_end"
  ),


  array(
    "type" => "general_wrapper_start",
    "id" => '_icarousel_section_wrapper'
  ),

  array(
    "name" => __( "Choose your Slides", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_icarousel_items",
    "default" => array(),
    "target" => 'icarousel',
    "type" => "multiselect"
  ),


  array(
    "name" => __( "Number of Slides", "mk_framework" ),
    "desc" => __( "Set how many Slides to be shown on your slider. Please note that slide items number should be odd, therefore we made this option to take only odd numbers. you should have minimum of 3 slide items.", "mk_framework" ),
    "id" => "_icarousel_count",
    "min" => "3",
    "max" => "30",
    "step" => "2",
    "default" => "3",
    "unit" => 'Slides',
    "type" => "range"
  ),


  array(
    "name" => __( "Orderby", 'mk_framework' ),
    "desc" => __( "Sort retrieved Slideshow items by parameter.", 'mk_framework' ),
    "id" => "_icarousel_orderby",
    "default" => 'menu_order',
    "options" => array(
      "none" => __( "No order", 'mk_framework' ),
      "menu_order" => __( 'Menu Order', 'mk_framework' ),
      "id" => __( "Order by post id", 'mk_framework' ),
      "title" => __( "Order by title", 'mk_framework' ),
      "date" => __( "Order by date", 'mk_framework' ),
      "rand" => __( "Random order", 'mk_framework' ),
    ),
    "type" => "select"
  ),
  array(
    "name" => __( "Order", 'mk_framework' ),
    "desc" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
    "id" => "_icarousel_order",
    "default" => 'ASC',
    "options" => array(
      "ASC" => __( "ASC (ascending order)", 'mk_framework' ),
      "DESC" => __( "DESC (descending order)", 'mk_framework' )
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Autoplay", "mk_framework" ),
    "desc" => __( "Enable this option if you would like slider to autoplay.", "mk_framework" ),
    "id" => "_icarousel_autoplay",
    "default" => "true",
    "type" => "toggle"
  ),

  array(
    "name" => __( "Make 3D", "mk_framework" ),
    "desc" => __( "To Enable or Disable 3D effect.", "mk_framework" ),
    "id" => "_icarousel_3d",
    "default" => "true",
    "type" => "toggle"
  ),

  array(
    "name" => __( "Perspective", "mk_framework" ),
    "desc" => __( "The 3D perspective option. (Min 0 & Max 100)", "mk_framework" ),
    "id" => "_icarousel_perspective",
    "min" => "0",
    "max" => "100",
    "step" => "1",
    "unit" => 'ms',
    "default" => "35",
    "type" => "range"
  ),
  array(
    "name" => __( "Pause on Hover", "mk_framework" ),
    "desc" => __( "If true & the slideshow is active, the slideshow will pause on hover.", "mk_framework" ),
    "id" => "_icarousel_pause_on_hover",
    "default" => "true",
    "type" => "toggle"
  ),
  array(
    "name" => __( "Slider Easing", "mk_framework" ),
    "desc" => __( "Set the easing of the sliding animation.", "mk_framework" ),
    "id" => "_icarousel_easing",
    "default" => 'easeOutCubic',
    "options" => array(
      "" => 'none',
      "linear" => 'linear',
      "swing" => 'swing',
      "easeInQuad" => 'easeInQuad',
      "easeOutQuad" => 'easeOutQuad',
      "easeInOutQuad" => 'easeInOutQuad',
      "easeInCubic" => 'easeInCubic',
      "easeOutCubic" => 'easeOutCubic',
      "easeInOutCubic" => 'easeInOutCubic',
      "easeInQuart" => 'easeInQuart',
      "easeOutQuart" => 'easeOutQuart',
      "easeInOutQuart" => 'easeInOutQuart',
      "easeInQuint" => 'easeInQuint',
      "easeOutQuint" => 'easeOutQuint',
      "easeInOutQuint" => 'easeInOutQuint',
      "easeInSine" => 'easeInSine',
      "easeOutSine" => 'easeOutSine',
      "easeInOutSine" => 'easeInOutSine',
      "easeInExpo" => 'easeInExpo',
      "easeOutExpo" => 'easeOutExpo',
      "easeInOutExpo" => 'easeInOutExpo',
      "easeInCirc" => 'easeInCirc',
      "easeOutCirc" => 'easeOutCirc',
      "easeInOutCirc" => 'easeInOutCirc',
      "easeInElastic" => 'easeInElastic',
      "easeOutElastic" => 'easeOutElastic',
      "easeInOutElastic" => 'easeInOutElastic',
      "easeInBack" => 'easeInBack',
      "easeOutBack" => 'easeOutBack',
      "easeInOutBack" => 'easeInOutBack',
      "easeInBounce" => 'easeInBounce',
      "easeOutBounce" => 'easeOutBounce',
      "easeInOutBounce" => 'easeInOutBounce'
    ),
    "type" => "select"
  ),
  array(
    "name" => __( "Animation Speed", "mk_framework" ),
    "desc" => __( "Slide transition speed.", "mk_framework" ),
    "id" => "_icarousel_animation_speed",
    "min" => "100",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "500",
    "type" => "range"
  ),

  array(
    "name" => __( "Pause Time", "mk_framework" ),
    "desc" => __( "How long each slide will show.", "mk_framework" ),
    "id" => "_icarousel_pause_time",
    "min" => "1000",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "5000",
    "type" => "range"
  ),
  array(
    "name" => __( "Direction Navigation", "mk_framework" ),
    "desc" => __( "Next & Previous navigation.", "mk_framework" ),
    "id" => "_icarousel_direction_nav",
    "default" => "true",
    "type" => "toggle"
  ),


  array(
    "type" => "general_wrapper_end"
  ),






  array(
    "type" => "general_wrapper_start",
    "id" => '_flexslider_section_wrapper'
  ),

  array(
    "name" => __( "Choose your Slides", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_flexslider_items",
    "default" => array(),
    "target" => 'flexslider',
    "type" => "multiselect"
  ),

  array(
    "name" => __( "Slideshow Height", "mk_framework" ),
    "desc" => __( "Adjust your slideshow's height here", "mk_framework" ),
    "id" => "_flexslider_height",
    "min" => "100",
    "max" => "1000",
    "step" => "10",
    "unit" => 'px',
    "default" => "400",
    "type" => "range"
  ),

  array(
    "name" => __( "Pagination Type", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_flexslider_pagination",
    "default" => 'circle',
    "options" => array(
      "thumb" => 'Thumbnail',
      "circle" => 'Circles',
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Number of Slides", "mk_framework" ),
    "desc" => __( "Set how many Slides to be shown on your slider.", "mk_framework" ),
    "id" => "_flexslider_count",
    "min" => "1",
    "max" => "30",
    "step" => "1",
    "default" => "10",
    "unit" => 'Slides',
    "type" => "range"
  ),

  array(
    "name" => __( "Caption", "mk_framework" ),
    "desc" => __( "If this option is disabled, the title, description,  read-more button will be disabled.", "mk_framework" ),
    "id" => "_flexslider_disableCaption",
    "default" => "true",
    "type" => "toggle"
  ),
  array(
    "name" => __( "Orderby", 'mk_framework' ),
    "desc" => __( "Sort retrieved Slideshow items by parameter.", 'mk_framework' ),
    "id" => "_flexslider_orderby",
    "default" => 'menu_order',
    "options" => array(
      "none" => __( "No order", 'mk_framework' ),
      "menu_order" => __( 'Menu Order', 'mk_framework' ),
      "id" => __( "Order by post id", 'mk_framework' ),
      "title" => __( "Order by title", 'mk_framework' ),
      "date" => __( "Order by date", 'mk_framework' ),
      "rand" => __( "Random order", 'mk_framework' ),
    ),
    "type" => "select"
  ),
  array(
    "name" => __( "Order", 'mk_framework' ),
    "desc" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
    "id" => "_flexslider_order",
    "default" => 'ASC',
    "options" => array(
      "ASC" => __( "ASC (ascending order)", 'mk_framework' ),
      "DESC" => __( "DESC (descending order)", 'mk_framework' )
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Autoplay", "mk_framework" ),
    "desc" => __( "Enable this option if you would like slider to autoplay.", "mk_framework" ),
    "id" => "_flexslider_slideshow",
    "default" => "true",
    "type" => "toggle"
  ),
  array(
    "name" => __( "Pause on Hover", "mk_framework" ),
    "desc" => __( "If true & the slideshow is active, the slideshow will pause on hover.", "mk_framework" ),
    "id" => "_flexslider_pauseOnHover",
    "default" => "true",
    "type" => "toggle"
  ),
  array(
    "name" => __( "Slider Easing", "mk_framework" ),
    "desc" => __( "Set the easing of the sliding animation.", "mk_framework" ),
    "id" => "_flexslider_easing",
    "default" => 'easeOutCubic',
    "options" => array(
      "" => 'none',
      "linear" => 'linear',
      "swing" => 'swing',
      "easeInQuad" => 'easeInQuad',
      "easeOutQuad" => 'easeOutQuad',
      "easeInOutQuad" => 'easeInOutQuad',
      "easeInCubic" => 'easeInCubic',
      "easeOutCubic" => 'easeOutCubic',
      "easeInOutCubic" => 'easeInOutCubic',
      "easeInQuart" => 'easeInQuart',
      "easeOutQuart" => 'easeOutQuart',
      "easeInOutQuart" => 'easeInOutQuart',
      "easeInQuint" => 'easeInQuint',
      "easeOutQuint" => 'easeOutQuint',
      "easeInOutQuint" => 'easeInOutQuint',
      "easeInSine" => 'easeInSine',
      "easeOutSine" => 'easeOutSine',
      "easeInOutSine" => 'easeInOutSine',
      "easeInExpo" => 'easeInExpo',
      "easeOutExpo" => 'easeOutExpo',
      "easeInOutExpo" => 'easeInOutExpo',
      "easeInCirc" => 'easeInCirc',
      "easeOutCirc" => 'easeOutCirc',
      "easeInOutCirc" => 'easeInOutCirc',
      "easeInElastic" => 'easeInElastic',
      "easeOutElastic" => 'easeOutElastic',
      "easeInOutElastic" => 'easeInOutElastic',
      "easeInBack" => 'easeInBack',
      "easeOutBack" => 'easeOutBack',
      "easeInOutBack" => 'easeInOutBack',
      "easeInBounce" => 'easeInBounce',
      "easeOutBounce" => 'easeOutBounce',
      "easeInOutBounce" => 'easeInOutBounce'
    ),
    "type" => "select"
  ),
  array(
    "name" => __( "Slideshow Speed", "mk_framework" ),
    "desc" => __( "Time elapsed between each autoplay sliding case.", "mk_framework" ),
    "id" => "_flexslider_slideshowSpeed",
    "min" => "2000",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "5000",
    "type" => "range"
  ),
  array(
    "name" => __( "Animation Duration", "mk_framework" ),
    "desc" => __( "Speed of animation", "mk_framework" ),
    "id" => "_flexslider_animationDuration",
    "min" => "200",
    "max" => "10000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "600",
    "type" => "range"
  ),



  array(
    "type" => "general_wrapper_end"
  ),





  array(
    "type" => "general_wrapper_start",
    "id" => '_banner_builder_section_wrapper'
  ),

  array(
    "name" => __( "Choose your Banner or Banners", "mk_framework" ),
    "desc" => __( "Choose your banner slides. if only chosen one slide, banner will be static and next & previous arrows will be off.", "mk_framework" ),
    "id" => "_banner_items",
    "default" => array(),
    "target" => 'banner_builder',
    "type" => "multiselect"
  ),

  array(
    "name" => __( "Min Height", "mk_framework" ),
    "desc" => __( "You can adjust a min height to avoid height changes between your slide items which may distract the viewer.", "mk_framework" ),
    "id" => "_banner_minHeight",
    "min" => "50",
    "max" => "1200",
    "step" => "1",
    "unit" => 'px',
    "default" => "200",
    "type" => "range"
  ),


  array(
    "name" => __( "Top & Bottom Padding", "mk_framework" ),
    "desc" => __( "This option will help you to give your own custom vertical spacing.", "mk_framework" ),
    "id" => "_banner_padding",
    "min" => "0",
    "max" => "500",
    "step" => "1",
    "unit" => 'px',
    "default" => "30",
    "type" => "range"
  ),

  array(
    "name" => __( "Animation Style", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_banner_animation",
    "default" => 'fade',
    "options" => array(
      "fade" => 'Fade',
      "slide" => 'Slide',
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Orderby", 'mk_framework' ),
    "desc" => __( "Sort retrieved Slideshow items by parameter.", 'mk_framework' ),
    "id" => "_banner_orderby",
    "default" => 'menu_order',
    "options" => array(
      "none" => __( "No order", 'mk_framework' ),
      "menu_order" => __( 'Menu Order', 'mk_framework' ),
      "id" => __( "Order by post id", 'mk_framework' ),
      "title" => __( "Order by title", 'mk_framework' ),
      "date" => __( "Order by date", 'mk_framework' ),
      "rand" => __( "Random order", 'mk_framework' ),
    ),
    "type" => "select"
  ),
  array(
    "name" => __( "Order", 'mk_framework' ),
    "desc" => __( "Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework' ),
    "id" => "_banner_order",
    "default" => 'ASC',
    "options" => array(
      "ASC" => __( "ASC (ascending order)", 'mk_framework' ),
      "DESC" => __( "DESC (descending order)", 'mk_framework' )
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Autoplay", "mk_framework" ),
    "desc" => __( "Enable this option if you would like slider to autoplay.", "mk_framework" ),
    "id" => "_banner_slideshow",
    "default" => "true",
    "type" => "toggle"
  ),

  array(
    "name" => __( "Slideshow Speed", "mk_framework" ),
    "desc" => __( "Time elapsed between each autoplay sliding case.", "mk_framework" ),
    "id" => "_banner_slideshowSpeed",
    "min" => "2000",
    "max" => "20000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "5000",
    "type" => "range"
  ),
  array(
    "name" => __( "Animation Duration", "mk_framework" ),
    "desc" => __( "Speed of animation", "mk_framework" ),
    "id" => "_banner_animationDuration",
    "min" => "200",
    "max" => "10000",
    "step" => "100",
    "unit" => 'ms',
    "default" => "600",
    "type" => "range"
  ),



  array(
    "type" => "general_wrapper_end"
  ),


);
new mkMetaboxesGenerator( $config, $options );
