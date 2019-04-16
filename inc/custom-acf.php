<?php
/**
 * Custom afc functions.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Process Custom ACF fields for styling and class output
 */
if ( function_exists( 'get_field' ) ) { // CHECK THAT CUSTOM ACF IS INSTALLED

  function acf_header_styles() {
    if(get_field('background_type') !== 'none') {
      // ambigious enqueue call - dosn't actually do anything with style.css but need this to work for some reason?
      wp_enqueue_style(
        'custom-header-style',
        get_template_directory_uri() . '/style.css'
      );

      //$header_background_image = get_field('header_background_image');
      $header_feature_img = get_field('featured_header_image');
      $header_img = get_field('header_image');
      $header_width = get_field('page_header_width');
      $header_height = get_field('page_header_height');
      //$overlay = get_field('overlay');
      $img_overlay_type = get_field('img_overlay_type');
      $img_overlay_color = get_field('img_overlay_color');
      $img_color_overlay_transparency = (get_field('img_color_overlay_transparency') / 100);
      $img_overlay_gradient = get_field('img_overlay_gradient');

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
      // if featured_header_image is false and we have a set custom header image use it
      if($header_feature_img == false && get_field('header_image')) {
        $header_img_url = get_field('header_image')['sizes'][$img_size];
      } else { // otherwise use feartured image
        $header_img_url = get_the_post_thumbnail_url(get_the_ID(), $img_size);
      }

      // Determine and set Overlay properties
      switch($img_overlay_type) {
        case "color":
          $overlay_props = "
            background-color: {$img_overlay_color};
            opacity: {$img_color_overlay_transparency};
          ";
          break;
        case "gradient":
          $overlay_props = $img_overlay_gradient;
          break;
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
        }
        .navbar-is-fixed-top .entry-header {
          padding-top: calc(50px + 56px);
        }";
      if($img_overlay_type !== 'none'):
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
            {$overlay_props}
            z-index: 0;
          }";
      endif;

      $header_css = implode(" ", $header_css);

      wp_add_inline_style( 'custom-header-style', $header_css );
    }
  }
  add_action( 'wp_enqueue_scripts', 'acf_header_styles' );

  // Add classes to header_page
  function acf_header_classes() {

    // Combine variables for use as classes
    $header_classes = [];
    $header_classes[] = get_field('title_alignment');
    // if background type is not none add basic class , otherwise add default class
    $header_classes[] = (get_field('background_type') !== 'none' ? 'header-background-cover' : 'header-default');
    // only add header background classes if header background type is not none
    if (get_field('background_type') !== 'none'):
      // add class depending on background type option
      switch(get_field('background_type')) {
        case "color":
          $header_classes[] = 'header-background-color';
          break;
        case "gradient":
          $header_classes[] = 'header-background-gradient';
          break;
        case "image":
          $header_classes[] = 'header-background-img';
          break;
      }
      $header_classes[] = (get_field('header_image_bgposition') ? 'bgpos-' . str_replace('_', '-', get_field('header_image_bgposition')) : '');
      $header_classes[] = (get_field('header_image_bgsize') ? 'bgsize-' . get_field('header_image_bgsize') : '');
      $header_classes[] = (get_field('header_image_bgrepeat') ? 'bg' . str_replace('_', '-', get_field('header_image_bgrepeat')) : '');
      $header_classes[] = get_field('page_header_width');
      $header_classes[] = (get_field('enable_advanced_header_alignment') ? 'd-flex' : '');
      $header_classes[] = get_field('header_vertical_align');
      $header_classes[] = get_field('header_horizontal_align');
      $header_classes[] = get_field('header_content_align');
    endif;

    $header_classes = join(' ', $header_classes );

    echo $header_classes;
  }

  // add class to body if page has custom header
  function acf_header_body_class( $classes ) {
    if (get_field('background_type') !== 'none'):
      $classes[] = "page-custom-header";
    endif;
    return $classes;
  }
  add_filter( 'body_class', 'acf_header_body_class' );

} //END if ( function_exists( 'get_field' ) )

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