<?php
/*
Plugin Name: WSUWP Send MailChimp Email
Version: 0.0.1
Description: Create and send MailChimp email campaigns through WordPress
Author: washingtonstateuniversity
Author URI: https://web.wsu.edu/
Plugin URI: https://github.com/washingtonstateuniversity/wsuwp-plugin-send-mailchimp-email
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// This plugin uses namespaces and requires PHP 5.3 or greater.
if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	add_action( 'admin_notices', create_function( '', // @codingStandardsIgnoreLine
	"echo '<div class=\"error\"><p>" . __( 'WSUWP Send MailChimp Email requires PHP 5.3 to function properly. Please upgrade PHP or deactivate the plugin.', 'wsuwp-send-mailchimp-email' ) . "</p></div>';" ) );
	return;
} else {
	include_once __DIR__ . '/includes/wsuwp-send-mailchimp-email.php';
}
