<?php

global $mk_settings;

extract( shortcode_atts( array(
            'column_number' => 4,
            'columns' => '',
            'style' => '',
            'orderby'=> 'date',
            'order'=> 'DESC',
            'title_size' => '20',
            'icon_color' => $mk_settings['accent-color'],
            'icon_hover_color' => $mk_settings['accent-color'],
            'icon_size' => 48,
            'txt_color' => '#444',
            'txt_hover_color'=> '#fff',
            'btn_color'=> '#444',
            'btn_hover_color' => '#fff',
            'btn_hover_txt_color' => '#fff',
            'border_color' => '',
            'bg_color' => '#fff',
            'bg_hover_color' => '#333333',
            'el_class' =>'',
            'column_height' => 500,
            'animation' => '',
        ), $atts ) );

$query = array(
    'post_type'=>'animated-columns',
    'showposts' => -1,
);

if ( $columns ) {
    $query['post__in'] = explode( ',', $columns );
}
if ( $orderby ) {
    $query['orderby'] = $orderby;
}
if ( $order ) {
    $query['order'] = $order;
}

switch ($column_number) {
    case 1:
        $column_css = 'one-column';
        break;
    case 2:
        $column_css = 'two-column';
        break;
    case 3:
        $column_css = 'three-column';
        break;
    case 4:
        $column_css = 'four-column';
        break;
    case 5:
        $column_css = 'five-column';
        break;
    case 6:
        $column_css = 'six-column';
        break;
    case 7:
        $column_css = 'seven-column';
        break;
    case 8:
        $column_css = 'eight-column';
        break;
    default:
        $column_css = 'four-column';
        break;
}
    

$r = new WP_Query( $query );
global $post;

$id = uniqid();

$animation_css = ( $animation != '' ) ? ' mk-animate-element ' . $animation . ' ' : '';
$border_color_css = (!empty($border_color)) ? 'has-border ' : '';


$output = '<div id="animated-columns-'.$id.'" class="mk-animated-columns '.$style.'-style '.$column_css.' '.$border_color_css.$animation_css.$el_class.'">';

while ( $r->have_posts() ) : $r->the_post();

    $icon_type = get_post_meta( $post->ID, '_icon_type', true );
    $icon_type = !empty($icon_type) ? $icon_type : 'icon';
    $icon = get_post_meta( $post->ID, '_icon', true );
    $image_icon = get_post_meta( $post->ID, '_image_icon', true );
    $title = get_post_meta( $post->ID, '_title', true );
    $desc = get_post_meta( $post->ID, '_desc', true );
    $link = get_post_meta( $post->ID, '_link', true );
    $btn_txt = get_post_meta( $post->ID, '_btn_text', true );
    $target = get_post_meta( $post->ID, '_target', true );

    
    $output .= '<div class="animated-column-item">';

    if($style == 'simple') {
        $output .= !empty($link) ? '<a href="'.$link.'" target="'.$target.'">' : '';            
        $output .= '<div class="animated-column-holder">';
        if($icon_type == 'image') {
            $output .= '<div class="animated-column-icon animated-column-image-icon"><img src="'.$image_icon.'" /></div>';
        } else {
            $output .= '<i class="'.$icon.' animated-column-icon"></i>';
        }
        $output .= '</div>';
        $output .= '<div class="animated-column-title"><span class="animated-column-simple-title">'.$title.'</span></div>';
        $output .= !empty($link) ? '</a>' : '';

    } else {
        $output .= '<div class="animated-column-holder">';
        if($icon_type == 'image') {
            $output .= '<div class="animated-column-icon animated-column-image-icon"><img src="'.$image_icon.'" /></div>';
        } else {
            $output .= '<i class="'.$icon.' animated-column-icon"></i>';
        }
        $output .= '<div class="animated-column-title">'.$title.'</div>';
        $output .= '</div>';
        $output .= '<p class="animated-column-desc">'.$desc.'</p>';
        if(!empty($link)) {
        $output .='<div class="animated-column-btn">
                    '.do_shortcode( '[mk_button dimension="savvy" corner_style="pointed" outline_skin="custom" outline_active_color="'.$btn_color.'" outline_hover_skin="'.$btn_hover_color.'" outline_hover_color='.$btn_hover_txt_color.' size="small" target="'.$target.'" align="center" url="'.$link.'"]'.$btn_txt.'[/mk_button]' ).'
                    </div>';
        }
    }
    $output .= '</div>';

    
endwhile;

$output .= '</div>';

// Get global JSON contructor object for styles and create local variable
global $app_dynamic_styles;
$app_styles = '';

$border_full = !empty($border_color) ? ('border-top:1px solid '.$border_color.';') : '';
$border_color = !empty($border_color) ? ('border-color:'.$border_color.';') : '';
$icon_color = !empty($icon_color) ? ('color:'.$icon_color.';') : '';
$icon_hover_color = !empty($icon_hover_color) ? ('color:'.$icon_hover_color.';') : '';

$app_styles .= "
#animated-columns-{$id}.has-border {
   {$border_full}
}
#animated-columns-{$id}.has-border .animated-column-item {
    border-left-width:1px;
    border-bottom-width:1px;
    {$border_color}
}

#animated-columns-{$id} .animated-column-item {
    background-color:{$bg_color};
    min-height:{$column_height}px;
}

#animated-columns-{$id} .animated-column-item:hover {
    background-color:{$bg_hover_color};
}

#animated-columns-{$id} .animated-column-item:hover .animated-column-title:after {
    background-color:{$txt_hover_color}     
}

#animated-columns-{$id} .animated-column-icon {
    {$icon_color}
    font-size:{$icon_size}px;
}
#animated-columns-{$id} .animated-column-image-icon {
    width:{$icon_size}px;
}

#animated-columns-{$id} .animated-column-image-icon img {
    max-width:100%;
}

#animated-columns-{$id} .animated-column-item:hover .animated-column-icon{
    {$icon_hover_color}
}

#animated-columns-{$id} .animated-column-title,
#animated-columns-{$id} .animated-column-desc{
      color:{$txt_color};  
}

#animated-columns-{$id} .animated-column-title
{
      font-size:{$title_size}px;  
}

#animated-columns-{$id} .animated-column-title:after {
    background-color: {$txt_color};
}

#animated-columns-{$id} .animated-column-item:hover .animated-column-title,
#animated-columns-{$id} .animated-column-item:hover .animated-column-desc {
    color:{$txt_hover_color}     
}";

wp_reset_postdata();
echo $output;


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="mk-dynamic-styles">';
echo mk_clean_dynamic_styles($app_styles);
echo '</div>';


// Export styles to json for faster page load
$app_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $app_styles
);


// global $app_modules;

// $app_modules[] = array(
//   'name' => 'animated-columns',
//   'params' => array(
//       'id' => 'animated-columns-'.$id,
//     )
// );
