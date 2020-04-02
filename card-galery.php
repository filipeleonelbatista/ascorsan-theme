<!-- Postagem Galeria -->
<div class="col-sm-3">
          <div style="background-image: url(  
            <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail_url();
                  } else {
                    echo get_bloginfo('stylesheet_directory').'/img/default.png';
                  }
             ?>
          );          
          background-repeat: no-repeat;
          background-size: auto 100%;
          background-position: center;" 
          class="image-grid-cover">
            <a class="cover-wrapper"  href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
          </div>
        </div>
      <!-- FIM Postagem Galeria -->