<?php

extract( shortcode_atts( array(
			'orderby'=> 'date',
			'slides' => '',
			'order'=> 'DESC',
			'full_height' => 'true',
			'height' => 350,
			'swiper_bg' => '#000',
			'first_el' => 'false',
			'parallax' => 'false',
    		'animation_effect' => 'slide',
			'animation_speed' => 700,
			'slideshow_speed' => 7000,
			'direction_nav' => '',
			'pagination' => '',
			'skip_arrow' => 'true',
			'el_class' => '',
		), $atts ) );

$button2_txt_color = $button1_txt_color = $outline1_hover_color = $outline2_hover_color = $button2_bg_color = $button1_bg_color = $outline2_active_color = $video_color_mask_css = $outline1_active_color = $pagination_class = $content_opacity = $overlay_opacity_ie = '';

global $post, $mk_options;

$query = array(
	'post_type' => 'edge',
	'suppress_filters' => false
);


if ( !empty($slides) ) {
	$query['post__in'] = explode( ',', $slides );
}
if ( $order ) {
	$query['order'] = $order;
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( !empty($pagination) && $pagination != 'none') {
	$pagination_class = 'true';
}

$id = uniqid();
$loop  = new WP_Query( $query );


if ($parallax == 'true') {
	$output = '<div class="mk-edge-wrapper">';
	$content_opacity = 'data-top-top="opacity: 1" data-50p="opacity: 0"';
}
$output .= '<div id="mk-edge-slider-'.$id.'" class="mk-edge-slider mk-swiper-container first-el-' . $first_el . '" data-animation="'.$animation_effect.'" data-height="'.$height.'" data-first="' . $first_el . '" data-fullHeight="'.$full_height.'" data-pause="'.$slideshow_speed.'" data-speed="'.$animation_speed.'" data-pagination="'.$pagination_class.'">';
$output .= '<div style="height:'.$height.'px" class="edge-slider-holder mk-swiper-wrapper">';
while ( $loop->have_posts() ):
	$loop->the_post();


$type =  get_post_meta( $post->ID, '_edge_type', true ) ? get_post_meta( $post->ID, '_edge_type', true ) : 'image';
$animation =  get_post_meta( $post->ID, '_animation', true ) ? get_post_meta( $post->ID, '_animation', true ) : 'default_anim';
$mp4 =  get_post_meta( $post->ID, '_video_mp4', true );
$webm =  get_post_meta( $post->ID, '_video_webm', true );
$ogv =  get_post_meta( $post->ID, '_video_ogv', true );
$video_preview =  get_post_meta( $post->ID, '_video_preview', true );
$video_pattern =  get_post_meta( $post->ID, '_video_pattern', true );
$video_overlay =  get_post_meta( $post->ID, '_video_color_overlay', true );
$overlay_opacity =  get_post_meta( $post->ID, '_overlay_opacity', true ) ? get_post_meta( $post->ID, '_overlay_opacity', true ) : 0.3;
$overlay_opacity_ie = '-ms-filter:\'progid:DXImageTransform.Microsoft.Alpha(Opacity='. ($overlay_opacity * 100) .')\'';

$slide_image =  get_post_meta( $post->ID, '_slide_image', true );
$slide_bg_color =  get_post_meta( $post->ID, '_bg_color', true );
$cover_bg =  get_post_meta( $post->ID, '_cover', true );

$content_width =  get_post_meta( $post->ID, '_content_width', true ) ? get_post_meta( $post->ID, '_content_width', true ) : 70;
$title =  get_post_meta( $post->ID, '_title', true );
$description =  get_post_meta( $post->ID, '_description', true );

$title_size           = get_post_meta($post->ID, '_title_size', true) ? ('font-size : '.(get_post_meta($post->ID, '_title_size', true)/16).'em;') : '';
$title_letter_spacing         = get_post_meta($post->ID, '_title_letter_spacing', true) ? ('letter-spacing:'.get_post_meta($post->ID, '_title_letter_spacing', true).'px;') : '';

$title_weight         = get_post_meta($post->ID, '_caption_title_weight', true) ? ('font-weight:'.get_post_meta($post->ID, '_caption_title_weight', true).';') : '';
$caption_custom_color = get_post_meta($post->ID, '_custom_caption_color', true) ? ('color:'.get_post_meta($post->ID, '_custom_caption_color', true).';') : '';

$btn_1_txt =  get_post_meta( $post->ID, '_btn_1_txt', true );
$btn_1_url =  get_post_meta( $post->ID, '_btn_1_url', true );
$btn_2_txt =  get_post_meta( $post->ID, '_btn_2_txt', true );
$btn_2_url =  get_post_meta( $post->ID, '_btn_2_url', true );

$caption_skin =  get_post_meta( $post->ID, '_caption_skin', true );

$btn_1_style =  get_post_meta( $post->ID, '_btn_1_style', true );
$btn_2_style =  get_post_meta( $post->ID, '_btn_2_style', true );

$btn_1_corner_style =  get_post_meta( $post->ID, '_btn_1_corner_style', true ) ? get_post_meta( $post->ID, '_btn_1_corner_style', true ) : 'pointed';
$btn_2_corner_style =  get_post_meta( $post->ID, '_btn_2_corner_style', true ) ? get_post_meta( $post->ID, '_btn_2_corner_style', true ) : 'pointed';

$btn_1_skin =  get_post_meta( $post->ID, '_btn_1_skin', true );
$btn_2_skin =  get_post_meta( $post->ID, '_btn_2_skin', true );
$caption_align =  get_post_meta( $post->ID, '_caption_align', true );
$header_skin_meta = get_post_meta($post->ID, '_edge_header_skin', true);
$header_skin = $header_skin_meta ? $header_skin_meta : 'dark';


if ( $btn_1_style == 'flat' ) {
	if ( $btn_1_skin == 'light' ) {
		$button1_bg_color = '#ffffff';
		$button1_txt_color = 'dark';

	} else if ( $btn_1_skin == 'dark' ) {
			$button1_bg_color = '#252525';
			$button1_txt_color = 'light';

		} else if ( $btn_1_skin == 'skin' ) {
			$button1_bg_color = $mk_options['skin_color'];
			$button1_txt_color = 'light';
		}
}

if ( $btn_2_style == 'flat' ) {
	if ( $btn_2_skin == 'light' ) {
		$button2_bg_color = '#ffffff';
		$button2_txt_color = 'dark';

	} else if ( $btn_2_skin == 'dark' ) {
			$button2_bg_color = '#252525';
			$button2_txt_color = 'light';

		} else if ( $btn_2_skin == 'skin' ) {
			$button2_bg_color = $mk_options['skin_color'];
			$button2_txt_color = 'light';
		}
}


if ( $btn_1_style == 'outline' ) {
	if ( $btn_1_skin == 'light' ) {
		$outline1_active_color = '#ffffff';
		$outline1_hover_color = '#252525';

	} else if ( $btn_1_skin == 'dark' ) {
			$outline1_active_color = '#252525';
			$outline1_hover_color = '#ffffff';

		} else if ( $btn_1_skin == 'skin' ) {
			$outline1_active_color = $mk_options['skin_color'];
			$outline1_hover_color = '#ffffff';
		}
}

if ( $btn_2_style == 'outline' ) {
	if ( $btn_2_skin == 'light' ) {
		$outline2_active_color = '#ffffff';
		$outline2_hover_color = '#252525';

	} else if ( $btn_2_skin == 'dark' ) {
			$outline2_active_color = '#252525';
			$outline2_hover_color = '#ffffff';

		} else if ( $btn_2_skin == 'skin' ) {
			$outline2_active_color = $mk_options['skin_color'];
			$outline2_hover_color = '#ffffff';
		}
}




$bg_image_css = ( $type == 'image' ) ? ' style="background-image:url('.$slide_image.'); background-color:'.$slide_bg_color.'" ' : '';

$cover_bg = ($cover_bg != 'false') ? ' mk-background-stretch' : '';


$output .= '<div class="swiper-slide '.$caption_align.$cover_bg.'" data-header-skin="' . $header_skin . '">';

	if ( $video_pattern == 'true' ) {
		$output .= '<div class="mk-video-mask"></div>';
	}

	if ( !empty( $video_overlay ) ) {
		$video_color_mask_css = ' style="background-color:'.$video_overlay.';opacity:'.$overlay_opacity.'; '.$overlay_opacity_ie.';"';
		$output .= '<div'.$video_color_mask_css.' class="mk-video-color-mask"></div>';
	}



/*
* Video Section
*/
if ( $type == 'video' ) {

	if(!empty($video_preview)) {
			$output .= '<div style="background-image:url('.$video_preview.');" class="mk-video-section-touch"></div>';
	}

	$output .= '<div class="mk-section-video"><video poster="'.$video_preview.'" muted="muted" preload="auto" loop="true" autoplay="true">';

	if ( !empty( $mp4 ) ) {
		//MP4 must be first for iPad!
		$output .= '<source type="video/mp4" src="'.$mp4.'" />';
	}
	if ( !empty( $webm ) ) {
		$output .= '<source type="video/webm" src="'.$webm.'" />';
	}
	if ( !empty( $ogv ) ) {
		$output .= '<source type="video/ogg" src="'.$ogv.'" />';
	}

	$output .= '</video></div>';
}
/***********/

else {
	$output .= '<div class="mk-section-image '.$animation_effect.'"  '.$bg_image_css.'></div>';
}




$output .= '<div class="slider-content">';
$output .= '<div class="mk-grid">';

$output .= '<div class="edge-slide-content edge-'.$animation.' caption-'.$caption_skin.'" style="width:'.$content_width.'%">';

$output .= ( !empty( $title ) || !empty( $description ) ) ? '<div class="edge-title-area">' : '';
$output .= ( !empty( $title ) ) ? '<div class="edge-title" style="'.$title_size.$title_weight.$caption_custom_color.$title_letter_spacing.'">'.$title.'</div>' : '';
$output .= ( !empty( $description ) ) ? '<div class="edge-desc" style="'.$caption_custom_color.'">'.$description.'</div>' : '';
$output .= ( !empty( $title ) || !empty( $description ) ) ? '</div>' : '';

if ( !empty( $btn_1_txt ) || !empty( $btn_2_txt ) ) {

	$smooth_scroll_1 = (preg_match('/#/',$btn_1_url)) ? ' el_class="mk-smooth"' : '';
    $smooth_scroll_2 = (preg_match('/#/',$btn_2_url)) ? ' el_class="mk-smooth"' : '';

	$output .= '<div class="edge-buttons">';
	$output .= ( !empty( $btn_1_txt ) ) ? do_shortcode( '[mk_button dimension="'.$btn_1_style.'" corner_style="'.$btn_1_corner_style.'" size="large" bg_color="'.$button1_bg_color.'" text_color="'.$button1_txt_color.'" outline_active_color="'.$outline1_active_color.'" outline_hover_color="'.$outline1_hover_color.'" outline_skin="custom" url="'.$btn_1_url.'" target="_self" align="none" margin_top="0" margin_bottom="0"'.$smooth_scroll_1.']'.$btn_1_txt.'[/mk_button]' ) : '';
	$output .= ( !empty( $btn_2_txt ) ) ? do_shortcode( '[mk_button dimension="'.$btn_2_style.'" corner_style="'.$btn_2_corner_style.'" size="large" bg_color="'.$button2_bg_color.'" text_color="'.$button2_txt_color.'" outline_skin="custom" outline_active_color="'.$outline2_active_color.'" outline_hover_color="'.$outline2_hover_color.'"  url="'.$btn_2_url.'" target="_self" align="none" margin_top="0" margin_bottom="0"'.$smooth_scroll_2.']'.$btn_2_txt.'[/mk_button]' ) : '';
	$output .= '</div>';
}

if(preg_match('/vc_row fullwidth="true"/', get_the_content()) || preg_match('/mk_page_section/', get_the_content())) {
    $content = do_shortcode('[mk_message_box type="warning-message"]Page Section or Fullwidth Rows are not allowed in Edge Slide. Remove Page Sections and disable fullwidth option of rows.[/mk_message_box]');
} else {
    $content = str_replace(']]>', ']]&gt;', apply_filters('the_content', get_the_content()));
}

if ( !empty( $content ) ) {
	$output .= '<div class="mk-edge-custom-content">'.$content.'</div>';
}

$output .= '</div><!--/edge-slide-content-->';
$output .= '</div><!--/mk-grid-->';
$output .= '</div><!--/slider-content-->';
$output .= '</div><!--/edge-slide-->';


endwhile;
wp_reset_query();
$output .= '</div>';

if ( $full_height == 'true' && $skip_arrow != 'false') {
	$output .= '<div class="edge-skip-slider" data-skin="' . $header_skin . '"><i class="mk-jupiter-icon-arrow-bottom"></i></div>';
}

$direction_nav = ($direction_nav == 'true') ? 'roundslide' : $direction_nav;

if ( !empty($direction_nav) && $direction_nav != 'none') {

	$output .= '<span class="mk-edge-nav nav-'.$direction_nav.'">';
	$output .= '	<a class="mk-edge-prev" data-skin="">';
	$output .= '		<span class="mk-edge-icon-wrap"><i class="mk-jupiter-icon-arrow-left"></i></span>';
	$output .= '		<div class="mk-edge-nav">';
    $output .= '			<span class="edge-nav-bg"></span>';
    $output .= '			<span class="prev-item-caption nav-item-caption"></span>';
    $output .= '		</div>';
	$output .= '	</a>';
	$output .= '</span>';

	$output .= '<span class="mk-edge-nav nav-'.$direction_nav.'">';
	$output .= '	<a class="mk-edge-next" data-skin="">';
	$output .= '		<span class="mk-edge-icon-wrap"><i class="mk-jupiter-icon-arrow-right"></i></span>';
	$output .= '		<div class="mk-edge-nav">';
    $output .= '			<span class="edge-nav-bg"></span>';
    $output .= '			<span class="next-item-caption nav-item-caption"></span>';
    $output .= '		</div>';
	$output .= '	</a>';
	$output .= '</span>';
}

if (!empty($pagination) && $pagination != 'none') {
    $output .= '<div class="swiper-pagination pagination-'.$pagination.'" data-skin="' . $header_skin . '"></div>';
}

$output .= '<div class="edge-slider-loading"><div class="mk-preloader"></div></div>';
$output .= '</div>';
if ($parallax == 'true') { $output .= '</div>'; }

// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= '
#mk-edge-slider-'.$id.' {
	background-color: '.$swiper_bg.';
}';

echo $output;


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);
// global $app_modules;

// $app_modules[] = array(
//   'name' => 'edge-slider',
//   'params' => array(
//       'id' => 'mk-edge-slider-'.$id
//     )
// );
