<?php
$config  = array(
      'title' => sprintf('%s Banner Video Settings <span style="color: red">(Deprecated)</span>', THEME_NAME),
      'id' => 'mk-metaboxes-banner-video',
      'pages' => array(
            'page'
      ),
      'callback' => '',
      'context' => 'normal',
      'priority' => 'low'
);
$options = array(
      array(
            "name" => __("Enable Banner Video", "mk_framework"),
            "desc" => __("If you enable this option you can upload video files which will play in banner section background.", "mk_framework"),
            "id" => "_enable_banner_video",
            "default" => "false",
            "type" => "toggle"
      ),
      array(
            "name" => __("Upload Video (MP4 format)", "mk_framework"),
            "desc" => __("", "mk_framework"),
            "id" => "_banner_video_mp4",
            "default" => '',
            "preview" => false,
            "type" => 'upload'
      ),
      array(
            "name" => __("Upload Video (WebM format)", "mk_framework"),
            "desc" => __("", "mk_framework"),
            "id" => "_banner_video_webm",
            "default" => '',
            "preview" => false,
            "type" => 'upload'
      ),
      array(
            "name" => __("Upload Video (OGV format)", "mk_framework"),
            "desc" => __("", "mk_framework"),
            "id" => "_banner_video_ogv",
            "default" => '',
            "preview" => false,
            "type" => 'upload'
      ),
      array(
            "name" => __("Upload Video Preview Image", "mk_framework"),
            "desc" => __("This Image will be shown until the video load.", "mk_framework"),
            "id" => "_banner_video_preview",
            "default" => '',
            "type" => 'upload'
      ),
      array(
            "name" => __("Show Video Pattern Mask", "mk_framework"),
            "desc" => __("If you enable this option a pattern will overlay the video.", "mk_framework"),
            "id" => "_banner_video_pattern",
            "default" => "false",
            "type" => "toggle"
      ),
      array(
            "name" => __('Video Color Overlay', 'mk_framework'),
            "id" => "_banner_video_color_overlay",
            "default" => "",
            "type" => "color"
      )
);
new mkMetaboxesGenerator($config, $options);