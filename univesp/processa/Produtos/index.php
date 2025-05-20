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

	$sql = " Select * from produtos where data_fim = '0' and eh_almoxarifado = '1' ";
	$query = $con->query($sql);
?>

<style>
	#select_fixed_produtos tr td{
		font-size:10px;
	}
</style>

<div class="col-md-12  " >PRODUTOS
	<table id="select_fixed_produtos" class="display table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th> Ações				</th>
				<th> Código Produto		</th>
				<th> Descrição Produto	</th>
				<th> Tipo de Unidade	</th>
				<th> Grupo				</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$valor_total = 0;
				while ($dado = $query->fetch_assoc()) {
					$id = $dado['id_produto']
			?>
			<tr>
				<td>
					<?php
						echo "<a onclick=\"visualizarRegistro('$id', 'produto')\" title=\"Visualizar Registro\" style=\"color:blue\"  id=\"btn_visualizar_registro\"><i class=\"far fa-eye fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"editarRegistro('$id', 'produto')\" title=\"Editar Registro\" style=\"color:green\"  id=\"btn_editar_registro\"><i class=\"far fa-edit fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"excluir('$id', 'excluir_produto')\" title=\"Excluir Registro\" style=\"color:red\"  id=\"btn_excluir_registro\"><i class=\"fas fa-trash-alt fa-1x\"></i></a> &nbsp;";
					?>
				</td>
				<td><?php echo $dado['codigo_produto']; ?></td>
				<td><?php echo $dado['desc_produto'];?></td>
				<td><?php echo $dado['unidade']; ?></td>
				<td><?php echo $dado['grupo']; ?></td>
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
			</tr>
		</tfoot>
	</table>
</div>


<div id="container-botoes" >
	<a onclick="cadastrarRegistro('PRODUTOS')" ><button class="button_redondo button1">+</button></a>
</div>

