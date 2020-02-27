<?php

function asc_contact_page_register($wp_customize){

    $wp_customize->add_section('contato', array(
        'title' => __('Página de contato','ascorsan'),
        'description' => __('Página de contato','ascorsan'),
        'priority' => 22,
    )); 

    $wp_customize->add_setting('email-contato',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('email-contato',array(
        'label' => __('Email para contato','ascorsan'),
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