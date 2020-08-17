<!-- Postagem normal -->
<div class="col-sm-4">
  <div class="card mb-4 box-shadow shadow">

    <a class='titulo-link' href="<?php the_permalink(); ?>">
      <div class="overlay">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail('post-thumbnail', array(
            'class' => 'card-img-top',
            'style' => 'height: auto; width: 100%; display: block;',
          ));
        } else {
          echo '<img src="' . get_bloginfo('stylesheet_directory')
            . '/img/default.png" class="card-img-top" style="height: auto; width: 100%; display: block;" />';
        }
        ?>
        <div class="text-block">
          <i class="far fa-play-circle"></i>
        </div>
      </div>
    </a>
    <div class="card-body">
      <a class='titulo-link' href="<?php the_permalink(); ?>">
        <h4><?php the_title(); ?></h4>
      </a>
      <p class="card-text">
        <?php

        $new_title = substr(get_the_excerpt(), 0, 150);

        if (strlen(get_the_excerpt()) > 150) {
          $new_title =  $new_title . " ...";
        }
        echo $new_title;
        ?>
      </p>
    </div>
    <div class="card-footer text-muted">
      <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
    </div>
  </div>
</div>
<!-- FIM Postagem normal -->