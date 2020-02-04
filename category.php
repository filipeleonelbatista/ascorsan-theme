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


<div class="row mb-3 p-3 shadow">
    <div class="col-sm-4">
        <a href="<?php the_permalink() ?>">
         <?php the_post_thumbnail('post-thumbnail', array(
                'class' => 'img-fluid',
                'style' => 'height: 170px; width: 100%; display: block;',
            )); ?>
        </a>
    </div>
    <div class="col-sm-8">
        <h2><a class="titulo-link" href="<?php the_permalink() ?>" 
            rel="bookmark" 
            title="Link para <?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> <i class="far fa-clock"></i> </small>
        
        <div class="entry">
            <?php the_excerpt(); ?>
        
        
            <div class="col-sm mb-2">                    
                <a href="<?php the_permalink(); ?>">Continue lendo</a>
            </div>
        </div>
    </div>
</div>
 
<?php endwhile; ?>
 

<?php else :
    get_template_part('no_results');
    endif; ?>


</div>
<?php get_footer(); ?>
