
<?php 
/**
 * evStrap register ACF Blocks
 * 
 * @package evstrap
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action('acf/init', 'ev_acf_init');

if( !function_exists('ev_acf_init') ) {

	function ev_acf_init() {

		// check function exists
		if( function_exists('acf_register_block_type') ) {

			// register ev+ FA ICON BOX Block
			acf_register_block_type(array(
				'name'				=> 'ev-fa-icon',
				'title'				=> __('ev+ FA Icon'),
				'description'		=> __('ev+ Custom Font Awesome Icon Box Block.'),
				//'render_callback'	=> 'ev_fa_icon_block_render_callback',
				'render_callback'	=> '/template-parts/blocks/ev-fa-icon/ev-fa-icon.php',
				'category'			=> 'common',
				'icon'				=> 'index-card',
				'mode'				=> 'preview',
				'keywords'			=> array( 'icon', 'font awesome' ),
				'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-fa-icon/ev-fa-icon.css'
			));

			// register ev+ Accordion Block
			acf_register_block_type(array(
				'name'				=> 'ev-accordion',
				'title'				=> __('ev+ Accordion Block'),
				'description'		=> __('ev+ Custom Accordion Block.'),
				//'render_callback'	=> 'ev_accordion_block_render_callback',
				'render_template'	=> '/template-parts/blocks/ev-accordion/ev-accordion.php',
				'category'			=> 'formatting',
				'icon'				=> 'minus',
				//'mode'				=> 'preview',
				'keywords'			=> array( 'accordion', 'collapse' ),
				'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-accordion/ev-accordion.css'
			));

			// register ev+ Featured Card
			acf_register_block_type(array(
				'name'				=> 'ev-featured-card',
				'title'				=> __('ev+ Featured Card'),
				'description'		=> __('ev+ Featured Card Block.'),
				//'render_callback'	=> 'ev_featured_card_block_render_callback',
				'render_template'	=> '/template-parts/blocks/ev-featured-card/ev-featured-card.php',
				'category'			=> 'formatting',
				'icon'				=> 'index-card',
				'keywords'			=> array( 'featured', 'card', 'featured card'),
				//'mode'				=> 'preview',
				'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-featured-card/ev-featured-card.css',
				'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/ev-featured-card/ev-featured-card.js'
			));

			// register ev+ Logo Grid
			acf_register_block_type(array(
				'name'				=> 'ev-logo-grid',
				'title'				=> __('ev+ Logo Grid'),
				'description'		=> __('ev+ Custom Logo Grid Block.'),
				//'render_callback'	=> 'ev_logo_grid_block_render_callback',
				'render_template'	=> '/template-parts/blocks/ev-logo-grid/ev-logo-grid.php',
				'category'			=> 'formatting',
				'icon'				=> 'grid-view',
				//'mode'				=> 'preview',
				'keywords'			=> array( 'grid', 'logo', 'logo grid'),
				'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-logo-grid/ev-logo-grid.css'
			));

			// register ev+ Button
			acf_register_block_type(array(
				'name'				=> 'ev-button',
				'title'				=> __('ev+ Button Block'),
				'description'		=> __('Button element. Allows for anchor or button element and selection if bootstrap style options.'),
				//'render_callback'	=> 'ev_button_block_block_render_callback',
				'render_template'	=> '/template-parts/blocks/ev-button/ev-button.php',
				'category'			=> 'formatting',
				'icon'				=> 'admin-links',
				'mode'				=> 'preview',
				'keywords'			=> array( 'button', 'link', 'JS'),
				//'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css',
				'supports' => array(
					'align' => array( 'left', 'right' ),
				)
			));

			// register ev+ Latest Post Grid
			acf_register_block_type(array(
				'name'				=> 'ev-latest-post',
				'title'				=> __('ev+ Latest Post'),
				'description'		=> __('Custom Bootstrap Columns with WYSIWYG content for each column.'),
				//'render_callback'	=> 'ev_latest_post_grid_block_render_callback',
				'render_template'	=> '/template-parts/blocks/ev-latest-posts/ev-latest-posts.php',
				'category'			=> 'formatting',
				'icon'				=> 'admin-post',
				'mode'				=> 'preview',
				'keywords'			=> array( 'post', 'post grid', 'latest')
				//'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/ev-artist-post-grid/ev-artist-post-grid.js'
				//'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css'
			));

		} // END IF acf_register_block_type
	} // END ev_acf_init()
} // END IF ev_acf_init
?>