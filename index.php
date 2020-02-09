<?php get_header(); ?>

<section id="content">
  <div class="container">
    <div class="col-sm-12">
    <a class='titulo-link' href=" <?php echo esc_url( get_category_link( get_cat_ID( 'Notícias' ) ) ); ?> "><h3>Notícias</h3></a>
      <hr>
      <div class="row">      
        
        <?php if( have_posts() ) : while( have_posts() ) : the_post();  ?>        
            <?php get_template_part('content', get_post_format()); ?>
          <?php endwhile;?>        
        <?php else : ?>
        <div class="col-sm">
          <p class="lead"> Nenhuma publicação encontrada.</p>
        </div>
        <?php endif; ?>               
      </div>

      <div class="d-flex justify-content-between mb-2">
        <?php next_posts_link('Mais antigos'); ?>
        <?php previous_posts_link('Mais novas'); ?>
      </div>    
    </div>
  </div>
</section>

<section id="galeria-de-fotos">
  <div class="container">
    <div class="col-sm-12">
    <a class='titulo-link' href=" <?php echo get_post_type_archive_link( 'galeria' ); ?> "><h3>Galeria de fotos</h3></a>
      <hr>
      <div class="row">
          <?php
            $args = array(
              'post_type' => 'galeria',
              'posts_per_page' => 4
            );          
          
          $the_query = new WP_Query( $args );?>

        <?php if( $the_query->have_posts() ) : 
                  while( $the_query->have_posts() ) : 
                      $the_query->the_post();  ?>

        <?php get_template_part('content', get_post_format()); ?>

        <?php endwhile;?>


        <?php else : ?>
          <div class="col-sm">
            <p class="lead"> Nenhuma publicação encontrada.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
