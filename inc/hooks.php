<?php
/**
 * Custom hooks.
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'evstrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function evstrap_site_info() {
		do_action( 'evstrap_site_info' );
	}
}

if ( ! function_exists( 'evstrap_add_site_info' ) ) {
	add_action( 'evstrap_site_info', 'evstrap_add_site_info' );

	/**
	 * Add site info content.
	 */
	function evstrap_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'evstrap' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'evstrap' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s.', 'evstrap' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://evstrap.com', 'evstrap' ) ) . '">evstrap.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'evstrap' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'evstrap_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}
