<?php get_header();?>
<div class="espaco"></div>

<div class="container">

    <?php                      
        $search = get_search_query();
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'paged' => $paged,
            's' => $search,
        );         

        $the_query = new WP_Query( $args );

        $total_results =   $the_query->found_posts;
        if($total_results > 1){
            echo "<p class='lead'> Sua pesquisa retornou ".$total_results." resultados. </p>";
            echo "<hr>";
        }
        if($total_results == 1){
            echo "<p class='lead'> Sua pesquisa retornou ".$total_results." resultado. </p>";
            echo "<hr>";
        }
        ?>
        <?php if( $the_query->have_posts() ) : 
                while( $the_query->have_posts() ) : 
                    $the_query->the_post();  ?>   
                
                    <?php get_template_part('content_search', get_post_format());   ?>

                <?php endwhile;?>
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