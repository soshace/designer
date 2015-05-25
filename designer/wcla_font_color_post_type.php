<?php

class WCLA_Font_Color_Post_Type {

    public function __construct() {
       // load_plugin_textdomain('mma', false, basename(dirname(__FILE__)) . '/languages');
        $this->register_post_type();       
        $this->metaboxes();
    }

    public function register_post_type() {
    	$args = array(
            'labels' => array(
                'name' => __('Font Colors', 'designer'),
                'singular_name' => __('Font Color', 'designer'),
                'add_new_item' => __('Add new Font Color', 'designer'),
                'add_new' => __('Add new Font Color', 'designer'),
                'edit_item' => __('Edit Item', 'designer'),
                'view_item' => __('View item', 'designer'),
                'not_found' => __('No Color Found', 'designer'),
                'not_found_in_trash' => __('No Color found in trash', 'designer')
            ),        
            'query_var' => 'wcla_font_colors',
            'rewrite' => array(
                'slug' => 'wcla_font_colors',
            ),
            'public' => true,
            'menu_position' => 49,            
            'supports' => array(
                'title',
                //'thumbnail',
                //'editor',
            //'custom-fields'		
            ),
            'show_in_nav_menus' 	=> false,
          //  'show_ui'=>false,
            'show_in_menu'=>false
                );
        register_post_type('wcla_font_colors', $args);
    }

    public function metaboxes() {
    	add_action('add_meta_boxes', function() {
                    //css id,title,callback func,page,priority, callback func arguments            
                    add_meta_box('wcla_color_hex_value', __('Details', 'designer'), 'wcla_font_color_hex_value_cb', 'wcla_font_colors');
                  
        });

        function wcla_font_color_hex_value_cb($post) {           
             //wp_nonce_field(__FILE__, 'mma_nonce');
            ?>  
            <p>       			
            <label for="wcla_color_hex_value"><?php echo __('Value(hex)', 'designer') ?>:</label>
            <input type="text" id="wcla_color_hex_value" name="wcla_color_hex_value" value="<?php echo get_post_meta($post->ID, 'wcla_color_hex_value', true) ?>" class="widefat" />                       
            </p>
            <?php
        }

    

        add_action('save_post', function($id) {
                    if ($_POST /*&& wp_verify_nonce($_POST["mma_nonce"], __FILE__)*/) {
                        if (isset($_POST["wcla_color_hex_value"])) {
                            update_post_meta($id, 'wcla_color_hex_value', $_POST["wcla_color_hex_value"]);
                        }
                      
                    }
                });	
    }
}

?>