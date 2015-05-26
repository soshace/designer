<?php
$output = '';
extract( shortcode_atts( array(
			'title' => '',
			'count'=> 10,
			'style' => 'carousel',
			'column' => 4,
			'gutter_space' => 0,
			'bg_color' => '',
			'border_color' => '',
			'border_style' => '',
			'bg_hover_color' => '',
			'orderby'=> 'date',
			'target' => '_self',
			'clients' => '',
			'height' => '',
			'order'=> 'DESC',
			'margin_bottom' => 20,
			'autoplay' => 'true',
			'cover' => 'false',
			'el_class' => '',
		), $atts ) );

$id = uniqid();

$gutter_space = ($style == 'carousel' || $border_style == "opened_edges") ? 0 : $gutter_space;

$query = array(
	'post_type' => 'clients',
	'showposts' => $count,
);

if ( $clients ) {
	$query['post__in'] = explode( ',', $clients );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$loop = new WP_Query( $query );

$bg_color = !empty( $bg_color ) ? ( ' background-color:'.$bg_color.'; ' ) : '';
$bg_hover_color = !empty( $bg_hover_color ) ? ( ' background-color:'.$bg_hover_color.'; ' ) : '';
$border_color_item = !empty( $border_color ) ? ( ' border-color:'.$border_color.'; ' ) : 'border-color:transparent;';
$height = !empty( $height ) ? ( ' height:'.$height.'px; ' ) : ( ' height:110px; ' );

if($style == 'carousel') {

$directionNav = "false";
if ( $autoplay == 'false'  ) { 
    $directionNav = "true";
}

$slideshowSpeed = ($autoplay == 'false') ? 100000 : 4000;
$noTitle = ($title == '') ? 'slideshow-no-title' : '';
$titleWithButton = ($autoplay == 'false') ? 'title-with-button' : '';

$output .= '<div id="clients-'.$id.'" data-animation="slide" data-easing="swing" data-direction="horizontal" data-smoothHeight="false" data-slideshowSpeed="'.$slideshowSpeed.'" data-animationSpeed="500" data-pauseOnHover="true" data-controlNav="false" data-directionNav="'.$directionNav.'" data-isCarousel="true" data-itemWidth="180" data-itemMargin="0" data-minItems="1" data-maxItems="6" data-move="1" class="mk-clients-shortcode mk-script-call bg-cover-'.$cover.' '.$noTitle.' mk-flexslider '.$el_class.'">';
if ( !empty( $title ) ) { 
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading '.$titleWithButton.'"><span>'.$title.'</span></h3>';
}
$output .= '<ul class="mk-flex-slides">';
while ( $loop->have_posts() ):
	$loop->the_post();
$url = get_post_meta( get_the_ID(), '_url', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

$output .= '<li>';
$output .= !empty( $url ) ? '<a target="'.$target.'" href="'.$url.'">' : '';
$output .= '<div title="'.get_the_title().'" class="client-logo" style="background-image:url('.mk_thumbnail_image_gen($image_src_array[0], false, false).'); '.$height.'"></div>';
$output .= !empty( $url ) ? '</a>' : '';
$output .= '</li>';

endwhile;
wp_reset_query();

$output .= '</ul></div>';
} else {

	switch ( $column ) {
		case 1:
			$column_css = 'one-column';
			$per_row = 1;
			break;
		case 2:
			$column_css = 'two-column';
			$per_row = 2;
			break;
		case 3:
			$column_css = 'three-column';
			$per_row = 3;
			break;
		case 4:
			$column_css = 'four-column';
			$per_row = 4;
			break;
		case 5:
			$column_css = 'five-column';
			$per_row = 5;
			break;
		case 6:
			$column_css = 'six-column';
			$per_row = 6;
			break;
		default : 
			$column_css = 'four-column';
			$per_row = 4;
		}

	$container_border = (!empty( $border_color ) && $gutter_space == 0 && $border_style != "opened_edges") ? ( ' style="border-left:1px solid '.$border_color.';border-top:1px solid '.$border_color.';" ' ) : '';
	$output .= '<div id="clients-'.$id.'" class="mk-clients-shortcode column-style bg-cover-'.$cover.' '.$column_css.' '.$el_class.' border-'.$border_style.'">';
	if ( !empty( $title ) ) {
		$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
	}
	$row_counter = 0;
	$item_counter = 0;

	$output .= '<ul'.$container_border.'>';
	while ( $loop->have_posts() ):
		$loop->the_post();

		$loop_items = $loop->post_count;
		$url = get_post_meta( get_the_ID(), '_url', true );
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

		$output .= '<li>';
		$output .= !empty( $url ) ? '<a target="'.$target.'" href="'.$url.'">' : '';
		$output .= '<div title="'.get_the_title().'" class="client-logo" style="background-image:url('.mk_thumbnail_image_gen($image_src_array[0], false, false).'); '.$height.'"></div>';
		$output .= !empty( $url ) ? '</a>' : '';
		$output .= '</li>';

		$row_counter++;
		$item_counter++;
		if(($row_counter % $per_row) == 0 && $item_counter != $loop_items) {
			$output .= '</ul><ul'.$container_border.'>';
		}
	endwhile;
	wp_reset_query();

	$output .= '</ul></div>';
}

$gutter_space = ($gutter_space == 0) ? '0 auto' : $gutter_space;


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= "
#clients-{$id} {
	margin-bottom:{$margin_bottom}px;
}
#clients-{$id} .client-logo {
	{$bg_color}
	{$border_color_item};
	border-width: 1px;
	border-style: solid;
	margin:{$gutter_space}px;
";
if($gutter_space == 0 && $style == 'column') {
	$app_styles .= "
		
		border-top-style: none;
		border-left-style: none;
	";
}
$app_styles .= "
}
";
if($border_style == "opened_edges") {
$app_styles .= "
#clients-{$id} li:nth-child({$per_row}) .client-logo {
	border-right-style: none;
}
";	
}
$app_styles .= "
#clients-{$id} .client-logo:hover {
	{$bg_hover_color}
}
";


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
