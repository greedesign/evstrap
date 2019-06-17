<?php

/**
 * Block Name: ev+ Button
 *
 * This is the template that displays Buttons.
 */



// HTML Element
$html_element = get_field('html_element');
// Anchor Link
$link = get_field('link');
if( $link ) {
	$link_url = $link['url'];
	$title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
}
// Button/ Input Label
$label = get_field('button_label');

// Style Option
$style = get_field( 'style' );
// Size
$size = get_field('size');
// Outline  style
$outline = get_field( 'outline' );
// Button Block
$button_block = get_field('button_block') ? 'btn-block' : '';
//$button_block = get_field('button_block');

// ID
$id = get_field('id');

//css from additional classes
$additional_classes = $block['className'];

switch($html_element) {
	case "a":
		$template = "standard";
		$label = $link['title'];
		break;
	case "button":
		$template = "standard";
		$type = "button";
		$title = get_field('button_label');
		break;
	case "input_button":
		$template = "empty";
		break;
	case "input_submit":
		$template = "empty";
		break;
}

if( $template == "empty" ) {
	// explode
	$html_elements = explode("_", $html_element);
	// check if input
	if (sizeof($html_elements) > 1 && $html_elements[0] == "input") {
		$html_element = $html_elements[0];
		$type = $html_elements[1];
	}
}

// if outlined-button option is checked alter style value to reflect appropriate class value
if ( $outline == 1) {
	// break up initial $style value
	$style = explode("-", $style);
	$style = $style[0] . "-outline-" . $style[1];
}

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

//grab Buy Ticket URL from theme settings, if use_buy_tickets_url is true, overriding $link_url
$use_buy_tickets_url = get_field('use_buy_tickets_url');
if($use_buy_tickets_url){
$link_url = (!empty(get_theme_mod('understrap_child_buy_tickets_url')) ? get_theme_mod('understrap_child_buy_tickets_url') : '');
}

if($template == "standard"): ?>
	<<?php echo $html_element; ?> <?php if($link):?> href="<?php echo($link_url) ?>"<?php endif; ?> <?php if($id):?>id="<?php echo($id); ?>" <?php endif; ?> class="btn <?php echo $additional_classes; ?> <?php echo $style; ?> <?php echo $button_block; ?> <?php echo $size; ?> <?php echo $align_class; ?>" <?php if($link_target): ?>target="<?php echo $link_target; ?>"<?php endif; ?>>
		<?php echo($title) ?>
	</<?php echo $html_element; ?>>
<?php endif; ?>

<?php if($template == "empty"): ?>
	<<?php echo $html_element; ?> <?php if(isset($type)): ?> type="<?php echo $type; ?>"<?php endif; ?> class="btn <?php echo $style; ?> <?php echo $button_block; ?> <?php echo $size; ?>" value="<?php echo($label) ?>">
<?php endif; ?>
