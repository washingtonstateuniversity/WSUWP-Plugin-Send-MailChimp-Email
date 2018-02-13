<?php

namespace WSUWP\MailChimp\Emails;

add_action( 'init', 'WSUWP\MailChimp\Emails\register_post_type' );

/**
 * Provide the slug used to register the email post type.
 *
 * @since 0.0.1
 *
 * @return string
 */
function post_type_slug() {
	return 'sme_email';
}

/**
 * Register a post type to track emails that are sent through
 * this plugin.
 *
 * @since 0.0.1
 */
function register_post_type() {
	$labels = array(
		'name'               => 'Email',
		'singular_name'      => 'Email',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Email',
		'edit_item'          => 'Edit Email',
		'new_item'           => 'New Email',
		'all_items'          => 'All Emails',
		'view_item'          => 'View Email',
		'search_items'       => 'Search Emails',
		'not_found'          => 'No emails found',
		'not_found_in_trash' => 'No emails found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Emails',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'supports'           => array( '' ),
		'taxonomies'         => array(),
		'show_in_rest'       => false,
	);

	\register_post_type( post_type_slug(), $args );
}
