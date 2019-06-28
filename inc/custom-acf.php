<?php
/**
 * Custom afc functions.
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Process Custom ACF fields for styling and class output
 */
if ( function_exists( 'get_field' ) ) { // CHECK THAT CUSTOM ACF IS INSTALLED

  // add class to body if page has custom header
  function acf_header_body_class( $classes ) {

    $background_type = get_field('background_type');

    // ensure parent page header setting is currently not 'none' before processing anything
    if ($background_type && $background_type !== 'none'):

      // Add default custom header class to body
      $classes[] = "page-custom-header";

      // Add header background type class to body
      switch($background_type) {
        case "color":
          $classes[] = 'page-custom-header-is-background-color';
          break;
        case "gradient":
          $classes[] = 'page-custom-header-is-background-gradient';
          break;
        case "image":
          $classes[] = 'page-custom-header-is-background-img';
          break;
      }

      // Add class if header is full width
      if (get_field('page_header_width') == 'alignfull'):
        $classes[] = "page-custom-header-is-alignfull";
      endif;

    endif;
    return $classes;
  }
  add_filter( 'body_class', 'acf_header_body_class' );

  // Add classes to header_page
  function acf_header_classes() {

    $background_type = get_field('background_type');

    // Combine variables for use as classes
    $header_classes = [];
    // only output title alignment class if advanced header alignment is enabled
    if(get_field('enable_advanced_header_alignment') !== 1):
      $header_classes[] = get_field('title_alignment');
    endif;

    // if background type is not none: add background, width and alignment classes; otherwise add a default class
    if (get_field('background_type') && get_field('background_type') !== 'none'):
      $header_classes[] = 'header-background-cover';
      $header_classes[] = get_field('page_header_width');
      $header_classes[] = (get_field('enable_advanced_header_alignment') == 1 ? 'd-flex flex-wrap' : '');
      $header_classes[] = get_field('header_vertical_align');
      $header_classes[] = get_field('header_horizontal_align');
      $header_classes[] = get_field('header_content_align');
    else:
      $header_classes[] = 'header-default';
    endif;

    // add header classes depending on background type option
    switch($background_type) {
      case "color":
        $header_classes[] = 'header-background-color';
        break;
      case "gradient":
        $header_classes[] = 'header-background-gradient';
        break;
      case "image":
        $header_classes[] = 'header-background-img';
        $header_classes[] = (get_field('header_image_bgposition') ? 'bgpos-' . str_replace('_', '-', get_field('header_image_bgposition')) : '');
        $header_classes[] = (get_field('header_image_bgsize') ? 'bgsize-' . get_field('header_image_bgsize') : '');
        $header_classes[] = (get_field('header_image_bgrepeat') ? 'bg' . str_replace('_', '-', get_field('header_image_bgrepeat')) : '');
        break;
    }

    $additional_css_class = get_field('additional_css_class');
    $header_classes[] = $additional_css_class;

    $header_classes = join(' ', $header_classes );

    echo $header_classes;
  }


  /**
   * ACF Header Styles
   *
   */
  function acf_header_styles() {

    $background_type = get_field('background_type');

    $header_width = get_field('page_header_width');
    $header_height = get_field('page_header_height');

    $header_feature_img = get_field('featured_header_image');
    $header_img = get_field('header_image');

    $img_overlay_type = get_field('img_overlay_type');
    $img_overlay_color = get_field('img_overlay_color');
    $img_color_overlay_transparency = (get_field('img_color_overlay_transparency') / 100);
    $img_overlay_gradient = get_field('img_overlay_gradient');

    $header_bgcolor = get_field('background_color');
    $header_bggradient = get_field('background_gradient');

    if (get_field('background_type') && get_field('background_type') !== 'none'):
      // ambigious enqueue call - dosn't actually do anything with style.css but need this to work for some reason?
      wp_enqueue_style(
        'custom-header-style',
        get_template_directory_uri() . '/style.css'
      );

      // set height property
      /**
       * TODO change generated CSS to set classesand control all through CSS
       */
      switch($header_height) {
        case "default":
          $height = "auto";
          break;
        case "tall":
          $height = "550px";
          break;
        case "full_page":
          $height = "calc(100vh - 56px)";
          break;
        default:
          $height = $header_height . "px";
          break;
      }

      // Styles
      if($header_width == 'alignfull'):
        $header_css[] = "
        .wrapper {
          padding-top: 0;
        }";
      endif;
      $header_css[] = "
      .entry-header {
        position: relative;
        padding: 50px;
        color: #fff;
        height: {$height};
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
            z-index: 0;
          }";
      endif;

      /**
       * Background Type - Image
       * * determine header image source
       * * set image style based on header height
       * * setup image overlay and output CSS
       */
      if($background_type == 'image'):

        // Set Image style based on header height setting
        switch($header_height) {
          case "default":
            if ($header_width == 'alignfull') {
              $img_size = 'banner-default-full-container';
            } else {
              $img_size = 'banner-default-fixed-container';
            }
            break;
          case "tall":
            if ($header_width == 'alignfull') {
              $img_size = 'banner-tall-full-container';
            } else {
              $img_size = 'banner-tall-fixed-container';
            }
            break;
          case "full_page":
            $img_size = 'banner-full-screen';
          default:
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

        // Determine and set Overlay CSS properties
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

        // Set CSS prorporties for background image
        $header_css[] = "
          .entry-header {
            background-image: url({$header_img_url});
          }";
        if($img_overlay_type !== 'none'):
          $header_css[] = "
            .entry-header::before {
              {$overlay_props}
            }";
        endif;

      endif;

      /**
       * Background Type - Color
       * * setup header background-color and output CSS
       */
      if($background_type == 'color'):
        $header_css[] = "
          .entry-header {
            background-color: {$header_bgcolor};
          }
        ";
      endif;

      if($background_type == 'gradient'):
        $header_css[] = "
          .entry-header {
            {$header_bggradient};
          }
        ";
      endif;

      $header_css = implode(" ", $header_css);

      wp_add_inline_style( 'custom-header-style', $header_css );

    endif;
  }
  add_action( 'wp_enqueue_scripts', 'acf_header_styles' );

} //END if ( function_exists( 'get_field' ) )

/**
 * Need to work in logic to check if theme defaults are set in Customizer
 * and use those as individual page defaults
 */
/*function acf_check_defaults() {

  $page_header_width = get_field( 'page_header_width' );

  $value = update_field( 'my_field', 'my_value', $post_id );

}*/

/*$evstrap_page_header_width_default = get_theme_mod('evstrap_page_header_width_default');

add_filter('acf/load_field/name=page_header_width',
        function($field) use ($evstrap_page_header_width_default) {
        // the variable after 'use' ($member_id) indicates that it is the one to 'use' from the main script.  $field is coming from 'acf/load_field'.
      $field['default_value'] = $evstrap_page_header_width_default;
      return $field;
  }
);
*/