<!-- Postagem Convenio -->
<div class="container mb-4 mt-4">
        <div class="col">
          <div class="row d-flex align-items-end">
            <h1><?php the_title(); ?> </h1>
            <p class="text-muted ml-auto">
              <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
            </p>
          </div>
            <hr class="mt-auto">
          <div class="col-sm-12">
            <p>
              <?php the_excerpt(); ?>
            </p>
          </div>
          <h3>Fotos</h3>
            <hr class="mt-auto">
          <div id="carouselExampleIndicators" class="carousel slide shadow rounded" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php
              $index = 0;
              if ($gallery = get_post_gallery(get_the_ID(), false)) :
                // Loop through all the image and output them one by one.
                foreach ($gallery['src'] as $src) {
                  if ($index == 0) {
              ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>" class="active"></li>
                  <?php
                  } else {
                  ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>"></li>
              <?php
                  }
                  $index++;
                } else :
                echo '<p> Não encontramos arquivos nesta galeria </p>';

              endif;
              ?>
            </ol>
            <div class="carousel-inner">
              <?php
              $index = 0;
              if ($gallery = get_post_gallery(get_the_ID(), false)) :
                // Loop through all the image and output them one by one.
                foreach ($gallery['src'] as $src) {
                  if ($index == 0) {
              ?>
                    <div class="carousel-item active">
                      <img class="d-block" height="450" width="100%" src="<?php echo $src; ?>" alt="Galeria de imagens">
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="carousel-item">
                      <img class="d-block" height="350" width="100%" src="<?php echo $src; ?>" alt="Galeria de imagens">
                    </div>
              <?php
                  }
                  $index++;
                } else :
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
            if ($gallery = get_post_gallery(get_the_ID(), false)) :
              // Loop through all the image and output them one by one.
              foreach ($gallery['src'] as $src) {
            ?>
                <div class="col-sm-3">
                  <a data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>">
                    <img class="img-thumbnail" src="<?php echo $src; ?>" alt="Itens da galeria">
                  </a>
                </div>
            <?php
                $index++;
              } else :
              echo '<p> Não encontramos arquivos nesta galeria </p>';

            endif;
            ?>
          </div>
        </div>
      </div>
      <!-- FIM Postagem Galeria -->