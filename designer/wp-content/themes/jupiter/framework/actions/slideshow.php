<?php
/**
 * Add_action hooks for Theme Slideshows
 *
 * @author  Bob Ulusoy
 * @copyright Copyright (c) Bob Ulusoy
 * @link  http://artbees.net
 * @since  Version 3.5
 * @package  MK Framework
 */
add_action('theme_slideshow', 'mk_theme_slideshow');
add_action('theme_layerslider', 'mk_theme_layerslider');
add_action('theme_revslider', 'mk_theme_revslider');
add_action('theme_flexslider', 'mk_theme_flexslider');
add_action('theme_icarousel', 'mk_theme_icarousel');
add_action('theme_banner_builder', 'mk_theme_banner_builder');
add_action('theme_edge_slider', 'mk_theme_edge_slider');
/**
 */
if (!function_exists('mk_theme_slideshow'))
    {
    function mk_theme_slideshow($post_id = NULL)
        {
        $disable_slideshow = get_post_meta($post_id, '_enable_slidehsow', true);
        $slideshow_type    = get_post_meta($post_id, '_slideshow_source', true);
        wp_enqueue_script('transit', THEME_JS . '/jquerytransit.js', array(
            'jquery'
        ), '0.9.9');
        if ($disable_slideshow != 'true')
            {
            return false;
            }
        switch ($slideshow_type)
        {
            case 'layerslider':
                do_action('theme_layerslider', $post_id);
                break;
            case 'revslider':
                do_action('theme_revslider', $post_id);
                break;
            case 'flexslider':
                do_action('theme_flexslider', $post_id);
                break;
            case 'icarousel':
                do_action('theme_icarousel', $post_id);
                break;
            case 'banner_builder':
                do_action('theme_banner_builder', $post_id);
                break;
            case 'edge':
                do_action('theme_edge_slider', $post_id);
        }
        }
    }
/**
 */
if (!function_exists('mk_theme_layerslider'))
    {
    function mk_theme_layerslider($post_id = NULL)
        {
        $source = get_post_meta($post_id, '_layer_slider_source', true);
        if (!empty($source))
            {
            echo do_shortcode('[layerslider id="' . $source . '"]');
            }
        }
    }
/**
 */
if (!function_exists('mk_theme_revslider'))
    {
    function mk_theme_revslider($post_id = NULL)
        {
        $source = get_post_meta($post_id, '_rev_slider_source', true);
        if (!empty($source))
            {
            echo '<div class="mk_rev_slider_wrapper">' . do_shortcode('[rev_slider ' . $source . ']') . '<div class="clearboth"></div></div>';
            }
        }
    }
/**
 */
if (!function_exists('mk_theme_flexslider_items'))
    {
    function mk_theme_flexslider_items($size = array(1920, 460), $post_id)
        {
        global $post;
        $number   = get_post_meta($post_id, '_flexslider_count', true);
        $order    = get_post_meta($post_id, '_flexslider_order', true);
        $orderby  = get_post_meta($post_id, '_flexslider_orderby', true);
        $posts_in = get_post_meta($post_id, '_flexslider_items', true);
        $query    = array(
            'post_type' => 'slideshow'
        );
        if ($number)
            {
            $query['showposts'] = $number;
            }
        if ($order)
            {
            $query['order'] = $order;
            }
        if ($orderby)
            {
            $query['orderby'] = $orderby;
            }
        if ($posts_in)
            {
            $query['post__in'] = $posts_in;
            }
        $loop   = new WP_Query($query);
        $images = array();
        while ($loop->have_posts()):
            $loop->the_post();
            $link_to = get_post_meta(get_the_ID(), '_link_to', true);
            $link    = '';
            if (!empty($link_to))
                {
                $link_array = explode('||', $link_to);
                switch ($link_array[0])
                {
                    case 'page':
                        $link = get_page_link($link_array[1]);
                        break;
                    case 'cat':
                        $link = get_category_link($link_array[1]);
                        break;
                    case 'portfolio':
                        $link = get_permalink($link_array[1]);
                        break;
                    case 'post':
                        $link = get_permalink($link_array[1]);
                        break;
                    case 'manually':
                        $link = $link_array[1];
                        break;
                }
                }
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
            $images[]        = array(
                'title' => get_post_meta(get_the_ID(), '_title', true),
                'id' => get_the_id(),
                'desc' => get_post_meta(get_the_ID(), '_description', true),
                'title_color' => get_post_meta(get_the_ID(), '_title_color', true),
                'desc_color' => get_post_meta(get_the_ID(), '_desc_color', true),
                'src' => $image_src_array[0],
                'link' => $link
            );
        endwhile;
        wp_reset_postdata();
        return $images;
        }
    }
/**
 */
if (!function_exists('mk_theme_flexslider'))
    {
    function mk_theme_flexslider($post_id = NULL)
        {
        global $mk_options;
        require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
        $number            = get_post_meta($post_id, '_flexslider_count', true);
        $slideshow_height  = get_post_meta($post_id, '_flexslider_height', true);
        $layout            = get_post_meta($post_id, '_flexslider_layout', true);
        $slideDirection    = get_post_meta($post_id, '_flexslider_slideDirection', true);
        $slideshow         = get_post_meta($post_id, '_flexslider_slideshow', true);
        $slideshowSpeed    = get_post_meta($post_id, '_flexslider_slideshowSpeed', true);
        $animationDuration = get_post_meta($post_id, '_flexslider_animationDuration', true);
        $pauseOnHover      = get_post_meta($post_id, '_flexslider_pauseOnHover', true);
        $disableCaption    = get_post_meta($post_id, '_flexslider_disableCaption', true);
        $easing            = get_post_meta($post_id, '_flexslider_easing', true);
        $pagination        = (get_post_meta($post_id, '_flexslider_pagination', true) == 'thumb') ? 'thumbnails' : "true";
        $random_id         = rand(100, 9999);
        $pagination_style  = '';
        if ($pagination == 'thumbnails')
            {
            $pagination_style = 'flexslider-thumbnail';
            }
        $output = '<div class="mk-flexsldier-slideshow mk-flexslider ' . $pagination_style . '"><div style="max-width:' . $mk_options['grid_width'] . 'px;" class="mk-flexslider-wrapper"><div id="flexslider_' . $random_id . '" style="max-width:' . $mk_options['grid_width'] . 'px;">';
        $output .= '<ul class="mk-flex-slides">';
        $images = mk_theme_flexslider_items('full', $post_id);
        foreach ($images as $image)
            {
            $slide_id        = mt_rand(50, 100);
            $title           = $image['title'];
            $desc            = $image['desc'];
            $title_color     = $image['title_color'];
            $desc_color      = $image['desc_color'];
            $link            = $image['link'];
            $image_src       = bfi_thumb($image['src'], array(
                'width' => $mk_options['grid_width'],
                'height' => $slideshow_height
            ));
            $image_thumb_src = bfi_thumb($image['src'], array(
                'width' => 100,
                'height' => 60
            ));
            $output .= '<li data-thumb="' . $image_thumb_src . '">';
            $output .= !empty($link) ? '<a href="' . $link . '">' : '';
            $output .= '<img alt="' . $title . '" src="' . $image_src . '"  />';
            if ((!empty($title) || !empty($desc)) && $disableCaption != 'false')
                {
                $output .= '<div class="mk-flex-caption" id="mk-flex-caption-' . $slide_id . '">';
                $output .= !empty($title) ? '<div class="flex-title"><span>' . strip_tags($title) . '</span></div><div class="clearboth"></div>' : '';
                $output .= !empty($desc) ? '<div class="flex-desc"><span>' . $desc . '</span></div>' : '';
                $output .= '</div>';
                }
            $output .= !empty($link) ? '</a>' : '';
            $output .= '</li>';
            }
        $output .= '</ul>';
        $output .= '</div></div></div>';
        $output .= <<<HTML
<script type="text/javascript">
  jQuery(document).ready(function() {
  	jQuery(window).on("load",function () {

	    jQuery('#flexslider_{$random_id}').flexslider({
	    		selector: ".mk-flex-slides > li",
				animation: "fade",
				smoothHeight: true,
				direction:"horizental",
				slideDirection: "{$slideDirection}",
				slideshow: {$slideshow},
				slideshowSpeed: {$slideshowSpeed},
				animationDuration: {$animationDuration},
				pauseOnHover: {$pauseOnHover},
				controlNav: "{$pagination}",
				easing : "{$easing}",
				prevText: "",
				nextText: "",
				pauseText: '',
				playText: '',
				start: mk_complete,
				after: mk_complete
		});

		function mk_complete(args) {
			var caption = jQuery(args.container).find('.mk-flex-caption').attr('style', ''),
				thisCaption = jQuery('.mk-flexslider-wrapper .mk-flex-slides > li.flex-active-slide').find('.mk-flex-caption');
				thisCaption.animate({left:10, opacity:1}, 500, 'easeOutQuint');
		}




	});
});

</script>
HTML;
        echo $output;
        }
    }
/**
 */
if (!function_exists('mk_theme_icarousel_items'))
    {
    function mk_theme_icarousel_items($size = array(1920, 460), $post_id)
        {
        global $post;
        $number   = get_post_meta($post_id, '_icarousel_count', true);
        $order    = get_post_meta($post_id, '_icarousel_order', true);
        $orderby  = get_post_meta($post_id, '_icarousel_orderby', true);
        $posts_in = get_post_meta($post_id, '_icarousel_items', true);
        $query    = array(
            'post_type' => 'icarousel'
        );
        if ($number)
            {
            $query['showposts'] = $number;
            }
        if ($order)
            {
            $query['order'] = $order;
            }
        if ($orderby)
            {
            $query['orderby'] = $orderby;
            }
        if ($posts_in)
            {
            $query['post__in'] = $posts_in;
            }
        $loop   = new WP_Query($query);
        $images = array();
        while ($loop->have_posts()):
            $loop->the_post();
            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
            $images[]        = array(
                'easing' => get_post_meta(get_the_ID(), '_icarousel_easing', true),
                'id' => get_the_id(),
                'pause_time' => get_post_meta(get_the_ID(), '_pause_time', true),
                'src' => $image_src_array[0]
            );
        endwhile;
        wp_reset_postdata();
        return $images;
        }
    }
/**
 */
if (!function_exists('mk_theme_icarousel'))
    {
    function mk_theme_icarousel($post_id = NULL)
        {
        global $mk_options;
        $number          = get_post_meta($post_id, '_icarousel_count', true);
        $autoplay        = get_post_meta($post_id, '_icarousel_autoplay', true);
        $make_3d         = get_post_meta($post_id, '_icarousel_3d', true);
        $perpective      = get_post_meta($post_id, '_icarousel_perspective', true);
        $pause_on_hover  = get_post_meta($post_id, '_icarousel_pause_on_hover', true);
        $animation_speed = get_post_meta($post_id, '_icarousel_animation_speed', true);
        $pause_time      = get_post_meta($post_id, '_icarousel_pause_time', true);
        $direction_nav   = get_post_meta($post_id, '_icarousel_direction_nav', true);
        $global_easing   = get_post_meta($post_id, '_icarousel_easing', true);
        wp_print_scripts('jquery-icarousel');
        wp_print_scripts('jquery-raphael');
        $random_id = rand(100, 9999);
        $output    = '<div class="mk-icarousel-slideshow mk-icarousel"><div id="icarousel_' . $random_id . '">';
        $images    = mk_theme_icarousel_items('full', $post_id);
        foreach ($images as $image)
            {
            $pause_time = $image['pause_time'];
            $id         = $image['id'];
            $image_src  = bfi_thumb($image['src'], array(
                'width' => 470,
                'height' => 360
            ));
            $output .= '<img width="480" height="360" data-pausetime="' . $pause_time . '" src="' . $image_src . '"  />';
            }
        $output .= '</div></div>';
        $output .= <<<HTML
<script type="text/javascript">
  jQuery(document).ready(function() {
  	jQuery(window).on("load",function () {
	jQuery('#icarousel_{$random_id}').css('visibility', 'visible');
  	jQuery('#icarousel_{$random_id}').iCarousel({
        easing: '{$global_easing}', // Easing timing (custom cubic-bezier function is acceptable)
        slides: {$number}, // How many slides will be shown (Must be an odd number)
        make3D: {$make_3d}, // To Enable or Disable 3D effect.
        perspective: {$perpective}, // The 3D perspective option. (Min 0 & Max 100);
        animationSpeed: {$animation_speed}, // Slide transition speed (Microsecond)
        pauseTime: {$pause_time}, // How long each slide will show (Microsecond)
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: {$direction_nav}, // Next & Previous navigation
        autoPlay: true, // To Enable or Disable the autoplay
        keyboardNav: true, // To Enable or Disable the keyboard navigation
        touchNav: true, // To Enable or Disable the touch navigation
        mouseWheel: true, // To Enable or Disable the mousewheel navigation
        pauseOnHover: {$pause_on_hover}, // To Enable or Disable the carousel when mouse come over it
        randomStart: false, // Start on a random slide
        slidesSpace: 300, // Spaces between slides
        slidesTopSpace: 'auto', // Top Space for the slides
        direction: 'rtl', // Carousel direction when change (right-to-left) set like: 'rtl'
        timer: '360Bar', // Timer style: "Pie", "360Bar" or "Bar"
        timerBg: '#000', // Timer background
        timerColor: '{$mk_options['skin_color']}', // Timer color
        timerOpacity: 0.4, // Timer opacity
        timerDiameter: 20, // Timer diameter
        timerPadding: 3, // Timer padding
        timerStroke: 2, // Timer stroke width
        timerBarStroke: 1, // Timer Bar stroke width
        timerBarStrokeColor: '#EEE', // Timer Bar stroke color
        timerBarStrokeStyle: 'solid', // Timer Bar stroke style
        timerBarStrokeRadius: 4, // Timer Bar stroke radius
        timerPosition: 'top-right', // Timer position (top,middle,bottom)-(left-center-right) set like: 'middle-center'
        timerX: 20, // Timer X position threshold
        timerY: 20, // Timer Y position threshold
        nextLabel: "", // To set the string of the next button (Multilanguage use)
        previousLabel: "", // To set the string of the previous button (Multilanguage use)
        playLabel: "Play", // To set the string of the play button (Multilanguage use)
        pauseLabel: "Pause", // To set the string of the pause button (Multilanguage use)
        onBeforeChange: function(){}, // Triggers before a slide change
        onAfterChange: function(){}, // Triggers after a slide change
        onLastSlide: function(){}, // Triggers when last slide is shown
        onAfterLoad: function(){}, // Triggers when carousel has loaded
        onPause: function(){}, // Triggers when carousel has paused
        onPlay: function(){} // Triggers when carousel has played
    });
});

});

</script>
HTML;
        echo $output;
        }
    }
/**
 */
if (!function_exists('mk_theme_banner_builder'))
    {
    function mk_theme_banner_builder($post_id = NULL)
        {
        $order             = get_post_meta($post_id, '_banner_order', true);
        $orderby           = get_post_meta($post_id, '_banner_orderby', true);
        $minHeight         = get_post_meta($post_id, '_banner_minHeight', true);
        $padding           = get_post_meta($post_id, '_banner_padding', true);
        $posts_in          = get_post_meta($post_id, '_banner_items', true);
        $animation         = get_post_meta($post_id, '_banner_animation', true);
        $slideDirection    = get_post_meta($post_id, '_banner_slideDirection', true);
        $slideshow         = get_post_meta($post_id, '_banner_slideshow', true);
        $slideshowSpeed    = get_post_meta($post_id, '_banner_slideshowSpeed', true);
        $animationDuration = get_post_meta($post_id, '_banner_animationDuration', true);
        $query             = array(
            'post_type' => 'banner_builder',
            'suppress_filters' => false
        );
        $slides_count      = count($posts_in);
        if ($posts_in)
            {
            $query['post__in'] = $posts_in;
            }
        if ($order)
            {
            $query['order'] = $order;
            }
        if ($orderby)
            {
            $query['orderby'] = $orderby;
            }
        $loop   = new WP_Query($query);
        $i      = 0;
        $output = '<div class="mk-banner-builder theme-page-wrapper full-layout"><div style="padding:0;" class="theme-content"><div style="padding:' . $padding . 'px;min-height:' . $minHeight . 'px;" class="mk-flexslider" id="mk_banner_builder">';
        $output .= '<ul class="mk-banner-slides">';
        while ($loop->have_posts()):
            $loop->the_post();
            $i++;
            $output .= '<li><div class="mk-grid row-fluid">' . do_shortcode(get_the_content()) . '</div></li>';
        endwhile;
        wp_reset_query();
        $output .= '</ul>';
        $output .= '<div class="clearboth"></div></div><div class="clearboth"></div></div></div>';
        if ($i < 2)
            {
            $directionNav = 'false';
            }
        else
            {
            $directionNav = 'true';
            }
        $output .= <<<HTML
<script type="text/javascript">

  jQuery(document).ready(function() {
	    jQuery('#mk_banner_builder').flexslider({
	    		selector: ".mk-banner-slides > li",
				animation: "{$animation}",
				smoothHeight: false,
				direction:"horizontal",
				slideshow: {$slideshow},
				slideshowSpeed: {$slideshowSpeed},
				animationSpeed: {$animationDuration},
				pauseOnHover: true,
				directionNav: {$directionNav},
				controlNav: false,
				initDelay: 2000,
				prevText: "",
				nextText: "",
				pauseText: '',
				playText: ''
		});

});

</script>
HTML;
        echo $output;
        }
    }
/**
 */
if (!function_exists('mk_theme_edge_slider'))
    {
    function mk_theme_edge_slider($post_id = NULL)
        {
        global $post, $mk_options;
        $slides         = '';
        $posts_in       = get_post_meta($post_id, '_edge_items', true);
        $order          = get_post_meta($post_id, '_edge_order', true);
        $orderby        = get_post_meta($post_id, '_edge_orderby', true);
        $slideDirection = get_post_meta($post_id, '_edge_direction_nav', true);
        $pause          = get_post_meta($post_id, '_edge_pause_time', true);
        $speed          = get_post_meta($post_id, '_edge_animation_speed', true);
        $full_height    = get_post_meta($post_id, '_edge_full_height', true) ? get_post_meta($post_id, '_edge_full_height', true) : 'true';
        $height         = get_post_meta($post_id, '_edge_height', true) ? get_post_meta($post_id, '_edge_height', true) : 600;
        if (!empty($posts_in))
            {
            $slides = implode(',', $posts_in);
            }
        echo do_shortcode('[mk_edge_slider orderby="' . $orderby . '" order="' . $order . '" slides="' . $slides . '" height="' . $height . '" skip_arrow="true" full_height="' . $full_height . '" animation_speed="' . $speed . '" slideshow_speed="' . $pause . '" direction_nav="' . $slideDirection . '"]');
        }
    }











