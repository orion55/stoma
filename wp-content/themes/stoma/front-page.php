<?php get_header(); ?>
    <div id="primary" class="content-area">
        <div class="promo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/promo/promo_pict.jpg" alt="promo_pict"
                 class="promo__img">
            <div class="promo__box"></div>
			<?php $stoma_options = get_option( 'stoma_option_name' ); ?>
            <div class="promo__wrap">
                <div class="promo__text promo__text--ooo">
					<?php $name_0 = $stoma_options['name_0'];
					if ( empty( $name_0 ) ): echo 'Общество с ограниченной ответственностью Стоматология "Гермес Дент"';
					else: echo $name_0; endif; ?>
                </div>
                <div class="promo__block">
                    <i class="fa fa-map-marker promo__marker promo__marker--green fa-2x" aria-hidden="true"></i>
                    <div class="promo__text promo__text--address">
						<?php
						$address1_1 = $stoma_options['address1_1'];
						$address2_2 = $stoma_options['address2_2'];
						$str        = '';
						if ( empty( $address1_1 ) ): $str .= '143969, Московская область, г. Реутов, ул.Октября д.28';
						else: $str .= $address1_1; endif;
						if ( empty( $address2_2 ) ): $str .= ' (вход со стороны автостоянки)';
						else: $str .= " " . $address2_2; endif;
						echo $str;
						?>
                    </div>
                </div>
                <div class="promo__block promo__phone">
                    <i class="fa fa-phone fa-2x promo__marker" aria-hidden="true"></i>
                    <div class="promo__text promo__text--phone">
						<?php
						$phone1_3 = $stoma_options['phone1_3'];
						$phone2_4 = $stoma_options['phone2_4'];
						$str      = '';
						if ( empty( $phone1_3 ) ): $str .= '8-495-638-0-648';
						else: $str .= $phone1_3; endif;
						if ( empty( $phone2_4 ) ): $str .= ' 8-498-661-4-863';
						else: $str .= " " . $phone2_4; endif;
						echo $str;
						?>
                    </div>
                </div>
                <div class="promo__price">
                    <div class="promo__price--text">Стоматология в Новокосино, Реутове,</div>
                    <div class="promo__price--bold">по доступным ценам!</div>
                </div>
            </div>
            <div class="promo__holder">
                <a href="#" class="promo__container promo__container--red hvr-push">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/promo/procent.png"
                         alt="procent" class="promo__pict">
                    <div class="promo__desc">Получить скидку</div>
                </a>
                <a href="#" class="promo__container promo__container--green hvr-push">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/promo/tooth.png" alt="procent"
                         class="promo__pict">
                    <div class="promo__desc">Записаться<br>на приём</div>
                </a>
            </div>
        </div>
        <div class="services box">
            <h2 class="services__head">Услуги</h2>
            <div class="services__line services__line--left"></div>
            <div class="services__line services__line--right"></div>
            <div class="services__caption">
				<?php
				global $post;
				$args    = array(
					'numberposts' => - 1,
					'orderby'     => 'date',
					'order'       => 'DESC',
					'post_type'   => 'page'
				);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) {
					setup_postdata( $post );
					?>
                    <div class="services__item hvr-pop"><a href="<?php the_permalink(); ?>"
                                                           class="services__link"><?php the_title(); ?></a></div>
					<?php
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
    </div>
<?php get_footer();