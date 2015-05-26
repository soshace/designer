<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
wp_enqueue_script( 'jquery-ui-tabs' );

if ( ! empty( $tabs ) ) : ?>
<div class="clearboth"></div>
	<div class="mk-woo-tabs">
		<ul class="mk-tabs-tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo $key ?>_tab">
					<a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>

			<?php endforeach; ?>
			<div class="clearboth"></div>
		</ul>
		<div class="mk-tabs-panes">
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="mk-tabs-pane" id="tab-<?php echo $key ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			<div class="clearboth"></div>
			</div>

		<?php endforeach; ?>
		</div>
		<div class="clearboth"></div>
	</div>

<?php endif; ?>