<?php
function asc_theme_support(){
    // Adicionando o titulo do tema
    add_theme_support('title-tag');

    // adicionar o logo
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'asc_theme_support');

if (!function_exists('wp_render_title_tag')){
    function asc_render_title(){
        ?> <title> <?php wp_title('-',true,'right'); bloginfo( 'name' )?> </title><?php
    }
    add_action('wp_head', 'asc_render_title');
}


