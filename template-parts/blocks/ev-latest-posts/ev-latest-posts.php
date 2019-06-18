<?php
/**
 * ev+ Latest Posts Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 */

	// get logo-grid field (array)
	$posts_to_show = get_field('posts_to_show');

	$recent_posts = wp_get_recent_posts( $posts_to_show );

	$hide_featured_image = get_field('hide_featured_image');

	// create id attribute for specific styling
	$id = 'latest-posts-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';

	//css from additional classes
	$additional_classes = $block['className'];

	date_default_timezone_set('America/Edmonton');

	?>

	<div id="<?php echo $id; ?>" class="latest-posts block-latest-posts <?php echo $align_class; ?> <?php echo $additional_classes; ?>">
		<?php foreach($recent_posts as $post): ?>
			<?php
				$img = get_the_post_thumbnail( $post['ID'], 'thumbnail-medium');
				?>
				<article class="mt-3 latest-post-wrap">
					<div class="media">
					<?php  if($img && $hide_featured_image != true): ?>
						<a href="<?php echo get_permalink($post['ID']); ?>" class="mr-4">
							<?php echo $img; ?>
						</a>
					<?php endif; ?>
						<div class="media-body">
								<h3 class="mt-0">
									<a href="<?php echo get_permalink($post['ID']); ?>">
										<?php echo $post['post_title']; ?>
									</a>
									- <small><?php echo date("F d, Y", strtotime($post['post_date'])); ?></small>
								</h3>

								<?php	echo strip_tags($post['post_excerpt']); ?>

								<?php echo '<div class="mt-2 read-more-link"><a href="' . get_permalink($post['ID']).'">Read more</a></div>'; ?>

						</div>
					</div>
				</article>

		<?php endforeach; ?>
</div>

