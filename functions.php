<?php
function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}
//adicionando variaveis de busca
function asc_uf_query_vars( $qvars ) {
    $qvars[] = 'uf';
    return $qvars;
}
add_filter( 'query_vars', 'asc_uf_query_vars' );
function asc_municipio_query_vars( $qvars ) {
    $qvars[] = 'municipio';
    return $qvars;
}
add_filter( 'query_vars', 'asc_municipio_query_vars' );
function asc_segmento_query_vars( $qvars ) {
    $qvars[] = 'segmento';
    return $qvars;
}
add_filter( 'query_vars', 'asc_segmento_query_vars' );

// Novo dash

function customAdmin() {
    $url = get_stylesheet_directory_uri() ."/css/wp-admin.css" ;
    echo '<!-- custom admin css -->
          <link rel="stylesheet" type="text/css" href="' . $url . '" />
          <!-- /end custom adming css -->';
}
add_action('admin_head', 'customAdmin');

// Remover notificcações de atualizações
function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes

//Login Stylesheet
function asc_stylesheet() { ?>
	<style>
body.login {
	<?php if( get_theme_mod('img-fundo-login') != "" ) : ?>
		background-image: url("<?php echo wp_get_attachment_url(get_theme_mod("img-fundo-login")); ?>");
		background-position: center top;
		background-size: 100% auto;
	<?php else: ?>
		background: rgb(37,176,194);
		background: radial-gradient(circle, rgba(37,176,194,1) 0%, rgba(1,100,122,1) 100%);
		background-position: center top;
		background-size: 100% auto;
	<?php endif; ?>
}

body.login div#login {}

body.login div#login h1 {}

body.login div#login h1 a {}

body.login div#login form#loginform {
	border-radius: 10px;
	background-color: #ffffffcc
}

body.login div#login h1 a {
	<?php if(get_theme_mod('img-icon-login') != "" ) : ?>
	 	background-image: url("<?php echo wp_get_attachment_url(get_theme_mod("img-icon-login")); ?>");
	<?php else: ?>
		background-image: url("<?php bloginfo('template_url'); ?>/img/wp-login-page.png") !important; 
	<?php endif; ?>
	
	padding-bottom: 30px; 
	} 

body.login div#login form#loginform p {}

body.login div#login form#loginform p label {}

body.login div#login form#loginform input {}

body.login div#login form#loginform input#user_login {}

body.login div#login form#loginform input#user_pass {}

body.login div#login form#loginform p.forgetmenot {}

body.login div#login form#loginform p.forgetmenot input#rememberme {}

body.login div#login form#loginform p.submit {}

body.login div#login form#loginform p.submit input#wp-submit {}

body.login div#login p#nav {}

<?php if( get_theme_mod('img-fundo-login') == "" ) : ?>

body.login div#login p#nav a {	
	padding: 10px;
	text-align: center;
	color: #fff;
	font-size: 14px;
	font-weight: bold;
}

body.login div#login p#nav a:hover {
	color: #ccc;
}
<?php else: ?>

body.login div#login p#nav a {	
	display: block;		
	background-color: #007cba;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	color: #fff;
	font-size: 14px;
	font-weight: bold;
}

body.login div#login p#nav a:hover {
	color: #ccc;
	background-color: #0071a1;
}

<?php endif; ?>

<?php if( get_theme_mod('img-fundo-login') == "" ) : ?>

body.login div#login p#backtoblog a {	
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	color: #fff;
	font-size: 14px;
	font-weight: bold;
	
}

body.login div#login p#backtoblog a:hover {	
	color: #ccc;	
}

<?php else: ?>
body.login div#login p#backtoblog {
	margin-top: 30px;
}

body.login div#login p#backtoblog a {		
	display: block;
	background-color: #007cba;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	color: #fff;
	font-size: 14px;
	font-weight: bold;
	
}

body.login div#login p#backtoblog a:hover {		
	
	color: #ccc;
	background-color: #0071a1;
	
}
<?php endif; ?>


	</style>    
<?php }
add_action( 'login_enqueue_scripts', 'asc_stylesheet' );

// Remove dashboard widgets
function remove_dashboard_meta() {
	//if ( ! current_user_can( 'manage_options' ) ) {
	if ( true ) {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal');
	}
}
add_action( 'admin_init', 'remove_dashboard_meta' ); 

// Saudação customizada
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

// Create the function to use in the action hook
function asc_remove_dashboard_widget () {
    remove_meta_box ( 'dashboard_quick_press', 'dashboard', 'side' );
}
add_action ('wp_dashboard_setup', 'asc_remove_dashboard_widget');
/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function asc_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'asc_dashboard_widget', // Widget slug.
		'Tema ascorsan', // Title.
		'my_admin_page_contents' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'asc_add_dashboard_widgets' );


// Adicionando a documentação do tema

// function my_admin_menu() {
// 	add_menu_page(
// 		__( 'Tema Ascorsan', 'ascorsan' ),
// 		__( 'Tema Ascorsan', 'ascorsan' ),
// 		'manage_options',
// 		'sample-page',
// 		'my_admin_page_contents',
// 		'dashicons-admin-appearance',
// 		3
// 	);
// }
//add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_page_contents() {
	?>
		<h1>
			<?php esc_html_e( 'Bem vindo ao tema ascorsan.', 'ascorsan' ); ?>
		</h1>
	<?php	
require get_template_directory().'/inc/readme.php';
}

// Removendo comentarios
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function asc_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'asc_admin_bar_render' );
//Fim removendo comentarios


function asc_remove_menus() {
	// if ( ! current_user_can( 'manage_options' ) ) {
	if ( true ) {

		// Removendo conteudos
		remove_menu_page( 'index.php' ); 
		remove_menu_page( 'edit.php?post_type=page' ); 
		remove_menu_page( 'edit.php?post_type=convenio' ); 
		remove_menu_page( 'edit.php?post_type=areas_de_lazer' ); 
		remove_menu_page( 'edit.php?post_type=banner' ); 
		remove_menu_page( 'edit.php?post_type=galeria' ); 
		remove_menu_page( 'edit.php?post_type=aviso' ); 
		remove_menu_page( 'edit.php?post_type=video' );  
		remove_menu_page( 'edit.php?post_type=associado' ); 
		remove_menu_page( 'edit.php?post_type=solidario' ); 
		remove_menu_page( 'edit-comments.php' ); 
		remove_menu_page( 'edit.php?post_type=acf-field-group' ); 		
		remove_menu_page( 'edit.php' ); 
		remove_menu_page( 'upload.php' ); 
		remove_menu_page( 'themes.php' ); 


		remove_menu_page( 'themes.php' );          // Appearance
		remove_menu_page( 'plugins.php' );         // Plugins
		remove_menu_page( 'users.php' );           // Users
		remove_menu_page( 'tools.php' );           // Tools
		remove_menu_page( 'options-general.php' ); // Settings
	}
}
add_action( 'admin_menu', 'asc_remove_menus' );


function asc_adjust_the_wp_menu() {
	$page = remove_submenu_page( 'themes.php', 'widgets.php' );
}
add_action( 'admin_menu', 'asc_adjust_the_wp_menu', 999 );


// Custom Admin footer
function asc_remove_footer_admin () {
	echo '<span id="footer-thankyou">Tema Ascorsan - Versão 1.10<br> Desenvolvido por <a href="https://filipedev.ga/" target="_blank">Leonel Informática</a></span>';
}
add_filter( 'admin_footer_text', 'asc_remove_footer_admin' );

function asc_login_logo() { ?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/custom-logo.png );
			padding-bottom: 30px;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'asc_login_logo' );


function asc_login_logo_url() {
	return esc_url( home_url( '/' ) );
}
add_filter( 'login_headerurl', 'asc_login_logo_url' );

function asc_login_logo_url_title() {
	return 'Login - Ascorsan';
}
add_filter( 'login_headertitle', 'asc_login_logo_url_title' );

// fim do novo dash


//incluir informações de endereço e telefones

require get_template_directory().'/inc/function-content.php';
require get_template_directory().'/inc/function-theme.php';


require get_template_directory().'/inc/my_customizer.php'; // 20

    
require get_template_directory().'/inc/customizer.php'; // 20 *
require get_template_directory().'/inc/login.php'; // 21 *
require get_template_directory().'/inc/contact.php'; // 22 *
require get_template_directory().'/inc/aviso.php'; // 24 *
require get_template_directory().'/inc/banner.php'; // 25 *
require get_template_directory().'/inc/beneficio.php'; // 26 *
require get_template_directory().'/inc/maintence.php'; // 27 *
require get_template_directory().'/inc/rodape.php'; // 28 *
require get_template_directory().'/inc/whatsapp.php'; // 29 *
require get_template_directory().'/inc/video_index.php'; // 30 *
require get_template_directory().'/inc/associado_banner.php'; // 30 *


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

		global $post;

		if ( is_singular() ) {
			$des_post = strip_tags( $post->post_content );
			$des_post = strip_shortcodes( $post->post_content );
			$des_post = str_replace( array("\n", "\r", "\t"), ' ', $des_post );
			$des_post = mb_substr( $des_post, 0, 150, 'utf8' );
			$des_post = str_replace( "<!-- wp:paragraph --> <p>", '', $des_post );
			$des_post = str_replace( "</p> <!-- /wp:paragrap", '', $des_post );
			$image = get_the_post_thumbnail_url($post->ID,'full');

			if($image == '') {
				$image = get_bloginfo('stylesheet_directory'). '/img/default.png';
			}
			?> 
			<title> <?php wp_title('-',true,'right'); bloginfo( 'name' )?> </title>
			
			<!-- SEO Geral -->
			<meta name="title" content="<?php bloginfo( "name" ); ?>">
			<meta name='description' content='<?php bloginfo( "description" );?>'>
			<link rel="canonical" href="<?php  print(home_url());  ?>">
			<meta name="author" content="<?php bloginfo( "name" );  ?>">
			<meta name="robots" content="index">

			<!-- Google+ / Schema.org -->
			<meta itemprop="name" content="<?php print($post->post_title);  ?>">
			<meta itemprop="description" content="<?php print(wp_strip_all_tags( $des_post )); ?>">
			<meta itemprop="image" content="<?php print($image) ?>">

			<!-- Open Graph Facebook -->
			<meta property="og:title" content="<?php print($post->post_title); ?>">
			<meta property="og:description" content="<?php print(wp_strip_all_tags( $des_post )); ?>"/>
			<meta property="og:url" content="<?php print(get_permalink( $post->ID ));  ?>">
			<meta property="og:site_name" content="<?php bloginfo( "name" );  ?>"/>
			<meta property="og:type" content="website">
			<meta property="og:image" content="<?php print($image) ?>">

			<!-- Twitter -->
			<meta name="twitter:title" content="<?php print($post->post_title);?>">
			<meta name="twitter:description" content="<?php print(wp_strip_all_tags( $des_post )); ?>">
			<meta name="twitter:url" content="<?php print(get_permalink( $post->ID ));  ?>">
			<meta name="twitter:card" content="summary">
			<meta name="twitter:image" content="<?php print($image) ?>">
			
			<?php
		}
		if ( is_home() ) {	

			?> 
			<title> <?php wp_title('-',true,'right'); bloginfo( 'name' )?> </title>
			
			<!-- SEO Geral -->
			<meta name="title" content="<?php bloginfo( "name" ); ?>">
			<meta name='description' content='<?php bloginfo( "description" );?>'>
			<link rel="canonical" href="<?php  print(home_url());  ?>">
			<meta name="author" content="<?php bloginfo( "name" );  ?>">
			<meta name="robots" content="index">
			
			<?php
		}
		if ( is_category() ) {
			$des_cat = strip_tags(category_description());		

			?> 
			<title> <?php wp_title('-',true,'right'); bloginfo( 'name' )?> </title>
			
			<!-- SEO Geral -->
			<meta name="title" content="<?php bloginfo( "name" ); ?>">
			<meta name='description' content='<?php bloginfo( "description" );?>'>
			<link rel="canonical" href="<?php  print(home_url());  ?>">
			<meta name="author" content="<?php bloginfo( "name" );  ?>">
			<meta name="robots" content="index">
			
			<?php
		}
	
        ?> <title> <?php wp_title('-',true,'right'); bloginfo( 'name' )?> </title><?php
    }
    add_action('wp_head', 'asc_render_title');
}

register_nav_menus( array(
    'topo' => __( 'Menu Principal (topo do site)', 'ascorsan' ),
    'beneficios' => __( 'Menu Beneficios', 'ascorsan' ),
    'rodape1' => __( 'Menu Institucional (Rodapé do site)', 'ascorsan' ),
    'rodape2' => __( 'Menu Áreas de lazer (Rodapé do site)', 'ascorsan' ),
    'rodape3' => __( 'Menu Notícias (Rodapé do site)', 'ascorsan' ),
    'rodape4' => __( 'Menu Convênios (Rodapé do site)', 'ascorsan' ),
) );


// Definir miniaturas dos posts
add_theme_support( 'post-thumbnails' );

// Tamanho whide para servir nos cards do google, true ele corta caso a imagem
// não seja no tamanho ideal
set_post_thumbnail_size(1500, 843, true);

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
	
function asc_video_cpt() {

	$labels = array(
		'name'                  => _x( 'Videos da Ascorsan', 'Videos da Ascorsan', 'ascorsan' ),
		'singular_name'         => _x( 'Video', 'Video', 'ascorsan' ),
		'menu_name'             => __( 'Videos', 'ascorsan' ),
		'name_admin_bar'        => __( 'Video', 'ascorsan' ),
		'archives'              => __( 'Videos', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todos os Videos', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Video', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Novo Video', 'ascorsan' ),
		'new_item'              => __( 'Novo Video', 'ascorsan' ),
		'edit_item'             => __( 'Editar Video', 'ascorsan' ),
		'update_item'           => __( 'Atualizar Video', 'ascorsan' ),
		'view_item'             => __( 'Ver Video', 'ascorsan' ),
		'view_items'            => __( 'Ver Videos', 'ascorsan' ),
		'search_items'          => __( 'Search Item', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir no Video', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para o Video', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Video', 'ascorsan' ),
		'description'           => __( 'Video da Ascorsan', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'), 
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 3,
        'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'exclude_from_search'   => false, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'video' ), // my custom slug
	);
	register_post_type( 'video', $args );

}
add_action( 'init', 'asc_video_cpt', 0 );

function asc_areas_de_lazer_cpt() {

	$labels = array(
		'name'                  => _x( 'Áreas de Lazer', 'Áreas de Lazer', 'ascorsan' ),
		'singular_name'         => _x( 'Área de Lazer', 'Áreas de Lazer', 'ascorsan' ),
		'menu_name'             => __( 'Áreas de Lazer', 'ascorsan' ),
		'name_admin_bar'        => __( 'Áreas de Lazer', 'ascorsan' ),
		'archives'              => __( 'Áreas de lazer', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todas as Áreas de Lazer', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Área de Lazer', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Nova Área de Lazer', 'ascorsan' ),
		'new_item'              => __( 'Nova Área de Lazer', 'ascorsan' ),
		'edit_item'             => __( 'Editar Área de Lazer', 'ascorsan' ),
		'update_item'           => __( 'Atualizar Área de Lazer', 'ascorsan' ),
		'view_item'             => __( 'Ver Área de Lazer', 'ascorsan' ),
		'view_items'            => __( 'Ver Áreas de Lazers', 'ascorsan' ),
		'search_items'          => __( 'Pesquisar', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir no Áreas de Lazer', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para o Áreas de Lazer', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Areas de Lazer', 'ascorsan' ),
		'description'           => __( 'Areas de Lazer', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail'), 
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'menu_icon'             => 'dashicons-admin-multisite',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'areas_de_lazer' ), // my custom slug
	);
	register_post_type( 'areas_de_lazer', $args );
	
}
add_action( 'init', 'asc_areas_de_lazer_cpt', 0 );

function asc_convenio_cpt() {

	$labels = array(
		'name'                  => _x( 'Convênios da Ascorsan', 'Convênios da Ascorsan', 'ascorsan' ),
		'singular_name'         => _x( 'Convênio', 'Convênio', 'ascorsan' ),
		'menu_name'             => __( 'Convênios', 'ascorsan' ),
		'name_admin_bar'        => __( 'Convênio', 'ascorsan' ),
		'archives'              => __( 'Convênios', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todos os Convênios', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Convênio', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Novo Convênio', 'ascorsan' ),
		'new_item'              => __( 'Novo Convênio', 'ascorsan' ),
		'edit_item'             => __( 'Editar Convênio', 'ascorsan' ),
		'update_item'           => __( 'Atualizar Convênio', 'ascorsan' ),
		'view_item'             => __( 'Ver Convênio', 'ascorsan' ),
		'view_items'            => __( 'Ver Convênios', 'ascorsan' ),
		'search_items'          => __( 'Search Item', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir no Convênio', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para o Convênio', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Convênio', 'ascorsan' ),
		'description'           => __( 'Convênio da Ascorsan', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail'), //'editor', 'excerpt' 
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'exclude_from_search'   => false, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'convenio' ), // my custom slug
	);
	register_post_type( 'convenio', $args );

}
add_action( 'init', 'asc_convenio_cpt', 0 );

function asc_banner_cpt() {

	$labels = array(
		'name'                  => _x( 'Banner da Ascorsan', 'Banner da Ascorsan', 'ascorsan' ),
		'singular_name'         => _x( 'Banner', 'Banner', 'ascorsan' ),
		'menu_name'             => __( 'Banner', 'ascorsan' ),
		'name_admin_bar'        => __( 'Banner', 'ascorsan' ),
		'archives'              => __( 'Banners', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todos os Banners', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Banner', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Novo Banner', 'ascorsan' ),
		'new_item'              => __( 'Novo Banner', 'ascorsan' ),
		'edit_item'             => __( 'Editar Banner', 'ascorsan' ),
		'update_item'           => __( 'Atualizar Banner', 'ascorsan' ),
		'view_item'             => __( 'Ver Banner', 'ascorsan' ),
		'view_items'            => __( 'Ver Banners', 'ascorsan' ),
		'search_items'          => __( 'Search Item', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir no Banner', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para o banner', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Banner', 'ascorsan' ),
		'description'           => __( 'Banner da Ascorsan', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title','thumbnail'), 
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'exclude_from_search'   => true, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'banner' ), // my custom slug
	);
	register_post_type( 'banner', $args );

}
add_action( 'init', 'asc_banner_cpt', 0 );

function asc_galeria_cpt() {

	$labels = array(
		'name'                  => _x( 'Galeria de fotos da Ascorsan', 'Galeria de fotos da Ascorsan', 'ascorsan' ),
		'singular_name'         => _x( 'Galeria de fotos', 'Galeria de fotos', 'ascorsan' ),
		'menu_name'             => __( 'Galeria de fotos', 'ascorsan' ),
		'name_admin_bar'        => __( 'Galeria de fotos', 'ascorsan' ),
		'archives'              => __( 'Galerias de fotos', 'ascorsan' ),
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
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'), // 'author'
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-camera',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'exclude_from_search'   => false, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'galeria' ), // my custom slug
	);
	register_post_type( 'galeria', $args );

}
add_action( 'init', 'asc_galeria_cpt', 0 );

function asc_aviso_cpt() {

	$labels = array(
		'name'                  => _x( 'Avisos do site', 'Avisos do site', 'ascorsan' ),
		'singular_name'         => _x( 'Aviso do site', 'Aviso do site', 'ascorsan' ),
		'menu_name'             => __( 'Avisos do site', 'ascorsan' ),
		'name_admin_bar'        => __( 'Avisos do site', 'ascorsan' ),
		'archives'              => __( 'Avisos do site', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todos os avisos', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Avisos do site', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Novo Aviso', 'ascorsan' ),
		'new_item'              => __( 'Nova aviso', 'ascorsan' ),
		'edit_item'             => __( 'Editar aviso', 'ascorsan' ),
		'update_item'           => __( 'Atualizar aviso', 'ascorsan' ),
		'view_item'             => __( 'Ver aviso', 'ascorsan' ),
		'view_items'            => __( 'Ver avisos', 'ascorsan' ),
		'search_items'          => __( 'Search Item', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir na aviso', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para a aviso', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Avisos do site', 'ascorsan' ),
		'description'           => __( 'Avisos aparecerão como pop up no site na pagina principal. Será necessário habilitar em personalização', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail'), // 'author'
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'aviso' ), // my custom slug
	);
	register_post_type( 'aviso', $args );
	
}
add_action( 'init', 'asc_aviso_cpt', 0 );

function asc_associado_cpt() {

	$labels = array(
		'name'                  => _x( 'Espaço do associado da Ascorsan', 'Espaço do associado da Ascorsan', 'ascorsan' ),
		'singular_name'         => _x( 'Espaço do associado', 'Espaço do associado', 'ascorsan' ),
		'menu_name'             => __( 'Espaço do associado', 'ascorsan' ),
		'name_admin_bar'        => __( 'Espaço do associado', 'ascorsan' ),
		'archives'              => __( 'Espaço do associado', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todos as Itens', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Espaço do associado', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Novo Item', 'ascorsan' ),
		'new_item'              => __( 'Nova Item', 'ascorsan' ),
		'edit_item'             => __( 'Editar Item', 'ascorsan' ),
		'update_item'           => __( 'Atualizar Item', 'ascorsan' ),
		'view_item'             => __( 'Ver Item', 'ascorsan' ),
		'view_items'            => __( 'Ver Itens', 'ascorsan' ),
		'search_items'          => __( 'Search Item', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir na Item', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para a Item', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Espaço do associado', 'ascorsan' ),
		'description'           => __( 'Espaço do associado da Ascorsan', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'), // 'author'
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'associado' ), // my custom slug
	);
	register_post_type( 'associado', $args );

}
add_action( 'init', 'asc_associado_cpt', 0 );

function asc_solidario_cpt() {

	$labels = array(
		'name'                  => _x( 'Portal Solidário da Ascorsan', 'Portal Solidário da Ascorsan', 'ascorsan' ),
		'singular_name'         => _x( 'Portal Solidário', 'Portal Solidário', 'ascorsan' ),
		'menu_name'             => __( 'Portal Solidário', 'ascorsan' ),
		'name_admin_bar'        => __( 'Portal Solidário', 'ascorsan' ),
		'archives'              => __( 'Portal Solidário', 'ascorsan' ),
		'attributes'            => __( 'Atributos', 'ascorsan' ),
		'all_items'             => __( 'Todos as Itens', 'ascorsan' ),
		'add_new_item'          => __( 'Adicionar Portal Solidário', 'ascorsan' ),
		'add_new'               => __( 'Adicionar Novo Item', 'ascorsan' ),
		'new_item'              => __( 'Nova Item', 'ascorsan' ),
		'edit_item'             => __( 'Editar Item', 'ascorsan' ),
		'update_item'           => __( 'Atualizar Item', 'ascorsan' ),
		'view_item'             => __( 'Ver Item', 'ascorsan' ),
		'view_items'            => __( 'Ver Itens', 'ascorsan' ),
		'search_items'          => __( 'Search Item', 'ascorsan' ),
		'not_found'             => __( 'Não encontrou', 'ascorsan' ),
		'not_found_in_trash'    => __( 'Não encontrou na lixeira', 'ascorsan' ),
		'featured_image'        => __( 'Imagem principal', 'ascorsan' ),
		'set_featured_image'    => __( 'Selecionar imagem principal', 'ascorsan' ),
		'remove_featured_image' => __( 'Remover imagem principal', 'ascorsan' ),
		'use_featured_image'    => __( 'Usar como imagem principal', 'ascorsan' ),
		'insert_into_item'      => __( 'Inserir na Item', 'ascorsan' ),
		'uploaded_to_this_item' => __( 'Subir para a Item', 'ascorsan' ),
		'items_list'            => __( 'Listar itens', 'ascorsan' ),
		'items_list_navigation' => __( 'Listar navegação de itens', 'ascorsan' ),
		'filter_items_list'     => __( 'Filtrar lista', 'ascorsan' ),
	);
	$args = array(
		'label'                 => __( 'Portal Solidário', 'ascorsan' ),
		'description'           => __( 'Portal Solidário da Ascorsan', 'ascorsan' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'), // 'author'
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 9,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false, //remove da busca do site
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'rewrite'     => array( 'slug' => 'solidario' ), // my custom slug
	);
	register_post_type( 'solidario', $args );

}
add_action( 'init', 'asc_solidario_cpt', 0 );

function wpb_custom_logo() {
	echo '
	<style type="text/css">
		#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
		background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/custom-logo.png) !important;
		background-position: 0 0;
		color:rgba(0, 0, 0, 0);
		}
		#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
		background-position: 0 0;
		}
	</style>
	';
	}
	add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

/**
* Galeria de imagens
*/
function pexeto_add_title_to_attachment( $markup, $id ){
	$att = get_post( $id );
	return str_replace('<a ', '<a title="'.$att->post_title.'" ', $markup);
}
add_filter('wp_get_attachment_link', 'pexeto_add_title_to_attachment', 10, 5);


// Pagination

function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;
 
    global $paged;
    if(empty($paged)) $paged = 1;
 
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Pag. ".$paged." de ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; Primeiro</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Anterior</a>";
 
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Proximo &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Último &raquo;</a>";
        echo "</div>\n";
    }
}

// Adicionando a função em manutenção

if ( get_theme_mod('manutencao') ){

	function wp_maintenance_mode() {
		if (!current_user_can('edit_themes') || !is_user_logged_in()) {
			wp_die("<h1>Estamos em manutenção no momento!</h1>
					<br />Caso tenha duvidas sobre este assunto entre em contato com 
					o <a href='mailto:contato@ascorsan.com.br'>Administrador do sistema</a>.<br /><br />
					". get_bloginfo('name') ." - ". get_bloginfo('description') ."
					");
		}
	}
	add_action('get_header', 'wp_maintenance_mode');
}