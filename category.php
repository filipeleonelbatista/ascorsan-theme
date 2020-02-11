<?php get_header(); ?>
<div class="container">
 
<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>
 
<header class="archive-header">
<h1 class="archive-title"><?php single_cat_title( '', false ); ?></h1>
 
 <?php
// Display optional category description
 if ( category_description() ) : ?>
<div class="archive-meta">
    <h3><?php echo category_description(); ?></h3>
</div>
<hr>
<?php endif; ?>
</header>
 
<?php
 
// The Loop
while ( have_posts() ) : the_post(); ?>


<div class="col-sm-12 mb-3">
        <div class="row d-flex align-items-center">
            <div class="col-sm-4">
                <?php the_post_thumbnail('post-thumbnail', array(
                    'class' => 'img-thumbnail',
                    'style' => 'height: 170px; width: 100%; display: block;',
                )); ?>
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
 
<?php endwhile; ?>
 

<?php else :
    get_template_part('no_results');
    endif; ?>

<?php get_template_part('ultimas-noticias'); ?>

</div>
<?php get_footer(); ?>
