<?php

/*

Template Name: Todas as notícias

*/

?>


<?php get_header(); ?>
<div class="espaco"></div>
<div class="container">
    <h1>Todas as notícias</h1>
    <hr>

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => array('post', 'video'),
        'posts_per_page' => 5,
        'paged' => $paged
    );

    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) :
        while ($the_query->have_posts()) :
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

<?php
  get_template_part('ultimas-noticias');
  ?>

</div>
<?php get_footer(); ?>