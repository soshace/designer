<?php
extract(shortcode_atts(array(
    "images" => '',
    'title' => '',
    'style' => 'grid',
    'collection_title' => '',
    'margin_bottom' => '20',
    "height" => 500,
    "column" => 4,
    "el_class" => '',
    'disable_title' => 'false',
    'custom_links' => '',
    'frame_style' => '',
    'hover_scenarios' => 'fadebox',
    'overlay_color' => '',
    'orderby' => 'menu_order',
    'image_quality' => 1,
    'item_spacing' => 8,
    'order' => 'ASC',
    'pagination' => 'false',
    'pagination_style' => 3,
    'image_size' => 'crop',
    'item_id' => '',
    'count' => 10,
), $atts));
require_once(THEME_FUNCTIONS . "/bfi_cropping.php");

$mansory_pointer_css = $column_css = $mansory_style = '';
if ($images == '')
    return null;
$uniqid = uniqid();
$item_id = (!empty($item_id)) ? $item_id : 1409305847;
if($pagination == 'false') {
    $item_id = $uniqid;
}
global $mk_options, $post;

$layout = $output = $lightbox_push_top = $paginaton_style_class = $overlay_style = '';
if (is_singular()) {
    $layout = get_post_meta($post->ID, '_layout', true);
}
$layout = !empty($layout) ? $layout : 'full';

if($style == 'grid') {
    switch ($column) {
        case 1:
            if ($layout == 'full') {
                $width = $mk_options['grid_width'] - 40;
            } else {
                $width = round(($mk_options['content_width'] / 100) * $mk_options['grid_width']) - 40;
            }
            $column_css = 'gallery-one-column';
            break;
        case 2:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 2) - 36;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 36;
            }
            $column_css = 'gallery-two-column';
            break;
        case 3:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 3) - 30;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 3) - 29;
            }
            $column_css = 'gallery-three-column';
            break;
        case 4:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 4) - 26;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 4) - 26;
            }
            $column_css = 'gallery-four-column';
            break;
        case 5:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 5) - 24;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 5) - 24;
            }
            $column_css = 'gallery-five-column';
            break;
        case 6:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 6) - 24;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 6) - 24;
            }
            $column_css = 'gallery-six-column';
            break;
        case 7:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 7) - 22;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 7) - 22;
            }
            $column_css = 'gallery-seven-column';
            break;
        case 8:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 8) - 14;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 8) - 13;
            }
            $column_css = 'gallery-eight-column';
            break;
    }
} else {

    $width = 500;
    $height = 500;
    $mansory_style = 'masnory-gallery ';

}

if($pagination == 'true') {
	if ($pagination_style == '2') {
	     $paginaton_style_class = 'load-button-style';
	} else if ($pagination_style == '3') {
	     $paginaton_style_class = 'scroll-load-style';
	} else {
	     $paginaton_style_class = 'page-nav-style';
	}
} else {
	$count = -1;
}

if (!empty($overlay_color)) {
    $overlay_style = 'style="background-color:'.$overlay_color.'!important;"';
}

$custom_links = explode(',', $custom_links);



$query        = array(
    'posts_per_page' => (int) $count,
    'post_type' => 'attachment',
    'post_mime_type' => 'image',
    'post_status' => 'inherit',
);
if ($images) {
    $query['post__in'] = explode(',', $images);
}
if ($orderby) {
    $query['orderby'] = $orderby;
}
if ($order) {
    $query['order'] = $order;
}
$paged          = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
$query['paged'] = $paged;
$r              = new WP_Query($query);
$i            = 0;

// Fixes pagination and custom links count issue
if ($paged > 1) {
    $i = (($count * $paged) - $count) + 1;
}

if (!empty($title)) {
    $output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>' . $title . '</span></h3>';
}
$output .= '<div class="loop-main-wrapper"><section id="gallery-loop-'.$uniqid.'" data-uniqid="'.$item_id.'" data-style="gallery" style="margin-bottom:'.$margin_bottom.'px" class="mk-gallery-shortcode mk-theme-loop ' . $paginaton_style_class . ' '.$mansory_style. $el_class . '">';
if ($r->have_posts()):
    while ($r->have_posts()):
        $r->the_post();

        $uniqid = $uniqid;
        $image_title     = get_the_title();
        $alt             = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
        $caption             = $post->post_excerpt;
        $image_title     = $collection_title ? $collection_title : $image_title;

    switch ($image_size) {
        case 'full':
            $image_src_array = wp_get_attachment_image_src($post->ID, 'full', true);
            $image_output_src = $image_src_array[0];
            break;
        case 'crop':
            $image_src_array = wp_get_attachment_image_src($post->ID, 'full', true);
            $image_output_src = bfi_thumb($image_src_array[0], array(
                'width' => $width * $image_quality,
                'height' => $height * $image_quality
            ));
            break;            
        case 'large':
            $image_src_array = wp_get_attachment_image_src($post->ID, 'large', true);
            $image_output_src = $image_src_array[0];
            break;
        case 'medium':
            $image_src_array = wp_get_attachment_image_src($post->ID, 'medium', true);
            $image_output_src = $image_src_array[0];
            break;        
        default:
            $image_src_array = wp_get_attachment_image_src($post->ID, 'full', true);
            $image_output_src = bfi_thumb($image_src_array[0], array(
                'width' => $width * $image_quality,
                'height' => $height * $image_quality
            ));
            break;
    }

        $lightbox_full_size = wp_get_attachment_image_src($post->ID, 'full', true);

        if($style == 'style1' && $i % 5 == 0) {
            $mansory_pointer_css .= 'gallery-mansory-large ';
        } else if($style == 'style2' && ($i - 2) % 5 == 0) {
            $mansory_pointer_css .= 'gallery-mansory-large ';
        }else if($style == 'style3' && ($i - 1) % 5 == 0) {
            $mansory_pointer_css .= 'gallery-mansory-large ';
        }
        

        $output .= '<article class="' . $column_css . ' mk-isotop-item gallery-'.$item_id.' mk-gallery-item hover-'.$hover_scenarios.' '.$mansory_pointer_css. $frame_style . '-frame"><div class="item-holder" style="margin:0 '.$item_spacing.'px '.($item_spacing*2).'px">';
        
        if($hover_scenarios == 'none') {
            
            if (isset($custom_links[$i]) && $custom_links[$i] != '') {
                    $output .= '<a href="' . $custom_links[$i] . '">';
            } else {
                $output .= '<a href="' . $lightbox_full_size[0] . '" alt="' . $alt . '" title="' . $title . '" data-fancybox-group="gallery-group-' . $uniqid . '" class="mk-lightbox ' . $lightbox_push_top . '">';
            }

        }

        if($hover_scenarios != 'none') {

            $output .= '<div class="image-hover-overlay" '.$overlay_style.'></div>';
          
            if ($hover_scenarios == "overlay_layer" || $disable_title != 'false' && !empty($image_title)) {
                $output .= '<div class="gallery-desc">';
                $output .= '    <div class="gallery-title">' . $image_title . '</div>';
                $output .= '    <div class="gallery-caption">' . $caption . '</div>';
                $output .= '</div>';
                $lightbox_push_top = 'lightbox-push-top';
            }


            if (isset($custom_links[$i]) && $custom_links[$i] != '') {
                $output .= '<a href="' . $custom_links[$i] . '" class="mk-image-shortcode-lightbox"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            } else {
                $output .= '<a href="' . $lightbox_full_size[0] . '" alt="' . $alt . '" title="' . $title . '" data-fancybox-group="gallery-group-' . $uniqid . '" class="mk-lightbox ' . $lightbox_push_top . ' mk-image-shortcode-lightbox"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            }
        }   
        $output .= '<span class="gallery-inner"><img alt="' . $alt . '" title="' . $title . '" src="' . $image_output_src . '" /></span>';

         if($hover_scenarios == 'none') {
            $output .= '</a>';
         }

        $output .= '</div></article>' . "\n\n";
        $i++;
        $mansory_pointer_css = '';
    endwhile;
endif;
$output .= '<div class="clearboth"></div></section>';
$output .= '<a class="mk-loadmore-button" style="display:none;" href="#"><i class="mk-moon-loop-4"></i><i class="mk-moon-arrow-down-4"></i>' . __('Load More', 'mk_framework') . '</a>';
if ($pagination == 'true') {
    ob_start();
    mk_theme_blog_pagenavi('', '', $r, $paged);
    $output .= ob_get_clean();
}
$output .= '<div class="mk-preloader"></div>';
$output .= '</div>';
wp_reset_postdata();
echo $output;

