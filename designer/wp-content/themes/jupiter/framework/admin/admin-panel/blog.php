<?php
$theme_options_blog = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_blog'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_blog_single_post" => __("Blog Single Post", "mk_framework"),
            "mk_options_archive_posts" => __("Archive", "mk_framework"),
            "mk_options_search_posts" => __("Search", "mk_framework"),
            "mk_options_news_single" => __("News", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_blog_single_post'
    ),
    array(
        "name" => __("Blog & News / Single Post", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Single Layout", "mk_framework"),
        "desc" => __("This option allows you to define the page layout of Blog Single page as full width without sidebar, left sidebar or right sidebar.", "mk_framework"),
        "id" => "single_layout",
        "default" => "full",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Featured Image Height", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "single_featured_image_height",
        "min" => "100",
        "max" => "1000",
        "step" => "1",
        "default" => "300",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Featured Image", "mk_framework"),
        "desc" => __("If you do not want to set a featured image (in case of sound post type : Audio player, in case of video post type : Video Player) kindly disable it here.", "mk_framework"),
        "id" => "single_disable_featured_image",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Image Cropping", "mk_framework"),
        "desc" => __("If you do not want automatic image cropping disable this option.", "mk_framework"),
        "id" => "blog_single_img_crop",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Single Blog Post Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "blog_single_title",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Meta Section", "mk_framework"),
        "desc" => __("Using this option you can show/hide extra information about the blog or post, such as Author, Date Created, etc...", "mk_framework"),
        "id" => "single_meta_section",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Blog Social Share", "mk_framework"),
        "desc" => __("Using this option you can Enable/Disable social share section from blog archive and single pages.", "mk_framework"),
        "id" => "single_blog_social",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Previous & Next Arrows", "mk_framework"),
        "desc" => __("Using this option you can turn on/off the navigation arrows when viewing the blog single page.", "mk_framework"),
        "id" => "blog_prev_next",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("About Author Box", "mk_framework"),
        "desc" => __("You can enable or disable the about author box from here. You can modify about author information from your profile settings. Besides, if you add your website URL, your email address and twitter account from extra profile information they will be displayed as an icon link.", "mk_framework"),
        "id" => "enable_blog_author",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Meta Tags", "mk_framework"),
        "desc" => __("Using this option you can Show/Hide meta tags that you have set in Tags meta box inside each post.", "mk_framework"),
        "id" => "diable_single_tags",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Recommended Posts", "mk_framework"),
        "desc" => __("Using this option you can Show/Hide Recommended Posts section inside your single post item.", "mk_framework"),
        "id" => "enable_single_related_posts",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Blog Posts Comments", "mk_framework"),
        "desc" => __("You can Turn On/Off the comments section for blogs here.", "mk_framework"),
        "id" => "enable_blog_single_comments",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_archive_posts'
    ),
    array(
        "name" => __("Blog & News / Archive", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Blog Archive Layout", "mk_framework"),
        "desc" => __("This option allows you to define the layout of blog Archive page as full width without sidebar, left sidebar or right sidebar.", "mk_framework"),
        "id" => "archive_page_layout",
        "default" => "right",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
     array(
        "name" => __("Archive Loop Style", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "archive_loop_style",
        "default" => 'modern',
        "options" => array(
            "modern" => 'modern',
            "classic" => 'Classic',
            "newspaper" => 'Newspaper',
            "spotlight" => 'Spotlight',
            "thumbnail" => 'Thumbnail',
            "magazine" => 'Magazine',
            "grid" => 'grid'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Archive Page Title", "mk_framework"),
        "desc" => __("Using this option you can add a title to archive page.", "mk_framework"),
        "id" => "archive_page_title",
        "default" => __("Archives", "mk_framework"),
        "type" => "text"
    ),
    array(
        "name" => __("Archive Page Subtitle", "mk_framework"),
        "desc" => __("You can disable or enable Archive page Subtitle.", "mk_framework"),
        "id" => "archive_disable_subtitle",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Archive Loop Image Height", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "archive_blog_image_height",
        "min" => "100",
        "max" => "1000",
        "step" => "1",
        "default" => "350",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Show Blog Meta?", "mk_framework"),
        "desc" => __("This option will let you disable meta in archive loop", "mk_framework"),
        "id" => "archive_blog_meta",
        "default" => 'true',
        "type" => "toggle"
    ),
   
    array(
        "name" => __("Pagination Style", "mk_framework"),
        "id" => "archive_pagination_style",
        "default" => '1',
        "options" => array(
            "1" => __('Pagination Nav', "mk_framework"),
            "2" => __('Load More Button', "mk_framework"),
            "3" => __('Load on Page Scroll', "mk_framework")
        ),
        "type" => "radio"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_search_posts'
    ),
    array(
        "name" => __("Blog & News / Search", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Search Layout", "mk_framework"),
        "desc" => __("This option allows you to define the layout of search results page as full width without sidebar, left sidebar or right sidebar.", "mk_framework"),
        "id" => "search_page_layout",
        "default" => "right",
        "item_padding" => "20px 30px 0 0",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Search Page Title", "mk_framework"),
        "desc" => __("Using this option you can add a title to Search page.", "mk_framework"),
        "id" => "search_page_title",
        "default" => __("Search", "mk_framework"),
        "type" => "text"
    ),
    array(
        "name" => __("Search Page subtitle", "mk_framework"),
        "desc" => __("You can disable or enable Search page subtitle.", "mk_framework"),
        "id" => "search_disable_subtitle",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_news_single'
    ),
    array(
        "name" => __("Blog & News / News", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("News Slug", "mk_framework"),
        "desc" => __("News Slug is the text that is displyed in the URL (e.g. www.domain.com/<strong>news-posts</strong>/morbi-et-diam-massa/). As shown in the example, it is set to 'news-posts' by default but you can change it to anything to suite your preference. However you should not have the same slug in any page or other post slug and if so the pagination will return 404 error naturally due to the internal conflicts.", "mk_framework"),
        "id" => "news_slug",
        "default" => 'news-posts',
        "type" => "text"
    ),
    array(
        "name" => __("News Page", "mk_framework"),
        "desc" => __("Choose which page you would like to assign as News page. Even though this is optional, but you will get the [Back to News] button in single post headings which makes users fins news pages easily. This page also will be used in News Teaser in homepage.", "mk_framework"),
        "id" => "news_page",
        "target" => 'page',
        "default" => "",
        "prompt" => __("Choose page..", "mk_framework"),
        "type" => "dropdown"
    ),
    array(
        "name" => __("News Single Post Layout", "mk_framework"),
        "desc" => __("This option allows you to define the page layout of News Single page as full width without sidebar, left sidebar or right sidebar.", "mk_framework"),
        "id" => "news_layout",
        "default" => "full",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("News Single Post Featured Image Height", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "news_featured_image_height",
        "min" => "100",
        "max" => "1000",
        "step" => "1",
        "default" => "340",
        "unit" => 'px',
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
