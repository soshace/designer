<?php
function mk_portfolio_masonry_loop(&$r, $atts)
{
    global $post;
    extract($atts);
    global $mk_options;
    
    
    $output     = '';
    $terms      = get_the_terms(get_the_id(), 'portfolio_category');
    $terms_slug = array();
    $terms_name = array();
    if (is_array($terms)) {
        foreach ($terms as $term) {
            $terms_slug[] = $term->slug;
            $terms_name[] = '<span>' . $term->name . '</span>';
        }
    }
    
    $post_type = get_post_meta($post->ID, '_single_post_type', true);
    $post_type = !empty($post_type) ? $post_type : 'image';
    $link_to   = get_post_meta(get_the_ID(), '_portfolio_permalink', true);
    
    $hover_overlay_value = get_post_meta($post->ID, '_hover_skin', true);
    $hover_overlay       = !empty($hover_overlay_value) ? (' style="background-color:' . $hover_overlay_value . '"') : '';
    
    $column = get_post_meta(get_the_ID(), '_masonry_img_size', true);
    $column = !(empty($column)) ? $column : 'x_x';
    
    switch ($column) {
        case 'x_x':
            $width  = 300;
            $height = 300;
            break;
        
        case 'two_x_x': // 
            $width  = 600 + $grid_spacing;
            $height = 300;
            break;
        
        case 'three_x_x':
            $width  = 900 + ($grid_spacing * 2);
            $height = 300;
            break;
        case 'four_x_x':
            $width  = 1200 + ($grid_spacing * 3);
            $height = 300;
            break;
        
        case 'x_two_x':
            $width  = 300;
            $height = 600 + $grid_spacing;
            break;
        case 'two_x_two_x':
            $width  = 600 + $grid_spacing;
            $height = 600 + $grid_spacing;
            break;
        case 'three_x_two_x':
            $width  = 900 + ($grid_spacing * 2);
            $height = 600 + $grid_spacing;
            break;
        
        case 'four_x_two_x':
            $width  = 1200 + ($grid_spacing * 3);
            $height = 600 + $grid_spacing;
            break;
        
        default:
            $width  = 300;
            $height = 300;
            break;
    }
    
    $lightbox_full_size = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
    
    $permalink = '';
    if (!empty($link_to)) {
        $link_array = explode('||', $link_to);
        switch ($link_array[0]) {
            case 'page':
                $permalink = get_page_link($link_array[1]);
                break;
            case 'cat':
                $permalink = get_category_link($link_array[1]);
                break;
            case 'portfolio':
                $permalink = get_permalink($link_array[1]);
                break;
            case 'post':
                $permalink = get_permalink($link_array[1]);
                break;
            case 'manually':
                $permalink = $link_array[1];
                break;
        }
    }
    if ($ajax == 'true' || empty($permalink)) {
        $permalink = get_permalink();
    }

     
    $output .= '<article id="' . get_the_ID() . '" class="mk-portfolio-item mk-portfolio-masonry-item masonry-'.$item_id.' mk-isotop-item  ' . $hover_scenarios . '-hover size_' . $column . ' portfolio-' . $post_type . ' ' . implode(' ', $terms_slug) . '"
                 style="border-top-width:0;
                        border-right-width:' . ($grid_spacing / 2) . 'px;
                        border-bottom-width:' . $grid_spacing . 'px;
                        border-left-width:' . ($grid_spacing / 2) . 'px;
                        border-style: solid;
                        border-color: transparent;
                        box-sizing: border-box;
                        " >';
    // $output .= '<article id="' . get_the_ID() . '" class="mk-portfolio-item mk-portfolio-masonry-item masonry-'.$item_id.' mk-isotop-item  ' . $hover_scenarios . '-hover size_' . $column . ' portfolio-' . $post_type . ' ' . implode(' ', $terms_slug) . '">';
    $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
    $image_src       = bfi_thumb($image_src_array[0], array(
        'width' => $width * $image_quality,
        'height' => $height * $image_quality
    ));
    
    $item_bg_color_value = get_post_meta($post->ID, '_hover_skin', true);
    $item_bg_color       = !empty($item_bg_color_value) ? (' background-color:' . $item_bg_color_value . '!important') : '';
    $output .= '<div class="item-holder">';
    // $output .= '<div style="margin:0 ' . ($grid_spacing / 2) . 'px ' . $grid_spacing . 'px;" class="item-holder">';
    
    //$output .= ($hover_scenarios == 'fadebox' || $hover_scenarios == 'none') ? '<a class="project-load" data-post-id="' . get_the_ID() . '" href="' . $permalink . '">' : '';
    
    
    $output .= '<div class="featured-image">';
    $output .= '<img alt="' . get_the_title() . '" class="item-featured-image" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_src, $width, $height)  . '" itemprop="image" />';
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

        if ($disable_permalink == 'true') {
            $output .= '<a class="permalink-badge project-load" data-fancybox-group="portfolio-grid" data-post-id="' . get_the_ID() . '" rel="portfolio-grid" target="' . $target . '" href="' . $permalink . '"><i class="mk-jupiter-icon-arrow-circle"></i></a>';
        }
        
        if ($post_type == 'image' || $post_type == '') {
            if ($disable_zoom_link == 'true') {
                $output .= '<a rel="portfolio-grid" title="' . get_the_title() . '" data-fancybox-group="portfolio-masonry-item" class="zoom-badge mk-lightbox" href="' . $image_src_array[0] . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            }
        } else if ($post_type == 'video') {
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
            if ($disable_zoom_link == 'true') {
                $output .= '<a title="' . get_the_title() . '" class="video-badge mk-lightbox" data-fancybox-group="portfolio-masonry-item" href="' . $video_url . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            }
        }
        
        $output .= '</div>';
    }

    if ($hover_scenarios == 'light-zoomin' ) {
        $output .= '<div class="grid-hover-icons">';

        if ($disable_permalink == 'true') {
            $output .= '<a class="permalink-badge project-load" data-fancybox-group="portfolio-grid" data-post-id="' . get_the_ID() . '" rel="portfolio-grid" target="' . $target . '" href="' . $permalink . '"><i class="mk-jupiter-icon-arrow-circle"></i></a>';
        }
        
        if ($post_type == 'image' || $post_type == '') {
            if ($disable_zoom_link == 'true') {
                $output .= '<a rel="portfolio-grid" title="' . get_the_title() . '" data-fancybox-group="portfolio-masonry-item" class="zoom-badge mk-lightbox" href="' . $image_src_array[0] . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            }
        } else if ($post_type == 'video') {
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
            if ($disable_zoom_link == 'true') {
                $output .= '<a title="' . get_the_title() . '" class="video-badge mk-lightbox" data-fancybox-group="portfolio-masonry-item" href="' . $video_url . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            }
        }
        
        $output .= '</div>';
        
    }

    if ($hover_scenarios != 'fadebox' && $hover_scenarios != 'light-zoomin' && $hover_scenarios != 'none') {
        $output .= '<div class="grid-hover-icons">';

        if ($disable_permalink == 'true') {
            $output .= '<a class="permalink-badge project-load" data-fancybox-group="portfolio-grid" data-post-id="' . get_the_ID() . '" rel="portfolio-grid" target="' . $target . '" href="' . $permalink . '"><i class="mk-jupiter-icon-arrow-circle"></i></a>';
        }

        if ($post_type == 'image' || $post_type == '') {
            if ($disable_zoom_link == 'true') {
                $output .= '<a data-fancybox-group="portfolio-grid" title="' . get_the_title() . '" class="zoom-badge mk-lightbox" href="' . $lightbox_full_size[0] . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            }
        } else if ($post_type == 'video') {
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
            if ($disable_zoom_link == 'true') {
                $output .= '<a title="' . get_the_title() . '" class="video-badge mk-lightbox" href="' . $video_url . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
            }
        }
        
        $output .= '</div>';
        
    }
    
    
    
    if ($hover_scenarios != 'none') {
    
         $output .= ($hover_scenarios == 'slidebox') ? '<div class="portfolio-meta"' . $hover_overlay . '>' : '<div class="portfolio-meta">';
         $output .= '<h3 class="the-title">' . get_the_title() . '</h3><div class="clearboth"></div>';
         if ($meta_type == 'category') {
             $output .= '<div class="portfolio-categories">' . implode(', ', $terms_name) . ' </div>';
         } else {
             $output .= '<time class="portfolio-date" datetime="' . get_the_date() . '">' . get_the_date() . '</time>';
         }
         $output .= '</div><!-- Portfolio meta -->';
    
    }
    
    $output .= '</div><!-- Featured Image -->';
    
    
    //$output .= ($hover_scenarios == 'fadebox' || $hover_scenarios == 'none') ? '</a><!-- project load -->' : '';
    $output .= '</div>';
    
    
    $output .= '</article>' . "\n\n\n";
    return $output;
}
