<?php
/**
 * evStrap Theme Customizer
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'evstrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function evstrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'evstrap_customize_register' );

/**
 * Add Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';


if ( ! function_exists( 'evstrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function evstrap_theme_customize_register( $wp_customize ) {


		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function evstrap_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

				// If the input is a valid key, return it; otherwise, return the default.
				return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}


		/**
		 * Create Theme Options Panel
		 */
		$wp_customize->add_panel( 'evstrap_options', array(
			'title' => __( 'Theme Options' ),
			'description' => __( 'Custom Theme Options', 'evstrap' ), // Include html tags such as <p>.
			'priority' => 160, // Mixed with top-level-section hierarchy.
		) );
	

		/**
		 * Theme layout options.
		 */ 
		$wp_customize->add_section(
			'evstrap_theme_layout_options',
			array(
				'title'       => __( 'Site Layout Options', 'evstrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'evstrap' ),
				'panel' => 'evstrap_options',
			)
		);

			// Container Type
			$wp_customize->add_setting(
				'evstrap_container_type',
				array(
					'default'           => 'container',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'evstrap_container_type',
					array(
						'label'       => __( 'Container Width', 'evstrap' ),
						'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'evstrap' ),
						'section'     => 'evstrap_theme_layout_options',
						'options'    => 'evstrap_container_type',
						'type'        => 'select',
						'choices'     => array(
							'container'       => __( 'Fixed width container', 'evstrap' ),
							'container-fluid' => __( 'Full width container', 'evstrap' ),
						),
						'priority'    => '10',
					)
				)
			);

			//Sidebar Position
			$wp_customize->add_setting(
				'evstrap_sidebar_position',
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
					'evstrap_sidebar_position',
					array(
						'label'             => __( 'Sidebar Positioning', 'evstrap' ),
						'description'       => __(
							'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
							'evstrap'
						),
						'section'           => 'evstrap_theme_layout_options',
						'options'          => 'evstrap_sidebar_position',
						'type'              => 'select',
						'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
						'choices'           => array(
							'right' => __( 'Right sidebar', 'evstrap' ),
							'left'  => __( 'Left sidebar', 'evstrap' ),
							'both'  => __( 'Left & Right sidebars', 'evstrap' ),
							'none'  => __( 'No sidebar', 'evstrap' ),
						),
						'priority'          => '20',
					)
				)
			);


		/**
		 * evStrap Navbar Options.
		*/
		$wp_customize->add_section(
			'evstrap_theme_navbar_options',
			array(
				'title'       => __( 'Navbar Options', 'evstrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Navbar skin and layout defaults', 'evstrap' ),
				'panel' => 'evstrap_options',
				//'priority'    => 161,
			)
		);

			// Navbar Poistion
			$wp_customize->add_setting(
				'evstrap_navbar_position',
				array(
					'default'           => 'default',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'evstrap_navbar_position',
					array(
						'label'       => __( 'Navbar Position', 'evstrap' ),
						'description' => __( 'Choose between Bootstrap\'s static, fixed top, fixed bottom, and sticky top navbar', 'evstrap' ),
						'section'     => 'evstrap_theme_navbar_options',
						'settings'    => 'evstrap_navbar_position',
						'type'        => 'select',
						'choices'     => array(
							'default'       				=> __( 'Default', 'evstrap' ),
							'fixed-top'   	=> __( 'Fixed top', 'evstrap' ),
							'fixed-bottom' 	=> __( 'Fixed bottom', 'evstrap' ),
							'sticky-top' 		=> __( 'Sticky Top', 'evstrap' ),
						),
						'priority'    => '10',
					)
				)
			);

			// Navbar Container Width
			$wp_customize->add_setting(
				'evstrap_navbar_container',
				array(
					'default'           => 'container',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'evstrap_navbar_container',
					array(
						'label'       => __( 'Navbar Container', 'evstrap' ),
						'description' => __( 'Choose between Bootstrap\'s container and container-fluid. See BS docs for <a href="https://getbootstrap.com/docs/4.2/components/navbar/#how-it-works" target="_blank">more details</a>', 'evstrap' ),
						'section'     => 'evstrap_theme_navbar_options',
						'settings'    => 'evstrap_navbar_container',
						'type'        => 'select',
						'choices'     => array(
							'container'       => __( 'Fixed width container', 'evstrap' ),
							'container-fluid' => __( 'Full width container', 'evstrap' ),
						),
					)
				)
			);

			// Navbar Breakpoint
			$wp_customize->add_setting(
				'evstrap_navbar_breakpoint',
				array(
					'default'           => 'navbar-expand-md',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'evstrap_navbar_breakpoint',
					array(
						'label'       => __( 'Navbar Collapse Breakpoint', 'evstrap' ),
						'description' => __( 'Choose at which device breakpoint the navbar collapses for mobile display. See BS docs for <a href="https://getbootstrap.com/docs/4.2/components/navbar/#responsive-behaviors" target="_blank">more details</a>', 'evstrap' ),
						'section'     => 'evstrap_theme_navbar_options',
						'settings'    => 'evstrap_navbar_breakpoint',
						'type'        => 'select',
						'choices'     => array(
							'navbar-expand-sm'    => __( 'Small (sm)', 'evstrap' ),
							'navbar-expand-md'   	=> __( 'Medium (md)', 'evstrap' ),
							'navbar-expand-lg' 		=> __( 'Large (lg)', 'evstrap' ),
							'navbar-expand-xl' 		=> __( 'Extra Large (xl)', 'evstrap' ),
							'navbar-expand'				=> __( 'Never Collapse', 'evstrap' ),
							''										=> __( 'Always Collapse Collapse', 'evstrap' ),
						)
					)
				)
			);

			// Navbar Colour scheme
			$wp_customize->add_setting(
				'evstrap_navbar_color_scheme',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'evstrap_navbar_color_scheme',
					array(
						'label'       => __( 'Navbar Color scheme', 'evstrap' ),
						'description' => __( 'Choose base colour scheme./n See BS docs for <a href="https://getbootstrap.com/docs/4.2/components/navbar/#color-schemes" target="_blank">more details</a>', 'evstrap' ),
						'section'     => 'evstrap_theme_navbar_options',
						'settings'    => 'evstrap_navbar_color_scheme',
						'type'        => 'select',
						'choices'     => array(
							'navbar-dark'    => __( 'Dark', 'evstrap' ),
							'navbar-light'   	=> __( 'Light', 'evstrap' ),
						)
					)
				)
			);

			// Navbar background color
			$wp_customize->add_setting(
				'evstrap_navbar_bgcolor',
				array(
					'default'           => 'bg-primary',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'evstrap_navbar_bgcolor',
					array(
						'label'       => __( 'Navbar Background Color', 'evstrap' ),
						'description' => __( 'Choose Navbar background colour based on theme primary, secondary, dark, light, and transparent classes. See BS docs for <a href="https://getbootstrap.com/docs/4.2/components/navbar/#background-colors" target="_blank">more details</a>', 'evstrap' ),
						'section'     => 'evstrap_theme_navbar_options',
						'settings'    => 'evstrap_navbar_bgcolor',
						'type'        => 'select',
						'choices'     => array(
							'bg-primary'    => __( 'Primary Background', 'evstrap' ),
							'bg-secondary'   	=> __( 'Secondary Background ', 'evstrap' ),
							'bg-light'   	=> __( 'Light Background ', 'evstrap' ),
							'bg-dark'   	=> __( 'Dark Background ', 'evstrap' ),
							'bg-white'   	=> __( 'White ', 'evstrap' ),
							'bg-transparent'   	=> __( 'Transparent', 'evstrap' ),
						)
					)
				)
			);

			// Navbar background transparancy
			$wp_customize->add_setting(
				'evstrap_navbar_bgalpha',
				array(
					'default'           => 100,
					'type'              => 'theme_mod',
					'sanitize_callback' => 'evstrap_sanitize_integer',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new evStrap_Slider_Custom_Control(
					$wp_customize,
					'evstrap_navbar_bgalpha',
					array(
						'label'       => __( 'Navbar background transparancy', 'evstrap' ),
						'description' => __( 'Choose opacity of background color. If you want a fully transparent bg, select <i>Transparent</i> for the Navbar Background Color.', 'evstrap' ),
						'section'     => 'evstrap_theme_navbar_options',
						'settings'    => 'evstrap_navbar_bgalpha',
						'input_attrs' => array(
							'min' => 0, // Required. Minimum value for the slider
							'max' => 100, // Required. Maximum value for the slider
							'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
						),
					)
				)
			);

			// // Navbar Pinned On Scroll background color
			// $wp_customize->add_setting(
			// 	'evstrap_navbar_pinned_bgcolor',
			// 	array(
			// 		'default'           => '',
			// 		'type'              => 'theme_mod',
			// 		'sanitize_callback' => 'evstrap_theme_slug_sanitize_select',
			// 		'capability'        => 'edit_theme_options',
			// 	)
			// );
			// $wp_customize->add_control(
			// 	new WP_Customize_Control(
			// 		$wp_customize,
			// 		'evstrap_navbar_pinned_bgcolor',
			// 		array(
			// 			'label'       => __( 'Navbar Pinned-on-scroll Background Color', 'evstrap' ),
			// 			'description' => __( 'Choose Navbar Pinned-on-scroll background colour based on theme primary, secondary, dark, and light classes. See BS docs for <a href="https://getbootstrap.com/docs/4.2/components/navbar/#background-colors" target="_blank">more details</a>', 'evstrap' ),
			// 			'section'     => 'evstrap_theme_navbar_options',
			// 			'settings'    => 'evstrap_navbar_pinned_bgcolor',
			// 			'type'        => 'select',
			// 			'choices'     => array(
			// 				'bg-primary'    => __( 'Primary Background', 'evstrap' ),
			// 				'bg-secondary'   	=> __( 'Secondary Background ', 'evstrap' ),
			// 				'bg-light'   	=> __( 'Light Background ', 'evstrap' ),
			// 				'bg-dark'   	=> __( 'Dark Background ', 'evstrap' ),
			// 				'bg-white'   	=> __( 'White ', 'evstrap' ),
			// 				//'bg-transparent'   	=> __( 'Transparent', 'evstrap' ),
			// 			)
			// 		)
			// 	)
			// );

			// // Navbar Pinned-on-scroll background transparancy
			// $wp_customize->add_setting(
			// 	'evstrap_navbar_pinned_bgalpha',
			// 	array(
			// 		'default'           => '',
			// 		'type'              => 'theme_mod',
			// 		'sanitize_callback' => 'evstrap_sanitize_integer',
			// 		'capability'        => 'edit_theme_options',
			// 	)
			// );
			// $wp_customize->add_control(
			// 	new evStrap_Slider_Custom_Control(
			// 		$wp_customize,
			// 		'evstrap_navbar_pinned_bgalpha',
			// 		array(
			// 			'label'       => __( 'Navbar background transparancy', 'evstrap' ),
			// 			'description' => __( 'Choose opacity of background color. If you want a fully transparent bg, select <i>Transparent</i> for the Navbar Background Color.', 'evstrap' ),
			// 			'section'     => 'evstrap_theme_navbar_options',
			// 			'settings'    => 'evstrap_navbar_pinned_bgalpha',
			// 			'input_attrs' => array(
			// 				'min' => 0, // Required. Minimum value for the slider
			// 				'max' => 100, // Required. Maximum value for the slider
			// 				'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
			// 			),
			// 		)
			// 	)
			// );


		/**
		* Navbar Features
		**/
		$wp_customize->add_section(
			'evstrap_theme_navbar_content',
			array(
				'title'       => __( 'Navbar Features', 'evstrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Navbar featured elements', 'evstrap' ),
				'panel' => 'evstrap_options',
			)
		);

		$wp_customize->add_setting(
			'evstrap_navbar_shortcode',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				//'sanitize_callback' => 'esc_attr',
				//'sanitize_js_callback' => 'esc_html',
			)
		);
		$wp_customize->add_control(
			new evStrap_Sortable_Repeater_Custom_Control(
			$wp_customize,
				'evstrap_navbar_shortcode',
				array(
					'label'    		=> esc_html__('Navbar Elements', 'evstrap'),
					'description' 	=> esc_html__('Add shortcodes here to add icon link, call-to-action buttons, etc', 'evstrap'),
					'settings'		=> 'evstrap_navbar_shortcode',
					'section'  		=> 'evstrap_theme_navbar_content',
				)
			)
		);
		
		$wp_customize->add_setting(
			'evstrap_navbar_markup',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				//'sanitize_callback' => 'esc_attr',
				//'sanitize_js_callback' => 'esc_html',
			)
		);
		$wp_customize->add_control(
			new evStrap_TinyMCE_Custom_control(
			$wp_customize,
				'evstrap_navbar_markup',
				array(
					'label'    		=> esc_html__('Navbar Markup', 'evstrap'),
					'description' 	=> esc_html__('Add content here to add additional elements to navbar', 'evstrap'),
					'settings'		=> 'evstrap_navbar_markup',
					'section'  		=> 'evstrap_theme_navbar_content',
				)
			)
		);


		// Page Header options.
		// $wp_customize->add_section(
		// 	'evstrap_theme_header_settings',
		// 	array(
		// 		'title'       => __( 'Page Header Settings', 'evstrap' ),
		// 		'capability'  => 'edit_theme_options',
		// 		'description' => __( 'Navbar skin and layout defaults', 'evstrap' ),
		// 		'panel' => 'evstrap_options',
		// 	)
		// );

		/**
		 * Colour Pallete
		 * * Building palette array
		 * 
		 * * removed for now as there is not easy way to have the colour picker
		 * * and SASS cooperate nicely
		 */
		/*
		// primary color
		$evstrap_color_palette[] = array(
			'slug'=>'evstrap_color_primary', 
			//'default' => '#7C008C',
			'default' => get_theme_mod( 'evstrap_color_primary' ),
			'label' => 'Primary Color'
		);

		// secondary color
		$evstrap_color_palette[] = array(
			'slug'=>'evstrap_color_secondary', 
			'default' => '#6c757d',
			'label' => 'Secondary Color'
		);

		// info color
		$evstrap_color_palette[] = array(
			'slug'=>'evstrap_color_info', 
			'default' => '#17a2b8',
			'label' => 'Info Color'
		);

		// warning color
		$evstrap_color_palette[] = array(
			'slug'=>'evstrap_color_warning', 
			'default' => '#ffc107',
			'label' => 'Warning Color'
		);

		// danger color
		$evstrap_color_palette[] = array(
			'slug'=>'evstrap_color_danger', 
			'default' => '#dc3545',
			'label' => 'Danger Color'
		);
		*/
		/**
		 * Loop through palette aray and define settings and controls for each
		 * * commented out for now - see above
		 */ 
		/*
		foreach( $evstrap_color_palette as $evstrap_color_palette ) {
			// SETTINGS
			$wp_customize->add_setting(
					$evstrap_color_palette['slug'], array(
							'default' => $evstrap_color_palette['default'],
							'type' => 'option', 
							'capability' =>  'edit_theme_options'
					)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
						$wp_customize,
						$evstrap_color_palette['slug'], 
						array('label' => $evstrap_color_palette['label'], 
						'section' => 'colors',
						'settings' => $evstrap_color_palette['slug'])
				)
			);
		}*/

	}
} // endif function_exists( 'evstrap_theme_customize_register' ).
add_action( 'customize_register', 'evstrap_theme_customize_register' );

get_template_part( 'inc/customizer', 'header' );

