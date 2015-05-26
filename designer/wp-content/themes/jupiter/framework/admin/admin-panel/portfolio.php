<?php
$theme_options_portfolio = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_portfolio'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_portfolio_single" => __("Portfolio Single Post", "mk_framework"),
            "mk_options_portfolio_archive" => __("Portfolio Archive", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_portfolio_single'
    ),
    array(
        "name" => __("Portfolio / Single Post", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Portfolio Slug", "mk_framework"),
        "desc" => __("Portfolio Slug is the text that is displyed in the URL (e.g. www.domain.com/<strong>portfolio-posts</strong>/morbi-et-diam-massa/). As shown in the example, it is set to 'portfolio-posts' by default but you can change it to anything to suite your preference. However you should not have the same slug in any page or other post slug and if so the pagination will return 404 error naturally due to the internal conflicts.", "mk_framework"),
        "id" => "portfolio_slug",
        "default" => 'portfolio-posts',
        "type" => "text"
    ),
    array(
        "name" => __("Portfolio Single Layout", "mk_framework"),
        "desc" => __("This option allows you to define the page layout of Portfolio Single page as full width without sidebar, left sidebar or right sidebar.", "mk_framework"),
        "id" => "portfolio_single_layout",
        "default" => "full",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Single Featured Image Height", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "Portfolio_single_image_height",
        "min" => "100",
        "max" => "1000",
        "step" => "1",
        "default" => "500",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Single Portfolio Category", "mk_framework"),
        "desc" => __("Using this option you can disable portfolio item category from content.", "mk_framework"),
        "id" => "single_portfolio_cats",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
        "name" => __("Single Portfolio Social Share", "mk_framework"),
        "desc" => __("Using this option you can disable social share from portfolio details page.", "mk_framework"),
        "id" => "single_portfolio_social",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Related Projects", "mk_framework"),
        "desc" => __("This option allows you to enable or disable the related projects.", "mk_framework"),
        "id" => "enable_portfolio_similar_posts",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Previous & Next Arrows", "mk_framework"),
        "desc" => __("Using this option you can turn on/off the navigation arrows when viewing the portfolio single page.", "mk_framework"),
        "id" => "portfolio_next_prev",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Comment", "mk_framework"),
        "desc" => __("This option allows you to enable or disable the comment section on your single portfolio page.", "mk_framework"),
        "id" => "enable_portfolio_comment",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_portfolio_archive'
    ),
    array(
        "name" => __("Portfolio / Archive", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Portfolio Archive Layout", "mk_framework"),
        "desc" => __("This option allows you to define the layout of Portfolio Archive page as full width without sidebar, left sidebar or right sidebar.", "mk_framework"),
        "id" => "archive_portfolio_layout",
        "default" => "right",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Portfolio Style", "mk_framework"),
        "id" => "archive_portfolio_style",
        "default" => 'classic',
        "options" => array(
            "classic" => __('Classic', "mk_framework"),
            "grid" => __('Grid', "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Columns", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "archive_portfolio_column",
        "min" => "1",
        "max" => "6",
        "step" => "1",
        "default" => "3",
        "unit" => 'column',
        "type" => "range"
    ),
    array(
        "name" => __("Featured Image Height", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "archive_portfolio_image_height",
        "min" => "100",
        "max" => "1000",
        "step" => "1",
        "default" => "400",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Pagination Style", "mk_framework"),
        "id" => "archive_portfolio_pagination_style",
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
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    )
);