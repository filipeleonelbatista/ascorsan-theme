<?php

/*

Template Name: Contato

*/

?>

<?php

//response generation function
$response = "";

//function to generate response
function updateImpostoRendaHandler($type, $message)
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
$nome = isset($_POST['update-nome']) ? $_POST['update-nome'] : '';
$matricula = isset($_POST['update-matricula']) ? $_POST['update-matricula'] : '';
$cpf = isset($_POST['update-cpf']) ? $_POST['update-cpf'] : '';
$email = isset($_POST['update-email']) ? $_POST['update-email'] : '';
$dependentes = isset($_POST['update-dependentes']) ? $_POST['update-dependentes'] : '';
$convenio = isset($_POST['update-convenio']) ? $_POST['update-convenio'] : '';

$message = "<b>Formulário Solicitação do comprovante do imposto de renda</b>\n";
  
$message .= "<hr>\n";
$message .= "<b>Nome: </b>" . $nome . "\n";
$message .= "<b>Matricula: </b>" . $matricula . "\n\n";
$message .= "<b>CPF: </b>" . $cpf . "\n\n";
$message .= "<b>E-mail: </b>" . $email . "\n\n";
$message .= "<b>Convênio: </b>" . $convenio . "\n";
$message .= "<b>Dependentes: </b>" . $dependentes . "\n";
$message .= "<hr>\n";
$message .= "Email enviado pelo Formulário Solicitação do comprovante do imposto de renda da Ascorsan\n";


//php mailer variables
$to = get_theme_mod('email-update-imposto-renda');
$subject = "Solicitação do comprovante do imposto de renda enviado pelo Pop-Up " . get_bloginfo('name');
$headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

if ($_POST) {

    if ($to == '')
        updateImpostoRendaHandler("error", $invalid_to);
    //validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        updateImpostoRendaHandler("error", $email_invalid);
    else //email is valid
    {
        //validate presence of name and message
        if (empty($nome) || empty($message)) {
            updateImpostoRendaHandler("error", $missing_content);
        } else //ready to go!
        {
            $sent = wp_mail($to, $subject, strip_tags($message), $headers);

            if ($sent) updateImpostoRendaHandler("success", $message_sent); //message sent!
            else updateImpostoRendaHandler("error", $message_unsent); //message wasn't sent
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
            <input class="form-control" id="nome-update" type="text" name="update-nome" required placeholder="Nome *" value="<?php echo esc_attr(isset($_POST['update-nome']) ? $_POST['update-nome'] : ''); ?>" />
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <!-- <label for="">Matricula *</label> -->
                    <input class="form-control" id="matricula-update" type="text" name="update-matricula" required placeholder="Matricula *" value="<?php echo esc_attr(isset($_POST['update-matricula']) ? $_POST['update-matricula'] : ''); ?>" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <!-- <label for="">CPF *</label> -->
                    <input class="form-control" id="cpf-update" type="text" name="update-cpf" required placeholder="CPF *" value="<?php echo esc_attr(isset($_POST['update-cpf']) ? $_POST['update-cpf'] : ''); ?>" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <!-- <label for="">Email Pessoal *</label> -->
                    <input class="form-control" id="email-update" type="email" name="update-email" required placeholder="E-mail Pessoal *" value="<?php echo esc_attr(isset($_POST['update-email']) ? $_POST['update-email'] : ''); ?>" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <!-- <label for="">CPF *</label> -->
                    <input class="form-control" id="convenio-update" type="text" name="update-convenio" required placeholder="Convenio *" value="<?php echo esc_attr(isset($_POST['update-convenio']) ? $_POST['update-convenio'] : ''); ?>" />
                </div>
            </div>
        </div>      
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <!-- <label for="">Email Pessoal *</label> -->
                    <textarea class="form-control" id="dependentes-update" name="update-dependentes" required placeholder="Digite o Nome e CPF dos Dependentes aqui... *" rows="8"><?php echo esc_attr(isset($_POST['update-dependentes']) ? $_POST['update-dependentes'] : ''); ?></textarea>
                </div>
            </div>
        </div>

        <button id="submit" type="submit" class="btn btn-lg btn-ascorsan-primary">Enviar Dados</button>
    </form>

</div>