<?php
/**
 * Partial template for content in page.php
 *
 * @package evstrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header <?php acf_header_classes(); ?>">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <?php if (get_field('internal_links_position') == 'page_header'): ?>
			<div class="entry-header--internal-links">
        <?php
          if( have_rows('internal_page_links') ):
            // loop through the rows of data
            while ( have_rows('internal_page_links') ) : the_row();
              $link = get_sub_field('link');
              if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <?php if( get_row_index() > 1 ):?>|<?php endif; ?>
                <a class="btn btn-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
              <?php endif;
            endwhile;
          endif;
        ?>
			</div>
		<?php endif; ?>
		<?php if (get_field('header_markup_type') == 'richtxt'): ?>
			<div class="entry-header--custom-markup">
			<?php if(get_field('output_raw_html')): ?>
				<?php the_field('header_custom_markup', false, false); ?>
			<?php else: ?>
				<?php the_field('header_custom_markup'); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'evstrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'evstrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
