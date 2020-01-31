<?php
/**
 * Plugin Name: eCommerce Keep The Change
 * Plugin URI: https://WPCouple.com/
 * Description: Keep the change fee added in the cart.
 * Author: TheDevCouple (Ahmad Awais & Maedah Batool)
 * Author URI: https://AhmadAwais.com/
 * Text Domain: WKTC
 * Version: 2.0.2
 * License: GPL v2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package WKTC
 */

/*
	Copyright 2015-Present WPTie ( email: support at WPTie.com )

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	( at your option ) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define global constants
 *
 * @package WKTC
 * @since 0.0.1
 */

// WKTC Version.
if ( ! defined( 'WKTC_VERSION' ) ) {
	define( 'WKTC_VERSION', '1.0.2' );
}

// WKTC Name.
if ( ! defined( 'WKTC_NAME' ) ) {
	define( 'WKTC_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

// WKTC Dir.
if ( ! defined( 'WKTC_DIR' ) ) {
	define( 'WKTC_DIR', WP_PLUGIN_DIR . '/' . WKTC_NAME );
}

// WKTC URL.
if ( ! defined( 'WKTC_URL' ) ) {
	define( 'WKTC_URL', WP_PLUGIN_URL . '/' . WKTC_NAME );
}

// Plugin Root File.
if ( ! defined( 'WKTC_PLUGIN_FILE' ) ) {
	define( 'WKTC_PLUGIN_FILE', __FILE__ );
}


/**
 * AA Main File
 *
 * This is the main file of AA which controls everything in this plugin
 *
 * @since 0.0.1
 */
if ( file_exists( WKTC_DIR . '/assets/wktc-init.php' ) ) {
	require_once WKTC_DIR . '/assets/wktc-init.php';
}
