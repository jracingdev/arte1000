<?php
/**
 * Opções do tema no Customizer (Aparência → Personalizar → ARTE1000).
 *
 * @package arte1000
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Valores padrão de todas as opções do tema.
 *
 * @return array
 */
function arte1000_defaults() {
	return array(
		// Contato.
		'whatsapp'         => '5521981683570',
		'whatsapp_message' => 'Olá! Vim pelo site da ARTE1000 e gostaria de mais informações.',
		'instagram'        => 'lp_moveis_artesanais',
		'address'          => 'Estrada do Contorno, km 63 — Itaipava, Petrópolis/RJ',
		'hours'            => 'Loja física aberta à visitação — consulte horários pelo WhatsApp',
		'email'            => '',
		'topbar_text'      => 'Preço de fábrica · Enviamos por Correios e transportadora para todo o Brasil',
		'signature'        => 'ARTE 1000',

		// Hero.
		'hero_eyebrow'     => 'Peças artesanais em junco natural',
		'hero_title'       => 'Tramado à mão, feito para durar gerações.',
		'hero_text'        => 'Cestarias, luminárias, poltronas, cômodas e peças decorativas em junco natural, criadas fio a fio na nossa fábrica na Serra Fluminense. Direto do artesão para a sua casa, com preço de fábrica.',
		'hero_btn1_label'  => 'Ver coleção',
		'hero_btn1_url'    => '',
		'hero_btn2_label'  => 'Fale com um artesão',
		'hero_image'       => '',
		'hero_image_2'     => '',

		// Sobre / manifesto.
		'about_eyebrow'    => 'Nossa essência',
		'about_title'      => 'Cada peça carrega o tempo, as mãos e a história de quem a criou.',
		'about_text'       => "A ARTE1000 nasceu do encontro entre a tradição artesanal e o olhar contemporâneo. Em nossa fábrica, na Serra Fluminense, transformamos o junco natural em cestarias, móveis, luminárias e esculturas que unem resistência, conforto e beleza.\n\nNada é feito em série: cada trama é conduzida à mão, com paciência e cuidado, para que a sua peça seja única.",
		'about_image'      => '',

		// Sob medida.
		'custom_title'     => 'Tem um projeto em mente? A gente trama sob medida.',
		'custom_text'      => 'Adaptamos medidas, cores e acabamentos para a sua varanda, sala, pousada ou restaurante. Envie uma foto ou referência e receba um orçamento sem compromisso.',
		'custom_image'     => '',

		// Números.
		'stat_1_number'    => '+19 mil',
		'stat_1_label'     => 'seguidores acompanhando nossa produção',
		'stat_2_number'    => '100%',
		'stat_2_label'     => 'feito à mão em junco natural',
		'stat_3_number'    => 'Preço de fábrica',
		'stat_3_label'     => 'direto de quem produz, sem intermediários',
		'stat_4_number'    => 'Brasil',
		'stat_4_label'     => 'entregamos em todo o território nacional',

		// Entrega.
		'ship_eyebrow'     => 'Entrega',
		'ship_title'       => 'Do nosso ateliê até a sua porta.',
		'ship_1_title'     => 'Correios',
		'ship_1_text'      => 'Ideal para cestarias e peças menores, com código de rastreio para acompanhar a entrega.',
		'ship_2_title'     => 'Transportadora',
		'ship_2_text'      => 'Para móveis e volumes maiores, embalados com cuidado e enviados para todo o Brasil.',
		'ship_3_title'     => 'Retirada na loja',
		'ship_3_text'      => 'Compre online e retire sem custo de frete na nossa loja física em Itaipava.',
		'show_shipping'    => true,

		// Rodapé.
		'footer_about'     => 'Cestarias, móveis e objetos artesanais em junco natural, criados à mão na Serra Fluminense para casas cheias de vida.',
		'show_map'         => true,
		'show_float_wa'    => true,
		'show_credit'      => true,
	);
}

/**
 * Lê uma opção do tema com fallback para o padrão.
 *
 * @param string $key Chave.
 * @return mixed
 */
function arte1000_opt( $key ) {
	$defaults = arte1000_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'arte1000_' . $key, $default );
}

/**
 * Sanitiza checkbox.
 *
 * @param mixed $value Valor.
 * @return bool
 */
function arte1000_sanitize_checkbox( $value ) {
	return (bool) $value;
}

/**
 * Sanitiza número de WhatsApp (somente dígitos).
 *
 * @param string $value Valor.
 * @return string
 */
function arte1000_sanitize_phone( $value ) {
	return preg_replace( '/\D+/', '', (string) $value );
}

/**
 * Registra painel, seções e controles.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function arte1000_customize_register( $wp_customize ) {
	$defaults = arte1000_defaults();

	$wp_customize->add_panel(
		'arte1000',
		array(
			'title'    => __( 'ARTE1000 — Opções do tema', 'arte1000' ),
			'priority' => 30,
		)
	);

	$sections = array(
		'arte1000_contact' => __( 'Contato e WhatsApp', 'arte1000' ),
		'arte1000_hero'    => __( 'Home — Destaque principal', 'arte1000' ),
		'arte1000_about'   => __( 'Home — Nossa essência', 'arte1000' ),
		'arte1000_custom'  => __( 'Home — Sob medida', 'arte1000' ),
		'arte1000_stats'   => __( 'Home — Números', 'arte1000' ),
		'arte1000_ship'    => __( 'Home — Entrega', 'arte1000' ),
		'arte1000_footer'  => __( 'Rodapé', 'arte1000' ),
	);
	foreach ( $sections as $id => $title ) {
		$wp_customize->add_section( $id, array( 'title' => $title, 'panel' => 'arte1000' ) );
	}

	/*
	 * Campos: chave => [seção, tipo, rótulo].
	 * Tipos: text, textarea, url, image, checkbox, phone.
	 */
	$fields = array(
		'whatsapp'         => array( 'arte1000_contact', 'phone', __( 'WhatsApp (com DDI e DDD, só números)', 'arte1000' ) ),
		'whatsapp_message' => array( 'arte1000_contact', 'textarea', __( 'Mensagem inicial do WhatsApp', 'arte1000' ) ),
		'instagram'        => array( 'arte1000_contact', 'text', __( 'Usuário do Instagram (sem @)', 'arte1000' ) ),
		'address'          => array( 'arte1000_contact', 'text', __( 'Endereço da loja', 'arte1000' ) ),
		'hours'            => array( 'arte1000_contact', 'text', __( 'Horário de atendimento', 'arte1000' ) ),
		'email'            => array( 'arte1000_contact', 'text', __( 'E-mail', 'arte1000' ) ),
		'topbar_text'      => array( 'arte1000_contact', 'text', __( 'Texto da barra superior', 'arte1000' ) ),
		'signature'        => array( 'arte1000_contact', 'text', __( 'Assinatura de produção (rodapé)', 'arte1000' ) ),

		'ship_eyebrow'     => array( 'arte1000_ship', 'text', __( 'Chamada pequena', 'arte1000' ) ),
		'ship_title'       => array( 'arte1000_ship', 'text', __( 'Título', 'arte1000' ) ),
		'ship_1_title'     => array( 'arte1000_ship', 'text', __( 'Opção 1 — título', 'arte1000' ) ),
		'ship_1_text'      => array( 'arte1000_ship', 'textarea', __( 'Opção 1 — texto', 'arte1000' ) ),
		'ship_2_title'     => array( 'arte1000_ship', 'text', __( 'Opção 2 — título', 'arte1000' ) ),
		'ship_2_text'      => array( 'arte1000_ship', 'textarea', __( 'Opção 2 — texto', 'arte1000' ) ),
		'ship_3_title'     => array( 'arte1000_ship', 'text', __( 'Opção 3 — título', 'arte1000' ) ),
		'ship_3_text'      => array( 'arte1000_ship', 'textarea', __( 'Opção 3 — texto', 'arte1000' ) ),
		'show_shipping'    => array( 'arte1000_ship', 'checkbox', __( 'Exibir seção de entrega na home', 'arte1000' ) ),

		'hero_eyebrow'     => array( 'arte1000_hero', 'text', __( 'Chamada pequena', 'arte1000' ) ),
		'hero_title'       => array( 'arte1000_hero', 'textarea', __( 'Título', 'arte1000' ) ),
		'hero_text'        => array( 'arte1000_hero', 'textarea', __( 'Texto', 'arte1000' ) ),
		'hero_btn1_label'  => array( 'arte1000_hero', 'text', __( 'Botão 1 — texto', 'arte1000' ) ),
		'hero_btn1_url'    => array( 'arte1000_hero', 'url', __( 'Botão 1 — link (vazio = loja)', 'arte1000' ) ),
		'hero_btn2_label'  => array( 'arte1000_hero', 'text', __( 'Botão 2 (WhatsApp) — texto', 'arte1000' ) ),
		'hero_image'       => array( 'arte1000_hero', 'image', __( 'Imagem principal (vertical)', 'arte1000' ) ),
		'hero_image_2'     => array( 'arte1000_hero', 'image', __( 'Imagem secundária (detalhe)', 'arte1000' ) ),

		'about_eyebrow'    => array( 'arte1000_about', 'text', __( 'Chamada pequena', 'arte1000' ) ),
		'about_title'      => array( 'arte1000_about', 'textarea', __( 'Título', 'arte1000' ) ),
		'about_text'       => array( 'arte1000_about', 'textarea', __( 'Texto', 'arte1000' ) ),
		'about_image'      => array( 'arte1000_about', 'image', __( 'Imagem', 'arte1000' ) ),

		'custom_title'     => array( 'arte1000_custom', 'textarea', __( 'Título', 'arte1000' ) ),
		'custom_text'      => array( 'arte1000_custom', 'textarea', __( 'Texto', 'arte1000' ) ),
		'custom_image'     => array( 'arte1000_custom', 'image', __( 'Imagem de fundo', 'arte1000' ) ),

		'footer_about'     => array( 'arte1000_footer', 'textarea', __( 'Texto sobre a marca', 'arte1000' ) ),
		'show_map'         => array( 'arte1000_footer', 'checkbox', __( 'Exibir mapa da loja na home', 'arte1000' ) ),
		'show_float_wa'    => array( 'arte1000_footer', 'checkbox', __( 'Exibir botão flutuante de WhatsApp', 'arte1000' ) ),
		'show_credit'      => array( 'arte1000_footer', 'checkbox', __( 'Exibir crédito do desenvolvedor', 'arte1000' ) ),
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		/* translators: %d: número do destaque */
		$fields[ "stat_{$i}_number" ] = array( 'arte1000_stats', 'text', sprintf( __( 'Destaque %d — número', 'arte1000' ), $i ) );
		/* translators: %d: número do destaque */
		$fields[ "stat_{$i}_label" ] = array( 'arte1000_stats', 'text', sprintf( __( 'Destaque %d — legenda', 'arte1000' ), $i ) );
	}

	foreach ( $fields as $key => $field ) {
		list( $section, $type, $label ) = $field;
		$setting_id = 'arte1000_' . $key;

		switch ( $type ) {
			case 'textarea':
				$sanitize = 'sanitize_textarea_field';
				break;
			case 'url':
			case 'image':
				$sanitize = 'esc_url_raw';
				break;
			case 'checkbox':
				$sanitize = 'arte1000_sanitize_checkbox';
				break;
			case 'phone':
				$sanitize = 'arte1000_sanitize_phone';
				break;
			default:
				$sanitize = 'sanitize_text_field';
		}

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $sanitize,
			)
		);

		if ( 'image' === $type ) {
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					$setting_id,
					array( 'label' => $label, 'section' => $section )
				)
			);
		} else {
			$wp_customize->add_control(
				$setting_id,
				array(
					'label'   => $label,
					'section' => $section,
					'type'    => 'phone' === $type ? 'text' : $type,
				)
			);
		}
	}
}
add_action( 'customize_register', 'arte1000_customize_register' );
