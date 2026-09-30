<?php
/**
 * Integração com WooCommerce.
 *
 * @package arte1000
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Usa o layout do tema no lugar dos wrappers padrão.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action(
	'woocommerce_before_main_content',
	function () {
		echo '<main id="primary" class="a1-main a1-shop"><div class="a1-container">';
	},
	10
);
add_action(
	'woocommerce_after_main_content',
	function () {
		echo '</div></main>';
	},
	10
);

/**
 * Produtos por página e colunas.
 */
add_filter(
	'loop_shop_per_page',
	function () {
		return 12;
	}
);
add_filter(
	'loop_shop_columns',
	function () {
		return 4;
	}
);
add_filter(
	'woocommerce_output_related_products_args',
	function ( $args ) {
		$args['posts_per_page'] = 4;
		$args['columns']        = 4;
		return $args;
	}
);

/**
 * Atualiza o contador do carrinho via AJAX.
 *
 * @param array $fragments Fragmentos.
 * @return array
 */
function arte1000_cart_fragment( $fragments ) {
	ob_start();
	arte1000_cart_count();
	$fragments['.a1-cart-count'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'arte1000_cart_fragment' );

/**
 * Bolinha com a quantidade de itens no carrinho.
 */
function arte1000_cart_count() {
	$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	printf(
		'<span class="a1-cart-count%s">%s</span>',
		$count ? '' : ' is-empty',
		esc_html( $count )
	);
}

/**
 * Botão "Comprar / tirar dúvidas pelo WhatsApp" na página do produto.
 */
function arte1000_product_whatsapp_button() {
	global $product;
	if ( ! $product ) {
		return;
	}
	/* translators: 1: nome do produto, 2: link do produto */
	$message = sprintf( __( 'Olá! Tenho interesse no produto "%1$s": %2$s', 'arte1000' ), $product->get_name(), get_permalink( $product->get_id() ) );
	printf(
		'<a class="a1-btn a1-btn--whatsapp a1-product-wa" href="%1$s" target="_blank" rel="noopener">%2$s<span>%3$s</span></a>',
		esc_url( arte1000_whatsapp_url( $message ) ),
		arte1000_icon( 'whatsapp' ), // phpcs:ignore WordPress.Security.EscapeOutput -- SVG estático.
		esc_html__( 'Comprar ou personalizar pelo WhatsApp', 'arte1000' )
	);
}
add_action( 'woocommerce_single_product_summary', 'arte1000_product_whatsapp_button', 35 );

/**
 * Selos de confiança abaixo do botão de compra.
 */
function arte1000_product_trust() {
	$items = array(
		'hand'   => __( 'Feito à mão, peça única', 'arte1000' ),
		'ruler'  => __( 'Medidas sob encomenda', 'arte1000' ),
		'truck'  => __( 'Envio para todo o Brasil', 'arte1000' ),
		'shield' => __( 'Compra segura', 'arte1000' ),
	);
	echo '<ul class="a1-trust">';
	foreach ( $items as $icon => $label ) {
		echo '<li>' . arte1000_icon( $icon ) . '<span>' . esc_html( $label ) . '</span></li>'; // phpcs:ignore WordPress.Security.EscapeOutput
	}
	echo '</ul>';
}
add_action( 'woocommerce_single_product_summary', 'arte1000_product_trust', 36 );

/**
 * Selo "Feito à mão" nas miniaturas.
 */
function arte1000_loop_badge() {
	echo '<span class="a1-badge">' . esc_html__( 'Feito à mão', 'arte1000' ) . '</span>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'arte1000_loop_badge', 9 );

/**
 * Categorias de produto para a home.
 *
 * @param int $limit Limite.
 * @return WP_Term[]
 */
function arte1000_get_home_categories( $limit = 6 ) {
	$terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'parent'     => 0,
			'number'     => $limit,
			'orderby'    => 'count',
			'order'      => 'DESC',
			'exclude'    => array( (int) get_option( 'default_product_cat' ) ),
		)
	);
	return is_wp_error( $terms ) ? array() : $terms;
}
