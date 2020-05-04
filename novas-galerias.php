<?php get_template_part('seo'); ?>

<div class="col-sm-12">
    <a class='titulo-link' href=" <?php echo get_post_type_archive_link( 'galeria' ); ?> "><h3>Galeria de fotos</h3></a>
    <hr>
    <div class="row">
        <?php
            $args = array(
              'post_type' => 'galeria',
              'posts_per_page' => 4,
            );          
          
            $the_query = new WP_Query( $args );?>

        <?php 
            if( $the_query->have_posts() ) : 
                while( $the_query->have_posts() ) : 
                    $the_query->the_post();  ?>

        <?php 
            get_template_part('content', get_post_format()); ?>

        <?php endwhile;?>
        <?php else : ?>
            <div class="col-sm">
                <p class="lead"> Nenhuma publicação encontrada.</p>
            </div>
        <?php endif; ?>
    </div>
</div>