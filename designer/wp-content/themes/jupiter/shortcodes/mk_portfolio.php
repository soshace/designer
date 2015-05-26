<?php
extract(shortcode_atts(array(
     'style' => 'classic',
     'column' => 3,
     'count' => 10,
     'disable_excerpt' => 'true',
     'disable_permalink' => 'true',
     'disable_zoom_link' => 'true',
     "sortable" => 'true',
     'sortable_align' => 'left',
     'pagination' => 'true',
     'meta_type' => 'category',
     'pagination_style' => '1',
     'height' => '',
     'cat' => '', // Deprecated
     'categories' => '',
     'author' => '',
     'posts' => '',
     'offset' => 0,
     'order' => 'DESC',
     'orderby' => 'date',
     'ajax' => 'true',
     'target' => '_self',
     'hover_scenarios' => 'fadebox',
     'grid_spacing' => 4,
     'el_class' => '',
     'image_quality' => 1,
     'image_size' => 'crop',
     'sortable_style' => 'classic',
     'sortable_bg_color' => '#1a1a1a',
     'sortable_txt_color' => '#cccccc',
     'item_id' => '',
), $atts));

require_once(THEME_FUNCTIONS . "/bfi_cropping.php");

$cat = !empty($categories) ? $categories : $cat;

$item_id = (!empty($item_id)) ? $item_id : 1409305847;

$style = ($style == 'modern') ? 'grid' : $style;

global $mk_options;
$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
$query = array(
     'post_type' => 'portfolio',
     'posts_per_page' => (int) $count,
     'paged' => $paged,
     'suppress_filters' => false
);
if ($offset) {
     $query['offset'] = $offset;
}
if ($cat != '') {
     $query['tax_query'] = array(
          array(
               'taxonomy' => 'portfolio_category',
               'field' => 'slug',
               'terms' => explode(',', $cat)
          )
     );
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
if ($author) {
     $query['author'] = $author;
}
$r = new WP_Query($query);
if (is_page()) {
     global $post;
     $layout = get_post_meta($post->ID, '_layout', true);
} else if (is_search()) {
     $layout = $mk_options['search_page_layout'];
} else if (is_archive()) {
     $layout = $mk_options['archive_page_layout'];
}
$atts = array(
     'column' => $column,
     'ajax' => $ajax,
     'layout' => $layout,
     'height' => $height,
     'disable_excerpt' => $disable_excerpt,
     'pagination' => $pagination,
     'target' => $target,
     'meta_type' => $meta_type,
     'disable_permalink' => $disable_permalink,
     'disable_zoom_link' => $disable_zoom_link,
     'grid_spacing' => $grid_spacing,
     'hover_scenarios' => $hover_scenarios,
     'image_quality' => $image_quality,
     'image_size' => $image_size,
     'item_id' => $item_id
);
$paginaton_style_class = '';
if ($pagination_style == '2') {
     $paginaton_style_class = 'load-button-style';
} else if ($pagination_style == '3') {
     $paginaton_style_class = 'scroll-load-style';
} else {
     $paginaton_style_class = 'page-nav-style';
}
$ajax_state_class = $output = '';
if (($style == 'grid' || $style == 'masonry') && $ajax == 'true') {
     $ajax_state_class = 'portfolio-ajax-enabled';
}
$sortable_margin = ($style == 'grid' || $style == 'masonry') ? (' style="margin-bottom:'.$grid_spacing.'px"') : '';

$output .= '<div class="portfolio-grid ' . $ajax_state_class . '">';
$id = uniqid();
if ($sortable == 'true' && !is_archive()) {
     $output .= '<header class="sortable-'.$sortable_style.'-style portfolio-fiter-' . $style . ' sortable-id-' . $id . '" id="mk-filter-portfolio"'.$sortable_margin.'><div class="mk-grid"><ul class="align-'.$sortable_align.'">';
     $terms = array();
     if ($cat != '') {
          foreach (explode(',', $cat) as $term_slug) {
               $terms[] = get_term_by('slug', $term_slug, 'portfolio_category');
          }
     } else {
          $terms = get_terms('portfolio_category', 'hide_empty=1&suppress_filters=0');
          /*
          In order to order category filter by Ascending or Descending change above line as below :
          
          Descending Order : $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=DESC' );
          
          Ascending Order : $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=ASC' );
          
          Alternatively you can order them by :
          
          * orderby 
          - id
          - count
          - name - Default
          - slug
          - none
          You will need to add this param as below example :
          
          Order by count and ascending :  $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=ASC&orderby=count' );
          
          */
     }
     $output .= '<li><a class="current" data-filter="*" href="#">' . __('All', 'mk_framework') . '</a></li>';
     foreach ($terms as $term) {
               $output .= '<li><a data-filter=".' . $term->slug . '" href="#">' . $term->name . '</a></li>';
     }
     $output .= '<div class="clearboth"></div></ul>';
     $output .= '<div class="clearboth"></div></div></header>';
}
if ($style == 'grid' || $style == 'masonry' && $ajax == 'true') {
     wp_enqueue_script('transit', THEME_JS . '/jquerytransit.js', array(
          'jquery'
     ), '0.9.9');
     $output .= '<div class="portfolio-loader"><div><div class="mk-preloader"></div></div></div>';
     if($layout == 'full') {
          $output .= '<div class="ajax-container mk-grid">';
     } else {
          $output .= '<div class="ajax-container">';
     }
     $output .= '<div class="ajax-controls">';
     $output .= '<a href="#" class="close-ajax"><i class="mk-moon-close-2"></i></a>';
     $output .= '<a href="#" class="next-ajax"><i class="mk-jupiter-icon-arrow-right"></i></a>';
     $output .= '<a href="#" class="prev-ajax"><i class="mk-jupiter-icon-arrow-left"></i></a>';
     $output .= '</div></div>';
}
$output .= '<div class="loop-main-wrapper"><section data-style="' . $style . '" data-uniqid="'.$item_id.'" id="mk-portfolio-loop-' . $id . '" class="mk-portfolio-container mk-theme-loop mk-portfolio-' . $style . ' ' . $paginaton_style_class . ' '.$el_class.'" >' . "\n";
if (is_archive()):
     if (have_posts()):
          while (have_posts()):
               the_post();
               switch ($style) {
                    case 'classic':
                         $output .= mk_portfolio_classic_loop($r, $atts);
                         break;
                    case 'grid':
                         $output .= mk_portfolio_grid_loop($r, $atts);
                         break;
                    case 'masonry':
                         $output .= mk_portfolio_masonry_loop($r, $atts);
                         break;
                         $output .= mk_portfolio_classic_loop($r, $atts);
               }
          endwhile;
     endif;
else:
     if ($r->have_posts()):
          while ($r->have_posts()):
               $r->the_post();
               switch ($style) {
                    case 'classic':
                         $output .= mk_portfolio_classic_loop($r, $atts);
                         break;
                    case 'modern':
                         $output .= mk_portfolio_modern_loop($r, $atts);
                         break;
                    case 'grid':
                         $output .= mk_portfolio_grid_loop($r, $atts);
                         break;
                    case 'masonry':
                         $output .= mk_portfolio_masonry_loop($r, $atts);
                         break;                                           
                         $output .= mk_portfolio_classic_loop($r, $atts);
               }
          endwhile;
     endif;
endif;
$output .= '</section><div class="clearboth"></div>' . "\n\n";
$output .= '<a class="mk-loadmore-button '.$paginaton_style_class.'-btn" style="display:none;" href="#"><i class="mk-moon-loop-4"></i><i class="mk-moon-arrow-down-4"></i>' . __('Load More', 'mk_framework') . '</a>';
if ($pagination == 'true') {
     ob_start();
     mk_theme_blog_pagenavi('', '', $r, $paged);
     $output .= ob_get_clean();
}
if (($style == 'grid' || $style == 'masonry') && $ajax != 'true') {
     $output .= '<div class="mk-preloader"></div>';
} else if($style == 'classic') {
     $output .= '<div class="mk-preloader"></div>';
}
$output .= '</div>';
$output .= '</div>';


// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= "
.sortable-id-{$id}.sortable-outline-style {
     background-color:{$sortable_bg_color};
}

.sortable-id-{$id}.sortable-outline-style a {
     color:{$sortable_txt_color};
}

.sortable-id-{$id}.sortable-outline-style a.current {
     border-color:{$sortable_txt_color} !important;
}";

wp_reset_postdata();
echo $output;


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);
