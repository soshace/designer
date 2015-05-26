<?php

/*
	CONTACT FORM WIDGET
*/

class Artbees_Widget_Contact_Form extends WP_Widget {

	function Artbees_Widget_Contact_Form() {
		$widget_ops = array( 'classname' => 'widget_contact_form', 'description' => 'Displays a email contact form.' );
		$this->WP_Widget( 'contact_form', THEME_SLUG.' - '.'Contact Form', $widget_ops );
	}



	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Contact Us' : $instance['title'], $instance, $this->id_base );
		$email= $instance['email'];
		$phone = !empty( $instance['phone'] )?$instance['phone']:false;
		$captcha = !empty( $instance['captcha'] )?$instance['captcha']:false;
		
		$id = mt_rand(99,999);        
	    $tabindex_1 = $id;
	    $tabindex_2 = $id + 1;
	    $tabindex_3 = $id + 2;
	    $tabindex_4 = $id + 3;
	    $tabindex_5 = $id + 4;

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

?>

	<form class="mk-contact-form" method="post" novalidate="novalidate">
			<input type="text" placeholder="<?php _e( 'Name', 'mk_framework' ); ?>" required="required" name="contact_name" class="text-input" value="" tabindex="<?php echo $tabindex_1; ?>" />
			<?php if($phone == true) { ?>
			<input type="text" placeholder="<?php _e( 'Phone Number', 'mk_framework' ); ?>" name="contact_phone" class="text-input" value="" tabindex="<?php echo $tabindex_2; ?>" />
			<?php } ?>
			<input type="email" required="required" placeholder="<?php _e( 'Email', 'mk_framework' ); ?>" name="contact_email" class="text-input" value="" tabindex="<?php echo $tabindex_3; ?>"  />
			<textarea placeholder="<?php _e( 'Type your message...', 'mk_framework' ); ?>" required="required" name="contact_content" class="textarea" tabindex="<?php echo $tabindex_4; ?>"></textarea>
			<?php if($captcha == true) { ?>
			<input placeholder="<?php _e( 'Enter Captcha', 'mk_framework' ); ?>" type="text" name="captcha" class="captcha-form text-input full" required="required" autocomplete="off" />
                <a href="#" class="captcha-change-image"><?php _e( 'Not readable? Change text.', 'mk_framework' ); ?></a>
                <img src="<?php echo THEME_DIR_URI; ?>/captcha/captcha.php" class="captcha-image" alt="captcha txt"> <br/>
			<?php } ?>
			<div class="mk-form-row-widget">
   		        <button tabindex="<?php echo $tabindex_5; ?>" class="mk-progress-button mk-button mk-contact-button mk-skin-button flat-dimension small" data-style="move-up">
                    <span class="mk-progress-button-content"><?php _e( 'Send message', 'mk_framework' ); ?></span>
                    <span class="mk-progress">
                        <span class="mk-progress-inner"></span>
                    </span>
                    <span class="state-success"><i class="mk-moon-checkmark"></i></span>
                    <span class="state-error"><i class="mk-moon-close"></i></span>
                </button>
            </div>
			<input type="hidden" value="<?php echo antispambot($email); ?>" name="contact_to"/>
	</form>
<?php
		echo $after_widget;

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['email'] = $new_instance['email'];
		$instance['phone'] = !empty( $new_instance['phone']) ? true : false;
		$instance['captcha'] = !empty( $new_instance['captcha']) ? true : false;
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$email = isset( $instance['email'] ) ? $instance['email'] : get_bloginfo( 'admin_email' );
		$phone = isset( $instance['phone'] ) ? (bool)$instance['phone']  : false;
		$captcha = isset( $instance['captcha'] ) ? (bool)$instance['captcha']  : true;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mk_framework'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email:', 'mk_framework'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" /></p>
		<br>
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'captcha' ); ?>" name="<?php echo $this->get_field_name( 'captcha' ); ?>"<?php checked( $captcha ); ?> />
		<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Show Captcha?', 'mk_framework' ); ?></label></p>
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>"<?php checked( $phone ); ?> />
		<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Show Phone Numer Field?', 'mk_framework' ); ?></label></p>


<?php

	}

}
/***************************************************/