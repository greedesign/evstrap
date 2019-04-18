<?php
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




















