
<?php if (get_theme_mod("add-beneficio")) : ?>
  <div class="convenio-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 mb-4">

          <div class="text-center" style="margin: 15px 0;">
            <h2 style="color: #006c8a;">BENEFÍCIOS EXCLUSIVOS <BR> PARA ASSOCIADOS</h2>
            <?php if (get_theme_mod("add-btn-beneficio")) : ?>
              <a class="btn btn-lg btn-ascorsan-primary-outline" href="<?php echo get_theme_mod("link-beneficio"); ?>"><i class="far fa-handshake"></i><?php echo get_theme_mod("titulo-beneficio"); ?></a>
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

          <div class="row">
            <div class="col-sm-12 d-block" style="/*padding: 0 30px;*/">
            <a href="<?php echo get_post_type_archive_link('convenio'); ?>" class="btn btn-block btn-mobile btn-lg btn-ascorsan-primary-outline">CONFIRA MAIS BENEFÍCIOS AQUI<i class="fas fa-arrow-circle-right ml-4"></i></a>
            </div>
          </div>

          <?php
          //get_template_part('loop-convenios');
          ?>

        </div>
        <div class="col-sm-4 horario-atendimento">
          <div class="atendimento-conteudo atendimento-conteudo-mobile" style="margin: 15px 0;">

            <div class="text-center">
              <h2 class="text-white">Entre em contato <br>com a Ascorsan</h2>
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
                  <a class="link-convenio" href="https://api.whatsapp.com/send?phone=55<?php echo get_theme_mod('telefone3', '51 99289.7516'); ?>" target="_blank">
                    <i class="fab fa-whatsapp mr-2" style="color: #0cc243;"></i><?php echo get_theme_mod('telefone3', '51 99289.7516'); ?>
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

