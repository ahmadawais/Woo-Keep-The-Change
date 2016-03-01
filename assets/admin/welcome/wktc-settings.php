<?php
/**
 * Settings for WKTC
 *
 * Settings API related stuff.
 *
 * @since 	1.0.2
 * @package WKTC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Plugin Options.
 *
 * Initializes the plugin options page by registering the Sections,
 * Fields, and Settings.
 *
 * @since 	1.0.2
 * @package WKTC
 */
add_action('admin_init', 'wktc_initialize_theme_options');
function wktc_initialize_theme_options() {

    // First, we register a section. This is necessary since all future options must belong to one.
    add_settings_section(
        'wktc_settings_section',         // ID used to identify this section and with which to register options
        'Enable or Disable',                  // Title to be displayed on the administration page
        'wktc_general_options_callback', // Callback used to render the description of the section
        'wktc_welcome'                           // Page on which to add this section of options
    );

    // Next, we will introduce the fields for toggling the visibility of content elements.
    add_settings_field(
        'is_woo_ktc',                      // ID used to identify the field throughout the theme
        'Enable Woo Keep The Change',                           // The label to the left of the option interface element
        'wktc_toggle_header_callback',   // The name of the function responsible for rendering the option interface
        'wktc_welcome',                          // The page on which this option will be displayed
        'wktc_settings_section',         // The name of the section to which this field belongs
        array(                              // The array of arguments to pass to the callback. In this case, just a description.
            'Check this setting to enable WooCommerce to Keep The Change.'
        )
    );

    // Finally, we register the fields with WordPress
    register_setting(
        'wktc_welcome',
        'wktc_welcome'
    );

} // end wktc_initialize_theme_options


/**
 * This function provides a simple description for the General Options page.
 *
 * It is called from the 'wktc_initialize_theme_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function wktc_general_options_callback() {
    // echo '<p>Select which areas of content you wish to display.</p>';
} // end wktc_general_options_callback


/**
 * This function renders the interface elements for toggling the visibility of the header element.
 *
 * It accepts an array of arguments and expects the first element in the array to be the description
 * to be displayed next to the checkbox.
 */
function wktc_toggle_header_callback( $args ) {

    // First, we read the options collection
    $options = get_option('wktc_welcome');

    // Next, we update the name attribute to access this element's ID in the context of the display options array
    // We also access the show_header element of the options collection in the call to the checked() helper function
    $html = '<input type="checkbox" id="is_woo_ktc" name="wktc_welcome[is_woo_ktc]" value="1" ' . checked(1, isset( $options[ 'is_woo_ktc' ] ), false) . '/>';

    // Here, we'll take the first argument of the array and add it to a label next to the checkbox
    $html .= '<label for="is_woo_ktc"> '  . $args[0] . '</label>';

    echo $html;


} // end wktc_toggle_header_callback
