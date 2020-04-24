<div class="espaco"></div>

<section id="footer">
  <div class="container">
    <div class="row text-center text-xs-center text-sm-left text-md-left">

      <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="col-sm pl-0 pr-0">

          <!-- Menu institucional -->
          <div class="row">
            <div class="col-sm pl-0 pr-0">


              <?php
              if (has_nav_menu('rodape1')) :
              ?>
                <div class="col-sm">
                  <h5 class='mb-0'>Institucional</h5>
                  <!-- Div do menu ascorsan -->
                  <?php
                  wp_nav_menu(array(
                    'theme_location'    => 'rodape1',
                    'depth'             => 1,
                    'container'         => 'div',
                    'container_class'   => 'ml-0 pt-0',
                    'container_id'      => 'menu-institucional',
                    'menu_class'        => 'list-unstyled quick-links',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                  ));
                  ?>
                  <!-- Div do menu ascorsan -->
                </div>
              <?php
              endif;
              ?>

            </div>
          </div>

          <!-- FIM Menu institucional -->

          <!-- Menu noticias -->
          <div class="row">
            <div class="col-sm pl-0 pr-0">

              <?php
              if (get_theme_mod('noticia-rodape-option') == 'true') :
              ?>

                <?php

                $args = array(
                  'post_type' => array('post', 'video'),
                  'posts_per_page' => 3
                );

                $the_query = new WP_Query($args); ?>

                <?php if ($the_query->have_posts()) : ?>
                  <div class="col-sm">
                    <h5 class='mb-0'>Notícias</h5>
                    <div class="ml-0 pt-0">
                      <ul class="list-unstyled quick-links">
                        <?php while ($the_query->have_posts()) :
                          $the_query->the_post();  ?>

                          <li>
                            <a class="nav-link" href="<?php the_permalink(); ?>">
                              <?php

                              $new_title = substr(get_the_title(), 0, 20);

                              if (strlen(get_the_title()) > 20) {
                                $new_title =  $new_title . " ...";
                              }
                              echo $new_title;
                              //the_title(); 
                              ?>
                            </a>
                          </li>

                        <?php endwhile; ?>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>

              <?php else : ?>


                <?php
                if (has_nav_menu('rodape3')) :
                ?>
                  <div class="col-sm">
                    <h5 class='mb-0'>Notícias</h5>
                    <!-- Div do menu ascorsan -->
                    <?php
                    wp_nav_menu(array(
                      'theme_location'    => 'rodape3',
                      'depth'             => 1,
                      'container'         => 'div',
                      'container_class'   => 'ml-0 pt-0',
                      'container_id'      => 'menu-noticias',
                      'menu_class'        => 'list-unstyled quick-links',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                    <!-- Div do menu ascorsan -->
                  </div>
                <?php endif; ?>


              <?php endif; ?>



            </div>
          </div>

          <!-- FIM Menu noticias -->


        </div>
      </div>

      <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="col-sm pl-0 pr-0">



          <!-- Menu Areas de lazer -->
          <div class="row">
            <div class="col-sm pl-0 pr-0">

              <?php
              if (get_theme_mod('area-rodape-option') == 'true') :
              ?>

                <?php

                $args = array(
                  'post_type' => array('areas_de_lazer'),
                  'posts_per_page' => 3
                );

                $the_query = new WP_Query($args); ?>

                <?php if ($the_query->have_posts()) : ?>
                  <div class="col-sm">
                    <h5 class='mb-0'>Áreas de lazer</h5>
                    <div class="ml-0 pt-0">
                      <ul class="list-unstyled quick-links">
                        <?php while ($the_query->have_posts()) :
                          $the_query->the_post();  ?>

                          <li>
                            <a href="<?php the_permalink(); ?>">
                              <?php

                              $new_title = substr(get_the_title(), 0, 20);

                              if (strlen(get_the_title()) > 20) {
                                $new_title =  $new_title . " ...";
                              }
                              echo $new_title;
                              //the_title(); 
                              ?>
                            </a>
                          </li>

                        <?php endwhile; ?>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>

              <?php else : ?>



                <?php
                if (has_nav_menu('rodape2')) :
                ?>
                  <div class="col-sm">
                    <h5 class='mb-0'>Áreas de lazer</h5>
                    <!-- Div do menu ascorsan -->
                    <?php
                    wp_nav_menu(array(
                      'theme_location'    => 'rodape2',
                      'depth'             => 1,
                      'container'         => 'div',
                      'container_class'   => 'ml-0 pt-0',
                      'container_id'      => 'menu-areas-lazer',
                      'menu_class'        => 'list-unstyled quick-links',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                    <!-- Div do menu ascorsan -->
                  </div>
                <?php
                endif;
                ?>



              <?php endif; ?>

            </div>
          </div>

          <!-- FIM Menu Areas de lazer -->

          <!-- Menu convenios -->
          <div class="row">
            <div class="col-sm pl-0 pr-0">

              <?php
              if (get_theme_mod('area-rodape-option') == 'true') :
              ?>

                <?php

                $args = array(
                  'post_type' => array('convenios'),
                  'posts_per_page' => 3
                );

                $the_query = new WP_Query($args); ?>

                <?php if ($the_query->have_posts()) : ?>

                  <div class="col-sm">
                    <h5 class='mb-0'>Convênios</h5>
                    <div class="ml-0 pt-0">
                      <ul class="list-unstyled quick-links">
                        <?php while ($the_query->have_posts()) :
                          $the_query->the_post();  ?>

                          <li>
                            <a href="<?php the_permalink(); ?>">
                              <?php

                              $new_title = substr(get_the_title(), 0, 20);

                              if (strlen(get_the_title()) > 20) {
                                $new_title =  $new_title . " ...";
                              }
                              echo $new_title;
                              //the_title(); 
                              ?>
                            </a>
                          </li>

                        <?php endwhile; ?>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>

              <?php else : ?>




                <?php
                if (has_nav_menu('rodape4')) :
                ?>
                  <div class="col-sm">
                    <h5 class='mb-0'>Convênios</h5>
                    <!-- Div do menu ascorsan -->
                    <?php
                    wp_nav_menu(array(
                      'theme_location'    => 'rodape4',
                      'depth'             => 1,
                      'container'         => 'div',
                      'container_class'   => 'ml-0 pt-0',
                      'container_id'      => 'menu-convenios',
                      'menu_class'        => 'list-unstyled quick-links',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                    <!-- Div do menu ascorsan -->
                  </div>
                <?php
                endif;
                ?>



              <?php endif; ?>

            </div>
          </div>

          <!-- FIM Menu convenios -->



        </div>
      </div>

      <div class="col-xs-12 col-sm-3 col-md-3">
        <h5 class='mb-0'>Redes Sociais</h5>
        <div class="ml-0 pt-0">
          <ul class="list-unstyled quick-links">
            <li><a href="https://www.facebook.com/<?php echo get_theme_mod('facebook', 'AscCorsan'); ?>/" target="_blank"><i class="fab fa-facebook"></i><?php echo get_theme_mod('facebook', 'AscCorsan'); ?></a></li>
            <li><a href="https://www.instagram.com/<?php echo get_theme_mod('instagram', 'ascorsan'); ?>/" target="_blank"><i class="fab fa-instagram"></i><?php echo get_theme_mod('instagram', 'ascorsan'); ?></a></li>
            <li><a href="https://api.whatsapp.com/send?phone=55<?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?>/" target="_blank"><i class="fab fa-whatsapp"></i><?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?></a></li>
            <li><a href="mailto:<?php echo get_theme_mod('email', 'ascorsan@ascorsan.com.br'); ?>" target="_blank"><i class="fa fa-envelope"></i><?php echo get_theme_mod('email', 'ascorsan@ascorsan.com.br'); ?></a></li>
          </ul>
          <!-- <ul class="list-unstyled list-inline social text-center">
            <li class="list-inline-item"><a href="https://www.facebook.com/<?php echo get_theme_mod('facebook', 'AscCorsan'); ?>/" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/<?php echo get_theme_mod('instagram', 'ascorsan'); ?>/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="mailto:<?php echo get_theme_mod('email', 'ascorsan@ascorsan.com.br'); ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
          </ul> -->

        </div>
      </div>

      <div class="col-xs-12 col-sm-3 col-md-3">
        <h5>Contato</h5>
        <ul class="list-unstyled quick-links">
          <li><a target="_blank" href="https://www.google.com.br/maps/place/Ascorsan/@-30.026686,-51.228485,17z/data=!3m1!4b1!4m5!3m4!1s0x9519790eb4a6dc67:0x83372a7a63600dc4!8m2!3d-30.0266907!4d-51.2262963">
              <i class="fas fa-map-marked-alt"></i>
              <?php echo get_theme_mod('endereco', 'Av. Júlio de Castilhos, 51<br>9 Andar, Centro, Porto Alegre-RS'); ?>
            </a target="_blank">
          </li>
          <li><a href="tel:<?php echo get_theme_mod('telefone', '(51) 3275.8088'); ?>"><i class="fas fa-phone-alt"></i><?php echo get_theme_mod('telefone', '(51) 3275.8088'); ?></a></li>
          <li><a href="tel:<?php echo get_theme_mod('telefone2', '0800 051 8088'); ?>"><i class="fas fa-phone-alt"></i><?php echo get_theme_mod('telefone2', '0800 051 8088'); ?></a></li>

        </ul>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
        <ul class="list-unstyled list-inline social text-center">
          <li class="list-inline-item"><a href="https://www.facebook.com/<?php echo get_theme_mod('facebook', 'AscCorsan'); ?>/" target="_blank"><i class="fab fa-facebook"></i></a></li>
          <li class="list-inline-item"><a href="https://www.instagram.com/<?php echo get_theme_mod('instagram', 'ascorsan'); ?>/" target="_blank"><i class="fab fa-instagram"></i></a></li>
          <li class="list-inline-item"><a href="mailto:<?php echo get_theme_mod('email', 'ascorsan@ascorsan.com.br'); ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
        </ul>
      </div>
      </hr>
    </div>	 -->
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
        <p class="h6"><?php echo date("Y"); ?> &copy <?php echo get_bloginfo('name') ?> - <?php echo get_bloginfo('description') ?><br><br>
          <small>Desenvolvido por<a class="text-green ml-2" href="https://leonelinformatica.com.br" target="_blank">Leonel Informatica</a></small></p>
      </div>
      </hr>
    </div>
  </div>
</section>


<?php wp_footer(); ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/popper.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.initialize.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.mask.min.js"></script>



<?php if (get_theme_mod("add-whatsapp")) : ?>
  <!-- WhatsHelp.io widget -->
  <script type="text/javascript">
    (function() {
      var options = {
        <?php if(get_theme_mod('exibir-phone')): ?>
        call: "<?php echo get_theme_mod('telefone', '(51) 3275.8088'); ?>", // Call phone number
        <?php endif;?>
        <?php if(get_theme_mod('exibir-facebook')): ?>
        facebook: "<?php echo get_theme_mod('facebook', 'AscCorsan'); ?>", // Facebook page ID
        <?php endif;?>
        <?php if(get_theme_mod('exibir-whatsapp')): ?>
        whatsapp: "<?php echo "+55" . get_theme_mod('whatsapp', '51 99289.7516'); ?>", // WhatsApp number 
        <?php endif;?>
        <?php if(get_theme_mod('exibir-email')): ?>
        email: "<?php echo get_theme_mod('email', 'ascorsan@ascorsan.com.br'); ?>", // Email
        <?php endif;?>
        greeting_message: "<?php echo get_theme_mod("mensagem-whatsapp"); ?>", // Text of greeting message
        call_to_action: "<?php echo get_theme_mod("mensagem-whatsapp"); ?>", // Call to action
        button_color: "<?php echo get_theme_mod("cor-whatsapp", "#c49d14"); ?>", // Color of button
        position: "<?php echo get_theme_mod("posicao-whatsapp", "right"); ?>", // Position may be 'right' or 'left'
        order: "facebook, whatsapp, telegram, sms, call, email" // Order of buttons
      };
      var proto = document.location.protocol,
        host = "whatshelp.io",
        url = proto + "//static." + host;
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = url + '/widget-send-button/js/init.js';
      s.onload = function() {
        WhWidgetSendButton.init(host, proto, options);
      };
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    })();
  </script>
  <!-- /WhatsHelp.io widget -->
<?php endif; ?>

</body>

</html>