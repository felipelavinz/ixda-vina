<?php
/**
 * IxDA Viña del Mar Theme Customizer
 *
 * @package IxDA_Viña_del_Mar
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $c Theme Customizer object.
 */
function ixda_vina_customize_register( $c ) {
	$c->add_section('features', [
		'title' => 'Destacados'
	]);
	$c->add_setting('main_feature_text', [
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport' => 'postMessage'
	]);
	$c->add_control('main_feature_text', [
		'section' => 'features',
		'type' => 'textarea',
		'label' => 'Texto del destacado principal',
		'input_attrs' => [
			'placeholder' => 'Un espacio para ampliar el conocimiento en experiencia de usuario'
		]
	]);
	$c->add_setting('main_feature_img', [
		'sanitize_callback'	=> 'absint'
	]);
	$c->add_control( new WP_Customize_Cropped_Image_Control( $c, 'main_feature_img', [
		'section' => 'features',
		'label' => 'Imagen del destacado principal',
		'width'	=> 1280,
		'height' => 500
	]));
	$c->selective_refresh->add_partial('main_feature_text', [
		'selector' => '.feature__title',
		'settings' => ['main_feature_text'],
		'render_callback' => function(){
			return get_theme_mod('main_feature_text');
		},
		'fallback_refresh' => false
	]);
	$c->add_setting('secondary_feature_text', [
		'sanitize_callback' => 'sanitize_textarea_field'
	]);
	$c->add_control('secondary_feature_text', [
		'label' => 'Texto del destacado secundario',
		'type' => 'textarea',
		'section' => 'features',
	]);
	$c->selective_refresh->add_partial('secondary_feature_text', [
		'selector' => '.feature-secondary__title',
		'settings' => ['secondary_feature_text'],
		'render_callback' => function() {
			return get_theme_mod('secondary_feature_text');
		}
	]);
	$c->add_setting('secondary_feature_cite', [
		'sanitize_callback' => 'sanitize_text_field'
	]);
	$c->add_control('secondary_feature_cite', [
		'label' => 'Cita del destacado secundario',
		'type' => 'text',
		'section' => 'features'
	]);
	$c->selective_refresh->add_partial('secondary_feature_cite', [
		'selector' => '.feature-secondary__description',
		'settings' => ['secondary_feature_cite'],
		'render_callback' => function() {
			return get_theme_mod('secondary_feature_cite');
		}
	]);

	$c->add_section('about', [
		'title' => 'Textos sección "Acerca"'
	]);
	foreach ( ['about' => 'Acerca de', 'team' => 'Equipo'] as $key => $label ) {
		$c->add_setting("about_{$key}_title", [
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage'
		]);
		$c->add_control("about_{$key}_title", [
			'type' => 'text',
			'label' => "Título $label",
			'section' => 'about'
		]);
		$c->selective_refresh->add_partial("about_{$key}_title", [
			'selector' => ".about__{$key}-title",
			'settings' => [ "about_{$key}_title" ],
			'render_callback' => function( ) use ( $key ) {
				return get_theme_mod("about_{$key}_title");
			},
			'fallback_refresh' => false
		]);
		$c->add_setting("about_{$key}_description", [
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport' => 'postMessage'
		]);
		$c->add_control("about_{$key}_description", [
			'type' => 'textarea',
			'label' => "Descripción $label",
			'section' => 'about'
		]);
		$c->selective_refresh->add_partial("about_{$key}_description", [
			'selector' => ".about__{$key}-description",
			'settings' => [ "about_{$key}_description" ],
			'render_callback' => function( ) use ( $key ) {
				return  wpautop( wptexturize( get_theme_mod("about_{$key}_description") ) );
			},
			'fallback_refresh' => false
		]);
		$c->add_setting("about_{$key}_url", [
			'sanitize_callback' => 'esc_url_raw'
		]);
		$c->add_control("about_{$key}_url", [
			'type' => 'url',
			'label' => "Enlace $label",
			'section' => 'about'
		]);
	}
}
add_action( 'customize_register', 'ixda_vina_customize_register' );
