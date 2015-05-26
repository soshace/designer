<?php
extract(shortcode_atts(array(
     'style' => 'classic',
     'column' => 3,
     'disable_meta' => 'true',
     'full_content' => 'false',
     'disable_lightbox' => 'true',
     'grid_image_height' => 350,
     'count' => 8,
     'offset' => 0,
     'cat' => '',
     'posts' => '',
     'author' => '',
     'disable_comments_share' => '',
     'pagination' => 'true',
     'pagination_style' => '2',
     'image_size' => 'crop',
     'orderby' => 'date',
     'order' => 'DESC',
     'excerpt_length' => 200,
     'image_quality' => 1,
     'thumbnail_align' => '',
     'magazine_strcutre' => '',
     'el_class' => '',
     'item_id' => '',
     'transparent_border' => 'false',
), $atts));
global $mk_options;

require_once(THEME_FUNCTIONS . "/bfi_cropping.php");

$noborder = '';

if($transparent_border == 'true' && $style == "grid") {
     $noborder = 'no-border';
}

$item_id = (!empty($item_id)) ? $item_id : 1409305847;
$query = array(
     'posts_per_page' => (int) $count,
     'post_type' => 'post',
     'suppress_filters' => 0
);
if ($cat) {
     $query['cat'] = $cat;
}
if ($author) {
     $query['author'] = $author;
}
if ($posts) {
     $query['post__in'] = explode(',', $posts);
}
if ($orderby) {
     $query['orderby'] = $orderby;
}
if ($order) {
     $query['order'] = $order;
}
$paged          = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);


if ($offset && ($pagination_style != 2 || $pagination_style != 3)) {
    $query['offset'] = $offset;
}

$query['paged'] = $paged;
$r              = new WP_Query($query);
if (is_page()) {
     global $post;
     $layout = get_post_meta($post->ID, '_layout', true);
} else if (is_search()) {
     $layout = $mk_options['search_page_layout'];
} else if (is_archive()) {
     $layout = $mk_options['archive_page_layout'];
} else {
     $layout = 'right';
}
$grid_width    = $mk_options['grid_width'];
$content_width = $mk_options['content_width'];
$atts          = array(
     'layout' => $layout,
     'column' => $column,
     'grid_image_height' => $grid_image_height,
     'disable_meta' => $disable_meta,
     'disable_comments_share' => $disable_comments_share,
     'disable_lightbox' => $disable_lightbox,
     'grid_width' => $grid_width,
     'content_width' => $content_width,
     'full_content' => $full_content,
     'image_size' => $image_size,
     'excerpt_length' => $excerpt_length,
     'thumbnail_align' => $thumbnail_align,
     'image_quality' => $image_quality,
     'item_id' => $item_id
);
$output        = '';
if ($pagination_style == '2') {
     $paginaton_style_class = 'load-button-style';
} else if ($pagination_style == '3') {
     $paginaton_style_class = 'scroll-load-style';
} else {
     $paginaton_style_class = 'page-nav-style';
}

if($style != 'magazine') {
     $loop_wrapper = 'loop-main-wrapper';
} else {
     $loop_wrapper = 'none-isotop-loop';
}

switch ($magazine_strcutre) {
     case 1:
          $magazine_style_class = 'mag-one-column';
          break;
     case 2:
          $magazine_style_class = 'mag-two-column-left';
          break;
     case 3:
          $magazine_style_class = 'mag-two-column-right';
          break;         
     
     default:
          $magazine_style_class = 'mag-one-column';
          break;
}

$output .= '<div class="'.$loop_wrapper.'"><section data-style="' . $style . '" data-uniqid="'.$item_id.'" class="mk-blog-container mk-theme-loop mk-' . $style . '-wrapper '.$magazine_style_class.' ' . $paginaton_style_class . ' ' . $el_class . ' '.$noborder.'" >' . "\n";

$i = 0;
if (is_archive()):
     if (have_posts()):
          while (have_posts()):
               the_post();
               $i++;
               switch ($style) {
                    case 'classic':
                         $output .= blog_classic_style($atts, 1);
                         break;
                    case 'newspaper':
                         $output .= blog_newspaper_style($atts, 1);
                         break;
                    case 'grid':
                         $output .= blog_grid_style($atts, 1);
                         break;
                    case 'modern':
                         $output .= blog_modern_style($atts, 1);
                         break;
                    case 'spotlight':
                         $output .= blog_spotlight_style($atts, 1);
                         break;
                    case 'thumbnail':
                         $output .= blog_thumbnail_style($atts, 1);
                         break;
                    case 'magazine':
                         $output .= blog_magazine_style($atts, $i);
                         break;
                    default:
                         $output .= blog_grid_style($atts, 1);
               }
          endwhile;
     endif;
else:
     if ($r->have_posts()):
          while ($r->have_posts()):
               $r->the_post();
               $i++;
               switch ($style) {
                    case 'classic':
                         $output .= blog_classic_style($atts, 1);
                         break;
                    case 'newspaper':
                         $output .= blog_newspaper_style($atts, 1);
                         break;
                    case 'grid':
                         $output .= blog_grid_style($atts, 1);
                         break;
                    case 'modern':
                         $output .= blog_modern_style($atts, 1);
                         break;
                    case 'spotlight':
                         $output .= blog_spotlight_style($atts, 1);
                         break;
                    case 'thumbnail':
                         $output .= blog_thumbnail_style($atts, 1);
                         break;
                    case 'magazine':
                         $output .= blog_magazine_style($atts, $i);
                         break;
                    default:
                         $output .= blog_grid_style($atts, 1);
               }
          endwhile;
     endif;
endif;
$output .= '</section>' . "\n\n";
$output .= '<div class="mk-preloader"></div>';
if($style != 'magazine') {
     $output .= '<a class="mk-loadmore-button '.$paginaton_style_class.'-btn" style="display:none;" href="#"><i class="mk-moon-loop-4"></i><i class="mk-moon-arrow-down-4"></i>' . __('Load More', 'mk_framework') . '</a>';
     if ($pagination == 'true') {
          ob_start();
          mk_theme_blog_pagenavi('', '', $r, $paged);
          $output .= ob_get_clean();
     }
}
$output .= '</div>';
wp_reset_postdata();
echo $output;
