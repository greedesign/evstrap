<?php
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

	//css from additional classes
	$additional_classes = $block['className'];

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
		<div id="<?php echo $id; ?>" class="logo-grid block-logo-grid row align-items-center <?php echo $align_class; ?> <?php echo $additional_classes; ?>">

			<?php while( have_rows('logo_grid') ): the_row();
				$image 		 = get_sub_field('logo');
				$url 		 = get_sub_field('url');
				$alt 		 = get_sub_field('alt_tag');
				$imageSize 	 = get_sub_field('image_size');
				$sizedImgURL = $imageSize == 'full'  ? $image['url'] : $image['sizes'][$imageSize];
				?>

				<div class="<?php echo $colClass; ?>">
					<?php if($url): ?><a href="<?php echo $url; ?>" target="_blank"><?php endif; ?>
						<img src="<?php echo $sizedImgURL; ?>" alt="<?php echo $alt; ?>" />
					<?php if($url): ?></a><?php endif; ?>
				</div>

			<?php endwhile; ?>

		</div> <!-- End row-->
	<?php endif; ?>
