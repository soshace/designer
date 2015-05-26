<?php

extract( shortcode_atts( array(
			'id' => '',
		), $atts ) );

if ( !empty( $id ) ) {
	echo do_shortcode( '[rev_slider '.$id.']' );
}
