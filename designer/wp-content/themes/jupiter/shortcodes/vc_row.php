<?php
$output = $el_class = '';
extract(shortcode_atts(array(
	'fullwidth' => 'false',
	'id' => '',
	'padding' =>0,
	'attached' => 'false',
	'visibility' => '',
	'css' => '',
	'animation' => '',
    'el_class' => '',
), $atts));

wp_enqueue_script( 'wpb_composer_front_js' );

$fullwidth_start = $output = $fullwidth_end = '';

$id = !empty($id) ? (' id="'.$id.'"') : '';

$padding_css = ($attached == 'true') ? 'add-padding-'.$padding : '';

$animation_css = ( $animation != '' ) ? ' mk-animate-element ' . $animation . ' ' : '';

if($fullwidth == 'true') {
	global $post;
	$page_layout = get_post_meta( $post->ID, '_layout', true );
	$fullwidth_start = '</div></div></div>';

	/* Fixes page section for blog single page */
	if(is_singular('post')) {
	$fullwidth_start .= '</div>';
	}
	
	$fullwidth_end = '<div class="mk-main-wrapper-holder"><div class="theme-page-wrapper '.$page_layout.'-layout mk-grid vc_row-fluid no-padding"><div class="theme-content no-padding">';

	/* Fixes page section for blog single post */
	if(is_singular('post')) {
	    $fullwidth_end .= '<div class="single-content">';
	}
	
}
$output .= $fullwidth_start . '<div'.$id.' class="wpb_row vc_row '.$el_class.' vc_row-fluid '.$visibility.' mk-fullwidth-'.$fullwidth.' '.$padding_css.' attched-'.$attached.' '. get_row_css_class(). vc_shortcode_custom_css_class( $css, ' ' ).$animation_css.'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>'.$fullwidth_end . $this->endBlockComment('row');
echo $output;
