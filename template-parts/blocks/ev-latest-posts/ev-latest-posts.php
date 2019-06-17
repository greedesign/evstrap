<?php
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
	$id = 'latest-posts-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';

 	//css from additional classes
 	$additional_classes = $block['className'];
	
		// define columns from $columns_per_row
	switch ($columns_per_row) {
		case 1:
				$colClass = "col-xl-12 col-lg-12 col-md-12 col-sm-3 col-6";
				break;
		case 2:
				$colClass = "col-xl-6 col-lg-6 col-md-6 col-sm-3 col-6";
				break;
		case 3:
				$colClass = "col-xl-4 col-lg-4 col-md-4 col-sm-3 col-6";
				break;
		case 4:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6";
				break;
		case 6:
				$colClass = "col-xl-2 col-lg-2 col-md-2 col-sm-3 col-6";
				break;
		case 12:
				$colClass = "col-xl-1 col-lg-1 col-md-1 col-sm-3 col-6";
				break;
		default:
				$colClass = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6";
				break;
	}

	?>
	<div id="<?php echo $id; ?>" class="row">
		<?php foreach($recent_posts as $post): ?>
			<div class="<?php echo $colClass; ?>">
				<div class="latest-post-wrap">
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
			</div>
		<?php endforeach; ?>
		<div class="col text-center pt-3"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-secondary">See more</a></div>
	</div>

