<?php
function mk_portfolio_grid_loop(&$r, $atts)
{
    global $post;
    extract($atts);
    global $mk_options;
    if ($column > 6) {
        $column = 6;
    }
    switch ($column) {
        case 1:
            if ($layout == 'full') {
                $width = $mk_options['grid_width'] - 40;
            } else {
                $width = round(($mk_options['content_width'] / 100) * $mk_options['grid_width']) - 40;
            }
            $column_css = 'portfolio-one-column';
            break;
        case 2:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 2) - 25;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
            }
            $column_css = 'portfolio-two-column';
            break;
        case 3:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 3) - 20;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
            }
            $column_css = 'portfolio-three-column';
            break;
        case 4:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 4) - 15;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
            }
            $column_css = 'portfolio-four-column';
            break;
        case 5:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 5) - 10;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
            }
            $column_css = 'portfolio-five-column';
            break;
        case 6:
            if ($layout == 'full') {
                $width = round($mk_options['grid_width'] / 6) - 15;
            } else {
                $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
            }
            $column_css = 'portfolio-six-column';
            break;
    }
    if ($layout == 'full') {
        $layout_class = 'portfolio-full-layout';
    } else {
        $layout_class = 'portfolio-with-sidebar';
    }
    $output     = $disabled_button_syle = '';
    $terms      = get_the_terms(get_the_id(), 'portfolio_category');
    $terms_slug = array();
    $terms_name = array();
    if (is_array($terms)) {
        foreach ($terms as $term) {
            $terms_slug[] = $term->slug;
            $terms_name[] = '<span>' . $term->name . '</span>';
        }
    }
    $height              = !empty($height) ? $height : 600;
    $post_type           = get_post_meta($post->ID, '_single_post_type', true);
    $hover_overlay_value = get_post_meta($post->ID, '_hover_skin', true);
    $hover_overlay       = !empty($hover_overlay_value) ? (' style="background-color:' . $hover_overlay_value . '"') : '';
    $post_type           = !empty($post_type) ? $post_type : 'image';
    
     switch ($image_size) {
        case 'full':
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
            $image_output_src = $image_src_array[0];
            break;
        case 'crop':
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
            $image_output_src = bfi_thumb($image_src_array[0], array(
                'width' => $width * $image_quality,
                'height' => $height * $image_quality
            ));
            break;            
        case 'large':
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
            $image_output_src = $image_src_array[0];
            break;
        case 'medium':
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium', true);
            $image_output_src = $image_src_array[0];
            break;        
        default:
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
            $image_output_src = bfi_thumb($image_src_array[0], array(
                'width' => $width * $image_quality,
                'height' => $height * $image_quality
            ));
         break;
    }

    $lightbox_full_size = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
    
    
    $link_to   = get_post_meta(get_the_ID(), '_portfolio_permalink', true);
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
    
    
    
    $output .= '<article id="' . get_the_ID() . '" class="mk-portfolio-item mk-portfolio-grid-item grid-'.$item_id.' mk-isotop-item ' . $hover_scenarios . '-hover ' . $column_css . ' ' . $layout_class . ' portfolio-' . $post_type . ' ' . implode(' ', $terms_slug) . '">';
    $item_bg_color_value = get_post_meta($post->ID, '_hover_skin', true);
    $item_bg_color       = !empty($item_bg_color_value) ? (' background-color:' . $item_bg_color_value . '!important') : '';
    $output .= '<div style="margin:0 ' . ($grid_spacing / 2) . 'px ' . $grid_spacing . 'px;" class="item-holder">';
    
    // $output .= ($hover_scenarios == 'fadebox' || $hover_scenarios == 'none') ? '<a class="project-load" data-post-id="' . get_the_ID() . '" href="' . $permalink . '">' : '';
    $output .= ($hover_scenarios == 'none') ? '<a class="project-load" data-post-id="' . get_the_ID() . '" href="' . $permalink . '">' : '';
    
    
    
     
    $disabled_button_syle = $disable_permalink == 'false' && $disable_zoom_link == 'false' ? 'buttons-disabled' : '';
    $output .= '<div class="featured-image '.$disabled_button_syle.'">';
    $output .= '<img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_output_src, $width, $height)  . '"  />';
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
            if ($disable_zoom_link == 'true'){
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
            if ($disable_zoom_link == 'true'){
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
            if ($disable_zoom_link == 'true'){
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
            if ($disable_zoom_link == 'true'){
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
            if ($disable_zoom_link == 'true'){
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
         $output .= ($hover_scenarios == 'cube') ? '<div class="meta-centered">' : '';
         $output .= '<h3 class="the-title">' . get_the_title() . '</h3><div class="clearboth"></div>';
         if ($meta_type == 'category') {
             $output .= '<div class="portfolio-categories">' . implode(', ', $terms_name) . ' </div>';
         } else {
             $output .= '<time class="portfolio-date" datetime="' . get_the_date() . '">' . get_the_date() . '</time>';
         }
         $output .= ($hover_scenarios == 'cube') ? '</div>' : '';
         $output .= '</div><!-- Portfolio meta -->';
    
    }
    
    $output .= '</div><!-- Featured Image -->';
    $output .= ($hover_scenarios == 'none') ? '</a>' : '';
    
    
    //$output .= ($hover_scenarios == 'fadebox' || $hover_scenarios == 'none') ? '</a><!-- project load -->' : '';
    
    $output .= '</div></article><!-- item holder + article -->' . "\n\n\n";
    return $output;
}
