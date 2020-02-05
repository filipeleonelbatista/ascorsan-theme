<?php if(is_single() ) : ?>

<div class="container mb-4">
    <div class="col">
    <h1 class="mb-4"><?php the_title(); ?> </h1>

    <?php the_post_thumbnail('post-thumbnail', array(
            'class' => 'img-fluid',
        )); ?>
    
        
    <p class="text-muted mt-4">
        <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
    </p>  
    
    
    <?php the_content(); ?>

    </div>
</div>

<?php else : ?>

    <div class="col-sm-4">        
        <div class="card mb-4 box-shadow shadow">
        <?php the_post_thumbnail('post-thumbnail', array(
            'class' => 'card-img-top',
            'style' => 'height: 225px; width: 100%; display: block;',
        )); ?>
          <div class="card-body">
          <a class='titulo-link' href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="card-text">
                <?php the_excerpt(); ?>
            </p>
          </div>
             <div class="card-footer text-muted">
               <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
             </div>  
        </div>
      </div>

<?php endif ?>
