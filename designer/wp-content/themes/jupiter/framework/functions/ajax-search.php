<?php

    
    function mk_ajax_search(){  

        $search_term = $_REQUEST['term'];
        $search_term = apply_filters('get_search_query', $search_term);
        
        $search_array = array(
            's'=> $search_term, 
            'showposts'   => 8,
            'post_type' => 'any', 
            'post_status' => 'publish', 
            'post_password' => '',
            'suppress_filters' => 0
        );
        
        $query = http_build_query($search_array);
        
        $posts = get_posts( $query );


        $suggestions=array();  
      
        global $post;  
        foreach ($posts as $post): setup_postdata($post);  
            $suggestion = array();  
            $suggestion['label'] = esc_html($post->post_title);  
            $suggestion['link'] = get_permalink();  
            $suggestion['date'] = get_the_date();
            $suggestion['image'] = (has_post_thumbnail( $post->ID )) ? get_the_post_thumbnail($post->ID, 'thumbnail', array('title' => '')) : '<i class="mk-moon-pencil"></i>' ; 
            
    
            $suggestions[]= $suggestion;  
        endforeach;  
      
        // JSON encode and echo  
        $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";  
        echo $response;  
      
        // Don't forget to exit!  
        exit;  
    }  



  
function mk_ajax_search_init() {  
    global $mk_options;
    if($mk_options['header_search_location'] == 'beside_nav') {
        add_action( 'wp_ajax_mk_ajax_search', 'mk_ajax_search' );  
        add_action( 'wp_ajax_nopriv_mk_ajax_search', 'mk_ajax_search' ); 
    }
}  

add_action( 'init', 'mk_ajax_search_init' );

function mk_add_autocomplete_ui() {
    global $mk_options;
    if($mk_options['header_search_location'] == 'beside_nav') {
        wp_enqueue_script( 'jquery-ui-autocomplete');  
     }   
}

add_action( 'wp_enqueue_scripts', 'mk_add_autocomplete_ui' );