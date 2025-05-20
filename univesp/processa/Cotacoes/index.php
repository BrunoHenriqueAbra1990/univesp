<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$ano_mes			= date("Y-m");
	$date 				= date("Y-m-d");
	$date_time 			= date("Y-m-d H:i:s");
	
	include "../../links_includes/script.php"; 
	include "../../conectar.php"; 

	$sql = " Select * from cotacao where data like '2025-04%' group by cod_empresa, cod_cotacao";
	$query = $con->query($sql);
?>

<style>
	#select_fixed_cotacao tr td{
		font-size:10px;
	}
</style>

<div class="col-md-12  " >COTAÇÕES
	<table id="select_fixed_cotacao" class="display table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th> Ações					</th>
				<th> Código Empresa			</th>
				<th> Código Cotação			</th>
				<th> Data da Cotação		</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$valor_total = 0;
				while ($dado = $query->fetch_assoc()) {
					$id = $dado['id_cotacao'];
					$cod_empresa = $dado['cod_empresa'];
					$cod_cotacao = $dado['cod_cotacao'];
			?>
			<tr>
				<td>
					<?php
						echo "<a onclick=\"visualizarRegistro('$id', 'cotacao')\" title=\"Visualizar Registro\" style=\"color:blue\"  id=\"btn_visualizar_registro\"><i class=\"far fa-eye fa-1x\"></i></a> &nbsp;";
						//echo "<a onclick=\"visualizarCotacao('$cod_empresa', '$cod_cotacao')\" title=\"Visualizar Cotação\" style=\"color:green\"  id=\"btn_visualizar_cotacao\"><i class=\"far fa-eye fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"editarRegistro('$id', 'cotacao')\" title=\"Editar Registro\" style=\"color:green\"  id=\"btn_editar_registro\"><i class=\"far fa-edit fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"excluir('$id', 'excluir_cotacao')\" title=\"Excluir Registro\" style=\"color:red\"  id=\"btn_excluir_registro\"><i class=\"fas fa-trash-alt fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"enviarWhats($id)\" title=\"Enviar WhatsApp\" style=\"color:green\" ><i class=\"fa-brands fa-whatsapp fa-1x\"></i></a>&nbsp;";
						echo "<a onclick=\"enviarEmail($id)\" title=\"Enviar Email\" style=\"color:#1a73e8\" ><i class=\"fa-regular fa-envelope fa-1x\"></i></a>&nbsp;";
					?>
<a href="<?php echo "processa/Cotacoes/imprimir.php?empresa=$cod_empresa&cotacao=$cod_cotacao";?>" 
		target="_blank" title="Gerar relatório em arquivo PDF" style="color:#f8c261"><i class="fas fa-file-pdf fa-1x"></i></a> &nbsp;
				</td>
				<td><?php echo $dado['cod_empresa']; ?></td>
				<td><?php echo $dado['cod_cotacao']; ?></td>
				<td><?php echo implode("/",array_reverse(explode("-", $dado['data']))); ?></td>
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
			</tr>
		</tfoot>
	</table>
</div>

<div id="container-botoes" >
	<a onclick="cadastrarRegistro('COTACAO')" ><button class="button_redondo button1">+</button></a>
</div>

<script>

	async function enviarWhats(id){
		const enviarCotacaoModal = new bootstrap.Modal(document.getElementById("enviarCotacaoModal"));
		enviarCotacaoModal.show();
		$.post('processa/Cotacoes/div_modal_enviar_cotacao.php?ID='+id+'&Parametro=WHATSAPP', function(retorna){
			$("#div_modal_enviar_cotacao").html(retorna);
		});
	}
	
	async function enviarEmail(id){
		const enviarCotacaoModal = new bootstrap.Modal(document.getElementById("enviarCotacaoModal"));
		enviarCotacaoModal.show();
		$.post('processa/Cotacoes/div_modal_enviar_cotacao.php?ID='+id+'&Parametro=EMAIL', function(retorna){
			$("#div_modal_enviar_cotacao").html(retorna);
		});
	}
	
	const formEnviarCotacao = document.getElementById("form-enviar_cotacao");
	if (formEnviarCotacao) {
		formEnviarCotacao.addEventListener("submit", async(e) => {
			e.preventDefault();
			const dadosForm = new FormData(formEnviarCotacao);
			console.log(dadosForm);
			
			document.getElementById("msgAlertaEnviarCotacao").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, salvando o registro!</div>";
			const dados = await fetch("bd/enviar_cotacao.php", {
				method: "POST",
				body: dadosForm
			});
			const resposta = await dados.json();
			console.log(resposta);
			
			if (resposta['status']) {
				document.getElementById("msgAlertaEnviarCotacao").innerHTML = "";
				alert(resposta['msg']);
			}else {
				document.getElementById("msgAlertaEnviarCotacao").innerHTML = resposta['msg'];
			}
		});
	}


	async function visualizarValorLiquido( id, parametro){
	console.log(id);
	console.log(parametro);
		console.log( id +' . '+ parametro);
		
		if(parametro === 'exceder_jornada'){
			document.getElementById("tipo_irregularidade").innerText = "EXCESSO DE HORAS EXTRAS";
		}
		
		if(parametro === 'interjornada'){
			document.getElementById("tipo_irregularidade").innerText = "INTER JORNADAS";
		}
				
		if(parametro === 'intervalo_reduzido'){
			document.getElementById("tipo_irregularidade").innerText = "INTERVALO REDUZIDO";
		}
		
		const visualizaModalJustificar = new bootstrap.Modal(document.getElementById("visualizaModalJustificar"));
		visualizaModalJustificar.show();
		
		document.getElementById("div_modal_justificativa").innerHTML = "<div class='form-row'><div class='col-md-4'></div><img src='../../../../imagens/loading.gif' style='width:300px; heigth:300px;'></img></div>";
		$.post('processa/div_modal_justificativa.php?Id='+id+'&Parametro='+parametro, function(retorna){
			$("#div_modal_justificativa").html(retorna);
		});
	}
</script>