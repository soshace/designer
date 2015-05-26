<?php

extract( shortcode_atts( array(
			'title' => '',
			'style' => 'classic',
			'per_page' => -1,
			'featured' => 'false',
			'order'=> 'DESC',
			'per_view' => 3,
			'orderby'=> 'date',
			'el_class' => ''
		), $atts ) );
	$output = '';
	$output .= '<div class="mk-shortcode mk-woocommerce-carousel '.$style.'-style '.$el_class.'">';
	if($style == 'classic') {
		$direction_vav = 'false';
		if(!empty($title)) {
			$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style"><span>'.$title.'</span>';
			$output .= '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" class="mk-woo-view-all">'.__( 'VIEW ALL', 'mk_framework' ).'</a></h3>';
			$direction_vav = 'true';
		}
		$output .= '<div data-selector=".woocommerce li" data-animation="slide" data-easing="swing" data-direction="horizontal" data-smoothHeight="false" data-slideshowSpeed="6000" data-animationSpeed="500" data-pauseOnHover="true" data-controlNav="false" data-directionNav="'.$direction_vav.'" data-isCarousel="true" data-itemWidth="276" data-itemMargin="0" data-minItems="1" data-maxItems="4" data-move="1" class="mk-flexslider mk-script-call">';
		if ( $featured == 'false' ) {
			$output .= do_shortcode( '[recent_products per_page="'.$per_page.'" orderby="'.$orderby.'" order="'.$order.'"]' );
		} else {
			$output .= do_shortcode( '[featured_products per_page="'.$per_page.'" orderby="'.$orderby.'" order="'.$order.'"]' );
		}
		$output .= '</div>';
	} else {
		
		$id = uniqid();

		$output .= '<div class="mk-swipe-slideshow"><div id="mk-swiper-'.$id.'" data-loop="true" data-freeModeFluid="false" data-slidesPerView="'.$per_view.'" data-pagination="false" data-freeMode="false" data-mousewheelControl="false" data-direction="horizontal" data-slideshowSpeed="5000" data-animationSpeed="500" data-directionNav="true" class="mk-swiper-container mk-swiper-slider">';

		$output .= '<div class="mk-swiper-wrapper">';

		$query = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
				'key' => '_visibility',
				'value' => array( 'catalog', 'visible' ),
				'compare' => 'IN'
				)
			),
		);

		if($featured == 'true') {
			$query['meta_key'] = '_featured';
			$query['meta_value'] = 'yes';
		}


		$r = new WP_Query($query);
		if($r->have_posts()) {
			while($r->have_posts()): $r->the_post();
				$output .= '<div class="swiper-slide">';
					$output .= '<div class="item-holder">';
					$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);

							$output .= '<a class="mk-lightbox" data-fancybox-group="woo-'.$id.'" href="'.$image_src_array[0].'">';
							$output .= get_the_post_thumbnail(get_the_ID(), 'shop_single');
							$output .= '<i class="mk-jupiter-icon-plus-circle"><span>&nbsp;</span></i>';
            				$output .= '<span class="image-hover-overlay"></span>';
            				$output .= '</a>';
								
								$output .= '<h3 class="the-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a></h3>';
								
								ob_start();
								wc_get_template('loop/price.php');
								$price = ob_get_contents();
								ob_end_clean();

								if($price) {
									$output .= $price;
								}
								
								$output .= do_shortcode('[mk_button dimension="outline" corner_style="pointed" size="small" outline_skin="custom" outline_active_color="#000000" outline_hover_color="#ffffff" bg_color="#f97352" btn_hover_bg="#252525" text_color="dark" icon="mk-moon-cart-plus" icon_anim="side" url="'.get_permalink(get_the_ID()).'" target="_self" align="center" fullwidth="false" margin_top="0" margin_bottom="0"]'.__('BUY NOW', 'mk_framework').'[/mk_button]');

								$output .= '</div></div>';

			endwhile;
	}

		$output .= '</div>';

			$output .= '<a class="mk-swiper-prev swiper-arrows"><i class="mk-jupiter-icon-arrow-left"></i></a>';
			$output .= '<a class="mk-swiper-next swiper-arrows"><i class="mk-jupiter-icon-arrow-right"></i></a>';

		$output .= '</div></div>';
	}

	$output .= '<div class="clearboth"></div></div>';

	echo $output;
	
