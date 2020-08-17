<?php
/*

@package ascorsan-theme

    ====================
        Content Page
    ====================


*/

function asc_add_content_page()
{

    // admin menu
    add_menu_page(
        'Conteúdos',
        'Conteúdos',
        'edit_posts',
        'ascorsan_content',
        'asc_content_create_page',
        'dashicons-welcome-write-blog',
        3
    );

    //admin subpages

    add_submenu_page(
        'ascorsan_content',
        'Conteúdos',
        'Conteúdos',
        'manage_options',
        'ascorsan_content',
        'asc_content_create_page'
    );

    
    add_submenu_page(
        'ascorsan_content',
        'Notícias',
        'Notícias',
        'edit_posts',
        'edit.php'
    );

    add_submenu_page(
        'ascorsan_content',
        'Videos',
        'Videos',
        'edit_posts',
        'edit.php?post_type=video'
    );

    add_submenu_page(
        'ascorsan_content',
        'Areas de lazer',
        'Areas de lazer',
        'edit_posts',
        'edit.php?post_type=areas_de_lazer'
    );

    add_submenu_page(
        'ascorsan_content',
        'Convênios',
        'Convênios',
        'edit_posts',
        'edit.php?post_type=convenio'
    );

    add_submenu_page(
        'ascorsan_content',
        'Banner Rotativo',
        'Banners',
        'edit_posts',
        'edit.php?post_type=banner'
    );

    add_submenu_page(
        'ascorsan_content',
        'Galeria de fotos',
        'Galeria de fotos',
        'edit_posts',
        'edit.php?post_type=galeria'
    );

    add_submenu_page(
        'ascorsan_content',
        'Avisos do site',
        'Avisos do site',
        'edit_posts',
        'edit.php?post_type=aviso'
    );

    add_submenu_page(
        'ascorsan_content',
        'Espaço do Associado',
        'Espaço do Associado',
        'edit_posts',
        'edit.php?post_type=associado'
    );

    add_submenu_page(
        'ascorsan_content',
        'Portal Solidário',
        'Portal Solidário',
        'edit_posts',
        'edit.php?post_type=solidario'
    );

    add_submenu_page(
        'ascorsan_content',
        'Páginas',
        'Páginas',
        'edit_posts',
        'edit.php?post_type=page'
    );

    add_submenu_page(
        'ascorsan_content',
        'Personalizar Tema',
        'Personalizar Tema',
        'edit_posts',
        'customize.php'
    );

    add_submenu_page(
        'ascorsan_content',
        'Editar menus',
        'Editar menus',
        'edit_posts',
        'nav-menus.php'
    );
    
}
add_action('admin_menu', 'asc_add_content_page');

function asc_content_create_page()
{
    echo '<h1>Tema Ascorsan</h1>';
    echo '<span>Versão 1.9</span>';
    echo '<h1>Novidades desta versão</h1>';
    echo '<p>Adicionado a opção de inserir um banner na pagina "Espaço do associado" com um link que você pode colocar para qual site desejar.</p>';
    echo '<p>Basta seguir este menu. Menu Conteúdos > Personalizar Tema > Personalizar Tema Ascorsan > Banner Espaço do Associado.</p>';
    echo '<p>Ao inserir o link e o titulo e salvar você verá um botão abaixo do titulo da página de associado. Agora se colocar uma imagem, será substituído o botão pela imagem.</p>';
    echo '<a href="http://localhost/wordpress/wp-admin/customize.php">Ir para o menu personalizar</a>';
}
