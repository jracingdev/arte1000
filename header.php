<?php
/**
 * Cabeçalho.
 *
 * @package arte1000
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#2E3A2B">
	<script>document.documentElement.classList.add('a1-js');</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="a1-skip" href="#primary"><?php esc_html_e( 'Pular para o conteúdo', 'arte1000' ); ?></a>

<?php $topbar = arte1000_opt( 'topbar_text' ); ?>
<?php if ( $topbar ) : ?>
	<div class="a1-topbar">
		<div class="a1-container a1-topbar__inner">
			<p><?php echo esc_html( $topbar ); ?></p>
			<a href="<?php echo esc_url( arte1000_whatsapp_url() ); ?>" target="_blank" rel="noopener">
				<?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<span><?php echo esc_html( arte1000_whatsapp_display() ); ?></span>
			</a>
		</div>
	</div>
<?php endif; ?>

<header class="a1-header" id="a1-header">
	<div class="a1-container a1-header__inner">
		<button class="a1-iconbtn a1-header__toggle" type="button" aria-controls="a1-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Abrir menu', 'arte1000' ); ?>">
			<?php echo arte1000_icon( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</button>

		<div class="a1-header__brand"><?php arte1000_logo(); ?></div>

		<nav class="a1-nav" id="a1-nav" aria-label="<?php esc_attr_e( 'Menu principal', 'arte1000' ); ?>">
			<div class="a1-nav__head">
				<?php arte1000_logo(); ?>
				<button class="a1-iconbtn a1-nav__close" type="button" aria-label="<?php esc_attr_e( 'Fechar menu', 'arte1000' ); ?>">
					<?php echo arte1000_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</button>
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'a1-menu',
					'fallback_cb'    => 'arte1000_menu_fallback',
					'depth'          => 2,
				)
			);
			?>
			<a class="a1-btn a1-btn--whatsapp a1-nav__cta" href="<?php echo esc_url( arte1000_whatsapp_url() ); ?>" target="_blank" rel="noopener">
				<?php echo arte1000_icon( 'whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<span><?php esc_html_e( 'Fale conosco', 'arte1000' ); ?></span>
			</a>
		</nav>

		<div class="a1-header__actions">
			<button class="a1-iconbtn" type="button" data-a1-search-open aria-label="<?php esc_attr_e( 'Buscar', 'arte1000' ); ?>">
				<?php echo arte1000_icon( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</button>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a class="a1-iconbtn a1-hide-sm" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" aria-label="<?php esc_attr_e( 'Minha conta', 'arte1000' ); ?>">
					<?php echo arte1000_icon( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</a>
				<a class="a1-iconbtn a1-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'Carrinho', 'arte1000' ); ?>">
					<?php echo arte1000_icon( 'cart' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					<?php arte1000_cart_count(); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</header>

<div class="a1-search" id="a1-search" hidden>
	<div class="a1-container">
		<button class="a1-iconbtn a1-search__close" type="button" data-a1-search-close aria-label="<?php esc_attr_e( 'Fechar busca', 'arte1000' ); ?>">
			<?php echo arte1000_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</button>
		<p class="a1-eyebrow"><?php esc_html_e( 'O que você procura?', 'arte1000' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</div>
<div class="a1-overlay" data-a1-overlay></div>
