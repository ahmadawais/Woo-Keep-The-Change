<?php
/**
 * Welcome Logic
 *
 * Welcome code related logic.
 *
 * @since 	1.0.0
 * @package WKTC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Safe Welcome Page Redirect.
 *
 * Safe welcome page redirect which happens only
 * once and if the site is not a network or MU.
 *
 * @since 	1.0.0
 * @package WKTC
 */
function wktc_safe_welcome_redirect() {

	// Bail if no activation redirect transient is present.
	// if ! true.
	if ( ! get_transient( '_welcome_redirect_wktc' ) ) {
		return;
  	}

  // Delete the redirect transient.
  delete_transient( '_welcome_redirect_wktc' );

  // Bail if activating from network or bulk sites.
  if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
    return;
  }

  // Redirect to Welcome Page.
  // Redirects to `your-domain.com/wp-admin/plugin.php?page=wktc_welcome`.
  wp_safe_redirect( add_query_arg( array( 'page' => 'wktc_welcome' ), admin_url( 'options-general.php' ) ) );

}

// Add to `admin_init`.
add_action( 'admin_init', 'wktc_safe_welcome_redirect' );


/**
 * Welcome Page Sub menu.
 *
 * Add the welcome page inside plugins menu.
 *
 * @since 	1.0.0
 * @package WKTC
 */
function wktc_welcome() {
	add_submenu_page(
		'options-general.php', //  The slug name for the parent menu (or the file name of a standard WordPress admin page).
		__( 'Woo KTC', 'WKTC' ), // The text to be displayed in the title tags of the page when the menu is selected.
    	__( 'Woo KTC', 'WKTC' ), //  The text to be used for the menu.
		'read', // The capability required for this menu to be displayed to the user.
		'wktc_welcome', // The slug name to refer to this menu by (should be unique for this menu).
		'wktc_welcome_content' ); // The function to be called to output the content for this page.
}

// Add to `admin_menu`.
add_action('admin_menu', 'wktc_welcome');


/**
 * Welcome Page View.
 *
 * Welcome page content i.e. HTML/CSS/PHP.
 *
 * @since 	1.0.0
 * @package WKTC
 */
function wktc_welcome_content() {

	// Welcome Page
	if (file_exists( WKTC_DIR . '/assets/admin/welcome/welcome-view.php') ) {
	   require_once( WKTC_DIR . '/assets/admin/welcome/welcome-view.php' );
	}
}


/**
 * Settings API Options.
 *
 * @since 1.0.0
 */
if ( file_exists( WKTC_DIR . '/assets/admin/welcome/wktc-settings.php' ) ) {
    require_once( WKTC_DIR . '/assets/admin/welcome/wktc-settings.php' );
}
