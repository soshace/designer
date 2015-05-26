<?php
   extract( shortcode_atts( array(
         'slides' => '',
         'slide_count' => '',
         'order'=> 'DESC',
         'orderby'=> 'date',
         'autoplay' => '',
         'make_3d' => '',
         'perspective' => '',
         'pause_on_hover' => '',
         'slider_easing' => '',
         'animation_speed' => '',
         'pause_time' => '',
         'direction_nav' => '',
         "el_class" => ''
      ), $atts ) );

      global $post, $mk_options;
      require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
      $query    = array(
         'post_type' => 'icarousel',
         'suppress_filters' => false
      );

      if ( !empty($slides) ) {
         $query['post__in'] = explode( ',', $slides );
      }
      if ( $order ) {
         $query['order'] = $order;
      }
      if ( $orderby ) {
         $query['orderby'] = $orderby;
      }

      $loop   = new WP_Query($query);
      $images = array();
      wp_print_scripts('jquery-icarousel');
      wp_print_scripts('jquery-raphael');
      $random_id = rand(100, 9999);
      $output    .= '<div class="mk-icarousel-slideshow mk-icarousel">
                        <div id="icarousel_' . $random_id . '">';
      while ($loop->have_posts()):
         $loop->the_post();
         $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
         $images[]        = array(
             'easing' => $slider_easing,
             'id' => get_the_id(),
             'pause_time' => $pause_time,
             'src' => $image_src_array[0]
         );

      foreach ($images as $image)
            {
            $pause_time = $image['pause_time'];
            $id         = $image['id'];
            $image_src  = bfi_thumb($image['src'], array(
                'width' => 470,
                'height' => 360
            ));
            $output .= '      <img width="480" height="360" data-pausetime="' . $pause_time . '" src="' . $image_src . '"  />';
            }
      endwhile;
      $output .= '   </div>
                  </div>';
      $output .= "<script type='text/javascript'>
                        jQuery(document).ready(function() {
                           jQuery(window).on('load',function () {
                              jQuery('#icarousel_".$random_id."').css('visibility', 'visible');
                              jQuery('#icarousel_".$random_id."').iCarousel({
                                   easing: '".$slider_easing."', // Easing timing (custom cubic-bezier function is acceptable)
                                   slides: ".$slide_count.", // How many slides will be shown (Must be an odd number)
                                   make3D: ".$make_3d.", // To Enable or Disable 3D effect.
                                   perspective: ".$perspective.", // The 3D perspective option. (Min 0 & Max 100);
                                   animationSpeed: ".$animation_speed.", // Slide transition speed (Microsecond)
                                   pauseTime: ".$pause_time.", // How long each slide will show (Microsecond)
                                   startSlide: 0, // Set starting Slide (0 index)
                                   directionNav: ".$direction_nav.", // Next & Previous navigation
                                   autoPlay: true, // To Enable or Disable the autoplay
                                   keyboardNav: true, // To Enable or Disable the keyboard navigation
                                   touchNav: true, // To Enable or Disable the touch navigation
                                   mouseWheel: true, // To Enable or Disable the mousewheel navigation
                                   pauseOnHover: ".$pause_on_hover.", // To Enable or Disable the carousel when mouse come over it
                                   randomStart: false, // Start on a random slide
                                   slidesSpace: 300, // Spaces between slides
                                   slidesTopSpace: 'auto', // Top Space for the slides
                                   direction: 'rtl', // Carousel direction when change (right-to-left) set like: 'rtl'
                                   timer: '360Bar', // Timer style: 'Pie', '360Bar' or 'Bar'
                                   timerBg: '#000', // Timer background
                                   timerColor: '".$mk_options['skin_color']."', // Timer color
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
                                   nextLabel: '', // To set the string of the next button (Multilanguage use)
                                   previousLabel: '', // To set the string of the previous button (Multilanguage use)
                                   playLabel: 'Play', // To set the string of the play button (Multilanguage use)
                                   pauseLabel: 'Pause', // To set the string of the pause button (Multilanguage use)
                                   onBeforeChange: function(){}, // Triggers before a slide change
                                   onAfterChange: function(){}, // Triggers after a slide change
                                   onLastSlide: function(){}, // Triggers when last slide is shown
                                   onAfterLoad: function(){}, // Triggers when carousel has loaded
                                   onPause: function(){}, // Triggers when carousel has paused
                                   onPlay: function(){} // Triggers when carousel has played
                              });
                           });
                        });
                  </script>";
      wp_reset_postdata();




echo $output;
