<?php if(is_single() ) : ?>
<div class="container">
    <div class="col"> 
    

    <h1 class="mb-4"><?php the_title(); ?> </h1>
    
    <p class="text-muted mt-4">
        <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
    </p> 


    </div>
</div>

<?php else : ?>

    <div class="col-sm-3">
        <div class="card mb-4 box-shadow shadow">
          
        <?php the_post_thumbnail('post-thumbnail', array(
            'class' => 'card-img-top',
            'style' => 'height: 150px; width: 100%; display: block;',
        )); ?>

          <div class="card-body">            
            <a class='titulo-link' href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
          </div>

            <div class="card-footer text-muted">
            <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
            </div>  
        </div>
      </div>

<?php endif ?>
