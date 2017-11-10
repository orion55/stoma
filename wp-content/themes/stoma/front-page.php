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
            <h2 class="head">Услуги</h2>
            <div class="services__caption">
				<?php
				global $post;
				$args    = array(
					'numberposts' => - 1,
					'orderby'     => 'date',
					'order'       => 'DESC',
					'post_type'   => 'page',
					'exclude'     => [ 5 ]
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
        <div class="shares box box--red">
            <h2 class="head">Акции</h2>
            <div class="shares__caption">
				<?php
				global $post;
				$args    = array(
					'numberposts' => 3,
					'orderby'     => 'date',
					'order'       => 'DESC',
					'post_type'   => 'share'
				);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) {
					setup_postdata( $post );
					?>
                    <div class="shares__item hvr-push"><a href="<?php the_permalink(); ?>"
                                                          class="shares__link"><?php the_content(); ?></a></div>
					<?php
				}
				wp_reset_postdata();
				?>
            </div>
            <div class="shares__block">
                <a href="<?php echo get_post_type_archive_link( 'share' ); ?>"
                   class="pure-button shares-button button-error">Больше акций <i class="fa fa-arrow-right"
                                                                                  aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="about box">
            <h2 class="head">О нас</h2>
            <div class="about__caption">
				<?php
				$post_id = get_post( 5 );
				echo $post_id->post_content;
				?>
            </div>
        </div>
        <div class="specialist box box--specialist">
            <h2 class="head">Наши специалисты</h2>
            <div class="specialist__caption">
				<?php
				global $post;
				$args    = array(
					'numberposts' => 3,
					'orderby'     => 'title',
					'order'       => 'ASC',
					'post_type'   => 'specialist'
				);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) {
					setup_postdata( $post );
					?>
                    <div class="specialist__item">
						<?php $title = get_the_title(); ?>
                        <div class="specialist__foto"><?php echo types_render_field( "spec-foto", array(
								"alt"   => $title,
								"class" => "specialist__img"
							) ); ?></div>
                        <div class="specialist__name"><?php echo $title; ?></div>
                        <div class="specialist__position"><?php the_content(); ?></div>
                    </div>
					<?php
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
        <div class="helpful box box--helpful">
            <h2 class="head">Полезные статьи</h2>
            <div class="helpful__caption">
				<?php
				global $post;
				$args    = array(
					'numberposts' => 8,
					'orderby'     => 'title',
					'order'       => 'ASC',
					'post_type'   => 'post',
				);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) {
					setup_postdata( $post );
					$title = get_the_title();
					if ( ! empty( $title ) ) {
						?>
                        <div class="helpful__item hvr-pop"><a href="<?php the_permalink(); ?>"
                                                              class="helpful__link"><?php the_title(); ?></a></div>
						<?php
					}
				}
				wp_reset_postdata();
				?>
            </div>
            <div class="helpful__block">
                <a href="<?php echo get_post_type_archive_link( 'post' ); ?>"
                   class="pure-button shares-button button-error">Больше статей <i class="fa fa-arrow-right"
                                                                                   aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="review box">
            <h2 class="head">Отзывы</h2>
            <div class="review__caption">
				<?php
				global $post;
				$args    = array(
					'numberposts' => 3,
					'orderby'     => 'date-review',
					'order'       => 'ASC',
					'post_type'   => 'review'
				);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) {
					setup_postdata( $post );
					?>
                    <div class="review__item">
                        <div class="review__title">
							<?php the_title();
							echo " (" . types_render_field( 'date-review' ) . ")" ?>
                        </div>
                        <div class="review__content"><?php the_content(); ?></div>
                    </div>
					<?php
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
        <div class="phone box box--phone">
            <h2 class="head">Свяжитесь с нами</h2>
            <div class="phone__caption">
                <div class="phone__number phone__number--one">
					<?php
					$phone1_3 = $stoma_options['phone1_3'];
					if ( empty( $phone1_3 ) ): echo '8-495-638-0-648';
					else: echo $phone1_3; endif;
					?>
                </div>
                <div class="phone__number phone__number--two">
					<?php
					$phone2_4 = $stoma_options['phone2_4'];
					if ( empty( $phone2_4 ) ): echo '8-498-661-4-863';
					else: echo $phone2_4; endif;
					?>
                </div>
            </div>
        </div>
        <div class="address box box--address">
            <h2 class="head">Наш адрес</h2>
            <div class="address__caption">
                <div class="address__block">
                    <div class="address__number address__number--one">
						<?php
						$address1_1 = $stoma_options['address1_1'];
						if ( empty( $address1_1 ) ): echo '143969, Московская область, г. Реутов, ул.Октября д.28';
						else: echo $address1_1; endif;
						?>
                    </div>
                    <div class="address__number address__number--two">
						<?php
						$address2_2 = $stoma_options['address2_2'];
						if ( empty( $address2_2 ) ): echo '(вход со стороны автостоянки)';
						else: echo $address2_2; endif;
						?>
                    </div>
                </div>
                <div class="address__foto">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/address/home.jpg"
                         alt="address__pict" class="address__img">
                </div>
            </div>
        </div>
    </div>
<?php get_footer();