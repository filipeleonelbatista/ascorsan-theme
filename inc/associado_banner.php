<?php

function asc_associado_banner_register($wp_customize){

    $wp_customize->add_section('associado_banner', array(
        'title' => __('Banner Espaço do Associado','ascorsan'),
        'description' => __('Banner ou titulo com link personalizado.','ascorsan'),
        'capability' => 'edit_theme_options',
        'priority' => 22,
        'panel' => 'ascorsan-customizer',
    ));

    $wp_customize->add_setting('img-banner-associado', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'img-banner-associado', array(
        'section' => 'associado_banner',
        'description' => 'A imagem que irá entre o Titulo e conteúdo na pagina de arquivo do espaço do associado.',
        'label' => 'Imagem de fundo',
        'mime_type' => 'image',
        'priority' => 1
    )));
    
    $wp_customize->add_setting('titulo-banner-associado',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('titulo-banner-associado',array(
        'label' => __('Titulo do Banner','ascorsan'),
        'description' => __('Caso opte por não enviar imagem você pode selecionar um titulo a sua escolha','ascorsan'),
        'section' => 'associado_banner',
        'priority' => 2,
    ));

    $wp_customize->add_setting('link-banner-associado',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('link-banner-associado',array(
        'label' => __('Link do Banner','ascorsan'),
        'description' => __('Link para o site que deseja','ascorsan'),
        'section' => 'associado_banner',
        'priority' => 3,
    ));

}

add_action('customize_register','asc_associado_banner_register');


?>