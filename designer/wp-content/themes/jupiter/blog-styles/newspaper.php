<?php
function blog_newspaper_style($atts, $current)
{
    global $post;
    extract($atts);
    global $mk_options;
    $image_height = $grid_image_height;
    switch ($column) {
        case 1:
            if ($layout == 'full') {
                $image_width = round($grid_width - 66);
            } else {
                $image_width = round((($content_width / 100) * $grid_width) - 66);
            }
            $mk_column_css = 'one-column';
            break;
        case 2:
            if ($layout == 'full') {
                $image_width = round($grid_width / 2 - 46);
            } else {
                $image_width = round((($content_width / 100) * $grid_width) / 2 - 46);
            }
            $mk_column_css = 'two-column';
            break;
        case 3:
            $image_width   = $grid_width / 3 - 44;
            $mk_column_css = 'three-column';
            break;
        case 4:
            $image_width   = $grid_width / 4 - 36;
            $mk_column_css = 'four-column';
            break;
        default:
            $image_width   = $grid_width / 3 - 42;
            $mk_column_css = 'three-column';
            break;
    }
    $output          = $has_image = '';
    $post_type       = get_post_meta($post->ID, '_single_post_type', true);


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

    $lightbox_full_size = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);



    if ($post_type == '') {
        $post_type = 'image';
    }
    $output .= '<article id="' . get_the_ID() . '" class="mk-blog-newspaper-item newspaper-'.$item_id.' mk-isotop-item ' . $mk_column_css . '"><div class="blog-item-holder">';
    if ($post_type == 'image' || $post_type == '') {
        if (has_post_thumbnail()) {
            $show_lightbox = get_post_meta($post->ID, '_disable_post_lightbox', true);
            if (($show_lightbox == 'true' || $show_lightbox == '') && $disable_lightbox == 'true') {
                $lightbox_code = ' class="mk-lightbox blog-newspaper-lightbox" data-fancybox-group="blog-newspaper" href="' . $lightbox_full_size[0] . '"';
            } else {
                $lightbox_code = ' href="' . get_permalink() . '"';
            }
            $output .= '<div class="featured-image"><a title="' . get_the_title() . '"' . $lightbox_code . '>';
            $output .= '<img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_output_src, $image_width, $image_height) . '" itemprop="image" />';
            $output .= '<div class="image-hover-overlay"></div>';
            $output .= '<div class="post-type-badge" href="' . get_permalink() . '"><i class="mk-li-' . $post_type . '"></i></div>';
            $output .= '</a></div>';
        }
    }
    if ($post_type == 'portfolio') {

            $featured_image_id = get_post_thumbnail_id();
            $attachment_ids = get_post_meta($post->ID, '_gallery_images', true);

            if(!empty($attachment_ids)) {
                   if(!empty($featured_image_id)) {
                        $final_attachment_ids = $featured_image_id . ',' .  $attachment_ids;
                   } else {
                        $final_attachment_ids = $attachment_ids;
                   }

                   $output .= '<div class="blog-gallery-type">';
                    $output .= do_shortcode('[mk_swipe_slideshow images="' . $final_attachment_ids . '" image_width="' . $image_width . '" image_height="' . $image_height . '"]');
                    $output .= '</div>';

            } else {
                $show_lightbox = get_post_meta($post->ID, '_disable_post_lightbox', true);
                if (($show_lightbox == 'true' || $show_lightbox == '') && $disable_lightbox == 'true') {
                    $lightbox_code = ' class="mk-lightbox blog-modern-lightbox" data-fancybox-group="blog-modern" href="' . $lightbox_full_size[0] . '"';
                } else {
                    $lightbox_code = ' href="' . get_permalink() . '"';
                }
                $output .= '<div class="featured-image"><a title="' . get_the_title() . '"' . $lightbox_code . '>';

                $output .= '<img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_output_src, $image_width, $image_height) . '" itemprop="image" />';

                $output .= '<div class="image-hover-overlay"></div>';
                $output .= '<div class="post-type-badge" href="' . get_permalink() . '"><i class="mk-li-' . $post_type . '"></i></div>';
                $output .= '</a></div>';
            }

    }
    if ($post_type == 'video') {
        $video_id   = get_post_meta($post->ID, '_single_video_id', true);
        $video_site = get_post_meta($post->ID, '_single_video_site', true);
        $output .= '<div class="featured-image">';
        if ($video_site == 'vimeo') {
            $output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://player.vimeo.com/video/' . $video_id . '?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
        }
        if ($video_site == 'youtube') {
            $output .= '<div class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.youtube.com/embed/' . $video_id . '?showinfo=0&amp;theme=light&amp;color=white&amp;rel=0&amp;html5=1" frameborder="0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
        }
        if ($video_site == 'dailymotion') {
            $output .= '<div style="width:' . $image_width . 'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.dailymotion.com/embed/video/' . $video_id . '?logo=0" frameborder="0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
        }
        $output .= '</div>';
    }
    if ($post_type == 'audio') {
        $iframe = get_post_meta($post->ID, '_audio_iframe', true);

        if (empty($iframe)) {
            $mp3_file     = get_post_meta($post->ID, '_mp3_file', true);
            $ogg_file     = get_post_meta($post->ID, '_ogg_file', true);
            $audio_author = get_post_meta($post->ID, '_single_audio_author', true);
            $remove_thumb = $column == 4 ? "true" : 'false';
            $output .= do_shortcode('[mk_audio mp3_file="'.$mp3_file.'" large_player_class="" remove_thumb="'.$remove_thumb.'" ogg_file="'.$ogg_file.'" thumb="'.$image_src_array[ 0 ].'" img_dimension="100"]');
        } else {
            $output .= '<div class="audio-iframe">' . $iframe . '</div>';
        }
    }
    $output .= '<div class="mk-blog-meta">';
    $output .= '<h3 class="the-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
    $output .= '<time datetime="' . get_the_date() . '">';
    $output .= '<a href="' . get_month_link(get_the_time("Y"), get_the_time("m")) . '">' . get_the_date() . '</a>';
    $output .= '</time>';
    if ($full_content == 'true') {
        $content = str_replace(']]>', ']]&gt;', apply_filters('the_content', get_the_content()));
        $output .= '<div class="the-excerpt"><p>' . $content . '</p></div>';
    } else {
        if($excerpt_length != 0) {
            ob_start();
            the_excerpt_max_charlength($excerpt_length);
            $output .= '<div class="the-excerpt"><p>' . ob_get_clean() . '</p></div>';
        }
    }
    $output .= '</div>';
    if ($disable_comments_share != 'false') {
        $output .= '<div class="newspaper-item-footer"><div class="newspaper-item-footer-holder">';
        $output .= '<a class="mk-readmore" href="' . get_permalink() . '"><i class="mk-moon-arrow-right-2"></i>' . __('Read More', 'mk_framework') . '</a>';
        if (function_exists('mk_love_this')) {
            ob_start();
            mk_love_this();
            $output .= '<div class="mk-love-holder newspapre-footer-icons">' . ob_get_clean() . '</div>';
        }
        if ($mk_options['enable_blog_single_comments'] == 'true'):
            if (get_post_meta($post->ID, '_disable_comments', true) != 'false') {
                ob_start();
                comments_number(__('0', 'mk_framework'), __('1', 'mk_framework'), __('%', 'mk_framework'));
                $output .= '<span class="newspaper-item-comment newspapre-footer-icons"><i class="mk-moon-bubble-9"></i> ' . ob_get_clean() . '</span>';
            }
        endif;

        if ($mk_options['single_blog_social'] == 'true'):
            $output .= '<span class="newspaper-item-share newspapre-footer-icons"><i class="mk-moon-share-2"></i></span>';
        endif;
        $output .= '<div class="clearboth"></div></div>';
        if ($mk_options['enable_blog_single_comments'] == 'true'):
            if (get_post_meta($post->ID, '_disable_comments', true) != 'false') {
                $c_args   = array(
                    'number' => '4',
                    'status' => 'approve',
                    'post_id' => $post->ID
                );
                $comments = get_comments($c_args);
                $output .= '<ul class="newspaper-comments-list">';
                foreach ($comments as $comment):
                    $output .= '<li>';
                    $output .= get_avatar($comment->comment_author_email, 35);
                    if (!empty($comment->comment_author_url)) {
                        $output .= '<span class="comment-author"><a href="' . $comment->comment_author_url . '">' . $comment->comment_author . '</a></span>';
                    } else {
                        $output .= '<span class="comment-author">' . $comment->comment_author . '</span>';
                    }
                    $stripped_comment = strip_tags($comment->comment_content);
                    $output .= '<span class="comment-content">' . substr($stripped_comment, 0, 45) . '...</span>';
                    $output .= '<div class="clearboth"></div></li>';
                endforeach;
                $output .= '</ul>';
            }
        endif;

        if ($mk_options['single_blog_social'] == 'true'):
            $output .= '<ul class="newspaper-social-share">';
            $output .= '<li><a class="facebook-share" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>';
            $output .= '<li><a class="twitter-share" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-moon-twitter"></i></a></li>';
            $output .= '<li><a class="googleplus-share" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>';
            $output .= '<li><a class="pinterest-share" data-image="' . $lightbox_full_size[0] . '" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>';
            $output .= '<li><a class="linkedin-share" data-desc="' . strip_tags(get_the_excerpt()) . '" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>';
            $output .= '</ul>';
        endif;
        $output .= '</div>';
    }
    $output .= '</div></article>' . "\n\n\n";
    return $output;
}
