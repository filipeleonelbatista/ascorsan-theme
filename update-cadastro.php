<?php

/*

Template Name: Contato

*/

?>

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
$nome = $_POST['update-nome'];
$matricula = $_POST['update-matricula'];
$logradouro = $_POST['update-logradouro'];
$nr_logradouro = $_POST['update-numero-logradouro'];
$complemento = $_POST['update-complemento'];
$bairro = $_POST['update-bairro'];
$cidade = $_POST['update-cidade'];
$cep = $_POST['update-cep'];
$phone = $_POST['update-phone'];
$whats = $_POST['update-whats'];
$email = $_POST['update-email'];
$unidade_trabalho = $_POST['update-unidade-trabalho'];
$email_trabalho = $_POST['update-email-trabalho'];

$message = "<b>Atualização Cadastral</b>\n";
$message .= "<hr>\n";
$message .= "<b>Nome: </b>" . $nome . "\n";
$message .= "<b>Matricula: </b>" . $matricula . "\n\n";
$message .= "<b>Logradouro: </b>" . $logradouro . "\n";
$message .= "<b>Nr. Logradouro: </b>" . $nr_logradouro . "\n";
$message .= "<b>Complemento: </b>" . $complemento . "\n";
$message .= "<b>Bairro: </b>" . $bairro . "\n";
$message .= "<b>Cidade: </b>" . $cidade . "\n";
$message .= "<b>CEP: </b>" . $cep . "\n\n";
$message .= "<b>Telefone: </b>" . $phone . "\n";
$message .= "<b>Whatsapp: </b>" . $whats . "\n";
$message .= "<b>E-mail: </b>" . $email . "\n\n";
$message .= "<b>Unidade de trabalho: </b>" . $unidade_trabalho . "\n";
$message .= "<b>E-mail de trabalho: </b>" . $email_trabalho . "\n";
$message .= "<hr>\n";
$message .= "Email enviado pelo formulário de atualização cadastral da Ascorsan\n";


//php mailer variables
$to = get_theme_mod('email-update');
$subject = "Atualização cadastral feita pelo Pop-Up " . get_bloginfo('name');
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

<div class="container">
    <!-- <h2 class="subtitle"></h2> -->
    <?php echo $response; ?>
    <form action="" method="post">
        <div class="form-group">
            <!-- <label for="">Nome *</label> -->
            <input class="form-control" id="nome-update" type="text" name="update-nome" required placeholder="Nome *" value="<?php echo esc_attr($_POST['update-nome']); ?>" />
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <!-- <label for="">Matricula *</label> -->
                    <input class="form-control" id="matricula-update" type="text" name="update-matricula" required placeholder="Matricula *" value="<?php echo esc_attr($_POST['update-matricula']); ?>" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <!-- <label for="">CPF *</label> -->
                    <input class="form-control" id="cpf-update" type="text" name="update-cpf" required placeholder="CPF *" value="<?php echo esc_attr($_POST['update-cpf']); ?>" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <!-- <label for="">Logradouro *</label> -->
                    <input class="form-control" id="logradouro-update" type="text" name="update-logradouro" required placeholder="Logradouro *" value="<?php echo esc_attr($_POST['update-logradouro']); ?>" />
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <!-- <label for="">Numero *</label> -->
                    <input class="form-control" id="numero-logradouro-update" type="text" name="update-numero-logradouro" required placeholder="Numero *" value="<?php echo esc_attr($_POST['update-numero-logradouro']); ?>" />
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <!-- <label for="">Bairro *</label> -->
                    <input class="form-control" id="bairro-update" type="text" name="update-bairro" required placeholder="Bairro *" value="<?php echo esc_attr($_POST['update-bairro']); ?>" />
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <!-- <label for="">Cidade *</label> -->
                    <input class="form-control" id="cidade-update" type="text" name="update-cidade" required placeholder="Cidade *" value="<?php echo esc_attr($_POST['update-cidade']); ?>" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    <!-- <label for="">Complemento </label> -->
                    <input class="form-control" id="complemento-update" type="text" name="update-complemento" required placeholder="Complemento *" value="<?php echo esc_attr($_POST['update-complemento']); ?>" />
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <!-- <label for="">CEP *</label> -->
                    <input class="form-control" id="cep-update" type="text" name="update-cep" required placeholder="CEP *" value="<?php echo esc_attr($_POST['update-cep']); ?>" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <!-- <label for="">Telefone *</label> -->
                    <input class="form-control" id="phone-update" type="tel" name="update-phone" required placeholder="Telefone *" value="<?php echo esc_attr($_POST['update-phone']); ?>" />
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <!-- <label for="">Whatsapp</label> -->
                    <input class="form-control" id="whats-update" type="tel" name="update-whats" required placeholder="Whatsapp *" value="<?php echo esc_attr($_POST['update-whats']); ?>" />
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <!-- <label for="">Email Pessoal *</label> -->
                    <input class="form-control" id="email-update" type="email" name="update-email" required placeholder="E-mail Pessoal *" value="<?php echo esc_attr($_POST['update-email']); ?>" />
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <!-- <label for=""></label> -->
                    <input class="form-control" id="unidade-trabalho-update" type="text" name="update-unidade-trabalho" required placeholder="Unidade de trabalho  *" value="<?php echo esc_attr($_POST['update-unidade-trabalho']); ?>" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <!-- <label for=""></label> -->
                    <input class="form-control" id="email-trabalho-update" type="email-trabalho" name="update-email-trabalho" required placeholder="E-mail de trabalho *" value="<?php echo esc_attr($_POST['update-email-trabalho']); ?>" />
                </div>
            </div>
        </div>

        <button id="submit" type="submit" class="btn btn-lg btn-ascorsan-primary">Enviar Dados</button>
    </form>

</div>