
<section id="footer">
  <div class="container">
    <div class="row text-center text-xs-center text-sm-left text-md-left">
      
      <?php
        if ( has_nav_menu( 'rodape1' ) ) :      
      ?>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <h5 class='mb-0'>Ascorsan</h5>
        <!-- Div do menu ascorsan -->
        <?php        
            wp_nav_menu( array(
                'theme_location'    => 'rodape1',
                'depth'             => 1,
                'container'         => 'div',
                'container_class'   => 'ml-0 pt-0',
                'container_id'      => 'menu-ascorsan',
                'menu_class'        => 'list-unstyled quick-links',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
      <!-- Div do menu ascorsan -->
      </div>
      <?php
        endif;      
      ?>
      <?php
        if ( has_nav_menu( 'rodape2' ) ) :      
      ?>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <h5 class='mb-0'>Acesso rápido</h5>
        <!-- Div do menu ascorsan -->
        <?php        
            wp_nav_menu( array(
                'theme_location'    => 'rodape2',
                'depth'             => 1,
                'container'         => 'div',
                'container_class'   => 'ml-0 pt-0',
                'container_id'      => 'menu-ascorsan',
                'menu_class'        => 'list-unstyled quick-links',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
      <!-- Div do menu ascorsan -->
      </div>
      
      <?php
        endif;      
      ?>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <h5>Contato</h5>
        <ul class="list-unstyled quick-links">
          <li><a target="_blank" href="https://www.google.com.br/maps/place/Ascorsan/@-30.026686,-51.228485,17z/data=!3m1!4b1!4m5!3m4!1s0x9519790eb4a6dc67:0x83372a7a63600dc4!8m2!3d-30.0266907!4d-51.2262963"><i class="fas fa-map-marked-alt"></i>Av. Júlio de Castilhos, 51<br>9 Andar, Centro, Porto Alegre-RS</a target="_blank"></li>
          <li><a href="tel:(51) 3275.8088"><i class="fas fa-phone-alt"></i>(51) 3275.8088</a></li>
          <li><a href="tel:08000518088"><i class="fas fa-phone-alt"></i>0800 051 8088</a></li>
          <li><a href="https://www.facebook.com/AscCorsan/" target="_blank"><i class="fab fa-facebook"></i>AscCorsan</a></li>
          <li><a href="https://www.instagram.com/ascorsan/" target="_blank"><i class="fab fa-instagram"></i>ascorsan</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
        <ul class="list-unstyled list-inline social text-center">
          <li class="list-inline-item"><a href="https://www.facebook.com/AscCorsan/" target="_blank"><i class="fab fa-facebook"></i></a></li>
          <li class="list-inline-item"><a href="https://www.instagram.com/ascorsan/" target="_blank"><i class="fab fa-instagram"></i></a></li>
          <li class="list-inline-item"><a href="mailto:contato@ascorsan.com.br" target="_blank"><i class="fa fa-envelope"></i></a></li>
        </ul>
      </div>
      </hr>
    </div>	
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
        <p class="h6">&copy <?php echo get_bloginfo('name') ?> - <?php echo get_bloginfo('description') ?><br><br>
         <small>Desenvolvido por<a class="text-green ml-2" href="https://leonelinformatica.com.br" target="_blank">Leonel Informatica</a></small></p>
      </div>
      </hr>
    </div>	
  </div>
</section>
    

<?php wp_footer(); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js" ></script>
    <script src="<?php bloginfo('template_url'); ?>/js/popper.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.initialize.js"></script>
  </body>
</html>