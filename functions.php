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
    return 20;
});

// Definir o estilo da paginação
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes(){
    return 'class="btn btn-sm btn-ascorsan-search"';
}

// Registrando sidebar
register_sidebar(
    array(
        'name' => 'Busca',
        'id' => 'busca',
        'before_widget' => '<div class="search">',
        'after_widget' => '</div>',
        'before_title' => '<p style="display:none;">',
        'after_title' => '</p>',
    ));


// Registrando um post personalizado para a galeria de fotos como Custom Post Type
function asc_cpt() {

	$labels = array(
		'name'                  => _x( 'Galeria de fotos da Ascorsan', 'Galeria de fotos da Ascorsan', 'ascorsan' ),
		'singular_name'         => _x( 'Galeria de fotos', 'Galeria de fotos', 'ascorsan' ),
		'menu_name'             => __( 'Galeria de fotos', 'ascorsan' ),
		'name_admin_bar'        => __( 'Galeria de fotos', 'ascorsan' ),
		'archives'              => __( 'Galerias arquivadas', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todas as galerias', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Galeria de Fotos', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Nova Galeria', 'ascorsan' ),
		'new_item'              => __( 'Nova Galeria', 'ascorsan' ),
		'edit_item'             => __( 'Editar Galeria', 'ascorsan' ),
		'update_item'           => __( 'Atualizar Galeria', 'ascorsan' ),
		'view_item'             => __( 'Ver Galeria', 'ascorsan' ),
		'view_items'            => __( 'Ver Galerias', 'ascorsan' ),
		'search_items'          => __( 'Search Item', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir na galeria', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para a galeria', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Galeria de fotos', 'ascorsan' ),
		'description'           => __( 'Galeria de fotos da Ascorsan', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail'), // 'excerpt', 'author'
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 4,
        'menu_icon'             => 'dashicons-camera-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'exclude_from_search'   => true, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'galeria', $args );

}
add_action( 'init', 'asc_cpt', 0 );