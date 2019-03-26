<?php
/**
 * Check and setup theme's default settings
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'understrap_setup_theme_default_settings' ) ) {
	function understrap_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$understrap_posts_index_style = get_theme_mod( 'understrap_posts_index_style' );
		if ( '' == $understrap_posts_index_style ) {
			set_theme_mod( 'understrap_posts_index_style', 'default' );
		}

		// Sidebar position.
		$understrap_sidebar_position = get_theme_mod( 'understrap_sidebar_position' );
		if ( '' == $understrap_sidebar_position ) {
			set_theme_mod( 'understrap_sidebar_position', 'right' );
		}

		// Body Container type.
		$understrap_container_type = get_theme_mod( 'understrap_container_type' );
		if ( '' == $understrap_container_type ) {
			set_theme_mod( 'understrap_container_type', 'container' );
		}

		// Navbar Container type
		$understrap_navbar_container = get_theme_mod( 'understrap_navbar_container' );
		if ( '' == $understrap_navbar_container ) {
			set_theme_mod( 'understrap_navbar_container', 'container' );
		}

		// Navbar Position
		$understrap_navbar_position = get_theme_mod( 'understrap_navbar_position' );
		if ( '' == $understrap_navbar_position ) {
			set_theme_mod( 'understrap_navbar_position', 'default' );
		}

		// Navbar Responsive Breakpoint
		$understrap_navbar_breakpoint = get_theme_mod( 'understrap_navbar_breakpoint' );
		if ( '' == $understrap_navbar_breakpoint ) {
			set_theme_mod( 'understrap_navbar_breakpoint', 'navbar-expand-md' );
		}

		// Navbar Colour scheme
		$understrap_navbar_color_scheme = get_theme_mod( 'understrap_navbar_color_scheme' );
		if ( '' == $understrap_navbar_color_scheme ) {
			set_theme_mod( 'understrap_navbar_color_scheme', 'navbar-dark' );
		}

		$understrap_navbar_bgcolor = get_theme_mod( 'understrap_navbar_bgcolor' );
		if ( '' == $understrap_navbar_bgcolor ) {
			set_theme_mod( 'understrap_navbar_bgcolor', 'bg-primary' );
		}

		// Navbar Feature content
		$understrap_navbar_shortcodes = get_theme_mod( 'understrap_navbar_shortcode' );
		if ( '' == $understrap_navbar_shortcodes ) {
			set_theme_mod( 'understrap_navbar_shortcodes', '' );
		}

		// Color Palette.
		$understrap_color_primary = get_theme_mod( 'understrap_color_primary' );
		if ( '' == $understrap_color_primary ) {
			set_theme_mod( 'understrap_color_primary', '#7C008C' );
		}

	}
}
