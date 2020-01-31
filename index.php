<?php get_header(); ?>

<section id="content">
  <div class="container">
    <div class="col-sm-12">
      <h3>Notícias</h3>
      <hr>
      <div class="row">      
        <?php query_posts('category_name=noticias&posts_per_page=3'); ?>
        <?php if( have_posts() ) : while( have_posts() ) : the_post();  ?>        
            <?php get_template_part('content', get_post_format()); ?>
          <?php endwhile;?>        
        <?php else : ?>
        <div class="col-sm">
          <p class="lead"> Nenhuma publicação encontrada.</p>
        </div>
        <?php endif; ?>               
      </div>

      <div class="d-flex justify-content-between mb-2">
        <?php next_posts_link('Mais antigos'); ?>
        <?php previous_posts_link('Mais novas'); ?>
      </div>    
    </div>
  </div>
</section>

<section id="galeria-de-fotos">
  <div class="container">
    <div class="col-sm-12">
      <h3>Galeria de fotos</h3>
      <hr>
      <div class="row">
        <?php query_posts('category_name=galeria&posts_per_page=4'); ?>
        <?php if( have_posts() ) : while( have_posts() ) : the_post();  ?>
        <?php get_template_part('content-galery', get_post_format()); ?>
        <?php endwhile;?>
        <?php else : ?>
        <div class="col-sm">
          <p class="lead"> Nenhuma publicação encontrada.</p>
        </div>
        <?php endif; ?>
      </div>
      <div class="d-flex justify-content-between mb-5">
        <?php next_posts_link('Mais antigos'); ?>
        <?php previous_posts_link('Mais novas'); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
