<?php if(!is_single() ) : ?>

    <div class="col-sm-12 mb-3">
        <div class="row d-flex align-items-center">
            <div class="col-sm-4">

            <div class="moldura">
                <div style="
                        background-color: #fff;
                        height: 100%;
                        width: 100%;
                        background-image: url('<?php
                                if (has_post_thumbnail()) {
                                the_post_thumbnail_url();
                                } else {
                                echo get_bloginfo('stylesheet_directory') . '/img/default.png';
                                }
                                ?>');
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        position: relative;">

                </div>
            </div>
                
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


<?php endif ?>




