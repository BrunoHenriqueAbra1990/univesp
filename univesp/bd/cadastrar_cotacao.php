<?php
	include "../conectar.php";
	date_default_timezone_set('America/Sao_Paulo');
	session_start();

	$data_time	= date("d/m/Y H:i");
	$date_time	= date("Y-m-d H:i:s");

	include_once "../links_includes/gravar_log.php";
	$usuario = $_SESSION['nome'];
	
	
	if($_POST['parametro'] == 'FORNECEDOR_COTACAO'){
		$CpfCnpjPesquisar 	= $_POST['CpfCnpjPesquisar'];
		$Empresa		= $_POST['Empresa'];
		$Cotacao		= $_POST['Cotacao'];
		$data_entrega	= $_POST['data_entrega'];
		$prazo_pagamento= $_POST['prazo_pagamento'];
		$marca			= $_POST['marca'];
		$Id				= $_POST['Id'];
		
		$valor_unitario 	= $_POST['valor_unitario'];
		$valor_unitario 	= str_replace( '.', '', $valor_unitario );
		$valor_unitario 	= str_replace( ',', '.', $valor_unitario );
		
		$icms 	= $_POST['icms'];
		$icms 	= str_replace( '.', '', $icms );
		$icms 	= str_replace( ',', '.', $icms );
		
		$ipi 	= $_POST['ipi'];
		$ipi 	= str_replace( '.', '', $ipi );
		$ipi 	= str_replace( ',', '.', $ipi );
		
		$pis_cofins 	= $_POST['pis_cofins'];
		$pis_cofins 	= str_replace( '.', '', $pis_cofins );
		$pis_cofins 	= str_replace( ',', '.', $pis_cofins );
		
		$frete 	= $_POST['frete'];
		$frete 	= str_replace( '.', '', $frete );
		$frete 	= str_replace( ',', '.', $frete );
		
		$sql = "Select * from valores_cotacao where fk_id_cotacao = '' and cnpj_fornecedor = '' ";
		$resultado = mysqli_query($con, $sql);
		if($resultado->num_rows){
			$row = mysqli_fetch_assoc($resultado);
			$id_valores_cotacao 	= $row['id_valores_cotacao'];
		}
		else{
			$sql_insert = "INSERT INTO valores_cotacao (
				fk_id_cotacao, cnpj_fornecedor, data_entrega, prazo_pagamento, marca, valor_unitario, icms, ipi, pis_cofins, frete, empresa, cod_cotacao
			)
			VALUES (
				'$Id', '$CpfCnpjPesquisar', '$data_entrega', '$prazo_pagamento', '$marca', '$valor_unitario', '$icms', '$ipi', '$pis_cofins', '$frete', '$Empresa', '$Cotacao'
			)";
			mysqli_query($con, $sql_insert);
			$erro =  mysqli_error($con);
			if(empty($erro)){
				$idInserido = mysqli_insert_id($con);
			}
			else{
				$idInserido = 0;
				echo $erro;
			}
			echo "$idInserido";
		}
	}
	
	//logMsg( "$mensagem", 'warning' );	