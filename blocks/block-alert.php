<?php
  $dismissable_classes = (NULL == block_value('dismissible') ? '' : 'alert-dismissible fade show' );
  $dismissable = block_value('dismissible');
?>

<div class="alert <?php block_field('style'); ?> <?php echo $dismissable_classes; ?>" role="alert">
  <?php block_field('content'); ?>
  <?php if( !empty($dismissable)):?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  <?php endif; ?>
</div>