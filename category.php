<?php get_header(); ?>
<div class="container">

 <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'paged' => $paged
    );          
    
    $the_query = new WP_Query( $args );?>

    <?php if( $the_query->have_posts() ) : ?>
        <h1>Notícias Ascorsan</h1>
        <hr>
           <?php while( $the_query->have_posts() ) : 
                $the_query->the_post();  ?>   

                <div class="col-sm-12 mb-3">
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-4">
                            <?php
                                
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('post-thumbnail', array(
                                        'class' => 'img-thumbnail',
                                        'style' => 'height: 170px; width: 100%; display: block;',
                                    )); 
                                }
                                else {
                                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
                                        . '/img/default.png" class="img-thumbnail" style ="height: 170px; width: 100%; display: block;" />';
                                }
                                ?>
                            </div>
                            <div class="col-sm-8">
                                <a href="<?php the_permalink(); ?>" class="titulo-link"><h3><?php the_title(); ?></h3></a>
                                <p><?php the_excerpt(); ?></p>
                                <div class="col-sm mb-2">                    
                                    <a href="<?php the_permalink(); ?>">Continue lendo</a>
                                </div>
                                <div class="mb-1 text-muted"><i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small></div>
                            </div>
                        </div>
                    </div>
 
            <?php endwhile; ?>
            <div class="row ml-3 mb-4">
                <?php if (function_exists("pagination")) {
                    pagination($the_query->max_num_pages);
                } ?>  
            </div> 
    <?php else :
        get_template_part('no_results');
    endif; ?>

<?php get_template_part('ultimas-noticias'); ?>

</div>
<?php get_footer(); ?>
