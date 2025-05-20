<?php

	include "../conectar.php";
	header('Content-Type: text/html; charset=utf-8');
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require '../links_includes/enviar_email/lib/vendor/autoload.php';

	$mail = new PHPMailer(true);
	
	
    if(!isset($_SESSION)) { session_start(); }
	$id_usuario = $_SESSION['id_usuario'];
	$usuario = $_SESSION['nome'];
	if (!empty($_SESSION['nome'])) {
		date_default_timezone_set('America/Sao_Paulo');
		$data_time		= date("d/m/Y H:i");
		$data_local		= date('Y-m-d H:i',time());
		$date_time 		= date("Y-m-d H:i:s");
		$date	 		= date("Y-m-d");
		$aspas_simples 	= "'";
		$dados 			= filter_input_array(INPUT_POST, FILTER_DEFAULT);

		$empresaCotacao = $dados['empresaCotacao'];
		$numeroCotacao 	= $dados['numeroCotacao'];

		if($dados['parametro'] == "EMAIL"){
			$email_enviar 	= $dados['email_enviar'];
			$assunto 		= $dados['assunto'];
			$corpo_email 	= $dados['corpo_email'];
			
			//$email = "bruno.abra@escritoriovotuporanga.xyz";
			//$nome = "Bruno";
			try {
				// Configuração do servidor de e-mail
				$mail->CharSet = 'UTF-8';
				$mail->isSMTP();
				$mail->Host       = 'mail.escritoriovotuporanga.com.br';
				$mail->SMTPAuth   = true;
				$mail->Username   = 'sigemix@escritoriovotuporanga.com.br';
				$mail->Password   = 'x2s2@2021E';
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
				$mail->Port       = 465;

				$mail->setFrom('sigemix@escritoriovotuporanga.com.br', 'Sigemix');
				$mail->addAddress("$email_enviar", '');     //Add a recipient
				$mail->addBCC('bruno.abra@escritoriovotuporanga.com.br', 'Bruno');     //Add a recipient

				//echo "<pre>";
				//var_dump($destinatarios);
				//echo "</pre>";
				//die(); // Para interromper a execução e analisar os dados

				// Configuração da mensagem
				$mail->isHTML(true);
				$mail->Subject = "$assunto";
				$mail->Body    = "
					<b>ATENÇÃO!</b><br><br>
					$corpo_email. 
					<br><br>
					
					<a href=\"https://univesp.escritoriovotuporanga.xyz/cotacao.php?Empresa=$empresaCotacao&Cotacao=$numeroCotacao\">
					https://univesp.escritoriovotuporanga.xyz/cotacao.php?Empresa=$empresaCotacao&Cotacao=$numeroCotacao.
					</a>
					
					<br><br>
					
					Lembrando que este e-mail é apenas informativo e automático, portanto, por favor não responda. <br>
				";

				$mail->send();
				$mail->clearAddresses();

				//echo 'Mensagem enviada com sucesso!!<br>';
				$retorna = ['status' => true, 'msg' => "Mensagem enviada com sucesso.!!!"];
			}
			catch (Exception $e) {
				echo "";
				$retorna = ['status' => false, 'msg' => "Mensagem não foi enviada com Sucesso: {$mail->ErrorInfo}"];
			}
			
			$mail->Body = "Teste de envio de e-mail.";
		}




		echo json_encode($retorna);
	}
	


