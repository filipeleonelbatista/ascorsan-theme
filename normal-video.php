<!-- Fecha container herdado -->
  </div>
<!-- Fecha container herdado -->
  
  <div class="video-black">
    <div class="container">
        <div id="video-content" class="col-sm-12 text-center">
            <?php the_content(); ?>
        </div>
    </div>
  </div>

  <div class="container mb-4">
    <div class="col">
      <h1 class="mb-4"><?php the_title(); ?> </h1>
      <p class="text-muted mt-4">
        <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
      </p>
        <hr>        
        <p><?php the_excerpt(); ?></p>     
    </div>
  </div>

<!-- ABRE DIV herdado -->
  <div>
<!-- ABRE DIV herdado -->