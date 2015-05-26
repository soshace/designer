<?php

extract( shortcode_atts( array(
			'title' => '',
			'number' => '',
			'display_number' => '',
			"el_class" => '',
		), $atts ) );

echo '<a href="skype:'.$number.'?call" class="mk-skype-call mk-shortcode '.$el_class.'"><i class="mk-social-skype"></i>' . $display_number . '</a>';
