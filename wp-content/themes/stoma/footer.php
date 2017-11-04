<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stoma
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="site-wrap">
            <div class="site-branding">
				<?php $logo = get_custom_logo();
				if ( $logo !== "" ) {
					echo $logo;
				} else { ?>
                    <a href="<?php echo home_url(); ?>" class="custom-logo-link hvr-pop" rel="home" itemprop="url">
                        <img width="77"
                             height="50"
                             src="<?php echo get_template_directory_uri(); ?>/assets/img/header/logo.png"
                             class="custom-logo"
                             alt="Гермес-Дент">
                    </a>
				<?php }; ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'in_footer',
					'menu_id'        => 'footer-menu',
				) );
				?>
            </nav>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
