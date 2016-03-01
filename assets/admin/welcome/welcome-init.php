<?php
/**
 * Welcome Page Init
 *
 * Welcome page initializer.
 *
 * @since 	1.0.0
 * @package WKTC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


register_activation_hook( WKTC_PLUGIN_FILE, 'wktc_welcome_activate' );
/**
 * Add a transient.
 *
 * Add the welcome page transient.
 *
 * @since 1.0.0
 */
function wktc_welcome_activate() {

	// Transient max age is 60 seconds.
	set_transient( '_welcome_redirect_wktc', true, 60 );
}


register_deactivation_hook( WKTC_PLUGIN_FILE, 'wktc_welcome_deactivate' );
/**
 * Plugin Deactivation.
 *
 * Delete the welcome page transient.
 *
 * @since   1.0.0
 * @package WKTC
 */
function wktc_welcome_deactivate() {
  delete_transient( '_welcome_redirect_wktc' );
}


/**
 * Welcome Logic.
 *
 * @since 1.0.0
 */
if ( file_exists( WKTC_DIR . '/assets/admin/welcome/welcome-logic.php' ) ) {
    require_once( WKTC_DIR . '/assets/admin/welcome/welcome-logic.php' );
}
