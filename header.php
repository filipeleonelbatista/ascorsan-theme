<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link href="./img/favicon.png" rel="icon" type="image/x-icon" />

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/magnific-popup.css">
    <?php wp_head(); ?>
  </head>
  <body> 


<section id="header">
  <div class="header">
    <div class="col-sm-12">
      <div class="row d-flex align-items-center">
        <div class="col-sm-4">
  
        </div>
        <div class="col-sm-4 d-flex justify-content-center">        
          <a href="<?php echo get_home_url(); ?>">
            <?php 
            
                $asc_custom_logo = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src( $asc_custom_logo, 'full');
                if(has_custom_logo()){
                    echo "<img src='".esc_url($logo[0])."' height='100' alt='Ascorsan'>";
                }else{
                    echo "<h1 class='text-center'>" .get_bloginfo('name'). "</h1>";
                    echo "<p class='text-center'>" .get_bloginfo('description'). "</p>";
                }

            ?>
          </a>
        </div>
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="row mb-2 mt-2 d-flex align-items-center">          
            <!--<a href="#" class="btn btn-outline-light-ascorsan">Faça Login</a>-->
            <a target="_blank" href="<?php echo get_theme_mod('link','#'); ?>" class="btn btn-outline-light-ascorsan"><?php echo get_theme_mod('titulolink','Lojinha Ascorsan'); ?></a>
            <a class="v-divider"></a>
            <a target="_blank" href="https://www.instagram.com/<?php echo get_theme_mod('facebook','AscCorsan'); ?>/"> <i class="fab fa-instagram fa-lg"></i></a>
            <a target="_blank" href="https://www.facebook.com/<?php echo get_theme_mod('instagram','ascorsan'); ?>/"> <i class="fab fa-facebook fa-lg"></i> </a>          
            
          </div>
        </div>
      </div>
    </div>
  </div>


 
      <?php
        if ( has_nav_menu( 'topo' ) ) :      
      ?>
  <nav class="navbar navbar-dark bg-primary navbar-expand-lg" role="navigation">
    <button class="navbar-toggler btn-block" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <a class="navbar-brand" href="#">Menu principal</a>
        <span class="navbar-toggler-icon"></span>
    </button>

        <?php
        wp_nav_menu( array(
            'theme_location'    => 'topo',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'conteudoNavbarSuportado',
            'menu_class'        => 'navbar-nav mr-auto',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
      <?php if (get_theme_mod('contato-ativo')) : ?>
      
      <?php endif ?>
</nav>
<?php
    endif;      
  ?>
</section>


<?php get_sidebar(); ?>