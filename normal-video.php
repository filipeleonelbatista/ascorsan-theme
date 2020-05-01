<!-- Fecha container herdado -->
</div>
<!-- Fecha container herdado -->

<div class="video-black  mb-4">
  <div class="container">
    <div id="video-content" class="col-sm-12 text-center">
      <?php
      $media = get_media_embedded_in_content(apply_filters('the_content', get_the_content()), 'video');
      print_r($media[0]);
      ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">

  </div>
</div>
<div class="container mb-4">
  <div class="col">
    <h1 class="mb-4"><?php the_title(); ?> </h1>
    <p class="text-muted mt-4">
      <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
    </p>
    <hr>
    <style>
      div#content-without-video div.wp-video{
        display:none;
      }
    </style>
    <div id="content-without-video">
      <?php the_content();?>
    </div>

  </div>
</div>

<!-- ABRE DIV herdado -->
<div>
  <!-- ABRE DIV herdado -->