<?php
/**
 * Understrap Customizer Variables for header.php
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function evstrap_hex2rgba($color, $opacity = false) {
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

/**
 * If naxbar is fixed positioned apply appropriate class
 *
 */
function evstrap_navbar_wrapper() {
    $navbar_position = (!empty(get_theme_mod('evstrap_navbar_position')) ? get_theme_mod('evstrap_navbar_position') : '');
    // if Navbar position is fixed top or bottom output that to our navbar wrapper
    if($navbar_position == 'fixed-top' || $navbar_position == 'fixed-bottom') {
        
        $navbar_classes[] = $navbar_position;
        $navbar_classes[] = "headroom";

        $navbar_classes = join(' ', $navbar_classes );

        echo $navbar_classes;
        //echo $navbar_fixed;
    }
}

/**
 * Gather theme setting and output navbar classes
 *
 */
function evstrap_navbar() {

    // Collect and format customizer variables for output
    // @TODO create simple function to pass inf check if customizer setting is set so we can reduce the amount of code in out templates
    $navbar_position = (!empty(get_theme_mod('evstrap_navbar_position')) ? get_theme_mod('evstrap_navbar_position') : '');
    $navbar_breakpoint = (!empty(get_theme_mod('evstrap_navbar_breakpoint')) ? get_theme_mod('evstrap_navbar_breakpoint') : '');
    $navbar_color_scheme = (!empty(get_theme_mod('evstrap_navbar_color_scheme')) ? get_theme_mod('evstrap_navbar_color_scheme') : '');
    $navbar_bgcolor = (!empty(get_theme_mod('evstrap_navbar_bgcolor')) ? get_theme_mod('evstrap_navbar_bgcolor') : '');
    //$navbar_bgalpha = (!empty(get_theme_mod('evstrap_navbar_bgalpha')) ? 'bg-alpha' : '');
    $navbar_bgalpha = ( null !== get_theme_mod('evstrap_navbar_bgalpha') ? get_theme_mod('evstrap_navbar_bgalpha') : '');

    // Commented out code as options are currently not in play. May look to Include later
    // $navbar_pinned_bgcolor = (!empty(get_theme_mod('evstrap_navbar_bgcolor')) ? get_theme_mod('evstrap_navbar_bgcolor') : '');
    // $navbar_pinned_bgalpha = (null !== get_theme_mod('evstrap_navbar_bgalpha') ? get_theme_mod('evstrap_navbar_bgalpha') : '');

    // concatinate all variables into tidy class string
    $navbar_classes[] = $navbar_breakpoint;
    $navbar_classes[] = $navbar_color_scheme;
    if( $navbar_bgcolor !== 'bg-transparent' ) {
        $navbar_classes[] = 'bg-alpha';
    } else {
        $navbar_classes[] = $navbar_bgcolor;
    }

    $navbar_classes = join(' ', $navbar_classes );

    echo $navbar_classes;

}

/**
 * Get Customizer Navbar Bg Color settings and write to css file
 * TODO: look into if this is properly cachable,
 * TODO: if not output to inline styles (wp_add_inline_style)
 * TODO: Have WP options for fixed menu styling
 */
function navbar_header_styles() {
    // Get BG base colour and alpha value
    $navbar_bgcolor = (!empty(get_theme_mod('evstrap_navbar_bgcolor')) ? get_theme_mod('evstrap_navbar_bgcolor') : '');
    //$navbar_bgalpha = (!empty(get_theme_mod('evstrap_navbar_bgalpha')) ? get_theme_mod('evstrap_navbar_bgalpha') : '');
    $navbar_bgalpha = (null !== get_theme_mod('evstrap_navbar_bgalpha') ? get_theme_mod('evstrap_navbar_bgalpha') : '');

    $navbar_pinned_bgcolor = (!empty(get_theme_mod('evstrap_navbar_bgcolor')) ? get_theme_mod('evstrap_navbar_bgcolor') : '');
    $navbar_pinned_bgalpha = (null !== get_theme_mod('evstrap_navbar_bgalpha') ? get_theme_mod('evstrap_navbar_bgalpha') : '');

    // if bg opacity set and bg color not transparent
    if( $navbar_bgcolor !== 'bg-transparent' ) {
    //if( (0 <= $navbar_bgalpha) && ($navbar_bgalpha <= 99) ) {
    //if( in_array($navbar_bgalpha, range(0,99)) ) {
        // Get current Theme palette value for use in alpha calculation 
        switch($navbar_bgcolor) {
            case 'bg-primary':
                $bgcolor = get_theme_mod( 'evstrap_color_primary' );
                break;
            case 'bg-secondary':
                $bgcolor = get_theme_mod( 'evstrap_color_secondary' );
                break;
            case 'bg-light':
                $bgcolor = get_theme_mod( 'evstrap_color_light' );
                break;
            case 'bg-dark':
                $bgcolor = get_theme_mod( 'evstrap_color_dark' );
                break;
            case 'bg-white':
                $bgcolor = get_theme_mod( 'evstrap_color_white' );
                break;
        }
        // get set alpha value
        $navbar_bgalpha = $navbar_bgalpha / 100;

        // calculate rgba value through hex2rgb function
        $bgcolor = evstrap_hex2rgba($bgcolor, $navbar_bgalpha);

    } // end if not bg-transparent
    
    /*
    if( $navbar_pinned_bgcolor !== '' ) {
        // Get current Theme palette value for use in alpha calculation 
        switch($navbar_pinned_bgcolor) {
            case 'bg-primary':
                $pinned_bgcolor = get_theme_mod( 'evstrap_color_primary' );
                break;
            case 'bg-secondary':
                $pinned_bgcolor = get_theme_mod( 'evstrap_color_secondary' );
                break;
            case 'bg-light':
                $pinned_bgcolor = get_theme_mod( 'evstrap_color_light' );
                break;
            case 'bg-dark':
                $pinned_bgcolor = get_theme_mod( 'evstrap_color_dark' );
                break;
            case 'bg-white':
                $pinned_bgcolor = get_theme_mod( 'evstrap_color_white' );
                break;
        }
        // get set alpha value
        $navbar_pinned_bgalpha = $navbar_pinned_bgalpha / 100;

        // calculate rgba value through hex2rgb function
        $pinned_bgcolor = evstrap_hex2rgba($pinned_bgcolor, $navbar_pinned_bgalpha);
    }*/

    //if( $bgcolor !== '' || $pinned_bgcolor !== '' ) {
    if( $bgcolor !== '' ) {
        // Style
        if( $bgcolor !== '' ) {
            $navbar_css[] = "
            .navbar.bg-alpha {
                background-color: {$bgcolor} !important;
            }";
        }

        // if( $pinned_bgcolor !== '' ) {
        //     $navbar_css[] = "
        //     .headroom--not-top.headroom--pinned .navbar.bg-alpha,
        //     .headroom--not-bottom.headroom--pinned .navbar.bg-alpha {
        //         background-color: {$pinned_bgcolor} !important;
        //     }";
        // }

        $navbarfile = get_template_directory() . '/css/customizer-navbar.css';

        if (file_exists($navbarfile)) {
            $css_file = file_get_contents($navbarfile);

            if($navbar_css != $css_file) {
                file_put_contents( $navbarfile, $navbar_css);
            }
        }
       

        


        wp_enqueue_style('custom-navbar-style', get_template_directory_uri() . '/css/customizer-navbar.css');
        //wp_add_inline_style( 'custom-navbar-style', $navbar_css );
    } // end check if navbar bg colours 
 }
 add_action( 'wp_enqueue_scripts', 'navbar_header_styles' );