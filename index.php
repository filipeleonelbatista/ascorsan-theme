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




<?php if(get_theme_mod("add-beneficio")): ?>
<div class="convenio-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">

        <div class="text-center" style="margin: 15px 0;">
          <h2 style="color: #006c8a;">BENEFÍCIOS EXCLUSIVOS <BR> PARA ASSOCIADOS</h2>
          <?php if(get_theme_mod("add-btn-beneficio")): ?>
            <a class="btn btn-lg btn btn-outline-secondary" href="<?php echo get_theme_mod("link-beneficio"); ?>"><i class="far fa-handshake"></i><?php echo get_theme_mod("titulo-beneficio"); ?></a> 
          <?php endif; ?>
        </div>

        <?php
        if (has_nav_menu('beneficios')) :
        ?>
          <!-- Div do menu ascorsan -->
          <?php
          wp_nav_menu(array(
            'theme_location'    => 'beneficios',
            'depth'             => 1,
            'container'         => 'div',
            'container_class'   => 'container',
            'container_id'      => 'menu-convenios',
            'menu_class'        => 'beneficio-list',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
          ));
          ?>

        <?php
        endif;
        ?>
 <?php
  get_template_part('loop-convenios');
  ?>

      </div>
      <div class="col-sm-4 horario-atendimento">
        <div class="atendimento-conteudo" style="margin: 15px 0;">          

          <div class="text-center">
            <h2>Entre em contato <br>com a ascorsan</h2>
            <p style="font-weight: bold;">
              (Seg. a Sex. das 8h às 12h e das 13h às 17h)
            </p>
          </div>
          <div class="text-center" style="padding: 0 15px; margin-top: 20px;">

            <div class="row">
              <div class="col-sm">
                <a class="link-convenio" href="tel:<?php echo get_theme_mod('telefone', '(51) 3275.8088'); ?>" target="_blank">
                  <i class="fas fa-phone-square-alt mr-2"></i><?php echo get_theme_mod('telefone', '(51) 3275.8088'); ?>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <a class="link-convenio" href="tel:<?php echo get_theme_mod('telefone2', '0800 051 8088'); ?>" target="_blank">
                  <i class="fas fa-phone-square-alt mr-2"></i><?php echo get_theme_mod('telefone2', '0800 051 8088'); ?>
                </a>
              </div>
            </div>

            <div class="divisor-convenio"></div>

            <div class="row">
              <div class="col-sm-12">
                <a class="link-convenio" href="https://api.whatsapp.com/send?phone=55<?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?>" target="_blank">
                  <i class="fab fa-whatsapp mr-2" style="color: #0cc243;"></i><?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?>
                </a>
              </div>
            </div>

            <div class="divisor-convenio"></div>

            <div class="row">
              <div class="col-sm-12">
                <a class="link-convenio-email" href="mailto:<?php echo get_theme_mod('email', 'contato@ascorsan.com.br'); ?>" target="_blank">
                  <i class="fa fa-envelope mr-2"></i><?php echo get_theme_mod('email', 'ascorsan@ascorsan.com.br'); ?>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
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
    window.onload = function() {
      setTimeout(function() {
        document.getElementById('btn-modal').click();
      }, 1000);
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
            <?php if (get_theme_mod("corpo-aviso")) : ?>
              <p><?php echo get_theme_mod("corpo-aviso") ?></p>
            <?php endif; ?>
            <?php if (get_theme_mod("img-aviso")) : ?>
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