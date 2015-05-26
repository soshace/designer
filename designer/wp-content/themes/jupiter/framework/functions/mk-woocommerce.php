<?php

global $woocommerce, $mk_options;


/*
* Check if Woocommerce plugin is enabled.
*/
function mk_woocommerce_enabled() {
	if ( class_exists( 'woocommerce' ) ) { return true; }
	return false;
}

if ( !mk_woocommerce_enabled() ) { return false; }
/******************/

require_once (THEME_FRAMEWORK . "/woocommerce-quantity-increment/woocommerce-quantity-increment.php");

/*
* Declares support to woocommerce
*/
add_theme_support( 'woocommerce' );
/******************/



/*
* Overrides woocommerce styles and scripts modified and created by theme
*/
function mk_woocommerce_assets() {
	$theme_data = wp_get_theme("Jupiter");
	wp_enqueue_style( 'woocommerce', THEME_STYLES.'/woocommerce.css', false, $theme_data['Version'], 'all'  );
}

add_filter( 'woocommerce_enqueue_styles', 'mk_woocommerce_assets' );
/******************/


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action( 'woocommerce_before_main_content', 'mk_woocommerce_output_content_wrapper', 10);
add_action( 'woocommerce_after_main_content', 'mk_woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);



//remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );


//add_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
add_action( 'woocommerce_archive_description', 'mk_woocommerce_product_archive_description', 10 );

function mk_woocommerce_product_archive_description() {
		if ( is_post_type_archive( 'product' )) {
			$shop_page   = get_post( wc_get_page_id( 'shop' ) );
			if ( $shop_page ) {
				$description = apply_filters( 'the_content', $shop_page->post_content );
				if ( $description ) {
					echo $description;
				}
			}
		}
	}

	

function mk_woocommerce_output_content_wrapper() {
	global $mk_options;
	$padding = '';
	if(is_singular('product')) {
			$page_layout = $mk_options['woocommerce_single_layout'];
	} else if(global_get_post_id()) {
		$page_layout = get_post_meta(global_get_post_id(), '_layout', true);
		$padding = get_post_meta(global_get_post_id(), '_padding', true );
	} else if(mk_is_woo_archive()) {
		$page_layout = get_post_meta(mk_is_woo_archive(), '_layout', true);
	}


	if(isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
		$page_layout = $_REQUEST['layout'];
	}
	$page_layout = (isset($page_layout) && !empty($page_layout)) ? $page_layout : 'full';
	
	$padding = ($padding == 'true') ? 'no-padding' : '';

?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout <?php echo $padding; ?>  mk-grid row-fluid vc_row-fluid">
			<div class="theme-content <?php echo $padding; ?>">
<?php
}





function mk_woocommerce_output_content_wrapper_end() {
	global $mk_options;
	if(is_singular('product'))  {
		$page_layout = $mk_options['woocommerce_single_layout'];
	} 
	else if(global_get_post_id()) {
		$page_layout = get_post_meta(global_get_post_id(), '_layout', true);
	} else if(mk_is_woo_archive()) {
		$page_layout = get_post_meta(mk_is_woo_archive(), '_layout', true);
	}

	if(isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
		$page_layout = $_REQUEST['layout'];
	}

	$page_layout = (isset($page_layout) && !empty($page_layout)) ? $page_layout : 'full';

	
?>
		</div>
	<?php if($page_layout != 'full') get_sidebar(); ?>	
		<div class="clearboth"></div>	
		</div>
	</div>
</div>
<?php
}




add_filter('add_to_cart_fragments', 'mk_woocommerce_header_add_to_cart_fragment');
if ( ! function_exists( 'mk_woocommerce_header_add_to_cart_fragment' ) ) { 
    function mk_woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        
        ob_start();
        
        ?>
     <a class="mk-shoping-cart-link" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="mk-moon-cart-2"></i><span class="mk-header-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span></a>
        <?php
        
        $fragments['a.mk-shoping-cart-link'] = ob_get_clean();
        
        return $fragments;
        
    }
}





remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 10 );

add_action( 'woocommerce_proceed_to_checkout', 'mk_woocommerce_button_proceed_to_checkout', 10 );

if ( ! function_exists( 'mk_woocommerce_button_proceed_to_checkout' ) ) {

	/**
	 * Output the proceed to checkout button.
	 *
	 * @subpackage	Cart
	 */
	function mk_woocommerce_button_proceed_to_checkout() {
		$checkout_url = WC()->cart->get_checkout_url();

		?>
		<a href="<?php echo $checkout_url; ?>" class="checkout-button shop-flat-btn shop-skin-btn wc-forward"><?php _e( 'Proceed to Checkout', 'mk_framework' ); ?></a>

		<?php
	}
}

