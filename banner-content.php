<?php if (get_theme_mod("add-banner")) : ?>

    <?php

    $args = array(
        'post_type' => 'banner',
        'posts_per_page' => get_theme_mod("qtd-banner", "3")
    );
    $index = 1;
    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>

        <div id="carouselExampleControls" class="carousel slided" data-ride="carousel" data-interval="<?php $tempo = (float)get_theme_mod('tempo-banner', '3') * 1000;
                                                                                                            echo $tempo; ?>">
            <div class="carousel-inner">
               
                <?php
                while ($the_query->have_posts()) :
                    $the_query->the_post();  ?>
                    <?php if ($index == 1) : ?>
                        <div class="carousel-item active">
                        <?php else : ?>
                            <div class="carousel-item">
                            <?php endif; ?>

                            <a href="<?php echo get_field("link_do_banner"); ?>" target="_self">
                                <img style="width:100%;" class="img-fluid" src="<?php
                                                        if (has_post_thumbnail()) {
                                                            the_post_thumbnail_url();
                                                        } else {
                                                            echo get_bloginfo('stylesheet_directory') . '/img/default.png';
                                                        }
                                                        ?>" alt="">
                            </a>
                            </div>

                        <?php $index = $index + 1;
                    endwhile; ?>


                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
            </div>

        <?php endif; ?>

    <?php endif; ?>