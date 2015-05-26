<aside id="mk-sidebar" class="mk-builtin">
    <div class="sidebar-wrapper">
    <?php  
    global $post;
    if(isset($post)){

    	mk_sidebar_generator( 'get_sidebar', $post->ID);

    }else{

    	mk_sidebar_generator( 'get_sidebar', false);

    } ?>
    </div>
</aside>