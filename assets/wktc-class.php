<?php
/**
 * WP_WKTC Class
 *
 * Class for helping online store owners keep the change.
 *
 * @since 	1.0.0
 * @package WKTC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WP_WKTC.
 *
 * Keep the change class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'WP_WKTC' ) ) :

class WP_WKTC {

	/**
	 * WooCommerce Keep The Change
	 *
	 * Add custom fee to cart automatically
	 *
	 */
	public function woo_keepthechange() {

		global $woocommerce;

		$real_cart_total = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );
		$ktc_cart_total  = ceil( $real_cart_total ); // greater 1
		$ktc_fee         = $ktc_cart_total - $real_cart_total;

		$woocommerce->cart->add_fee( __( 'Keep the change', 'WKTC' ), $ktc_fee );

	}

}

endif;
