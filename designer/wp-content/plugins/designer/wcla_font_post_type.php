<?php

class WCLA_Font_Post_Type {

    public function __construct() {
       // load_plugin_textdomain('mma', false, basename(dirname(__FILE__)) . '/languages');
        $this->register_post_type();       
        $this->metaboxes();

        add_action( 'post_edit_form_tag' , 'post_edit_form_tag' );

        function post_edit_form_tag( ) {
            echo ' enctype="multipart/form-data"';
        }
    }

    public function register_post_type() {
        $args = array(
            'labels' => array(
                'name' => __('Fonts', 'designer'),
                'singular_name' => __('Font', 'designer'),
                'add_new_item' => __('Add new Font', 'designer'),
                'add_new' => __('Add new Font', 'designer'),
                'edit_item' => __('Edit Item', 'designer'),
                'view_item' => __('View item', 'designer'),
                'not_found' => __('No Font Found', 'designer'),
                'not_found_in_trash' => __('No Font found in trash', 'designer')
            ),        
            'query_var' => 'wcla_fonts',
            'rewrite' => array(
                'slug' => 'wcla_fonts',
            ),
            'public' => true,
            'menu_position' => 49,            
            'supports' => array(
                'title',
                //'thumbnail',
                //'editor',
            //'custom-fields'       
            ),
            //'show_ui'=>false,
            'show_in_nav_menus'     => false,
            'show_in_menu'=>false,
                );
        register_post_type('wcla_fonts', $args);
    }

    public function metaboxes() {
        add_action('add_meta_boxes', function() {
                    //css id,title,callback func,page,priority, callback func arguments            
                    add_meta_box('wcla_font_file', __('Details', 'designer'), 'wcla_font_file_cb', 'wcla_fonts');

                  
        });

        function wcla_font_file_cb($post) {           
             //wp_nonce_field(__FILE__, 'mma_nonce');
            ?>  
            <p>
                <label for="wcla_font_file">
                    Select File To Upload:
                </label>
                <input type="file" id="wcla_font_file" name="wcla_font_file" value="" /><?php echo get_post_meta($post->ID, 'wcla_font_file_path', true) ?>
                <?php wp_nonce_field( plugin_basename( __FILE__ ), 'font_file_nonce' ); ?>
            </p>
             <p>
                <label for="wcla_font_vector_file">
                    Select Vector File To Upload:
                </label>
                <input type="file" id="wcla_font_vector_file" name="wcla_font_vector_file" value="" /><?php echo get_post_meta($post->ID, 'wcla_font_vector_file_path', true) ?>
                <?php wp_nonce_field( plugin_basename( __FILE__ ), 'font_vector_file_nonce' ); ?>
            </p>
            <p>
                <label for="wcla_font_ascent">
                    Ascent:
                </label>
                <input type="text" id="wcla_font_ascent" name="wcla_font_ascent" value="<?php echo get_post_meta($post->ID, 'wcla_font_ascent', true) ?>"  />
            </p>
            <?php
        }

        

    

        add_action('save_post', function($post_id) {
                    if ($_POST /*&& wp_verify_nonce($_POST["mma_nonce"], __FILE__)*/) {
                        update_post_meta($post_id, 'wcla_font_ascent', $_POST["wcla_font_ascent"]);

                       if ( user_can_save( $post_id, plugin_basename( __FILE__ ), 'font_file_nonce' ) ) {
 //var_dump($_FILES);die(); 
                            if ( has_files_to_upload( 'wcla_font_file' ) ) {

                            
                                if ( isset( $_FILES['wcla_font_file'] ) ) {
                                    update_option('upload_path','wp-content/uploads/wcla/fonts');
                                    $file = wp_upload_bits( $_FILES['wcla_font_file']['name'], null, @file_get_contents( $_FILES['wcla_font_file']['tmp_name'] ) );
                                    update_option('upload_path','wp-content/uploads');
                                    //update_option('upload_path','');
                                    if ( FALSE === $file['error'] ) {

                                        if(get_post_meta($post_id, 'wcla_font_file_path', true)!=''){
                                            unlink(get_post_meta($post_id, 'wcla_font_file_path', true));
                                        }
                                         update_post_meta($post_id, 'wcla_font_file_path', $file["file"]);
                                         update_post_meta($post_id, 'wcla_font_file_url', $file["url"]);
                                    }

                            
                                }
                                
                            }
    
                        }
                        if ( user_can_save( $post_id, plugin_basename( __FILE__ ), 'font_vector_file_nonce' ) ) {
 //var_dump($_FILES);die(); 
                            if ( has_files_to_upload( 'wcla_font_vector_file' ) ) {

                            
                                if ( isset( $_FILES['wcla_font_vector_file'] ) ) {
                                    update_option('upload_path','wp-content/uploads/wcla/fonts');
                                    $file = wp_upload_bits( $_FILES['wcla_font_vector_file']['name'], null, @file_get_contents( $_FILES['wcla_font_vector_file']['tmp_name'] ) );
                                    //update_option('upload_path','');
                                    update_option('upload_path','wp-content/uploads');
                                    if ( FALSE === $file['error'] ) {

                                        if(get_post_meta($post_id, 'wcla_font_vector_file_path', true)!=''){
                                            unlink(get_post_meta($post_id, 'wcla_font_vector_file_path', true));
                                        }
                                         update_post_meta($post_id, 'wcla_font_vector_file_path', $file["file"]);
                                         update_post_meta($post_id, 'wcla_font_vector_file_url', $file["url"]);
                                    }

                            
                                }
                                
                            }
    
                        }
                    }
                }); 
    }
}
?>