<?php get_header(); ?>
<div class="container">

<?php
    $args = array(
        'post_type' => 'galeria',
        'posts_per_page' => -1,
        //'posts_per_page' => 4,
    );          
    
    $the_query = new WP_Query( $args );?>

<?php if( $the_query->have_posts() ) : 
            while( $the_query->have_posts() ) : 
                $the_query->the_post();  ?>
      
<?php get_template_part('content_search', get_post_format());   ?>

<?php endwhile;?>

<?php else :
    get_template_part('no_results');
    endif; ?>

</div>
<?php get_footer(); ?>
