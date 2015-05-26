<?php 

/* 
*****Save Admin Options via wordpress built-in ajax save option
*/

add_action( 'wp_ajax_theme_data_save', 'theme_save_ajax' );

function theme_save_ajax() {

	check_ajax_referer( 'theme-data', 'security' );
	$data = $_POST;
	$button_clicked = $_POST['button_clicked'];

	$option_storage = substr($_POST['option_storage'],0,18) === substr(THEME_OPTIONS,0,18) ? $_POST['option_storage'] : THEME_OPTIONS;


	if($button_clicked == 'save_theme_options_top' || $button_clicked == 'save_theme_options_bottom') {

	unset( $data['security'], $data['action'] );

	if ( !is_array( get_option( $option_storage ) ) ) {
		$options = array();
	} else {
		$options = get_option( $option_storage );
	}

	$data = is_array( $data ) ?  array_map( 'stripslashes_deep', $data ) :  stripslashes( $data );


	if ( !empty( $data ) ) {
		if ( update_option( $option_storage, $data )  && update_option('mk_jupiter_flush_rules', 1)) {

			update_option( $option_storage . '_backup', $data );

			die( '1' ); 
		} else {
			die( '2' );
		}
	} else {
		die( '0' );
	}

} elseif($button_clicked == 'reset_theme_options') {
		
		delete_option( $option_storage);
		die( '3' );


} elseif($button_clicked =='import_theme_options'){
	$import_data = $_POST['theme_import_options'];
	$import_data_unserilized = unserialize(base64_decode($import_data));

if ( !empty( $import_data_unserilized ) ) {
	if ( update_option( $option_storage, $import_data_unserilized ) ) {
			die( '4' );
		} else {
			die( '5' );
		}
} else {
	// nothing will occure if the field is empty
}

}




} 