<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = $_POST['usuario_email'];
$assunto = $_POST['usuario_assunto'];
$mensagem = $_POST['usuario_msg'];
if(isset($email,$assunto,$mensagem)){
    $mail = new Phpmailer(true);
    try{
        $mail->SMTPDebug =2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ecodeltamailer@gmail.com';
        $mail->Password = 'ecodelta123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email);
        $mail->addAddress('equipeecodeltar@gmail.com');
            
        $mail->isHtml(true);
        $mail->Subject = $assunto;
        $mail->Body = "Email: ".$email."<br/>Mensagem: ".$mensagem;

        $mail->send();

        header("location:/");
    } catch (Exception $e){
        echo 'Mensagem de erro: ', $mail->ErrorInfo;
    }
}else{
    echo "Está faltando o email, o assunto ou a mensagem. Por favor volte e tente novamente.";
}