<?php if( is_page() ) : ?>

  <!-- Pagina normal -->
  <div class="container mb-4">
      <div class="col">
      <h1 class="mb-4"><?php the_title(); ?> </h1>
      
      <?php
                                
        if ( has_post_thumbnail() ) {
            the_post_thumbnail('post-thumbnail', array(
                'class' => 'img-fluid',
            )); 
        }
        else {
            echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                . '/img/default.png" />';
        }
        ?>      
          
      <p class="text-muted mt-4">
          <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
      </p>  
      
      
      <?php the_content(); ?>

      </div>
  </div>
  
<!-- FIM Pagina normal -->


<?php else : ?>
<!-- Se é single postagem ou se é galeria -->
  <?php if(is_single() ) : ?>

    <?php if( 'post' == get_post_type() ) : ?>
        <!-- Postagem normal -->
          <div class="container mb-4">
              <div class="col">
              <h1 class="mb-4"><?php the_title(); ?> </h1>                           
              <?php
                                
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('post-thumbnail', array(
                        'class' => 'img-fluid',
                    )); 
                }
                else {
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                        . '/img/default.png" />';
                }
                ?>
              
                  
              <p class="text-muted mt-4">
                  <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
              </p>  
              
              
              <?php the_content(); ?>

              </div>
          </div>
          
        <!-- FIM Postagem normal -->
      <?php else : ?>
        
        <!-- Postagem Galeria -->
        <div class="container mb-4">
            <div class="col">
              <h1 class="mb-4"><?php the_title(); ?> </h1>
              <p class="text-muted mt-4">
                  <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
              </p> 
              <div class="col-sm-12">
                <p>
                  <?php the_excerpt(); ?>
                </p>
              </div>

        <div id="carouselExampleIndicators" class="carousel slide shadow rounded" data-ride="carousel">
          <ol class="carousel-indicators">
          <?php 
              $index = 0;
                if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :
                  // Loop through all the image and output them one by one.
                  foreach ( $gallery['src'] AS $src ) {
                    if($index == 0){
                      ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>" class="active"></li>
                      <?php
                    }else{
                      ?>
                      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>"></li>
                      <?php
                    }
                    $index++;
                  }

                  else :
                  echo '<p> Não encontramos arquivos nesta galeria </p>';
                  
              endif;
            ?>
          </ol>
          <div class="carousel-inner">
            <?php 
              $index = 0;
                if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :
                  // Loop through all the image and output them one by one.
                  foreach ( $gallery['src'] AS $src ) {
                    if($index == 0){
                      ?>
                        <div class="carousel-item active">
                          <img class="d-block" height="450" width="100%" src="<?php echo $src; ?>" alt="Galeria de imagens">
                        </div>  
                      <?php
                    }else{
                      ?>
                      <div class="carousel-item">
                        <img class="d-block" height="350" width="100%" src="<?php echo $src; ?>" alt="Galeria de imagens">
                      </div>  
                      <?php
                    }
                    $index++;
                  }

                  else :
                  echo '<p> Não encontramos arquivos nesta galeria </p>';
                  
              endif;
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
          </a>
        </div>
            
        <div class="mt-5 row">
          <?php 
          
                $index = 0;
                if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :
                  // Loop through all the image and output them one by one.
                  foreach ( $gallery['src'] AS $src ) {                  
                    ?>
                    <div class="col-sm-3">
                      <a data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>">
                        <img class="img-thumbnail" src="<?php echo $src; ?>" alt="Itens da galeria">
                      </a> 
                    </div> 
                    <?php
                    $index++;
                    }
                  

                  else :
                  echo '<p> Não encontramos arquivos nesta galeria </p>';
                  
              endif;
            ?>
        </div>
        </div>
    </div>
    <!-- FIM Postagem Galeria -->
    <?php endif ?>

  <?php else : ?>
    
    <?php if( 'post' == get_post_type() ) : ?>
      <!-- Postagem normal -->
      <div class="col-sm-4">        
          <div class="card mb-4 box-shadow shadow">
          
          <?php                                
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('post-thumbnail', array(
                    'class' => 'card-img-top',
                    'style' => 'height: 255px; width: 100%; display: block;',
                )); 
            }
            else {
                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                    . '/img/default.png" class="card-img-top" style="height: 255px; width: 100%; display: block;" />';
            }
            ?>
            <div class="card-body">
            <a class='titulo-link' href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              <p class="card-text">
                  <?php the_excerpt(); ?>
              </p>
            </div>
              <div class="card-footer text-muted">
                <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
              </div>  
          </div>
        </div>
        <!-- FIM Postagem normal -->
        <?php else : ?>
        
        <!-- Postagem Galeria -->
        <div class="col-sm-3">
          <div class="card mb-4 box-shadow shadow">
          
          <?php                                
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('post-thumbnail', array(
                    'class' => 'card-img-top',
                    'style' => 'height: 150px; width: 100%; display: block;',
                )); 
            }
            else {
                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                    . '/img/default.png" class="card-img-top" style="height: 150px; width: 100%; display: block;"/>';
            }
            ?>

            <div class="card-body">            
              <a class='titulo-link' href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
            </div> 
          </div>
        </div>
        <!-- FIM Postagem Galeria -->

    <?php endif ?>
  <?php endif ?>
<!-- FIM Se é single postagem ou se é galeria -->

<?php endif ?>