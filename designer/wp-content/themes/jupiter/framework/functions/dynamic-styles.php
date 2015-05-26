<?php
/*
*
* Contains all the dynamic css rules generated based on theme settings.
*
*/

function mk_dynamic_css() {

	wp_enqueue_style( 'mk-style', get_stylesheet_uri(), false, false, 'all' );

global $mk_options;



$output = $fontface_style_1 = $fontface_style_2 = $fontface_css_1 = $fontface_css_2 = $google_font_2 = $google_font_1 = $typekit_fonts_1 = $typekit_fonts_2 = '';
$safefont_css_2 = $safefont_css_1 =  $body_bg = $header_bg = $banner_bg = $page_bg = $footer_bg = $classic_nav_bg = '';


/* Get skin color from global $_GET for skin switcher panel */
if(isset($_GET['skin'])) {
	$skin_color = '#'.$_GET['skin'];
} else {
	$skin_color = $mk_options['skin_color'];
}








###########################################
# Typography
###########################################

$special_elements_1_list = isset($mk_options['special_elements_1']) ? $mk_options['special_elements_1'] : '';
$special_elements_2_list = isset($mk_options['special_elements_2']) ? $mk_options['special_elements_2'] : '';



function my_strstr( $haystack, $needle, $before_needle = false ) {
	if ( !$before_needle ) return strstr( $haystack, $needle );
	else return substr( $haystack, 0, strpos( $haystack, $needle ) );
}

/* fontface */
if (isset($mk_options['special_fonts_type_1']) && ($mk_options['special_fonts_type_1'] == 'fontface')) {
	$fontface_1 = $mk_options['special_fonts_list_1'];

	$stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
	if ( file_exists( $stylesheet ) ) {
		$file_content = file_get_contents( $stylesheet );
		if ( preg_match( "/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$fontface_1\\1.*?}/is", $file_content, $match ) ) {
			$fontface_style_1 = preg_replace( "/url\s*\(\s*['|\"]\s*/is", "\\0".FONTFACE_URI."/", $match[0] )."\n";
		}

		if ( is_array( $mk_options['special_elements_1'] ) ) {
			$special_elements_1 = implode( ', ', $mk_options['special_elements_1'] );
		} else {
			$special_elements_1 = $mk_options['special_elements_1'];
		}

		if ( $special_elements_1 && $fontface_1 ) {
			$fontface_css_1 = $special_elements_1 . '{ font-family: "' . $fontface_1.'"}';
		}

	}
}

if (isset($mk_options['special_fonts_type_2']) && ($mk_options['special_fonts_type_2'] == 'fontface')) {
	$fontface_2 = $mk_options['special_fonts_list_2'];

	$stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
	if ( file_exists( $stylesheet ) ) {
		$file_content = file_get_contents( $stylesheet );
		if ( preg_match( "/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$fontface_2\\1.*?}/is", $file_content, $match ) ) {
			$fontface_style_2 = preg_replace( "/url\s*\(\s*['|\"]\s*/is", "\\0".FONTFACE_URI."/", $match[0] )."\n";
		}
			if ( is_array( $special_elements_2_list ) ) {
				$special_elements_2 = implode( ', ', $special_elements_2_list );
			} else {
				$special_elements_2 = $special_elements_2_list;
			}

			if ( $special_elements_2 && $fontface_2 ) {
				$fontface_css_2 = $special_elements_2 . '{ font-family: "' . $fontface_2.'"}';
			}
	}
}




/**
 * Safe Fonts
 * */
if (isset($mk_options['special_fonts_type_1']) && ($mk_options['special_fonts_type_1'] == 'safe_font')) {
	$safefont_1 = $mk_options['special_fonts_list_1'];

	if ( is_array( $mk_options['special_elements_1'] ) ) {
		$special_elements_1 = implode( ', ', $mk_options['special_elements_1'] );
	} else {
		$special_elements_1 = $mk_options['special_elements_1'];
	}

	if ( $special_elements_1 && $safefont_1 ) {
		$safefont_css_1 = $special_elements_1 . '{ font-family: ' . $safefont_1.'}';
	}

}


if (isset($mk_options['special_fonts_type_1']) && ($mk_options['special_fonts_type_2'] == 'safe_font')) {
	$safefont_2 = $mk_options['special_fonts_list_2'];

	if ( is_array( $mk_options['special_elements_2'] ) ) {
		$special_elements_2 = implode( ', ', $mk_options['special_elements_2'] );
	} else {
		$special_elements_2 = $mk_options['special_elements_2'];
	}

	if ( $special_elements_2 && $safefont_2 ) {
		$safefont_css_2 = $special_elements_2 . '{ font-family: ' . $safefont_2.'}';
	}

}



/**
 * Typekit fonts
 * */

$typekit_id = isset($mk_options['typekit_id']) ? $mk_options['typekit_id'] : '';
$typekit_elements_list_1 = isset($mk_options['typekit_elements_1']) ? $mk_options['typekit_elements_1'] : '';
$typekit_font_family_1 = isset($mk_options['typekit_font_family_1']) ? $mk_options['typekit_font_family_1'] : '';

if($typekit_id != '' && $typekit_elements_list_1 != '' && $typekit_font_family_1 != '') {
	if ( is_array( $typekit_elements_list_1 ) ) {
		$typekit_elements_list_1 = implode( ', ', $typekit_elements_list_1 );
	} else {
		$typekit_elements_list_1 = $typekit_elements_list_1;
	}
	$typekit_fonts_1 = $typekit_elements_list_1 . ' {font-family: "'.$typekit_font_family_1.'"}';

}

$typekit_elements_list_2 = isset($mk_options['typekit_elements_2']) ? $mk_options['typekit_elements_2'] : '';
$typekit_font_family_2 = isset($mk_options['typekit_font_family_2']) ? $mk_options['typekit_font_family_2'] : '';

if($typekit_id != '' && $typekit_elements_list_2 != '' && $typekit_font_family_2 != '') {
	 if ( is_array( $typekit_elements_list_2 ) ) {
	  $typekit_elements_list_2 = implode( ', ', $typekit_elements_list_2 );
	 } else {
	  $typekit_elements_list_2 = $typekit_elements_list_2;
	 }
	 $typekit_fonts_2 = $typekit_elements_list_2 . ' {font-family: "'.$typekit_font_family_2.'"}';

}



/**
 * Google Fonts
 * */
if ( is_array( $special_elements_1_list ) ) {
	$special_elements_1 = implode( ', ', $special_elements_1_list );
} else {
	$special_elements_1 = $special_elements_1_list;
}

if ( is_array( $special_elements_2_list ) ) {
	$special_elements_2 = implode( ', ', $special_elements_2_list );
} else {
	$special_elements_2 = $special_elements_2_list;
}

if ( $special_elements_1 && $mk_options['special_fonts_type_1'] == 'google' ) {

	$google_font_1 = $special_elements_1  . ' {font-family: ';

	$format_name1 = strpos( $mk_options['special_fonts_list_1'], ':' );
	if ( $format_name1 !== false ) {
		$google_font_1 .=  my_strstr( str_replace( '+', ' ', $mk_options['special_fonts_list_1'] ), ':', true );
	} else { $google_font_1 .= str_replace( '+', ' ', $mk_options['special_fonts_list_1'] );


	}

	$google_font_1 .=' }';
}

if ( $special_elements_2 && $mk_options['special_fonts_type_2'] == 'google' ) {
	$google_font_2 = $special_elements_2  . ' {font-family: ';

	$format_name2 = strpos( $mk_options['special_fonts_list_2'], ':' );
	if ( $format_name2 !== false ) {
		$google_font_2 .=  my_strstr( str_replace( '+', ' ', $mk_options['special_fonts_list_2'] ), ':', true );
	} else { $google_font_2 .= str_replace( '+', ' ', $mk_options['special_fonts_list_2'] );


	}

	$google_font_2 .=' }';

}
$safe_font = $mk_options['font_family'] ? 'font-family: ' . stripslashes( $mk_options['font_family'] ) . ';' : '';





/**
 * Body background
 */

$body_bg .= $mk_options['body_color'] ? 'background-color:'.$mk_options['body_color'].';' : '';
$body_bg .= $mk_options['body_image'] ? 'background-image:url(' . $mk_options['body_image'] . ');' : ' ';
$body_bg .= $mk_options['body_repeat'] ? 'background-repeat:'.$mk_options['body_repeat'].';' : '';
$body_bg .= $mk_options['body_position'] ? 'background-position:'.$mk_options['body_position'].';' : '';
$body_bg .= $mk_options['body_attachment'] ? 'background-attachment:'.$mk_options['body_attachment'].';' : '';



/**
 * Header background
 */
$header_bg .= $mk_options['header_color'] ? 'background-color:'.$mk_options['header_color'].';' : '';
$header_bg .= $mk_options['header_image'] ? 'background-image:url(' . $mk_options['header_image'] . ');' : ' ';
$header_bg .= $mk_options['header_repeat'] ? 'background-repeat:'.$mk_options['header_repeat'].';' : '';
$header_bg .= $mk_options['header_position'] ? 'background-position:'.$mk_options['header_position'].';' : '';
$header_bg .= $mk_options['header_attachment'] ? 'background-attachment:'.$mk_options['header_attachment'].';' : '';



/**
 * Header Banner background
 */

$banner_bg .= $mk_options['banner_color'] ? 'background-color:'.$mk_options['banner_color'].';' : '';
$banner_bg .= $mk_options['banner_image'] ? 'background-image:url(' . $mk_options['banner_image'] . ');' : ' ';
$banner_bg .= $mk_options['banner_repeat'] ? 'background-repeat:'.$mk_options['banner_repeat'].';' : '';
$banner_bg .= $mk_options['banner_position'] ? 'background-position:'.$mk_options['banner_position'].';' : '';
$banner_bg .= $mk_options['banner_attachment'] ? 'background-attachment:'.$mk_options['banner_attachment'].';' : '';



/**
 * Page background
 */

$page_bg .= $mk_options['page_color'] ? 'background-color:'.$mk_options['page_color'].';' : '';
$page_bg .= $mk_options['page_image'] ? 'background-image:url(' . $mk_options['page_image'] . ');' : ' ';
$page_bg .= $mk_options['page_repeat'] ? 'background-repeat:'.$mk_options['page_repeat'].';' : '';
$page_bg .= $mk_options['page_position'] ? 'background-position:'.$mk_options['page_position'].';' : '';
$page_bg .= $mk_options['page_attachment'] ? 'background-attachment:'.$mk_options['page_attachment'].';' : '';


/**
 * Footer background
 */

$footer_bg  = $mk_options['footer_color'] ? 'background-color:'.$mk_options['footer_color'].';' : '';
$footer_bg .= $mk_options['footer_image'] ? 'background-image:url(' . $mk_options['footer_image'] . ');' : ' ';
$footer_bg .= $mk_options['footer_repeat'] ? 'background-repeat:'.$mk_options['footer_repeat'].';' : '';
$footer_bg .= $mk_options['footer_position'] ? 'background-position:'.$mk_options['footer_position'].';' : '';
$footer_bg .= $mk_options['footer_attachment'] ? 'background-attachment:'.$mk_options['footer_attachment'].';' : '';



$page_title_color = $mk_options['page_title_color'];
$page_subtitle_color = $mk_options['page_subtitle_color'];
$banner_border_color = $mk_options['banner_border_color'];
$boxed_layout_shadow_size = $mk_options['boxed_layout_shadow_size'];
$boxed_layout_shadow_intensity = $mk_options['boxed_layout_shadow_intensity'];
$page_title_padding = 15;
$trans_header_border_color = '';


$page_color = $mk_options['page_color'];


if ( global_get_post_id()) {



	$post_id = global_get_post_id();


	$enable = get_post_meta( $post_id, '_enable_local_backgrounds', true );

	if ( $enable == 'true' ) {
		$body_bg  = get_post_meta( $post_id, 'body_color', true ) ? 'background-color: ' .get_post_meta( $post_id, 'body_color', true ).';' : 'background-color: '.$mk_options['body_color'].';';
		$body_bg .= get_post_meta( $post_id, 'body_image', true ) ? 'background-image:url(' . get_post_meta( $post_id, 'body_image', true ) . ');' : '';
		$body_bg .= get_post_meta( $post_id, 'body_repeat', true ) ? 'background-repeat:'.get_post_meta( $post_id, 'body_repeat', true ).';' : '' ;
		$body_bg .= get_post_meta( $post_id, 'body_position', true ) ? 'background-position:'.get_post_meta( $post_id, 'body_position', true ).';' : '';
		$body_bg .= get_post_meta( $post_id, 'body_attachment', true ) ? 'background-attachment:'.get_post_meta( $post_id, 'body_attachment', true ).';' : '';



		$header_bg  = get_post_meta( $post_id, 'header_color', true ) ? 'background-color: ' .get_post_meta( $post_id, 'header_color', true ).';' : 'background-color: '.$mk_options['header_color'].';';
		$header_bg .= get_post_meta( $post_id, 'header_image', true ) ? 'background-image:url(' . get_post_meta( $post_id, 'header_image', true ) . ');' : '';
		$header_bg .= get_post_meta( $post_id, 'header_repeat', true ) ? 'background-repeat:'.get_post_meta( $post_id, 'header_repeat', true ).';' : '' ;
		$header_bg .= get_post_meta( $post_id, 'header_position', true ) ? 'background-position:'.get_post_meta( $post_id, 'header_position', true ).';' : '';
		$header_bg .= get_post_meta( $post_id, 'header_attachment', true ) ? 'background-attachment:'.get_post_meta( $post_id, 'header_attachment', true ).';' : '';


		$banner_bg  = get_post_meta( $post_id, 'banner_color', true ) ? 'background-color: ' .get_post_meta( $post_id, 'banner_color', true ).';' : 'background-color: '.$mk_options['banner_color'].';';
		$banner_bg .= get_post_meta( $post_id, 'banner_image', true ) ? 'background-image:url(' . get_post_meta( $post_id, 'banner_image', true ) . ');' : '';
		$banner_bg .= get_post_meta( $post_id, 'banner_repeat', true ) ? 'background-repeat:'.get_post_meta( $post_id, 'banner_repeat', true ).';' : '' ;
		$banner_bg .= get_post_meta( $post_id, 'banner_position', true ) ? 'background-position:'.get_post_meta( $post_id, 'banner_position', true ).';' : '';
		$banner_bg .= get_post_meta( $post_id, 'banner_attachment', true ) ? 'background-attachment:'.get_post_meta( $post_id, 'banner_attachment', true ).';' : '';


		$page_bg  = get_post_meta( $post_id, 'page_color', true ) ? 'background-color: ' .get_post_meta( $post_id, 'page_color', true ).';' : 'background-color: '.$mk_options['page_color'].';';
		$page_bg .= get_post_meta( $post_id, 'page_image', true ) ? 'background-image:url(' . get_post_meta( $post_id, 'page_image', true ) . ');' : '';
		$page_bg .= get_post_meta( $post_id, 'page_repeat', true ) ? 'background-repeat:'.get_post_meta( $post_id, 'page_repeat', true ).';' : '' ;
		$page_bg .= get_post_meta( $post_id, 'page_position', true ) ? 'background-position:'.get_post_meta( $post_id, 'page_position', true ).';' : '';
		$page_bg .= get_post_meta( $post_id, 'page_attachment', true ) ? 'background-attachment:'.get_post_meta( $post_id, 'page_attachment', true ).';' : '';


		$footer_bg  = get_post_meta( $post_id, 'footer_color', true ) ? 'background-color: ' .get_post_meta( $post_id, 'footer_color', true ).';' : 'background-color: '.$mk_options['footer_color'].';';
		$footer_bg .= get_post_meta( $post_id, 'footer_image', true ) ? 'background-image:url(' . get_post_meta( $post_id, 'footer_image', true ) . ');' : '';
		$footer_bg .= get_post_meta( $post_id, 'footer_repeat', true ) ? 'background-repeat:'.get_post_meta( $post_id, 'footer_repeat', true ).';' : '' ;
		$footer_bg .= get_post_meta( $post_id, 'footer_position', true ) ? 'background-position:'.get_post_meta( $post_id, 'footer_position', true ).';' : '';
		$footer_bg .= get_post_meta( $post_id, 'footer_attachment', true ) ? 'background-attachment:'.get_post_meta( $post_id, 'footer_attachment', true ).';' : '';


		$page_title_color = get_post_meta( $post_id, '_page_title_color', true ) ? get_post_meta( $post_id, '_page_title_color', true ) : '';
		$page_subtitle_color = get_post_meta( $post_id, '_page_subtitle_color', true ) ? get_post_meta( $post_id, '_page_subtitle_color', true ) : '';
		$banner_border_color = get_post_meta( $post_id, '_banner_border_color', true ) ? get_post_meta( $post_id, '_banner_border_color', true ) : '';
		$trans_header_border_color = get_post_meta( $post_id, '_trans_header_border_bottom', true ) ? get_post_meta( $post_id, '_trans_header_border_bottom', true ) : '';



		$boxed_layout_shadow_size = get_post_meta( $post_id, 'boxed_layout_shadow_size', true );
		$boxed_layout_shadow_intensity = get_post_meta( $post_id, 'boxed_layout_shadow_intensity', true );

		$page_color = get_post_meta( $post_id, 'page_color', true ) ? get_post_meta( $post_id, 'page_color', true )  : $page_color;



	}
}



$skin_darker = hexDarker($skin_color,20);
$skin_color_60 = mk_color($mk_options['skin_color'], 0.6);


if($mk_options['main_nav_bg_color'] == '') {
	$classic_nav_bg = $header_bg;
} else {
	$classic_nav_bg = 'background-color:' . $mk_options['main_nav_bg_color'] . ';';
}

$sidebar_width = 100 - $mk_options['content_width'];
$boxed_layout_width = $mk_options['grid_width'] + 60;




###########################################
# Font family
###########################################
$output .= "
body {
	{$safe_font}
}

{$fontface_style_1}
{$fontface_style_2}
{$fontface_css_1}
{$fontface_css_2}
{$google_font_1}
{$google_font_2}
{$safefont_css_1}
{$safefont_css_2}
{$typekit_fonts_1}
{$typekit_fonts_2}
";




###########################################
# Backgrounds
###########################################

$output .= "

body
{
	{$body_bg}
}

#mk-header
{
	{$banner_bg}
}



.mk-header-bg
{
	{$header_bg}
}



.mk-header-toolbar
{
	background-color: {$mk_options['header_toolbar_bg']};
}





#theme-page
{
	{$page_bg}
}



#mk-footer
{
	{$footer_bg}
	";

if(!empty($mk_options['footer_top_thickness']) && !empty($mk_options['footer_top_border_color']))
	$output .="
		border-top:{$mk_options['footer_top_thickness']}px solid {$mk_options['footer_top_border_color']};
	";

$output .= "
}

#mk-footer .footer-wrapper
{
	";

if(isset($mk_options['footer_wrapper_padding']))
	$output .="
		padding:{$mk_options['footer_wrapper_padding']}px 0;
	";
$output .= "
}

#mk-footer .widget
{
	margin-bottom:{$mk_options['footer_widget_margin_bottom']}px;
}



#mk-footer [class*='mk-col-'] {
	padding:0 {$mk_options['footer_gutter']}%;
}





#sub-footer
{
	background-color: {$mk_options['sub_footer_bg_color']};
}

.mk-footer-copyright {
	font-size:{$mk_options['copyright_size']}px;
	letter-spacing: {$mk_options['copyright_letter_spacing']}px;
}


#mk-boxed-layout
{
  -webkit-box-shadow: 0 0 {$boxed_layout_shadow_size}px rgba(0, 0, 0, {$boxed_layout_shadow_intensity});
  -moz-box-shadow: 0 0 {$boxed_layout_shadow_size}px rgba(0, 0, 0, {$boxed_layout_shadow_intensity});
  box-shadow: 0 0 {$boxed_layout_shadow_size}px rgba(0, 0, 0, {$boxed_layout_shadow_intensity});
}







.mk-tabs-panes,
.mk-news-tab .mk-tabs-tabs li.ui-tabs-active a,
.mk-divider .divider-go-top,
.ajax-container,
.mk-fancy-title.pattern-style span,
.mk-portfolio-view-all,
.mk-woo-view-all,
.mk-blog-view-all
{
	background-color: {$page_color};
}



.mk-header-bg
{
  -webkit-opacity: {$mk_options['header_opacity']};
  -moz-opacity: {$mk_options['header_opacity']};
  -o-opacity: {$mk_options['header_opacity']};
  opacity: {$mk_options['header_opacity']};
}



.header-sticky-ready .mk-header-bg
{
  -webkit-opacity: {$mk_options['header_sticky_opacity']};
  -moz-opacity: {$mk_options['header_sticky_opacity']};
  -o-opacity: {$mk_options['header_sticky_opacity']};
  opacity: {$mk_options['header_sticky_opacity']};
}

";


$header_btn_border_thickness = (isset($mk_options['header_btn_border_thickness'])) ? $mk_options['header_btn_border_thickness'] : 1;

/* Header, Header Banner and Header toolbar border bottoms */
if(!empty($mk_options['header_border_color'])) {
	$output .= "
			.mk-header-inner,
			.header-sticky-ready .mk-header-inner,
			.header-style-2.header-sticky-ready .mk-classic-nav-bg
			{
				border-bottom:{$header_btn_border_thickness}px solid {$mk_options['header_border_color']};
			}
			.header-style-4.header-align-left .mk-header-inner,
			.header-style-4.header-align-center .mk-header-inner
			 {
				border-bottom:none;
				border-right:{$header_btn_border_thickness}px solid {$mk_options['header_border_color']};
			}
			.header-style-4.header-align-right .mk-header-inner {
				border-bottom:none;
				border-left:{$header_btn_border_thickness}px solid {$mk_options['header_border_color']};
			}
			.header-style-2 .mk-header-nav-container {
				border-top:{$header_btn_border_thickness}px solid {$mk_options['header_border_color']};
			}
		";
}


if(!empty($mk_options['sticky_header_border_color'])) {
	$output .= "
			.header-sticky-ready .mk-header-inner,
			.header-style-2.header-sticky-ready .mk-classic-nav-bg
			{
				border-bottom:{$header_btn_border_thickness}px solid {$mk_options['sticky_header_border_color']};
			}
		";
}


if(!empty($mk_options['header_toolbar_border_color'])) {
	$output .= "
				.mk-header-toolbar
					{
						border-bottom:1px solid {$mk_options['header_toolbar_border_color']};
					}
			";
}


if(!empty($banner_border_color)) {
	$output .= "
				#mk-header
					{
						border-bottom:1px solid {$banner_border_color};
					}

			";
}

if(!empty($trans_header_border_color)) {
	$output .= "
				#mk-header.transparent-header:not(.header-sticky-ready) .mk-header-holder
					{
						border-bottom:1px solid {$trans_header_border_color};
					}
			";
}






###########################################
# General Typography & Coloring
###########################################

$body_line_height = isset($mk_options['body_line_height']) ? $mk_options['body_line_height'] : 1.66;
$p_line_height = isset($mk_options['p_line_height']) ? $mk_options['p_line_height'] : 1.66;
$output .= "
body
{
	font-size: {$mk_options['body_font_size']}px;
	color: {$mk_options['body_text_color']};
	font-weight: {$mk_options['body_weight']};
	line-height: {$body_line_height}em;
}


p,
.mk-box-icon-2-content {
	font-size: {$mk_options['p_size']}px;
	color: {$mk_options['p_color']};
	line-height: {$p_line_height}em;
}


a {
	color: {$mk_options['a_color']};
}


a:hover {
	color: {$mk_options['a_color_hover']};
}


#theme-page strong {
	color: {$mk_options['strong_color']};
}



#theme-page h1
{
	font-size: {$mk_options['h1_size']}px;
	color: {$mk_options['h1_color']};
	font-weight: {$mk_options['h1_weight']};
	text-transform: {$mk_options['h1_transform']};
}

#theme-page h2
{
	font-size: {$mk_options['h2_size']}px;
	color: {$mk_options['h2_color']};
	font-weight: {$mk_options['h2_weight']};
	text-transform: {$mk_options['h2_transform']};
}


#theme-page h3
{
	font-size: {$mk_options['h3_size']}px;
	color: {$mk_options['h3_color']};
	font-weight: {$mk_options['h3_weight']};
	text-transform: {$mk_options['h3_transform']};
}

#theme-page h4
{
	font-size: {$mk_options['h4_size']}px;
	color: {$mk_options['h4_color']};
	font-weight: {$mk_options['h4_weight']};
	text-transform: {$mk_options['h4_transform']};
}


#theme-page h5
{
	font-size: {$mk_options['h5_size']}px;
	color: {$mk_options['h5_color']};
	font-weight: {$mk_options['h5_weight']};
	text-transform: {$mk_options['h5_transform']};
}


#theme-page h6
{
	font-size: {$mk_options['h6_size']}px;
	color: {$mk_options['h6_color']};
	font-weight: {$mk_options['h6_weight']};
	text-transform: {$mk_options['h6_transform']};
}

.page-introduce-title
{
	font-size: {$mk_options['page_introduce_title_size']}px;
	color: {$page_title_color};
	text-transform: {$mk_options['page_title_transform']};
	font-weight: {$mk_options['page_introduce_weight']};
	letter-spacing: {$mk_options['page_introduce_title_letter_spacing']}px;
}


.page-introduce-subtitle
{
	font-size: {$mk_options['page_introduce_subtitle_size']}px;
	line-height: 100%;
	color: {$page_subtitle_color};
	font-size: {$mk_options['page_introduce_subtitle_size']}px;
	text-transform: {$mk_options['page_introduce_subtitle_transform']};
}


::-webkit-selection
{
	background-color: {$skin_color};
	color:#fff;
}

::-moz-selection
{
	background-color: {$skin_color};
	color:#fff;
}

::selection
{
	background-color: {$skin_color};
	color:#fff;
}

";









###########################################
# Widgets
###########################################

$output .= "

#mk-sidebar,
#mk-sidebar p
{
		font-size: {$mk_options['sidebar_text_size']}px;
		color: {$mk_options['sidebar_text_color']};
		font-weight: {$mk_options['sidebar_text_weight']};
}



#mk-sidebar .widgettitle
{
		text-transform: {$mk_options['sidebar_title_transform']};
		font-size: {$mk_options['sidebar_title_size']}px;
		color: {$mk_options['sidebar_title_color']};
		font-weight: {$mk_options['sidebar_title_weight']};
}


#mk-sidebar .widgettitle a
{
		color: {$mk_options['sidebar_title_color']};
}



#mk-sidebar .widget a
{
		color: {$mk_options['sidebar_links_color']};
}


#mk-footer,
#mk-footer p
{
		font-size: {$mk_options['footer_text_size']}px;
		color: {$mk_options['footer_text_color']};
		font-weight: {$mk_options['footer_text_weight']};
}



#mk-footer .widgettitle
{
		text-transform: {$mk_options['footer_title_transform']};
		font-size: {$mk_options['footer_title_size']}px;
		color: {$mk_options['footer_title_color']};
		font-weight: {$mk_options['footer_title_weight']};
}



#mk-footer .widgettitle a
{
		color: {$mk_options['footer_title_color']};
}



#mk-footer .widget:not(.widget_social_networks) a
{
		color: {$mk_options['footer_links_color']};

}


.mk-side-dashboard {
	background-color: {$mk_options['dash_bg_color']};
}


.mk-side-dashboard,
.mk-side-dashboard p
{
		font-size: {$mk_options['dash_text_size']}px;
		color: {$mk_options['dash_text_color']};
		font-weight: {$mk_options['dash_text_weight']};
}



.mk-side-dashboard .widgettitle
{
		text-transform: {$mk_options['dash_title_transform']};
		font-size: {$mk_options['dash_title_size']}px;
		color: {$mk_options['dash_title_color']};
		font-weight: {$mk_options['dash_title_weight']};
}



.mk-side-dashboard .widgettitle a
{
		color: {$mk_options['dash_title_color']};
}



.mk-side-dashboard .widget a
{
		color: {$mk_options['dash_links_color']};

}

.sidedash-navigation-ul li a,
.sidedash-navigation-ul li .mk-nav-arrow {
	color:{$mk_options['dash_nav_link_color']};
}

.sidedash-navigation-ul li a:hover {
	color:{$mk_options['dash_nav_link_hover_color']};
	background-color:{$mk_options['dash_nav_bg_hover_color']};
}

.mk-fullscreen-nav{
	background-color:{$mk_options['fullscreen_nav_bg_color']};
}
.mk-fullscreen-nav .mk-fullscreen-nav-wrapper .mk-fullscreen-nav-logo {
	margin-bottom: {$mk_options['fullscreen_nav_logo_margin']}px;
}
.mk-fullscreen-nav .fullscreen-navigation-ul .menu-item a{
	color: {$mk_options['fullscreen_nav_link_color']};
	text-transform: {$mk_options['fullscreen_nav_menu_text_transform']};
	font-size: {$mk_options['fullscreen_nav_menu_font_size']}px;
	letter-spacing: {$mk_options['fullscreen_nav_menu_letter_spacing']};
	font-weight: {$mk_options['fullscreen_nav_menu_font_weight']};
	padding: {$mk_options['fullscreen_nav_menu_gutter']}px 0;
	color: {$mk_options['fullscreen_nav_link_color']};
}
.mk-fullscreen-nav .fullscreen-navigation-ul .menu-item a:hover{
	background-color: {$mk_options['fullscreen_nav_link_hov_bg_color']};
	color: {$mk_options['fullscreen_nav_link_hov_color']};
}

";




$sidebar_links_hover_color = (isset($mk_options['sidebar_links_hover_color']) && !empty($mk_options['sidebar_links_hover_color'])) ? $mk_options['sidebar_links_hover_color'] : $skin_color;
$footer_links_hover_color = (isset($mk_options['footer_links_hover_color']) && !empty($mk_options['footer_links_hover_color'])) ? $mk_options['footer_links_hover_color'] : $skin_color;
$dash_links_hover_color = (isset($mk_options['dash_links_hover_color']) && !empty($mk_options['dash_links_hover_color'])) ? $mk_options['dash_links_hover_color'] : $skin_color;

$output .="
#mk-sidebar .widget:not(.widget_social_networks) a:hover 
{
	color: {$sidebar_links_hover_color};
}
#mk-footer .widget:not(.widget_social_networks) a:hover 
{
	color: {$footer_links_hover_color};
}
.mk-side-dashboard .widget:not(.widget_social_networks) a:hover
{
	color: {$dash_links_hover_color};
}



";

















###########################################
# Widths
###########################################

$output .= "

.mk-grid
{
	max-width: {$mk_options['grid_width']}px;
}

.mk-header-nav-container, .mk-classic-menu-wrapper
{
	width: {$mk_options['grid_width']}px;
}


.theme-page-wrapper #mk-sidebar.mk-builtin
{
	width: {$sidebar_width}%;
}

.theme-page-wrapper.right-layout .theme-content,
.theme-page-wrapper.left-layout .theme-content
{
	width: {$mk_options['content_width']}%;
}


.mk-boxed-enabled #mk-boxed-layout,
.mk-boxed-enabled #mk-boxed-layout .header-style-1 .mk-header-holder,
.mk-boxed-enabled #mk-boxed-layout .header-style-3 .mk-header-holder
{
	max-width: {$boxed_layout_width}px;

}


.mk-boxed-enabled #mk-boxed-layout .header-style-1 .mk-header-holder,
.mk-boxed-enabled #mk-boxed-layout .header-style-3 .mk-header-holder
{
		width: 100% !important;
		left:auto !important;
}

.mk-boxed-enabled #mk-boxed-layout .header-style-2.header-sticky-ready .mk-header-nav-container {
	width: {$boxed_layout_width}px !important;
	left:auto !important;	
}

.header-style-1 .mk-header-start-tour,
.header-style-3 .mk-header-start-tour,
.header-style-1 .mk-header-inner #mk-header-search,
.header-style-1 .mk-header-inner,
.header-style-1 .mk-search-trigger,
.header-style-3 .mk-header-inner,
.header-style-1 .header-logo,
.header-style-3 .header-logo,
.header-style-1 .shopping-cart-header,
.header-style-3 .shopping-cart-header,
.header-style-1 #mk-header-social.header-section a,
.header-style-2 #mk-header-social.header-section a,
.header-style-3 #mk-header-social.header-section a
{
	height: {$mk_options['header_height']}px;
	line-height:{$mk_options['header_height']}px;
}


@media handheld, only screen and (max-width: {$mk_options['grid_width']}px){

		.header-grid.mk-grid .header-logo.left-logo
		{
			left: 15px !important;
		}
		.header-grid.mk-grid .header-logo.right-logo, .mk-header-right {
			right: 15px !important;
		}

}
";

$toolbar_toggle = !empty($mk_options['theme_toolbar_toggle']) ? $mk_options['theme_toolbar_toggle'] : 'true';

if(global_get_post_id()) {
  $enable = get_post_meta( global_get_post_id(), '_enable_local_backgrounds', true );
  if($enable == 'true') {
  	$toolbar_toggle_meta = get_post_meta( $post_id, 'theme_toolbar_toggle', true );
    $toolbar_toggle = (isset($toolbar_toggle_meta) && !empty($toolbar_toggle_meta)) ? $toolbar_toggle_meta : $toolbar_toggle;
  }
}

// This seems to be an old tweak - the whole <body> is already moved down the toolbar
$toolbar_toggle_height = ($toolbar_toggle == 'true') ? 32 : 0;
// so lets comment out this value
$header_padding_holder = $mk_options['header_height'] + $toolbar_toggle_height;

$output .="

#mk-theme-container:not(.mk-transparent-header) .header-style-1 .mk-header-padding-wrapper,
#mk-theme-container:not(.mk-transparent-header) .header-style-3 .mk-header-padding-wrapper {
	padding-top:{$header_padding_holder}px;
}


";









#################################################
# Content maximum width to convert to responsive
#################################################

$output .= "
@media handheld, only screen and (max-width: {$mk_options['content_responsive']}px){

			.theme-page-wrapper .theme-content
			{
				width: 100% !important;
				float: none !important;
			}


			.theme-page-wrapper
			{
				padding-right:15px !important;
				padding-left: 15px !important;
			}


			.theme-page-wrapper .theme-content:not(.no-padding)
			{
				padding:25px 0 !important;
			}


			.theme-page-wrapper #mk-sidebar
			{
				width: 100% !important;
				float: none !important;
				padding: 0 !important;

			}


			.theme-page-wrapper #mk-sidebar .sidebar-wrapper
			{
				padding:20px 0 !important;
			}

}



@media handheld, only screen and (max-width: {$mk_options['grid_width']}px){
		.mk-go-top,
		.mk-quick-contact-wrapper
		{
			bottom:70px !important;
		}

		.mk-grid {
			width: 100%;
		}

		.mk-padding-wrapper {
			padding: 0 20px;
		}

 }


";









#################################################
# Header Toolbar Colorings
#################################################



$output .= "

#mk-toolbar-navigation ul li a,
.mk-language-nav > a,
.mk-header-login .mk-login-link,
.mk-subscribe-link,
.mk-checkout-btn,
.mk-header-tagline a,
.header-toolbar-contact a,
#mk-toolbar-navigation ul li a:hover,
.mk-language-nav > a:hover,
.mk-header-login .mk-login-link:hover,
.mk-subscribe-link:hover,
.mk-checkout-btn:hover,
.mk-header-tagline a:hover
{
	color:{$mk_options['header_toolbar_link_color']};
}



.mk-header-tagline,
.header-toolbar-contact,
.mk-header-date
{
	color:{$mk_options['header_toolbar_txt_color']};
}


.mk-header-toolbar #mk-header-social a i {
	color:{$mk_options['header_toolbar_social_network_color']};
}

";


$header_social_style = $mk_options['header_social_networks_style'];
$header_social_color = $mk_options['header_social_color'];
$header_social_hover = $mk_options['header_social_hover_color'];
$header_social_border = $mk_options['header_social_border_color'];
$header_social_bg = $mk_options['header_social_bg_color'];
$header_social_bg_main = $mk_options['header_social_bg_main_color'];


$output .= "
	.header-section#mk-header-social ul li a i {
		color: {$header_social_color};
	}
	.header-section#mk-header-social ul li a:hover i {
		color: {$header_social_hover};
}
";

if ( $header_social_style == 'square-pointed' || $header_social_style == 'square-rounded' || $header_social_style == 'simple-rounded' ) {

	$output .= "
		.header-section#mk-header-social ul li a {
			border-color: {$header_social_border};
			background-color: {$header_social_bg_main} !important;
		}
		.header-section#mk-header-social ul li a:hover {
			border-color: {$header_social_bg};
			background-color: {$header_social_bg} !important;
		}
	";
}








#################################################
# Header Section
#################################################

// Outline Styles for social buttons repositioning
$small_position = (($mk_options['header_height']-34)/2);
$medium_position = (($mk_options['header_height'])-50)/2;
$large_position = (($mk_options['header_height']-66)/2);

$sticky_position = (($mk_options['header_scroll_height']-34)/2);

$vertical_header_logo_padding = isset($mk_options['vertical_header_logo_padding']) ? $mk_options['vertical_header_logo_padding'] : 0;

$responsive_icon_text_color = (isset($mk_options['responsive_icon_text_color']) && !empty($mk_options['responsive_icon_text_color'])) ? $mk_options['responsive_icon_text_color'] : $mk_options['main_nav_top_text_color'];

$output .= "

.header-style-2 .header-logo,
.header-style-4 .header-logo
{
	height: {$mk_options['header_height']}px !important;
}

.header-style-4 .header-logo {
	margin:{$vertical_header_logo_padding}px 0;
}




.header-style-2 .mk-header-inner
{

	line-height:{$mk_options['header_height']}px;
}

.mk-header-nav-container
{
	background-color: {$mk_options['main_nav_bg_color']};
}


.mk-header-start-tour
{
	font-size: {$mk_options['start_tour_size']}px;
	color: {$mk_options['start_tour_color']};
}


.mk-header-start-tour:hover
{
	color: {$mk_options['start_tour_color']};
}


.mk-classic-nav-bg
{
	{$classic_nav_bg}
}


.mk-search-trigger,
.mk-shoping-cart-link i,
.mk-header-cart-count,
.mk-toolbar-resposnive-icon i
{
	color: {$mk_options['main_nav_top_text_color']};
}

.mk-css-icon-close div,
.mk-css-icon-menu div {
	background-color: {$responsive_icon_text_color};
}


#mk-header-searchform .text-input
{
	background-color:{$mk_options['header_toolbar_search_input_bg']} !important;
	color: {$mk_options['header_toolbar_search_input_txt']};
}


#mk-header-searchform span i
{
	color: {$mk_options['header_toolbar_search_input_txt']};
}


#mk-header-searchform .text-input::-webkit-input-placeholder
{
	color: {$mk_options['header_toolbar_search_input_txt']};
}


#mk-header-searchform .text-input:-ms-input-placeholder
{
	color: {$mk_options['header_toolbar_search_input_txt']};
}


#mk-header-searchform .text-input:-moz-placeholder
{
	color: {$mk_options['header_toolbar_search_input_txt']};
}



.header-style-1.header-sticky-ready .menu-hover-style-1 .main-navigation-ul > li > a,
.header-style-3.header-sticky-ready .menu-hover-style-1 .main-navigation-ul > li > a,
.header-style-1.header-sticky-ready .menu-hover-style-5 .main-navigation-ul > li,
.header-style-1.header-sticky-ready .menu-hover-style-2 .main-navigation-ul > li > a,
.header-style-3.header-sticky-ready .menu-hover-style-2 .main-navigation-ul > li > a,

.header-style-1.header-style-1.header-sticky-ready .menu-hover-style-4 .main-navigation-ul > li > a,
.header-style-3.header-sticky-ready .menu-hover-style-4 .main-navigation-ul > li > a,

.header-style-1.header-sticky-ready .menu-hover-style-3 .main-navigation-ul > li,
.header-style-1.header-sticky-ready .mk-header-inner #mk-header-search,

.header-style-3.header-sticky-ready .mk-header-holder #mk-header-search,
.header-sticky-ready.header-style-3 .mk-header-start-tour,
.header-sticky-ready.header-style-1 .mk-header-start-tour,
.header-sticky-ready.header-style-1 .mk-header-inner,
.header-sticky-ready.header-style-3 .mk-header-inner,
.header-sticky-ready.header-style-3 .header-logo,
.header-sticky-ready.header-style-1 .header-logo,
.header-sticky-ready.header-style-1 .mk-search-trigger,
.header-sticky-ready.header-style-1 .mk-search-trigger i,
.header-sticky-ready.header-style-1 .shopping-cart-header,
.header-sticky-ready.header-style-1 .shopping-cart-header i,
.header-sticky-ready.header-style-3 .shopping-cart-header,
.header-sticky-ready.header-style-1 #mk-header-social.header-section a,
.header-sticky-ready.header-style-3 #mk-header-social.header-section a{
	height:{$mk_options['header_scroll_height']}px !important;
	line-height:{$mk_options['header_scroll_height']}px !important;

}

#mk-header-social.header-section a.small {
	margin-top: {$small_position}px;
}
#mk-header-social.header-section a.medium {
	margin-top: {$medium_position}px;
}
#mk-header-social.header-section a.large {
	margin-top: {$large_position}px;
}

.header-sticky-ready #mk-header-social.header-section a.small,
.header-sticky-ready #mk-header-social.header-section a.medium,
.header-sticky-ready #mk-header-social.header-section a.large {
	margin-top: {$sticky_position}px;
	line-height: 16px !important;
	height: 16px !important;
	font-size: 16px !important;
	width: 16px !important;
	padding: 8px !important;
}
.header-sticky-ready #mk-header-social.header-section a.small i:before,
.header-sticky-ready #mk-header-social.header-section a.medium i:before,
.header-sticky-ready #mk-header-social.header-section a.large i:before {
	line-height: 16px !important;
	font-size: 16px !important;
}

";










#################################################
# Main Nvigation
#################################################

$main_nav_sub_width = isset($mk_options['main_nav_sub_width']) ? $mk_options['main_nav_sub_width'] : 210;

$output .= "

.main-navigation-ul > li.menu-item > a.menu-item-link
{
	color: {$mk_options['main_nav_top_text_color']};
	font-size: {$mk_options['main_nav_top_size']}px;
	font-weight: {$mk_options['main_nav_top_weight']};
	padding-right:{$mk_options['main_nav_item_space']}px;
	padding-left:{$mk_options['main_nav_item_space']}px;
	text-transform:{$mk_options['main_menu_transform']};
	letter-spacing:{$mk_options['main_nav_top_letter_spacing']}px;
}

.mk-vm-menuwrapper ul li a {
	color: {$mk_options['main_nav_top_text_color']};
	font-size: {$mk_options['main_nav_top_size']}px;
	font-weight: {$mk_options['main_nav_top_weight']};
	text-transform:{$mk_options['main_menu_transform']};
}
.mk-vm-menuwrapper li > a:after,
.mk-vm-menuwrapper li.mk-vm-back:after {
	color: {$mk_options['main_nav_top_text_color']};
}

.main-navigation-ul > li.no-mega-menu ul.sub-menu li.menu-item a.menu-item-link 
{
	width:{$main_nav_sub_width}px;
}


.mk-header-3-menu-trigger {
	color: {$mk_options['main_nav_top_text_color']};
}



.menu-hover-style-1 .main-navigation-ul li.menu-item > a.menu-item-link:hover,
.menu-hover-style-1 .main-navigation-ul li.menu-item:hover > a.menu-item-link,
.menu-hover-style-1 .main-navigation-ul li.current-menu-item > a.menu-item-link,
.menu-hover-style-1 .main-navigation-ul li.current-menu-ancestor > a.menu-item-link,
.menu-hover-style-2 .main-navigation-ul li.menu-item > a.menu-item-link:hover,
.menu-hover-style-2 .main-navigation-ul li.menu-item:hover > a.menu-item-link,
.menu-hover-style-2 .main-navigation-ul li.current-menu-item > a.menu-item-link,
.menu-hover-style-2 .main-navigation-ul li.current-menu-ancestor > a.menu-item-link,
.menu-hover-style-1.mk-vm-menuwrapper li.menu-item > a:hover,
.menu-hover-style-1.mk-vm-menuwrapper li.menu-item:hover > a,
.menu-hover-style-1.mk-vm-menuwrapper li.current-menu-item > a,
.menu-hover-style-1.mk-vm-menuwrapper li.current-menu-ancestor > a,
.menu-hover-style-2.mk-vm-menuwrapper li.menu-item > a:hover,
.menu-hover-style-2.mk-vm-menuwrapper li.menu-item:hover > a,
.menu-hover-style-2.mk-vm-menuwrapper li.current-menu-item > a,
.menu-hover-style-2.mk-vm-menuwrapper li.current-menu-ancestor > a
{

	color: {$mk_options['main_nav_top_hover_skin']} !important;
}


.menu-hover-style-3 .main-navigation-ul > li.menu-item > a.menu-item-link:hover,
.menu-hover-style-3 .main-navigation-ul > li.menu-item:hover > a.menu-item-link,
.menu-hover-style-3.mk-vm-menuwrapper li > a:hover,
.menu-hover-style-3.mk-vm-menuwrapper li:hover > a
{
	border:2px solid {$mk_options['main_nav_top_hover_skin']};
}
.menu-hover-style-3 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
.menu-hover-style-3 .main-navigation-ul > li.current-menu-ancestor > a.menu-item-link,
.menu-hover-style-3.mk-vm-menuwrapper li.current-menu-item > a,
.menu-hover-style-3.mk-vm-menuwrapper li.current-menu-ancestor > a{

	border:2px solid {$mk_options['main_nav_top_hover_skin']};
	background-color:{$mk_options['main_nav_top_hover_skin']};
	color:{$mk_options['main_nav_top_hover_txt_color']};

}
.menu-hover-style-3.mk-vm-menuwrapper li.current-menu-ancestor > a:after {
	color:{$mk_options['main_nav_top_hover_txt_color']};
}

.menu-hover-style-4 .main-navigation-ul li.menu-item > a.menu-item-link:hover,
.menu-hover-style-4 .main-navigation-ul li.menu-item:hover > a.menu-item-link,
.menu-hover-style-4 .main-navigation-ul li.current-menu-item > a.menu-item-link,
.menu-hover-style-4 .main-navigation-ul li.current-menu-ancestor > a.menu-item-link,

.menu-hover-style-4.mk-vm-menuwrapper li a:hover,
.menu-hover-style-4.mk-vm-menuwrapper li:hover > a,
.menu-hover-style-4.mk-vm-menuwrapper li.current-menu-item > a,
.menu-hover-style-4.mk-vm-menuwrapper li.current-menu-ancestor > a,
.menu-hover-style-5 .main-navigation-ul > li.menu-item > a.menu-item-link:after
{

	background-color: {$mk_options['main_nav_top_hover_skin']};
	color:{$mk_options['main_nav_top_hover_txt_color']};
}



.menu-hover-style-4.mk-vm-menuwrapper li.current-menu-ancestor > a:after,
.menu-hover-style-4.mk-vm-menuwrapper li.current-menu-item > a:after,
.menu-hover-style-4.mk-vm-menuwrapper li:hover > a:after,
.menu-hover-style-4.mk-vm-menuwrapper li a:hover::after {
	color:{$mk_options['main_nav_top_hover_txt_color']};
}


.menu-hover-style-1 .main-navigation-ul > li.dropdownOpen > a.menu-item-link,
.menu-hover-style-1 .main-navigation-ul > li.active > a.menu-item-link,
.menu-hover-style-1 .main-navigation-ul > li.open > a.menu-item-link,
.menu-hover-style-1 .main-navigation-ul > li.menu-item > a:hover,
.menu-hover-style-1 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
.menu-hover-style-1 .main-navigation-ul > li.current-menu-ancestor > a.menu-item-link {
	border-top-color:{$mk_options['main_nav_top_hover_skin']};
}

.menu-hover-style-1.mk-vm-menuwrapper li > a:hover,
.menu-hover-style-1.mk-vm-menuwrapper li.current-menu-item > a,
.menu-hover-style-1.mk-vm-menuwrapper li.current-menu-ancestor > a
{
	border-left-color:{$mk_options['main_nav_top_hover_skin']};
}


.header-style-1 .menu-hover-style-1 .main-navigation-ul > li > a,
.header-style-1 .menu-hover-style-2 .main-navigation-ul > li > a,
.header-style-1 .menu-hover-style-4 .main-navigation-ul > li > a,
.header-style-1 .menu-hover-style-5 .main-navigation-ul > li
 {
	height: {$mk_options['header_height']}px;
	line-height:{$mk_options['header_height']}px;
}

.header-style-1 .menu-hover-style-3 .main-navigation-ul > li,
.header-style-1 .menu-hover-style-5 .main-navigation-ul > li
{
	height: {$mk_options['header_height']}px;
	line-height:{$mk_options['header_height']}px;
}";


$hover_3_height = $mk_options['header_height'] / 2;
$hover_3_height_sticky = $mk_options['header_scroll_height'] / 1.5;

$output .= "
.header-style-1 .menu-hover-style-3 .main-navigation-ul > li > a {
	line-height:{$hover_3_height}px;
}
.header-style-1.header-sticky-ready .menu-hover-style-3 .main-navigation-ul > li > a {
	line-height:{$hover_3_height_sticky}px;
}
.header-style-1 .menu-hover-style-5 .main-navigation-ul > li > a {
	line-height:20px;
	vertical-align:middle;
}
";


if(!empty($mk_options['main_nav_sub_border_top_color'])) {
$output .= "
.main-navigation-ul > li.no-mega-menu  ul.sub-menu:after,
.main-navigation-ul > li.has-mega-menu > ul.sub-menu:after
{
  background-color:{$mk_options['main_nav_sub_border_top_color']};
}
.mk-shopping-cart-box {
	border-top:2px solid {$mk_options['main_nav_sub_border_top_color']};
}
";
}


$output .= "
#mk-main-navigation li.no-mega-menu ul.sub-menu,
#mk-main-navigation li.has-mega-menu > ul.sub-menu,
.mk-shopping-cart-box
{
	background-color: {$mk_options['main_nav_sub_bg_color']};
}


#mk-main-navigation ul.sub-menu a.menu-item-link,
#mk-main-navigation ul .megamenu-title,
.megamenu-widgets-container a,
.mk-shopping-cart-box .product_list_widget li a,
.mk-shopping-cart-box .product_list_widget li.empty,
.mk-shopping-cart-box .product_list_widget li span,
.mk-shopping-cart-box .widget_shopping_cart .total
{
	color: {$mk_options['main_nav_sub_text_color']};
}

.mk-shopping-cart-box .mk-button.cart-widget-btn {
	border-color:{$mk_options['main_nav_sub_text_color']};
	color:{$mk_options['main_nav_sub_text_color']};
}
.mk-shopping-cart-box .mk-button.cart-widget-btn:hover {
	background-color:{$mk_options['main_nav_sub_text_color']};
	color:{$mk_options['main_nav_sub_bg_color']};
}

#mk-main-navigation ul .megamenu-title
{
	color: {$mk_options['main_nav_mega_title_color']};
}
#mk-main-navigation ul .megamenu-title:after
{
	background-color: {$mk_options['main_nav_mega_title_color']};
}

.megamenu-widgets-container {
	color: {$mk_options['main_nav_sub_text_color']};
}

.megamenu-widgets-container .widgettitle
{
		text-transform: {$mk_options['sidebar_title_transform']};
		font-size: {$mk_options['sidebar_title_size']}px;
		font-weight: {$mk_options['sidebar_title_weight']};
}

#mk-main-navigation ul.sub-menu li.menu-item ul.sub-menu li.menu-item a.menu-item-link i
{
	color: {$mk_options['main_nav_sub_icon_color']};
}




#mk-main-navigation ul.sub-menu a.menu-item-link:hover
{
	color: {$mk_options['main_nav_sub_text_color_hover']} !important;
}
.megamenu-widgets-container a:hover {
	color: {$mk_options['main_nav_sub_text_color_hover']};	
}


.main-navigation-ul li.menu-item ul.sub-menu li.menu-item a.menu-item-link:hover,
.main-navigation-ul li.menu-item ul.sub-menu li.menu-item:hover > a.menu-item-link,
.main-navigation-ul ul.sub-menu li.menu-item a.menu-item-link:hover,
.main-navigation-ul ul.sub-menu li.menu-item:hover > a.menu-item-link,
.main-navigation-ul ul.sub-menu li.current-menu-item > a.menu-item-link
{
	background-color:{$mk_options['main_nav_sub_hover_bg_color']} !important;
}


.mk-search-trigger:hover,
.mk-header-start-tour:hover
{
	color: {$mk_options['main_nav_top_hover_skin']};
}



.main-navigation-ul li.menu-item ul.sub-menu li.menu-item a.menu-item-link
{
	font-size: {$mk_options['main_nav_sub_size']}px;
	font-weight: {$mk_options['main_nav_sub_weight']};
	text-transform:{$mk_options['main_nav_sub_transform']};
	letter-spacing: {$mk_options['main_nav_sub_letter_spacing']}px;
}
.has-mega-menu .megamenu-title {
	letter-spacing: {$mk_options['main_nav_sub_letter_spacing']}px;
}

.header-style-4 {
	text-align : {$mk_options['vertical_header_align']}
	}
";

if($mk_options['vertical_header_align'] != 'center') {
	$output .="
	.mk-vm-menuwrapper li > a {
		padding-right: 45px;
	}
	";
}




if(!empty($mk_options['mega_menu_divider_color'])) {

$output .= ".has-mega-menu > ul.sub-menu > li.menu-item {
	  border-left: 1px solid {$mk_options['mega_menu_divider_color']};
}
";
}


$sub_level_box_border_color = isset($mk_options['sub_level_box_border_color']) ? $mk_options['sub_level_box_border_color'] : '#d3d3d3';
$nav_sub_shadow = isset($mk_options['nav_sub_shadow']) ? $mk_options['nav_sub_shadow'] : 'true';

if(!empty($sub_level_box_border_color)) {

$output .= "
.main-navigation-ul > li.no-mega-menu  ul,
.main-navigation-ul > li.has-mega-menu > ul,
.mk-shopping-cart-box {
	border:1px solid {$sub_level_box_border_color};
}
";
}

if($nav_sub_shadow != 'false') {
	$output .= "
.main-navigation-ul > li.no-mega-menu  ul,
.main-navigation-ul > li.has-mega-menu > ul,
.mk-shopping-cart-box {
  -webkit-box-shadow: 0 20px 50px 10px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 20px 50px 10px rgba(0, 0, 0, 0.15);
  box-shadow: 0 20px 50px 10px rgba(0, 0, 0, 0.15);
}
";
}






#################################################
# Header Resposnive State
#################################################

$output .= "

@media handheld, only screen and (max-width: {$mk_options['responsive_nav_width']}px){

			.header-style-1 .mk-header-inner,
			.header-style-3 .mk-header-inner,
			.header-style-3 .header-logo,
			.header-style-1 .header-logo,
			.header-style-1 .shopping-cart-header,
			.header-style-3 .shopping-cart-header{
				height:90px;
				line-height:90px;
			}


			#mk-header:not(.header-style-4) .mk-header-holder {
				position:relative !important;
				top:0 !important;
			}

			.mk-header-padding-wrapper {
				display:none !important;
			}

			.mk-header-nav-container
			{
				width: auto !important;
				display:none;
			}


			.header-style-1 .mk-header-right,
			.header-style-2 .mk-header-right,
			.header-style-3 .mk-header-right {
				right:55px !important;
			}


			.header-style-1 .mk-header-inner #mk-header-search,
			.header-style-2 .mk-header-inner #mk-header-search,
			.header-style-3 .mk-header-inner #mk-header-search
			{
				display:none !important;
			}


			.mk-fullscreen-search-overlay {
				display:none;
			}

			#mk-header-search
			{
				padding-bottom: 10px !important;
			}


			#mk-header-searchform span .text-input
			{
				width: 100% !important;
			}


			.header-style-2 .header-logo .center-logo
			{
			    text-align: right !important;
			}


			.header-style-2 .header-logo .center-logo a
			{
			    margin: 0 !important;
			}


			.header-logo,
			.header-style-4 .header-logo
			{
			    height: 90px !important;
			}

			.mk-header-inner
			{
				padding-top:0 !important;
			}


			.header-logo
			{
				position:relative !important;
				right:auto !important;
				left:auto !important;
				float:left !important;
				text-align:left;
			}


			.shopping-cart-header
			{
				margin:0 20px 0 0 !important;
			}


			#mk-responsive-nav
			{
				background-color:{$mk_options['responsive_nav_color']} !important;
			}


			.mk-header-nav-container #mk-responsive-nav
			{
				visibility: hidden;
			}




			#mk-responsive-nav li ul li .megamenu-title:hover,
			#mk-responsive-nav li ul li .megamenu-title,
			#mk-responsive-nav li a, #mk-responsive-nav li ul li a:hover,
			#mk-responsive-nav .mk-nav-arrow
			{
		  			color:{$mk_options['responsive_nav_txt_color']} !important;
			}


			.mk-mega-icon
			{
				display:none !important;
			}


			.mk-header-bg
			{
				zoom:1 !important;
				filter:alpha(opacity=100) !important;
				opacity:1 !important;
			}




			.header-style-1 .mk-nav-responsive-link,
			.header-style-2 .mk-nav-responsive-link
			{
				display:block !important;
			}

			.mk-header-nav-container
			{
				height:100%;
				z-index:200;
			}


			#mk-main-navigation
			{
			position:relative;
			z-index:2;
			}


			.mk_megamenu_columns_2,
			.mk_megamenu_columns_3,
			.mk_megamenu_columns_4,
			.mk_megamenu_columns_5,
			.mk_megamenu_columns_6
			{
				width:100% !important;
			}

			.header-style-1.header-align-right .header-logo img,
			.header-style-3.header-align-right .header-logo img,
			.header-style-3.header-align-center .header-logo img {
				float: left !important;
				right:auto !important;
			}


			.header-style-4 .mk-header-inner {
				width: auto !important;
				position: relative !important;
				overflow: visible;
				padding-bottom: 0;
			}
			.admin-bar .header-style-4 .mk-header-inner {
				top:0 !important;
			}
			.header-style-4 .mk-header-right {
				display: none;
			}
			.header-style-4 .mk-nav-responsive-link {
				display: block !important;
			}
			.header-style-4 .mk-vm-menuwrapper,
			.header-style-4 #mk-header-search {
				display: none;
			}
			.header-style-4 .header-logo {
				width:auto !important;
				display: inline-block !important;
				text-align:left !important;
				margin:0 !important;
			}
			.vertical-header-enabled .header-style-4 .header-logo img {
					max-width: 100% !important;
					left: 20px!important;
					top:50%!important;
					-webkit-transform: translate(0, -50%)!important;
					-moz-transform: translate(0, -50%)!important;
					-ms-transform: translate(0, -50%)!important;
					-o-transform: translate(0, -50%)!important;
					transform: translate(0, -50%)!important;
					position:relative !important;
			}
			.vertical-header-enabled.vertical-header-left #theme-page > .mk-main-wrapper-holder,
			.vertical-header-enabled.vertical-header-center #theme-page > .mk-main-wrapper-holder,
			.vertical-header-enabled.vertical-header-left #theme-page > .mk-page-section,
			.vertical-header-enabled.vertical-header-center #theme-page > .mk-page-section,
			.vertical-header-enabled.vertical-header-left #theme-page > .wpb_row,
			.vertical-header-enabled.vertical-header-center #theme-page > .wpb_row,
			.vertical-header-enabled.vertical-header-left #mk-theme-container:not(.mk-transparent-header), 
			.vertical-header-enabled.vertical-header-center #mk-footer,
			.vertical-header-enabled.vertical-header-left #mk-footer,
			.vertical-header-enabled.vertical-header-center #mk-theme-container:not(.mk-transparent-header) {
			  padding-left: 0 !important;
			}
			.vertical-header-enabled.vertical-header-right #theme-page > .mk-main-wrapper-holder,
			.vertical-header-enabled.vertical-header-right #theme-page > .mk-page-section,
			.vertical-header-enabled.vertical-header-right #theme-page > .wpb_row,
			.vertical-header-enabled.vertical-header-right #mk-footer,
			.vertical-header-enabled.vertical-header-right #mk-theme-container:not(.mk-transparent-header) {
			  padding-right: 0 !important;
			}

}




@media handheld, only screen and (min-width: {$mk_options['responsive_nav_width']}px) {
		  .mk-transparent-header .sticky-style-slide .mk-header-holder {
		    position: absolute;
		  }
		  .mk-transparent-header .remove-header-bg-true:not(.header-sticky-ready) .mk-header-bg {
		    opacity: 0;
		  }
		  .mk-transparent-header .remove-header-bg-true#mk-header:not(.header-sticky-ready) .mk-header-inner {
		    border: 0;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-desktop-logo.light-logo {
		    display: block !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-desktop-logo.dark-logo {
		    display: none !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .main-navigation-ul > li.menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-search-trigger,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-shoping-cart-link i,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-header-cart-count,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-header-start-tour,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) #mk-header-social a i,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.current-menu-ancestor > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-2 .main-navigation-ul > li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-2 .main-navigation-ul > li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-2 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-vm-menuwrapper li a,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-vm-menuwrapper li > a:after, 
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-vm-menuwrapper li.mk-vm-back:after {
		    color: #fff !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .mk-css-icon-menu div {
		    background-color: #fff !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.dropdownOpen > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.active > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.open > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.menu-item > a:hover,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.current-menu-ancestor > a.menu-item-link {
		    border-top-color: #fff;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.current-menu-ancestor > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li.current-menu-item > a,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li.current-menu-ancestor > a {
		    border: 2px solid #fff;
		    background-color: #fff;
		    color: #222 !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li > a:hover,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li:hover > a {
		    border: 2px solid #fff;
		  }
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-4 .main-navigation-ul li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-4 .main-navigation-ul li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-4 .main-navigation-ul li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.light-header-skin:not(.header-sticky-ready) .menu-hover-style-5 .main-navigation-ul > li.menu-item > a.menu-item-link:after {
		    background-color: #fff;
		    color: #222 !important;
		  }


		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-desktop-logo.dark-logo {
		    display: block !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-desktop-logo.light-logo {
		    display: none !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .main-navigation-ul > li.menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-search-trigger,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-shoping-cart-link i,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-header-cart-count,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-header-start-tour,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) #mk-header-social a i,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul li.current-menu-ancestor > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-2 .main-navigation-ul li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-2 .main-navigation-ul li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-2 .main-navigation-ul li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-2 .main-navigation-ul li.current-menu-ancestor > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-vm-menuwrapper li a,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-vm-menuwrapper li > a:after, 
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-vm-menuwrapper li.mk-vm-back:after {
		    color: #222 !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.dropdownOpen > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.active > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.open > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.menu-item > a:hover,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-1 .main-navigation-ul > li.current-menu-ancestor > a.menu-item-link {
		    border-top-color: #222;
		  }
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .mk-css-icon-menu div {
		    background-color: #222 !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.current-menu-ancestor > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li.current-menu-item > a,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li.current-menu-ancestor > a {
		    border: 2px solid #222;
		    background-color: #222;
		    color: #fff !important;
		  }
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3 .main-navigation-ul > li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li > a:hover,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-3.mk-vm-menuwrapper li:hover > a {
		    border: 2px solid #222;
		  }
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-4 .main-navigation-ul li.menu-item > a.menu-item-link:hover,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-4 .main-navigation-ul li.menu-item:hover > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-4 .main-navigation-ul li.current-menu-item > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-4 .main-navigation-ul li.current-menu-ancestor > a.menu-item-link,
		  .mk-transparent-header .remove-header-bg-true.dark-header-skin:not(.header-sticky-ready) .menu-hover-style-5 .main-navigation-ul > li.menu-item > a.menu-item-link:after {
		    background-color: #222;
		    color: #fff !important;
		  }
}


";






#################################################
# Theme Skin colors
#################################################

$output .= "
.comment-reply a,
.mk-toggle .mk-toggle-title.active-toggle:before,
.mk-testimonial-author,
.modern-style .mk-testimonial-company,
#wp-calendar td#today,
.news-full-without-image .news-categories span,
.news-half-without-image .news-categories span,
.news-fourth-without-image .news-categories span,
.mk-read-more,
.news-single-social li a,
.portfolio-widget-cats,
.portfolio-carousel-cats,
.blog-showcase-more,
.simple-style .mk-employee-item:hover .team-member-position,
.mk-readmore,
.about-author-name,
.mk-portfolio-classic-item .portfolio-categories a,
.register-login-links a:hover,
.not-found-subtitle,
.mk-mini-callout a,
.search-loop-meta a,
.new-tab-readmore,
.mk-news-tab .mk-tabs-tabs li.ui-tabs-active a,
.mk-tooltip a,
.mk-accordion-single.current .mk-accordion-tab i,
.monocolor.pricing-table .pricing-price span,
.quantity .plus:hover,	
.quantity .minus:hover,
.mk-woo-tabs .mk-tabs-tabs li.ui-state-active a,
.product .add_to_cart_button i,
.blog-modern-comment:hover,
.blog-modern-share:hover,
{
	color: {$skin_color};
}

.mk-tabs .mk-tabs-tabs li.ui-tabs-active a > i,
.mk-accordion .mk-accordion-single.current .mk-accordion-tab:before,
.mk-tweet-list a,
.widget_testimonials .testimonial-slider .testimonial-author,
#mk-filter-portfolio li a:hover,
#mk-language-navigation ul li a:hover,
#mk-language-navigation ul li.current-menu-item > a,
.mk-quick-contact-wrapper h4,
.divider-go-top:hover i,
.widget-sub-navigation ul li a:hover,
#mk-footer .widget_posts_lists ul li .post-list-meta time,
.mk-footer-tweets .tweet-username,
.product-category .item-holder:hover h4,
{
	color: {$skin_color} !important;
}
";



#################################################
# Theme Skin Background color
#################################################

$output .= "
.image-hover-overlay,
.newspaper-portfolio,
.similar-posts-wrapper .post-thumbnail:hover > .overlay-pattern,
.portfolio-logo-section,
.post-list-document .post-type-thumb:hover,
#cboxTitle,
#cboxPrevious,
#cboxNext,
#cboxClose,
.comment-form-button,
.mk-dropcaps.fancy-style,
.mk-image-overlay,
.pinterest-item-overlay,
.news-full-with-image .news-categories span,
.news-half-with-image .news-categories span,
.news-fourth-with-image .news-categories span,
.widget-portfolio-overlay,
.portfolio-carousel-overlay,
.blog-carousel-overlay,
.mk-classic-comments span,
.mk-similiar-overlay,
.mk-skin-button,
.mk-flex-caption .flex-desc span,
.mk-icon-box .mk-icon-wrapper i:hover,
.mk-quick-contact-link:hover,
.quick-contact-active.mk-quick-contact-link,
.mk-fancy-table th,
.ui-slider-handle,
.widget_price_filter .ui-slider-range,
.shop-skin-btn,
#review_form_wrapper input[type=submit],
#mk-nav-search-wrapper form .nav-side-search-icon:hover,
form.ajax-search-complete i,
.blog-modern-btn,
.showcase-blog-overlay,
.gform_button[type=submit],
.button.alt,
#respond #submit,
.woocommerce .price_slider_amount .button.button,
.mk-shopping-cart-box .mk-button.checkout,
.widget_shopping_cart .mk-button.checkout,
.widget_shopping_cart .mk-button.checkout
{
	background-color: {$skin_color} !important;
}

";








#################################################
# Shortcodes and other elements
#################################################


$output .= "

.mk-circle-image .item-holder
{
	-webkit-box-shadow:0 0 0 1px {$skin_color};
	-moz-box-shadow:0 0 0 1px {$skin_color};
	box-shadow:0 0 0 1px {$skin_color};
}



.mk-blockquote.line-style,
.bypostauthor .comment-content,
.bypostauthor .comment-content:after,
.mk-tabs.simple-style .mk-tabs-tabs li.ui-tabs-active a
{
	border-color: {$skin_color} !important;
}



.news-full-with-image .news-categories span,
.news-half-with-image .news-categories span,
.news-fourth-with-image .news-categories span,
.mk-flex-caption .flex-desc span
{
	box-shadow: 8px 0 0 {$skin_color}, -8px 0 0 {$skin_color};
}



.monocolor.pricing-table .pricing-cols .pricing-col.featured-plan
{
	border:1px solid {$skin_color} !important;
}




.mk-skin-button.three-dimension
{
	box-shadow: 0px 3px 0px 0px {$skin_darker};
}


.mk-skin-button.three-dimension:active
{
	box-shadow: 0px 1px 0px 0px {$skin_darker};
}



.mk-footer-copyright, #mk-footer-navigation li a
{
	color: {$mk_options['sub_footer_nav_copy_color']};
}



.mk-woocommerce-main-image img:hover, .mk-single-thumbnails img:hover
{
	border:1px solid {$skin_color} !important;

}



.product-loading-icon
{
	background-color:{$skin_color_60};
}


{$mk_options['custom_css']}

.mk-dynamic-styles {display:none}

";

$output = preg_replace('/\r|\n|\t/', '', $output);



wp_enqueue_style('theme-dynamic-styles',get_template_directory_uri() . '/custom.css');

wp_add_inline_style( 'theme-dynamic-styles', $output);


}
add_action( 'wp_enqueue_scripts', 'mk_dynamic_css' );
?>
