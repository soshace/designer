<?php

add_action('wp_ajax_nopriv_mk_ajax_portfolio', 'mk_ajax_portfolio');
add_action('wp_ajax_mk_ajax_portfolio', 'mk_ajax_portfolio');
function mk_ajax_portfolio()
{
    if (isset($_POST['id']) && !empty($_POST['id'])):
        $output = get_ajax_portfolio_item($_POST['id']);
        die($output);
    else:
        die(0);
    endif;
}
function get_ajax_portfolio_item($id = false)
{
    require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
    $ajax_image_width = 1140;
    $query       = array();
    global $wp_embed, $mk_options;
    if (empty($id))
        return false;
    $query = array(
        'post_type' => 'portfolio',
        'p' => $id,
        'suppress_filters' => 0
    );
    $r     = new WP_Query($query);
    $html  = '';
    if ($r->have_posts()):
        while ($r->have_posts()):
            $r->the_post();
            $the_id                = get_the_ID();
            $size                  = 'full';
            $current_post['title'] = get_the_title();
            
            $ajax_content = get_post_meta($the_id, '_ajax_content', true);
            $main_content = get_the_content();
            
            $the_content = (!empty($ajax_content)) ? $ajax_content : $main_content;
            
            $image_height = $mk_options['Portfolio_single_image_height'];
            $post_type    = get_post_meta($the_id, '_single_post_type', true);
            if ($post_type == '') {
                $post_type = 'image';
            }
            if ($post_type == 'image') {
                $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                $image_src       = bfi_thumb($image_src_array[0], array(
                    'width' => $ajax_image_width,
                    'height' => $image_height
                ));
            }
            if(preg_match('/vc_row fullwidth="true"/', $the_content) || preg_match('/mk_page_section/', $the_content)) {
                $content = do_shortcode('[mk_message_box type="warning-message"]Page Section or Fullwidth Rows are used in this single post. Either remove page sections and disable fullwidth feature of Rows or use Ajax Content metabox field (without mentioned shortcodes and options).[/mk_message_box]');    
            } else {
                $content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $the_content));    
            }
            
            $html    = "<div id='ajax_project_{$the_id}' class='ajax_project' data-project_id='{$the_id}'>";
            
            /* Social Share icons */
            if ($mk_options['single_portfolio_social'] == 'true'):
                $html .= '<div class="single-social-section portfolio-social-share ajax-portfolio-share">';
                if (function_exists('mk_love_this')) {
                    ob_start();
                    mk_love_this();
                    $html .= '<div class="mk-love-holder">' . ob_get_contents() . '</div>';
                    ob_get_clean();
                }
                $html .= '<div class="blog-share-container">';
                $html .= '<div class="blog-single-share mk-toggle-trigger"><i class="mk-moon-share-2"></i></div>';
                $html .= '<ul class="single-share-box mk-box-to-trigger">';
                $html .= '<li><a class="facebook-share" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>';
                $html .= '<li><a class="twitter-share" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-moon-twitter"></i></a></li>';
                $html .= '<li><a class="googleplus-share" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>';
                $html .= '<li><a class="linkedin-share" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>';
                if ($post_type == 'image') {
                    $html .= '<li><a class="pinterest-share" data-image="' . $image_src_array[0] . '" data-title="' . get_the_title() . '" data-url="' . get_permalink() . '" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>';
                }
                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';
            endif;
            
            
            
            $html .= "<div class='project_description'>";
            $html .= "<h2 class='title'>" . get_the_title($the_id) . "</h2>";
            $featured_image = get_post_meta($the_id, '_portfolio_featured_image', true) ? get_post_meta($the_id, '_portfolio_featured_image', true) : 'true';
            if ($featured_image != 'false') {
                if ($post_type == 'image') {
                    $html .= '<div class="single-featured-image">';
                    $html .= '<a class="mk-lightbox portfolio-modern-lightbox" data-fancybox-group="portfolio-ajax-image" title="' . get_the_title() . '" href="' . $image_src_array[0] . '"><img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . $image_src . '" /></a>';
                    $html .= '</div>';
                } elseif ($post_type == 'video') {
                    $video_id   = get_post_meta($the_id, '_single_video_id', true);
                    $video_site = get_post_meta($the_id, '_single_video_site', true);
                    if ($video_site == 'vimeo') {
                        $html .= '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http' . ((is_ssl()) ? 's' : '') . '://player.vimeo.com/video/' . $video_id . '?title=0&amp;byline=0&amp;portrait=0&amp;" width="' . $ajax_image_width . '" height="' . $image_height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
                    }
                    if ($video_site == 'youtube') {
                        $html .= '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http' . ((is_ssl()) ? 's' : '') . '://www.youtube.com/embed/' . $video_id . '?showinfo=0" frameborder="0" width="' . $ajax_image_width . '" height="' . $image_height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
                    }
                    if ($video_site == 'dailymotion') {
                        $html .= '<div  class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http' . ((is_ssl()) ? 's' : '') . '://www.dailymotion.com/embed/video/' . $video_id . '?logo=0" frameborder="0" width="' . $ajax_image_width . '" height="' . $image_height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
                    }
                }
            }
            $html .= $content;
            $html .= "</div>";
            $html .= "</div>";
        endwhile;
    endif;
    wp_reset_query();
    if ($html)
        return $html;
}
