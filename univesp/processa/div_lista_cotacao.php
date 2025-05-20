<?php
	$date_time 			= date("Y-m-d");
	
	include "../conectar.php"; 
	
	$CpfCnpjPesquisar	= $_GET['CpfCnpjPesquisar'];
	$Empresa	= $_GET['Empresa'];
	$Cotacao	= $_GET['Cotacao'];
	
	//echo "$CpfCnpjPesquisar $Empresa $Cotacao";
	
	echo "<input type='hidden' id='CpfCnpjPesquisar' name='CpfCnpjPesquisar' value='$CpfCnpjPesquisar' />";
	//echo "<input id='Empresa' name='Empresa' value='$Empresa' />";
	//echo "<input id='Cotacao' name='Cotacao' value='$Cotacao' />";
	
	
	$sql = " Select * from cotacao where cod_empresa = '$Empresa' and cod_cotacao = '$Cotacao' ";
	$query = $con->query($sql);
	while ($dado = $query->fetch_assoc()) {
		$id_cotacao = $dado['id_cotacao'];
		$desc_produto = $dado['desc_produto'];
		
		//$verifica = "Select * from valores_cotacao where fk_id_cotacao = '$id_cotacao' and cnpj_fornecedor = '$CpfCnpjPesquisar'";
		//$resultado = mysqli_query($con, $verifica);
		//$row = mysqli_fetch_assoc($resultado);
		//if ($row > 0){
		//	$data_entrega 		= $row['data_entrega'];
		//	$prazo_pagamento 	= $row['prazo_pagamento'];
		//	$marca 				= $row['marca'];
		//	$valor_unitario 	= number_format($row['valor_unitario'], 2, ',', '.');
		//	$icms 				= number_format($row['icms'], 2, ',', '.');
		//	$ipi 				= number_format($row['ipi'], 2, ',', '.');
		//	$pis_cofins 		= number_format($row['pis_cofins'], 2, ',', '.');
		//	$frete 				= number_format($row['frete'], 2, ',', '.');
		//}
		//else{
			$data_entrega 		 = "";
			$prazo_pagamento 	 = "";
			$marca 				 = "";
			$valor_unitario 	 = "";
			$icms 				 = "";
			$ipi 				 = "";
			$pis_cofins 		 = "";
			$frete 				 = "";
		//}
?>
	<div class="form-row ">
		<div class="form-group col-md-3">
			<b>Descrição do Produto:		</b>
			<input type="" name="" id="" class="form-control " value="<?php echo $desc_produto; ?>" readonly style="font-size:12px" >
		</div>
	
		<div class="form-row  col-md-4">
			<div class="form-group col-md-4">
				<b>Data de Entrega:		</b>
				<input type="date" name="" id="data_entrega" class="form-control " value="<?php echo $data_entrega; ?>"  >
			</div>
			
			<div class="form-group  col-md-4">
				<b>Prazo do Pagamento:		</b>
				<input type="number" name="" id="prazo_pagamento" class="form-control " placeholder="( EM DIAS )" value="<?php echo $prazo_pagamento; ?>"  >
			</div>
			
			<div class="form-group  col-md-4">
				<b>Marca:		</b>
				<input type="text" name="" id="marca" class="form-control " value="<?php echo $marca; ?>"  >
			</div>
		</div>

		<div class="form-row  col-md-4">
			<div class="form-group  col-md-3">
				<b>Unitário:	</b>
				<input name="" id="valor_unitario"  class="dinheiro form-control " value="<?php echo $valor_unitario; ?>" placeholder="R$ 0,00" maxlength="12" >
			</div>                                                
			<div class="form-group  col-md-3">                    
				<b>Icms:	</b>                                  
				<input name="" id="icms"  class="dinheiro form-control " value="<?php echo $icms; ?>" placeholder="R$ 0,00" maxlength="12"  >
			</div>                                                
			<div class="form-group col-md-3" style="display:none">                    
				<b>Ipi:	</b>                                      
				<input name="" id="ipi"  class="dinheiro form-control " value="<?php echo $ipi; ?>" placeholder="0,00 %" maxlength="12"  >
			</div>                                                
			<div class="form-group  col-md-3">                    
				<b>Pis/Cofins:	</b>                              
				<input  name="" id="pis_cofins"  class="dinheiro form-control " value="<?php echo $pis_cofins; ?>" placeholder="R$ 0,00" maxlength="12"  >
			</div>
			<div class="form-group  col-md-3">                    
				<b>Valor Frete:	</b>                              
				<input  name="" id="frete"  class="dinheiro form-control " value="" placeholder="R$ 0,00" maxlength="12"  >
			</div>
		</div>
		


		<button type="button" onclick="salvarCotacao('<?php echo $id_cotacao; ?>')" class="btn btn-success col-md-1 btnSalvar"  id="btnSalvarCadastroCotacao" name="btnSalvarCadastroCotacao"> Salvar </button>
	</div>

<?php
	}
?>

		<input type="hidden" name="Empresa"  class="form-control" id="Empresa" value="<?php echo $Empresa; ?>">
		<input type="hidden" name="Cotacao"  class="form-control" id="Cotacao" value="<?php echo $Cotacao; ?>">

<script>
	function salvarCotacao(id) {
		var CpfCnpjPesquisar 	= document.getElementById("CpfCnpjPesquisar").value;
		var Empresa 			= document.getElementById("Empresa").value;
		var Cotacao 			= document.getElementById("Cotacao").value;
		var data_entrega 		= document.getElementById("data_entrega").value;
		var prazo_pagamento 	= document.getElementById("prazo_pagamento").value;
		var marca 				= document.getElementById("marca").value;
		var valor_unitario 		= document.getElementById("valor_unitario").value;
		var icms 				= document.getElementById("icms").value;
		var ipi 				= document.getElementById("ipi").value;
		var pis_cofins 			= document.getElementById("pis_cofins").value;
		var frete 				= document.getElementById("frete").value;
		var Id 					= id;
		var parametro 			= "FORNECEDOR_COTACAO";
		
		console.log( CpfCnpjPesquisar+' . '+Empresa+' . '+Cotacao+' . '+data_entrega+' . '+prazo_pagamento+' . '+ Id );
		
		$.ajax({
			url: 'bd/cadastrar_cotacao.php',
			method: 'POST',
			data: { 
					CpfCnpjPesquisar: CpfCnpjPesquisar, 
					Empresa: 		Empresa,
					Cotacao: 		Cotacao,
					data_entrega: 	data_entrega,
					prazo_pagamento: 	prazo_pagamento,
					marca: 			marca,
					valor_unitario: valor_unitario,
					icms: 			icms,
					ipi: 			ipi,
					pis_cofins: 	pis_cofins,
					frete: 			frete,
					Id: 			Id,
					parametro: 		parametro
				}, 
			success: function(response) {
				response = response.trim();
				console.log(response);
				if(response > 0){
					alert('Valor cadastrado com sucesso!!!');
				}
			},
			error: function(xhr, status, error) {
			  console.error('Erro na atualização dos dados:', error);
			}
		});
	}
</script>