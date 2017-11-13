<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stoma
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main review--archive">
			<?php
			if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					$format = get_post_format();
					if ( false === $format ) {
						$format = 'review';
					}
					get_template_part( 'template-parts/content', $format );
				endwhile;

				?>

                <div class="navigation-list">
					<?php
					if ( function_exists( 'wp_pagenavi' ) ) {
						wp_pagenavi();
					} else {
						the_posts_navigation();
					} ?>
                </div>


				<?php

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
