<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stoma
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title specialist__name">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content specialist__item specialist__item--list">
		<?php $title = get_the_title(); ?>
        <div class="specialist__foto"><?php echo types_render_field( "spec-foto", array(
				"alt"   => $title,
				"class" => "specialist__img"
			) ); ?></div>
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stoma' ),
			'after'  => '</div>',
		) );
		?>
    </div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'stoma' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
        </footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
