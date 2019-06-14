<?php

/**
 * Since I'm already doing a tutorial, I'm not going to include comments to
 * this code, but if you want, you can check out the "example.php" file
 * inside the ZIP you downloaded - it has a very detailed documentation.
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'evstrap_require_plugins' );

function evstrap_require_plugins() {

    $plugins = array(
        array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => true, // this plugin is recommended
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        ),
        array(
			'name'               => 'Advanced Custom Fields PRO', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory_uri() . '/lib/plugins/advanced-custom-fields-pro.5.8.0-RC2.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.8.0-RC2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'      => 'Font Awesome',
            'slug'      => 'font-awesome',
            'required'  => true, // this plugin is recommended
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        ),
        array(
            'name'      => 'Advanced Custom Fields: Font Awesome Field',
            'slug'      => 'advanced-custom-fields-font-awesome',
            'required'  => true, // this plugin is recommended
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        ),
        array(
            'name'      => 'DuracellTomi\'s Google Tag Manager for WordPress',
            'slug'      => 'duracelltomi-google-tag-manager',
            'required'  => false, // this plugin is recommended
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        ),
        array(
            'name'      => 'Yoast SEO',
            'slug'      => 'wordpress-seo',
            'required'  => false, // this plugin is recommended
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        ),
        array(
            'name'      => 'Simple 301 Redirects',
            'slug'      => 'simple-301-redirects',
            'required'  => false, // this plugin is recommended
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        ),


    );
    $config = array(
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );

}

?>