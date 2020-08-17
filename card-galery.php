<!-- Postagem Galeria -->
<div class="col-sm mb-2">
  <div style="background-image: url(  
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail_url();
            } else {
              echo get_bloginfo('stylesheet_directory') . '/img/default.png';
            }
            ?>
          );          
          background-repeat: no-repeat;
          background-size: auto 100%;
          background-position: center;" class="image-grid-cover">
    <a class="cover-wrapper galeria-size" href="<?php the_permalink(); ?>">
      <b><?php
        echo substr(get_the_title(), 0, 10) . " ...";
        ?></b>
    </a>
  </div>
</div>
<!-- FIM Postagem Galeria -->