<?php
/**
 * Plugin Initializer
 *
 * Initializes the whole plugin.
 *
 * @since 	1.0.0
 * @package WKTC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * If no WooCommerce then add a notice and exit.
 *
 * @since  1.0.0
 */
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	/**
	 * Admin Notice to install/activate WooCommerce.
	 *
	 * @since 1.0.0
	 */
	function wktc_admin_notice_error() {
		$class   = 'notice notice-error is-dismissible';
		$message = __( 'Install & Activate WooCommerce before using Woo Keep The Change plugin!', 'sample-text-domain' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
	}
	add_action( 'admin_notices', 'wktc_admin_notice_error' );


	/**
	 * Require TGMPA.
	 *
	 * @since 1.0.0
	 */
	if ( file_exists( WKTC_DIR . '/assets/tgmpa/wktc-tgmpa.php' ) ) {
	    require_once( WKTC_DIR . '/assets/tgmpa/wktc-tgmpa.php' );
	}


	return;

}



/**
 * WP_WKTC Class.
 *
 * Add only if WooCommerce class exists.
 *
 * @since 1.0.0
 */
if ( file_exists( WKTC_DIR . '/assets/wktc-class.php' ) ) {
  require_once( WKTC_DIR . '/assets/wktc-class.php' );
}


/**
 * Actions/Filters for WKTC.
 *
 * Classes:
 * 			1. WP_WKTC
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
