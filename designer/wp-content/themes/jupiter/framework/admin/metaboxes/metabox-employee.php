<?php
$config  = array(
	'title' => sprintf( '%s Employees Options', THEME_NAME ),
	'id' => 'mk-metaboxes-notab',
	'pages' => array(
		'employees'
	),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(


	array(
		"name" => __( "Employee Position", "mk_framework" ),
		"desc" => __( "Please enter team member's Position in the company.", "mk_framework" ),
		"id" => "_position",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "About Member", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_desc",
		"default" => "",
		"type" => "editor"
	),

	array(
		"name" => __( "Link to a URL", "mk_framework" ),
		"desc" => __( "Optionally you can add URL to this memeber such as a detailed page.", "mk_framework" ),
		"id" => "_permalink",
		"default" => "",
		"type" => "superlink"
	),

	array(
		"name" => __( "Email Address", "mk_framework" ),
		"desc" => __( "", "mk_framework" ),
		"id" => "_email",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Social Network (Facebook)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_facebook",
		"default" => "",
		"type" => "text"
	),

	array(
		"name" => __( "Social Network (Twitter)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_twitter",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => __( "Social Network (Google Plus)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_googleplus",
		"default" => "",
		"type" => "text"
	),

	array(
		"name" => __( "Social Network (Linked In)", "mk_framework" ),
		"desc" => __( "Please enter full URL of this social network(include http://).", "mk_framework" ),
		"id" => "_linkedin",
		"default" => "",
		"type" => "text"
	),

	array(
		"desc" => __( "Please Use the featured image metabox to upload your employee photo and then assign to the post.", "mk_framework" ),
		"type" => "info"
	),



);
new mkMetaboxesGenerator( $config, $options );
