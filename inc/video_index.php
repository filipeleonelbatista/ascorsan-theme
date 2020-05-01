<?php

function asc_video_index_register($wp_customize){

    $wp_customize->add_section('video_index', array(
        'title' => __('Video da pagina principal','ascorsan'),
        'description' => __('Video da pagina principal','ascorsan'),
        'capability' => 'edit_theme_options',
        'priority' => 30,
        'panel' => 'ascorsan-customizer',
    ));

    $wp_customize->add_setting('add-video_index',array(
        'default' => _x('','ascorsan'),
        'type' => 'theme_mod'

    ));

    $wp_customize->add_control('add-video_index',array(
        'type' => 'checkbox',
        'label' => __('Ativar video_indexs na pagina inicial?','ascorsan'),
        'section' => 'video_index',
        'priority' => 1,
    )); 

//  Comentado pois irá puxar a ultima postagem de um custom post type do tipo video_indexs do site
    // Descomentar caso queira manter fixo
   
   
   //echo get_theme_mod("titulo-video_index"); 
   
    // $wp_customize->add_setting('titulo-video_index',array(
    //     'default' => _x('','ascorsan'),
    //     'type' => 'theme_mod'

    // ));

    // $wp_customize->add_control('titulo-video_index',array(
    //     'label' => __('Titulo da area de video','ascorsan'),
    //     'section' => 'video_index',
    //     'priority' => 2,
    // ));

//     $wp_customize->add_setting('corpo-video_index',array(
//         'default' => _x('','ascorsan'),
//         'type' => 'theme_mod'

//     ));

//     $wp_customize->add_control('corpo-video_index',array(
//         'type' => 'textarea',
//         'label' => __('Corpo do video_index','ascorsan'),
//         'section' => 'video_index',
//         'priority' => 3,
//     ));
// // Adicionando imagem ao video_index

    $wp_customize->add_setting('img-video_index', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'img-video_index', array(
        'section' => 'video_index',
        'description' => 'O video que irá no na pagina principal quando ele estiver ativo.',
        'label' => 'Video para a pagina principal',
        'mime_type' => 'video'
    )));

}

add_action('customize_register','asc_video_index_register');


?>