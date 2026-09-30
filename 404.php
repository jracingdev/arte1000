<?php
/**
 * Página não encontrada.
 *
 * @package arte1000
 */

get_header();
?>

<main id="primary" class="a1-main">
	<section class="a1-404">
		<div class="a1-container a1-container--narrow">
			<p class="a1-404__code">404</p>
			<h1 class="a1-pagehead__title"><?php esc_html_e( 'Esse fio se soltou da trama.', 'arte1000' ); ?></h1>
			<p><?php esc_html_e( 'A página que você procura não existe ou mudou de lugar.', 'arte1000' ); ?></p>
			<div class="a1-hero__actions">
				<a class="a1-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Voltar ao início', 'arte1000' ); ?></a>
				<a class="a1-btn a1-btn--ghost" href="<?php echo esc_url( arte1000_shop_url() ); ?>"><?php esc_html_e( 'Ver coleção', 'arte1000' ); ?></a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
