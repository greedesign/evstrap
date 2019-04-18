<?php
/**
 * Block Name: ev+ Accordion
 *
 * This is the template that displays the Accordion Block.
 */

// get image field (array)
$accordionCollections = get_field('accordion_content');

//echo '<pre>';
//var_dump($accordionCollection);
//echo '</pre>';

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

