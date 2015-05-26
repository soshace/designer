<?php
function mk_portfolio_classic_loop(&$r, $atts)
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
                    $width = $mk_options['grid_width'] - 62;
               } else {
                    $width = round(($mk_options['content_width'] / 100) * $mk_options['grid_width']) - 62;
               }
               $column_css = 'portfolio-one-column';
               break;
          case 2:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 2) - 42;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 47;
               }
               $column_css = 'portfolio-two-column';
               break;
          case 3:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 3) - 36;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 47;
               }
               $column_css = 'portfolio-three-column';
               break;
          case 4:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 4) - 32;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 47;
               }
               $column_css = 'portfolio-four-column';
               break;
          case 5:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 5) - 30;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 47;
               }
               $column_css = 'portfolio-five-column';
               break;
          case 6:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 6) - 32;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 47;
               }
               $column_css = 'portfolio-six-column';
               break;
     }
     if ($layout == 'full') {
          $layout_class = 'portfolio-full-layout';
     } else {
          $layout_class = 'portfolio-with-sidebar';
     }
     $output     = '';
     $terms      = get_the_terms(get_the_id(), 'portfolio_category');
     $terms_slug = array();
     $terms_name = array();
     if (is_array($terms)) {
          foreach ($terms as $term) {
               $terms_slug[] = $term->slug;
               $terms_name[] = '<a href="' . get_term_link($term->slug, 'portfolio_category') . '">' . $term->name . '</a>';
          }
     }
     $height    = !empty($height) ? $height : 600;
     $post_type = get_post_meta($post->ID, '_single_post_type', true);
     $post_type = !empty($post_type) ? $post_type : 'image';
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
     if (empty($permalink)) {
          $permalink = get_permalink();
     }
     $output .= '<article id="' . get_the_ID() . '" class="mk-portfolio-item mk-portfolio-classic-item classic-'.$item_id.' mk-isotop-item ' . $column_css . ' ' . $layout_class . ' portfolio-' . $post_type . ' ' . implode(' ', $terms_slug) . '"><div class="portfolio-classic-holder">';

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


     $lightbox        = $single_hover_icon = '';
     if ($disable_permalink == 'false') {
          $single_hover_icon = ' hover-single-icon';
     }
     if ($post_type == 'image' || $post_type == '') {
        if ($disable_zoom_link == 'true') {
          $lightbox = '<a rel="portfolio-classic" title="' . get_the_title() . '" data-fancybox-group="portfolio-classic-item" class="zoom-badge portfolio-classic-lightbox mk-lightbox' . $single_hover_icon . '" href="' . $lightbox_full_size[0] . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
        }
     } else if ($post_type == 'video') {
          $video_id   = get_post_meta($post->ID, '_single_video_id', true);
          $video_site = get_post_meta($post->ID, '_single_video_site', true);
          $video_url  = '';
          if ($video_site == 'vimeo') {
               $video_url = 'http'.((is_ssl())? 's' : '').'://player.vimeo.com/video/' . $video_id . '?autoplay=0';
          } elseif ($video_site == 'youtube') {
               $video_url = 'http'.((is_ssl())? 's' : '').'://www.youtube.com/embed/' . $video_id . '?autoplay=0';
          } elseif ($video_site == 'dailymotion') {
               $video_url = 'http'.((is_ssl())? 's' : '').'://www.dailymotion.com/embed/video/' . $video_id . '?logo=0';
          }
          if ($disable_zoom_link == 'true') {
            $lightbox = '<a data-title="' . get_the_title() . '" data-fancybox-group="portfolio-classic-item" class="video-badge mk-lightbox' . $single_hover_icon . '" href="' . $video_url . '"><i class="mk-jupiter-icon-plus-circle"></i></a>';
          }
     }
     $output .= '<div class="featured-image">';
     $output .= '<img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_output_src, $width, $height) . '"  />';
     $output .= '<div class="image-hover-overlay"></div>';
     if ($disable_permalink == 'true') {
          $output .= '<a class="permalink-badge" target="' . $target . '" href="' . $permalink . '"><i class="mk-jupiter-icon-arrow-circle"></i></a>';
     }
     $output .= $lightbox;
     $output .= '</div>';
     $output .= '<div class="portfolio-meta-wrapper">';
     if ($disable_permalink == 'true') {
          $output .= '<h3 class="the-title"><a target="' . $target . '" href="' . $permalink . '">' . get_the_title() . '</a></h3><div class="clearboth"></div>';
     } else {
          $output .= '<h3 class="the-title">' . get_the_title() . '</h3><div class="clearboth"></div>';
     }
     $output .= '<div class="portfolio-categories">' . implode(', ', $terms_name) . ' </div>';
     if ($disable_excerpt == 'true') {
          $output .= '<p class="the-excerpt">' . get_the_excerpt() . '</p>';
     }
     $output .= '</div>';
     $output .= '<div class="clearboth"></div></div></article>' . "\n\n\n";
     return $output;
}