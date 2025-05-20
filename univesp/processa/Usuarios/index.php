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

	$sql = " Select * from usuarios";
	$query = $con->query($sql);
?>

<style>
	#select_fixed_usuarios tr td{
		font-size:10px;
	}
</style>

<div class="col-md-12  " >USUARIOS
	<table id="select_fixed_usuarios" class="display table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th> Ações				</th>
				<th> Nome do Usuário	</th>
				<th> Login de Acesso	</th>
				<th> Senha				</th>
				<th> Nível de Acesso	</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$valor_total = 0;
				while ($dado = $query->fetch_assoc()) {
					$id =  $dado['id_usuario'];
			?>
			<tr>
				<td>
					<?php
						echo "<a onclick=\"visualizarRegistro('$id', 'usuario')\" title=\"Visualizar Registro\" style=\"color:blue\"  id=\"btn_visualizar_registro\"><i class=\"far fa-eye fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"editarRegistro('$id', 'usuario')\" title=\"Editar Registro\" style=\"color:green\"  id=\"btn_editar_registro\"><i class=\"far fa-edit fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"excluir('$id', 'excluir_usuario')\" title=\"Excluir Registro\" style=\"color:red\"  id=\"btn_excluir_registro\"><i class=\"fas fa-trash-alt fa-1x\"></i></a> &nbsp;";
					?>
				</td>
				<td><?php echo $dado['nome']; ?></td>
				<td><?php echo $dado['usuario'];?></td>
				<td><?php //echo $dado['senha']; ?>******</td>
				<td><?php echo $dado['nivel']; ?></td>
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
	<a onclick="cadastrarRegistro('USUARIO')" ><button class="button_redondo button1">+</button></a>
</div>
