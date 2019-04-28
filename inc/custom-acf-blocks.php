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
			'mode'				=> 'preview',
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-featured-card/ev-featured-card.css',
			'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/ev-featured-card/ev-featured-card.js'
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

		// register ev+ Post grid Object
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
			'icon'				=> 'admin-links',
			'keywords'			=> array( 'button', 'link', 'JS'),
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css',
			'supports' => array(
				'align' => false,
			)
		));
		
		// register ev+ Custom Column Content
		acf_register_block(array(
			'name'				=> 'ev-custom-column-content',
			'title'				=> __('ev+ Custom Column Content Block'),
			'description'		=> __('Custom Bootstrap Columns with WYSIWYG content for each column. Only works up to 6 cols right now.'),
			'render_callback'	=> 'ev_custom_column_content_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'welcome-widgets-menus',
			'keywords'			=> array( 'column', 'columns'),
			//'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css'
		));
		
		// register ev+ Artist Post Grid
		acf_register_block(array(
			'name'				=> 'ev-artist-post-grid',
			'title'				=> __('ev+ Artist Post Grid'),
			'description'		=> __('Custom Artist Post Grid with 2 displays.'),
			'render_callback'	=> 'ev_artist_post_grid_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'art',
			'keywords'			=> array( 'artist', 'post grid', 'post')
			//'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/ev-artist-post-grid/ev-artist-post-grid.js'
			//'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css'
		));
		
		// register ev+ Latest Post Grid
		acf_register_block(array(
			'name'				=> 'ev-latest-post-grid',
			'title'				=> __('ev+ Latest Post Grid'),
			'description'		=> __('Custom Bootstrap Columns with WYSIWYG content for each column.'),
			'render_callback'	=> 'ev_latest_post_grid_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-post',
			'keywords'			=> array( 'post', 'post grid', 'latest')
			//'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/ev-artist-post-grid/ev-artist-post-grid.js'
			//'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css'
		));
		
		
		// register ev+ Alphabetical Activity Grid
		acf_register_block(array(
			'name'				=> 'ev-activity-post-grid',
			'title'				=> __('ev+ Activity Post Grid'),
			'description'		=> __('Custom Activity Post Grid with sorting alphbetically.'),
			'render_callback'	=> 'ev_activity_post_grid_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-post',
			'keywords'			=> array( 'post', 'post grid', 'activity')
			//'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/ev-artist-post-grid/ev-artist-post-grid.js'
			//'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/ev-button/ev-button.css'
		));
	
	}
} 


function buy_tickets_url($atts) {
	
	extract(shortcode_atts(array(
		'display' => '',
		'target' => '',
		'button_label' => 'Click Me',
		'class' => ''		// default value if none supplied
    ), $atts));
    
    if ($display == 'link') {
        $URL = (!empty(get_theme_mod('understrap_child_buy_tickets_url')) ? get_theme_mod('understrap_child_buy_tickets_url') : '');
        return '<a class="'.$class.'" target="'.$target.'" href="'.$URL.'">'.$button_label.'</a>';
    } else {
		$URL = (!empty(get_theme_mod('understrap_child_buy_tickets_url')) ? get_theme_mod('understrap_child_buy_tickets_url') : '');
		return $URL;
	}
}
add_shortcode('buy-tickets-url', 'buy_tickets_url');


/**
 * used for generic widget area in collaboration with widget_shortcode plugin which is used for a recents posts shortcode in megamenu
 */
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Generic Widgets',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);



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
			echo '    <div class="card-header" id="'. $cardID .'">';
			echo '      <h5 class="mb-0">';
			echo '        <button class="btn btn-link" data-toggle="collapse" data-target="#'. $dataTarget .'" aria-expanded="true" aria-controls="'. $dataTarget .'">';
			echo 			$value["accordion_heading"];
			echo '        </button>';
			echo '      </h5>';
			echo '		</div>';
			echo '    <div id="'. $dataTarget .'" class="collapse '. $show .'" aria-labelledby="'. $cardID .'" data-parent="#'. $id .'">';
			echo '      <div class="card-body">';
			echo 			$value["accordion_body"];
			echo '		</div>';
			echo '		</div>';
			echo '</div>';
		}		
	echo '</div>';
}



/*
 * Callback function for ev-featured-card
 */
function ev_featured_card_block_render_callback( $block ) {
/**
 * Block Name: ev+ Latest Post Grid
 *
 * This is the template that displays the ev+ Latest Post Grid
 */
 
	//get title field (text)
	$title = get_field('title');

	//get card_image field (image)
	$imageID = get_field('card_image');

	//get card_body field (WYSIWYG)
	$cardBody = get_field('card_body');

	//get button_text field (text)
	$buttonText = get_field('button_text');

	//get button_url field (URL)
	$buttonURL = get_field('button_url');
	
	//grab Buy Ticket URL from theme settings, if use_buy_tickets_url is true, overriding $buttonURL
	$use_buy_tickets_url = get_field('use_buy_tickets_url');
	if($use_buy_tickets_url){
		$buttonURL = (!empty(get_theme_mod('understrap_child_buy_tickets_url')) ? get_theme_mod('understrap_child_buy_tickets_url') : '');
	}

	//get card badge field (text)
	$cardBadge = get_field('card_badge');

	//get secondary content array() (group)
	$secondaryContent = get_field('secondary_content');

	//get secondary_content_body (WYSIWYG)
	$secondaryContentBody = $secondaryContent['secondary_content_body'];

	//get secondary_content_button_label (text)
	$secondaryContentButtonLabel = $secondaryContent['secondary_content_button_label'];

	// create id attribute for unique targeting
	$id = 'featured-card-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	
	?>
	<div id="<?php echo $id; ?>"  class="card featured-card <?php echo $align_class; ?>">
		
		<?php if($imageID): ?>
			<?php echo wp_get_attachment_image( $imageID, 'content-small' );?>
		<?php endif; ?>
	  <div class="card-body">
			<div class="card-badge"><span><?php echo $cardBadge; ?></span></div>
		<h5 class="card-title"><?php echo $title; ?></h5>
			<p class="card-text">
				<?php echo $cardBody; ?>
			</p>
			<?php if($buttonURL): ?>
				<a href="<?php echo $buttonURL; ?>" class="btn btn-primary">
					<?php echo $buttonText; ?>
				</a>
			<?php endif; ?>
			
			<!-- Secondary Content Area -->
			<?php if($secondaryContentButtonLabel): ?>
				<button id="<?php echo $block['id'] . '-button'; ?>" class="btn btn-light card-link btn--secondary-content-toggle">
					<?php echo $secondaryContentButtonLabel; ?>
				</button>
			<?php endif; ?>
		</div>
		<?php if($secondaryContentBody): ?>
			<div class="card-secondary-content">
				<button class="btn dismiss">
					<span class="fa fa-close"></span>
				</button>
				<div class="card-secondary-content-body">
					<?php echo $secondaryContentBody; ?>
				</div>
			</div>
		<?php endif; ?> 
	</div>
<?php 
} 




/*
 * Callback function for ev-latestpsot-grid
 */
function ev_latest_post_grid_block_render_callback( $block ) {
/**
 * Block Name: ev+ Custom Logo Grid Block
 *
 * This is the template that displays the ev+ Custom Logo Grid Block
 */

	// get logo-grid field (array)
	$posts_to_show = get_field('posts_to_show');	
	$recent_posts = wp_get_recent_posts( $posts_to_show );
	
	// get logo-grid field (array)
	$columns_per_row = get_field('columns_per_row');
	
		// get  columns_per_row (select)
	$hide_featured_image = get_field('hide_featured_image');

	// create id attribute for specific styling
	$id = 'logo-grid-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	
		// define columns from $columns_per_row
	switch ($columns_per_row) {
		case 1:
				$colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-3 col";
				break;
		case 2:
				$colClass = "col-xl-6 col-lg-6 col-md-6 col-sm-3 col";
				break;
		case 3:
				$colClass = "col-xl-4 col-lg-4 col-md-4 col-sm-3 col";
				break;
		case 4:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col";
				break;
		case 6:
				$colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-3 col";
				break;
		case 12:
				$colClass = "col-xl-1 col-lg-1 col-md-1 col-sm-3 col";
				break;
		default:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col";
				break;
	} 

	?>
	<div class="row">
		<?php foreach($recent_posts as $post): ?>
			<div class="<?php echo $colClass; ?>">
			
				<a href="<?php echo get_permalink($post['ID']); ?>">
				
					<?php if(!$hide_featured_image): ?>
						<?php  $img = get_the_post_thumbnail_url($post['ID'], 'content-medium'); ?>
						<?php if($img): ?>
							<img src="<?php echo $img; ?>" />
						<?php endif; ?>
					<?php endif; ?>
				
					<div class="post-title">
						<?php echo $post['post_title']; ?>
					</div>
				</a>
				
			</div>
		<?php endforeach; ?>
	</div>

<?php
}




/*
 * Callback function for ev_activity_post_grid_block_render_callback
 */
function ev_activity_post_grid_block_render_callback( $block ) {
/**
 * Block Name: ev+ ev_activity_post_grid
 *
 * This is the template that displays the ev+ev_activity_post_grid_block
 */

	// get logo-grid field (array)
	$columns_per_row = get_field('columns_per_row');
	
	$posts_to_show = get_field('posts_to_show');
	
  // get  activities (post_object)
	$activities = get_field('activities');

	// create id attribute for specific styling
	$id = 'logo-grid-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	
		// define columns from $columns_per_row
	switch ($columns_per_row) {
		case 1:
				$colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-4 col-6";
				break;
		case 2:
				$colClass = "col-xl-6 col-lg-6 col-md-6 col-sm-4 col-6";
				break;
		case 3:
				$colClass = "col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6";
				break;
		case 4:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6";
				break;
		case 6:
				$colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-4 col-6";
				break;
		case 12: 
				$colClass = "col-xl-1 col-lg-1 col-md-1 col-sm-4 col-6";
				break;
		default:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6";
				break;
	} 
	?>
	
	
<?php
// query
$the_query = new WP_Query( 
   array(
      'post_type' => 'activity',
      'post_status' => 'publish',
      'posts_per_page' => $posts_to_show,
      'orderby' => 'title',
      'order' => 'ASC'
    ) 
  );
?>

<?php if( $the_query->have_posts() ): ?>
	<div class="row">
	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="<?php echo $colClass; ?> activity-column">
			<a href="<?php the_permalink(); ?>">
			
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'content-medium' ); ?>
				<?php endif; ?>
				
			</a>
		</div>
	<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

<?php
}


add_filter( 'acf/fields/post_object/name=activities', 'change_posts_order' );
function change_posts_order( $args ) {
	$args['orderby'] = 'title';
	$args['order'] = 'ACS';
	//$args['order'] = 'DESC';
	return $args;
}


add_image_size( 'sponsor-logo', 200, 200 );  

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
	
	// get logo-grid field (array)
	$columns_per_row = get_field('columns_per_row');

	// create id attribute for specific styling
	$id = 'logo-grid-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	
		// define columns from $columns_per_row
	switch ($columns_per_row) {
		case 1:
				$colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-3 col-xs-3 col";
				break;
		case 2:
				$colClass = "col-xl-6 col-lg-6 col-md-6 col-sm-3 col-xs-3 col";
				break;
		case 3:
				$colClass = "col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3 col";
				break;
		case 4:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col";
				break;
		case 6:
				$colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-3 col";
				break;
		case 12:
				$colClass = "col-xl-1 col-lg-1 col-md-1 col-sm-3 col-xs-3 col";
				break;
		default:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col";
				break;
	} 
	
	?>
	<?php if( have_rows('logo_grid') ): ?>
		<div id="<?php echo $id; ?>" class="row align-items-center logo-grid">
		
			<?php while( have_rows('logo_grid') ): the_row(); 
				$image 		 = get_sub_field('logo');
				$url 		 = get_sub_field('url');
				$alt 		 = get_sub_field('alt_tag');
				$imageSize 	 = get_sub_field('image_size'); 
				$sizedImgURL = $imageSize == 'full'  ? $image['url'] : $image['sizes'][$imageSize];			
				?>

				<div class="<?php echo $colClass; ?>">
					<?php if($url): ?><a href="<?php echo $url; ?>" target="_blank"><?php endif; ?>
						<image src="<?php echo $sizedImgURL; ?>" alt="<?php echo $alt; ?>" />
					<?php if($url): ?></a><?php endif; ?>
				</div>

			<?php endwhile; ?>
			
		</div> <!-- End row-->
	<?php endif; ?>
<?php
}



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

	echo '<span id="'. $id .'" class="'. $fa_icon .' '. $additional_classes .'"></span>';

}



/*
 * Callback function for ev-post-block
 */
function ev_post_block_block_render_callback( $block ) {
/**
 * Block Name: ev+ Accordion
 *
 * This is the template that displays the Accordion Block.
*/

	// get post obejct field (post_object)
	$post_objects = get_field('post_grid');

	// get  columns_per_row (select)
	$columns_per_row = get_field('columns_per_row');	

	// create id attribute for specific styling
	$id = 'post-object-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';

	// define columns from $columns_per_row
	switch ($columns_per_row) {
		case 1:
				$colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-12";
				break;
		case 2:
				$colClass = "col-xl-6 col-lg-6 col-md-6 col-sm-12";
				break;
		case 3:
				$colClass = "col-xl-4 col-lg-4 col-md-4 col-sm-12";
				break;
		case 4:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-12";
				break;
		case 6:
				$colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-12";
				break;
		default:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-12";
				break;
	} 

	if( $post_objects ): ?>
		<div class="row <?php echo $align_class; ?>">
			<?php foreach( $post_objects as $post_object): ?>
				<div class="<?php echo $colClass; ?>">
				
					<a href="<?php echo get_permalink($post_object->ID); ?>">
						<?php $img = get_the_post_thumbnail_url($post_object->ID, 'content-medium'); ?>
						<?php if($img): ?>
							<img src="<?php echo $img; ?>"/>
						<?php endif; ?>
						<?php echo get_the_title($post_object->ID);?>
					</a>
					
				</div>
			<?php endforeach; ?>
	<?php endif;
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
		 
		 //css from additional classes
		$additionalClasses = $block['className'];

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
		
	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
	
	//grab Buy Ticket URL from theme settings, if use_buy_tickets_url is true, overriding $link_url
	$use_buy_tickets_url = get_field('use_buy_tickets_url');
	if($use_buy_tickets_url){
		$link_url = (!empty(get_theme_mod('understrap_child_buy_tickets_url')) ? get_theme_mod('understrap_child_buy_tickets_url') : '');
	}
    
    if($template == "standard"): ?>
      <<?php echo $html_element; ?> <?php if($link):?> href="<?php echo($link_url) ?>"<?php endif; ?> <?php if($id):?>id="<?php echo($id); ?>" <?php endif; ?> class="btn <?php echo $additionalClasses; ?> <?php echo $style; ?> <?php echo $block_button; ?> <?php echo $size; ?> <?php echo $align_class; ?>" <?php if($link_target): ?>target="<?php echo $link_target; ?>"<?php endif; ?>>
        <?php echo($title) ?>
      </<?php echo $html_element; ?>>
    <?php endif; ?>

    <?php if($template == "empty"): ?>
      <<?php echo $html_element; ?> <?php if(isset($type)): ?> type="<?php echo $type; ?>"<?php endif; ?> class="btn <?php echo $style; ?> <?php echo $block_button; ?> <?php echo $size; ?>" value="<?php echo($label) ?>">
    <?php endif; ?>

 <?php 
} 




/*
 * Callback function for ev-accordion
 */
function ev_custom_column_content_block_render_callback( $block ) {
/**
 * Block Name: ev+ Custom Column Content
 *
 * This is the template that displays the Accordion Block.
 */

// get Column field (repeater)
$column = get_field('column');

// Count number of columns
//$columnCount = count($column);
$columnCount = get_field('columns_per_row');

// initialize colClassOddd
$colClassOdd = '';


switch ($columnCount) {
    case 1:
        $colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-12";
        break;
    case 2:
        $colClass = "col-xl-6 col-lg-6 col-md-6 col-sm-12";
        break;
    case 3:
        $colClass = "col-xl-4 col-lg-4 col-md-4 col-sm-12";
        break;
	case 4:
        $colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-12";
        break;
	case 6:
        $colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-12";
        break;
	case 12:
        $colClass = "col-xl-1 col-lg-1 col-md-1 col-sm-12";
        break;
	default:
        $colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-12";
        break;
}

// create id attribute for specific styling
$id = 'column-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<div id="<?php echo $id; ?>" class="row <?php echo $align_class; ?>">
	
	<?php
		foreach($column as $columnContent => $value){
			echo '<div class="' . $colClass . '">';
			echo $value['column_content'];
			echo '</div>';
		}
	?>
</div>

<?php
 }

 
 
 
 
/*
 * Callback function for ev-fa-icon
 */
function ev_artist_post_grid_block_render_callback( $block ) {
/**
 * Block Name: ev+ Artist Post Grid Block
 *
 * This is the template that displays the ev+ Artist Post Grid Block
 */

	// get artists field (ACF post_object field)
	$artistPosts = get_field('artists');

	$terms 				= get_the_terms( $artistPosts[0]->ID, 'stage' );
	$featuredStage 		= array_pop( $terms );
	$featuredImgURL 	= get_the_post_thumbnail_url($artistPosts[0]->ID, 'full'); 
	$featuredTime 		= get_post_meta( $artistPosts[0]->ID, 'performance_time', true );
	$featuredTime 		= date("g:ia", strtotime( $featuredTime ));
	$muzookaArtistID 	= get_post_meta( $artistPosts[0]->ID, 'muzooka_artist_id', true );;

	// create id attribute for specific styling
	$id = 'artist-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';

	// get display even columns field (Boolean)
	$display_even_columns = get_field("display_even_columns");

	// get columns per row field (select)
	$columns_per_row = get_field("columns_per_row");

	?>
	<?php if($display_even_columns): ?>
		<?php 
		// EVEN DISPLAY COLUMNS
			switch ($columns_per_row) {
					case 1:
							$colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-12";
							break;
					case 2:
							$colClass = "col-xl-6 col-lg-6 col-md-6 col-sm-12";
							break;
					case 3:
							$colClass = "col-xl-4 col-lg-4 col-md-4 col-sm-12";
							break;
					case 4:
							$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-12";
							break;
					/*case 5:
							$colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-12";
							$colClassOdd = "col-xl-1 col-xl-offset-1 col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-12";
							break;*/
					case 6:
							$colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-12";
							break;
					default:
							$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-12";
							break;
			}
			
			echo '<div class="row">';
				foreach($artistPosts as $artistPost => $post){
					$terms 				= get_the_terms( $post->ID, 'stage' );
					$featuredStage 		= array_pop( $terms );
					$featuredImgURL 	= get_the_post_thumbnail_url($post->ID, 'full'); 
					$featuredTime 		= get_post_meta( $post->ID, 'performance_time', true );
					$featuredTime 		= date("g:ia", strtotime( $featuredTime ));
					$muzookaArtistID 	= get_post_meta( $post->ID, 'muzooka_artist_id', true );;
				
					echo '<div class="' . $colClass . '">';
					echo '	<a href="#" data-mz-embed="artist" data-mz-label="' . $post->post_title . '" data-mz-fid="' . $muzookaArtistID . '" class="performer-link">';
					echo '		<div class="performer-details">';  
					echo '			<img class="pfade" src="' . $featuredImgURL . '" alt="' . $post->post_title . '">';
					echo '			<div class="performer-meta"><span class="stage">' . $featuredStage->name . '</span> | <span class="time">' . $featuredTime . '</span></div>';
					echo '		</div>';
					echo '		<div class="desc name">';
					echo 			$post->post_title . '<i class="fa fa-fw fa-lg fa-arrow-circle-o-right"></i>';
					echo '		</div>';
					echo '	</a>';
					echo '</div>';
				}
			echo '</div>';
		?>
		
	<?php else: ?>
			<div id="<?php echo $id; ?>" class="row <?php echo $align_class; ?>">
				<div class="col-md-6">
					<a href="#" data-mz-embed="artist" data-mz-label="<?php echo $artistPosts[0]->post_title; ?>" data-mz-fid="<?php echo $muzookaArtistID; ?>" class="performer-link">  
						<div class="performer-details">	  
							<img class="pfade" src="<?php echo $featuredImgURL; ?>" alt="<?php echo $artistPosts[0]->post_title; ?>">	  
							<div class="performer-meta"><span class="stage"><?php echo $featuredStage->name; ?></span> | <span class="time"><?php echo $featuredTime; ?></span></div>
						</div>
						<div class="desc name">
							<?php echo $artistPosts[0]->post_title;?> <i class="fa fa-fw fa-lg fa-arrow-circle-o-right"></i>
						</div>
					</a>
				</div>
				<div class="col-md-6">
					<div class="row">
						<?php foreach($artistPosts as $artistPost => $post){
							if($artistPost > 0 && $artistPost <= 2){
								$terms 				= get_the_terms( $post->ID, 'stage' );
								$featuredStage 		= array_pop( $terms );
								$featuredImgURL 	= get_the_post_thumbnail_url($post->ID, 'full'); 
								$featuredTime 		= get_post_meta( $post->ID, 'performance_time', true );
								$featuredTime 		= date("g:ia", strtotime( $featuredTime ));
								$muzookaArtistID 	= get_post_meta( $post->ID, 'muzooka_artist_id', true );;
							
								echo '<div class="col-md-6 col-sm-6 col-6">';
								echo '	<a href="#" data-mz-embed="artist" data-mz-label="' . $post->post_title . '" data-mz-fid="' . $muzookaArtistID . '" class="performer-link">';
								echo '		<div class="performer-details">';  
								echo '			<img class="pfade" src="' . $featuredImgURL . '" alt="' . $post->post_title . '">';
								echo '			<div class="performer-meta"><span class="stage">' . $featuredStage->name . '</span> | <span class="time">' . $featuredTime . '</span></div>';
								echo '		</div>';
								echo '		<div class="desc name">';
								echo 			$post->post_title . '<i class="fa fa-fw fa-lg fa-arrow-circle-o-right"></i>';
								echo '		</div>';
								echo '	</a>';
								echo '</div>';
							}
						}?>
					</div>		
					<div class="row">
						<?php foreach($artistPosts as $artistPost => $post){
							if($artistPost > 2 ){
								$terms 				= get_the_terms( $post->ID, 'stage' );
								$featuredStage 		= array_pop( $terms );
								$featuredImgURL 	= get_the_post_thumbnail_url($post->ID, 'full'); 
								$featuredTime 		= get_post_meta( $post->ID, 'performance_time', true );
								$featuredTime 		= date("g:ia", strtotime( $featuredTime ));
								$muzookaArtistID 	= get_post_meta( $post->ID, 'muzooka_artist_id', true );;
							
								echo '<div class="col-md-4 col-sm-6 col-6">';
								echo '	<a href="#" data-mz-embed="artist" data-mz-label="' . $post->post_title . '" data-mz-fid="' . $muzookaArtistID . '" class="performer-link">';
								echo '		<div class="performer-details">';  
								echo '			<img class="pfade" src="' . $featuredImgURL . '" alt="' . $post->post_title . '">';
								echo '			<div class="performer-meta"><span class="stage">' . $featuredStage->name . '</span> | <span class="time">' . $featuredTime . '</span></div>';
								echo '		</div>';
								echo '		<div class="desc name">';
								echo 			$post->post_title . '<i class="fa fa-fw fa-lg fa-arrow-circle-o-right"></i>';
								echo '		</div>';
								echo '	</a>';
								echo '</div>';
							}
						}?>
					</div>	
				</div>
			</div>

	<?php endif; ?>

<?php
}
?>









