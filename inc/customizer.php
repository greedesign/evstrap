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



/**
 * Add Theme Customize Control Assets
 */
if ( ! function_exists( 'understrap_enqueue_customize_controls_stylesheet' ) ) {
	/**
	 * Enqueue the stylesheet.
	 */
	function understrap_enqueue_customize_controls_stylesheet() {
		wp_enqueue_style( 'customize_controls_css', get_template_directory_uri().'/css/customize-controls.min.css');
	}
	add_action( 'customize_controls_print_styles', 'understrap_enqueue_customize_controls_stylesheet' );
}
if ( ! function_exists( 'understrap_enqueue_customize_controls_script' ) ) {
	/**
	 * Enqueue script for Customize Control Assets
	 */
	function understrap_enqueue_customize_controls_script() {
		wp_enqueue_script( 'customize_controls', get_template_directory_uri() . '/js/customize-controls.min.js', array( 'jquery', 'customize-controls' ), false, true );
	}
	add_action( 'customize_controls_enqueue_scripts', 'understrap_enqueue_customize_controls_script' );
}



if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {


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


		$wp_customize->add_panel( 'understrap_options', array(
			'title' => __( 'Theme Settings' ),
			'description' => __( 'Custom Theme Settings', 'understrap' ), // Include html tags such as <p>.
			'priority' => 160, // Mixed with top-level-section hierarchy.
		) );
	

		// Theme layout settings.
		$wp_customize->add_section(
			'understrap_theme_layout_options',
			array(
				'title'       => __( 'Site Layout Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'understrap' ),
				'panel' => 'understrap_options',
				//'priority'    => 160,
			)
		);

			// Container Type
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

			//Sidebar Position
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
				'title'       => __( 'Navbar Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Navbar skin and layout defaults', 'understrap' ),
				'panel' => 'understrap_options',
				//'priority'    => 161,
			)
		);

			// Navbar Poistion
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

			// Navbar Container Width
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
						'label'       => __( 'Navbar Container', 'understrap' ),
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

		// @TODO Move all Customize Controls (add others from https://madebydenis.com/adding-custom-controls-to-your-customization-api/ ) to seperate include file and organize all assets
		class Multi_Input_Custom_control extends WP_Customize_Control{
			public $type = 'multi_input';
			public function render_content(){
				?>
				<label class="customize_multi_input test">
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<p><?php echo wp_kses_post($this->description); ?></p>
					<input type="hidden" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" class="customize_multi_value_field" data-customize-setting-link="<?php echo esc_attr($this->id); ?>"/>
					<div class="customize_multi_fields">
						<div class="set d-flex justify-content-end align-items-center">
							<input type="text" value="" class="customize_multi_single_field"/>
							<a href="#" class="customize_multi_remove_field"><i class="fas fa-trash-alt fa-fw"></i></a>
						</div>
					</div>
					<a href="#" class="button button-primary customize_multi_add_field"><?php esc_attr_e('Add More', 'understrap') ?></a>
				</label>
				<?php
			}
		}

		$wp_customize->add_section(
			'understrap_theme_navbar_content',
			array(
				'title'       => __( 'Navbar Features', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Navbar featured elements', 'understrap' ),
				'panel' => 'understrap_options',
				//'priority'    => 161,
			)
		);

		/**
		* Multiple input field
		**/
		$wp_customize->add_setting('navbar_shortcode', array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(new Multi_Input_Custom_control($wp_customize, 'navbar_shortcode', array(
			'label'    		=> esc_html__('Navbar Elements', 'understrap'),
			'description' 	=> esc_html__('Add shortcodes here to add icon link, call-to-action buttons, etc', 'understrap'),
			'settings'		=> 'navbar_shortcode',
			'section'  		=> 'understrap_theme_navbar_content',
		)));


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
