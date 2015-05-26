<?php
$theme_options_advanced = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_advanced'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_manage_theme" => __("Manage Theme", "mk_framework"),
            "mk_options_twitter_api" => __("Twitter API", "mk_framework"),
            "mk_options_custom_js" => __("Custom JS", "mk_framework"),
            "mk_options_custom_css" => __("Custom CSS", "mk_framework"),
            "mk_options_export_options" => __("Export Options", "mk_framework"),
            "mk_options_import_options" => __("Import Options", "mk_framework"),
            "mk_options_troubleshooting" => __("Troubleshooting", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_manage_theme'
    ),
    array(
        "name" => __("Advanced / Manage Theme", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Minify Theme Javascript File", "mk_framework"),
        "desc" => __("If you enable this option pre-minified theme Java Script files will be renderred in front-end. Minified JS is 30%-40% smaller in file size which will improve page speed.", "mk_framework"),
        "id" => "minify-js",
        "default" => "false",
        "type" => "toggle"
    ),
    array(
        "name" => __("Minify Theme Styles Files", "mk_framework"),
        "desc" => __("If you enable this option pre-minified theme CSS files will be renderred in front-end. Minified CSS is 30%-40% smaller in file size which will improve page speed.", "mk_framework"),
        "id" => "minify-css",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Query String From Static Flies (Not Recommended)", "mk_framework"),
        "desc" => __("disabling this option will remove \"ver\" query string from JS and CSS files. For More info Please <a target=\"_blank\" href=\"https://developers.google.com/speed/docs/best-practices/caching#LeverageProxyCaching\">Read Here</a>.", "mk_framework"),
        "id" => "remove-js-css-ver",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Portfolio Post Type", "mk_framework"),
        "desc" => __("If you will not use Portfolio post type feature simply disable this option.", "mk_framework"),
        "id" => "portfolio-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("News Post Type", "mk_framework"),
        "desc" => __("If you will not use News post type feature simply disable this option.", "mk_framework"),
        "id" => "news-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("FAQ Post Type", "mk_framework"),
        "desc" => __("If you will not use faq post type feature simply disable this option.", "mk_framework"),
        "id" => "faq-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Pricing Tables Post Type", "mk_framework"),
        "desc" => __("If you will not use Pricing Tables post type feature simply disable this option.", "mk_framework"),
        "id" => "pricing-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Clients Post Type", "mk_framework"),
        "desc" => __("If you will not use Clients post type feature simply disable this option.", "mk_framework"),
        "id" => "clients-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Employees Post Type", "mk_framework"),
        "desc" => __("If you will not use Employees post type feature simply disable this option.", "mk_framework"),
        "id" => "employees-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Testimonial Post Type", "mk_framework"),
        "desc" => __("If you will not use Testimonial post type feature simply disable this option.", "mk_framework"),
        "id" => "testimonials-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("FlexSlider Post Type", "mk_framework"),
        "desc" => __("If you will not use FlexSlider post type feature simply disable this option.", "mk_framework"),
        "id" => "flexslider-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Edge Slideshow Post Type", "mk_framework"),
        "desc" => __("If you will not use Edge Slideshow post type feature simply disable this option.", "mk_framework"),
        "id" => "edge-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("iCarousel Post Type", "mk_framework"),
        "desc" => __("If you will not use iCarousel post type feature simply disable this option.", "mk_framework"),
        "id" => "iCarousel-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Banner Builder Post Type", "mk_framework"),
        "desc" => __("If you will not use Banner Builder post type feature simply disable this option.", "mk_framework"),
        "id" => "banner-post-type",
        "default" => "true",
        "type" => "toggle"
    ),

    array(
        "name" => __("Tab Slider Post Type", "mk_framework"),
        "desc" => __("If you will not use Tab Slider post type feature simply disable this option.", "mk_framework"),
        "id" => "tab-slider-post-type",
        "default" => "true",
        "type" => "toggle"
    ),

    array(
        "name" => __("Animated Columns Post Type", "mk_framework"),
        "desc" => __("If you will not use Animated Columns post type feature simply disable this option.", "mk_framework"),
        "id" => "animated-columns-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "type" => "end_sub_pane"
    ),

    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_twitter_api'
    ),
    array(
        "name" => __("Advanced / Twitter API", "mk_framework"),
        "desc" => __('<ol style="list-style-type:decimal !important;">
  <li>Go to "<a target="_blank" href="https://dev.twitter.com/apps">https://dev.twitter.com/apps</a>," login with your twitter account and click "Create a new application".</li>
  <li>Fill out the required fields, accept the rules of the road, and then click on the "Create your Twitter application" button. You will not need a callback URL for this app, so feel free to leave it blank.</li>
  <li>Once the app has been created, click the "Create my access token" button.</li>
  <li>You are done! You will need the following data later on:</ol>', "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Consumer Key", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_consumer_key",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Consumer Secret", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_consumer_secret",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Access Token", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_access_token",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Access Token Secret", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_access_token_secret",
        "default" => "",
        "type" => "text"
    ),
    array(
        "type" => "end_sub_pane"
    ),

    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_custom_js'
    ),
    array(
        "name" => __("Advanced / Custom JS", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Custom JS", "mk_framework"),
        "desc" => __("You can write your own custom Javascript here in textarea. So you wont need to modify theme files.", "mk_framework"),
        "id" => "custom_js",
        "default" => '',
        'el_class' => 'mk_black_white',
        "rows" => 30,
        "type" => "textarea"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_custom_css'
    ),
    array(
        "name" => __("Advanced / Custom CSS", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Custom CSS", "mk_framework"),
        "desc" => __("You can write your own custom css, this way you wont need to modify Theme CSS files.", "mk_framework"),
        "id" => "custom_css",
        'el_class' => 'mk_black_white',
        "default" => '',
        "rows" => 30,
        "type" => "textarea"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_export_options'
    ),
    array(
        "name" => __("Advanced / Export Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Export Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "theme_export_options",
        "default" => '',
        "type" => "export"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_import_options'
    ),
    array(
        "name" => __("Advanced / Import Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Import Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "theme_import_options",
        "default" => '',
        "type" => "import"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_troubleshooting'
    ),
    array(
        "name" => __("Advanced / Troubleshooting", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("System Diagnostic Information", "mk_framework"),
        "desc" => __("Below information is useful to diagnose some of the possible reasons to malfunctions, performance issues or any errors. You can faciliate the process of support by providing below information to our support staff.", "mk_framework"),
        "type" => "sys_diagnose"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    ),
    array(
        "type" => "end"
    )
);