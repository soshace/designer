<?php

function mk_theme_enqueue_scripts() {
	if ( !is_admin() && !( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) )) {
		global $mk_options;

		$output = '';

		$theme_data = wp_get_theme("Jupiter");

		
		remove_action( 'bbp_enqueue_scripts' , 'enqueue_styles' );

		/* Register Scripts */
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_register_script( 'jquery-icarousel', THEME_JS .'/icarousel.packed.js', array( 'jquery' ), $theme_data['Version'], true );
		wp_register_script( 'jquery-raphael', THEME_JS .'/jquery.raphael-min.js', array( 'jquery' ), $theme_data['Version'], true );
		wp_register_script( 'instafeed', THEME_JS .'/instafeed.min.js', array( 'jquery' ), false, true );


		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );

		}
			
		if($mk_options['minify-js'] == 'true') {
            wp_enqueue_script( 'theme-scripts-min', THEME_JS .'/min/scripts-vendors-ck.js', array( 'jquery' ), $theme_data['Version'], true );    
        } else {
            wp_enqueue_script( 'theme-scripts', THEME_JS .'/scripts-vendors.js', array( 'jquery' ), $theme_data['Version'], true );    
        }

        if($mk_options["disable_smoothscroll"] == "true") { 
            wp_enqueue_script( 'smoothscroll', THEME_JS .'/smoothscroll.js', array(), $theme_data['Version'], true );    
		} 

		// wp_enqueue_script( 'requirejs', THEME_JS .'/require.js', array( 'jquery' ), $theme_data['Version'], true );

        if($mk_options['minify-css'] == 'true') {
        	wp_enqueue_style( 'theme-styles', THEME_STYLES.'/theme-styles.min.css', false, $theme_data['Version'], 'all' );
        	wp_enqueue_style( 'pe-line-icon', THEME_STYLES.'/pe-line-icons.min.css', false, $theme_data['Version'], 'all' );
        	wp_enqueue_style( 'font-awesome', THEME_STYLES.'/font-awesome.min.css', false, $theme_data['Version'], 'all' );
			wp_enqueue_style( 'icomoon-fonts', THEME_STYLES.'/icomoon-fonts.min.css', false, $theme_data['Version'], 'all' );
			wp_enqueue_style( 'theme-icons', THEME_STYLES.'/theme-icons.min.css', false, $theme_data['Version'], 'all' );
        } else {
        	wp_enqueue_style( 'theme-styles', THEME_STYLES.'/styles.css', false, $theme_data['Version'], 'all' );
        	wp_enqueue_style( 'pe-line-icon', THEME_STYLES.'/pe-line-icons.css', false, $theme_data['Version'], 'all' );
        	wp_enqueue_style( 'font-awesome', THEME_STYLES.'/font-awesome.css', false, $theme_data['Version'], 'all' );
			wp_enqueue_style( 'icomoon-fonts', THEME_STYLES.'/icomoon-fonts.css', false, $theme_data['Version'], 'all' );
			wp_enqueue_style( 'theme-icons', THEME_STYLES.'/theme-icons.css', false, $theme_data['Version'], 'all' );
			wp_enqueue_style( 'theme-icons', THEME_STYLES.'/theme-icons.css', false, $theme_data['Version'], 'all' );
        }


	

		if ( $mk_options['special_fonts_type_1'] == 'google' && !empty( $mk_options['special_fonts_list_1'] ) ) {
			$subset_1 = !empty($mk_options['google_font_subset_1']) ? (':&subset='.$mk_options['google_font_subset_1']) : '';
			wp_enqueue_style( 'google-font-api-special-1', 'http'.((is_ssl())? 's' : '').'://fonts.googleapis.com/css?family=' .$mk_options['special_fonts_list_1'].':300italic,400italic,600italic,700italic,800italic,900italic,900,400,300,800,700,600'.$subset_1 , false, false, 'all' );
		}


		if ( $mk_options['special_fonts_type_2'] == 'google' && !empty( $mk_options['special_fonts_list_2'] ) ) {
			$subset_2 = !empty($mk_options['google_font_subset_2']) ? ('&subset='.$mk_options['google_font_subset_2']) : '';
			wp_enqueue_style( 'google-font-api-special-2', 'http'.((is_ssl())? 's' : '').'://fonts.googleapis.com/css?family=' .$mk_options['special_fonts_list_2'].':300italic,400italic,600italic,700italic,800italic,900italic,900,400,300,800,700,600'.$subset_2  , false, false, 'all' );

		}



	}
}
add_action( 'wp_enqueue_scripts', 'mk_theme_enqueue_scripts', 10 );



function mk_preloader_script() {
global $mk_options;

	$single_preloader = '';
	$preloader_check = 'disabled';
	
	if(global_get_post_id()) {
		$single_preloader = get_post_meta( global_get_post_id(), 'page_preloader', true );
	}

	if($single_preloader == 'true') {
		$preloader_check = 'enabled';
	} else {
		if($mk_options['preloader'] == 'true') {
			$preloader_check = 'enabled';
		}
	}

	if($preloader_check == 'enabled') {
		wp_enqueue_script( 'queryloasder2', THEME_JS .'/min/jquery.queryloader2.js', array( 'jquery' ), false, false );	
	}
	
}

add_action( 'wp_enqueue_scripts', 'mk_preloader_script', 1 );

