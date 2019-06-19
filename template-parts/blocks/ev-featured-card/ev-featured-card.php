<?php
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

	//css from additional classes
	$additional_classes = $block['className'];

	?>
	<div id="<?php echo $id; ?>"  class="card featured-card block-featured-card <?php echo $align_class; ?> <?php echo $additional_classes; ?>">
		<?php if($imageID): ?>
			<?php echo wp_get_attachment_image( $imageID, 'content-small' );?>
		<?php endif; ?>
	  <div class="card-body">
			<?php if($cardBadge): ?>
			<div class="card-badge"><?php echo $cardBadge; ?></div>
			<?php endif; ?>
			<h5 class="card-title"><?php echo $title; ?></h5>
			<div class="card-text">
				<?php echo $cardBody; ?>
			</div>
			<?php if($buttonURL): ?>
				<a href="<?php echo $buttonURL; ?>" class="btn btn-primary">
					<?php echo $buttonText; ?>
				</a>
			<?php endif; ?>

			<!-- Secondary Content Area -->
			<?php if($secondaryContentButtonLabel): ?>
				<button id="<?php echo $block['id'] . '-button'; ?>" class="btn btn-light card-link btn--secondary-content-toggle float-right">
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
