<?php
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

	//css from additional classes
	$additional_classes = $block['className'];

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
		<div id="<?php echo $id; ?>" class="row <?php echo $align_class; ?> <?php echo $additional_classes; ?>">
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
	<?php endif; ?>
	
	