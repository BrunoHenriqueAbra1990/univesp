<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	
	include "../../links_includes/script.php"; 
	include "../../conectar.php"; 
	$ID 		= filter_input(INPUT_GET, "ID");

	function buscarNome($con, $fk_id_funcionario) {
		$fk_id_funcionario = str_replace( "/", " ", $fk_id_funcionario );
		$fk_id_funcionario = str_replace( ".", " ", $fk_id_funcionario );
		$fk_id_funcionario = str_replace( "-", " ", $fk_id_funcionario );
		
		$sql_cidade = $con->prepare("SELECT fantasia FROM fornecedores WHERE cnpj = ?");
		$sql_cidade->bind_param("s", $fk_id_funcionario);
		$sql_cidade->execute();
		$resultado = $sql_cidade->get_result();
		$nome = ($row_cidade = $resultado->fetch_assoc()) ? $row_cidade['fantasia'] : "";
		$sql_cidade->close();
		return $nome;
	}

	echo "<input type=\"hidden\" value=\"$ID\" id=\"edit_id\" name=\"edit_id\" />";

	$verifica = "Select * from cotacao where id_cotacao = '$ID'";
	$result = mysqli_query($con, $verifica);
	$dado = mysqli_fetch_assoc($result);
	if ($dado > 0){
		$CodCotacao = $dado['cod_cotacao'];
		$cod_cotacao = $dado['cod_cotacao'];
		
		$CodEmpresa = $dado['cod_empresa'];
		$cod_empresa = $dado['cod_empresa'];
/*
		echo "<div class='form-row contorno_reto col-md-12'>
				<div class='form-row col-md-12'>
					<div class='col-md-1'>
						<label>Item: </label>
					</div>
					
					<div class='col-md-1'>
						<label>Código: </label>
					</div>
					
					<div class='col-md-5'>
						<label>Produto: </label>
					</div>
					
					<div class='col-md-1'>
						<label>Unidade: </label>
					</div>
					
					<div class='col-md-1'>
						<label>Quantidade: </label>
					</div>
				</div>
			";

		
		
		$result = "Select * from cotacao where cod_cotacao = '$cod_cotacao' and cod_empresa = '$cod_empresa' ";
		$resultado = mysqli_query($con, $result);
		if(mysqli_num_rows($resultado) > 0) {
			while ($row = mysqli_fetch_assoc($resultado)) {
			?>
			<div class="form-row col-md-12" id="">
				<div class="col-md-1">
					<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['numero_item'];?>" readonly />
				</div>
				
				<div class="col-md-1">
					<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['codigo_produto'];?>" readonly />
				</div>
				
				<div class="col-md-5">
					<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['desc_produto'];?>" readonly />
				</div>
				
				<div class="col-md-1">
					<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['tipo_unidade'];?>" readonly />
				</div>
				
				<div class="col-md-1">
					<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['quantidade'];?>" readonly />
				</div>
			</div>
			<?php
			}
		}
		
		echo "</div>";
*/

	}

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
				<th> Quantidade				</th>
				<?php
					$sql_medicao = "Select * from valores_cotacao where empresa = '$CodEmpresa' and cod_cotacao = '$CodCotacao' group by cnpj_fornecedor  ";
					$query_medicao = mysqli_query($con, $sql_medicao);
					
					$a = 0;
					while ($dado_medicao = $query_medicao->fetch_assoc()) {
						$cnpj_fornecedor = $dado_medicao['cnpj_fornecedor'];
						
						$a = $a + 1;
						
						$fantasia_forn = buscarNome( $con, $dado_medicao['cnpj_fornecedor']);
						if(!empty($fantasia_forn)){
							$cnpj_fornecedor = "$fantasia_forn - $cnpj_fornecedor";
						}
						
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
				<td><?php echo $dado['quantidade']; ?></td>
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

