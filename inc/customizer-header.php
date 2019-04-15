<?php
/**
 * Understrap Customizer Variables for header.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_hex2rgba($color, $opacity = false) {
    //$default = 'rgb(0,0,0)';    
    if (empty($color))
        return false; 
    if ($color[0] == '#')
        $color = substr($color, 1);
    if (strlen($color) == 6)
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    elseif (strlen($color) == 3)
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    /*else
        return $default;*/
    $rgb = array_map('hexdec', $hex);    
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }    
    return $output;
}


function understrap_navbar_wrapper() {
    $navbar_position = (get_theme_mod('understrap_navbar_position') !== '' ? get_theme_mod('understrap_navbar_position') : '');

    if($navbar_position == 'fixed-top' || $navbar_position == 'fixed-bottom') {
        echo $navbar_fixed !== '' ? $navbar_position : '';
    }

}

function understrap_navbar() {

    // Collect and format customizer variables for output
    // @TODO create simple function to pass inf check if customizer setting is set so we can reduce the amount of code in out templates
    $navbar_position = (get_theme_mod('understrap_navbar_position') !== '' ? get_theme_mod('understrap_navbar_position') : '');
    $navbar_breakpoint = (get_theme_mod('understrap_navbar_breakpoint') !== '' ? get_theme_mod('understrap_navbar_breakpoint') : '');
    $navbar_color_scheme = (get_theme_mod('understrap_navbar_color_scheme') !== '' ? get_theme_mod('understrap_navbar_color_scheme') : '');
    $navbar_bgcolor = (get_theme_mod('understrap_navbar_bgcolor') !== '' ? get_theme_mod('understrap_navbar_bgcolor') : '');
    $navbar_bgalpha = (get_theme_mod('understrap_navbar_bgalpha') !== '' ? 'bg-alpha' : '');

    // concatinate all variables into tidy class string
    $navbar_classes[] = $navbar_breakpoint;
    $navbar_classes[] = $navbar_color_scheme;
    $navbar_classes[] = $navbar_bgcolor;
    $navbar_classes[] = $navbar_bgalpha;

    $navbar_classes = join(' ', $navbar_classes );

    echo $navbar_classes;

}

/**
 * Get Customizer Navbar Bg Color settings and write to css file
 * TODO: look into if this is properly cachable,
 * TODO: if not output to inline styles (wp_add_inline_style)
 */
function navbar_header_styles() {
    // Get BG base colour and alpha value
    $navbar_bgcolor = (get_theme_mod('understrap_navbar_bgcolor') !== '' ? get_theme_mod('understrap_navbar_bgcolor') : '');
    $navbar_bgalpha = (get_theme_mod('understrap_navbar_bgalpha') !== '' ? get_theme_mod('understrap_navbar_bgalpha') : '');

    // if transparent
    if($navbar_bgalpha !== '') {
        // Get current Theme palette value for use in alpha calculation 
        switch($navbar_bgcolor) {
            case 'bg-primary':
                $bgcolor = get_theme_mod( 'understrap_color_primary' );
                break;
            case 'bg-secondary':
                $bgcolor = get_theme_mod( 'understrap_color_secondary' );
                break;
            case 'bg-light':
                $bgcolor = get_theme_mod( 'understrap_color_light' );
                break;
            case 'bg-dark':
                $bgcolor = get_theme_mod( 'understrap_color_dark' );
                break;
            case 'bg-white':
                $bgcolor = get_theme_mod( 'understrap_color_white' );
                break;
        }
        // get set alpha value
        $navbar_bgalpha = $navbar_bgalpha / 100;

        // calculate rgba value through hex2rgb function
        $bgcolor = understrap_hex2rgba($bgcolor, $navbar_bgalpha);

		// Style
		$navbar_css = "
		.navbar.bg-alpha {
			background-color: {$bgcolor} !important;
        }";

        $css_file = file_get_contents(get_template_directory() . '/css/customizer-navbar.css');

        if($navbar_css == $css_file) {
        } else {
            file_put_contents( get_template_directory() . '/css/customizer-navbar.css', $navbar_css);
        }

        

        wp_enqueue_style('custom-navbar-style', get_template_directory_uri() . '/css/customizer-navbar.css');
		//wp_add_inline_style( 'custom-navbar-style', $navbar_css );
	}
 }
 add_action( 'wp_enqueue_scripts', 'navbar_header_styles' );