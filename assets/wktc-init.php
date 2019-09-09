<?php
/**
 * Plugin Initializer
 *
 * Initializes the whole plugin.
 *
 * @since   1.0.0
 * @package WKTC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Welcome And Setting Page.
 *
 * @since 1.0.1
 */
if ( file_exists( WKTC_DIR . '/assets/admin/welcome/welcome-init.php' ) ) {
	require_once WKTC_DIR . '/assets/admin/welcome/welcome-init.php';
}



/**
 * If no WooCommerce then add a notice and exit.
 *
 * @since  1.0.0
 */
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {


	/**
	 * Require TGMPA.
	 *
	 * @since 1.0.0
	 */
	if ( file_exists( WKTC_DIR . '/assets/tgmpa/wktc-tgmpa.php' ) ) {
		require_once WKTC_DIR . '/assets/tgmpa/wktc-tgmpa.php';
	}

	return; // return since there is no need for the class to be included.

}



/**
 * WP_WKTC Class.
 *
 * Add only if WooCommerce class exists.
 *
 * @since 1.0.0
 */
if ( file_exists( WKTC_DIR . '/assets/wktc-class.php' ) ) {
	require_once WKTC_DIR . '/assets/wktc-class.php';
}


/**
 * Actions/Filters for WKTC.
 *
 * Classes:
 *          1. WP_WKTC
 */
if ( class_exists( 'WP_WKTC' ) ) {

	/**
	 * Object: WP_WKTC class.
	 *
	 * @since 1.0.0
	 */
	$wktc_init = new WP_WKTC();

	add_action( 'woocommerce_cart_calculate_fees', array( $wktc_init, 'woo_keepthechange' ) );

}
