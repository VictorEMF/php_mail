<?php

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];


require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = "true";
$mail->Username = "email_de_quem_manda"; //email q vai mandar
$mail->Password = "senha_desse_email";

$mail->setFrom($mail->Username,"Victor");
$mail->addAddress("{$email}"); //email quem vai receber
$mail->Subject = "Teste de mandar email com PHP!";

$conteudo_email = "Você rebeu um mensagem de $nome $sobrenome.
<br><br>

Mensagem: <br> $mensagem";


$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if( $mail->send()){
    echo "Email enviado com sucesso!";
}else {
    echo "Falha ao enviar email!";
}

?>