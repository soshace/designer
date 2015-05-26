<?php
function blog_magazine_style($atts, $i){
   global $post, $mk_options;
   extract($atts);

   $output = '';
   $image_height = $grid_image_height;

   $lightbox_full_size = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
   $post_type       = get_post_meta($post->ID, '_single_post_type', true);

   if($i == 1){

      if ($layout == 'full') {
           $image_width = $grid_width - 40;
           $image_height = ($image_width)*0.6;
       } else {
           $image_width = (($content_width / 100) * $grid_width) - 40;
           $image_height = ($image_width)*0.6;
       }
       switch ($image_size) {
           case 'full':
               $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
               $image_output_src = $image_src_array[0];
               break;
           case 'crop':
               $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
               $image_output_src = bfi_thumb($image_src_array[0], array(
                   'width' => $image_width * $image_quality,
                  'height' => $image_height * $image_quality
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
                   'width' => $image_width * $image_quality,
                'height' => $image_height * $image_quality
               ));
               break;
       }
       if ($post_type == '') {
          $post_type = 'image';
       }

       $output .= '<article id="' . get_the_ID() . '" class="mk-blog-magazine-item magazine-featured-post mk-isotop-item"><div class="blog-item-holder">';
       if (has_post_thumbnail()) {
            
            $show_lightbox = get_post_meta($post->ID, '_disable_post_lightbox', true);
            if (($show_lightbox == 'true' || $show_lightbox == '') && $disable_lightbox == 'true') {
                $lightbox_code = ' class="mk-lightbox blog-newspaper-lightbox" data-fancybox-group="blog-magazine" href="' . $lightbox_full_size[0] . '"';
            } else {
                $lightbox_code = ' href="' . get_permalink() . '"';
            }

            $output .= '<div class="featured-image"><a title="' . get_the_title() . '"' . $lightbox_code . '>';
            $output .= '  <img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_output_src, $image_width, $image_height) . '" itemprop="image" />';
            $output .= '  <div class="image-gradient-overlay"></div>';
            $output .= '</a></div>';

        }
        $output .= '<div class="item-wrapper">';
        $output .= '  <h3 class="the-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
        $output .= '    <div class="mk-blog-meta">';
        $output .= '        <time datetime="' . get_the_date() . '">
                                <a href="' . get_month_link(get_the_time("Y"), get_the_time("m")) . '">' . get_the_date() . '</a>
                            </time>
                        <span class="mk-categories">&nbsp;' . __('', 'mk_framework') . ' ' . get_the_category_list(', ') . '</span>
                            ';
        $output .= '    <div class="clearboth"></div>';
        $output .= '    </div>';                               
        if($excerpt_length != 0) {
            ob_start();
            the_excerpt_max_charlength($excerpt_length);
            $output .= '<div class="the-excerpt"><p>' . ob_get_clean() . '</p></div>';
        }                            
        
        if ($disable_comments_share != 'false') {
            $output .= '<div class="blog-magazine-social-section">';
            if ($mk_options['enable_blog_single_comments'] == 'true'):
                if (get_post_meta($post->ID, '_disable_comments', true) != 'false') {
                    ob_start();
                    comments_number('0', '1', '%');
                    $output .= '<a href="' . get_permalink() . '#comments" class="blog-magazine-comment"><i class="mk-moon-bubble-9"></i><span>' . ob_get_contents() . '</span></a>';
                    ob_get_clean();
                }
            endif;

            if (function_exists('mk_love_this')) {
                ob_start();
                mk_love_this();
                $output .= '<div class="mk-love-holder">' . ob_get_contents() . '</div>';
                ob_get_clean();
            }

            $output .= '</div>';
        }
        
        $output .= '</div>';
        $output .= '</article>' . "\n\n\n";

   }
   else{
      $image_width  = 200;
      $image_height = 200;
      $output .= '<article id="' . get_the_ID() . '" class="mk-blog-magazine-item magazine-thumb-post"><div class="blog-item-holder">';

      $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
      $image_src       = bfi_thumb($image_src_array[0], array(
          'width' => $image_width,
          'height' => $image_height,
          'crop' => true
      ));
      if (has_post_thumbnail()) {
          $output .= '<div class="featured-image"><a title="' . get_the_title() . '" href="' . get_permalink() . '">';
          $output .= '<img alt="' . get_the_title() . '" width="' . $image_width . '" class="item-featured-image" height="' . $image_height . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_src, $image_width, $image_height). '" itemprop="image" />';
          $output .= '</a></div>';
      }
        
      $output .= '<div class="item-wrapper">';  
      $output .= '  <h3 class="the-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
      $output .= '<div class="mk-blog-meta">';
      $output .= '  <time datetime="' . get_the_date() . '" itemprop="datePublished" pubdate>';
      $output .= '    <a href="' . get_month_link(get_the_time("Y"), get_the_time("m")) . '">' . get_the_date() . '&nbsp;</a>';
      $output .= '  </time>';
      $output .= '<span class="mk-categories">' . get_the_category_list(', ') . '</span>';
      $output .= '</div>';
      $output .= '</div>';

      $output .= '<div class="clearboth"></div>';

      $output .= '</article>';
   }

   return $output;
}
?>
