<?php

require_once('validacao.php');
require("PHPMailer-master/class.phpmailer.php");  //Aqui uso o PHPMailer

$nome  = $_POST['nome'];
$sobre = $_POST['sobre'];

$recebe_email = 'ckcesaraugusto@gmail.com';
$recebe_nome  = $nome;

$val = new validacao();

echo $val->validarCampo('Nome', $nome, '100', '3');
echo $val->validarCampo('SobreNome', $sobre, '100', '3');

$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "aqui seu host";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "seu usuario";  // GMAIL username
$mail->Password   = "sua senha";            // GMAIL password
$mail->From = $recebe_email; // From
$mail->FromName = $recebe_nome;

$mail->AddReplyTo($recebe_email, $recebe_nome);
$mail->AddAddress("ckcesaraugusto@gmail.com","ckcesaraugusto@gmail.com"); //Mandar para mais e-mail
//$mail->AddBcc("ckcesaraugusto@gmail.com", "ckcesaraugusto@gmail.com");  //Mandar para mais e-mail

// Email e nome de quem receberá

$mail->IsHTML(true); // Enviar como HTML

$mail->Subject = ".. :: Contato - Site :: .."; // Assunto


$mail->Body =
    "Nome: ".$nome."<br>".
    "Sobrenome: ".$sobre."<br>";


if(!$val->verifica() ){
    echo"";
}else{
    if(!$mail->Send()){
        echo "E-mail não enviado!<br>";
        echo $mail->ErrorInfo;
        exit;
    }else{
        echo"1";
    }
}