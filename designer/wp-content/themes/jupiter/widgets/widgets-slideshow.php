<?php

/*
	TESTIMONIAL WIDGET
*/

class Artbees_Widget_Slideshow extends WP_Widget {

	function Artbees_Widget_Slideshow() {
		$widget_ops = array( 'classname' => 'widget_mini_slidshow', 'description' => 'Displays a mini slideshow.' );
		$this->WP_Widget( 'mini_slidshow_widget', THEME_SLUG.' - '.'Mini Slideshow', $widget_ops );


	}


	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Mini Slideshow' : $instance['title'], $instance, $this->id_base );
		$count = (int)$instance["count"];
		$width = (int)$instance["width"];
		$height = (int)$instance["height"];
		$random = rand( 0, 999999 );
		$output = '<div class="mk-widget-mini-slideshow mk-flexslider" id="testimonial_slider_' . $random . '"><ul class="mk-flex-slides">';
		if ( $count > 0 ) {

			for ( $i=1; $i<=$count; $i++ ) {
				$src =  isset( $instance["src_".$i] ) ? $instance["src_".$i] : '';
				require_once(THEME_FUNCTIONS . "/bfi_cropping.php");
				$image_src = bfi_thumb( $src, array('width' => $width, 'height' => $height)); 
				$output .= '<li>';
				$output .= '<img alt="" src="'.$image_src.'" />';
				$output .= '</li>';

			}
		}

		$output .= "</ul></div>";

		if ( !empty( $output ) ) {
			echo $before_widget;

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

			if ( $title )
				echo $before_title . $title . $after_title;

			echo $output;
			echo $after_widget;

		}

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['count'] = (int)$new_instance['count'];
		$instance['width'] = (int)$new_instance['width'];
		$instance['height'] = (int)$new_instance['height'];
		for ( $i=1;$i<=$instance['count'];$i++ ) {
			$instance["src_".$i] = isset( $new_instance['src_'.$i] ) ? strip_tags( $new_instance['src_'.$i] ) : ' ';
		}

		return $instance;
	}


	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 3;
		$width = isset( $instance['width'] ) ? absint( $instance['width'] ) : 300;
		$height = isset( $instance['height'] ) ? absint( $instance['height'] ) : 260;
		for ( $i=1;$i<=10;$i++ ) {
			$src = 'src_'.$i;
			$$src = isset( $instance[$src] ) ? $instance[$src] : '';
		}


?>

		<p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mk_framework'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

		 <p><label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Image width', 'mk_framework'); ?></label>
		<input id="<?php echo $this->get_field_id( 'width' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo $width; ?>" size="3" /></p>

		 <p><label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Image height', 'mk_framework'); ?></label>
		<input id="<?php echo $this->get_field_id( 'height' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo $height; ?>" size="3" /></p>


		       <p><label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('How many slides?', 'mk_framework'); ?></label>
		<input id="<?php echo $this->get_field_id( 'count' ); ?>" class="social_icon_custom_count widefat" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $count; ?>" size="3" /></p>


<div class="social_custom_icon_wrap" style="margin-top:50px;">
<?php for ( $i=1;$i<=10;$i++ ): $src = 'src_'.$i; ?>
<div class="social_icon_custom_<?php echo $i;?>" <?php if ( $i>$count ):?>style="display:none;"<?php endif;?> style="padding-bottom:10px">
<p>
<label for="<?php echo $this->get_field_id( $src ); ?>"><?php printf( '#%s Image URL:', $i );?></label>
<input class="widefat" id="<?php echo $this->get_field_id( $src ); ?>" name="<?php echo $this->get_field_name( $src ); ?>" type="text" value="<?php echo $$src; ?>" />
</p>
</div>

		<?php endfor;?>
		</div>



	<?php
	}
}
/***************************************************/
