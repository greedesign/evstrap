<?php
add_action('acf/init', 'understrap_acf_init');
function understrap_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register ev+ FA ICON BOX Block
		acf_register_block(array(
			'name'				=> 'ev-fa-icon',
			'title'				=> __('ev+ FA Icon'),
			'description'		=> __('ev+ Custom Font Awesome Icon Box Block.'),
			//'render_callback'	=> 'understrap_acf_block_render_callback',
			'render_template'   => get_template_directory() . '/template-parts/block/ev-fa-icon/content-ev-fa-icon.php',
			'category'			=> 'formatting',
			'icon'				=> 'index-card',
			'keywords'			=> array( 'icon', 'font awesome' ),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-fa-icon/ev-fa-icon.css'
		));
		
		// register ev+ Accordion Block
		acf_register_block(array(
			'name'				=> 'ev-accordion',
			'title'				=> __('ev+ Accordion Block'),
			'description'		=> __('ev+ Custom Accordion Block.'),
			//'render_callback'	=> 'understrap_acf_block_render_callback',
			'render_template'   => get_template_directory() . '/template-parts/block/ev-accordion/content-accordion.php',
			'category'			=> 'formatting',
			'icon'				=> 'minus',
			'keywords'			=> array( 'accordion', 'collapse' ),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-accordion/ev-accordion.css'
		));	

		// register ev+ Featured Card
		acf_register_block(array(
			'name'				=> 'ev-featured-card',
			'title'				=> __('ev+ Featured Card'),
			'description'		=> __('ev+ Custom Accordion Block.'),
			//'render_callback'	=> 'understrap_acf_block_render_callback',
			'render_callback'	=> 'understrap_acf_featured_block_render_callback',
			//'render_template'   => get_template_directory() . 'template-parts/block/ev-featured-card/content-ev-featured-card.php',
			//'render_template' => '/wp-content/themes/understrap/template-parts/blocks/ev-featured-card/content-ev-featured-card.php',
			'category'			=> 'formatting',
			'icon'				=> 'index-card',
			'keywords'			=> array( 'featured', 'card', 'featured card'),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-featured-card/ev-featured-card.css'
		));
		
		// register ev+ Logo Grid
		acf_register_block(array(
			'name'				=> 'ev-logo-grid',
			'title'				=> __('ev+ Logo Grid'),
			'description'		=> __('ev+ Custom Logo Grid Block.'),
			//'render_callback'	=> 'understrap_acf_block_render_callback',
			'render_template'   => get_template_directory() . '/template-parts/block/ev-logo-grid/content-logo-grid.php',
			'category'			=> 'formatting',
			'icon'				=> 'grid-view',
			'keywords'			=> array( 'grid', 'logo', 'logo grid'),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-logo-grid/ev-logo-grid.css'
		));

		// register ev+ Logo Grid
		acf_register_block(array(
			'name'				=> 'ev-post-object',
			'title'				=> __('ev+ Post Object'),
			'description'		=> __('ev+ Custom Post Object Block.'),
			//'render_callback'	=> 'understrap_acf_block_render_callback',
			'render_template'   => get_template_directory() . '/template-parts/block/ev-post-object/content-post-object.php',
			'category'			=> 'formatting',
			'icon'				=> 'admin-post',
			'keywords'			=> array( 'post', 'post grid', 'grid'),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-post-object/ev-post-object.css'
		));

	}
}

function understrap_acf_featured_block_render_callback() {
	var_dump('fired understrap_acf_featured_block_render_callback');
}

/*
 * Callback function for ACF custom Gutenberg blocks
 * Assigns template file to defined block.
 */
// function understrap_acf_block_render_callback( $block ) {

// 	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
// 	$slug = str_replace('acf/', '', $block['name']);

// 	// include a template part from within the "template-parts/block" folder
// 	if( file_exists( get_template_directory_uri("/template-parts/block/{$slug}/content-{$slug}.php") ) ) {
// 		include( get_template_directory_uri("/template-parts/block/{$slug}/content-{$slug}.php") );
// 	}
// }
?>