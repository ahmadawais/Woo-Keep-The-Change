<?php
/**
 * Welcome Page View
 *
 * Welcome page content i.e. HTML/CSS/PHP.
 *
 * @since   1.0.0
 * @package WKTC
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Version.
$the_version = WKTC_VERSION;

// Logo image.
$logo_img            = WKTC_URL . '/assets/admin/welcome/img/logo.png';
$wooktc_disabled_img = WKTC_URL . '/assets/admin/welcome/img/wooktc-disabled.png';
$wooktc_enabled_img  = WKTC_URL . '/assets/admin/welcome/img/wooktc-enabled.png';
?>

<!-- Inline Styles! -->
<style>

	/* New Logo */
	.svg .wp-badge.welcome__logo {
		color: #fff;
		background: url( <?php echo $logo_img; ?> )  center 24px no-repeat #0092F9;
		-webkit-background-size: contain;
			 -o-background-size: contain;
				background-size: contain;
	}

	/* Responsive Youtube Video*/
	.embed-container {
		height        : 0;
		max-width     : 100%;
		padding-bottom: 56.25%;
		overflow      : hidden;
		position      : relative;
	}
	.embed-container iframe,
	.embed-container object,
	.embed-container embed {
		top     : 0;
		left    : 0;
		width   : 100%;
		height  : 100%;
		position: absolute;
	}

	.wooktc_status {
		display: table;
		width: initial;
		padding: 0.5rem 3rem;
		color: #f4f4f4;
	}

	.enabled{
		background: #0092F9;
	}

	.disabled{
		background: #F90000;
	}

</style>

<!-- HTML Started! -->
<div class="wrap about-wrap">

	<h1><?php printf( __( 'eCommerce Keep The Change' ), $the_version ); ?></h1>

	<div class="about-text">
		<?php printf( __( 'eCommerce Keep The Change plugin helps online store owners keep the change :) </br>i.e. Total $50 instead of $49.28.' ), $the_version ); ?>
	</div>

	<div class="wp-badge welcome__logo"></div>

	<div class="feature-section one-col">



		<!-- Create the form that will be used to render our options -->
		<form method="post" action="options.php">
			<?php settings_fields( 'wktc_welcome' ); ?>
			<?php do_settings_sections( 'wktc_welcome' ); ?>
			<?php submit_button(); ?>
		</form>


		<?php

			$options = get_option( 'wktc_welcome' );

			// If enabled then 1 else 0
			$should_woo_ktc = isset( $options['is_woo_ktc'] ) ? 1 : 0;

		if ( $should_woo_ktc ) :
			?>

				<div class="wooktc_status enabled">
					<p><strong>STATUS:</strong> Enabled :)</p>
				</div>

			<?php else : ?>

				<div class="wooktc_status disabled">
					<p><strong>STATUS:</strong> Disabled :(</p>
				</div>

			<?php
			endif;
?>


	 </div>

	<div class="feature-section two-col">

		<div class="col">
			<img src="<?php echo $wooktc_disabled_img; ?>" />
			<h3><?php _e( 'WOO KTC DISABLED' ); ?></h3>
			<!-- <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.' ); ?></p> -->
		</div>

		<div class="col">
			<img src="<?php echo $wooktc_enabled_img; ?>" />
			<h3><?php _e( 'WOO KTC ENABLED' ); ?></h3>
			<!-- <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.' ); ?></p> -->
		</div>

	</div>

</div>
<!-- HTML Ended! -->
