<?php

$args = array(
  'post_type' => 'convenio',
  'posts_per_page' => 3
);

$the_query = new WP_Query($args); ?>

<?php if ($the_query->have_posts()) : ?>

  <div class="container">
    <div class="linha-convenios">

      <?php
      while ($the_query->have_posts()) :
        $the_query->the_post();  ?>

        <a class="elemento-convenio" href="<?php the_permalink(); ?>">
          <img src="<?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail_url();
                    } else {
                      echo get_bloginfo('stylesheet_directory') . '/img/default.png';
                    }
                    ?>" height="100" width="100" class="img-convenio" alt="<?php the_title(); ?>">
          <p class="text-center mt-2" style="font-weight: bold; color: black;"><?php // the_title(); 
                                                                                ?></p>
        </a>

      <?php endwhile; ?>

    </div>
  </div>

<?php endif; ?>