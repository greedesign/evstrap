/*jQuery( <?php echo json_encode('#' . $block['id'] . '-button'); ?> ).on('click', function(){
    jQuery( <?php echo json_encode('#' . $block['id'] . '-secondary-content'); ?> ).toggleClass( "d-none" );
});*/

jQuery(document).ready(function( $ ) {
    
    $('.featured-card .btn--secondary-content-toggle').on('click', function(){
        $(this).parent().siblings('.card-secondary-content').toggleClass('show');
    });

    $('.featured-card .dismiss').on('click', function(){
        $(this).parent('.card-secondary-content').toggleClass('show');
    });
	
});