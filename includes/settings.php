<?php

namespace WSUWP\Send_MailChimp_Email\Settings;

add_action( 'admin_init', 'WSUWP\Send_MailChimp_Email\Settings\register' );
add_action( 'admin_menu', 'WSUWP\Send_MailChimp_Email\Settings\register_page' );

/**
 * Register the options used by Send MailChimp Email in its settings page.
 *
 * @since 0.0.1
 */
function register() {
	\register_setting( 'sme_group', 'sme_api_key', array(
		'type' => 'string',
		'description' => 'A MailChimp API key',
		'sanitize_callback' => 'WSUWP\Send_MailChimp_Email\Settings\sanitize_sme_api_key',
		'show_in_rest' => false,
		'default' => '',
	) );
}

/**
 * Sanitize the MailChimp API key value before it is stored.
 *
 * @since 0.0.1
 *
 * @param string $value MailChimp API key
 *
 * @return string Sanitized MailChimp API key
 */
function sanitize_sme_api_key( $value ) {
	return $value;
}

/**
 * Register the submenu page under "Settings" for "MailChimp" and the sections
 * and fields used on that page.
 *
 * @since 0.0.1
 */
function register_page() {
	$page = add_submenu_page( 'options-general.php', 'MailChimp Settings', 'MailChimp', 'manage_options', 'sme', 'WSUWP\Send_MailChimp_Email\Settings\page_html' );

	add_settings_section( 'sme_api', 'API Information', '', $page );
	add_settings_field( 'sme_api_key', 'API Key', 'WSUWP\Send_MailChimp_Email\Settings\display_sme_api_key_field', $page, 'sme_api', array(
		'label_for' => 'sme_api_key',
	) );
}

/**
 * Display the HTML for the Send MailChimp Email settings page.
 *
 * @since 0.0.1
 */
function page_html() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Display any notices, including success, generated by the previous save attempt.
	settings_errors( 'sme_settings' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<h2>API Information</h2>
			<table class="form-table">
				<?php

				// Output the field to capture API key directly.
				do_settings_fields( 'settings_page_sme', 'sme_api' );

				?>
			</table>
			<?php

			// Output required hidden/nonce fields.
			settings_fields( 'sme_group' );

			// output save settings button
			submit_button( 'Save Settings' );
			?>
		</form>
	</div>
	<?php
}

/**
 * Display the HTML used to capture the MailChimp API key.
 */
function display_sme_api_key_field() {
	$sme_api_key = get_option( 'sme_api_key', '' );

	?><input id="sme_api_key" name="sme_api_key" type="text" value="<?php echo esc_attr( $sme_api_key ); ?>" class="regular-text" /><?php
}
