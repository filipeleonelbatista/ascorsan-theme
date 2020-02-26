<?php

/*

Template Name: Contato

*/

?>
<?php

//response generation function

$response = "";

//function to generate response
function my_contact_form_generate_response($type, $message){

  global $response;

  if($type == "success") $response = "<div class='success'>{$message}</div>";
  else $response = "<div class='error'>{$message}</div>";

}

//response messages
$missing_content = "Por favor, preencha todos os campos.";
$email_invalid   = "Endereço de email inválido.";
$message_unsent  = "Mensagem não enviada, tente novamente.";
$message_sent    = "Obrigado, mensagem enviada com sucesso.";

//user posted variables
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['msg'];

//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

//validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	my_contact_form_generate_response("error", $email_invalid);
else //email is valid
{
	//validate presence of name and message
	if(empty($name) || empty($message)){
		my_contact_form_generate_response("error", $missing_content);
	}
	else //ready to go!
	{
		$sent = wp_mail($to, $subject, strip_tags($message), $headers);
		if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
		else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
	}
}
?>


<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

<div class="container text-center">
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
</div>
<div class="container2">
	<div class="map">        
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13817.417349418676!2d-51.2262963!3d-30.0266907!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x83372a7a63600dc4!2sAscorsan!5e0!3m2!1spt-BR!2sbr!4v1582738294303!5m2!1spt-BR!2sbr" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
           
	<div class="contact-form">
		<h1 class="title"><?php the_title(); ?></h1>
		<!-- <h2 class="subtitle"></h2> -->
		<?php echo $response; ?>
		<form action="<?php the_permalink(); ?>" method="POST">
			<input type="text" name="name" placeholder="Nome" value="<?php echo esc_attr($_POST['name']); ?>" />
			<input type="email" name="email" placeholder="Email" value="<?php echo esc_attr($_POST['email']); ?>" />
			<input type="tel" name="phone" placeholder="Telefone" value="<?php echo esc_attr($_POST['phone']); ?>"/>
			<textarea name="text" id="" rows="8" placeholder="Sua Mensagem"><?php echo esc_textarea($_POST['msg']); ?></textarea>
			<button class="btn-send">Enviar mensagem</button>
		</form>
    </div>
    
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>