<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'understrap_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'understrap' ),
				'priority'    => 160,
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function understrap_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'understrap_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type',
				array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => '10',
				)
			)
		);

		$wp_customize->add_setting(
			'understrap_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'understrap' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'understrap'
					),
					'section'           => 'understrap_theme_layout_options',
					'settings'          => 'understrap_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'          => '20',
				)
			)
		);

			// BS Navbar settings.
			$wp_customize->add_section(
				'understrap_theme_navbar_options',
				array(
					'title'       => __( 'Theme Navbar Settings', 'understrap' ),
					'capability'  => 'edit_theme_options',
					'description' => __( 'Navbar skin and layout defaults', 'understrap' ),
					'priority'    => 161,
				)
			);

			$wp_customize->add_setting(
				'understrap_navbar_position',
				array(
					'default'           => 'default',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'understrap_navbar_position',
					array(
						'label'       => __( 'Navbar Position', 'understrap' ),
						'description' => __( 'Choose between Bootstrap\'s static, fixed top, fixed bottom, and sticky top navbar', 'understrap' ),
						'section'     => 'understrap_theme_navbar_options',
						'settings'    => 'understrap_navbar_position',
						'type'        => 'select',
						'choices'     => array(
							'default'       				=> __( 'Default', 'understrap' ),
							'fixed-top'   	=> __( 'Fixed top', 'understrap' ),
							'fixed-bottom' 	=> __( 'Fixed bottom', 'understrap' ),
							'sticky-top' 		=> __( 'Sticky Top', 'understrap' ),
						),
						'priority'    => '10',
					)
				)
			);

			$wp_customize->add_setting(
				'understrap_navbar_container',
				array(
					'default'           => 'container',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'understrap_navbar_container',
					array(
						'label'       => __( 'Navbar Position', 'understrap' ),
						'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
						'section'     => 'understrap_theme_navbar_options',
						'settings'    => 'understrap_navbar_container',
						'type'        => 'select',
						'choices'     => array(
							'container'       => __( 'Fixed width container', 'understrap' ),
							'container-fluid' => __( 'Full width container', 'understrap' ),
						),
						'priority'    => '10',
					)
				)
			);

			// Colour Pallete
			// primary color
			$understrap_color_palette[] = array(
				'slug'=>'understrap_color_primary', 
				'default' => '#7C008C',
				'label' => 'Primary Color'
			);

			// secondary color
			$understrap_color_palette[] = array(
				'slug'=>'understrap_color_secondary', 
				'default' => '#6c757d',
				'label' => 'Secondary Color'
			);

			// info color
			$understrap_color_palette[] = array(
				'slug'=>'understrap_color_info', 
				'default' => '#17a2b8',
				'label' => 'Info Color'
			);

			// warning color
			$understrap_color_palette[] = array(
				'slug'=>'understrap_color_warning', 
				'default' => '#ffc107',
				'label' => 'Warning Color'
			);

			// danger color
			$understrap_color_palette[] = array(
				'slug'=>'understrap_color_danger', 
				'default' => '#dc3545',
				'label' => 'Danger Color'
			);

			// add the settings and controls for each color
			foreach( $understrap_color_palette as $understrap_color_palette ) {
				// SETTINGS
				$wp_customize->add_setting(
						$understrap_color_palette['slug'], array(
								'default' => $understrap_color_palette['default'],
								'type' => 'option', 
								'capability' =>  'edit_theme_options'
						)
				);
				// CONTROLS
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
							$wp_customize,
							$understrap_color_palette['slug'], 
							array('label' => $understrap_color_palette['label'], 
							'section' => 'colors',
							'settings' => $understrap_color_palette['slug'])
					)
				);
			}

	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script(
			'understrap_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );
