<?php

extract( shortcode_atts( array(
			'title' => '',
			'style' => 'classic',
			'hover_scenarios' => 'fadebox',
			'view_all' => '',
			'count'=> 10,
			'author' => '',
			'posts' => '',
			'offset' => 0,
			'cat' => '',
            'categories' => '',
			'order'=> 'DESC',
			'orderby'=> 'date',
			'show_items' => 4,
			'disable_title_cat' => 'true',
			'image_quality' => 1,
			'el_class' => '',
     		'meta_type' => 'category',
		), $atts ) );


require_once(THEME_FUNCTIONS . "/bfi_cropping.php");

$id = uniqid();
$query = array(
	'post_type' => 'portfolio',
	'posts_per_page' => (int)$count,
);
if ( $offset ) {
	$query['offset'] = $offset;
}
if ( $author ) {
	$query['author'] = $author;
}

$cat = !empty($categories) ? $categories : $cat;

if ( $cat != '' ) {
		$query['tax_query'] = array(
			array(
				'taxonomy' => 'portfolio_category',
				'field' => 'slug',
				'terms' => explode( ',', $cat )
			)
		);
}
if ( $posts ) {
	$query['post__in'] = explode( ',', $posts );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}



$r = new WP_Query( $query );

global $post;


$output = '';
if ( $style == 'classic' ) :

	$show_items = 4;

$direction_vav = 'false';

$output .= '<div class="mk-shortcode mk-portfolio-carousel '.$el_class.'">';
if(!empty($view_all) && $view_all != '*') {
$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style"><span>'.$title.'</span>';
	$output .= '<a href="'.get_permalink( $view_all ).'" class="mk-portfolio-view-all">'.__( 'VIEW ALL', 'mk_framework' ).'</a></h3>';
	$direction_vav = 'true';
}

$output .= '<div id="mk-portfolio-carousel-'.$id.'" class="mk-flexslider"><ul class="mk-flex-slides">';

if ( $r->have_posts() ):
	while ( $r->have_posts() ) :
		$r->the_post();
	$link_to = get_post_meta( get_the_ID(), '_portfolio_permalink', true );


	$permalink  = '';
	if ( !empty( $link_to ) ) {
		$link_array = explode( '||', $link_to );
		switch ( $link_array[ 0 ] ) {
		case 'page':
			$permalink = get_page_link( $link_array[ 1 ] );
			break;
		case 'cat':
			$permalink = get_category_link( $link_array[ 1 ] );
			break;
		case 'portfolio':
			$permalink = get_permalink( $link_array[ 1 ] );
			break;
		case 'post':
			$permalink = get_permalink( $link_array[ 1 ] );
			break;
		case 'manually':
			$permalink = $link_array[ 1 ];
			break;
		}
	}

	if ( empty( $permalink ) ) {
		$permalink = get_permalink();
	}

	$terms = get_the_terms( get_the_id(), 'portfolio_category' );
$terms_slug = array();
$terms_name = array();
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$terms_slug[] = $term->slug;
		$terms_name[] = $term->name;
	}
}

$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 260*$image_quality, 'height' => 180*$image_quality)); 


$output .= '<li>';
$output .= '<div class="mk-portfolio-carousel-thumb"><img width="260" height="180" src="'.mk_thumbnail_image_gen($image_src, 260, 180).'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
$output .= '<div class="portfolio-carousel-overlay"></div>';
$output .= '<a class="mk-lightbox portfolio-carousel-lightbox" alt="'.get_the_title().'" rel="portfolio-carousel-'.$id.'" title="'.get_the_title().'" href="'.$image_src_array[0].'"><i class="mk-jupiter-icon-plus-circle"></i></a>';
$output .= '<a class="portfolio-carousel-permalink" href="'.$permalink.'"><i class="mk-jupiter-icon-arrow-circle"></i></a>';
$output .= '</div>';
$output .= '<div class="portfolio-carousel-extra-info">';
$output .= '<a class="portfolio-carousel-title" href="'.$permalink.'">'.get_the_title().'</a><div class="clearboth"></div>';
$output .= '<div class="portfolio-carousel-cats">'.implode( ' ', $terms_name ).'</div>';
$output .= '</div>';

$output .= '</li>';

endwhile;
endif;
wp_reset_query();

$output .= '</ul></div><div class="clearboth"></div></div>';

else :

$direction_vav = 'true';

/* Modern Style : added in v2.0 */


$output .= '<div class="mk-shortcode mk-portfolio-carousel-modern '.$el_class.'">';
$output .= '<div id="mk-portfolio-carousel-'.$id.'" class="mk-flexslider"><ul class="mk-flex-slides">';
$i = 0;

if ( $r->have_posts() ):
	while ( $r->have_posts() ) :
		$r->the_post();
	$i++;

	$hover_overlay_value = get_post_meta(get_the_ID(), '_hover_skin', true);
	$hover_overlay       = !empty($hover_overlay_value) ? (' style="background-color:' . $hover_overlay_value . '"') : '';

	$post_type = get_post_meta( $post->ID, '_single_post_type', true );
	$post_type = !empty( $post_type ) ? $post_type : 'image';
	$link_to = get_post_meta( get_the_ID(), '_portfolio_permalink', true );
	$permalink  = '';
	if ( !empty( $link_to ) ) {
		$link_array = explode( '||', $link_to );
		switch ( $link_array[ 0 ] ) {
		case 'page':
			$permalink = get_page_link( $link_array[ 1 ] );
			break;
		case 'cat':
			$permalink = get_category_link( $link_array[ 1 ] );
			break;
		case 'portfolio':
			$permalink = get_permalink( $link_array[ 1 ] );
			break;
		case 'post':
			$permalink = get_permalink( $link_array[ 1 ] );
			break;
		case 'manually':
			$permalink = $link_array[ 1 ];
			break;
		}
	}

	if ( empty( $permalink ) ) {
		$permalink = get_permalink();
	}

$terms = get_the_terms( get_the_id(), 'portfolio_category' );
$terms_slug = array();
$terms_name = array();
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$terms_slug[] = $term->slug;
		$terms_name[] = $term->name;
	}
}

$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 500*$image_quality, 'height' => 350*$image_quality)); 

$output .= '<li>';
$output .= '<div class="portfolio-modern-column mk-portfolio-item ' . $hover_scenarios . '-hover">';
$output .= '<div class="featured-image"><img width="500" height="350" src="'.mk_thumbnail_image_gen($image_src, 500, 350).'" alt="'.get_the_title().'" title="'.get_the_title().'"  class="item-featured-image" />';

if ($post_type == 'video') {
    $video_id   = get_post_meta($post->ID, '_single_video_id', true);
    $video_site = get_post_meta($post->ID, '_single_video_site', true);
    $video_url  = '';
    if ($video_site == 'vimeo') {
        $video_url = 'http' . ((is_ssl()) ? 's' : '') . '://vimeo.com/' . $video_id . '?autoplay=0';
    } elseif ($video_site == 'youtube') {
        $video_url = 'http' . ((is_ssl()) ? 's' : '') . '://www.youtube.com/watch?v=' . $video_id . '?autoplay=0';
    } elseif ($video_site == 'dailymotion') {
        $video_url = 'http' . ((is_ssl()) ? 's' : '') . '://www.dailymotion.com/video/' . $video_id . '?logo=0';
    }
}


    if ($hover_scenarios == 'fadebox') {
        $output .= '<div class="hover-overlay gradient"' . $hover_overlay . '></div>';
    } else {
        if ($hover_scenarios == 'zoomout') {
            
            $output .= '<div class="image-hover-overlay" style="' . $item_bg_color . '"></div>';
        } else {
            $output .= '<div class="image-hover-overlay"></div>';
        }
        
    }
    
    
    if ($hover_scenarios == 'fadebox') {
        $output .= '<div class="grid-hover-icons">';

            $output .= '<a class="permalink-badge project-load" data-fancybox-group="portfolio-grid" data-post-id="' . get_the_ID() . '" rel="portfolio-grid" href="' . $permalink . '"><i class="mk-jupiter-icon-arrow-circle"></i></a>';

        
        if ($post_type == 'image' || $post_type == '') {
            
            $output .= '<a rel="portfolio-grid" title="' . get_the_title() . '" data-fancybox-group="portfolio-masonry-item" class="zoom-badge mk-lightbox" href="' . $image_src_array[0] . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            
        } else if ($post_type == 'video') {
            
            $output .= '<a title="' . get_the_title() . '" class="video-badge mk-lightbox" data-fancybox-group="portfolio-masonry-item" href="' . $video_url . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
        }
        $output .= '</div>';
    }

    if ($hover_scenarios == 'light-zoomin' ) {
        $output .= '<div class="grid-hover-icons">';

        // if ($disable_permalink == 'true') {
            $output .= '<a class="permalink-badge project-load" data-fancybox-group="portfolio-grid" data-post-id="' . get_the_ID() . '" rel="portfolio-grid" href="' . $permalink . '"><i class="mk-jupiter-icon-arrow-circle"></i></a>';
        // }
        
        if ($post_type == 'image' || $post_type == '') {
            $output .= '<a rel="portfolio-grid" title="' . get_the_title() . '" data-fancybox-group="portfolio-masonry-item" class="zoom-badge mk-lightbox" href="' . $image_src_array[0] . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
        } else if ($post_type == 'video') {
            $output .= '<a title="' . get_the_title() . '" class="video-badge mk-lightbox" data-fancybox-group="portfolio-masonry-item" href="' . $video_url . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
        }
        
        $output .= '</div>';
        
    }

    if ($hover_scenarios != 'fadebox' && $hover_scenarios != 'light-zoomin' && $hover_scenarios != 'none') {
        $output .= '<div class="grid-hover-icons">';

        // if ($disable_permalink == 'true') {
            $output .= '<a class="permalink-badge project-load" data-fancybox-group="portfolio-grid" data-post-id="' . get_the_ID() . '" rel="portfolio-grid" href="' . $permalink . '"><i class="mk-jupiter-icon-arrow-circle"></i></a>';
        // }

        if ($post_type == 'image' || $post_type == '') {
            $output .= '<a rel="portfolio-grid" title="' . get_the_title() . '" data-fancybox-group="portfolio-masonry-item" class="zoom-badge mk-lightbox" href="' . $image_src_array[0] . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
        } else if ($post_type == 'video') {
            $output .= '<a title="' . get_the_title() . '" class="video-badge mk-lightbox" data-fancybox-group="portfolio-masonry-item" href="' . $video_url . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
        }
  
        $output .= '</div>';
        
    }

    if ($hover_scenarios != 'none') {
        
        $output .= ($hover_scenarios == 'slidebox') ? '<div class="portfolio-meta"' . $hover_overlay . '>' : '<div class="portfolio-meta">';
        $output .= '<h3 class="the-title">' . get_the_title() . '</h3><div class="clearboth"></div>';
        if ($meta_type == 'category') {
            $output .= '<div class="portfolio-categories">' . implode(' ', $terms_name) . ' </div>';
        } else {
            $output .= '<time class="portfolio-date" datetime="' . get_the_date() . '">' . get_the_date() . '</time>';
        }
        $output .= '</div><!-- Portfolio meta -->';
        
    }


$output .= '</div>';
$output .= '</div>';
$output .= '</li>';


endwhile;
endif;
wp_reset_query();

$output .= '</ul></div><div class="clearboth"></div></div>';

endif;

$output .= '<script type="text/javascript">
        jQuery(document).ready(function() {
        	var style = "'.$style.'",
        	item_width;
        	if(style == "modern") {
        		var screen_width = jQuery("#mk-portfolio-carousel-'.$id.'").width(),
        		items_to_show = '.$show_items.';

        		if(screen_width >= 1100) {
        			item_width = screen_width/items_to_show;
        		} else if(screen_width <= 1200 && screen_width >= 800) {
        			item_width = screen_width/3;
        		} else if(screen_width <= 800 && screen_width >= 540){
        			item_width = screen_width/2;
        		} else {
        			item_width = screen_width;
        		}

        	} else {
        		item_width = 275;
        	}
        	

            jQuery(window).on("load",function () {
                jQuery("#mk-portfolio-carousel-'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "slide",
                    smoothHeight: true,
                    slideshowSpeed: 6000,
                    animationSpeed: 400,
                    pauseOnHover: true,
                    controlNav: false,
                    smoothHeight: false,
                    useCSS: false,
                    directionNav:'.$direction_vav.',
                    prevText: "",
                    nextText: "",
                    itemWidth: item_width,
                    itemMargin: 0,
                    maxItems:'.$show_items.',
                    minItems: 1,
                    move: 1
                });
            });
        });
        </script>';
echo $output;
