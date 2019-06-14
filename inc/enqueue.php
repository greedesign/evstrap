<?php
/**
 * evStrap enqueue scripts
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'evstrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function evstrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'evstrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'evstrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'evstrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'evstrap_scripts' );



if ( ! function_exists( 'admin_scripts' ) ) {
	/**
	 * Load admin Javascript and CSS sources.
	 */
	function admin_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/admin.min.css' );
		wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.min.css', array(), $css_version );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/admin.min.js' );
		wp_enqueue_script( 'admin-scripts', get_template_directory_uri() . '/js/admin.min.js', array(), $js_version, true );

	}
}
add_action( 'admin_enqueue_scripts', 'admin_scripts' );
