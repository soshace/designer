<?php



/*
 * Convert theme settings to a globaly accessible vaiable throught the theme.
 */
if (!function_exists('mk_theme_options')) {
     function mk_theme_options()
     {
          $GLOBALS['mk_options'] = get_option(THEME_OPTIONS);

          if(empty($GLOBALS['mk_options'])) {
            $theme_options = array();   
            $page = include(THEME_ADMIN . "/admin-panel/masterkey.php");
            $theme_options[$page['name']] = array();
            foreach ($page['options'] as $option) {
                if (isset($option['default'])) {
                    $theme_options[$page['name']][$option['id']] = $option['default'];
                }
            }

            $theme_options[$page['name']] = array_merge((array) $theme_options[$page['name']], (array) get_option($page['name']));

            $GLOBALS['mk_options'] = $theme_options[$page['name']];
            update_option(THEME_OPTIONS, $theme_options[$page['name']]);
          }

     }
}

add_action('init', 'mk_theme_options');
/*-----------------*/


/* 
Theme updates helper for theme options
*/
if (!function_exists('mk_new_version_migration')) {
     function mk_new_version_migration()
     {
          $version = get_option('jupiter_theme_version');

          $theme_data = wp_get_theme("jupiter");

          if($theme_data['Version'] != $version) {

           $theme_options = array();   
            $page = include(THEME_ADMIN . "/admin-panel/masterkey.php");
            $theme_options[$page['name']] = array();
            foreach ($page['options'] as $option) {
                if (isset($option['default'])) {
                    $theme_options[$page['name']][$option['id']] = $option['default'];
                }
            }

            $theme_options[$page['name']] = array_merge((array) $theme_options[$page['name']], (array) get_option($page['name']));

            $GLOBALS['mk_options'] = $theme_options[$page['name']];

            update_option(THEME_OPTIONS, $theme_options[$page['name']]);

            update_option('jupiter_theme_version', $theme_data['Version']);
            
          }


     }
}

add_action('init', 'mk_new_version_migration');
/*-----------------*/


/* 
Adds shortcodes dynamic css into footer.php
*/
if (!function_exists('mk_dynamic_css_injection')) {
     function mk_dynamic_css_injection()
     {

      global $app_styles, $app_json;  
    
    $output = '<script type="text/javascript">';
    

    $backslash_styles = str_replace('\\', '\\\\', $app_styles);
    $clean_styles = preg_replace('!\s+!', ' ', $backslash_styles);
    $clean_styles_w = str_replace("'", "\"", $clean_styles);
    $is_admin_bar = is_admin_bar_showing() ? 'true' : 'false';
    $mk_json_encode = json_encode($app_json);
    $output .= '  
    php = {
        hasAdminbar: '.$is_admin_bar.',
        json: ('.$mk_json_encode.' != null) ? '.$mk_json_encode.' : "",
        styles:  \''.$clean_styles_w.'\',
        jsPath: \''.THEME_JS.'\'
      };
      
    var styleTag = document.createElement("style"),
      head = document.getElementsByTagName("head")[0];

    styleTag.type = "text/css";
    styleTag.innerHTML = php.styles;
    head.appendChild(styleTag);
    </script>';

    echo $output;

     }
}

add_action('wp_footer', 'mk_dynamic_css_injection');
/*-----------------*/


/*
 * Adds Schema.org tags
 */
if (!function_exists('mk_html_tag_schema')) {
      function mk_html_tag_schema()
      {
            $schema = 'http://schema.org/';
            if (is_single()) {
                  $type = "Article";
            } elseif (is_author()) {
                  $type = 'ProfilePage';
            } elseif (is_search()) {
                  $type = 'SearchResultsPage';
            } else {
                  $type = 'WebPage';
            }
            
            echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
      }
}
/*-----------------*/



/* 
Generates dummy images if 
*/
function mk_thumbnail_image_gen($image, $width, $height) {
   $default = includes_url() . 'images/media/default.png';
   if(($image == $default) || empty($image)) {

      $default_url = THEME_IMAGES . '/dummy-images/dummy-'.mt_rand(1,7).'.png';

      if(!empty($width) && !empty($height)) {
         $image = bfi_thumb($default_url, array(
          'width' => $width,
          'height' => $height,
          'crop' => true
          ));
          return $image; 
      }
      return $default_url;
   } else {
      return $image;
   }

}


/* 
Uses get_the_excerpt() to print an excerpt by specifying a maximium number of characters. 
*/
function the_excerpt_max_charlength($charlength) {
      $excerpt = get_the_excerpt();
      $charlength++;

      if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                  echo mb_substr( $subex, 0, $excut );
            } else {
                  echo $subex;
            }
            echo '[...]';
      } else {
            echo $excerpt;
      }
}




function mk_current_page_url() {
  $pageURL = 'http';
  if( isset($_SERVER["HTTPS"]) ) {
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
  }
  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}


/*
 * Login ajax functions
 */
function ajax_login_init() {

      global $mk_options;

      $theme_js_hook = ($mk_options['minify-js'] == 'true') ? 'theme-scripts-min' : 'theme-scripts';

      wp_localize_script( $theme_js_hook, 'ajax_login_object', array(
                  'ajaxurl' => admin_url( 'admin-ajax.php' ),
                  'redirecturl' => mk_current_page_url(),
                  'loadingmessage' => __( 'Sending user info, please wait...' , 'mk_framework')
            ) );

}
if ( !is_user_logged_in() ) {
      add_action( 'wp_footer', 'ajax_login_init' );
}

add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );

function ajax_login() {
      check_ajax_referer( 'ajax-login-nonce', 'security' );

      // Nonce is checked, get the POST data and sign user on
      $info = array();
      $info['user_login'] = $_POST['username'];
      $info['user_password'] = $_POST['password'];
      $info['remember'] = true;

      $user_signon = wp_signon( $info, false );
      if ( is_wp_error( $user_signon ) ) {
            echo json_encode( array( 'loggedin'=>false, 'message'=>__( 'Wrong username or password.', 'mk_framework' ) ) );
      } else {
            echo json_encode( array( 'loggedin'=>true, 'message'=>__( 'Login successful, redirecting...', 'mk_framework' ) ) );
      }

      die();
}
/*-----------------*/







/* removes Contactform 7 styles */
remove_action('wp_enqueue_scripts', 'wpcf7_enqueue_styles');



/*
Register your custom function to override some LayerSlider data
*/
add_action('layerslider_ready', 'my_layerslider_overrides');
function my_layerslider_overrides() {
    $GLOBALS['lsAutoUpdateBox'] = false;
}
/*-----------------*/




/* Convert hexdec color string to rgb(a) string */
function mk_hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
          return $default; 

    //Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}




/*
Adds debugging information to front-end
*/
function mk_theme_debugging_info()
{
     $theme_data = wp_get_theme(); 
    echo '<meta name="generator" content="'.wp_get_theme().' '.$theme_data['Version'].'" />'. "\n";
     
}
add_action('wp_head', 'mk_theme_debugging_info');



/*
Removes version paramerters from scripts and styles.
*/
function mk_remove_wp_ver_css_js($src)
{
     global $mk_options;
     if ($mk_options['remove-js-css-ver'] == 'false') {
          if (strpos($src, 'ver='))
               $src = remove_query_arg('ver', $src);
     }
     return $src;
}
add_filter('style_loader_src', 'mk_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'mk_remove_wp_ver_css_js', 9999);


/**
 * Content Width Calculator
 *
 * Retrieves the content width based on $grid-width
 *
 * @param string  $layout param
 */
if (!function_exists('mk_content_width')) {
     function mk_content_width($layout = 'full')
     {
          
          global $mk_options;
          
          if ($layout == 'full') {
               
               return $mk_options['grid_width'] - 40;
          } else {
               
               return round(($mk_options['content_width'] / 100) * $mk_options['grid_width'] - 40);
          }
     }
}
/*-----------------*/



/**
 * Adds Next/Previous post navigations to single posts
 *
 */

function mk_post_nav($same_category = true, $taxonomy = 'category')
{

  global $mk_options;

  if(is_singular('portfolio') && $mk_options['portfolio_next_prev'] != 'true') return false;

  if(is_singular('post') && $mk_options['blog_prev_next'] != 'true') return false;


      $options = array();
      $options['same_category'] = $same_category;
      $options['excluded_terms'] = '';

      $options['type'] = get_post_type();
      $options['taxonomy'] = $taxonomy;

      if(!is_singular() || is_post_type_hierarchical($options['type'])) 
            $options['is_hierarchical'] = true;
      if($options['type'] === 'topic' || $options['type'] === 'reply') 
            $options['is_bbpress'] = true;

    $options = apply_filters('mk_post_nav_settings', $options);
    if(!empty($options['is_bbpress']) || !empty($options['is_hierarchical'])) 
      return;

      $entries['prev'] = get_previous_post($options['same_category'], $options['excluded_terms'], $options['taxonomy']);
      $entries['next'] = get_next_post($options['same_category'], $options['excluded_terms'], $options['taxonomy']);

      $entries = apply_filters('mk_post_nav_entries', $entries, $options);
      $output = "";


      foreach ($entries as $key => $entry)
      {
        if(empty($entry)) continue;

        $post_type =  get_post_type($entry->ID);

        $icon   = $post_image = "";
        $link  = get_permalink($entry->ID);
        $image = get_the_post_thumbnail($entry->ID, 'thumbnail');
        $class = $image ? "with-image" : "without-image";
        $icon = ($key == 'prev') ? '<i class="mk-icon-long-arrow-left"></i>' : '<i class="mk-icon-long-arrow-right"></i>';
        $output .= '<a class="mk-post-nav mk-post-'.$key.' '.$class.'" href="'.$link.'">';
          
          
          $output .= '<span class="pagnav-wrapper">';
          $output .= '<span class="pagenav-top">';

          $icon = '<span class="mk-pavnav-icon">'.$icon.'</span>';

          if($image) {
            $post_image = '<span class="pagenav-image">'.$image.'</span>';
          }

        $output .= $key == 'next' ?  $icon.$post_image : $post_image.$icon;
        $output .= "</span>";

        $output .= '<div class="nav-info-container">';
        $output .= '<span class="pagenav-bottom">';

        $output .= '<span class="pagenav-title">'.get_the_title($entry->ID).'</span>';

         if($post_type == 'post') {
             //$output .= '<span class="pagenav-category">'.get_the_category_list( ', ', 'single', $entry->ID ).'</span>';

             } elseif ($post_type == 'portfolio') { 
                $terms = get_the_terms($entry->ID, 'portfolio_category');
                $terms_slug = array();
                $terms_name = array();
                if (is_array($terms)) {
                  foreach($terms as $term) {
                    $terms_name[] = $term->name;
                      }
                }
              $output .= '<span class="pagenav-category">'.implode(', ', $terms_name).'</span>';
               } elseif ($post_type == 'product') { 
                $terms = get_the_terms($entry->ID, 'product_cat');
                $terms_slug = array();
                $terms_name = array();
                if (is_array($terms)) {
                  foreach($terms as $term) {
                    $terms_name[] = $term->name;
                      }
                }
              $output .= '<span class="pagenav-category">'.implode(', ', $terms_name).'</span>';
               } elseif($post_type == 'news'){
                $terms = get_the_terms($entry->ID, 'news_category');
                $terms_slug = array();
                $terms_name = array();
                if (is_array($terms)) {
                  foreach($terms as $term) {
                    $terms_name[] = $term->name;
                      }
                } 
                $output .= '<span class="pagenav-category">'.implode(', ', $terms_name).'</span>';
              }
         $output .= "</span>";  
          $output .= "</div>";     
        $output .= "</span>";
          $output .= "</a>";
      }
      echo $output;
}
add_action( 'wp_footer', 'mk_post_nav' );





function mk_get_fontfamily( $element_name, $id, $font_family, $font_type ) {
    $output = '';
    if ( $font_type == 'google' ) {
        if ( !function_exists( "my_strstr" ) ) {
            function my_strstr( $haystack, $needle, $before_needle = false ) {
                if ( !$before_needle ) return strstr( $haystack, $needle );
                else return substr( $haystack, 0, strpos( $haystack, $needle ) );
            }
        }
        wp_enqueue_style( $font_family, '//fonts.googleapis.com/css?family=' .$font_family.':300italic,400italic,600italic,700italic,800italic,400,300,800,700,600' , false, false, 'all' );
        $format_name = strpos( $font_family, ':' );
        if ( $format_name !== false ) {
            $google_font =  my_strstr( str_replace( '+', ' ', $font_family ), ':', true );
        } else {
            $google_font = str_replace( '+', ' ', $font_family );
        }
        $output .= '<style>'.$element_name.$id.' {font-family: "'.$google_font.'"}</style>';

    } else if ( $font_type == 'fontface' ) {

            $stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
            $font_dir = FONTFACE_URI;
            if ( file_exists( $stylesheet ) ) {
                $file_content = file_get_contents( $stylesheet );
                if ( preg_match( "/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$font_family\\1.*?}/is", $file_content, $match ) ) {
                    $fontface_style = preg_replace( "/url\s*\(\s*['|\"]\s*/is", "\\0$font_dir/", $match[0] )."\n";
                }
                $output = "\n<style>" . $fontface_style ."\n";
                $output .= $element_name.$id.' {font-family: "'.$font_family.'"}</style>';
            }

        } else if ( $font_type == 'safefont' ) {
            $output .= '<style>'.$element_name.$id.' {font-family: '.$font_family.' !important}</style>';
        }

    return $output;
}



/**
 * Retrieves Portfolio Categories
 *
 * @param string  $id   current post ID
 * @param string  $link to return link or text.
 */

if (!function_exists('mk_get_portfolio_tax')) {
     function mk_get_portfolio_tax($id, $link = true)
     {
          
          if (empty($id))
               return;
          
          $terms      = get_the_terms($id, 'portfolio_category');
          $terms_slug = array();
          $terms_name = array();
          if (is_array($terms) && !empty($terms)) {
               if ($link == true) {
                    foreach ($terms as $term) {
                         $terms_name[] = '<a href="' . get_term_link($term->slug, 'portfolio_category') . '">' . $term->name . '</a>';
                    }
               } else {
                    foreach ($terms as $term) {
                         $terms_name[] = $term->name;
                    }
               }
               return $terms_name;
          }
          return array();
     }
}
/*-----------------*/







if (!function_exists('mk_shortcode_empty_paragraph_fix')) {
     function mk_shortcode_empty_paragraph_fix($content)
     {
          $array = array(
               '<p>[' => '[',
               ']</p>' => ']',
               ']<br />' => ']'
          );
          
          $content = strtr($content, $array);
          
          return $content;
     }
}

/* Safe way to remove autop tags inside shortcodes without touching wordpress filters and default behaviors. */
add_filter('the_content', 'mk_shortcode_empty_paragraph_fix');
/*-----------------*/






if (!function_exists('mk_add_ajax_library')) {
     function mk_add_ajax_library()
     {
          $html = '<script type="text/javascript">';
          $html .= 'var ajaxurl = "' . admin_url('admin-ajax.php') . '"';
          $html .= '</script>';
          echo $html;
     }
}

add_action('wp_enqueue_scripts', 'mk_add_ajax_library');
/*-----------------*/




if (!function_exists('mk_get_shop_id')) {
     function mk_get_shop_id()
     {
          if(function_exists('is_woocommerce') && is_woocommerce() && is_archive()) {

              return wc_get_page_id( 'shop' );

          } else {

            return false;
          }
     }
}

if (!function_exists('mk_is_woo_archive')) {
     function mk_is_woo_archive()
     {
          if(function_exists('is_woocommerce') && is_woocommerce() && is_archive()) {

              return wc_get_page_id( 'shop' );

          } else {

            return false;
          }
     }
}


if (!function_exists('global_get_post_id')) {
     function global_get_post_id()
     {
          if(function_exists('is_woocommerce') && is_woocommerce() && is_shop()) {

              return wc_get_page_id( 'shop' );

          } else if(is_singular() || is_home()) {

            global $post;

            return $post->ID;

          }else {

            return false;
          }
     }
}



function mk_get_attachment_id_from_url($attachment_url = '')
{
     
     global $wpdb;
     $attachment_id = false;
     
     // If there is no url, return.
     if ('' == $attachment_url)
          return;
     
     // Get the upload directory paths
     $upload_dir_paths = wp_upload_dir();
     
     // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
     if (false !== strpos($attachment_url, $upload_dir_paths['baseurl'])) {
          
          // If this is the URL of an auto-generated thumbnail, get the URL of the original image
          $attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);
          
          // Remove the upload path base directory from the attachment URL
          $attachment_url = str_replace($upload_dir_paths['baseurl'] . '/', '', $attachment_url);
          
          // Finally, run a custom database query to get the attachment ID from the modified attachment URL
          $attachment_id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url));
          
     }
     
     return $attachment_id;
}
/*-----------------*/







if (!function_exists('mk_flush_rules')) {
     function mk_flush_rules()
     {
          if (get_option('mk_jupiter_flush_rules')) {
               global $wp_rewrite;
               $wp_rewrite->flush_rules();
               delete_option('mk_jupiter_flush_rules');
          }
          
     }
     
     add_action('wp_loaded', 'mk_flush_rules');
}
/*-----------------*/




/*
 * Contact Form ajax function
 */

add_action('wp_ajax_nopriv_mk_contact_form', 'mk_contact_form');
add_action('wp_ajax_mk_contact_form', 'mk_contact_form');


function mk_contact_form()
{
     $sitename = get_bloginfo('name');
     $siteurl  = home_url();
     
     $to      = isset($_POST['to']) ? trim($_POST['to']) : '';
     $name    = isset($_POST['name']) ? trim($_POST['name']) : '';
     $last_name    = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
     $phone   = isset($_POST['phone']) ? trim($_POST['phone']) : '';
     $email   = isset($_POST['email']) ? trim($_POST['email']) : '';
     $content = isset($_POST['content']) ? trim($_POST['content']) : '';
     
     
     $error = false;
     if ($to === '' || $email === '' || $content === '' || $name === '') {
          $error = true;
     }
     if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)) {
          $error = true;
     }
     if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $to)) {
          $error = true;
     }
     
     if ($error == false) {
          $subject = sprintf(__('%1$s\'s message from %2$s', 'mk_framework'), $sitename, $name);
          $body    = __('Site: ', 'mk_framework') . $sitename . ' (' . $siteurl . ')' . "\n\n";
          $body .= __('Name: ', 'mk_framework') . $name . " " . $last_name . "\n\n";
          if (!empty($phone)) {
               $body .= __('Phone Number: ', 'mk_framework') . $phone . "\n\n";
          }
          $body .= __('Email: ', 'mk_framework') . $email . "\n\n";
          $body .= __('Messages: ', 'mk_framework') . $content;
          $headers = "From: $name $last_name <$email>\r\n";
          $headers .= "Reply-To: $email\r\n";
          
          
          if (wp_mail($to, $subject, $body, $headers)) {
               echo true;
          } else {
               echo false;
          }
          die();
     }
}
/*-----------------*/


/*
 * Demo Content Importer
 */
add_action('wp_ajax_mk_ajax_import_options', 'mk_ajax_import_options');

function mk_ajax_import_options() {
    include_once(THEME_DIR . '/demo-importer/engine/content_importer.php');
    parse_str($_POST["options"], $options);
    if (!empty($options['template'])) {

        $content_importer = new ContentImporter($_POST["options"]);
        $content_importer->import();
        $options['template'] = '';
   }
}



/*
 * Converts Hex value to RGBA if needed.
 */
if (!function_exists('mk_color')) {
     function mk_color($colour, $alpha)
     {
          if (!empty($colour)) {
               if ($alpha >= 0.95) {
                    return $colour; // If alpha is equal 1 no need to convert to RGBA, so we are ok with it. :)
               } else {
                    if ($colour[0] == '#') {
                         $colour = substr($colour, 1);
                    }
                    if (strlen($colour) == 6) {
                         list($r, $g, $b) = array(
                              $colour[0] . $colour[1],
                              $colour[2] . $colour[3],
                              $colour[4] . $colour[5]
                         );
                    } elseif (strlen($colour) == 3) {
                         list($r, $g, $b) = array(
                              $colour[0] . $colour[0],
                              $colour[1] . $colour[1],
                              $colour[2] . $colour[2]
                         );
                    } else {
                         return false;
                    }
                    $r      = hexdec($r);
                    $g      = hexdec($g);
                    $b      = hexdec($b);
                    $output = array(
                         'red' => $r,
                         'green' => $g,
                         'blue' => $b
                    );
                    
                    return 'rgba(' . implode($output, ',') . ',' . $alpha . ')';
               }
          }
     }
}
/*-----------------*/



/*
 * Converts Hex value to RGBA if needed.
 */
function mk_typekit_script() {
  global $mk_options;


if(isset($mk_options['typekit_id']) && $mk_options['typekit_id'] != '') {
  echo '<script type="text/javascript" src="//use.typekit.net/'.$mk_options['typekit_id'].'.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
}

}

/*-----------------*/


add_action( 'wp_head', 'mk_typekit_script');







if (!function_exists('mk_ago')) {
     function mk_ago($time)
     {
          $periods = array(
               __("second", 'mk_framework'),
               __("minute", 'mk_framework'),
               __("hour", 'mk_framework'),
               __("day", 'mk_framework'),
               __("week", 'mk_framework'),
               __("month", 'mk_framework'),
               __("year", 'mk_framework'),
               __("decade", 'mk_framework')
          );
          $lengths = array(
               "60",
               "60",
               "24",
               "7",
               "4.35",
               "12",
               "10"
          );
          
          $now = time();
          
          $difference = $now - $time;
          $tense      = __("ago", 'mk_framework');
          
          for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
               $difference /= $lengths[$j];
          }
          
          $difference = round($difference);
          
          if ($difference != 1) {
               $periods[$j] .= "s";
          }
          
          return "$difference $periods[$j] {$tense} ";
     }
}
/*-----------------*/










if (!function_exists('hexDarker')) {
     function hexDarker($hex, $factor = 30)
     {
          $new_hex = '';
          if ($hex == '' || $factor == '') {
               return false;
          }
          
          $hex = str_replace('#', '', $hex);
          
          $base['R'] = hexdec($hex{0} . $hex{1});
          $base['G'] = hexdec($hex{2} . $hex{3});
          $base['B'] = hexdec($hex{4} . $hex{5});
          
          
          foreach ($base as $k => $v) {
               $amount      = $v / 100;
               $amount      = round($amount * $factor);
               $new_decimal = $v - $amount;
               
               $new_hex_component = dechex($new_decimal);
               if (strlen($new_hex_component) < 2) {
                    $new_hex_component = "0" . $new_hex_component;
               }
               $new_hex .= $new_hex_component;
          }
          
          return '#' . $new_hex;
     }
}
/*-----------------*/








if (!function_exists('mk_get_skin_color')) {
     function mk_get_skin_color()
     {
          global $mk_options;     
          if (isset($_GET['skin'])) {
               return $_GET['skin'];
               ;
          } else {
               return $mk_options['skin_color'];
          }
     }
}
/*-----------------*/







if (!function_exists('mk_add_admin_bar_link')) {
     function mk_add_admin_bar_link()
     {
          global $wp_admin_bar;
          $theme_data = wp_get_theme();
          if (!is_super_admin() || !is_admin_bar_showing())
               return;
          $wp_admin_bar->add_menu(array(
               'id' => 'masterkey_setrtings',
               'title' => __('Theme Options', 'mk_framework'),
               'href' => admin_url('admin.php?page=masterkey')
          ));
     }
}
add_action('admin_bar_menu', 'mk_add_admin_bar_link', 25);
/*-----------------*/






/*
 * Adds Extra
 */
add_action('show_user_profile', 'mk_show_extra_profile_fields');
add_action('edit_user_profile', 'mk_show_extra_profile_fields');


if (!function_exists('mk_show_extra_profile_fields')) {
     function mk_show_extra_profile_fields($user)
     {
?>

    <h3>User Social Networks</h3>

    <table class="form-table">

        <tr>
            <th><label for="twitter">Twitter</label></th>

            <td>
                <input type="text" name="twitter" id="twitter" value="<?php
          echo esc_attr(get_the_author_meta('twitter', $user->ID));
?>" class="regular-text" /><br />
                <span class="description">Please enter your Twitter Profile URL.</span>
            </td>
        </tr>

    </table>
<?php
     }
}


add_action('personal_options_update', 'my_save_extra_profile_fields');
add_action('edit_user_profile_update', 'my_save_extra_profile_fields');


if (!function_exists('my_save_extra_profile_fields')) {
     function my_save_extra_profile_fields($user_id)
     {
          
          if (!current_user_can('edit_user', $user_id))
               return false;
          update_user_meta($user_id, 'twitter', $_POST['twitter']);
     }
}
/*-----------------*/







/*
 * Removes wordpress default excerpt brakets from its endings
 */
if (!function_exists('mk_theme_excerpt_more')) {
     function mk_theme_excerpt_more($excerpt)
     {
          return str_replace('[...]', '', $excerpt);
     }
}
add_filter('wp_trim_excerpt', 'mk_theme_excerpt_more');
/*-----------------*/






/*
 * Gives the text widget capability of inserting shortcode.
 */
if (!function_exists('mk_theme_widget_text_shortcode')) {
     function mk_theme_widget_text_shortcode($content)
     {
          $content          = do_shortcode($content);
          $new_content      = '';
          $pattern_full     = '{(\[raw\].*?\[/raw\])}is';
          $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
          $pieces           = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
          
          foreach ($pieces as $piece) {
               if (preg_match($pattern_contents, $piece, $matches)) {
                    $new_content .= $matches[1];
               } else {
                    $new_content .= do_shortcode($piece);
               }
          }
          
          return $new_content;
     }
}
add_filter('widget_text', 'mk_theme_widget_text_shortcode');
add_filter('widget_text', 'do_shortcode');
/*-----------------*/




/* Blog & Portfolio Pagination */
if (!function_exists('mk_theme_blog_pagenavi')) {
     function mk_theme_blog_pagenavi($before = '', $after = '', $blog_query, $paged)
     {
          global $wpdb, $wp_query;
          
          /*if (is_single())
               return;*/
          
          $pagenavi_options = array(
               'pages_text' => '',
               'current_text' => '%PAGE_NUMBER%',
               'page_text' => '%PAGE_NUMBER%',
               'dotright_text' => __('...', 'mk_framework'),
               'dotleft_text' => __('...', 'mk_framework'),
               'num_pages' => 4,
               'always_show' => 0,
               'num_larger_page_numbers' => 3,
               'larger_page_numbers_multiple' => 10,
               'use_pagenavi_css' => 0
          );
          if (is_archive() || is_search()) {
               $request = $wp_query->request;
          } else {
               $request = $blog_query->request;
          }
          
          $posts_per_page = intval(get_query_var('posts_per_page'));
          global $wp_version;
          if ((is_front_page() || is_home()) && version_compare($wp_version, "3.1", '>=')) { //fix wordpress 3.1 paged query
               $paged = (get_query_var('paged')) ? intval(get_query_var('paged')) : intval(get_query_var('page'));
          } else {
               $paged = intval(get_query_var('paged'));
          }
          if (is_archive() || is_search()) {
               $numposts = $wp_query->found_posts;
               $max_page = intval($wp_query->max_num_pages);
          } else {
               $numposts = $blog_query->found_posts;
               $max_page = intval($blog_query->max_num_pages);
          }
          
          
          if (empty($paged) || $paged == 0)
               $paged = 1;
          $pages_to_show         = intval($pagenavi_options['num_pages']);
          $larger_page_to_show   = intval($pagenavi_options['num_larger_page_numbers']);
          $larger_page_multiple  = intval($pagenavi_options['larger_page_numbers_multiple']);
          $pages_to_show_minus_1 = $pages_to_show - 1;
          $half_page_start       = floor($pages_to_show_minus_1 / 2);
          $half_page_end         = ceil($pages_to_show_minus_1 / 2);
          $start_page            = $paged - $half_page_start;
          
          if ($start_page <= 0)
               $start_page = 1;
          
          $end_page = $paged + $half_page_end;
          if (($end_page - $start_page) != $pages_to_show_minus_1) {
               $end_page = $start_page + $pages_to_show_minus_1;
          }
          
          if ($end_page > $max_page) {
               $start_page = $max_page - $pages_to_show_minus_1;
               $end_page   = $max_page;
          }
          
          if ($start_page <= 0)
               $start_page = 1;
          
          $larger_pages_array = array();
          if ($larger_page_multiple)
               for ($i = $larger_page_multiple; $i <= $max_page; $i += $larger_page_multiple)
                    $larger_pages_array[] = $i;
          
          if ($max_page > 1 || intval($pagenavi_options['always_show'])) {
               $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
               $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
               
               echo '<div class="mk-pagination mk-grid">' . "\n";
               echo '<div class="mk-pagination-previous">';
               previous_posts_link('');
               echo '</div>';
               echo '<div class="mk-pagination-inner">';
               if (!empty($pages_text)) {
                    echo '<span class="pages">' . $pages_text . '</span>';
               }
               
               $larger_page_start = 0;
               foreach ($larger_pages_array as $larger_page) {
                    if ($larger_page < $start_page && $larger_page_start < $larger_page_to_show) {
                         $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
                         echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page-number" title="' . $page_text . '">' . $page_text . '</a>';
                         $larger_page_start++;
                    }
               }
               
               for ($i = $start_page; $i <= $end_page; $i++) {
                    if ($i == $paged) {
                         $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                         echo '<span class="current-page">' . $current_page_text . '</span>';
                    } else {
                         $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                         echo '<a href="' . esc_url(get_pagenum_link($i)) . '" class="page-number" title="' . $page_text . '">' . $page_text . '</a>';
                    }
               }
               
               $larger_page_end = 0;
               foreach ($larger_pages_array as $larger_page) {
                    if ($larger_page > $end_page && $larger_page_end < $larger_page_to_show) {
                         $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
                         echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page-number" title="' . $page_text . '">' . $page_text . '</a>';
                         $larger_page_end++;
                    }
               }
               
               echo '</div>';
               echo '<div class="mk-pagination-next">';
               next_posts_link('', $max_page);
               echo '</div>';
               echo '<div class="mk-total-pages">' . __('page', 'mk_framework') . '&nbsp;&nbsp;' . $current_page_text . '&nbsp;&nbsp;' . __('of', 'mk_framework') . '&nbsp;&nbsp;' . $max_page . '</div>';
               echo '</div>' . $after . "\n";
               
          }
     }
}


function mk_clean_dynamic_styles($value) {

  $clean_styles = preg_replace('!\s+!', ' ', $value);
  $clean_styles_w = str_replace("'", "\"", $clean_styles);

  return $clean_styles_w;

}

function mk_clean_init_styles($value) {

  $backslash_styles = str_replace('\\', '\\\\', $value);
  $clean_styles = preg_replace('!\s+!', ' ', $backslash_styles);
  $clean_styles_w = str_replace("'", "\"", $clean_styles);

  return $clean_styles_w;

}

//////////////////////////////////////////////////////////////////////////
// 
//  Global JSON object to collect all DOM related data
//  todo - move here all VC shortcode settings
//
//////////////////////////////////////////////////////////////////////////

function create_global_json() {
    $app_json = array();
    global $app_json;
}
create_global_json();

function create_global_modules() {
    $app_modules = array();
    global $app_modules;
}
create_global_modules();

function create_global_styles() {
    $app_styles = '';
    global $app_styles;
}
create_global_styles();


function create_global_dynamic_styles() {
    $app_dynamic_styles = array();
    global $app_dynamic_styles;
}
create_global_dynamic_styles();
