<?php

function asc_whatsapp_register($wp_customize){

    $wp_customize->add_section('whatsapp', array(
        'title' => __('Widget do Whatsapp','ascorsan'),
        'description' => __('Widget do Whatsapp','ascorsan'),
        'priority' => 99,
    ));

    $wp_customize->add_setting('add-whatsapp',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('add-whatsapp',array(
        'type' => 'checkbox',
        'label' => __('Ativar Widget do Whatsapp no site?','ascorsan'),
        'section' => 'whatsapp',
        'priority' => 1,
    )); 

    $wp_customize->add_setting('cor-whatsapp',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('cor-whatsapp',array(
        'label' => __('Cor do botão','ascorsan'),
        'description' => 'Cor em hexadecimal que ficará de fundo no botão',
        'section' => 'whatsapp',
        'priority' => 2,
    ));

    $wp_customize->add_setting('mensagem-whatsapp',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('mensagem-whatsapp',array(
        'label' => __('Mensagem do botão','ascorsan'),
        'section' => 'whatsapp',
        'priority' => 2,
    ));

    $wp_customize->add_setting( 'posicao-whatsapp', array(
        'capability' => 'edit_theme_options',
        'default' => 'blue',
        'sanitize_callback' => 'themeslug_customizer_sanitize_radio',
      ) );
      
    $wp_customize->add_control( 'posicao-whatsapp', array(
        'type' => 'radio',
        'section' => 'whatsapp', // Add a default or your own section
        'label' => __( 'Posição' ),
        'description' => __( 'Escolha a posição ondeficará o widget do Whatsapp.' ),
        'choices' => array(
            'right' => __( 'Direita' ),
            'left' => __( 'Esquerda' ),
        ),
    ) );

}

add_action('customize_register','asc_whatsapp_register');


function themeslug_customizer_sanitize_radio( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
  
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
  
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
  }

?>