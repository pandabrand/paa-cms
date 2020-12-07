<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>
      <div class="dates">
        <?php 
          $paint_dates = get_field('paint_dates');
          foreach ($paint_dates as $key => $paint_date) :
            $date = $paint_date['date'];
            $location = $paint_date['location'];
            $images = $paint_date['images'];
        ?>
          <div class="info">
            <p class="date"><?php echo $date; ?></p>
            <p class="location"><?php echo $location[0]->name; ?></p>
          </div>
          <div class="carousel" data-flickity='{"wrapAround": true }'>
            <?php foreach ($images as $image) : write_log($image); ?>
              <div class="image"><?php echo wp_get_attachment_image($image[0], 'large'); ?></div>
            <?php endforeach; ?>
          </div>
        <?php
          endforeach;
        ?>
        </div>
		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}
?>

</article><!-- .post -->
