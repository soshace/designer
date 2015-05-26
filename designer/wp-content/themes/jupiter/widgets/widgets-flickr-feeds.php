<?php

/*
	FLICKR WIDGET
*/
class Artbees_Widget_Flickr_feeds extends WP_Widget {

	function Artbees_Widget_Flickr_feeds() {
		$widget_ops = array( 'classname' => 'widget_flickr', 'description' => 'Displays photos from a Flickr ID' );
		$this->WP_Widget( 'flickr', THEME_SLUG.' - '.'Flickr', $widget_ops );

	}



	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Photos on flickr' : $instance['title'], $instance, $this->id_base );
		$flickr_id = $instance['flickr_id'];
		$count = (int)$instance['count'];
		$display = empty( $instance['display'] ) ? 'latest' : $instance['display'];

		if ( $count < 1 ) {
			$count = 1;
		}

		if ( !empty( $flickr_id ) ) {
			echo $before_widget;
			if ( $title )
				echo $before_title . $title . $after_title;

				$id = mt_rand(99, 999);			
?>


		<div id="flickr_feed_<?php echo $id; ?>" class="flickr-widget-wrapper">
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $count; ?>&amp;display=<?php echo $display; ?>&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickr_id; ?>"></script>
		</div>
		<div class="clearboth"></div>
		<?php
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['flickr_id'] = strip_tags( $new_instance['flickr_id'] );
		$instance['count'] = (int) $new_instance['count'];
		$instance['display'] = strip_tags( $new_instance['display'] );

		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$flickr_id = isset( $instance['flickr_id'] ) ? esc_attr( $instance['flickr_id'] ) : '';
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 3;
		$display = isset( $instance['display'] ) ? $instance['display'] : 'latest';
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mk_framework'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>">Flickr User id : (<a href="http://idgettr.com/" target="_blank">Get Your ID</a>)</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" type="text" value="<?php echo $flickr_id; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of photo to show:', 'mk_framework'); ?></label>
		<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo $count; ?>" size="3" /></p>
		<p><label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Method for display your photos:', 'mk_framework'); ?></label>
		<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>">
			<option<?php if ( $display == 'latest' ) echo ' selected="selected"'?> value="latest"><?php _e('Latest', 'mk_framework'); ?></option>
			<option<?php if ( $display == 'random' ) echo ' selected="selected"'?> value="random"><?php _e('Random', 'mk_framework'); ?></option>
		</select>

<?php
	}
}
/***************************************************/