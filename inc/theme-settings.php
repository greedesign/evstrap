<?php
/**
 * Check and setup theme's default settings
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'evstrap_setup_theme_default_settings' ) ) {
	function evstrap_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$evstrap_posts_index_style = get_theme_mod( 'evstrap_posts_index_style' );
		if ( '' == $evstrap_posts_index_style ) {
			set_theme_mod( 'evstrap_posts_index_style', 'default' );
		}

		// Sidebar position.
		$evstrap_sidebar_position = get_theme_mod( 'evstrap_sidebar_position' );
		if ( '' == $evstrap_sidebar_position ) {
			set_theme_mod( 'evstrap_sidebar_position', 'right' );
		}

		// Body Container type.
		$evstrap_container_type = get_theme_mod( 'evstrap_container_type' );
		if ( '' == $evstrap_container_type ) {
			set_theme_mod( 'evstrap_container_type', 'container' );
		}


		/**
		 * Page Header Defaults
		 */
		$evstrap_enable_page_header_bgimg_default = get_theme_mod( 'evstrap_enable_page_header_bgimg_default' );
		if ( '' == $evstrap_enable_page_header_bgimg_default ) {
			set_theme_mod( 'evstrap_enable_page_header_bgimg_default', 0 );
		}

		$evstrap_page_header_bgimg_default = get_theme_mod( 'evstrap_page_header_bgimg_default' );
		if ( '' == $evstrap_page_header_bgimg_default ) {
			set_theme_mod( 'evstrap_page_header_bgimg_default', '' );
		}

		$evstrap_page_header_width_default = get_theme_mod( 'evstrap_page_header_width_default' );
		if ( '' == $evstrap_page_header_width_default ) {
			set_theme_mod( 'evstrap_page_header_width_default', 'default' );
		}

		$evstrap_page_header_height_default = get_theme_mod( 'evstrap_page_header_height_default' );
		if ( '' == $evstrap_page_header_height_default ) {
			set_theme_mod( 'evstrap_page_header_height_default', 'default' );
		}

		$evstrap_page_header_title_align_default = get_theme_mod( 'evstrap_page_header_title_align_default' );
		if ( '' == $evstrap_page_header_title_align_default ) {
			set_theme_mod( 'evstrap_page_header_title_align_default', 'default' );
		}

		$evstrap_page_header_vertical_align_default = get_theme_mod( 'evstrap_page_header_vertical_align_default' );
		if ( '' == $evstrap_page_header_vertical_align_default ) {
			set_theme_mod( 'evstrap_page_header_vertical_align_default', '' );
		}

		$evstrap_page_header_horizontal_align_default = get_theme_mod( 'evstrap_page_header_horizontal_align_default' );
		if ( '' == $evstrap_page_header_horizontal_align_default ) {
			set_theme_mod( 'evstrap_page_header_horizontal_align_default', '' );
		}

		$evstrap_page_header_content_align_default = get_theme_mod( 'evstrap_page_header_content_align_default' );
		if ( '' == $evstrap_page_header_content_align_default ) {
			set_theme_mod( 'evstrap_page_header_content_align_default', '' );
		}

		/**
		 * Navbar Options
		 */
		// Navbar Container type
		$evstrap_navbar_container = get_theme_mod( 'evstrap_navbar_container' );
		if ( '' == $evstrap_navbar_container ) {
			set_theme_mod( 'evstrap_navbar_container', 'container' );
		}

		// Navbar Position
		$evstrap_navbar_position = get_theme_mod( 'evstrap_navbar_position' );
		if ( '' == $evstrap_navbar_position ) {
			set_theme_mod( 'evstrap_navbar_position', 'default' );
		}

		// Navbar Responsive Breakpoint
		$evstrap_navbar_breakpoint = get_theme_mod( 'evstrap_navbar_breakpoint' );
		if ( '' == $evstrap_navbar_breakpoint ) {
			set_theme_mod( 'evstrap_navbar_breakpoint', 'navbar-expand-md' );
		}

		// Navbar Colour scheme
		$evstrap_navbar_color_scheme = get_theme_mod( 'evstrap_navbar_color_scheme' );
		if ( '' == $evstrap_navbar_color_scheme ) {
			set_theme_mod( 'evstrap_navbar_color_scheme', 'navbar-dark' );
		}

		$evstrap_navbar_bgcolor = get_theme_mod( 'evstrap_navbar_bgcolor' );
		if ( '' == $evstrap_navbar_bgcolor ) {
			set_theme_mod( 'evstrap_navbar_bgcolor', 'bg-primary' );
		}

		$evstrap_navbar_bgalpha = get_theme_mod( 'evstrap_navbar_bgalpha' );
		if ( '' == $evstrap_navbar_bgalpha ) {
			set_theme_mod( 'evstrap_navbar_bgalpha', 100 );
		}

		

		// Navbar Feature content
		$evstrap_navbar_shortcodes = get_theme_mod( 'evstrap_navbar_shortcode' );
		if ( '' == $evstrap_navbar_shortcodes ) {
			set_theme_mod( 'evstrap_navbar_shortcodes', '' );
		}

		/**
		 * Colour Pallets
		 *
		 * Set Colors defaults
		 * * need to manually set these color defaults to match the SASS variables
		 */
		// Primary.
		$evstrap_color_primary = get_theme_mod( 'evstrap_color_primary' );
		if ( '' == $evstrap_color_primary ) {
			set_theme_mod( 'evstrap_color_primary', '#7C008C' );
		}
		// Secondary
		$evstrap_color_secondary = get_theme_mod( 'evstrap_color_secondary' );
		if ( '' == $evstrap_color_secondary ) {
			set_theme_mod( 'evstrap_color_secondary', '#6c757d' );
		}
		// Info
		$evstrap_color_info = get_theme_mod( 'evstrap_color_info' );
		if ( '' == $evstrap_color_info ) {
			set_theme_mod( 'evstrap_color_info', '#17a2b8' );
		}
		// Warning
		$evstrap_color_warning = get_theme_mod( 'evstrap_color_warning' );
		if ( '' == $evstrap_color_warning ) {
			set_theme_mod( 'evstrap_color_warning', '#ffc107' );
		}
		// Danger
		$evstrap_color_danger = get_theme_mod( 'evstrap_color_danger' );
		if ( '' == $evstrap_color_danger ) {
			set_theme_mod( 'evstrap_color_danger', '#ff0000' );
		}
		// Light
		$evstrap_color_light = get_theme_mod( 'evstrap_color_light' );
		if ( '' == $evstrap_color_light ) {
			set_theme_mod( 'evstrap_color_light', '#f8f9fa' );
		}
		// Dark
		$evstrap_color_dark = get_theme_mod( 'evstrap_color_dark' );
		if ( '' == $evstrap_color_dark ) {
			set_theme_mod( 'evstrap_color_dark', '#343a40' );
		}
		// White
		$evstrap_color_white = get_theme_mod( 'evstrap_color_white' );
		if ( '' == $evstrap_color_white ) {
			set_theme_mod( 'evstrap_color_white', '#ffffff' );
		}

	}
}
