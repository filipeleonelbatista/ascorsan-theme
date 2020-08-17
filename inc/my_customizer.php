<?php 

function asc_my_customize_register($wp_customize){

    $wp_customize->add_panel('ascorsan-customizer', array(
        'priority'       => 20,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Personalizar tema ascorsan','ascorsan'),
        'description' => __('Personalizar tema ascorsan','ascorsan'),
    ));
     

}

add_action('customize_register','asc_my_customize_register');


?>
