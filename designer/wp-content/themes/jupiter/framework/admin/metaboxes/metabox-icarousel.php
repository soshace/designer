<?php
$config  = array(
  'title' => sprintf( '%s Slideshow Options', THEME_NAME ),
  'id' => 'mk-metaboxes-icarousel',
  'pages' => array(
    'icarousel'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(



  array(
    "name" => __( "Pause Time", "mk_framework" ),
    "desc" => __( "You can define a pause time for this slide which will override the global pause time.", "mk_framework" ),
    "id" => "_pause_time",
    "min" => "100",
    "max" => "10000",
    "step" => "100",
    "unit" => 'ms',
    "default" => '1000',
    "type" => "range"
  ),

array(
    "desc" => __( "Please Use the featured image metabox to upload your images. Images will be cropped to fit its container.", "mk_framework" ),
    "type" => "info"
  ),

);
new mkMetaboxesGenerator( $config, $options );
