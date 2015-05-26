<?php
global $mk_options;
extract( shortcode_atts( array(
			'title' => '',
			'color' => $mk_options['skin_color'],
            'txt_color' => '',
            'bar_color' => 'rgba(0,0,0,0.12)',
            'percent_color' => 'rgba(0,0,0,0.5)',
			'percent' => 50,
            'line_height' => 22,
			'el_class' => '',
		), $atts ) );

$id = uniqid();
$txt_color = $txt_color ? (' style="color:'.$txt_color.'"') : '';
$font_size = $line_height * .6;

echo '<div id="mk-skill-meter-'.$id.'" class="mk-skill-meter mk-shortcode '.$el_class.'">
        <div class="mk-skill-meter-title"'.$txt_color.'>'.$title.'</div>
        <div class="mk-progress-bar" style="background-color:'.$bar_color.'">
            <span class="progress-outer" data-width="'.$percent.'" style="background-color:'.$color.';">
                <span class="progress-inner"></span>
            </span>
            <span class="progress-percent" style="color:'.$percent_color.'">'. $percent. '%' .'</span> 
        </div>
        <div class="clearboth"></div>
    </div>';



// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';


$app_styles.= '#mk-skill-meter-'.$id.' .mk-progress-bar { height: '.$line_height.'px; }';
if($line_height > '18') {
    $app_styles.= '#mk-skill-meter-'.$id.' .progress-percent { line-height: '.$line_height.'px; font-size: '.$font_size.'px; }';
} else {
    $app_styles.= '#mk-skill-meter-'.$id.' .progress-percent { top: -22px; }';
}


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);