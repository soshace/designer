<?php
function blog_spotlight_style($atts, $current)
{
    global $post, $mk_options;
    extract($atts);
    $image_height = $grid_image_height;
    $output          = $has_image = '';
    $post_type       = get_post_meta($post->ID, '_single_post_type', true);

    switch ($column) {
        case 1:
            if ($layout == 'full') {
                $image_width = round($grid_width);
            } else {
                $image_width = round((($content_width / 100) * $grid_width));
            }
            $mk_column_css = 'one-column';
            break;
        case 2:
            if ($layout == 'full') {
                $image_width = round($grid_width / 2);
            } else {
                $image_width = round((($content_width / 100) * $grid_width) / 2);
            }
            $mk_column_css = 'two-column';
            break;
        case 3:
            $image_width   = $grid_width / 3;
            $mk_column_css = 'three-column';
            break;
        case 4:
            $image_width   = $grid_width / 4;
            $mk_column_css = 'four-column';
            break;
        default:
            $image_width   = $grid_width / 3;
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
     if (has_post_thumbnail()) {
            $output .= '<article id="' . get_the_ID() . '" class="mk-blog-spotlight-item spotlight-'.$item_id.' mk-isotop-item '.$mk_column_css.' ' . $post_type . '-post-type">' . "\n";

           

                $output .= '<div class="featured-image"><a title="' . get_the_title() . '">';
                $output .= '    <img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . mk_thumbnail_image_gen($image_output_src, $image_width, $image_height) . '" itemprop="image" /></a>';
                $output .= '    <div class="image-hover-overlay"></div>';
                $output .= '    <div class="mk-spotlight-content-container">';
                $output .= '        <div class="mk-blog-meta">
                                        <time datetime="' . get_the_date() . '">
                                            <a href="' . get_month_link(get_the_time("Y"), get_the_time("m")) . '">' . get_the_date() . '</a>
                                        </time>';
                $output .= '            <h3 class="the-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
                $output .=                do_shortcode( '[mk_button dimension="outline" corner_style="pointed" outline_skin="light" text_color="light" size="medium" align="center" url="'.get_permalink().'"]'.__('READ MORE', 'mk_framework').'[/mk_button]' );
                $output .= '        </div>';
                $output .= '    </div>';
                $output .= '</div>';
           

            $output .= '<div class="clearboth"></div>';
            $output .= '</article>' . "\n\n\n";
     }
    return $output;
}
