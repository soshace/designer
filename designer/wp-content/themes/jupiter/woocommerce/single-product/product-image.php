<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;


?>
<div class="images mk-single-images">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', true );
			

			$attachment_count   = count( $product->get_gallery_attachment_ids() );


			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" data-fancybox-group="product-gallery" class="mk-woocommerce-main-image mk-lightbox" title="%s" ><img src="'. mk_thumbnail_image_gen($image_src_array[ 0 ], false, false).'" alt="'.$image_title.'" itemprop="image" /></a>', $image_link, $image_title), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
