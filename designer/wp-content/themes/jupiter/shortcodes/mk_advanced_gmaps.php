<?php


extract( shortcode_atts( array(
			'height' => '400',
			'map_height' => 'custom',
			'latitude' => '',
			'longitude' => '',
			'address' => '',

			'latitude_2' => '',
			'longitude_2' => '',
			'address_2' => '',

			'latitude_3' => '',
			'longitude_3' => '',
			'address_3' => '',

			'zoom' => '14',
			'pan_control' => 'true',
			'draggable' => 'true',
			'zoom_control' => 'true',
			'map_type_control' => 'true',
			'map_type' => 'ROADMAP',
			'scale_control' => 'true',
			'pin_icon' => '',
			'modify_coloring' => 'false',
			'hue' => '#ccc',
			'saturation' => '',
			'lightness' => '',
			'el_class' => '',
			
		), $atts ) );
$output = '';

if ( $longitude == '' && $latitude == '') { return null; }

if ( $zoom < 1 ) {
	$zoom = 1;
}

$id = uniqid();

$map_type = !empty($map_type) ? $map_type : 'ROADMAP';

if($map_height == 'custom') {
	$map_height_css = 'height:'.$height.'px;';
} else {
	$map_height_css = 'full-height-map';
}


$output .= '<div id="google-map-'.$id.'" class="mk-advanced-gmaps '.$map_height_css.'" data-map-type="'.$map_type.'" style="'.$map_height_css.'width:100%;" data-zoom="'.$zoom.'" data-pin-icon="'.$pin_icon.'" data-latitude="'.$latitude.'" data-longitude="'.$longitude.'" data-address="'.$address.'" data-latitude2="'.$latitude_2.'" data-longitude2="'.$longitude_2.'" data-address2="'.$address_2.'" data-latitude3="'.$latitude_3.'" data-longitude3="'.$longitude_3.'" data-address3="'.$address_3.'" data-pan-control="'.$pan_control.'" data-zoom-control="'.$zoom_control.'" data-map-type-control="'.$map_type_control.'" data-scale-control="'.$scale_control.'" data-draggable="'.$draggable.'" data-modify-coloring="'.$modify_coloring.'" data-saturation="'.$saturation.'" data-lightness="'.$lightness.'" data-hue="'.$hue.'"></div>';  
$output .= '<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>';

echo $output;


// global $app_modules;

// $app_modules[] = array(
//   'name' => 'google-map',
//   'params' => array(
//       'id' => 'google-map-'.$id
//     )
// );
