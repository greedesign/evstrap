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


		/**
		 * Page Header Defaults
		 */
		$understrap_enable_page_header_bgimg_default = get_theme_mod( 'understrap_enable_page_header_bgimg_default' );
		if ( '' == $understrap_enable_page_header_bgimg_default ) {
			set_theme_mod( 'understrap_enable_page_header_bgimg_default', 0 );
		}

		$understrap_page_header_bgimg_default = get_theme_mod( 'understrap_page_header_bgimg_default' );
		if ( '' == $understrap_page_header_bgimg_default ) {
			set_theme_mod( 'understrap_page_header_bgimg_default', '' );
		}

		$understrap_page_header_width_default = get_theme_mod( 'understrap_page_header_width_default' );
		if ( '' == $understrap_page_header_width_default ) {
			set_theme_mod( 'understrap_page_header_width_default', 'default' );
		}

		$understrap_page_header_height_default = get_theme_mod( 'understrap_page_header_height_default' );
		if ( '' == $understrap_page_header_height_default ) {
			set_theme_mod( 'understrap_page_header_height_default', 'default' );
		}

		$understrap_page_header_title_align_default = get_theme_mod( 'understrap_page_header_title_align_default' );
		if ( '' == $understrap_page_header_title_align_default ) {
			set_theme_mod( 'understrap_page_header_title_align_default', 'default' );
		}

		$understrap_page_header_vertical_align_default = get_theme_mod( 'understrap_page_header_vertical_align_default' );
		if ( '' == $understrap_page_header_vertical_align_default ) {
			set_theme_mod( 'understrap_page_header_vertical_align_default', '' );
		}

		$understrap_page_header_horizontal_align_default = get_theme_mod( 'understrap_page_header_horizontal_align_default' );
		if ( '' == $understrap_page_header_horizontal_align_default ) {
			set_theme_mod( 'understrap_page_header_horizontal_align_default', '' );
		}

		$understrap_page_header_content_align_default = get_theme_mod( 'understrap_page_header_content_align_default' );
		if ( '' == $understrap_page_header_content_align_default ) {
			set_theme_mod( 'understrap_page_header_content_align_default', '' );
		}

		/**
		 * Navbar Options
		 */
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

		// $understrap_navbar_bgcolor2 = get_theme_mod( 'understrap_navbar_bgcolor2' );
		// if ( '' == $understrap_navbar_bgcolor2 ) {
		// 	set_theme_mod( 'understrap_navbar_bgcolor2', '' );
		// }

		$understrap_navbar_bgalpha = get_theme_mod( 'understrap_navbar_bgalpha' );
		if ( '' == $understrap_navbar_bgalpha ) {
			set_theme_mod( 'understrap_navbar_bgalpha', 100 );
		}

		

		// Navbar Feature content
		$understrap_navbar_shortcodes = get_theme_mod( 'understrap_navbar_shortcode' );
		if ( '' == $understrap_navbar_shortcodes ) {
			set_theme_mod( 'understrap_navbar_shortcodes', '' );
		}

		/**
		 * Colour Pallets
		 */
		// Primary.
		$understrap_color_primary = get_theme_mod( 'understrap_color_primary' );
		if ( '' == $understrap_color_primary ) {
			set_theme_mod( 'understrap_color_primary', '#7C008C' );
		}
		// Secondary
		$understrap_color_secondary = get_theme_mod( 'understrap_color_secondary' );
		if ( '' == $understrap_color_secondary ) {
			set_theme_mod( 'understrap_color_secondary', '#6c757d' );
		}
		// Info
		$understrap_color_info = get_theme_mod( 'understrap_color_info' );
		if ( '' == $understrap_color_info ) {
			set_theme_mod( 'understrap_color_info', '#17a2b8' );
		}
		// Warning
		$understrap_color_warning = get_theme_mod( 'understrap_color_warning' );
		if ( '' == $understrap_color_warning ) {
			set_theme_mod( 'understrap_color_warning', '#ffc107' );
		}
		// Danger
		$understrap_color_danger = get_theme_mod( 'understrap_color_danger' );
		if ( '' == $understrap_color_danger ) {
			set_theme_mod( 'understrap_color_danger', '#7C008C' );
		}
		// Light
		$understrap_color_light = get_theme_mod( 'understrap_color_light' );
		if ( '' == $understrap_color_light ) {
			set_theme_mod( 'understrap_color_light', '#f8f9fa' );
		}
		// Dark
		$understrap_color_dark = get_theme_mod( 'understrap_color_dark' );
		if ( '' == $understrap_color_dark ) {
			set_theme_mod( 'understrap_color_dark', '#343a40' );
		}
		// White
		$understrap_color_white = get_theme_mod( 'understrap_color_white' );
		if ( '' == $understrap_color_white ) {
			set_theme_mod( 'understrap_color_white', '#ffffff' );
		}

	}
}
