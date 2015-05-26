<?php

extract( shortcode_atts( array(
			'style' => '',
			'table_number' => 4,
			'tables' => '',
			'orderby'=> 'date',
			'order'=> 'DESC',
			'el_class' =>'',
		), $atts ) );


$query = array(
	'post_type'=>'pricing',
	'showposts' => $table_number,
);

if ( $tables ) {
	$query['post__in'] = explode( ',', $tables );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}


if ( $table_number == 4 ) {
	$table_css = 'four-table';
} else if ( $table_number == 3 ) {
		$table_css = 'three-table';
	} else if ( $table_number == 2 ) {
		$table_css = 'two-table';
	} else if ( $table_number == 1 ) {
		$table_css = 'one-table';
	}
$r = new WP_Query( $query );
global $post, $mk_options;
$pricing_offer_css = '';
if ( strlen( $content ) < 5 ) {
	$pricing_offer_css = 'no-pricing-offer';
}

$output = '<div class="shortcode pricing-table '.$style.' '.$el_class.' '.$pricing_offer_css.'">';
if ( strlen( $content ) > 5 ) {
	$output .= '<div class="pricing-offer-grid">';
	$output .= '<div class="offers">'.wpb_js_remove_wpautop( $content ).'</div>';
	$output .= '</div>';
}
$output .= '<ul class="pricing-cols">';
while ( $r->have_posts() ) : $r->the_post();
$heading_color = ( $style == 'multicolor' ) ? ( 'style="background-color:'.get_post_meta( $post->ID, 'skin', true ).'"' ) : '';
$featured = get_post_meta( $post->ID, 'featured', true );

$featured_css = '';
if ( $featured == 'true' ) {
	$button_color = get_post_meta( $post->ID, '_button_skin', true ) ? get_post_meta( $post->ID, '_button_skin', true ) : get_post_meta( $post->ID, 'skin', true ); 
	$featured_css = 'featured-plan';
	if ( $style == 'monocolor' ) {
		$button_color = get_post_meta( $post->ID, '_button_skin', true ) ? get_post_meta( $post->ID, '_button_skin', true ) : $mk_options['skin_color'];
	}
} else {
	if ( $style == 'monocolor' ) {
		$button_color = get_post_meta( $post->ID, '_button_skin', true ) ? get_post_meta( $post->ID, '_button_skin', true ) : '#727272';
	} else {
		$button_color = get_post_meta( $post->ID, '_button_skin', true ) ? get_post_meta( $post->ID, '_button_skin', true ) : '#969696';
	}
}

$button_style = get_post_meta( $post->ID, '_button_style', true ) ? get_post_meta( $post->ID, '_button_style', true ) : 'flat';

$output .= '<li class="pricing-col '.$table_css.' '.$featured_css.'">';
$output .='<div class="pricing-heading" '.$heading_color.'>';
if ( $featured == 'true' && $style == 'multicolor' ) {
	$output .= '<span class="premium-ribbon">'.get_post_meta( $post->ID, '_ribbon_txt', true ).'</span>';
}
$output .='<div class="pricing-plan">'.get_post_meta( $post->ID, '_plan', true ).'</div>';
$output .='<div class="pricing-price">';

$output .='<span><sup>'.get_post_meta( $post->ID, '_currency', true ).'</sup>'.get_post_meta( $post->ID, '_price', true ).'<sub>'.get_post_meta( $post->ID, '_period', true ).'</sub></span>';

$output .='</div></div>';
$output .='<div class="pricing-features">'.do_shortcode(get_post_meta( $post->ID, '_features', true )).'</div>';
$output .='<div class="pricing-button">
                        '.do_shortcode( '[mk_button dimension="'.$button_style.'" size="medium" bg_color="'.$button_color.'" outline_hover_color="#fff" outline_skin="custom" outline_active_color="'.$button_color.'" text_color="light" target="_self" align="center" url="'.get_post_meta( $post->ID, '_btn_url', true ).'"]'.get_post_meta( $post->ID, '_btn_text', true ).'[/mk_button]' ).'
                        <div class="clearboth"></div>
                  </div>';
$output .='</li>';

endwhile;
$output .= '</ul></div>';

wp_reset_query();
echo $output;
