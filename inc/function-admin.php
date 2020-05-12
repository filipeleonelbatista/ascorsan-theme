<?php
/*

@package ascorsan-theme

    ====================
        Admin Page
    ====================


*/

function asc_add_admin_page()
{

    $icon = get_template_directory_uri() . '/img/asc-icon.png';
    // admin menu
    add_menu_page(
        'Opções do tema Ascorsan',
        'Ascorsan',
        'edit_posts',
        'ascorsan',
        'asc_theme_create_page',
        $icon,
        1
    );

    //admin subpages

    add_submenu_page(
        'ascorsan',
        'Painel',
        'Painel',
        'manage_options',
        'ascorsan',
        'asc_theme_create_page'
    );

    add_submenu_page(
        'ascorsan',
        'Notícias',
        'Notícias',
        'edit_posts',
        'edit.php'
    );

    add_submenu_page(
        'ascorsan',
        'Videos',
        'Videos',
        'edit_posts',
        'edit.php?post_type=video'
    );

    add_submenu_page(
        'ascorsan',
        'Areas de lazer',
        'Areas de lazer',
        'edit_posts',
        'edit.php?post_type=areas_de_lazer'
    );

    add_submenu_page(
        'ascorsan',
        'Convênios',
        'Convênios',
        'edit_posts',
        'edit.php?post_type=convenio'
    );

    add_submenu_page(
        'ascorsan',
        'Banner Rotativo',
        'Banners',
        'edit_posts',
        'edit.php?post_type=banner'
    );

    add_submenu_page(
        'ascorsan',
        'Galeria de fotos',
        'Galeria de fotos',
        'edit_posts',
        'edit.php?post_type=galeria'
    );

    add_submenu_page(
        'ascorsan',
        'Avisos do site',
        'Avisos do site',
        'edit_posts',
        'edit.php?post_type=aviso'
    );

    add_submenu_page(
        'ascorsan',
        'Espaço do Associado',
        'Espaço do Associado',
        'edit_posts',
        'edit.php?post_type=associado'
    );

    add_submenu_page(
        'ascorsan',
        'Portal Solidário',
        'Portal Solidário',
        'edit_posts',
        'edit.php?post_type=solidario'
    );

    add_submenu_page(
        'ascorsan',
        'Páginas',
        'Páginas',
        'edit_posts',
        'edit.php?post_type=page'
    );

    add_submenu_page(
        'ascorsan',
        'Personalizar Tema',
        'Personalizar Tema',
        'edit_posts',
        'customize.php'
    );

    add_submenu_page(
        'ascorsan',
        'Editar menus',
        'Editar menus',
        'edit_posts',
        'nav-menus.php'
    );
    

    add_submenu_page(
        'ascorsan',
        'Estatisticas',
        'Estatisticas',
        'edit_posts',
        'admin.php?page=monsterinsights_reports#/'
    );
    
}
add_action('admin_menu', 'asc_add_admin_page');

function asc_theme_create_page()
{
    echo '<h1>Tema Ascorsan</h1>';
    echo '<span>Versão 1.3</span>';
    require get_template_directory() . '/inc/readme.php';
}

function asc_theme_setings_page()
{
}
