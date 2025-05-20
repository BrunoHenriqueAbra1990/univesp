<?php
	include "../conectar.php";
	date_default_timezone_set('America/Sao_Paulo');
	session_start();

	$data_time	= date("d/m/Y H:i");
	$date_time	= date("Y-m-d H:i:s");

	include_once "../links_includes/gravar_log.php";
	$usuario = $_SESSION['nome'];
	
	
	if($_POST['parametro'] == 'excluir_usuario'){
		$ID = $_POST['ID'];
		
		$sql_1	= "DELETE FROM usuarios WHERE id_usuario = '$ID'";
		$query_1 = $con->query($sql_1);
		
		$mensagem =  "[$ID]; [usuarios]; [$usuario]; [DELETE]; [DELETOU REGISTRO: $sql_1 ];";
	}
	
	elseif($_POST['parametro'] == 'excluir_fornecedor'){
		$ID = $_POST['ID'];
		
		$sql_1	= "DELETE FROM fornecedores WHERE id_fornecedor = '$ID'";
		$query_1 = $con->query($sql_1);
		
		$mensagem =  "[$ID]; [fornecedores]; [$usuario]; [DELETE]; [DELETOU REGISTRO: $sql_1 ];";
	}
	
	elseif($_POST['parametro'] == 'excluir_produto'){
		$ID = $_POST['ID'];
		
		$sql_1	= "DELETE FROM produtos WHERE id_produto = '$ID'";
		$query_1 = $con->query($sql_1);
		
		$mensagem =  "[$ID]; [produtos]; [$usuario]; [DELETE]; [DELETOU REGISTRO: $sql_1 ];";
	}
	
	elseif($_POST['parametro'] == 'excluir_cotacao'){
		$ID = $_POST['ID'];
		
		
		$verifica = "Select * from cotacao where id_cotacao = '$ID'";
		$resultado = mysqli_query($con, $verifica);
		$row = mysqli_fetch_assoc($resultado);
		if ($row > 0){
			$cod_empresa = $row['cod_empresa'];
			$cod_cotacao = $row['cod_cotacao'];
			
			$sql_1	= "DELETE FROM cotacao WHERE cod_empresa = '$cod_empresa' and cod_cotacao = '$cod_cotacao'";
			$query_1 = $con->query($sql_1);
		}
		
		$mensagem =  "[$ID]; [fornecedores]; [$usuario]; [DELETE]; [DELETOU REGISTRO: $sql_1 ];";
	}
	
	logMsg( "$mensagem", 'warning' );	
	