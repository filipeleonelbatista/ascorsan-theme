<?php

function asc_beneficio_register($wp_customize){

    $wp_customize->add_section('beneficio', array(
        'title' => __('Beneficio ao associado','ascorsan'),
        'description' => __('Area da pagina principal para mostrar os benefícios ao associado','ascorsan'),
        'capability' => 'edit_theme_options',
        'priority' => 26,
        'panel' => 'ascorsan-customizer',
    ));

    $wp_customize->add_setting('add-beneficio',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('add-beneficio',array(
        'type' => 'checkbox',
        'label' => __('Ativar beneficios na pagina inicial?','ascorsan'),
        'section' => 'beneficio',
        'priority' => 1,
    )); 

    $wp_customize->add_setting('add-btn-beneficio',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('add-btn-beneficio',array(
        'type' => 'checkbox',
        'label' => __('Ativar botão principal?','ascorsan'),
        'section' => 'beneficio',
        'priority' => 1,
    )); 
    $wp_customize->add_setting('titulo-beneficio',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('titulo-beneficio',array(
        'label' => __('Titulo do botão principal','ascorsan'),
        'section' => 'beneficio',
        'priority' => 2,
    ));

    $wp_customize->add_setting('link-beneficio',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('link-beneficio',array(
        'label' => __('Link do botão principal','ascorsan'),
        'section' => 'beneficio',
        'priority' => 3,
    ));
}
add_action('customize_register','asc_beneficio_register');


?>