<?php
//response generation function
$response = "";

//function to generate response
function my_contact_form_generate_response($type, $message)
{

    global $response;

    if ($type == "success") $response = "<div class='alert alert-success'>{$message}</div>";
    else $response = "<div class='alert alert-danger'>{$message}</div>";
}


//response messages
$missing_content = "Por favor complete todos os campos.";
$invalid_to = "Sem rementente, tente mais tarde!.";
$email_invalid   = "Endereço de email inválido.";
$message_unsent  = "Não foi possivel enviar, tente novamente.";
$message_sent    = "Obrigado! Sua mensagem foi enviada com sucesso.";

//user posted variables
$local = $_POST['local-area'];
$nome = $_POST['nome-area'];
$matricula = $_POST['matricula-area'];
$phone = $_POST['phone-area'];
$whats = $_POST['whats-area'];
$email = $_POST['email-area'];
$dt_entrada = $_POST['dt-entrada-area'];
$dt_saida = $_POST['dt-saida-area'];
$observacoes = $_POST['observacoes-area'];

$message = "<b>Solicitação de reserva da àrea ". $local ."</b>\n";
$message .= "<hr>\n";
$message .= "<b>Nome: </b>" . $nome . "\n";
$message .= "<b>Matricula: </b>" . $matricula . "\n";
$message .= "<b>Telefone: </b>" . $phone . "\n";
$message .= "<b>Whatsapp: </b>" . $whats . "\n";
$message .= "<b>E-mail: </b>" . $email . "\n\n";
$message .= "<b>Data de entrada: </b>" . date('d/m/Y', strtotime($dt_entrada)) . "\n";
$message .= "<b>Data de saída: </b>" . date('d/m/Y', strtotime($dt_saida)) . "\n";
$message .= "<b>Observações: </b>" . $observacoes . "\n";
$message .= "<hr>\n";
$message .= "Email enviado pelo formulário Àreas de lazer da Ascorsan\n";


//php mailer variables
$to = get_theme_mod('email-area');
$subject = "Solicitação de reserva para o local " . $local;
$headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

if ($_POST) {

    if ($to == '')
        my_contact_form_generate_response("error", $invalid_to);
    //validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
    else //email is valid
    {
        //validate presence of name and message
        if (empty($nome) || empty($message)) {
            my_contact_form_generate_response("error", $missing_content);
        } else //ready to go!
        {
            $sent = wp_mail($to, $subject, strip_tags($message), $headers);

            if ($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
            else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
    }
}

?>

<!-- Postagem Convenio -->
<div class="container mb-4">
  
<?php echo $response; ?>

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
        <div class="espaco"></div>
        <div class="col-sm-12 text-center">
          <h3>Solicitação de reservas</h3>
          <p>Envie sua solicitação para a ascorsan para este local e aguarde a confirmação.</p>
          
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-6">
          <form action="" method="post">
            <input type="hidden" name="local-area" value="<?php the_title(); ?>">
            <div class="form-group">
              <label for="formGroupExampleInput">Nome completo</label>
              <input type="text" class="form-control" id="nome" name="nome-area" value="<?php echo esc_attr($_POST['nome-area']); ?>" placeholder="Nome completo">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Matrícula</label>
              <input type="number" class="form-control" id="matricula" name="matricula-area" value="<?php echo esc_attr($_POST['matricula-area']); ?>" placeholder="Digite sua matricula">
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="formGroupExampleInput">Telefone</label>
                  <input type="tel" id="telefone" class="form-control" name="phone-area" value="<?php echo esc_attr($_POST['phone-area']); ?>" onkeypress="$(this).mask('(00) 0000-00009')" placeholder="(00) 0000-00000">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="formGroupExampleInput">Whatsapp</label>
                  <input type="tel" id="whatsapp" class="form-control" name="whats-area" value="<?php echo esc_attr($_POST['whats-area']); ?>" onkeypress="$(this).mask('(00) 0000-00009')" placeholder="(00) 0000-00000">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput">E-mail</label>
              <input type="email" class="form-control" id="email" name="email-area" value="<?php echo esc_attr($_POST['email-area']); ?>" placeholder="Ex: associado@meuemail.com">
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
                  <input type="date" class="form-control" id="dtEntrada" name="dt-entrada-area" value="<?php echo esc_attr($_POST['dt-entrada-area']); ?>" placeholder="Data de entrada">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="formGroupExampleInput">Data de saída</label>
                  <input type="date" class="form-control" id="dtSaida" name="dt-saida-area" value="<?php echo esc_attr($_POST['dt-saida-area']); ?>" placeholder="Data de saída">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observações</label>
              <textarea class="form-control" id="observacoes" name="observacoes-area" value="<?php echo esc_attr($_POST['observacoes-area']); ?>" rows="3"></textarea>
            </div>

            <button type="button" onclick="enviar(2);" class="btn btn-success mb-2">Solicitar via Whatsapp <i class="fab fa-whatsapp"></i></button>
            <button type="submit" class="btn btn-primary mb-2">Solicitar via Email <i class="far fa-envelope"></i></button>

          </form>
          <script>
            function enviar(op) {
              var form = {
                nome: document.getElementById("nome").value,
                matricula: document.getElementById("matricula").value,
                telefone: document.getElementById("telefone").value,
                whatsapp: document.getElementById("whatsapp").value,
                email: document.getElementById("email").value,
                dtEntrada: document.getElementById("dtEntrada").value,
                dtSaida: document.getElementById("dtSaida").value,
                observacao: document.getElementById("observacoes").value,
              }

              msg = "Olá, Sou " + form.nome + ", Matricula: " + form.matricula + " e gostaria de fazer a reserva aqui em <?php the_title(); ?> entre os dias " + form.dtEntrada + " e "+ form.dtSaida +". Observações: " + form.observacao

              if (op == 1) {
                url = "https://api.whatsapp.com/send?phone=55<?php echo get_theme_mod('whatsapp', '51 99289.7516'); ?>&text=" + encodeURI(msg)

                window.open(url, "_blank")
                op = 2
              }
              if (op == 2) {
                Email.send({
                  Host: "smtp.yourisp.com",
                  Username: "username",
                  Password: "password",
                  To: 'them@website.com',
                  From: document.getElementById("email").value,
                  Subject: "Solicitação de reserva para <?php the_title(); ?>",
                  Body: msg
                }).then(
                  message => alert(message)
                );
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