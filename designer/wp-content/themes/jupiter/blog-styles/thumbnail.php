<?php
function blog_thumbnail_style($atts, $current)
{
    global $post, $mk_options;
    extract($atts);
    $image_height = $grid_image_height;

    if ($thumbnail_align == 'left'){
        $align_class = ' content-align-right';
    }else{
        $align_class = ' content-align-left';
    }

    if ($layout == 'full') {
        $image_width = $grid_width - 40;
    } else {
        $image_width = (($content_width / 100) * $grid_width) - 40;
    }
    $output          = $has_image = '';
    $post_type       = get_post_meta($post->ID, '_single_post_type', true);

    /*
     * Image Width : 600px
     * Image Height : 460px
    */

    $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
    $image_output_src = bfi_thumb($image_src_array[0], array(
        'width' => '600',
        'height' => '460'
    ));

    if ($post_type == '') {
        $post_type = 'image';
    }

    $output .= '<article id="' . get_the_ID() . '" class="mk-blog-thumbnail-item thumbnail-'.$item_id.' mk-isotop-item ' . $post_type . '-post-type'.$align_class.'">' . "\n";

    if (has_post_thumbnail()) {
        $output .= '<div class="featured-image" ><a href="' . get_permalink() . '" title="' . get_the_title() . '">';
        $output .= '    <img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_output_src, 600, 460) . '" itemprop="image" />';
        $output .= '    <div class="image-hover-overlay"></div>';
        $output .= '    <div class="post-type-badge" href="' . get_permalink() . '"><i class="mk-li-' . $post_type . '"></i></div>';
        $output .= '</a></div>';
    }

    $output .= '<div class="mk-thumbnail-content-container">';
    $output .= '    <div class="mk-blog-meta">';
    $output .= '        <div class="mk-blog-author">';
                            ob_start();
                            the_author_posts_link();
    $output .=              ob_get_contents() . '</div>';
                            ob_get_clean();
    $output .= '        <span class="mk-categories"> / ' . __('', 'mk_framework') . ' ' . get_the_category_list(', ') . ' </span> /
                        <time datetime="' . get_the_date() . '">
                            <a href="' . get_month_link(get_the_time("Y"), get_the_time("m")) . '">' . get_the_date() . '</a>
                        </time>';
    $output .= '        <h3 class="the-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
    if($excerpt_length != 0) {
                        ob_start();
                        the_excerpt_max_charlength($excerpt_length);
                        $output .= '<div class="the-excerpt"><p>' . ob_get_clean() . '</p></div>';
    }
    $output .= '        <div class="mk-teader-button">'.
                            do_shortcode( '[mk_button dimension="outline" corner_style="pointed" outline_skin="custom" outline_active_color="#000000" outline_hover_color="#fff" margin_bottom="0" size="medium" align="left" url="'.get_permalink().'"]'.__('READ MORE', 'mk_framework').'[/mk_button]' ).'
                            </div>';
    $output .= '        </div>';
    $output .= '    </div>';

    $output .= '<div class="clearboth"></div>';
    $output .= '</article>' . "\n\n\n";
    return $output;
}
