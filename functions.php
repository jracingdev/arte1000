<?php
/**
 * ARTE1000 — funções do tema.
 *
 * Desenvolvido por J RACING DEVELOPMENT
 * CNPJ 20.274.800/0001-08 · Contato: (21) 98233-6975
 *
 * @package arte1000
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ARTE1000_VERSION', '1.0.0' );
define( 'ARTE1000_DIR', get_template_directory() );
define( 'ARTE1000_URI', get_template_directory_uri() );

/**
 * Configuração básica do tema.
 */
function arte1000_setup() {
	load_theme_textdomain( 'arte1000', ARTE1000_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 360,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// WooCommerce.
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 600,
			'single_image_width'    => 900,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 4,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_image_size( 'arte1000-card', 800, 1000, true );
	add_image_size( 'arte1000-wide', 1600, 1000, true );

	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'arte1000' ),
			'footer'  => __( 'Menu do rodapé', 'arte1000' ),
		)
	);

	add_editor_style( array( arte1000_fonts_url(), 'assets/css/editor.css' ) );

	// Paleta do editor alinhada à identidade da marca.
	add_theme_support(
		'editor-color-palette',
		array(
			array( 'name' => __( 'Creme', 'arte1000' ), 'slug' => 'cream', 'color' => '#F6F1E7' ),
			array( 'name' => __( 'Linho', 'arte1000' ), 'slug' => 'linen', 'color' => '#EAE0CC' ),
			array( 'name' => __( 'Fibra', 'arte1000' ), 'slug' => 'fiber', 'color' => '#C9A46A' ),
			array( 'name' => __( 'Serra', 'arte1000' ), 'slug' => 'forest', 'color' => '#2E3A2B' ),
			array( 'name' => __( 'Terracota', 'arte1000' ), 'slug' => 'terracotta', 'color' => '#B5623A' ),
			array( 'name' => __( 'Carvão', 'arte1000' ), 'slug' => 'ink', 'color' => '#1E1A15' ),
		)
	);
}
add_action( 'after_setup_theme', 'arte1000_setup' );

/**
 * Largura de conteúdo.
 */
function arte1000_content_width() {
	$GLOBALS['content_width'] = 1240;
}
add_action( 'after_setup_theme', 'arte1000_content_width', 0 );

/**
 * URL das fontes (Fraunces + Manrope).
 */
function arte1000_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..700;1,9..144,300..600&family=Manrope:wght@400;500;600;700&display=swap';
}

/**
 * Scripts e estilos.
 */
function arte1000_scripts() {
	wp_enqueue_style( 'arte1000-fonts', arte1000_fonts_url(), array(), null );
	wp_enqueue_style( 'arte1000-main', ARTE1000_URI . '/assets/css/main.css', array(), ARTE1000_VERSION );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'arte1000-woocommerce', ARTE1000_URI . '/assets/css/woocommerce.css', array( 'arte1000-main' ), ARTE1000_VERSION );
	}

	wp_enqueue_script( 'arte1000-main', ARTE1000_URI . '/assets/js/main.js', array(), ARTE1000_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arte1000_scripts' );

/**
 * Pré-conexão com o Google Fonts.
 *
 * @param array  $urls          URLs.
 * @param string $relation_type Tipo.
 * @return array
 */
function arte1000_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
		$urls[] = 'https://fonts.googleapis.com';
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'arte1000_resource_hints', 10, 2 );

/**
 * Áreas de widgets.
 */
function arte1000_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Barra lateral', 'arte1000' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Exibida no blog e na loja.', 'arte1000' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'arte1000_widgets_init' );

/**
 * Tamanho do resumo.
 */
add_filter(
	'excerpt_length',
	function () {
		return 22;
	}
);
add_filter(
	'excerpt_more',
	function () {
		return '…';
	}
);

require ARTE1000_DIR . '/inc/customizer.php';
require ARTE1000_DIR . '/inc/template-tags.php';

if ( class_exists( 'WooCommerce' ) ) {
	require ARTE1000_DIR . '/inc/woocommerce.php';
}
