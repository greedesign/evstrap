<?php
/**
 * Block Name: ev+ Font Awesome Icon
 *
 * This is the template that displays the Font Awesome Icon.
 */

// get fa_icon field (ACF Fontawesome Field)
$fa_icon = get_field('fa_icon');

// get additional_classes (text)
$additional_classes = get_field('additional_classes');

// create id attribute for specific styling
$id = 'fa-icon-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<span id="<?php echo $id; ?>" class="<?php echo $fa_icon; ?> <?php echo $additional_classes; ?>"></span>


