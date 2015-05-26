<?php

extract(shortcode_atts(array(
    'title' => '',
    'view_all' => '',
    'count' => 10,
    'author' => '',
    'post_type' => 'post',
    'posts' => '',
    'offset' => 0,
    'cat' => '',
    'order' => 'DESC',
    'orderby' => 'date',
    'el_class' => '',
    'enable_excerpt' => 'false'
), $atts));
global $post;
$query = array(
    'post_type' => $post_type,
    'posts_per_page' => (int) $count
);
if ($offset) {
    $query['offset'] = $offset;
}
if ($post_type == 'post') {
    if ($cat) {
        $query['cat'] = $cat;
    }
    if ($posts) {
        $query['post__in'] = explode(',', $posts);
    }
}

if ($orderby) {
    $query['orderby'] = $orderby;
}
if ($order) {
    $query['order'] = $order;
}

$r            = new WP_Query($query);
$directionNav = "false";

$output = '';
$output .= '<div class="mk-shortcode mk-blog-carousel ' . $el_class . '">';
if (!empty($title)) {
    $output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style"><span>' . $title . '</span>';
    $output .= '<a href="' . get_permalink($view_all) . '" class="mk-blog-view-all">' . __('VIEW ALL', 'mk_framework') . '</a></h3>';
    $directionNav = "true";
}
$output .= '<div data-animation="slide" data-easing="swing" data-direction="horizontal" data-smoothHeight="false" data-slideshowSpeed="4000" data-animationSpeed="500" data-pauseOnHover="true" data-controlNav="false" data-directionNav="' . $directionNav . '" data-isCarousel="true" data-itemWidth="260" data-itemMargin="0" data-minItems="1" data-maxItems="4" data-move="1" class="mk-flexslider mk-script-call"><ul class="mk-flex-slides">';

if ($r->have_posts()):
    while ($r->have_posts()):
        $r->the_post();
    if ($post_type == 'post') {
        $blog_post_type = get_post_meta($post->ID, '_single_post_type', true);
        if ($blog_post_type != 'audio') {
            
            if ($blog_post_type == '') {
                $blog_post_type = 'image';
            }
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
            
            
            $output .= '<li><div><div class="blog-carousel-thumb">';
            
            if (has_post_thumbnail()) {
                $image_src = bfi_thumb($image_src_array[0], array(
                    'width' => 245,
                    'height' => 180
                ));
            } else {
                $image_src = bfi_thumb(THEME_IMAGES . '/empty-thumb.png', array(
                    'width' => 245,
                    'height' => 180
                ));
            }
            $output .= '<img src="' . mk_thumbnail_image_gen($image_src, 245, 180) . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';
            $output .= '<div class="blog-carousel-overlay"></div>';
            $output .= '<a title="'.get_the_title().'" data-fancybox-group="blog-carousel" class="post-type-badge mk-lightbox" href="' . $image_src_array[0] . '"><i class="mk-li-' . $blog_post_type . '"></i></a>';
            $output .= '</div>';
            $output .= '<div class="detail-item-holder">';
            $output .= '<h5 class="blog-carousel-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
            if ($enable_excerpt == 'true') {
                $except = get_the_excerpt();
                if($except) {
                    $output .= '<p class="blog-carousel-excerpt">' . get_the_excerpt() . '</p>';
                }
            }
            $output .= '</div>';
            $output .= '</div></li>';
        }
    } else {
    	$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
            
            $output .= '<li><div><div class="blog-carousel-thumb"><a href="' . get_permalink() . '">';
            
            if (has_post_thumbnail()) {
                $image_src = bfi_thumb($image_src_array[0], array(
                    'width' => 245,
                    'height' => 180
                ));
            } else {
                $image_src = bfi_thumb(THEME_IMAGES . '/empty-thumb.png', array(
                    'width' => 245,
                    'height' => 180
                ));
            }
            $output .= '<img src="' . mk_thumbnail_image_gen($image_src, 245, 180) . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" />';
            $output .= '<div class="blog-carousel-overlay"></div>';
            $output .= '</a></div>';
            $output .= '<h5 class="blog-carousel-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
            if ($enable_excerpt == 'true') {
                $output .= '<p class="blog-carousel-excerpt">' . get_the_excerpt() . '</p>';
            }
            $output .= '</div></li>';
    }
    endwhile;
endif;
wp_reset_query();

$output .= '</ul></div><div class="clearboth"></div></div>';

echo $output;
