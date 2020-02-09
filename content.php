<?php if(is_single() ) : ?>

  <?php if( 'post' == get_post_type() ) : ?>
      <!-- Postagem normal -->
        <div class="container mb-4">
            <div class="col">
            <h1 class="mb-4"><?php the_title(); ?> </h1>
            
            <?php the_post_thumbnail('post-thumbnail', array(
                    'class' => 'img-fluid',
                )); ?>
            
                
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
            
            

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <?php the_post_thumbnail('post-thumbnail', array(
                        'class' => 'd-block w-100',
                    )); ?>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="..." alt="Second slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
                
             
            
            
            <?php the_content(); ?>

            </div>
        </div>
       <!-- FIM Postagem Galeria -->

  <?php endif ?>

<?php else : ?>
  
  <?php if( 'post' == get_post_type() ) : ?>
    <!-- Postagem normal -->
    <div class="col-sm-4">        
        <div class="card mb-4 box-shadow shadow">
        <?php the_post_thumbnail('post-thumbnail', array(
            'class' => 'card-img-top',
            'style' => 'height: 225px; width: 100%; display: block;',
        )); ?>
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
          
        <?php the_post_thumbnail('post-thumbnail', array(
            'class' => 'card-img-top',
            'style' => 'height: 150px; width: 100%; display: block;',
        )); ?>

          <div class="card-body">            
            <a class='titulo-link' href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
          </div> 
        </div>
      </div>
       <!-- FIM Postagem Galeria -->

  <?php endif ?>
<?php endif ?>
