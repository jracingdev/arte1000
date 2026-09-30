<?php
/**
 * Funções auxiliares de template.
 *
 * @package arte1000
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Link do WhatsApp com mensagem.
 *
 * @param string $message Mensagem opcional (usa a padrão se vazia).
 * @return string
 */
function arte1000_whatsapp_url( $message = '' ) {
	$number  = arte1000_sanitize_phone( arte1000_opt( 'whatsapp' ) );
	$message = $message ? $message : arte1000_opt( 'whatsapp_message' );
	return 'https://wa.me/' . $number . '?text=' . rawurlencode( $message );
}

/**
 * Telefone formatado para exibição, ex.: (21) 98168-3570.
 *
 * @return string
 */
function arte1000_whatsapp_display() {
	$n = arte1000_sanitize_phone( arte1000_opt( 'whatsapp' ) );
	if ( 0 === strpos( $n, '55' ) && strlen( $n ) >= 12 ) {
		$n = substr( $n, 2 );
	}
	if ( 11 === strlen( $n ) ) {
		return sprintf( '(%s) %s-%s', substr( $n, 0, 2 ), substr( $n, 2, 5 ), substr( $n, 7 ) );
	}
	if ( 10 === strlen( $n ) ) {
		return sprintf( '(%s) %s-%s', substr( $n, 0, 2 ), substr( $n, 2, 4 ), substr( $n, 6 ) );
	}
	return $n;
}

/**
 * URL do Instagram.
 *
 * @return string
 */
function arte1000_instagram_url() {
	$user = ltrim( trim( (string) arte1000_opt( 'instagram' ) ), '@' );
	return $user ? 'https://www.instagram.com/' . rawurlencode( $user ) . '/' : '';
}

/**
 * URL da loja (WooCommerce) ou fallback.
 *
 * @return string
 */
function arte1000_shop_url() {
	if ( function_exists( 'wc_get_page_permalink' ) ) {
		return wc_get_page_permalink( 'shop' );
	}
	return home_url( '/' );
}

/**
 * Ícones SVG inline.
 *
 * @param string $name Nome do ícone.
 * @return string
 */
function arte1000_icon( $name ) {
	$icons = array(
		'whatsapp'  => '<path fill="currentColor" stroke="none" d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.4-1.48-.88-.79-1.48-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.14-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35zM12.04 21.5h-.01a9.4 9.4 0 0 1-4.8-1.31l-.34-.2-3.57.93.95-3.48-.22-.36a9.43 9.43 0 0 1-1.44-5.02c0-5.2 4.24-9.44 9.45-9.44 2.52 0 4.9.99 6.68 2.77a9.37 9.37 0 0 1 2.76 6.68c0 5.2-4.24 9.43-9.46 9.43zm8.04-17.47A11.3 11.3 0 0 0 12.04.7C5.77.7.67 5.8.67 12.07c0 2 .52 3.96 1.52 5.68L.57 23.7l6.08-1.6a11.33 11.33 0 0 0 5.39 1.37h.01c6.26 0 11.36-5.1 11.37-11.37 0-3.04-1.18-5.9-3.34-8.06z"/>',
		'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>',
		'cart'      => '<path d="M5 7h14l-1.2 11.1a2 2 0 0 1-2 1.9H8.2a2 2 0 0 1-2-1.9L5 7z"/><path d="M9 7V6a3 3 0 0 1 6 0v1"/>',
		'user'      => '<circle cx="12" cy="8" r="4"/><path d="M4 21c1.5-4 4.5-6 8-6s6.5 2 8 6"/>',
		'search'    => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
		'menu'      => '<path d="M3 7h18M3 12h18M3 17h12"/>',
		'close'     => '<path d="M6 6l12 12M18 6 6 18"/>',
		'arrow'     => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'pin'       => '<path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/>',
		'clock'     => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
		'mail'      => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
		'hand'      => '<path d="M8 13V5.5a1.5 1.5 0 0 1 3 0V12M11 11.5v-8a1.5 1.5 0 0 1 3 0V12M14 11.5v-6a1.5 1.5 0 0 1 3 0V14M17 9.5a1.5 1.5 0 0 1 3 0V15a7 7 0 0 1-7 7h-1a7 7 0 0 1-5.6-2.8L3.3 16a1.6 1.6 0 0 1 2.4-2.1L8 16"/>',
		'leaf'      => '<path d="M5 19c0-8 5-14 15-15-1 10-7 15-15 15z"/><path d="M5 19c3-4 6-7 10-9"/>',
		'ruler'     => '<rect x="2" y="8" width="20" height="8" rx="1.5"/><path d="M6 8v3M10 8v4M14 8v3M18 8v4"/>',
		'truck'     => '<path d="M2 6h12v10H2zM14 10h4l4 4v2h-8z"/><circle cx="6" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>',
		'shield'    => '<path d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6l-8-3z"/><path d="m9 12 2 2 4-4"/>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	return '<svg class="a1-icon a1-icon--' . esc_attr( $name ) . '" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $icons[ $name ] . '</svg>';
}

/**
 * Logotipo: logo personalizado ou marca tipográfica ARTE1000.
 */
function arte1000_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	?>
	<a class="a1-wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		<span class="a1-wordmark__name">ARTE<em>1000</em></span>
		<span class="a1-wordmark__tag"><?php esc_html_e( 'Móveis Artesanais', 'arte1000' ); ?></span>
	</a>
	<?php
}

/**
 * Imagem do Customizer ou placeholder com textura de trama.
 *
 * @param string $key   Chave da opção.
 * @param string $class Classe extra.
 * @param string $alt   Texto alternativo.
 */
function arte1000_media( $key, $class = '', $alt = '' ) {
	$url = arte1000_opt( $key );
	if ( $url ) {
		$id = attachment_url_to_postid( $url );
		if ( $id ) {
			echo wp_get_attachment_image( $id, 'full', false, array( 'class' => 'a1-media__img', 'alt' => $alt, 'loading' => 'lazy' ) );
		} else {
			printf( '<img class="a1-media__img" src="%s" alt="%s" loading="lazy" />', esc_url( $url ), esc_attr( $alt ) );
		}
		return;
	}
	printf( '<div class="a1-weave %s" role="img" aria-label="%s"></div>', esc_attr( $class ), esc_attr( $alt ) );
}

/**
 * Meta de posts (data).
 */
function arte1000_posted_on() {
	printf(
		'<time class="a1-meta" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
}

/**
 * Fallback do menu principal quando nenhum menu foi atribuído.
 */
function arte1000_menu_fallback() {
	echo '<ul class="a1-menu">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Início', 'arte1000' ) . '</a></li>';
	if ( class_exists( 'WooCommerce' ) ) {
		echo '<li><a href="' . esc_url( arte1000_shop_url() ) . '">' . esc_html__( 'Loja', 'arte1000' ) . '</a></li>';
	}
	echo '<li><a href="' . esc_url( home_url( '/#essencia' ) ) . '">' . esc_html__( 'Sobre', 'arte1000' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#sob-medida' ) ) . '">' . esc_html__( 'Sob medida', 'arte1000' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#visite' ) ) . '">' . esc_html__( 'Visite a loja', 'arte1000' ) . '</a></li>';
	echo '</ul>';
}

/**
 * Paginação numérica.
 */
function arte1000_pagination() {
	the_posts_pagination(
		array(
			'mid_size'  => 1,
			'prev_text' => '←',
			'next_text' => '→',
		)
	);
}
