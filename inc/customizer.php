<?php

function asc_customize_register($wp_customize){

    $wp_customize->add_section('dados-contato', array(
        'title' => __('Dados de contato','ascorsan'),
        'description' => __('Dados de contato da empresa','ascorsan'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('endereco',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('endereco',array(
        'label' => __('Endereço da empresa','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 1,
    ));



}

add_action('customize_register','asc_customize_register');


?>