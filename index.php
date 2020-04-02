<?php get_header(); ?>

<?php if (get_theme_mod("add-banner")) : ?>

  <?php

  $args = array(
    'post_type' => 'banner',
    'posts_per_page' => get_theme_mod("qtd-banner", "3")
  );

  $the_query = new WP_Query($args); ?>

  <?php if ($the_query->have_posts()) : ?>
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">

        <?php
        while ($the_query->have_posts()) :
          $the_query->the_post();  ?>

          <div class="swiper-slide">
            <img style="position: relative; width: 100%; " src="<?php
                                                                if (has_post_thumbnail()) {
                                                                  the_post_thumbnail_url();
                                                                } else {
                                                                  echo get_bloginfo('stylesheet_directory') . '/img/default.png';
                                                                }
                                                                ?>">

          </div>

        <?php endwhile; ?>


      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>

  <?php endif; ?>


<?php endif; ?>

<?php
if (has_nav_menu('beneficios')) :
?>
  <div class="convenio-area">
    <div class="container">
      <div class="text-center" style="margin: 15px 0px 35px 0;">
        <h1>Benefícios exclusivos ao associado</h1>
        <a class="btn btn-lg btn-primary" href="#">Associe-se</a>
      </div>
      <div class="row">
        <div class="col-sm-6">

            <!-- Div do menu ascorsan -->
            <?php
            wp_nav_menu(array(
              'theme_location'    => 'beneficios',
              'depth'             => 1,
              'container'         => 'div',
              'container_class'   => 'row',
              'container_id'      => 'menu-convenios',
              'menu_class'        => '',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => new WP_Bootstrap_Navwalker(),
            ));
            ?>

        </div>
        <div class="col-sm-6">

          <div class="text-center">
            <h5>Entre em contato com a ascorsan</h5>
            <p style="font-weight: bold;">
              Contato direto com a Ascorsan<br>
              (Seg. a Sex. das 8h às 12h e das 13h às 17h)
            </p>
          </div>
          <ul class="convenio-area-contato">

            <li>
              <a href="tel:<?php echo get_theme_mod('telefone', '(51) 3275.8088'); ?>" target="_blank">
                <i class="fas fa-phone-square-alt"></i><?php echo get_theme_mod('telefone', '(51) 3275.8088'); ?>
              </a>
            </li>
            <li>
              <a href="tel:<?php echo get_theme_mod('telefone2', '0800 051 8088'); ?>" target="_blank">
                <i class="fas fa-phone-square-alt"></i><?php echo get_theme_mod('telefone2', '0800 051 8088'); ?>
              </a>
            </li>
            <li>
              <a href="https://api.whatsapp.com/send?phone=55<?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?>" target="_blank">
                <i class="fab fa-whatsapp" style="color: #0cc243;"></i><?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?>
              </a>
            </li>
            <li>
              <a href="mailto:<?php echo get_theme_mod('email', 'contato@ascorsan.com.br'); ?>" target="_blank">
                <i class="fa fa-envelope"></i><?php echo get_theme_mod('email', 'ascorsan@ascorsan.com.br'); ?>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>

<?php
endif;
?>


<?php

$args = array(
  'post_type' => 'convenio',
  'posts_per_page' => 3
);

$the_query = new WP_Query($args); ?>

<?php if ($the_query->have_posts()) : ?>

  <div class="container" style="margin-top: 35px; margin-bottom: 35px;">
    <div class="text-center" style="margin: 35px 0;">
      <h3>Principais Convêniados</h3>
    </div>
    <div class="linha-convenios">

      <?php
      while ($the_query->have_posts()) :
        $the_query->the_post();  ?>

        <a class="elemento-convenio" href="<?php the_permalink(); ?>">
          <img src="<?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail_url();
                    } else {
                      echo get_bloginfo('stylesheet_directory') . '/img/default.png';
                    }
                    ?>" height="100" width="100" class="img-convenio" alt="<?php the_title(); ?>">
          <p class="text-center mt-2" style="font-weight: bold; color: black;"><?php the_title(); ?></p>
        </a>
        
      <?php endwhile; ?>

    </div>
  </div>

<?php endif; ?>

<section id="content"> 
<?php
    get_template_part('ultimas-noticias');
?>
</section>


<?php if (get_theme_mod("add-aviso")) : ?>
<script>
  window.onload = function(){
    setTimeout(function(){ document.getElementById('btn-modal').click(); }, 1000);
  }
</script>
<section id="modal-aviso">

  <button id="btn-modal" type="button" style="display: none;" data-toggle="modal" data-target="#aviso-modal">
    Aviso!
  </button>

    <div class="modal fade bd-example-modal-lg" id="aviso-modal" tabindex="-1" role="dialog" aria-labelledby="aviso-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title"><?php echo get_theme_mod("titulo-aviso", "Aviso!") ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php if (get_theme_mod("corpo-aviso")): ?>
              <p><?php echo get_theme_mod("corpo-aviso") ?></p>
            <?php endif; ?>
            <?php if (get_theme_mod("img-aviso")): ?>
              <?php echo "<img src='" . wp_get_attachment_url(get_theme_mod("img-aviso")) . "' class='img-fluid' >"; ?>
            <?php endif; ?>
          </div>
          <div class="modal-footer">          
            <?php 
              echo "<p><b>" . date("Y") . " &copy " . get_bloginfo('name') . "</b> - " . get_bloginfo('description') . "</p>";
              
            ?>
          </div>

        </div>
      </div>
    </div>

</section>

<?php endif; ?>

<?php get_footer(); ?>