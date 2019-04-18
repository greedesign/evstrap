<?php
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







