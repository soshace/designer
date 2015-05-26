<?php

class WCLA_LAGraphics_Post_Type {

    public function __construct() {
       // load_plugin_textdomain('mma', false, basename(dirname(__FILE__)) . '/languages');
        $this->register_post_type();       
        $this->taxonomies();
        $this->removeUnwantedMetaboxes();
        $this->metaboxes();
    }

    public function register_post_type() {
    	$args = array(
            'labels' => array(
                'name' => __('Graphics', 'designer'),
                'singular_name' => __('Graphic', 'designer'),
                'add_new_item' => __('Add new Image', 'designer'),
                'add_new' => __('Add new Image', 'designer'),
                'edit_item' => __('Edit Item', 'designer'),
                'view_item' => __('View item', 'designer'),
                'not_found' => __('No Images Found', 'designer'),
                'not_found_in_trash' => __('No Images found in trash', 'designer')
            ),        
            'query_var' => 'wcla_graphics',
            'rewrite' => array(
                'slug' => 'wcla_graphics',
            ),
            'public' => true,
            'menu_position' => 49,            
            'supports' => array(
                'title',
                //'thumbnail',
                //'editor',
            //'custom-fields'		
            ),
           //  'taxonomies'    => array('lagraphics_categories'),
            'show_in_nav_menus' 	=> false,           
            'show_in_menu'=>false
                );
        register_post_type('wcla_graphics', $args);
    }

    public function metaboxes() {
    	add_action('add_meta_boxes', function() {
                    //css id,title,callback func,page,priority, callback func arguments                                
                    add_meta_box('wcla_graphics_category', __('Category', 'designer'), 'wcla_graphics_category_cb', 'wcla_graphics');
                    add_meta_box('wcla_graphics_image', __('Image', 'designer'), 'wcla_graphics_image_cb', 'wcla_graphics');
                    add_meta_box('wcla_graphics_colorizable_elements', __('Colorizable Elements', 'designer'), 'wcla_graphics_colorizable_elements', 'wcla_graphics');
                    
                    
                  
        });

        function wcla_graphics_image_cb($post) {           
             //wp_nonce_field(__FILE__, 'mma_nonce');
            ?>
            <?php wp_nonce_field( plugin_basename( __FILE__ ), 'wcla_file_nonce' ); ?>
            <p>     
            	<?php if(get_post_meta($post->ID, 'wcla_graphics_file_url', true)!=''):?>
	            	<a href="<?php echo get_post_meta($post->ID, 'wcla_graphics_file_url', true) ?>" style="float:left"><img src="<?php echo get_post_meta($post->ID, 'wcla_graphics_file_url', true) ?>" height="40" width="40"></a>
	        	<?php endif;?>                             
                <label for="wcla_graphics_image_file">
                    Select Image File To Upload:
                </label>
                <input type="file" id="wcla_graphics_image_file" name="wcla_graphics_image_file" value="" accept="image/*" />
                
                
            </p>
            <div style="clear:both"></div>
            <p>
            	<?php if(get_post_meta($post->ID, 'wcla_graphics_thumb_file_url', true)!=''):?>
	            	<a href="<?php echo get_post_meta($post->ID, 'wcla_graphics_thumb_file_url', true) ?>" style="float:left"><img src="<?php echo get_post_meta($post->ID, 'wcla_graphics_thumb_file_url', true) ?>" height="40" width="40"></a>
	        	<?php endif;?> 
                <label for="wcla_graphics_image_thumb_file">
                    Select Image Thumb File To Upload:
                </label>
                <input type="file" id="wcla_graphics_image_thumb_file" name="wcla_graphics_image_thumb_file" value="" accept="image/*"/>                
            </p>
            <?php
        }

        function wcla_graphics_category_cb($post){
            echo WCLA_LAGraphics_Post_Type::getTaxonomyCombo('lagraphics_categories','category_id',get_post_meta($post->ID, 'wcla_graphics_category_id', true)==''? 0 :get_post_meta($post->ID, 'wcla_graphics_category_id', true));
        }

        function wcla_graphics_colorizable_elements($post){
        	$colorizable_elements=maybe_unserialize(get_post_meta($post->ID,'wcla_graphic_colorizable_elements',true));
        	?>
        	        	
			
			        <div class="wcla_content">           
			            <ul class="wcla_list_content">
			                <?php if (is_array($colorizable_elements) && count($colorizable_elements) > 0): ?>                
			                    <?php foreach ($colorizable_elements as $k => $colorizable_element): ?>
			                        <li class="wcla_list_content_row wcla_clear" id="colorizable_element-<?php echo $k ?>">
			                            <table class="table-grid">
			                                <thead>
			                                    <tr>
			                                        <td>Name<span class="required">*</span></td>
			                                        <td>Id<span class="required">*</span></td>
			                                    </tr>   
			                                </thead>
			                                <tbody>
			                                    <tr>
			                                        <td><input type="text" name="wcla_colorizable_element[<?php echo $k ?>][name]" id="wcla_colorizable_element_name_<?php echo $k ?>" class="wcla_textbox" value="<?php echo $colorizable_element["name"] ?>"/></td>
			                                        <td><input type="text" name="wcla_colorizable_element[<?php echo $k ?>][id]" id="wcla_colorizable_element_id_<?php echo $k ?>" class="wcla_textbox" value="<?php echo $colorizable_element["id"] ?>" /></td>
			                                    </tr>
			                                    <tr>
			                                        <td colspan="2">
			                                            <div id="wcla_colorizable_element_colors_<?php echo $k ?>" class="wcla_product_properties wc-metabox postbox">
			                                                <h3>Colors</h3>
			                                                <div class="inside">
			                                                    <table class="table-grid" style="margin:10px;">
			                                                        <thead>
			                                                            <tr>
			                                                                <td>Name<span class="required">*</span></td>
			                                                                <td>Value<span class="required">*</span></td>
			                                                                <td style="width:40px"></td>
			                                                            </tr>
			                                                        </thead>
			                                                        <tbody id="color_<?php echo $k ?>">
			                                                            <?php if (isset($colorizable_element["colors"]) && $colorizable_element["colors"] > 0): ?>
			                                                                <?php foreach ($colorizable_element["colors"] as $key => $color): ?>
			                                                                    <tr id="wcla_colorizable_element_<?php echo $k ?>_color_row_<?php echo $key ?>">
			                                                                        <td>
			                                                                            <input type="text" name="wcla_colorizable_element[<?php echo $k ?>][colors][<?php echo $key ?>][name]"  class="wcla_textbox" value="<?php echo $color["name"] ?>"/>
			                                                                        </td>
			                                                                        <td>
			                                                                            <input type="text" name="wcla_colorizable_element[<?php echo $k ?>][colors][<?php echo $key ?>][value]"  class="wcla_textbox" value="<?php echo $color["value"] ?>"/>
			                                                                        </td>
			                                                                        <td>
			                                                                            <button class="button button-primary wcla_printing_area" type="button" onclick="delElement('wcla_colorizable_element_<?php echo $k ?>_color_row_<?php echo $key ?>')">Delete</button><div class="wcla_clear"> 
			                                                                        </td>
			                                                                    </tr>
			                                                                <?php endforeach; ?>
			                                                            <?php endif; ?>
			                                                        </tbody>   
			                                                    </table>
			                                                    <div class="toolbar"><button class="button button-primary wcla_add_row_color_button wcla_right" type="button" value="wcla_colorizable_element_colors_<?php echo $k ?>">Add</button><div class="wcla_clear"></div></div>
			                                                </div>
			                                            </div>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table> 
			                            <span class="wcla_left wcla_clear wcla_pad0 wcla_print_area_btn wcla_remove_btn"><button class="button button-primary wcla_printing_area" type="button" onclick="delElement('colorizable_element-<?php echo $k ?>')">Delete</button><div class="wcla_clear"></div></span>
			
			                            <div class="wcla_clear"></div><input type="hidden" value="<?php echo $k ?>" name="wcla_colorizable_elements[]"/>
			                        </li>
			                    <?php endforeach; ?>
			                <?php endif; ?>
			            </ul>
			            <div class="wcla_clear"></div>
			        </div>
					<div class="wcla_clear"></div>
			        <div class="toolbar">
			            <button class="button button-primary wcla_add_col_elements wcla_right" type="button">Add</button>
			            <div class="wcla_clear"></div>
			        </div>
					
        	
		       	<?php
		        /**
		         * Graphic Type Javascript
		         */
		        ob_start();
		        ?>
		        <script type="text/javascript">
		        	var cecnt=<?php echo count($colorizable_elements);?>;
			        jQuery(function(){
			        	jQuery('#wcla_graphics_colorizable_elements').on('click','.wcla_add_col_elements',function(){
				        jQuery('#wcla_graphics_colorizable_elements ul.wcla_list_content').append(
				        '<li class="wcla_list_content_row wcla_clear" id="colorizable_element-'+cecnt+'">'
				            +'<table class="table-grid">'
				                +'<thead>'
				                    +'<tr>'
				                        +'<td>'
				                            +'Name<span class="required">*</span>'
				                        +'</td>'    
				                        +'<td>'
				                            +'Id<span class="required">*</span>'                            
				                        +'</td> '                           
				                    +'</tr>'   
				                +'</thead>'
				                +'<tbody>'
				                   +'<tr>'
				                       +'<td><input type="text" name="wcla_colorizable_element['+cecnt+'][name]" id="wcla_colorizable_element_name_'+cecnt+'" class="wcla_textbox"/></td>'
				                       +'<td><input type="text" name="wcla_colorizable_element['+cecnt+'][id]" id="wcla_colorizable_element_id_'+cecnt+'" class="wcla_textbox"/></td>'
				                   +'</tr>' 
				                   +'<tr>'
				                       +'<td colspan="2">'
				                           +'<div id="wcla_colorizable_element_colors_'+cecnt+'" class="wcla_product_properties wc-metabox postbox">'
				                               +'<h3>Colors</h3>'
				                               +'<div class="inside">'
				                                   +'<table class="table-grid" style="margin:10px;">'
				                                        +'<thead>'
				                                            +'<tr>'
				                                                +'<td>'
				                                                    +'Name<span class="required">*</span>'
				                                                +'</td>'    
				                                                +'<td>'
				                                                    +'Value<span class="required">*</span>'                            
				                                                +'</td> '
				                                                +'<td style="width:40px"></td>'
				                                            +'</tr>'   
				                                        +'</thead>'
				                                        +'<tbody id="color_'+cecnt+'">'
				                                        +'</tbody>'    
				                                    +'</table>'    
				                                   +'<div class="toolbar"><button class="button button-primary wcla_add_row_color_button wcla_right" type="button" value="wcla_colorizable_element_colors_'+cecnt+'">Add</button><div class="wcla_clear"></div></div>'
				                               +'</div>'
				                           +'</div>'    
				                       +'</td>'
				                   +'</tr>'
				                +'</tbody>'    
				            +'</table>'    
				        	+'<span class="wcla_left wcla_clear wcla_pad0 wcla_print_area_btn wcla_remove_btn"><button class="button button-primary wcla_printing_area" type="button" onclick="delElement(\'colorizable_element-'+cecnt+'\')">Delete</button><div class="wcla_clear"></div></span>'
				          
				            +'<div class="wcla_clear"></div><input type="hidden" value="'+cecnt+'" name="wcla_colorizable_elements[]"/></li>'
				        );
				        cecnt++;               
				
				        });
				        
				        jQuery('#wcla_graphics_colorizable_elements').on('click','.wcla_add_row_color_button',function(){
				            var cnt=parseInt(jQuery("#"+jQuery(this).val()+" tbody tr").length);
				            cnt++;
				            var idxStr=jQuery("#"+jQuery(this).val()+" tbody").attr("id");
				            var idArr=idxStr.split("_");            
				                       
				            jQuery("#"+jQuery(this).val()+" tbody").append(
				                '<tr id="wcla_colorizable_element_'+idArr[1]+'_color_row_'+cnt+'">'
				                    +'<td>'
				                      +'<input type="text" name="wcla_colorizable_element['+idArr[1]+'][colors]['+cnt+'][name]"  class="wcla_textbox"/>'  
				                    +'</td>'
				                    +'<td>'
				                      +'<input type="text" name="wcla_colorizable_element['+idArr[1]+'][colors]['+cnt+'][value]"  class="wcla_textbox"/>'  
				                    +'</td>'
				                    +'<td>'
				                      +'<button class="button button-primary wcla_printing_area" type="button" onclick="delElement(\'wcla_colorizable_element_'+idArr[1]+'_color_row_'+cnt+'\')">Delete</button><div class="wcla_clear">'  
				                    +'</td>'
				               +'</tr>'    
				            );
				            
				        });
			        });
			    </script>    
		        <?php
		
			        $javascript = ob_get_clean();
			       // $woocommerce->add_inline_js($javascript);
			       echo $javascript;
        
		        ?>
        
        	<?php
        }
    

        add_action('save_post', function($post_id) {
                    if ($_POST /*&& wp_verify_nonce($_POST["mma_nonce"], __FILE__)*/) {

                       update_post_meta($post_id, 'wcla_graphics_category_id', $_POST["category_id"]);
                       
                       
                       if ( user_can_save( $post_id, plugin_basename( __FILE__ ), 'wcla_file_nonce' ) ) {
 								//var_dump($_FILES);die(); 
                            if ( has_files_to_upload( 'wcla_graphics_image_file' ) ) {

                            
                                if ( isset( $_FILES['wcla_graphics_image_file'] ) ) {
                                    update_option('upload_path','wp-content/uploads/wcla/gallery/images');
                                    $file = wp_upload_bits( $_FILES['wcla_graphics_image_file']['name'], null, @file_get_contents( $_FILES['wcla_graphics_image_file']['tmp_name'] ) );
                                    update_option('upload_path','');
                                    if ( FALSE === $file['error'] ) {

                                        if(get_post_meta($post_id, 'wcla_graphics_file_path', true)!=''){
                                            unlink(get_post_meta($post_id, 'wcla_graphics_file_path', true));
                                        }
                                         update_post_meta($post_id, 'wcla_graphics_file_path', $file["file"]);
                                         update_post_meta($post_id, 'wcla_graphics_file_url', $file["url"]);
                                    }

                            
                                }

                                if ( isset( $_FILES['wcla_graphics_image_thumb_file'] ) ) {
                                    update_option('upload_path','wp-content/uploads/wcla/gallery/thumbs');
                                    $file = wp_upload_bits( $_FILES['wcla_graphics_image_thumb_file']['name'], null, @file_get_contents( $_FILES['wcla_graphics_image_thumb_file']['tmp_name'] ) );
                                    update_option('upload_path','');
                                    if ( FALSE === $file['error'] ) {

                                        if(get_post_meta($post_id, 'wcla_graphics_thumb_file_path', true)!=''){
                                            unlink(get_post_meta($post_id, 'wcla_graphics_thumb_file_path', true));
                                        }
                                         update_post_meta($post_id, 'wcla_graphics_thumb_file_path', $file["file"]);
                                         update_post_meta($post_id, 'wcla_graphics_thumb_file_url', $file["url"]);
                                    }

                            
                                }
                                
                            }
    
                        }
                        
                        $colorizable_elements=array();
					    if(isset($_POST["wcla_colorizable_elements"])){
					        foreach ($_POST["wcla_colorizable_elements"] as $key => $val) {
					            $colorizable_elements[]=isset($_POST["wcla_colorizable_element"][$val])?$_POST["wcla_colorizable_element"][$val]:array();
					        }
					    }
					   // var_dump($_POST["wcla_colorizable_elements"],$_POST["wcla_colorizable_element"],$colorizable_elements);die();
					    update_post_meta($post_id, 'wcla_graphic_colorizable_elements', $colorizable_elements);
                      
                    }
                });	
    }

    public function taxonomies() {
        $taxonomies = array();
        $taxonomies["lagraphics_categories"] = array(
            'hierarchical' => false,
            'show_ui'=>true,
            'query_var' => 'lagraphics_categories',
            //'rewrite' => 'gyms/countries',
            'labels' => array(
                'name' => __('Graphics Categories', 'designer'),
                'singular_name' => __('Graphic Categories', 'designer'),
                'add_new_item' => __('Add new Category', 'designer'),
                'add_new' => __('Add new Category', 'designer'),
                'edit_item' => __('Edit Item', 'designer'),
                'all_items' => __('All Categories', 'designer'),
                'search_items' => __('Search Categories', 'designer'),
                'pupular_items' => __('Popular Categories', 'designer'),
                'add_or_remove_items' => __('Add or remove category', 'designer')
            )
        );
      

        $this->register_all_taxonomies($taxonomies);
    }

    public function register_all_taxonomies($taxonomies) {
        foreach ($taxonomies as $name => $arr) {
            register_taxonomy($name, array('wcla_graphics'), $arr);
        }
    }

    private function removeUnwantedMetaboxes() {
            add_action('admin_menu', function() {
                        remove_meta_box('tagsdiv-lagraphics_categories', 'wcla_graphics', 'core');
                    });
        }

     public static function getTaxonomyCombo($taxonomy,$name,$selected=0) {
        $args = array(
            'show_option_all' => '',
            'show_option_none' => '',
            'orderby' => 'ID',
            'order' => 'ASC',
            'show_last_update' => 0,
            'show_count' => 0,
            'hide_empty' => 0,
            'child_of' => 0,
            'exclude' => '',
            'echo' => 1,
            'selected' => $selected,
            'hierarchical' => true,
            'name' => $name,
            'id' => $name,
            'class' => 'postform',
            'depth' => 1,
            'tab_index' => 0,
            'taxonomy' => $taxonomy,
            'hide_if_empty' => false);

        wp_dropdown_categories($args);
    }    
}

?>