<?php
function asc_theme_support(){
    // Adicionando o titulo do tema
    add_theme_support('title-tag');

    // adicionar o logo
    add_theme_support('custom-logo');

    //registrando o navwalker para adiconar os menus ao nosso tema
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

}
add_action('after_setup_theme', 'asc_theme_support');

if (!function_exists('wp_render_title_tag')){
    function asc_render_title(){
        ?> <title> <?php wp_title('-',true,'right'); bloginfo( 'name' )?> </title><?php
    }
    add_action('wp_head', 'asc_render_title');
}


register_nav_menus( array(
    'topo' => __( 'Menu Principal (topo do site)', 'ascorsan' ),
    'rodape1' => __( 'Menu Ascorsan (Rodapé do site)', 'ascorsan' ),
    'rodape2' => __( 'Menu Acesso Rápido (Rodapé do site)', 'ascorsan' ),
) );


// Definir miniaturas dos posts
add_theme_support( 'post-thumbnails' );

// Tamanho whide para servir nos cards do google, true ele corta caso a imagem
// não seja no tamanho ideal
set_post_thumbnail_size(1280, 720, true);

//Definir o tamanho do resumo
add_filter('excerpt_length', function($length){
    return 30;
});

// Definir o estilo da paginação
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes(){
    return 'class="btn btn-sm btn-ascorsan-search"';
}
