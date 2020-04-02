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
    
    $wp_customize->add_setting('email',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('email',array(
        'label' => __('Email','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 2,
    ));
    

    $wp_customize->add_setting('telefone',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('telefone',array(
        'label' => __('Telefone','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 3,
    ));
    

    $wp_customize->add_setting('telefone2',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('telefone2',array(
        'label' => __('Segundo Telefone','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 4,
    ));
    

    $wp_customize->add_setting('facebook',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('facebook',array(
        'label' => __('Facebook','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 5,
    ));
    

    $wp_customize->add_setting('instagram',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('instagram',array(
        'label' => __('Instagram','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 6,
    ));

    $wp_customize->add_setting('titulolink',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('titulolink',array(
        'label' => __('Titulo do link do cabeçalho','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 7,
    ));

    $wp_customize->add_setting('link',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('link',array(
        'label' => __('Link do cabeçalho','ascorsan'),
        'section' => 'dados-contato',
        'priority' => 8,
    ));    


}

add_action('customize_register','asc_customize_register');


?>