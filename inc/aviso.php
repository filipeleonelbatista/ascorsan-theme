<?php

function asc_aviso_register($wp_customize){

    $wp_customize->add_section('aviso', array(
        'title' => __('Aviso do site','ascorsan'),
        'description' => __('Aviso do site','ascorsan'),
        'capability' => 'edit_theme_options',
        'priority' => 24,
        'panel' => 'ascorsan-customizer',
    ));
    
    $wp_customize->add_setting( 'select-aviso', array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod',
        'default' => 'nenhum',
    ) );
    
    $wp_customize->add_control( 'select-aviso', array(
        'type' => 'select',
        'section' => 'aviso', // Add a default or your own section
        'label' => __( 'Tipos de aviso','ascorsan'),
        'choices' => array(
            'nenhum' => __( 'Nenhum' ),
            'imposto_renda' => __( 'Imposto de renda' ),
            'atualizacao_cadastral' => __( 'Atualização cadastral' ),
            'page' => __( 'Página personalizada' ),
            'image' => __( 'Imagem destacada' ),
        ),
    ) );

    $wp_customize->add_setting( 'select-dropdown-pages', array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod',
      ) );
      
      $wp_customize->add_control( 'select-dropdown-pages', array(
        'type' => 'dropdown-pages',
        'section' => 'aviso',
        'label' => __( 'Páginas personalizadas' ),
        'description' => __( 'Caso tenha selecionado a opção "Página personalizada", selecione a página que contém seu seu formulário.' ),
      ) );

// Adicionando imagem ao aviso

    $wp_customize->add_setting('img-aviso', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'img-aviso', array(
        'section' => 'aviso',
        'description' => 'A imagem que irá no aviso quando a opção selecionada for "Imagem Desstacada".',
        'label' => 'Imagem do aviso',
        'mime_type' => 'image'
    )));


}

add_action('customize_register','asc_aviso_register');


?>