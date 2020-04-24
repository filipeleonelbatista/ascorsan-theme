<!-- Postagem Convenio -->
<div class="container mb-4">
  <div class="col">
    <h1 class="mb-4"><?php the_title(); ?></h1>
    <p class="text-muted mt-4">
      <i class="far fa-clock"></i><small>Publicado em: <?php echo get_the_date('d/m/Y'); ?> </small>
    </p>
    <div class="col-sm-12">
      <p>
        <?php the_content();
        //echo strip_shortcodes( get_the_content() ); 
        ?>
      </p>
      <div class="row mt-4">
        <div class="col-sm-12 text-center">
          <h3>Solicitação de reservas</h3>
          <p>Envie sua solicitação para a ascorsan para este local e aguarde a confirmação.</p>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-6">
          <form action="" method="POST">
            <div class="form-group">
              <label for="formGroupExampleInput">Nome completo</label>
              <input type="text" class="form-control" id="nome" placeholder="Nome completo">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Matrícula</label>
              <input type="number" class="form-control" id="matricula" placeholder="Digite sua matricula">
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="formGroupExampleInput">Telefone</label>
                  <input type="tel" id="telefone" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')" placeholder="(00) 0000-00000">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="formGroupExampleInput">Whatsapp</label>
                  <input type="tel" id="whatsapp" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')" placeholder="(00) 0000-00000">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput">E-mail</label>
              <input type="email" class="form-control" id="email" placeholder="Ex: associado@meuemail.com">
            </div>

            <div class="row">
              <div class="col">
                <h4>Indique sua data de preferência</h4>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="formGroupExampleInput">Data de entrada</label>
                  <input type="date" class="form-control" id="dtEntrada" placeholder="Data de entrada">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="formGroupExampleInput">Data de saída</label>
                  <input type="date" class="form-control" id="dtSaida" placeholder="Data de saída">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observações</label>
              <textarea class="form-control" id="observacoes" rows="3"></textarea>
            </div>

            <button type="button" onclick="enviar(1);" class="btn btn-success mb-2">Solicitar via Whatsapp <i class="fab fa-whatsapp"></i></button>
            <button type="button" onclick="enviar(2);" class="btn btn-primary mb-2">Solicitar via Email <i class="far fa-envelope"></i></button>

          </form>
          <script>
            function enviar(op) {
              var form = {
                nome: document.getElementById("nome").value,
                idSocio: document.getElementById("idSocio").value,
                telefone: document.getElementById("telefone").value,
                whatsapp: document.getElementById("whatsapp").value,
                reserva: document.getElementById("reserva").value,
                observacao: document.getElementById("observacoes").value,
              }
              if (op == 1) {
                msg = "Olá, Sou " + form.nome + ", Numero de associado: " + form.idSocio + " e gostaria de fazer a reserva aqui em <?php the_title(); ?>. Gostaria de reservar a opção de " + form.reserva + ". Observações: " + form.observacao
                url = "https://api.whatsapp.com/send?phone=55<?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?>&text=" + encodeURI(msg)

                window.open(url, "_blank")
                op = 2
              }
              if (op == 2) {

              }

            }
          </script>

        </div>
        <div class="col-sm-6 mapa-areas-de-lazer">
          <?php echo get_field("link_do_mapa"); ?>
        </div>
      </div>
    </div>


    <div class="col-sm-12">
      <h2>Galeria de imagens</h2>
      <hr>
    </div>
    <div class="col-sm-12">
      <div id="carouselExampleIndicators" class="carousel slide shadow rounded" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php
          $index = 0;
          if ($gallery = get_post_gallery(get_the_ID(), false)) :
            // Loop through all the image and output them one by one.
            foreach ($gallery['src'] as $src) {
              if ($index == 0) {
          ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>" class="active"></li>
              <?php
              } else {
              ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>"></li>
          <?php
              }
              $index++;
            } else :
            echo '<p> Não encontramos arquivos nesta galeria </p>';

          endif;
          ?>
        </ol>
        <div class="carousel-inner">
          <?php
          $index = 0;
          if ($gallery = get_post_gallery(get_the_ID(), false)) :
            // Loop through all the image and output them one by one.
            foreach ($gallery['src'] as $src) {
              if ($index == 0) {
          ?>
                <div class="carousel-item active">
                  <img class="d-block" height="450" width="100%" src="<?php echo $src; ?>" alt="Galeria de imagens">
                </div>
              <?php
              } else {
              ?>
                <div class="carousel-item">
                  <img class="d-block" height="350" width="100%" src="<?php echo $src; ?>" alt="Galeria de imagens">
                </div>
          <?php
              }
              $index++;
            } else :
            echo '<p> Não encontramos arquivos nesta galeria </p>';

          endif;
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>

      <div class="mt-5 row">
        <?php

        $index = 0;
        if ($gallery = get_post_gallery(get_the_ID(), false)) :
          // Loop through all the image and output them one by one.
          foreach ($gallery['src'] as $src) {
        ?>
            <div class="col-sm-3">
              <a data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index ?>">
                <img class="img-thumbnail" src="<?php echo $src; ?>" alt="Itens da galeria">
              </a>
            </div>
        <?php
            $index++;
          } else :
          echo '<p> Não encontramos arquivos nesta galeria </p>';

        endif;
        ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM Postagem Galeria -->