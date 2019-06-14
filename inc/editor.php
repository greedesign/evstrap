<?php
/**
 * evStrap modify editor
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Set Theme Editor Colour Palette
 */

add_action( 'after_setup_theme', 'evstrap_setup_theme_supported_features', 100 );

if ( ! function_exists( 'evstrap_setup_theme_supported_features' ) ) {
	function evstrap_setup_theme_supported_features() {
		add_theme_support( 'editor-color-palette', array(
				array(
						'name' => __( 'Primary', 'themeLangDomain' ),
						'slug' => 'primary',
						'color' => get_theme_mod( 'evstrap_color_primary' ),
				),
				array(
						'name' => __( 'Secondary', 'themeLangDomain' ),
						'slug' => 'secondary',
						'color' => get_theme_mod( 'evstrap_color_secondary' ),
				),
				array(
						'name' => __( 'Info', 'themeLangDomain' ),
						'slug' => 'info',
						'color' => get_theme_mod( 'evstrap_color_info' ),
				),
				array(
						'name' => __( 'Warning', 'themeLangDomain' ),
						'slug' => 'warning',
						'color' => get_theme_mod( 'evstrap_color_warning' ),
				),
				array(
					'name' => __( 'Danger', 'themeLangDomain' ),
					'slug' => 'danger',
					'color' => get_theme_mod( 'evstrap_color_danger' ),
				),
				array(
					'name' => __( 'Light', 'themeLangDomain' ),
					'slug' => 'light',
					'color' => get_theme_mod( 'evstrap_color_light' ),
				),
				array(
					'name' => __( 'Dark', 'themeLangDomain' ),
					'slug' => 'dark',
					'color' => get_theme_mod( 'evstrap_color_dark' ),
				),

		) );
	}
}

/**
 * Registers an editor stylesheet for the theme.
 */

add_action( 'admin_init', 'evstrap_wpdocs_theme_add_editor_styles' );

if ( ! function_exists( 'evstrap_wpdocs_theme_add_editor_styles' ) ) {
	function evstrap_wpdocs_theme_add_editor_styles() {
		add_editor_style( 'css/custom-editor-style.min.css' );
	}
}

// Add TinyMCE style formats.
add_filter( 'mce_buttons_2', 'evstrap_tiny_mce_style_formats' );

if ( ! function_exists( 'evstrap_tiny_mce_style_formats' ) ) {
	function evstrap_tiny_mce_style_formats( $styles ) {

		array_unshift( $styles, 'styleselect' );
		return $styles;
	}
}


add_filter( 'tiny_mce_before_init', 'evstrap_tiny_mce_before_init' );

if ( ! function_exists( 'evstrap_tiny_mce_before_init' ) ) {
	function evstrap_tiny_mce_before_init( $settings ) {

		$style_formats = array(
			array(
				'title'    => 'Lead Paragraph',
				'selector' => 'p',
				'classes'  => 'lead',
				'wrapper'  => true,
			),
			array(
				'title'  => 'Small',
				'inline' => 'small',
			),
			array(
				'title'   => 'Blockquote',
				'block'   => 'blockquote',
				'classes' => 'blockquote',
				'wrapper' => true,
			),
			array(
				'title'   => 'Blockquote Footer',
				'block'   => 'footer',
				'classes' => 'blockquote-footer',
				'wrapper' => true,
			),
			array(
				'title'  => 'Cite',
				'inline' => 'cite',
			),
		);

		if ( isset( $settings['style_formats'] ) ) {
			$orig_style_formats = json_decode( $settings['style_formats'], true );
			$style_formats      = array_merge( $orig_style_formats, $style_formats );
		}

		$settings['style_formats'] = json_encode( $style_formats );
		return $settings;
	}
}
