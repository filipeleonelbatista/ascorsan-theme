<?php if(is_single() ) : ?>
<div class="container">
    <div class="col"> 
    

    <h1 class="mt-5 mb-4"><?php the_title(); ?> </h1>
    
    <p class="text-muted mt-4">
        <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
    </p> 

    <?php 
    $args = array(
        'numberposts' => -1, // Using -1 loads all posts
        'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager
        'order'=> 'ASC',
        'post_mime_type' => 'image', // Make sure it doesn't pull other resources, like videos
        'post_parent' => $post->ID, // Important part - ensures the associated images are loaded
        'post_status' => null,
        'post_type' => 'attachment'
    );
     
    $images = get_children( $args );
    
    
    if($images){ ?>
    <div id="slider">
        <?php foreach($images as $image){ ?>
        <img src="<?php echo $image->guid; ?>" alt="<?php echo $image->post_title; ?>" title="<?php echo $image->post_title; ?>" />
        <?php    } ?>
    </div>

    <?php } ?>

    </div>
</div>

<?php else : ?>

    <div class="col-sm-3">
        <div class="card mb-4 box-shadow">
          
        <?php the_post_thumbnail('post-thumbnail', array(
            'class' => 'card-img-top',
            'style' => 'height: 150px; width: 100%; display: block;',
        )); ?>

          <div class="card-body">            
            <a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
          </div>

            <div class="card-footer text-muted">
            <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
            </div>  
        </div>
      </div>

<?php endif ?>
