<?php
extract(shortcode_atts(array(
    'el_class' => '',
    'layout_structure' => 'full',
    'bg_color' => '',
    'border_color' => '',
    'bg_image' => '',
    'bg_repeat' => 'repeat',
    'predefined_bg' => '',
    'bg_gradient' => 'false',
    'gr_start' => '#fff',
    'gr_end' => '#1e73be',
    'section_layout' => '',
    'section_id' => '',
    'sidebar' => '',
    'bg_stretch' => '',
    'attachment' => '',
    'top_shadow' => '',
    'bg_position' => 'left top',
    'enable_3d' => 'false',
    'speed_factor' => '',
    'min_height' => 100,
    'margin_bottom' => '10',
    'padding_top' => '10',
    'padding_bottom' => '10',
    'skip_arrow' => 'false',
    'skip_arrow_skin' => 'light',
    'video_opacity' => '',
    'last_page' => 'false',
    'first_page' => 'false',
    'bg_video' => 'no',
    'video_source' => 'self',
    'mp4' => '',
    'webm' => '',
    'ogv' => '',
    'poster_image' => '',
    'stream_host_website' => '',
    'stream_video_id' => '',
    'full_width' => 'false',
    'video_mask' => 'false',
    'visibility' => '',
    'video_color_mask' => '',
    'intro_effect' => 'false',
    'animation' => '',
    'full_height' => ''
), $atts));

$output = $gradient_output = $bg_stretch_class = $top_shadow_css = $first_page_css = $backgroud_image = $video_color_mask_css = $video_output = $page_intro_class = $overlay_opacity_ie = $bgAttachment = '';
$clipper = 'false';

$padding_bottom = ($skip_arrow == 'true' && $full_height != 'true') ? $padding_bottom + 100 : $padding_bottom;

wp_enqueue_script( 'wpb_composer_front_js' );

$id = uniqid();

if(!empty($section_id)) {
    $section_id_name = $section_id;
} else {
    $section_id_name = "mk-page-section-".$id;
}

$post_id = global_get_post_id();

if ($bg_stretch == 'true') {
    $bg_stretch_class = 'mk-background-stretch ';
}
if ($attachment == 'fixed' && $enable_3d == 'false') {
    $bgAttachment = 'position: fixed;';
    $clipper = 'true';
}
if ($attachment == 'fixed' && $enable_3d == 'true') {
    $bgAttachment = 'background-attachment: fixed;';
}
// if ($attachment == 'fixed') {
//     $bgAttachment = 'background-attachment: fixed;';
//     $clipper = 'true';
// }

if ($top_shadow == 'true') {
    $top_shadow_css = ' drop-top-shadow';
}

if($intro_effect != 'false' && $intro_effect != '') {
    $page_intro_class = 'intro-true ';    
    wp_dequeue_script('SmoothScroll');
}

$animation_css = ( $animation != '' ) ? ' mk-animate-element ' . $animation . ' ' : '';

$output .= '<div class="clearboth"></div></div></div></div>';

/* Fixes page section for blog single page */
if(is_singular('post')) {
$output .= '</div>';
}

if($intro_effect != 'false') {
    $visibility = '';
}


/* If social hosted get website name*/
$stream_host = ($video_source == 'social') ? 'data-source="'.$stream_host_website.'"' : '' ;

$output .= '<div id="' . $section_id_name . '" data-intro-effect="' . $intro_effect . '" class="full-width-' . $id . ' ' . $page_intro_class . $bg_stretch_class . $top_shadow_css . $animation_css . ' full-height-' . $full_height . ' mk-page-section '.$video_source.'-hosted mk-blur-parent mk-shortcode ' . $visibility . ' ' . $el_class . '" '.$stream_host.'>';

/* Div layer parallax */ 
// if ($enable_3d == 'true') {
// $output .= '<div class="parallax-layer"></div>';
// }


$output .= ($full_height == 'true') ? '<div class="mk-page-section-loader"><div class="mk-preloader"></div></div>' : '';


if ($video_mask == 'true' && $layout_structure == 'full') {
    $output .= '<div class="mk-video-mask"></div>';
}


$overlay_opacity_ie = '-ms-filter:\'progid:DXImageTransform.Microsoft.Alpha(Opacity='. ($video_opacity * 100) .')\'';

if($layout_structure == 'full') {
    if (!empty($video_color_mask)) {
        $video_color_mask_css = ' style="background-color:' . $video_color_mask . ';opacity:' . $video_opacity . '; '.$overlay_opacity_ie.';"';
    }
    $output .= '<div' . $video_color_mask_css . ' class="mk-video-color-mask"></div>';
}



/**
 * Video Background
 */
if ($bg_video == 'yes') {

    if ($video_source == 'self'){
        if (!empty($poster_image)) {
        $video_output .= '<div style="background-image:url(' . $poster_image . ');" class="mk-video-section-touch"></div>';
    }
    
    $video_output .= '<div class="mk-section-video"><video poster="' . $poster_image . '" muted="muted" preload="auto" loop="true" autoplay="true" style="opacity:0;">';
    
    if (!empty($mp4)) {
        $video_output .= '<source type="video/mp4" src="' . $mp4 . '" />';
    }
    if (!empty($webm)) {
        $video_output .= '<source type="video/webm" src="' . $webm . '" />';
    }
    if (!empty($ogv)) {
        $video_output .= '<source type="video/ogg" src="' . $ogv . '" />';
    }
    
    $video_output .= '</video></div>'; 

    $stream_source = $stream_host_website;

    } else {
        $video_output .= '<div class="mk-section-video"><div class="video-social-hosted">';
        if ($stream_host_website == 'youtube'){
            $stream_source = 'youtube';
            $video_output .= '<iframe src="https://www.youtube.com/embed/'.$stream_video_id.'?rel=0;enablejsapi=1;controls=0;showinfo=0;loop=1;playlist='.$stream_video_id.'"></iframe>';
        } else if ($stream_host_website == 'vimeo'){
            $stream_source = 'vimeo';
            $video_output .= '<iframe src="//player.vimeo.com/video/'.$stream_video_id.'?badge=0;api=1;loop=1" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        }
        $video_output .= '</div></div>';
    }
}

if ($layout_structure == 'full') {
    $output .= $video_output;
}


if($layout_structure == 'full') {
    if($clipper == true) { $output .= '<div class="background-clipper">'; }
    if (!empty($bg_image)) {
        $output .= '<div id="background-layer--'.$id.'" class="background-layer '.$bg_stretch_class.' clipper-'.$clipper.' parallax-' . $enable_3d . '" data-speedFactor="' . $speed_factor . '"></div>';
        $backgroud_image = !empty($bg_image) ? 'background-image:url(' . $bg_image . '); ' : '';
    } else if (!empty($predefined_bg)) {
        $output .= '<div id="background-layer--'.$id.'" class="background-layer '.$bg_stretch_class.' parallax-' . $enable_3d . '" data-speedFactor="' . $speed_factor . '"></div>';
        $backgroud_image = !empty($predefined_bg) ? 'background-image:url(' . THEME_IMAGES . '/pattern/' . $predefined_bg . '.png);' : '';
    }
    if($clipper == true) { $output .= '</div>'; }
} else {
    $backgroud_image = '';
    if(empty($bg_image) && !empty($predefined_bg)) {
        $bg_image = THEME_IMAGES . '/pattern/' . $predefined_bg . '.png';
    }
}

$border_css = (empty($bg_image) && !empty($border_color)) ? 'border:1px solid ' . $border_color . ';border-left:none;border-right:none;' : '';

$bg_color_css = $bg_color ? ('background-color:' . $bg_color . ';') : '';


/* Content container */
if($layout_structure == 'full') {
    if ($section_layout == 'full') {
        if($full_width == 'true') {
            $output .= '<div class="vc_row-fluid page-section-fullwidth page-section-content"><div class="mk-padding-wrapper">' . wpb_js_remove_wpautop($content) . '</div><div class="clearboth"></div></div>';    
        } else {
            $output .= '<div class="mk-grid vc_row-fluid page-section-content"><div class="mk-padding-wrapper">' . wpb_js_remove_wpautop($content) . '</div><div class="clearboth"></div></div>';
        }
        
    } else {
        $output .= '<div class="mk-main-wrapper-holder">';
        $output .= '<div class="theme-page-wrapper ' . $section_layout . '-layout mk-grid vc_row-fluid row-fluid page-section-content">';
        $output .= '<div class="theme-content">' . wpb_js_remove_wpautop($content) . '<div class="clearboth"></div></div>';
        $output .= '<aside id="mk-sidebar" class="mk-builtin"><div class="sidebar-wrapper" style="padding-top:0;padding-bottom:0;">';
        ob_start();
        dynamic_sidebar($sidebar);
        $output .= ob_get_contents();
        ob_end_clean();
        $output .= '</div></aside></div></div>';

    }

} else {
    $output .= '<div class="mk-half-layout '.$layout_structure.'_layout" style="background-image:url('.$bg_image.');">';
    $output .= $video_output;
    $output .= '</div>';
    $output .= '<div class="mk-half-layout-container page-section-content '.$layout_structure.'_layout">'.wpb_js_remove_wpautop( $content ).'</div><div class="clearboth"></div>';
}
$output .= '<div class="clearboth"></div>';
$output .= ($skip_arrow == 'true') ? '<div class="abb-skip-to-next" data-skin="'.$skip_arrow_skin.'"><i class="mk-jupiter-icon-arrow-down"></i></div>': '';
$output .= '</div>';





/*
*specific page section custom styles.
*/

if($bg_gradient != 'false') {

    // Gradient background
    // Trigger it with IF statement, define color variables end target $el.
    // Include $gradient_output in your dynamic styles. You're done
    // Go Jhonny

    $el = '.full-width-'.$id.' .mk-video-color-mask';
    $vertical = $horizontal = $left_top = $left_bottom = $radial = '';
    $gr_start = $video_color_mask;

    if($bg_gradient == 'vertical')
        $vertical = "
            background: ".$gr_start."; /* Old browsers */
            background: -moz-linear-gradient(top,  ".$gr_start." 0%, ".$gr_end." 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,".$gr_start."), color-stop(100%,".$gr_end.")); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  ".$gr_start." 0%,".$gr_end." 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  ".$gr_start." 0%,".$gr_end." 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  ".$gr_start." 0%,".$gr_end." 100%); /* IE10+ */
            background: linear-gradient(to bottom,  ".$gr_start." 0%,".$gr_end." 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gr_start."', endColorstr='".$gr_end."',GradientType=0 ); /* IE6-8 */
        ";

    if($bg_gradient == 'horizontal')
        $horizontal = "
            background: ".$gr_start."; /* Old browsers */
            background: -moz-linear-gradient(left,  ".$gr_start." 0%, ".$gr_end." 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right top, color-stop(0%,".$gr_start."), color-stop(100%,".$gr_end.")); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(left,  ".$gr_start." 0%,".$gr_end." 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(left,  ".$gr_start." 0%,".$gr_end." 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(left,  ".$gr_start." 0%,".$gr_end." 100%); /* IE10+ */
            background: linear-gradient(to right,  ".$gr_start." 0%,".$gr_end." 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gr_start."', endColorstr='".$gr_end."',GradientType=1 ); /* IE6-8 */
        ";

    if($bg_gradient == 'left_top')
        $left_top = "
            background: ".$gr_start."; /* Old browsers */
            background: -moz-linear-gradient(-45deg,  ".$gr_start." 0%, ".$gr_end." 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,".$gr_start."), color-stop(100%,".$gr_end.")); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(-45deg,  ".$gr_start." 0%,".$gr_end." 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(-45deg,  ".$gr_start." 0%,".$gr_end." 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(-45deg,  ".$gr_start." 0%,".$gr_end." 100%); /* IE10+ */
            background: linear-gradient(135deg,  ".$gr_start." 0%,".$gr_end." 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gr_start."', endColorstr='".$gr_end."',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
        ";

    if($bg_gradient == 'left_bottom')
        $left_bottom = "
            background: ".$gr_start."; /* Old browsers */
            background: -moz-linear-gradient(45deg,  ".$gr_start." 0%, ".$gr_end." 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,".$gr_start."), color-stop(100%,".$gr_end.")); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(45deg,  ".$gr_start." 0%,".$gr_end." 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(45deg,  ".$gr_start." 0%,".$gr_end." 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(45deg,  ".$gr_start." 0%,".$gr_end." 100%); /* IE10+ */
            background: linear-gradient(45deg,  ".$gr_start." 0%,".$gr_end." 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gr_start."', endColorstr='".$gr_end."',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
        ";

    if($bg_gradient == 'radial')
        $radial = "
            background: ".$gr_start."; /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover,  ".$gr_start." 0%, ".$gr_end." 100%); /* FF3.6+ */
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,".$gr_start."), color-stop(100%,".$gr_end.")); /* Chrome,Safari4+ */
            background: -webkit-radial-gradient(center, ellipse cover,  ".$gr_start." 0%,".$gr_end." 100%); /* Chrome10+,Safari5.1+ */
            background: -o-radial-gradient(center, ellipse cover,  ".$gr_start." 0%,".$gr_end." 100%); /* Opera 12+ */
            background: -ms-radial-gradient(center, ellipse cover,  ".$gr_start." 0%,".$gr_end." 100%); /* IE10+ */
            background: radial-gradient(ellipse at center,  ".$gr_start." 0%,".$gr_end." 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$gr_start."', endColorstr='".$gr_end."',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
        ";

    $gradient_output = $el .'{'
        .$vertical
        .$horizontal
        .$left_top
        .$left_bottom
        .$radial
    .'}';
}



// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$app_styles .= "
.full-width-{$id} {
    min-height:{$min_height}px;
    padding:{$padding_top}px 0 {$padding_bottom}px;
    margin-bottom:{$margin_bottom}px;
    {$bg_color_css}
    {$border_css}
}
#background-layer--{$id} {
    {$backgroud_image}
    background-position:{$bg_position};
    background-repeat:{$bg_repeat};
    {$bgAttachment};
}
    {$gradient_output} ";




if ($first_page == 'true') {
$app_styles .= "
.mk-main-wrapper {
    display: none;
}
#theme-page {
     padding-top:0;
}";
}

if(!empty($bg_color)) {
$app_styles .= "
.full-width-{$id} .mk-fancy-title.pattern-style span, 
.full-width-{$id} .mk-blog-view-all
{
    background-color: {$bg_color} !important;
}";
}
/**************************/


if ($last_page == 'true') {
    $output .= '<div><div><div>';
} else {
    $layout = get_post_meta($post_id, '_layout', true);

    if(isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
        $layout = $_REQUEST['layout'];
    }

    $padding = get_post_meta($post_id, '_padding', true );
    $padding = ($padding == 'true') ? 'no-padding' : '';
    $output .= '<div class="mk-main-wrapper-holder">';
    $output .= '<div class="theme-page-wrapper '.$padding.' ' . $layout . '-layout mk-grid vc_row-fluid row-fluid">';
    $output .= '<div class="theme-content '.$padding.'">';
}

/* Fixes page section for blog single post */
if(is_singular('post')) {
    $output .= '<div class="single-content">';
}
echo $output;

// Export PAGE_SECTION settings to json 
global $app_json;
$app_json[] = array(
  'name' => 'page_section',
  'params' => array(
      'id' => $section_id_name,
      'hasBgLayer' => !empty($backgroud_image),
      'bgAttachment' => $attachment
    )
);


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);