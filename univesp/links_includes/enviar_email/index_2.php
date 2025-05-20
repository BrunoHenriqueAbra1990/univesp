<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'lib/vendor/autoload.php';


$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
	$mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '451fa31a532d59';                     //SMTP username
    $mail->Password   = 'a2acc93ff9b7ff';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	//ENCRYPTION_SMTPS


    //Recipients
    $mail->setFrom('sigemix@escritoriovotuporanga.com.br', 'Sigemix');
    $mail->addAddress('bruno.abra@escritoriovotuporanga.com.br', 'Bruno');     //Add a recipient
	/*
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
	*/
	
    //Attachments
	/*
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
	*/

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Teste de Email PHPMAILER do Dominio EscritorioVotuporanga';
    $mail->Body    = 'Recebi o seu email, será lido o mais rápido possível. <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	
	$mail->clearAddresses();
	
    echo 'Message has been sent';
} catch (Exception $e) {
    echo " {$mail->ErrorInfo}";
}



?>