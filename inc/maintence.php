<?php

function asc_maintence_mode_register($wp_customize){

    $wp_customize->add_section('manutencao', array(
        'title' => __('Modo de manutenção','ascorsan'),
        'description' => __('Modo de manutenção','ascorsan'),
        'priority' => 27,
        'panel' => 'ascorsan-customizer',
    ));

    $wp_customize->add_setting('manutencao',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('manutencao',array(
        'type' => 'checkbox',
        'label' => __('Colocar o sistema em modo de manutenção?','ascorsan'),
        'section' => 'manutencao',
        'priority' => 1,
    )); 


}

add_action('customize_register','asc_maintence_mode_register');


?>