<?php get_header(); ?>

<section id="content">
  <div class="container">
    <div class="col-sm-12">
    <a class='titulo-link' href=" <?php echo esc_url( get_category_link( get_cat_ID( 'Notícias' ) ) ); ?> "><h3>Notícias</h3></a>
      <hr>
      <div class="row">      
        
      <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'paged' => $paged
            );          
          
          $the_query = new WP_Query( $args );?>

        <?php if( $the_query->have_posts() ) : 
                  while( $the_query->have_posts() ) : 
                      $the_query->the_post();  ?>       
            <?php get_template_part('content', get_post_format()); ?>
          <?php endwhile;?>
        </div>
        <div class="row ml-3">
          <?php if (function_exists("pagination")) {
            pagination($the_query->max_num_pages);
          } ?>  
        </div> 

        <?php else : ?>
          <div class="row">
            <div class="col-sm">
              <p class="lead"> Nenhuma publicação encontrada.</p>
            </div>
          </div>
        <?php endif; ?>  
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
            $paged2 = ( get_query_var( 'paged2' ) ) ? get_query_var( 'paged2' ) : 1;
            $args = array(
              'post_type' => 'galeria',
              'posts_per_page' => 4,
              'paged' => $paged2
            );          
          
          $the_query2 = new WP_Query( $args );?>

        <?php if( $the_query2->have_posts() ) : 
                  while( $the_query2->have_posts() ) : 
                      $the_query2->the_post();  ?>

        <?php get_template_part('content', get_post_format()); ?>

        <?php endwhile;?>
        </div>
        <div class="row ml-3">
          <?php if (function_exists("pagination")) {
            pagination($the_query2->max_num_pages);
          } ?>  
        </div> 

        <?php else : ?>
          <div class="row">
            <div class="col-sm">
              <p class="lead"> Nenhuma publicação encontrada.</p>
            </div>
          </div>
        <?php endif; ?>
      
    </div>
  </div>
</section>

<?php get_footer(); ?>
