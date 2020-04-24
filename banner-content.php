<?php if (get_theme_mod("add-banner")) : ?>

    <?php

    $args = array(
        'post_type' => 'banner',
        'posts_per_page' => get_theme_mod("qtd-banner", "3")
    );
    $index = 1;
    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>

        <!-- Carrosel bootstrap -->
        <div id="carouselExampleControls" class="carousel slided" data-ride="carousel" data-interval="2500">
            <div class="carousel-inner">

                <?php
                while ($the_query->have_posts()) :
                    $the_query->the_post();  ?>
                        <?php if ($index == 1) : ?>
                            <div class="carousel-item active">
                        <?php else : ?>
                            <div class="carousel-item">
                        <?php endif; ?>

                        <a href="<?php echo get_field( "link_do_banner" ); ?>" target="_blank">
                            <div class="d-block w-100 h-50"
                                 style="
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
                        </a>
                    </div>

                        <?php $index = $index + 1;
                    endwhile; ?>
            <!-- Add Pagination -->

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
