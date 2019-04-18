<?php
/**
 * Block Name: ev+ Accordion
 *
 * This is the template that displays the Accordion Block.
 */

// get image field (array)
$postObject = get_field('post_grid');

//echo '<pre>';
//var_dump($accordionCollection);
//echo '</pre>';

// create id attribute for specific styling
$id = 'post-object-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
//$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>


