<?php get_header(); ?>
<div class="espaco"></div>
<div class="container">

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'associado',
        'posts_per_page' => 5,
        'paged' => $paged
    );

    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
        <h1>Espaço do Associado</h1>
        <hr>
        <?php if (get_theme_mod('link-banner-associado') != '') {
            if (get_theme_mod('img-banner-associado') != '') {
        ?>
                <style>
                    .img-banner img {
                        width: 100%;
                        height: auto;
                    }
                </style>
                <div class="img-banner">
                    <a href="<?php echo get_theme_mod('link-banner-associado'); ?>" target="_blank" >
                        <img src="<?php echo wp_get_attachment_url(get_theme_mod('img-banner-associado')); ?>" alt="Banner do associado">
                    </a>
                </div>
            <?php
            } else {
            ?>
                <div class="text-center">
                    <a href="<?php echo get_theme_mod('link-banner-associado'); ?>" target="_blank" class="btn btn-lg btn-primary">
                        <?php echo get_theme_mod('titulo-banner-associado', 'Acesse este link...'); ?>
                    </a>
                </div>
        <?php
            }
        } ?>
        <hr>
        <?php while ($the_query->have_posts()) :
            $the_query->the_post();  ?>

            <?php get_template_part('content_search', get_post_format());   ?>

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