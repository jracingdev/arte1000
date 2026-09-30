<?php
/**
 * Formulário de busca.
 *
 * @package arte1000
 */

$a1_id = wp_unique_id( 'a1-s-' );
?>
<form role="search" method="get" class="a1-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $a1_id ); ?>"><?php esc_html_e( 'Buscar por:', 'arte1000' ); ?></label>
	<input type="search" id="<?php echo esc_attr( $a1_id ); ?>" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Poltronas, cestos, luminárias…', 'arte1000' ); ?>" />
	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
		<input type="hidden" name="post_type" value="product" />
	<?php endif; ?>
	<button type="submit" aria-label="<?php esc_attr_e( 'Buscar', 'arte1000' ); ?>"><?php echo arte1000_icon( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
</form>
