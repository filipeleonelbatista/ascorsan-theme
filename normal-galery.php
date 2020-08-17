<!-- Postagem Galeria -->
<?php get_template_part('seo'); ?>

<div class="container mb-4">
        <div class="col">
          <h1 class="mb-4"><?php the_title(); ?> </h1>
          <p class="text-muted mt-4">
            <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
          </p>
          <div class="col-sm-12">
            <p>
              
			<?php
				$teste = get_post_gallery(get_the_ID(), false);
				$ids_img_arr = preg_split ("/\,/", $teste['ids']); 
				
				$content = strip_shortcodes(get_the_content());
				$content = preg_replace("/<img[^>]+\>/i", "(image) ", $content);          
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]>', $content);
				echo $content; ?>
            </p>
          </div>

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
            <div class="carousel-inner text-center">
              <?php
              $index = 0;
              if ($gallery = get_post_gallery(get_the_ID(), false)) :
                // Loop through all the image and output them one by one.
                foreach ($gallery['src'] as $src) {
                  if ($index == 0) {
              ?>
                    <div class="carousel-item active">
                      <img style="height: 400px; width:auto; margin: auto;" src="<?php echo $src; ?>" alt="Galeria de imagens">
						<div class="carousel-caption d-none d-md-block">
							<?php 					  			
					  			$attachment_meta = wp_get_attachment($ids_img_arr[$index]);
								echo "<p>" . $attachment_meta['caption'] . "</p>";
							?>
						  </div>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="carousel-item">
                      <img style="height: 400px; width:auto; margin: auto;" src="<?php echo $src; ?>" alt="Galeria de imagens">
						<div class="carousel-caption d-none d-md-block">
							<?php 					  			
					  			$attachment_meta = wp_get_attachment($ids_img_arr[$index]);
								echo "<p>" . $attachment_meta['caption'] . "</p>";
							?>
						  </div>
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
                <div class="col-sm-2">
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