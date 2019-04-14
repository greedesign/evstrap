<?php
/**
 * Custom afc functions.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function acf_header_styles() {

  if(get_field('header_background_image')) {
    wp_enqueue_style(
      'custom-header-style',
      get_template_directory_uri() . '/style.css'
    );

    $header_background_image = get_field('header_background_image');
    $header_width = get_field('page_header_width');
    $header_height = get_field('page_header_height');
    $header_img = get_field('different_header_image');
    $overlay = get_field('overlay');
    $overlay_color = get_field('overlay_color');
    $overlay_transparency = (get_field('overlay_transparency') / 100);

    // Set Image Variables for output
    switch($header_height) {
      case "default":
        $height = "auto";
        // set img size
        if ($header_width == 'alignfull') {
          $img_size = 'banner-default-full-container';
        } else {
          $img_size = 'banner-default-fixed-container';
        }
        break;
      case "tall":
        $height = "550px";
        // set img size
        if ($header_width == 'alignfull') {
          $img_size = 'banner-tall-full-container';
        } else {
          $img_size = 'banner-tall-fixed-container';
        }
        break;
      case "full_page":
        $height = "calc(100vh - 56px)";
        // set img size
        $img_size = 'banner-full-screen';
      default:
        $height = $header_height . "px";
        // set img size
        $img_size = 'banner-full-screen';
        break;
    }
    // Determine Header Image source
    if($header_img == true && get_field('header_image')) {
      $header_img_url = get_field('header_image')['sizes'][$img_size];
    } else {
      $header_img_url = get_the_post_thumbnail_url(get_the_ID(), $img_size);
    }

    // Styles
    $header_css[] = "
    .wrapper {
      padding-top: 0;
    }
    .entry-header {
      position: relative;
      padding: 50px;
      color: #fff;
      height: {$height};
      background-image: url({$header_img_url});
      background-repeat: no-repeat;
      background-size: cover;
    }
    .navbar-is-fixed-top .entry-header {
      padding-top: calc(50px + 56px);
    }";
    if($overlay):
      $header_css[] = "
      .entry-header > * {
        position: relative;
      }
      .entry-header::before {
        content: \"\";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: {$overlay_color};
        opacity: {$overlay_transparency};
        z-index: 0;
      }";
    endif;

    $header_css = implode(" ", $header_css);

    wp_add_inline_style( 'custom-header-style', $header_css );
  }
}
add_action( 'wp_enqueue_scripts', 'acf_header_styles' );

/**
 * Need to work in logic to check if theme defaults are set in Customizer
 * and use those as individual page defaults
 */
/*function acf_check_defaults() {

  $page_header_width = get_field( 'page_header_width' );

  $value = update_field( 'my_field', 'my_value', $post_id );

}*/

/*$understrap_page_header_width_default = get_theme_mod('understrap_page_header_width_default');

add_filter('acf/load_field/name=page_header_width',
        function($field) use ($understrap_page_header_width_default) { 
        // the variable after 'use' ($member_id) indicates that it is the one to 'use' from the main script.  $field is coming from 'acf/load_field'.  
      $field['default_value'] = $understrap_page_header_width_default;
      return $field;
  }
);
*/