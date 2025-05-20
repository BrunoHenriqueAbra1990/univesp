<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	
	include "../../links_includes/script.php"; 
	include "../../conectar.php"; 
	$CodEmpresa 		= filter_input(INPUT_GET, "CodEmpresa");
	$CodCotacao 		= filter_input(INPUT_GET, "CodCotacao");

	echo " $CodEmpresa - $CodCotacao ";
	
	$sql = " Select * from cotacao where cod_empresa = '$CodEmpresa' and cod_cotacao = '$CodCotacao' ";
	$query = $con->query($sql);
?>
	
	
<div class="col-md-12  contorno_reto" >
	<table id="select_modal" class="display table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th> Ações					</th>
				<th> Código Produto			</th>
				<th> Descrição Produto		</th>
				<th> Unidade de Medida		</th>
				<?php
					$sql_medicao = "Select * from valores_cotacao where empresa = '$CodEmpresa' and cod_cotacao = '$CodCotacao' group by cnpj_fornecedor  ";
					$query_medicao = mysqli_query($con, $sql_medicao);
					
					$a = 0;
					while ($dado_medicao = $query_medicao->fetch_assoc()) {
						$cnpj_fornecedor = $dado_medicao['cnpj_fornecedor'];
						
						$a = $a + 1;
						echo "<th style='border-right:solid #0E3BA4 1px;'>$cnpj_fornecedor</th>";
					}
				?>
				
			</tr>
		</thead>
		
			<tbody>
			<?php
				$valor_total = 0;
				while ($dado = $query->fetch_assoc()) {
					$color = "";
					$id_cotacao = $dado['id_cotacao'];
			?>
			<tr>
				<td><?php echo $dado['numero_item']; ?></td>
				<td><?php echo $dado['codigo_produto']; ?></td>
				<td><?php echo $dado['desc_produto']; ?></td>
				<td><?php echo $dado['tipo_unidade']; ?></td>
				<?php
					$sql_medicao_2 = "Select cnpj_fornecedor from valores_cotacao where empresa = '$CodEmpresa' and cod_cotacao = '$CodCotacao' group by cnpj_fornecedor	";
					$query_medicao_2 = mysqli_query($con, $sql_medicao_2);
					while ($dado_medicao_2 = $query_medicao_2->fetch_assoc()){
						$color = "";
						$cnpj_fornecedor = $dado_medicao_2['cnpj_fornecedor'];
						
						$verifica = "Select * from valores_cotacao 
							where empresa = '$CodEmpresa' and cod_cotacao = '$CodCotacao' 
							and fk_id_cotacao = '$id_cotacao' and cnpj_fornecedor = '$cnpj_fornecedor' ";
						$resultado = mysqli_query($con, $verifica);
						$row = mysqli_fetch_assoc($resultado);
						if ($row > 0){
							$valor_unit			= number_format($row['valor_unitario'],2, ',', '.');
							$valor_unit_id 		= $row['id_valores_cotacao'];
							$ipi				= $row['ipi'];
							$calculo_ipi		= ( ($row['valor_unitario'] * $ipi) / 100 );
							$calculo_ipi_format	= number_format($calculo_ipi,2, ',', '.');
							$marca				= mb_strtoupper($row['marca']);
							$data_entrega		= implode("/",array_reverse(explode("-",$row['data_entrega'])));
							$prazo_pagamento	= $row['prazo_pagamento'];
							$valor_frete		= number_format($row['frete'],2, ',', '.');
						}
						else{
							$valor_unit			= "0,00";
							$valor_unit_id 		= "";
							$ipi				= "0,00";
							$calculo_ipi		= "0.00";
							$marca				= "";
							$data_entrega		= "";
							$prazo_pagamento	= "";
							$valor_frete		= "0,00";
						}
						
						$sql_destaca = $con->query(" SELECT id_valores_cotacao FROM valores_cotacao cv  
							where cv.fk_id_cotacao = '$id_cotacao' and cv.valor_unitario > '0.00'
							order by cv.valor_unitario ASC limit 1 ");
						$row_destaca 	= mysqli_fetch_array($sql_destaca);
						if($row_destaca > 0){
							$id_valores_cotacao = $row_destaca['id_valores_cotacao'];
							if($id_valores_cotacao == $valor_unit_id){
								$color = "style='background-color:#03fc35'";
							}
							else{
								$color = "";
							}
						}
						
						echo "<td $color> 
							V. Unit: $valor_unit<br><br>
							Marca: $marca<br><br>
							Calculo IPI: $calculo_ipi_format<br><br>
							Dt. Entrega: $data_entrega<br><br>
							Prazo Pagamento: $prazo_pagamento<br><br>
							Valor do Frete: $valor_frete
						</td>";
					}
				?>
			</tr>
			<?php
				}
			?>
		</tbody>
		
		<tfoot>
			<tr class="print">
				<th><select><option value=""></option></select></th>
				<th><select><option value=""></option></select></th>
				<th><select><option value=""></option></select></th>
				<th><select><option value=""></option></select></th>
				<?php
					for($i = 0; $i < $a; $i++ ){
						echo "<th><select><option value=''></option></select></th>";
					}
				?>
			</tr>
		</tfoot>
	</table>
</div>
	
	
	
	
	
	