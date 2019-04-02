<?php
/**
 * Understrap Customizer Variables for header.php
 *
 * @package understrap
 * ! Dosn't Work - needs fixing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/*
function get_navbar_class( $class = '' ) {
    
    // Collect and format customizer variables for output
    // @TODO create simple function to pass variable name into so we can check if variable is set so we can reduce the amount of code in out templates
    $container = get_theme_mod( 'understrap_navbar_container' );
    $navbar_position = get_theme_mod('understrap_navbar_position'); //@TODO add CSS to apply appropriate spacing for navbar position body classes
    $navbar_breakpoint = get_theme_mod( 'understrap_navbar_breakpoint' );
    $navbar_shortcodes = get_theme_mod( 'understrap_navbar_shortcode' );
    $navbar_color_scheme = get_theme_mod( 'understrap_navbar_color_scheme' );
    $navbar_bgcolor = get_theme_mod( 'understrap_navbar_bgcolor' );
    $navbar_bgalpha = get_theme_mod( 'understrap_navbar_bgalpha' );

    // check if variable has value
    $navbar_breakpoint !== '' ? $navbar_breakpoint : '';
    $navbar_color_scheme !== '' ? $navbar_color_scheme : '';
    $navbar_position !== '' ? $navbar_position : '';
    $navbar_bgcolor !== '' ? $navbar_bgcolor : '';
    $navbar_bgalpha !== '' ? $navbar_bgalpha : '';

    // concatinate all variables into tidy class string
    $classes = array();
    $classes[] = $navbar_breakpoint;
    $classes[] = $navbar_color_scheme;
    //$classes[] = $navbar_position;
    $classes[] = $navbar_bgcolor;

    $classes = array_map( 'esc_attr', $classes );
 
    /**
     * Filters the list of CSS body class names for the current post or page.
     *
     * @since 2.8.0
     *
     * @param string[] $classes An array of body class names.
     * @param string[] $class   An array of additional class names added to the body.
     */
/*    $classes = apply_filters( 'body_class', $classes, $class );
 
    return array_unique( $classes );

}

function navbar_class( $class = '' ) {
    // Separates class names with a single space, collates class names for body element
    echo 'class="' . join( ' ', get_navbar_class( $class ) ) . '"';
}*/

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
    //$navbar_position !== '' ? $navbar_position : '';

    if($navbar_position == 'fixed-top' || $navbar_position == 'fixed-bottom') {
        echo $navbar_fixed !== '' ? $navbar_position : '';
    }

}
//add_action( 'after_setup_theme', 'understrap_navbar_wrapper' );

function understrap_navbar() {

    // Collect and format customizer variables for output
    // @TODO create simple function to pass inf check if customizer setting is set so we can reduce the amount of code in out templates
    $navbar_position = (get_theme_mod('understrap_navbar_position') !== '' ? get_theme_mod('understrap_navbar_position') : '');
    $navbar_breakpoint = (get_theme_mod('understrap_navbar_breakpoint') !== '' ? get_theme_mod('understrap_navbar_breakpoint') : '');
    $navbar_color_scheme = (get_theme_mod('understrap_navbar_color_scheme') !== '' ? get_theme_mod('understrap_navbar_color_scheme') : '');
    $navbar_bgcolor = (get_theme_mod('understrap_navbar_bgcolor') !== '' ? get_theme_mod('understrap_navbar_bgcolor') : '');
    $navbar_bgalpha = (get_theme_mod('understrap_navbar_bgalpha') !== '' ? 'bg-alpha' : '');

    // check if variable has value
    //$navbar_position !== '' ? $navbar_position : '';
    // $navbar_breakpoint !== '' ? $navbar_breakpoint : '';
    // $navbar_color_scheme !== '' ? $navbar_color_scheme : '';
    // $navbar_bgcolor !== '' ? $navbar_bgcolor : '';
    // $navbar_bgalpha = ($navbar_bgalpha !== '' ? 'bg-alpha' : '');

    // concatinate all variables into tidy class string
    $navbar_classes[] = $navbar_breakpoint;
    $navbar_classes[] = $navbar_color_scheme;
    $navbar_classes[] = $navbar_bgcolor;
    $navbar_classes[] = $navbar_bgalpha;

    //$navbar_classes = implode (" ", $navbar_classes);
    //return $navbar_classes;

    $navbar_classes = join(' ', $navbar_classes );

    echo $navbar_classes;

}
//add_action( 'after_setup_theme', 'understrap_navbar' );


function navbar_header_styles() {
    $navbar_bgcolor = (get_theme_mod('understrap_navbar_bgcolor') !== '' ? get_theme_mod('understrap_navbar_bgcolor') : '');
    $navbar_bgalpha = (get_theme_mod('understrap_navbar_bgalpha') !== '' ? get_theme_mod('understrap_navbar_bgalpha') : '');
    //$navbar_bgcolor !== '' ? $navbar_bgcolor : '';
    //$navbar_bgalpha !== '' ? $navbar_bgalpha : '';

    if($navbar_bgalpha !== '') {
        // Set current Theme palette value    
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

        $navbar_bgalpha = $navbar_bgalpha / 100;

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