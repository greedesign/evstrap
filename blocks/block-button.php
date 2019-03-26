<?php
  // HTML Element
  $html_element = block_value('html-element');

  switch($html_element) {
    case "a":
      $template = "standard";
      break;
    case "button":
      $template = "standard";
      $type = "button";
      break;
    case "input_button":
      $template = "empty";
      break;
    case "input_submit":
      $template = "empty";
      break;
    case "input_reset":
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

  // URL
  $url = block_value('url');

  // Label
  $label = block_value('label');

  // Style Option
  $style = block_value( 'style' );
  $outline = block_value( 'outline-button' );
  // if outlined-button option is checked alter style value to reflect appropriate class value
  if ( $outline == 1) {
    // break up initial $style value
    $style = explode("-", $style);
    $style = $style[0] . "-outline-" . $style[1];
  }

  // Button Block
  $block_button = (NULL == block_value('block-button') ? '' : 'btn-block' );



?>

<?php if($template == "standard") { ?>
  <<?php echo $html_element; ?> <?php if(isset($type)): ?> type="<?php echo $type; ?>"<?php endif; ?> href="<?php block_field('url'); ?>" class="btn <?php echo $style; ?> <?php echo $block_button; ?> <?php block_field('size'); ?>">
    <?php block_field('label'); ?>
  </<?php echo $html_element; ?>>
<?php } ?>

<?php if($template == "empty") { ?>
  <<?php echo $html_element; ?> <?php if(isset($type)): ?> type="<?php echo $type; ?>"<?php endif; ?> class="btn <?php echo $style; ?> <?php echo $block_button; ?> <?php block_field('size'); ?>" value="<?php block_field('label'); ?>">
<?php } ?>

