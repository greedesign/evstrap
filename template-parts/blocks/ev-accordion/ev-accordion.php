<?php
/**
 * Block Name: ev+ Accordion
 *
 * This is the template that displays the Accordion Block.
 */



	// get image field (array)
	$accordion_collections = get_field('accordion_content');

	// create id attribute for specific styling
	$id = 'accordion-' . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';

	//css from additional classes
	$additional_classes = $block['className'];

	?>
	<div id="<?php echo $id;?>" class="accordion block-accordion <?php echo $additional_classes;?>">
		<?php
		foreach($accordion_collections as $accordion_collection => $value){

			$cardID = $id . $accordion_collection . 'id';
			$dataTarget = $id . $accordion_collection;

			// Default First Item Open
			$show = $accordion_collection == 0 ? 'show' : '';

			echo '<div class="card">';
			echo '    <div class="card-header position-relative" id="'. $cardID .'">';
			echo '      <h5 class="mb-0">';
			echo '        <button class="btn btn-link btn-block text-left" data-toggle="collapse" data-target="#'. $dataTarget .'" aria-expanded="true" aria-controls="'. $dataTarget .'">';
			echo 			$value["accordion_heading"];
			echo '        </button>';
			echo '      </h5>';
			echo '		</div>';
			echo '    <div id="'. $dataTarget .'" class="collapse '. $show .'" aria-labelledby="'. $cardID .'" data-parent="#'. $id .'">';
			echo '      <div class="card-body">';
			echo 					$value["accordion_body"];
			echo '			</div>';
			echo '		</div>';
			echo '</div>';
		} ?>
	</div>