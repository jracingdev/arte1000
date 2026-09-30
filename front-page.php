<?php
/**
 * Página inicial — vitrine comercial da ARTE1000.
 *
 * @package arte1000
 */

get_header();

$a1_has_wc    = class_exists( 'WooCommerce' );
$a1_btn1_url  = arte1000_opt( 'hero_btn1_url' ) ? arte1000_opt( 'hero_btn1_url' ) : arte1000_shop_url();
$a1_instagram = arte1000_instagram_url();
?>

<main id="primary" class="a1-main a1-home">

	<!-- Destaque principal -->
	<section class="a1-hero">
		<div class="a1-container a1-hero__grid">
			<div class="a1-hero__content" data-a1-reveal>
				<p class="a1-eyebrow"><?php echo esc_html( arte1000_opt( 'hero_eyebrow' ) ); ?></p>
				<h1 class="a1-hero__title"><?php echo esc_html( arte1000_opt( 'hero_title' ) ); ?></h1>
				<p class="a1-hero__text"><?php echo esc_html( arte1000_opt( 'hero_text' ) ); ?></p>
				<div class="a1-hero__actions">
					<a class="a1-btn" href="<?php echo esc_url( $a1_btn1_url ); ?>">
						<span><?php echo esc_html( arte1000_opt( 'hero_btn1_label' ) ); ?></span>
						<?php echo arte1000_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					</a>
					<a class="a1-btn a1-btn--ghost" href="<?php echo esc_url( arte1000_whatsapp_url() ); ?>" target="_blank" rel="noopener">
						<?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<span><?php echo esc_html( arte1000_opt( 'hero_btn2_label' ) ); ?></span>
					</a>
				</div>
				<ul class="a1-hero__points">
					<li><?php echo arte1000_icon( 'hand' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> <?php esc_html_e( 'Feito à mão', 'arte1000' ); ?></li>
					<li><?php echo arte1000_icon( 'leaf' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> <?php esc_html_e( 'Fibra natural', 'arte1000' ); ?></li>
					<li><?php echo arte1000_icon( 'truck' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> <?php esc_html_e( 'Envio para todo o Brasil', 'arte1000' ); ?></li>
				</ul>
			</div>

			<div class="a1-hero__visual" data-a1-reveal>
				<div class="a1-hero__main a1-media"><?php arte1000_media( 'hero_image', 'a1-weave--tall', __( 'Móvel artesanal em fibra natural', 'arte1000' ) ); ?></div>
				<div class="a1-hero__detail a1-media"><?php arte1000_media( 'hero_image_2', 'a1-weave--dark', __( 'Detalhe da trama artesanal', 'arte1000' ) ); ?></div>
				<div class="a1-hero__seal" aria-hidden="true">
					<svg viewBox="0 0 120 120">
						<defs><path id="a1-seal-path" d="M60,60 m-44,0 a44,44 0 1,1 88,0 a44,44 0 1,1 -88,0"/></defs>
						<text><textPath href="#a1-seal-path"><?php esc_html_e( 'PEÇA ÚNICA · FEITA À MÃO · ARTE1000 · ', 'arte1000' ); ?></textPath></text>
					</svg>
					<span>1000</span>
				</div>
			</div>
		</div>
	</section>

	<!-- Faixa de valores -->
	<div class="a1-marquee" aria-hidden="true">
		<div class="a1-marquee__track">
			<?php
			$a1_marquee = array(
				__( 'Fibra natural', 'arte1000' ),
				__( 'Tramado à mão', 'arte1000' ),
				__( 'Sob medida', 'arte1000' ),
				__( 'Fábrica própria', 'arte1000' ),
				__( 'Serra Fluminense', 'arte1000' ),
				__( 'Envio para todo o Brasil', 'arte1000' ),
			);
			for ( $a1_i = 0; $a1_i < 2; $a1_i++ ) {
				foreach ( $a1_marquee as $a1_item ) {
					echo '<span>' . esc_html( $a1_item ) . '</span><i>✦</i>';
				}
			}
			?>
		</div>
	</div>

	<!-- Categorias -->
	<section class="a1-section a1-cats">
		<div class="a1-container">
			<header class="a1-section__head" data-a1-reveal>
				<div>
					<p class="a1-eyebrow"><?php esc_html_e( 'Coleções', 'arte1000' ); ?></p>
					<h2 class="a1-section__title"><?php esc_html_e( 'Encontre a peça que conta a sua história', 'arte1000' ); ?></h2>
				</div>
				<a class="a1-link" href="<?php echo esc_url( arte1000_shop_url() ); ?>"><?php esc_html_e( 'Ver tudo', 'arte1000' ); ?> <?php echo arte1000_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
			</header>

			<div class="a1-cats__grid">
				<?php
				$a1_terms = $a1_has_wc ? arte1000_get_home_categories( 6 ) : array();

				if ( $a1_terms ) :
					foreach ( $a1_terms as $a1_term ) :
						$a1_thumb = get_term_meta( $a1_term->term_id, 'thumbnail_id', true );
						?>
						<a class="a1-cat" href="<?php echo esc_url( get_term_link( $a1_term ) ); ?>" data-a1-reveal>
							<div class="a1-cat__media a1-media">
								<?php
								if ( $a1_thumb ) {
									echo wp_get_attachment_image( $a1_thumb, 'arte1000-card', false, array( 'class' => 'a1-media__img' ) );
								} else {
									echo '<div class="a1-weave"></div>';
								}
								?>
							</div>
							<div class="a1-cat__body">
								<h3><?php echo esc_html( $a1_term->name ); ?></h3>
								<span>
									<?php
									/* translators: %d: quantidade de produtos */
									echo esc_html( sprintf( _n( '%d peça', '%d peças', $a1_term->count, 'arte1000' ), $a1_term->count ) );
									?>
								</span>
							</div>
						</a>
						<?php
					endforeach;
				else :
					$a1_static = array(
						__( 'Poltronas', 'arte1000' )            => __( 'Conforto tramado para a sala e a varanda', 'arte1000' ),
						__( 'Cadeiras', 'arte1000' )             => __( 'Para a mesa de jantar e a área gourmet', 'arte1000' ),
						__( 'Mesas', 'arte1000' )                => __( 'Centro, lateral e jantar', 'arte1000' ),
						__( 'Luminárias', 'arte1000' )           => __( 'Luz filtrada pela trama natural', 'arte1000' ),
						__( 'Cestos & organização', 'arte1000' ) => __( 'Beleza que também guarda', 'arte1000' ),
						__( 'Esculturas & decor', 'arte1000' )   => __( 'Peças autorais que viram assunto', 'arte1000' ),
					);
					foreach ( $a1_static as $a1_name => $a1_desc ) :
						?>
						<a class="a1-cat" href="<?php echo esc_url( arte1000_shop_url() ); ?>" data-a1-reveal>
							<div class="a1-cat__media a1-media"><div class="a1-weave"></div></div>
							<div class="a1-cat__body">
								<h3><?php echo esc_html( $a1_name ); ?></h3>
								<span><?php echo esc_html( $a1_desc ); ?></span>
							</div>
						</a>
						<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</section>

	<?php if ( $a1_has_wc ) : ?>
		<?php
		// Produtos marcados como destaque; se não houver, os mais recentes.
		$a1_products = wc_get_featured_product_ids()
			? do_shortcode( '[products limit="8" columns="4" visibility="featured"]' )
			: do_shortcode( '[products limit="8" columns="4" orderby="date" order="DESC"]' );
		?>
		<?php if ( false !== strpos( $a1_products, '<li' ) ) : ?>
			<!-- Produtos -->
			<section class="a1-section a1-section--linen a1-products">
				<div class="a1-container">
					<header class="a1-section__head" data-a1-reveal>
						<div>
							<p class="a1-eyebrow"><?php esc_html_e( 'Mais desejados', 'arte1000' ); ?></p>
							<h2 class="a1-section__title"><?php esc_html_e( 'Peças que saem direto da nossa oficina', 'arte1000' ); ?></h2>
						</div>
						<a class="a1-link" href="<?php echo esc_url( arte1000_shop_url() ); ?>"><?php esc_html_e( 'Ir para a loja', 'arte1000' ); ?> <?php echo arte1000_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
					</header>
					<?php echo $a1_products; // phpcs:ignore WordPress.Security.EscapeOutput -- saída do WooCommerce. ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<!-- Essência -->
	<section class="a1-section a1-about" id="essencia">
		<div class="a1-container a1-about__grid">
			<div class="a1-about__media a1-media" data-a1-reveal>
				<?php arte1000_media( 'about_image', 'a1-weave--tall', __( 'Artesão tramando fibra natural', 'arte1000' ) ); ?>
				<div class="a1-about__quote">
					<p><?php esc_html_e( '“Mil fios, mil gestos, uma peça única.”', 'arte1000' ); ?></p>
				</div>
			</div>
			<div class="a1-about__content" data-a1-reveal>
				<p class="a1-eyebrow"><?php echo esc_html( arte1000_opt( 'about_eyebrow' ) ); ?></p>
				<h2 class="a1-section__title"><?php echo esc_html( arte1000_opt( 'about_title' ) ); ?></h2>
				<div class="a1-about__text"><?php echo wp_kses_post( wpautop( arte1000_opt( 'about_text' ) ) ); ?></div>

				<ol class="a1-steps">
					<li>
						<span class="a1-steps__n">01</span>
						<div>
							<h3><?php esc_html_e( 'Fibra selecionada', 'arte1000' ); ?></h3>
							<p><?php esc_html_e( 'Escolhemos fibras naturais resistentes, preparadas para durar.', 'arte1000' ); ?></p>
						</div>
					</li>
					<li>
						<span class="a1-steps__n">02</span>
						<div>
							<h3><?php esc_html_e( 'Trama artesanal', 'arte1000' ); ?></h3>
							<p><?php esc_html_e( 'Cada fio é conduzido à mão sobre estruturas firmes e bem acabadas.', 'arte1000' ); ?></p>
						</div>
					</li>
					<li>
						<span class="a1-steps__n">03</span>
						<div>
							<h3><?php esc_html_e( 'Acabamento & entrega', 'arte1000' ); ?></h3>
							<p><?php esc_html_e( 'Revisamos detalhe por detalhe e enviamos com todo o cuidado até você.', 'arte1000' ); ?></p>
						</div>
					</li>
				</ol>
			</div>
		</div>
	</section>

	<!-- Números -->
	<section class="a1-stats">
		<div class="a1-container a1-stats__grid">
			<?php for ( $a1_i = 1; $a1_i <= 4; $a1_i++ ) : ?>
				<?php if ( arte1000_opt( "stat_{$a1_i}_number" ) ) : ?>
					<div class="a1-stat" data-a1-reveal>
						<strong><?php echo esc_html( arte1000_opt( "stat_{$a1_i}_number" ) ); ?></strong>
						<span><?php echo esc_html( arte1000_opt( "stat_{$a1_i}_label" ) ); ?></span>
					</div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	</section>

	<!-- Sob medida -->
	<section class="a1-custom" id="sob-medida">
		<div class="a1-custom__bg a1-media"><?php arte1000_media( 'custom_image', 'a1-weave--dark', '' ); ?></div>
		<div class="a1-container a1-custom__inner" data-a1-reveal>
			<p class="a1-eyebrow a1-eyebrow--light"><?php esc_html_e( 'Projetos exclusivos', 'arte1000' ); ?></p>
			<h2 class="a1-custom__title"><?php echo esc_html( arte1000_opt( 'custom_title' ) ); ?></h2>
			<p class="a1-custom__text"><?php echo esc_html( arte1000_opt( 'custom_text' ) ); ?></p>
			<div class="a1-custom__features">
				<span><?php echo arte1000_icon( 'ruler' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> <?php esc_html_e( 'Medidas personalizadas', 'arte1000' ); ?></span>
				<span><?php echo arte1000_icon( 'leaf' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> <?php esc_html_e( 'Cores e acabamentos', 'arte1000' ); ?></span>
				<span><?php echo arte1000_icon( 'hand' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> <?php esc_html_e( 'Projetos comerciais', 'arte1000' ); ?></span>
			</div>
			<a class="a1-btn a1-btn--light" href="<?php echo esc_url( arte1000_whatsapp_url( __( 'Olá! Gostaria de um orçamento para um móvel sob medida.', 'arte1000' ) ) ); ?>" target="_blank" rel="noopener">
				<?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<span><?php esc_html_e( 'Pedir orçamento sob medida', 'arte1000' ); ?></span>
			</a>
		</div>
	</section>

	<?php
	// Últimos posts do blog (inspiração), se houver.
	$a1_posts = new WP_Query(
		array(
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
	if ( $a1_posts->have_posts() ) :
		?>
		<section class="a1-section a1-journal">
			<div class="a1-container">
				<header class="a1-section__head" data-a1-reveal>
					<div>
						<p class="a1-eyebrow"><?php esc_html_e( 'Inspiração', 'arte1000' ); ?></p>
						<h2 class="a1-section__title"><?php esc_html_e( 'Ideias para ambientes com alma', 'arte1000' ); ?></h2>
					</div>
				</header>
				<div class="a1-posts">
					<?php
					while ( $a1_posts->have_posts() ) :
						$a1_posts->the_post();
						get_template_part( 'template-parts/card', 'post' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Visite / Instagram -->
	<section class="a1-section a1-visit" id="visite">
		<div class="a1-container a1-visit__grid">
			<div class="a1-visit__content" data-a1-reveal>
				<p class="a1-eyebrow"><?php esc_html_e( 'Visite nossa loja', 'arte1000' ); ?></p>
				<h2 class="a1-section__title"><?php esc_html_e( 'Venha sentir a trama de perto, na Serra.', 'arte1000' ); ?></h2>
				<ul class="a1-visit__list">
					<li><?php echo arte1000_icon( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php echo esc_html( arte1000_opt( 'address' ) ); ?></span></li>
					<li><?php echo arte1000_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php echo esc_html( arte1000_opt( 'hours' ) ); ?></span></li>
					<li><?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php echo esc_html( arte1000_whatsapp_display() ); ?></span></li>
				</ul>
				<div class="a1-hero__actions">
					<a class="a1-btn" href="<?php echo esc_url( 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode( arte1000_opt( 'address' ) ) ); ?>" target="_blank" rel="noopener">
						<?php echo arte1000_icon( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<span><?php esc_html_e( 'Como chegar', 'arte1000' ); ?></span>
					</a>
					<?php if ( $a1_instagram ) : ?>
						<a class="a1-btn a1-btn--ghost" href="<?php echo esc_url( $a1_instagram ); ?>" target="_blank" rel="noopener">
							<?php echo arte1000_icon( 'instagram' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
							<span><?php esc_html_e( 'Siga no Instagram', 'arte1000' ); ?></span>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( arte1000_opt( 'show_map' ) ) : ?>
				<div class="a1-visit__map" data-a1-reveal>
					<iframe
						title="<?php esc_attr_e( 'Mapa da loja ARTE1000', 'arte1000' ); ?>"
						src="<?php echo esc_url( 'https://maps.google.com/maps?q=' . rawurlencode( arte1000_opt( 'address' ) ) . '&z=14&output=embed' ); ?>"
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php
get_footer();
