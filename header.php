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
          <a href="#">
            <?php 
            
                $asc_custom_logo = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src( $asc_custom_logo, 'full');
                if(has_custom_logo()){
                    echo "<img src='".esc_url($logo[0])."' height='100' alt='Ascorsan'>";
                }else{
                    echo "<h1 class='ml-0'>" .get_bloginfo('name'). "</h1>";
                    echo "<p class='ml-0'>" .get_bloginfo('description'). "</p>";
                }

            ?>
          </a>
        </div>
        <div class="col-sm-4 d-flex justify-content-center">
          <div class="row mb-2 mt-2 d-flex align-items-center">          
            <!--<a href="#" class="btn btn-outline-light-ascorsan">Faça Login</a>-->
            <a href="#" class="btn btn-outline-light-ascorsan">Lojinha Ascorsan</a>
            <a class="v-divider"></a>
            <a href="https://www.instagram.com/ascorsan/"> <i class="fab fa-instagram fa-lg"></i></a>
            <a href="https://www.facebook.com/AscCorsan/"> <i class="fab fa-facebook fa-lg"></i> </a>          
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <button class="navbar-toggler btn-block" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <a class="navbar-brand" href="#">Menu principal</a>
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="institucional" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Institucional
          </a>
          <div class="dropdown-menu" aria-labelledby="institucional">
            <a class="dropdown-item" href="#">Diretoria</a>
            <a class="dropdown-item" href="#">História</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="noticias" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notícias
          </a>
          <div class="dropdown-menu" aria-labelledby="noticias">
            <a class="dropdown-item" href="#">Geral</a>
            <a class="dropdown-item" href="#">Lazer</a>
            <a class="dropdown-item" href="#">Institucional</a>
            <a class="dropdown-item" href="#">Pingo d' água</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="convenios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Convênios
          </a>
          <div class="dropdown-menu" aria-labelledby="convenios">
            <a class="dropdown-item" href="#">Cartão ascorsan</a>
            <a class="dropdown-item" href="#">Formulários</a>
            <a class="dropdown-item" href="#">Plano Odonto</a>
            <a class="dropdown-item" href="#">Saude</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="areas-de-lazer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Áreas de lazer
          </a>
          <div class="dropdown-menu" aria-labelledby="areas-de-lazer">
            <a class="dropdown-item" href="#">Sede social de Porto Alegre</a>
            <a class="dropdown-item" href="#">Marcelino Ramos</a>
            <a class="dropdown-item" href="#">Rosário do sul</a>
            <a class="dropdown-item" href="#">Hotel Cisne Branco</a>
            <a class="dropdown-item" href="#">Hospedaria da República</a>
          </div>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="#">Portal Solidário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contato</a>
        </li>
      </ul>
    </div>
  </nav>
</section>
<section id="search">
  <div class="search">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Busque aqui o que você procura">
      <div class="input-group-append">
        <button class="btn btn-ascorsan-search" type="button"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>
</section>