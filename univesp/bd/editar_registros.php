<?php
	include "../conectar.php";
	date_default_timezone_set('America/Sao_Paulo');
	session_start();

	$data_time	= date("d/m/Y H:i");
	$date_time	= date("Y-m-d H:i:s");

	include_once "../links_includes/gravar_log.php";
	$usuario = $_SESSION['nome'];
	
	$edit_id		= $_POST['edit_id'];
	
	if($_POST['edit_parametro'] == 'usuario'){
		$edit_usuario 	= mb_strtoupper($_POST['edit_usuario']);
		$edit_login		= $_POST['edit_login'];
		$edit_nivel		= $_POST['edit_nivel'];
		$edit_senha		= $_POST['edit_senha'];
		
		$link = "https://univesp.escritoriovotuporanga.xyz/?usuario=$edit_login&senha=$edit_senha";
		$pass = "$link";
		$password = md5($link);
		
		$sql_2 = "UPDATE usuarios SET 
					nome		= '$edit_usuario',
					usuario		= '$edit_login',
					nivel		= '$edit_nivel',
					senha		= '$edit_senha'
			WHERE id_usuario = $edit_id";
		$query_2 = $con->query($sql_2);

		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		
	}
	
	if($_POST['edit_parametro'] == 'fornecedor'){
		$edit_razao_fornecedor 	= mb_strtoupper($_POST['edit_razao_fornecedor']);
		$edit_fantasia_fornecedor= mb_strtoupper($_POST['edit_fantasia_fornecedor']);
		$edit_codigo_fornecedor	= $_POST['edit_codigo_fornecedor'];
		$edit_cnpj_forncedor		= $_POST['edit_cnpj_forncedor'];
		$edit_cnpj_forncedor = str_replace( ".", " ", $edit_cnpj_forncedor );
		$edit_cnpj_forncedor = str_replace( "-", " ", $edit_cnpj_forncedor );
		$edit_cnpj_forncedor = str_replace( "/", " ", $edit_cnpj_forncedor );
		

		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		echo json_encode($retorna);
	}
	
	if($_POST['edit_parametro'] == 'produto'){
		$edit_produto 		= mb_strtoupper($_POST['edit_produto']);
		$edit_codigo_produto	= $_POST['edit_codigo_produto'];
		$edit_unidade		= $_POST['edit_unidade'];
		$edit_grupo			= $_POST['edit_grupo'];
		

		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		echo json_encode($retorna);
	}
	
	if($_POST['edit_parametro'] == 'empresa'){
		$edit_razao_social 	= mb_strtoupper($_POST['edit_razao_social']);
		$edit_fantasia		= mb_strtoupper($_POST['edit_fantasia']);
		$edit_codigo_empresa	= $_POST['edit_codigo_empresa'];
		$edit_cnpj_empresa	= $_POST['edit_cnpj_empresa'];
		

		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		echo json_encode($retorna);
	}
	
	if($_POST['edit_parametro'] == 'COTAÇÕES'){
		
		
		
	}
	
	echo json_encode($retorna);