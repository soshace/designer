<?php
	extract( shortcode_atts( array(
			'slides' => '',
			'height' => '',
			'padding' => '',
			'animation_style' => '',
			'orderby'=> 'date',
			'order'=> 'DESC',
			'autoplay' => '',
			'slideshow_speed' => '',
			'animation_duration' => '',
			"el_class" => '',
		), $atts ) );
	$query = array(
	   'post_type' => 'banner_builder',
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

	$id = uniqid();
	$loop  = new WP_Query( $query );
	$i = 0;
	$output .= '<div class="mk-banner-builder theme-page-wrapper full-layout">
						<div style="padding:0;" class="theme-content">
							<div style="padding-top:' . $padding . 'px; padding-bottom:' . $padding . 'px; min-height:' . $height . 'px;" class="mk-flexslider" id="mk_banner_builder">';
	$output .= '			<ul class="mk-banner-slides">';
	while ($loop->have_posts()):
	   $loop->the_post();
	   $i++;
	   $output .= '			<li>
	   								' . do_shortcode(get_the_content()) . '
	   							</li>';
	endwhile;
	wp_reset_query();
	$output .= '			</ul>';
	$output .= '			<div class="clearboth"></div>
							</div>
						</div>
					</div>';
	if ($i < 2){
   	$directionNav = 'false';
   }else{
   	$directionNav = 'true';
   }
   $output .= "<script type='text/javascript'>

  jQuery(document).ready(function() {
	    jQuery('#mk_banner_builder').flexslider({
	    		selector: '.mk-banner-slides > li',
				animation: '".$animation_style."',
				smoothHeight: false,
				direction:'horizontal',
				slideshow: ".$autoplay.",
				slideshowSpeed: ".$slideshow_speed.",
				animationSpeed: ".$animation_duration.",
				pauseOnHover: true,
				directionNav: ".$directionNav.",
				controlNav: false,
				initDelay: 2000,
				prevText: '',
				nextText: '',
				pauseText: '',
				playText: ''
		});

});

</script>";

echo $output;
