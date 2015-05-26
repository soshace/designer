<?php
$config  = array(
	'title' => sprintf( '%s Clients Options', THEME_NAME ),
	'id' => 'mk-metaboxes-notab',
	'pages' => array(
		'pricing'
	),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(

	array(
		"name" => __( "Skin", "mk_framework" ),
		"desc" => __( "This color will be applied only to this plan.", "mk_framework" ),
		"id" => "skin",
		"default" => "#25ae8d",
		"type" => "color"
	),
	array(
		"name" => __("Featured Plan?", "mk_framework" ),
		"desc" => __( "If you would like to select this item as featured enable this option.", "mk_framework" ),
		"id" => "featured",
		"default" => 'false',
		"type" => "toggle"
	),
	array(
		"name" => __( "Featured Plan Ribbon Text", "mk_framework" ),
		"desc" => __( "This text will be place in a ribbon only in Featured Plan.", "mk_framework" ),
		"id" => "_ribbon_txt",
		"default" => "FEATURED",
		"type" => "text"
	),
	array(
		"name" => __( "Plan Name", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_plan",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Price", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_price",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Currency Symbol", "mk_framework" ),
		"desc" => __( "eg: $, ¥, ₡, €", "mk_framework" ),
		"id" => "_currency",
		"default" => "",
		"type" => "text"
	),
		array(
		"name" => __( "Period", "mk_framework" ),
		"desc" => __( "eg: monthly, yearly, daily", "mk_framework" ),
		"id" => "_period",
		"default" => "",
		"type" => "text"
	),
		
	array(
		"name" => __( "Features", "mk_framework" ),
		"desc" => __( 'You can learn more on documentation on how to make a sample pricing table list. switch to Text mode to see html code.', "mk_framework" ),
		"id" => "_features",
		"default" => '<ul>
	<li>10 Projects</li>
	<li>32 GB Storage</li>
	<li>Unlimited Users</li>
	<li>15 GB Bandwidth</li>
	<li><i class="mk-icon-ok"></i></li>
	<li>Enhanced Security</li>
	<li>Retina Display Ready</li>
	<li><i class="mk-icon-ok"></i></li>
	<li><i class="mk-icon-star"></i><i class="mk-icon-star"></i><i class="mk-icon-star"></i><i class="mk-icon-star"></i><i class="mk-icon-star"></i></li>
</ul>',
		"type" => "editor"
	),

	
	array(
		"name" => __( "Button Text", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_btn_text",
		"default" => "Purchase",
		"type" => "text"
	),

	array(
		"name" => __( "Button URL", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_btn_url",
		"default" => "",
		"type" => "text"
	),
	array(
            "name" => __("Button Style", "mk_framework"),
            "desc" => __("Choose your button style", "mk_framework"),
            "id" => "_button_style",
            "default" => 'flat',
            "options" => array(
                  "flat" => __("Flat", "mk_framework"),
                  "three" => __("Three Dimension", "mk_framework"),
                  "two" => __("Two Dimension", "mk_framework"),
                  "outline" => __("Outline", "mk_framework"),
            ),
            "type" => "select"
      ),
	array(
		"name" => __( "Button Color", "mk_framework" ),
		"desc" => __( "If left blank defaults will be used.", "mk_framework" ),
		"id" => "_button_skin",
		"default" => "",
		"type" => "color"
	),

);
new mkMetaboxesGenerator( $config, $options );
