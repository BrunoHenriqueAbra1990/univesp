<?php
	include "../conectar.php";
	date_default_timezone_set('America/Sao_Paulo');
	session_start();

	$data_time	= date("d/m/Y H:i");
	$date_time	= date("Y-m-d H:i:s");

	include_once "../links_includes/gravar_log.php";
	$usuario = $_SESSION['nome'];
	
	
	if($_POST['cad_parametro'] == 'USUARIO'){
		$cad_usuario 	= mb_strtoupper($_POST['cad_usuario']);
		$cad_login		= $_POST['cad_login'];
		$cad_nivel		= $_POST['cad_nivel'];
		$cad_senha		= $_POST['cad_senha'];
		
		$link = "https://univesp.escritoriovotuporanga.xyz/?usuario=$cad_login&senha=$cad_senha";
		$pass = "$link";
		$password = md5($link);
		
		$sql_insert = "INSERT INTO usuarios (
			nome, usuario, senha, nivel, status 
		)
		VALUES (
			'$cad_usuario', '$cad_login', '$password', '$cad_nivel', 'ATIVO'
		)";
		mysqli_query($con, $sql_insert);
		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		echo json_encode($retorna);
	}
	
	if($_POST['cad_parametro'] == 'FORNECEDORES'){
		$cad_razao_fornecedor 	= mb_strtoupper($_POST['cad_razao_fornecedor']);
		$cad_fantasia_fornecedor= mb_strtoupper($_POST['cad_fantasia_fornecedor']);
		$cad_codigo_fornecedor	= $_POST['cad_codigo_fornecedor'];
		$cad_cnpj_forncedor		= $_POST['cad_cnpj_forncedor'];
		$cad_cnpj_forncedor = str_replace( ".", " ", $cad_cnpj_forncedor );
		$cad_cnpj_forncedor = str_replace( "-", " ", $cad_cnpj_forncedor );
		$cad_cnpj_forncedor = str_replace( "/", " ", $cad_cnpj_forncedor );
		
		$sql_insert = "INSERT INTO fornecedores (
			cod_fornecedor, razao_social, fantasia, cnpj 
		)
		VALUES (
			'$cad_codigo_fornecedor', '$cad_razao_fornecedor', '$cad_fantasia_fornecedor', '$cad_cnpj_forncedor'
		)";
		mysqli_query($con, $sql_insert);
		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		echo json_encode($retorna);
	}
	
	if($_POST['cad_parametro'] == 'PRODUTOS'){
		$cad_produto 		= mb_strtoupper($_POST['cad_produto']);
		$cad_codigo_produto	= $_POST['cad_codigo_produto'];
		$cad_unidade		= $_POST['cad_unidade'];
		$cad_grupo			= $_POST['cad_grupo'];
		
		$sql_insert = "INSERT INTO usuarios (
			codigo_produto, desc_produto, unidade, grupo, data_fim, tipo 
		)
		VALUES (
			'$cad_codigo_produto', '$cad_produto', '$cad_unidade', '$cad_grupo', '0', 'PRODUTOS'
		)";
		mysqli_query($con, $sql_insert);
		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		echo json_encode($retorna);
	}
	
	if($_POST['cad_parametro'] == 'EMPRESA'){
		$cad_razao_social 	= mb_strtoupper($_POST['cad_razao_social']);
		$cad_fantasia		= mb_strtoupper($_POST['cad_fantasia']);
		$cad_codigo_empresa	= $_POST['cad_codigo_empresa'];
		$cad_cnpj_empresa	= $_POST['cad_cnpj_empresa'];
		
		$sql_insert = "INSERT INTO empresas (
			cod_unidade, descricao_empresa, apelido_empresa, cnpj 
		)
		VALUES (
			'$cad_codigo_empresa', '$cad_razao_social', '$cad_fantasia', '$cad_cnpj_empresa'
		)";
		mysqli_query($con, $sql_insert);
		$erro =  mysqli_error($con);
		if(empty($erro)){
			$retorna = ['status' => true, 'msg' => "Registro Cadastrado com Sucesso.!!!"];
		}
		else{
			$retorna = ['status' => false, 'msg' => "Erro: Registro não foi Salvo! $erro"];
		}
		echo json_encode($retorna);
	}
	
	if($_POST['cad_parametro'] == 'COTAÇÕES'){
		
		
		
	}
	
	
	
	