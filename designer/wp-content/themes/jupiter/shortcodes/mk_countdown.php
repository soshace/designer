<?php

extract( shortcode_atts( array(
			'title' => '',
			'offset' => '',
            'date' => '',
			'el_class' => '',
		), $atts ) );
$output =  '';
$output .= '<div class=" '.$el_class.' mk-event-countdown" data-offset="'.$offset.'" data-date="'.$date.'">';
if ( !empty( $title ) ) {
	$output .= '<div class="mk-event-title">'.$title.'</div>';
}
$output .= '<ul class="mk-event-countdown-ul">
                        <li>
                            <span class="days timestamp">00</span>
                            <span class="timeRef">'.__( 'days', 'mk_framework' ).'</span>
                        </li>
                        <li>
                            <span class="hours timestamp">00</span>
                            <span class="timeRef">'.__( 'hours', 'mk_framework' ).'</span>
                        </li>
                        <li>
                            <span class="minutes timestamp">00</span>
                            <span class="timeRef">'.__( 'minutes', 'mk_framework' ).'</span>
                        </li>
                        <li>
                            <span class="seconds timestamp">00</span>
                            <span class="timeRef">'.__( 'seconds', 'mk_framework' ).'</span>
                        </li>
                    </ul>';
$output .= '</div>';
echo $output;
