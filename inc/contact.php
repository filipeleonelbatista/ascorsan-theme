<?php

function asc_contact_page_register($wp_customize){

    $wp_customize->add_section('contato', array(
        'title' => __('Emails dos formulários','ascorsan'),
        'description' => __('Página de contato','ascorsan'),
        'priority' => 22,
        'panel' => 'ascorsan-customizer',
    )); 

    $wp_customize->add_setting('email-area',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('email-area',array(
        'label' => __('Email do formulario das reservas','ascorsan'),
        'section' => 'contato',
        'priority' => 1,
    ));

    $wp_customize->add_setting('email-update',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('email-update',array(
        'label' => __('Email do formulario de atualizaçao cadastral','ascorsan'),
        'section' => 'contato',
        'priority' => 1,
    ));

    $wp_customize->add_setting('email-update-imposto-renda',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('email-update-imposto-renda',array(
        'label' => __('Email do formulario de solicitação do imposto de renda','ascorsan'),
        'section' => 'contato',
        'priority' => 1,
    ));

    $wp_customize->add_setting('email-contato',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('email-contato',array(
        'label' => __('Email do formulario de contato','ascorsan'),
        'section' => 'contato',
        'priority' => 1,
    ));

    $wp_customize->add_setting('mapa-contato',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('mapa-contato',array(
        'label' => __('EMBED do google maps','ascorsan'),
        'section' => 'contato',
        'priority' => 1,
    ));


}

add_action('customize_register','asc_contact_page_register');


?>