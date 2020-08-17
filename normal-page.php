  <!-- Pagina normal -->
<?php get_template_part('seo'); ?>

  <div class="container mb-4">
    <div class="col">
      <h1 class="mb-4"><?php the_title(); ?> </h1>

      <?php

      if (has_post_thumbnail()) {
        the_post_thumbnail('post-thumbnail', array(
          'class' => 'img-fluid',
        ));
      } 
      // else {
      //   echo '<img src="' . get_bloginfo('stylesheet_directory')
      //     . '/img/default.png" />';
      // }
      ?>

      <p class="text-muted mt-4">
        <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
      </p>


      <?php the_content(); ?>

    </div>
  </div>

  <!-- FIM Pagina normal -->