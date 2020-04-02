<?php

function asc_banner_register($wp_customize){

    $wp_customize->add_section('banner', array(
        'title' => __('Banners rotativo','ascorsan'),
        'description' => __('Banners rotativo','ascorsan'),
        'priority' => 99,
    ));

    $wp_customize->add_setting('add-banner',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('add-banner',array(
        'type' => 'checkbox',
        'label' => __('Ativar banners rotativo no site?','ascorsan'),
        'section' => 'banner',
        'priority' => 1,
    )); 

    $wp_customize->add_setting('qtd-banner',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('qtd-banner',array(
        'label' => __('Quantidade de banners','ascorsan'),
        'section' => 'banner',
        'priority' => 2,
    ));


}

add_action('customize_register','asc_banner_register');


?>