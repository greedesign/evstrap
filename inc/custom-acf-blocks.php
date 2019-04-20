<?php add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register ev+ FA ICON BOX Block
		acf_register_block(array(
			'name'				=> 'ev-fa-icon',
			'title'				=> __('ev+ FA Icon'),
			'description'		=> __('ev+ Custom Font Awesome Icon Box Block.'),
			'render_callback'	=> 'ev_fa_icon_block_render_callback',
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
			'render_callback'	=> 'ev_accordion_block_render_callback',
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
			'render_callback'	=> 'ev_featured_card_block_render_callback',
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
			'render_callback'	=> 'ev_logo_grid_block_render_callback',
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
			'render_callback'	=> 'ev_post_block_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-post',
			'keywords'			=> array( 'post', 'post grid', 'grid'),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-post-object/ev-post-object.css'
		));

		// register ev+ Button
		acf_register_block(array(
			'name'				=> 'ev-button',
			'title'				=> __('ev+ Button Block'),
			'description'		=> __('Button element. Allows for anchor or button element and selection if bootstrap style options.'),
			'render_callback'	=> 'ev_button_block_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-post',
			'keywords'			=> array( 'button', 'link', 'JS'),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css'
		));
	}
} 

/*
 * Callback function for ACF custom Gutenberg blocks
 * Assigns template file to defined block.
 * Generic callback
 */
/*function my_acf_block_render_callback( $block ) {
	echo '<a href="#" class="btn btn-primary">Hey</a>';
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/{$slug}/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/{$slug}/content-{$slug}.php") );
	}
}*/


/*
 * Callback function for ev-accordion
 */
function ev_accordion_block_render_callback( $block ) {
/**
 * Block Name: ev+ Accordion
 *
 * This is the template that displays the Accordion Block.
 */

// get image field (array)
$accordionCollections = get_field('accordion_content');

// create id attribute for specific styling
$id = 'accordion-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<div class="accordion" id="<?php echo $id;?>">
<?php 
	foreach($accordionCollections as $accordionCollection => $value){
		
		$cardID = $id . $accordionCollection . 'id';
		$dataTarget = $id . $accordionCollection;
		
		// Default First Item Open
		$show = $accordionCollection > 0 ? '' : 'show';

		echo '<div class="card">';
		echo '    <div class="card-header" id="' . $cardID . '">';
		echo '      <h5 class="mb-0">';
		echo '        <button class="btn btn-link" data-toggle="collapse" data-target="#' . $dataTarget . '" aria-expanded="true" aria-controls="' . $dataTarget . '">';
		echo 						$value["accordion_heading"];
		echo '        </button>';
		echo '      </h5>';
		echo '		</div>';
		echo '    <div id="' . $dataTarget . '" class="collapse ' . $show . '" aria-labelledby="' . $cardID . '" data-parent="#' . $id . '">';
		echo '      <div class="card-body">';
		echo 					$value["accordion_body"];
		echo '			</div>';
		echo '		</div>';
		echo '</div>';
	}
?>
</div>
<?php
}
?>


<?php
/*
 * Callback function for ev-featured-card
 */
function ev_featured_card_block_render_callback( $block ) {
/**
 * Block Name: ev+ Featured Card
 *
 * This is the template that displays the ev+ Featured Card.
 */

//get title field (text)
$title = get_field('title');

//get card_image field (image)
$cardImage = get_field('card_image');
$cardImage = $cardImage['url'];

//get card_body field (WYSIWYG)
$cardBody = get_field('card_body');

//get button_text field (text)
$buttonText = get_field('button_text');

//get button_url field (URL)
$buttonURL = get_field('button_url');

//get card badge field (text)
$cardBadge = get_field('card_badge');

//get secondary content array() (group)
$secondaryContent = get_field('secondary_content');

//get secondary_content_body (WYSIWYG)
$secondaryContentBody = $secondaryContent['secondary_content_body'];

//get secondary_content_button_label (text)
$secondaryContentButtonLabel = $secondaryContent['secondary_content_button_label'];

// create id attribute for specific styling
//$id = 'fa-icon-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
//$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>
<div class="card">
	<div id="<?php echo $block['id'];?>-secondary-content" class="d-none">
		<?php echo $secondaryContentBody; ?>
	</div>
	
	<?php if($cardImage): ?>
		<img class="card-img-top" src="<?php echo $cardImage; ?>" alt="<?php echo $card_image_alt; ?>">
	<?php endif; ?>
	
	<span class="card-badge"><?php echo $cardBadge; ?></span>
  <div class="card-body">
    <h5 class="card-title"><?php echo $title; ?></h5>
    <p class="card-text"><?php echo $cardBody; ?></p>
    <a href="<?php echo $buttonURL; ?>" class="btn btn-primary"><?php echo $buttonText; ?></a>
		
		<!-- Secondary Content Area -->
		<?php if($secondaryContentButtonLabel): ?>
			<button id="<?php echo $block['id'] . '-button'; ?>" class="btn btn-light card-link">
				<?php echo $secondaryContentButtonLabel; ?>
			</button>
		<?php endif; ?>
  </div>
</div>

<script type="text/javascript">
	jQuery( <?php echo json_encode('#' . $block['id'] . '-button'); ?> ).on('click', function(){
		jQuery( <?php echo json_encode('#' . $block['id'] . '-secondary-content'); ?> ).toggleClass( "d-none" );
	});
</script>
<?php
}
?>


<?php
/*
 * Callback function for ev-logo-grid
 */
function ev_logo_grid_block_render_callback( $block ) {
/**
 * Block Name: ev+ Custom Logo Grid Block
 *
 * This is the template that displays the ev+ Custom Logo Grid Block
 */

// get logo-grid field (array)
$logoGrid = get_field('logo_grid');

// create id attribute for specific styling
$id = 'logo-grid-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>
<?php if( have_rows('logo_grid') ): ?>
	<div id="<?php echo $id; ?>" class="row">
		<?php while( have_rows('logo_grid') ): the_row(); 

			$image = get_sub_field('logo');
			$imageSize = get_sub_field('image_size'); 
			$size = $imageSize == 'full'  ? $image['url'] : $image['sizes'][$imageSize];
			
			?>

			<div class="col">
				<image src="<?php echo $size; ?>" />
			</div>

		<?php endwhile; ?>
		
	</div> <!-- End row-->
<?php endif; ?>
<?php
}
?>


<?php
/*
 * Callback function for ev-fa-icon
 */
function ev_fa_icon_block_render_callback( $block ) {
/**
 * Block Name: ev+ Font Awesome Icon
 *
 * This is the template that displays the Font Awesome Icon.
 */

// get fa_icon field (ACF Fontawesome Field)
$fa_icon = get_field('fa_icon');

// get additional_classes (text)
$additional_classes = get_field('additional_classes');

// create id attribute for specific styling
$id = 'fa-icon-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<span id="<?php echo $id; ?>" class="<?php echo $fa_icon; ?> <?php echo $additional_classes; ?>"></span>

<?php
}
?>


<?php
/*
 * Callback function for ev-post-block
 */
function ev_post_block_block_render_callback( $block ) {
/**
 * Block Name: ev+ Accordion
 *
 * This is the template that displays the Accordion Block.
 */

// get image field (array)
$postObject = get_field('post_grid');

//echo '<pre>';
//var_dump($accordionCollection);
//echo '</pre>';

// create id attribute for specific styling
$id = 'post-object-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
//$align_class = $block['align'] ? 'align' . $block['align'] : '';
}



/*
 * Callback function for ev-button
 */
function ev_button_block_block_render_callback( $block ) {

    /**
     * Block Name: ev+ Button
     *
     * This is the template that displays Buttons.
     */

    // HTML Element
    $html_element = get_field('html_element');
    // Anchor Link
    $link = get_field('link');
    if( $link ) {
      $link_url = $link['url'];
      $title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
    }
    // Button/ Input Label
    $label = get_field('button_label');
    
    // Style Option
    $style = get_field( 'style' );
    // Size
    $size = get_field('size');
    // Outline  style
    $outline = get_field( 'outline' );
    // Button Block
    $block_button = (NULL == get_field('block_button') ? '' : 'btn-block' );
    // ID
    $id = get_field('id');

    // get additional_classes (text)
    $additional_classes = get_field('additional_classes');

    switch($html_element) {
      case "a":
        $template = "standard";
        $label = $link['title'];
        break;
      case "button":
        $template = "standard";
        $type = "button";
        $title = get_field('button_label');
        break;
      case "input_button":
        $template = "empty";
        break;
      case "input_submit":
        $template = "empty";
        break;
    }

    if( $template == "empty" ) {
      // explode
      $html_elements = explode("_", $html_element);
      // check if input
      if (sizeof($html_elements) > 1 && $html_elements[0] == "input") {
        $html_element = $html_elements[0];
        $type = $html_elements[1];
      }
    }

    



    // if outlined-button option is checked alter style value to reflect appropriate class value
    if ( $outline == 1) {
      // break up initial $style value
      $style = explode("-", $style);
      $style = $style[0] . "-outline-" . $style[1];
    }
    
    if($template == "standard"): ?>
      <<?php echo $html_element; ?> <?php if($link):?> href="<?php echo($link_url) ?>"<?php endif; ?> <?php if($id):?>id="<?php echo($id); ?>" <?php endif; ?> class="btn <?php echo $style; ?> <?php echo $block_button; ?> <?php echo $size; ?>" <?php if($link_target): ?>target="<?php echo $link_target; ?>"<?php endif; ?>>
        <?php echo($title) ?>
      </<?php echo $html_element; ?>>
    <?php endif; ?>

    <?php if($template == "empty"): ?>
      <<?php echo $html_element; ?> <?php if(isset($type)): ?> type="<?php echo $type; ?>"<?php endif; ?> class="btn <?php echo $style; ?> <?php echo $block_button; ?> <?php echo $size; ?>" value="<?php echo($label) ?>">
    <?php endif; ?>

  <?php } ?>