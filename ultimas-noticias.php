<section id="content">
    <div class="container">

        <div class="row">
            <div class="col-sm-8">
                <a class='titulo-link' href=" <?php echo esc_url(get_category_link(get_cat_ID('Notícias'))); ?> ">
                    <h3 class="text-ascorsan-azul">Últimas notícias</h3>
                </a>
                <hr>
                <div class="row">

                    <?php

                    $args = array(
                        'post_type' => array('post', 'video'),
                        'posts_per_page' => 3
                    );

                    $the_query = new WP_Query($args); ?>

                    <?php if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) :
                            $the_query->the_post();  ?>
                            <?php
                            if (get_post_type() == "post"):
                            ?>
                                <?php get_template_part('card-post', get_post_format()); ?>
                            <?php endif; ?>
                            <?php
                            if (get_post_type() == "video"):
                            ?>
                                <?php get_template_part('card-video', get_post_format()); ?>
                            <?php endif; ?>
                            
                        <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-sm">
                        <p class="lead"> Nenhuma publicação encontrada.</p>
                    </div>
                </div>
            <?php endif; ?>
            </div>
            <div class="col-sm-4">
                <a class='titulo-link' href=" <?php echo get_post_type_archive_link('galeria'); ?> ">
                    <h3 class="text-ascorsan-azul">Galeria de fotos</h3>
                </a>
                <hr>
                <div class="row-galeria">
                    <?php
                    $args2 = array(
                        'post_type' => 'galeria',
                        'posts_per_page' => 4
                    );

                    $the_query2 = new WP_Query($args2); ?>

                    <?php if ($the_query2->have_posts()) :
                        while ($the_query2->have_posts()) :
                            $the_query2->the_post();  ?>

                            <?php get_template_part('card-galery', get_post_format()); ?>

                        <?php endwhile; ?>
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

    </div>
</section>