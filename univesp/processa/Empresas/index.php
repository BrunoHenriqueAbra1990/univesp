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

	$sql = " Select * from empresas order by cod_unidade";
	$query = $con->query($sql);
?>

<style>
	#select_fixed_usuarios tr td{
		font-size:10px;
	}
</style>

<div class="col-md-12  " >EMPRESAS
	<table id="select_fixed_usuarios" class="display table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th> Ações				</th>
				<th> Código da Empresa	</th>
				<th> Razão Social		</th>
				<th> Fantasia			</th>
				<th> CNPJ				</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$valor_total = 0;
				while ($dado = $query->fetch_assoc()) {
					$id =  $dado['id_empresas'];
			?>
			<tr>
				<td>
					<?php
						echo "<a onclick=\"visualizarRegistro('$id', 'empresa')\" title=\"Visualizar Registro\" style=\"color:blue\"  id=\"btn_visualizar_registro\"><i class=\"far fa-eye fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"editarRegistro('$id', 'empresa')\" title=\"Editar Registro\" style=\"color:green\"  id=\"btn_editar_registro\"><i class=\"far fa-edit fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"excluir('$id', 'excluir_empresa')\" title=\"Excluir Registro\" style=\"color:red\"  id=\"btn_excluir_registro\"><i class=\"fas fa-trash-alt fa-1x\"></i></a> &nbsp;";
					?>
				</td>
				<td><?php echo $dado['cod_unidade']; ?></td>
				<td><?php echo $dado['descricao_empresa'];?></td>
				<td><?php echo $dado['apelido']; echo " - "; echo $dado['apelido_empresa']; ?></td>
				<td><?php echo $dado['cnpj']; ?></td>
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
	<a onclick="cadastrarRegistro('EMPRESA')" ><button class="button_redondo button1">+</button></a>
</div>
