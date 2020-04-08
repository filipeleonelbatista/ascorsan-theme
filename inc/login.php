<?php

function asc_login_register($wp_customize){

    $wp_customize->add_section('login', array(
        'title' => __('Login do site','ascorsan'),
        'description' => __('Login do site','ascorsan'),
        'capability' => 'edit_theme_options',
        'priority' => 99,
    ));

// Adicionando imagem ao login

    $wp_customize->add_setting('img-fundo-login', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'img-fundo-login', array(
        'section' => 'login',
        'description' => 'A imagem que irá no fundo da tela de login.',
        'label' => 'Imagem de fundo',
        'mime_type' => 'image'
    )));

    $wp_customize->add_setting('img-icon-login', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'img-icon-login', array(
        'section' => 'login',
        'description' => 'A imagem que irá no logo da tela de login.',
        'label' => 'Logo da tela',
        'mime_type' => 'image'
    )));

}

add_action('customize_register','asc_login_register');


?>