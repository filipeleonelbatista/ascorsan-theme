<?php

function asc_rodape_option_register($wp_customize){

    $wp_customize->add_section('rodape-option', array(
        'title' => __('Menu do rodapé','ascorsan'),
        'description' => __( 'A opção LOOP selecionará automaticamente os itens mais recentes. A opção Menu deixará voce editar como menu, adicionando somente o que você quer exibir' ),
        'priority' => 99,
    ));

    $wp_customize->add_setting( 'area-rodape-option', array(
        'capability' => 'edit_theme_options',
        'default' => 'blue',
        'sanitize_callback' => 'asc_customizer_sanitize_radio',
      ) );
      
    $wp_customize->add_control( 'area-rodape-option', array(
        'type' => 'radio',
        'section' => 'rodape-option', // Add a default or your own section
        'label' => __( 'Áreas de lazer' ),
        'choices' => array(
            'true' => __( 'Loop - Recentemente adicionados' ),
            'false' => __( ' Menu' ),
        ),
    ) );

    $wp_customize->add_setting( 'noticia-rodape-option', array(
        'capability' => 'edit_theme_options',
        'default' => 'blue',
        'sanitize_callback' => 'asc_customizer_sanitize_radio',
      ) );
      
    $wp_customize->add_control( 'noticia-rodape-option', array(
        'type' => 'radio',
        'section' => 'rodape-option', // Add a default or your own section
        'label' => __( 'Notícias' ),
        'choices' => array(
            'true' => __( 'Loop - Recentemente adicionados' ),
            'false' => __( ' Menu' ),
        ),
    ) );

    $wp_customize->add_setting( 'convenio-rodape-option', array(
        'capability' => 'edit_theme_options',
        'default' => 'blue',
        'sanitize_callback' => 'asc_customizer_sanitize_radio',
      ) );
      
    $wp_customize->add_control( 'convenio-rodape-option', array(
        'type' => 'radio',
        'section' => 'rodape-option', // Add a default or your own section
        'label' => __( 'Convênio' ),
        'choices' => array(
            'true' => __( 'Loop - Recentemente adicionados' ),
            'false' => __( ' Menu' ),
        ),
    ) );

}

add_action('customize_register','asc_rodape_option_register');


function asc_customizer_sanitize_radio( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
  
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
  
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
  }

?>