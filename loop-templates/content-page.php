<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Combine variables for use as classes
$header_classes = [];

$header_classes[] = (get_field('header_background_image') !== '' ? 'header-background-img' : '');
$header_classes[] = get_field('page_header_width');
$header_classes[] = get_field('title_alignment');
$header_classes[] = (get_field('enable_advanced_header_alignment') !== '' ? 'd-felx' : '');

$header_classes[] = get_field('header_vertical_align');
$header_classes[] = get_field('header_horizontal_align');
$header_classes[] = get_field('header_content_align');

//$header_classes[] = (get_field('header_vertical_align') !== '' || get_field('title_horizontal_alignment') !== '' ? 'd-flex' : '');


$header_classes = implode (" ", $header_classes);

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header <?php echo $header_classes; ?>">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
