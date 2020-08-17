<?php
/*

@package ascorsan-theme

    ====================
        Admin Page
    ====================


*/

function asc_add_theme_page()
{

    $icon = get_template_directory_uri() . '/img/asc-icon.png';
    // theme menu
    add_menu_page(
        'Opções do tema Ascorsan',
        'Ascorsan',
        'edit_posts',
        'ascorsan_theme',
        'asc_theme_create_page',
        $icon,
        2
    );

    //theme subpages

    add_submenu_page(
        'ascorsan_theme',
        'Painel',
        'Painel',
        'manage_options',
        'ascorsan_theme',
        'asc_theme_create_page'
    );

    
}
add_action('admin_menu', 'asc_add_theme_page');

function asc_theme_create_page()
{
    echo '<h1>Tema Ascorsan</h1>';
    echo '<span>Versão 1.9</span>';
    echo '<h1>Novidades desta versão</h1>';
    echo '<p>Adicionado a opção de inserir um banner na pagina "Espaço do associado" com um link que você pode colocar para qual site desejar.</p>';
    echo '<p>Basta seguir este menu. Menu Conteúdos > Personalizar Tema > Personalizar Tema Ascorsan > Banner Espaço do Associado.</p>';
    echo '<p>Ao inserir o link e o titulo e salvar você verá um botão abaixo do titulo da página de associado. Agora se colocar uma imagem, será substituído o botão pela imagem.</p>';
    echo '<a href="http://localhost/wordpress/wp-admin/customize.php">Ir para o menu personalizar</a>';
}

function asc_theme_setings_page()
{
    echo '<h1>Tema Ascorsan</h1>';
}
