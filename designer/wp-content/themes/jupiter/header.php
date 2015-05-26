<!DOCTYPE html>
<html <?php mk_html_tag_schema(); ?> xmlns="http<?php echo (is_ssl())? 's' : ''; ?>://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php  
global $mk_options;

$post_id = global_get_post_id();
?>            
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
          <meta name="format-detection" content="telephone=no">
        <title itemprop="name">
        <?php
           if ( defined('WPSEO_VERSION') ) {
            wp_title('');
             } else {
             bloginfo('name'); ?> <?php wp_title(' - ', true);
          }
        ?>
        </title>

        <?php if ( $mk_options['custom_favicon'] ) : ?>
          <link rel="shortcut icon" href="<?php echo $mk_options['custom_favicon']; ?>"  />
        <?php else : ?>
        <link rel="shortcut icon" href="<?php echo THEME_IMAGES; ?>/favicon.png"  />
        <?php endif; ?>
        <?php if($mk_options['iphone_icon']): ?>
        <link rel="apple-touch-icon-precomposed" href="<?php echo $mk_options['iphone_icon']; ?>">
        <?php endif; ?>
        <?php if($mk_options['iphone_icon_retina']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $mk_options['iphone_icon_retina']; ?>">
        <?php endif; ?>
        <?php if($mk_options['ipad_icon']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $mk_options['ipad_icon']; ?>">
        <?php endif; ?>
        <?php if($mk_options['ipad_icon_retina']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $mk_options['ipad_icon_retina']; ?>">
        <?php endif; ?>
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url');?>">
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url');?>">
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">

         <!--[if lt IE 9]>
         <script src="<?php echo THEME_JS;?>/html5shiv.js" type="text/javascript"></script>
         <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/stylesheet/css/ie.css' /> 
         <![endif]-->
         <!--[if IE 7 ]>
               <link href="<?php echo THEME_STYLES;?>/ie7.css" media="screen" rel="stylesheet" type="text/css" />
               <![endif]-->
         <!--[if IE 8 ]>
               <link href="<?php echo THEME_STYLES;?>/ie8.css" media="screen" rel="stylesheet" type="text/css" />
         <![endif]-->

         <!--[if lte IE 8]>
            <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/respond.js"></script>
         <![endif]-->

        <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
        <script type="text/javascript" src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>

         <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

         <script type="text/javascript">
          // Init aplication namespace 
          var abb = {};
          var php = {};
          
          var mk_header_parallax, mk_banner_parallax, mk_page_parallax, mk_footer_parallax, mk_body_parallax;
          var mk_images_dir = "<?php echo THEME_IMAGES; ?>",
          mk_theme_js_path = "<?php echo THEME_JS;  ?>",
          mk_theme_dir = "<?php echo THEME_DIR_URI; ?>",
          mk_captcha_placeholder = "<?php echo _e('Enter Captcha', 'mk_framework') ?>",
          mk_captcha_invalid_txt = "<?php echo _e('Invalid. Try again.', 'mk_framework') ?>",
          mk_captcha_correct_txt = "<?php echo _e('Captcha correct.', 'mk_framework') ?>",
          mk_responsive_nav_width = <?php echo $mk_options['responsive_nav_width']; ?>,
          mk_grid_width = <?php echo $mk_options['grid_width'] ?>,
          mk_ajax_search_option = "<?php echo $mk_options['header_search_location']; ?>",
          mk_preloader_txt_color = "<?php echo ($mk_options['preloader_txt_color']) ? $mk_options['preloader_txt_color'] : '#444'; ?>",
          mk_preloader_bg_color = "<?php echo ($mk_options['preloader_bg_color']) ? $mk_options['preloader_bg_color'] : '#fff'; ?>",
          mk_accent_color = "<?php echo $mk_options['skin_color']; ?>",
          mk_preloader_bar_color = "<?php echo (isset($mk_options['preloader_bar_color']) && !empty($mk_options['preloader_bar_color'])) ? $mk_options['preloader_bar_color'] : $mk_options['skin_color']; ?>",
          mk_preloader_logo = "<?php echo $mk_options['preloader_logo']; ?>";
          <?php if($post_id) : ?>
          var mk_header_parallax = <?php echo get_post_meta($post_id, 'header_parallax', true ) ? get_post_meta($post_id, 'header_parallax', true ) : "false" ?>,
          mk_banner_parallax = <?php echo get_post_meta($post_id, 'banner_parallax', true ) ? get_post_meta($post_id, 'banner_parallax', true ) : "false"; ?>,
          mk_page_parallax = <?php echo get_post_meta($post_id, 'page_parallax', true ) ? get_post_meta($post_id, 'page_parallax', true ) : "false"; ?>,
          mk_footer_parallax = <?php echo get_post_meta($post_id, 'footer_parallax', true ) ? get_post_meta($post_id, 'footer_parallax', true ) : "false"; ?>,
          mk_body_parallax = <?php echo get_post_meta($post_id, 'body_parallax', true ) ? get_post_meta($post_id, 'body_parallax', true ) : "false"; ?>,
          mk_no_more_posts = "<?php echo _e('No More Posts', 'mk_framework'); ?>";
          <?php endif; ?>
          
          function is_touch_device() {
              return ('ontouchstart' in document.documentElement);
          }
          
         </script>
    <?php wp_head(); ?>
    </head>
<?php

$mk_body_class[] = $mk_header_class = $show_header_old = $show_header = $transparent_header = $transparent_header_skin = $trans_header_class = $page_is_transparent = $header_sticky_style_css = '';

$header_style = !empty($mk_options['theme_header_style']) ? $mk_options['theme_header_style'] : 1;
$toolbar_toggle = !empty($mk_options['theme_toolbar_toggle']) ? $mk_options['theme_toolbar_toggle'] : 'true';
$header_align = !empty($mk_options['theme_header_align']) ? $mk_options['theme_header_align'] : 'left';

$header_grid_start = ($mk_options['header_grid'] == 'true') ? '<div class="mk-grid header-grid">' : '';
$header_grid_end = ($mk_options['header_grid'] == 'true') ? '</div>' : '';
$header_width_class = ($mk_options['header_grid'] == 'true') ? 'boxed-header' : 'full-header';
$sticky_header_style = isset($mk_options['header_sticky_style']) ? $mk_options['header_sticky_style'] : 'fixed';
$sticky_header_offset = isset($mk_options['sticky_header_offset']) ? $mk_options['sticky_header_offset'] : 'header';

$header_style_3_menu_style = !empty($mk_options['header_style3_structure']) ? $mk_options['header_style3_structure'] : 'header_dashboard_style';


if($post_id) {
  $enable = get_post_meta($post_id, '_enable_local_backgrounds', true );
  
  if($enable == 'true') {
    $header_style_meta = get_post_meta( $post_id, 'theme_header_style', true );
    $header_align_meta = get_post_meta( $post_id, 'theme_header_align', true );
    $toolbar_toggle_meta = get_post_meta( $post_id, 'theme_toolbar_toggle', true );
    $transparent_header_meta = get_post_meta( $post_id, '_transparent_header', true );
    $transparent_header_skin_meta = get_post_meta( $post_id, '_transparent_header_skin', true );
    $sticky_header_offset_meta = get_post_meta( $post_id, '_sticky_header_offset', true );
    $trans_header_remove_bg_meta = get_post_meta( $post_id, '_trans_header_remove_bg', true );
    
    $header_style = (isset($header_style_meta) && !empty($header_style_meta)) ? $header_style_meta : $header_style;
    $header_align = (isset($header_align_meta) && !empty($header_align_meta)) ? $header_align_meta : $header_align;
    $toolbar_toggle = (isset($toolbar_toggle_meta) && !empty($toolbar_toggle_meta)) ? $toolbar_toggle_meta : $toolbar_toggle;
    $transparent_header = (isset($transparent_header_meta) && !empty($transparent_header_meta)) ? $transparent_header_meta : 'false';
    $transparent_header_skin = (isset($transparent_header_skin_meta) && !empty($transparent_header_skin_meta)) ? $transparent_header_skin_meta : 'light';
    $sticky_header_offset = (isset($sticky_header_offset_meta) && !empty($sticky_header_offset_meta)) ? $sticky_header_offset_meta : $sticky_header_offset;
    $trans_header_remove_bg = (isset($trans_header_remove_bg_meta) && !empty($trans_header_remove_bg_meta)) ? $trans_header_remove_bg_meta : 'true';
  }
  
}


$single_preloader = '';
$preloader_check = 'disabled';

if($post_id) {
  $show_header_old = get_post_meta( $post_id, '_header', true );
  $show_header = get_post_meta( $post_id, '_template', true );
  $single_preloader = get_post_meta($post_id, 'page_preloader', true );
}

if ( ($mk_options['background_selector_orientation'] == 'boxed_layout') && !($post_id && get_post_meta( $post_id, '_enable_local_backgrounds', true ) == 'true' && get_post_meta( $post_id, 'background_selector_orientation', true ) == 'full_width_layout')) { 
   
    $mk_body_class[] = 'mk-boxed-enabled';

} else if($post_id && get_post_meta( $post_id, '_enable_local_backgrounds', true ) == 'true' && get_post_meta( $post_id, 'background_selector_orientation', true ) == 'boxed_layout') {
  
   $mk_body_class[] = 'mk-boxed-enabled';

}

if($header_style == 4) {
  $vertical_header_logo_align = (isset($mk_options['vertical_header_logo_align']) && !empty($mk_options['vertical_header_logo_align'])) ? $mk_options['vertical_header_logo_align'] : 'center';
  
  $mk_body_class[] = 'vertical-header-enabled vertical-header-' . $header_align . ' logo-align-'.$vertical_header_logo_align;

} else {
  $header_sticky_style_css = 'sticky-style-'.$sticky_header_style;
  if($sticky_header_style == 'lazy') {
    $header_sticky_style_css = 'sticky-style-fixed';
  }
}

if($transparent_header == 'true') {
  $page_is_transparent = ' class="mk-transparent-header" ';
  $trans_header_class = 'transparent-header ' . $transparent_header_skin.'-header-skin remove-header-bg-'.$trans_header_remove_bg;
}



$mk_banner_class = ($mk_options['banner_size'] == 'true') ? ' mk-background-stretch' : '';
$mk_body_class[] = ($mk_options['body_size'] == 'true') ? 'mk-background-stretch' : '';





if($single_preloader == 'true') {
    $preloader_check = 'enabled';
  } else {
    if($mk_options['preloader'] == 'true') {
      $preloader_check = 'enabled';
    }
  }

?>

<body <?php body_class($mk_body_class); ?> data-backText="<?php _e('Back', 'mk_framework'); ?>" data-vm-anim="<?php echo $mk_options['vertical_menu_anim']; ?>">

<?php
if($preloader_check == 'enabled') { 
  echo '<div class="mk-body-loader-overlay"></div>';
} 
?>


<div id="mk-boxed-layout">
<div id="mk-theme-container"<?php echo $page_is_transparent; ?>>

<?php 
// Export HEADER settings to json 
global $app_modules;
$app_modules[] = array(
  'name' => 'theme_header',
  'params' => array(
      'id' => 'mk-header',
      'height' => $mk_options['header_height'],
      'stickyHeight' => $mk_options['header_scroll_height'],
      'stickyOffset' => $sticky_header_offset
    )
);
?>

<header id="mk-header" data-height="<?php echo $mk_options['header_height']; ?>" data-hover-style="<?php echo $mk_options['main_nav_hover']; ?>" data-transparent-skin="<?php echo $transparent_header_skin; ?>" data-header-style="<?php echo $header_style; ?>" data-sticky-height="<?php echo $mk_options['header_scroll_height']; ?>" data-sticky-style="<?php echo $sticky_header_style; ?>" data-sticky-offset="<?php echo $sticky_header_offset; ?>" class="header-style-<?php echo $header_style; ?> header-align-<?php echo $header_align; ?> header-toolbar-<?php echo $toolbar_toggle; ?> <?php echo $header_sticky_style_css; ?> <?php echo $mk_banner_class; ?> <?php echo $header_width_class; ?> <?php echo $trans_header_class; ?>">

<?php if($show_header != 'no-header' && $show_header != 'no-header-title' && $show_header != 'no-header-title-footer' && $show_header != 'no-header-footer') :  ?>

<div class="mk-header-holder">

<?php 

do_action('header_banner_video');


 
/************************************************************
  Header Toolbar
*************************************************************/
if($toolbar_toggle == 'true') : ?>
    <div class="mk-header-toolbar">
      
      <?php 
        echo $header_grid_start;

        do_action('header_toolbar_before'); // to add elements using child themes

        do_action('header_toolbar_menu');

        do_action('header_toolbar_date'); 

        do_action('header_toolbar_contact'); 

        do_action('header_toolbar_tagline'); 

        do_action('theme_wpml_language_switch');    

        do_action('header_search', 'toolbar'); 

        do_action('header_social', 'toolbar');

        do_action('header_toolbar_login');

        do_action('header_toolbar_subscribe');


        do_action('header_toolbar_after'); // to add elements using child themes

        echo $header_grid_end;
       ?>
    <div class="clearboth"></div>
  </div>
<?php endif;
/************************************************************
  End Of Header Toolbar
*************************************************************/
?>






<?php
  if($mk_options['header_size'] == 'true') {
      $mk_header_class = ' mk-background-stretch';
  }  
 ?>


<?php /* Header Inner */ 

?>
<div class="mk-header-inner">

  <?php /* Header background */ ?>
  <div class="mk-header-bg <?php echo $mk_header_class; ?>"></div>



  <?php /* Header toolbar responsive toggle icon */ ?>
  <?php if($toolbar_toggle == 'true' && $header_style != 4) { ?>
    <div class="mk-toolbar-resposnive-icon"><i class="mk-icon-chevron-down"></i></div>
  <?php } ?>




  <?php 
  // Will output main grid div if boxed layout option is enabled
  if($header_style != 4 ) {echo $header_grid_start; }
  ?>

  <?php 
  $one_row_nav_args = array(
      'style' => $header_style,
      'search_location' => $mk_options['header_search_location'],
      'nav_location' => 'one_row'
    );
  do_action('header_main_navigation',$one_row_nav_args , 10, 1); 

  // Menu trigger icon for header style 3
  if($header_style == 3) {
    $header_style3_structure = $header_style_3_menu_style == 'header_dashboard_style' ? 'header_dashboard_style' : $header_style_3_menu_style ;
    echo '<div class="mk-dashboard-trigger '.$header_style3_structure.'">
            <div class="mk-css-icon-menu icon-size-'.$mk_options['header_burger_size'].'">
              <div class="mk-css-icon-menu-line-1"></div>
              <div class="mk-css-icon-menu-line-2"></div>
              <div class="mk-css-icon-menu-line-3"></div>
            </div>
          </div>';
  }

  ?>



<?php
  // no resposnive menu in header style 3 
  if($header_style != 3) {
    echo '<div class=" mk-nav-responsive-link">
            <div class="mk-css-icon-menu">
              <div class="mk-css-icon-menu-line-1"></div>
              <div class="mk-css-icon-menu-line-2"></div>
              <div class="mk-css-icon-menu-line-3"></div>
            </div>
          </div>';
  }
  
 ?>
  
  
  <?php do_action('header_logo'); ?>
  <?php if($header_style == 2) : echo $header_grid_end; endif; ?>

  <div class="clearboth"></div>




  <?php

  $two_row_nav_args = array(
      'style' => $header_style,
      'search_location' => $mk_options['header_search_location'],
      'nav_location' => 'two_row'
    );

  
  do_action('header_main_navigation',$two_row_nav_args , 10, 1);


  do_action('vertical_navigation');

  ?>



<?php if($header_style == 1 || $header_style == 3) : echo $header_grid_end; endif; ?>

<?php /* Header right section elements */ ?>
  <div class="mk-header-right">
  
  <?php 

    do_action('header_right_before'); // to add elements using child themes

    //do_action('header_checkout');  Moved to header main nav area


    do_action('start_tour_link');

    do_action('header_social', 'header');

    do_action('header_search', 'header'); 

    do_action('header_copyright');

    do_action('header_right_after'); // to add elements using child themes
  ?>

  </div>
<?php /* End of header right section */ ?>



</div>


</div>

  <div class="clearboth"></div>
<?php /* End of Header Inner */ ?>

<?php endif; // End for option to disable header ?>




<div class="mk-header-padding-wrapper"></div>


<div class="clearboth"></div>

<div class="mk-zindex-fix">    

<?php

if($post_id) {
  do_action('theme_slideshow',$post_id);
}

  do_action('page_title');


?>
</div>

<div class="clearboth"></div>

<?php 
/* Will be inside responsive Navigation */
  if($show_header != 'no-header' && $show_header != 'no-header-title' && $show_header != 'no-header-title-footer' && $show_header != 'no-header-footer'){
    do_action('responsive_search');
  }
?>

</header>
