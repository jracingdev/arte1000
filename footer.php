<?php
/**
 * Rodapé.
 *
 * @package arte1000
 */

$a1_instagram = arte1000_instagram_url();
$a1_email     = arte1000_opt( 'email' );
?>

<footer class="a1-footer a1-scallop-t">
	<div class="a1-container">
		<div class="a1-footer__cta">
			<h2 class="a1-footer__headline"><?php esc_html_e( 'Traga a natureza para dentro de casa.', 'arte1000' ); ?></h2>
			<a class="a1-btn a1-btn--light" href="<?php echo esc_url( arte1000_whatsapp_url() ); ?>" target="_blank" rel="noopener">
				<?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<span><?php esc_html_e( 'Solicitar orçamento', 'arte1000' ); ?></span>
			</a>
		</div>

		<div class="a1-footer__grid">
			<div class="a1-footer__brand">
				<?php arte1000_logo(); ?>
				<p><?php echo esc_html( arte1000_opt( 'footer_about' ) ); ?></p>
				<?php if ( $a1_instagram ) : ?>
					<a class="a1-footer__social" href="<?php echo esc_url( $a1_instagram ); ?>" target="_blank" rel="noopener">
						<?php echo arte1000_icon( 'instagram' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<span>@<?php echo esc_html( ltrim( arte1000_opt( 'instagram' ), '@' ) ); ?></span>
					</a>
				<?php endif; ?>
			</div>

			<div>
				<h3 class="a1-footer__title"><?php esc_html_e( 'Navegue', 'arte1000' ); ?></h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'a1-footer__menu',
						'depth'          => 1,
						'fallback_cb'    => 'arte1000_menu_fallback',
					)
				);
				?>
			</div>

			<div>
				<h3 class="a1-footer__title"><?php esc_html_e( 'Atendimento', 'arte1000' ); ?></h3>
				<ul class="a1-footer__contact">
					<li>
						<?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<a href="<?php echo esc_url( arte1000_whatsapp_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( arte1000_whatsapp_display() ); ?></a>
					</li>
					<?php if ( $a1_email ) : ?>
						<li>
							<?php echo arte1000_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
							<a href="mailto:<?php echo esc_attr( antispambot( $a1_email ) ); ?>"><?php echo esc_html( antispambot( $a1_email ) ); ?></a>
						</li>
					<?php endif; ?>
					<li>
						<?php echo arte1000_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<span><?php echo esc_html( arte1000_opt( 'hours' ) ); ?></span>
					</li>
				</ul>
			</div>

			<div>
				<h3 class="a1-footer__title"><?php esc_html_e( 'Loja & fábrica', 'arte1000' ); ?></h3>
				<ul class="a1-footer__contact">
					<li>
						<?php echo arte1000_icon( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<a href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( arte1000_opt( 'address' ) ) ); ?>" target="_blank" rel="noopener"><?php echo esc_html( arte1000_opt( 'address' ) ); ?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="a1-footer__bottom">
			<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Todos os direitos reservados.', 'arte1000' ); ?></p>
			<p>
				<?php esc_html_e( 'Feito à mão na Serra Fluminense', 'arte1000' ); ?>
				<?php if ( arte1000_opt( 'signature' ) ) : ?>
					· <?php echo esc_html( arte1000_opt( 'signature' ) ); ?>
				<?php endif; ?>
			</p>
		</div>
	</div>
</footer>

<?php if ( arte1000_opt( 'show_float_wa' ) ) : ?>
	<a class="a1-float-wa" href="<?php echo esc_url( arte1000_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Conversar no WhatsApp', 'arte1000' ); ?>">
		<?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
