<?php

extract( shortcode_atts( array(
			'id' => '',
		), $atts ) );

if ( !empty( $id ) ) {
	echo do_shortcode( '[layerslider id="'.$id.'"]' );
}
