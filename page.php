<?php get_header(); ?>

<div class="container">

<?php if( have_posts() ) : while( have_posts() ) : the_post(); 
      

        get_template_part('content', get_post_format());
    ?>

<?php endwhile;?>

<?php endif; ?>

</div>

<?php get_footer(); ?>