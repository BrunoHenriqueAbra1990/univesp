<?php ob_start();

include "../../conectar.php";
	
$empresa = $_GET['empresa'];
$cotacao = $_GET['cotacao'];

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

$sql = "Select * from cotacao where cod_empresa = '$empresa' and cod_cotacao = '$cotacao' group by cod_cotacao";

$query = $con->query($sql);
	while ($dado = $query->fetch_assoc()) {
	
$html = "<!doctype html>";
$html .= "<html>";
$html .= "<head>";
$html .= "<meta charset='utf-8'>";
$html .= "<title>Noromix - </title>";
$html .= "<link rel='shortcut icon' href='../../favicon.ico' />";

$html .= "<link href='../../estilos/estilo-impressao.css' rel='stylesheet' type='text/css'>";
$html .= "</head>";

$html .= "<body>";

$html .= "<div id='margem'>";

$html .= "<div id='titulo'>";
$html .= "<p>RELATÓRIO </p>";
$html .= "</div>";

$html .= "<br>";

$data = implode("/",array_reverse(explode("-",$dado['data'])));

$html .= "<table>";

$html .= "<tr>
			<th colspan='3'>Empresa:</th>
			<td colspan='3'>&nbsp;&nbsp;". $dado['cod_empresa'] ."</td> 
			<th colspan='3'>Cotação:</th>
			<td colspan='3'>&nbsp;&nbsp;". $dado['cod_cotacao'] ."</td>
		</tr>
";

$html .= "</table><br>";

$html .= "
	<table id='table' class='display table table-striped table-bordered table-hover ' >
		<thead>
			<tr >
				<th style='font-size: 08px'>Item				</th>
				<th style='font-size: 08px'>Código				</th>
				<th style='font-size: 08px'>Descrição do Produto</th>
				<th style='font-size: 08px'>Uni					</th>
				<th style='font-size: 08px'>Tipo peça			</th>
				<th style='font-size: 08px'>Quantidade			</th>
";
	$sql_medicao = "Select * from valores_cotacao where empresa = '$empresa' and cod_cotacao = '$cotacao' group by cnpj_fornecedor  ";
	$query_medicao = mysqli_query($con, $sql_medicao);
	$a = 0;
	while ($dado_medicao = $query_medicao->fetch_assoc()) {
		$cnpj_fornecedor = $dado_medicao['cnpj_fornecedor'];
		
		$fantasia_forn = buscarNome( $con, $cnpj_fornecedor );
		if(!empty($fantasia_forn)){
			$cnpj_fornecedor = "$fantasia_forn - $cnpj_fornecedor";
		}
		
		$a = $a + 1;
		$html .= "<th style='border-right:solid #0E3BA4 1px;' id='c'>$cnpj_fornecedor</th>";
	}
$html .= "
				<th style='font-size: 08px' id='a'>Último Fornecedor	</th>
				<th style='font-size: 08px' id='b'>Melhor Preço Unit.	</th>
				<th style='font-size: 08px' id='b'>Melhor Preço Total	</th>
				<th style='font-size: 08px' id='b'>Fornecedor Melhor Preço</th>
			</tr>
		</thead>
		<tbody>
";

$valor_mais_baixo = 0;
$valor_mais_baix_total = 0;
$soma_valores_totais = 0;
$soma_qtde = 0;
$soma_qtde_t = 0;
$fantasia = 0;
$valor_mais_baixo_final = 0;


$sql_2 = "Select * from cotacao where cod_empresa = $empresa and cod_cotacao = $cotacao";
$query_2 = $con->query($sql_2);
	while ($dado_2 = $query_2->fetch_assoc()) {
		$id_cotacao 			= $dado_2['id_cotacao'];
		$data_ultima_compra 	= implode("/",array_reverse(explode("-",$dado['data_ultima_compra'])));
		$valor_ultima_compra 	= number_format($dado_2['valor_ultima_compra'],2, ',', '.');
		$quantidade_f 			= number_format($dado_2['quantidade'],3, ',', '.');
		$quantidade 			= $dado_2['quantidade'];
		$codigo_produto 		= $dado_2['codigo_produto'];
		$fantasia = "";
		
		

$html .= "
			<tr>
				<td>". $dado_2['numero_item'] ."</td>
				<td>". $dado_2['codigo_produto'] ."</td>
				<td>". $dado_2['desc_produto'] ."</td>
				<td>". $dado_2['tipo_unidade'] ."</td>
				<td>". $dado_2['tipo_peca'] ."</td>
				<td style='text-align:left'>". $quantidade_f ."</td>
";


/*
	$sql_medicao_2 = "
		SELECT cf.*, f.* from cotacao_fornecedores cf
		LEFT JOIN fornecedores f	ON cf.fk_id_fornecedores  = f.id_fornecedor 
		where cod_empresa = $empresa and cod_cotacao = $cotacao;
	";
	$query_medicao_2 = mysqli_query($con_softline, $sql_medicao_2);
	while ($dado_medicao_2 = $query_medicao_2->fetch_assoc()) {
		$id_cotacao_fornecedores = $dado_medicao_2['id_cotacao_fornecedores'];
		$fk_id_fornecedores 	= $dado_medicao_2['fk_id_fornecedores'];
		$fantasia 				= $dado_medicao_2['fantasia'];

		$valor_unit = '0.00';
		$color = "";
		$valor_unit_id = "";
		$marca = "-";
		$icms = "0,00";
		$ipi_f = "0,00";
		$calculo_ipi_format = "0,00";
		$data_entrega = "";
		$prazo_pagamento = "0";

$html .= "
				<td style='text-align:left;'>V.Unit: <b style='font-size:8px'>".$valor_unit_f."</b><br>
					V. Total: <b style='text-align:right;font-size:8px'>".$valor_total_unitario_f."</b><br>
					Marca: ".$marca."<br>
					IMCS: ".$icms."<br>
					IPI: ".$ipi_f."<br>
					Cálculo IPI: ".$calculo_ipi_format."<br>
					Entrega:".$data_entrega."<br>
					Pagamento:".$prazo_pagamento." ".$dias."<br>
					Valor do Frete:".$vlr_frete."<br>
				</td>
";
	}
*/


	$sql_medicao_2 = "Select cnpj_fornecedor from valores_cotacao where empresa = '$empresa' and cod_cotacao = '$cotacao' group by cnpj_fornecedor	";
	$query_medicao_2 = mysqli_query($con, $sql_medicao_2);
	while ($dado_medicao_2 = $query_medicao_2->fetch_assoc()){
		$color = "";
		
		$cnpj_fornecedor = $dado_medicao_2['cnpj_fornecedor'];
		
		$verifica = "Select * from valores_cotacao 
			where empresa = '$empresa' and cod_cotacao = '$cotacao' 
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
		
		$sql_destaca = $con->query(" SELECT id_valores_cotacao, cnpj_fornecedor FROM valores_cotacao cv  
			where cv.fk_id_cotacao = '$id_cotacao' and cv.valor_unitario > '0.00'
			order by cv.valor_unitario ASC limit 1 ");
		$row_destaca 	= mysqli_fetch_array($sql_destaca);
		if($row_destaca > 0){
			$id_valores_cotacao = $row_destaca['id_valores_cotacao'];
			if($id_valores_cotacao == $valor_unit_id){
				$color = "style='background-color:#03fc35'";
				$fantasia = $row_destaca['cnpj_fornecedor'];
			}
			else{
				$color = "";
			}
		}
		
		$html .= "<td $color> 
			V. Unit: $valor_unit<br><br>
			Marca: $marca<br><br>
			Calculo IPI: $calculo_ipi_format<br><br>
			Dt. Entrega: $data_entrega<br><br>
			Prazo Pagamento: $prazo_pagamento<br><br>
			Valor do Frete: $valor_frete
		</td>";
	}
	
	
	
	
	
	
$html .= "
				
";

	

	$valor_mais_baix_total_f = number_format($valor_mais_baix_total, 2, ',', '.');

$html .= "
				<td style='text-align:center'>". $dado_2['desc_fornecedor'] ."</td>
				<td style='text-align:right; font-weight: bold'>". $valor_mais_baixo ."</td>
				<td style='text-align:right; font-weight: bold'>". $valor_mais_baix_total_f ."</td>
				<td style='text-align:left'>". $fantasia ."</td>
			</tr>
";
		
		//$valor_mais_baixo_final += $valor_mais_baix;
		//$soma_valores_totais += $valor_mais_baix_total;
		
		$retorno_qtde['dados'] = $quantidade;
		$soma_qtde += $retorno_qtde['dados'];
	}
	
	//$retorno_qtde_t['dados'] = $soma_qtde;
	//$soma_qtde_t += $retorno_qtde_t['dados'];
	//$soma_qtde_t 			= number_format($soma_qtde_t, 2, ',', '.');
	//$soma_valores_totais 	= number_format($soma_valores_totais, 2, ',', '.');
	//$valor_mais_baixo_final = number_format($valor_mais_baixo_final, 2, ',', '.');









$html .= "
		</tbody>
		<tfoot >
			<tr class='print'>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
";
			for($i = 0; $i < $a; $i++ ){
$html .= "
				<th></th>
";
			}
$html .= "
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</tfoot>	
	</table>
";


$html .= " <br><br>";


$html .= "<div class='assinaturas'>
			<p style='text-align:center;'><strong>&nbsp; - </strong></p></div>";
$html .= "<br><br><br>";


$html .= "	</div>";
$html .= "	</body>";
$html .= "	</html>";

	}

//echo $html;


use Dompdf\Dompdf;
require_once('../../../dompdf/autoload.inc.php');
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();


$dompdf->stream(
	"Relatorio_Cotacao_Fornecedores.pdf",
	array(
		"Attachment" => false
	)
);

	?>
