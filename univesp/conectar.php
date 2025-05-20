<?php
	date_default_timezone_set('America/Sao_Paulo');

	$servidor= "localhost";
	$usuario_servidor= "u494178315_univesp";
	$senha= "31032023S@l"; 
	$db= "u494178315_univesp";

	$con = mysqli_connect($servidor, $usuario_servidor, $senha, $db);
	//$con->query("SET NAMES 'utf8'");
	$con->query("SET character_set_connection=utf8");
	$con->query("SET character_set_client=utf8");
	$con->query("SET character_set_results=utf8");
	
	$sql_create = "CREATE TABLE IF NOT EXISTS usuarios (
		id_usuario INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
		nome varchar(100) NOT NULL,
		usuario varchar(45) NOT NULL,
		senha varchar(45) NOT NULL,
		nivel int(1) NOT NULL )";
	if ($con->query($sql_create) === TRUE) {
		$resultado = $con->query("SELECT COUNT(*) AS total FROM usuarios");
		$linha = $resultado->fetch_assoc();
		if ($linha['total'] == 0) {
			$sql_insert = "INSERT INTO usuarios (nome, usuario, senha, nivel, status ) VALUES 
				('Admin', 'admin', 'aad5485daaa091dfd9b1fd27ef61704b', '1', 'ATIVO'),
				('Usuario Teste', 'tester', 'ba534afb997af2a579ea121131494b08', '2', 'ATIVO'),
				('Usuario Teste', 'teste', '18e791e16a73345cb6bb976bc5b6abc5', '5', 'ATIVO')";
			if ($con->query($sql_insert) === TRUE) {
				echo "Dados inseridos com sucesso.<br>";
			} else {
				echo "Erro ao inserir dados: " . $con->error;
			}
		}
	}
	
	if (!function_exists('logMsgBD')) {
		function logMsgBD( $msg, $level = 'info', $file = 'z_banco_dados.log' ){
			// variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
			$levelStr = '';
		 
			// verifica o nível do log
			switch ( $level )
			{
				case 'info':
					// nível de informação
					$levelStr = 'INFO';
					break;
		 
				case 'warning':
					// nível de aviso
					$levelStr = 'WARNING';
					break;
		 
				case 'error':
					// nível de erro
					$levelStr = 'ERROR';
					break;
			}

			$ip = $_SERVER['REMOTE_ADDR']; 
			// data atual
			$date = date( 'Y-m-d H:i:s' );
		 
			// formata a mensagem do log
			// 1o: data atual
			// 2o: nível da mensagem (INFO, WARNING ou ERROR)
			// 3o: a mensagem propriamente dita
			// 4o: uma quebra de linha
			$msg = sprintf( "[%s]; [%s]; [%s]; %s%s", $ip, $date, $levelStr, $msg, PHP_EOL );
		 
			// escreve o log no arquivo
			// é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
			file_put_contents( $file, $msg, FILE_APPEND );
		}
	}

?>	