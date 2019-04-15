<?php
 
/**
 * Since I'm already doing a tutorial, I'm not going to include comments to
 * this code, but if you want, you can check out the "example.php" file
 * inside the ZIP you downloaded - it has a very detailed documentation.
 */
 
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'understrap_require_plugins' );
 
function understrap_require_plugins() {
 
    $plugins = array(
        array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => false, // this plugin is recommended
        ),
        array(
            'name'      => 'Block Lab',
            'slug'      => 'block-lab',
            'required'  => false, // this plugin is recommended
        )
    );
    $config = array( /* The array to configure TGM Plugin Activation */ );
 
    tgmpa( $plugins, $config );
 
}
 
?>