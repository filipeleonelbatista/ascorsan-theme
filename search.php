<?php get_header();?>

<div class="container">
    <?php 
        if(is_search() ) : 
            $total_results = $wp_query->found_posts;
            if($total_results > 1){
                echo "<p class='lead'> Sua pesquisa retornou ".$total_results." resultados. </p>";
                echo "<hr>";
            }
            if($total_results == 1){
                echo "<p class='lead'> Sua pesquisa retornou ".$total_results." resultado. </p>";
                echo "<hr>";
            }
            
        endif;
        ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post();  ?>
      
<?php get_template_part('content_search', get_post_format());   ?>

<?php endwhile;?>

<?php else :
    get_template_part('no_results');
    endif; ?>


</div>

<?php get_footer(); ?>