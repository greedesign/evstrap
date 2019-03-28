<?php
/**
 * Custom afc functions.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Add ACF Field Group for Page Background Header settings
/*if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_5c9bc90ce3549',
    'title' => 'Page Header Options',
    'fields' => array(
      array(
        'key' => 'field_5c9be12153522',
        'label' => 'Header Background Image',
        'name' => 'header_background_image',
        'type' => 'true_false',
        'instructions' => 'Enable to set a page background image.
  Will use the Featured Image by default or you can specify another one if required.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => 'Enable Header Image',
        'default_value' => 0,
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
      ),
      array(
        'key' => 'field_5c9bdd1e64b25',
        'label' => 'Page Header Width',
        'name' => 'page_header_width',
        'type' => 'radio',
        'instructions' => 'Choose the page header styling.
  Wide - Extends the page header 80px to the left and right of the content width
  Fullwidth - Forces the page header to fill the full width of the site',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c9be12153522',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'default' => 'Default',
          'alignwide' => 'Wide',
          'alignfull' => 'Fullwidth',
        ),
        'allow_null' => 0,
        'other_choice' => 0,
        'default_value' => 'default',
        'layout' => 'vertical',
        'return_format' => 'value',
        'save_other_choice' => 0,
      ),
      array(
        'key' => 'field_5c9bdf3e7f55c',
        'label' => 'Page Header Height',
        'name' => 'page_header_height',
        'type' => 'radio',
        'instructions' => 'Choose the height of the page header.
  Default - Standard height. Height of header content with padding
  Tall - Fixed header height. 550px',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c9be12153522',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'default' => 'Default',
          'tall' => 'Tall',
          'full_page' => 'Fullpage',
        ),
        'allow_null' => 0,
        'other_choice' => 1,
        'save_other_choice' => 0,
        'default_value' => 'default',
        'layout' => 'vertical',
        'return_format' => 'value',
      ),
      array(
        'key' => 'field_5c9be20d55bbf',
        'label' => 'Header Image',
        'name' => 'different_header_image',
        'type' => 'true_false',
        'instructions' => 'Toggle to select image different from the page Featured Image',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c9be12153522',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => 'Use different image?',
        'default_value' => 0,
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
      ),
      array(
        'key' => 'field_5c9be2bf55bc0',
        'label' => 'Header Image',
        'name' => 'header_image',
        'type' => 'image',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_5c9be20d55bbf',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'medium_large',
        'library' => 'all',
        'min_width' => 1170,
        'min_height' => 300,
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => 10,
        'mime_types' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'field',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));
  
  endif;
*/

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

    $header_css = "
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
    }"
    ;
    wp_add_inline_style( 'custom-header-style', $header_css );
  }
}
add_action( 'wp_enqueue_scripts', 'acf_header_styles' );
