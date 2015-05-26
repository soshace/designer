<?php

/*
	NEWS TEASER WIDGET
*/

class Artbees_Widget_News_Feed extends WP_Widget {

	function Artbees_Widget_News_Feed() {
		$widget_ops = array( 'classname' => 'widget_news_feed', 'description' => 'Displays a News posts slider.' );
		$this->WP_Widget( 'news_feed_widget', THEME_SLUG.' - '.'News Slider', $widget_ops );


		add_action( "save_post", array( &$this, "flush_widget_cache" ) );
		add_action( "deleted_post", array( &$this, "flush_widget_cache" ) );
		add_action( "switch_theme", array( &$this, "flush_widget_cache" ) );


	}


	function widget( $args, $instance ) {

		$cache = wp_cache_get( "Artbees_Widget_News_Feed", "widget" );
		global $mk_options;

		if ( !is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}
		ob_start();
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Latest News' : $instance['title'], $instance, $this->id_base ); 

		if ( !$count = (int) $instance['count'] )
			$count = 10;
		else if ( $count < 1 )
				$count = 1;
			else if ( $count > 15 )
					$count = 15;
		$random = uniqid();

		$query = array( 'showposts' => $count, 'post_type' => 'news', 'nopaging' => 0, 'orderby'=> 'date', 'order'=>'DESC', 'post_status' => 'publish', 'ignore_sticky_posts' => 1 );

		$r = new WP_Query( $query );

		if ( $r-> have_posts() ) :

			echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title; ?>


       <div class="news-widget-slider mk-flexslider" id="testimonial_slider_<?php echo $random; ?>"><ul class="mk-flex-slides">

		<?php

		while ( $r-> have_posts() ) : $r -> the_post();

		?>
		<li>
		<?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>" class="news-widget-thumbnail">
        <?php		
				$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
				$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 500, 'height' => 250)); 
			?><img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo $image_src; ?>" />
		</a>
		<?php endif; ?>

		<h4 class="news-widget-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="news-widget-excerpt"><?php the_excerpt(); ?></div>
		<a href="<?php echo get_permalink(); ?>" class="mk-read-more"><?php _e('Read more' , 'mk_framework'); ?><i class="mk-icon-double-angle-right"></i></a>
		</li>
		<?php endwhile;  ?>
        </ul>
        <?php if($mk_options['news_page'] != '') : ?>
				<a class="mk-button mk-skin-button three-dimension small" href="<?php echo get_permalink($mk_options['news_page']); ?>"><i class="mk-icon-double-angle-right"></i><?php _e('Back to News', 'mk_framework'); ?></a>
		<?php endif; ?>
		<div>
        <?php
		

		wp_reset_query();


		endif;

		
		 ?>

<script type="text/javascript">

		jQuery(document).ready(function() {
			
		jQuery('#testimonial_slider_<?php echo $random; ?>').flexslider({
			selector: ".mk-flex-slides > li",
			animation: "fade",              //String: Select your animation type, "fade" or "slide"
			smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
			slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationSpeed: 400,            //Integer: Set the speed of animations, in milliseconds
			pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
			controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			prevText: "",           //String: Set the text for the "previous" directionNav item
			nextText: ""              //String: Set the text for the "next" directionNav item
	});

		});
</script>
            <?php

    $cache[$args['widget_id']] = ob_get_flush();
	wp_cache_set( 'Artbees_Widget_News_Feed', $cache, 'widget' );        

	echo $after_widget;

		}



	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['count'] = (int)$new_instance['count'];
	
		$this-> flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['Artbees_Widget_News_Feed'] ) )
			delete_option( 'Artbees_Widget_News_Feed' );

		return $instance;
	}


	function flush_widget_cache() {
		wp_cache_delete( 'Artbees_Widget_News_Feed', 'widget' );
	}


	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 3;


?>

		<p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mk_framework'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

      <p><label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of News', 'mk_framework'); ?></label>
		<input id="<?php echo $this->get_field_id( 'count' ); ?>"  name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $count; ?>" size="3" /></p>




	<?php
	}
}
/***************************************************/
