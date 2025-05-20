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

	$sql = " Select * from fornecedores where fornecedor_inativo = '0' order by razao_social ";
	$query = $con->query($sql);
?>

<style>
	#select_fixed_fornecedores tr td{
		font-size:10px;
	}
</style>

<div class="col-md-12  " >FORNECEDORES
	<table id="select_fixed_fornecedores" class="display table table-striped table-bordered table-hover ">
		<thead>
			<tr>
				<th> Ações					</th>
				<th> Código Fornecedor		</th>
				<th> Razão Social			</th>
				<th> Fantasia				</th>
				<th> CPF/CNPJ				</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$valor_total = 0;
				while ($dado = $query->fetch_assoc()) {
					$id = $dado['id_fornecedor'];
					
					$cnpj = $dado['cnpj'];
					$cnpj = str_replace( " ", "", $cnpj);
					$quantidade = strlen($cnpj);
					if ($quantidade == '14'){
						$digito = substr($cnpj, 12, 2 );
						$mil_contra = substr($cnpj, 8, 4);
						$tres_meio = substr($cnpj, 5, 3);
						$tres = substr($cnpj, 2, 3);
						$dois = substr($cnpj, 0, 2);
						$cnpj = "$dois.$tres.$tres_meio/$mil_contra-$digito";
					}
					if ($quantidade == '11'){
						$digito = substr($cnpj, 9, 2);
						$tres_meio = substr($cnpj, 6, 3);
						$tres = substr($cnpj, 3, 3);
						$dois = substr($cnpj, 0, 3);
						$cnpj = "$dois.$tres.$tres_meio-$digito";
					}
			?>
			<tr>
				<td>
					<?php
						echo "<a onclick=\"visualizarRegistro('$id', 'fornecedor')\" title=\"Visualizar Registro\" style=\"color:blue\"  id=\"btn_visualizar_registro\"><i class=\"far fa-eye fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"editarRegistro('$id', 'fornecedor')\" title=\"Editar Registro\" style=\"color:green\"  id=\"btn_editar_registro\"><i class=\"far fa-edit fa-1x\"></i></a> &nbsp;";
						echo "<a onclick=\"excluir('$id', 'excluir_fornecedor')\" title=\"Excluir Registro\" style=\"color:red\"  id=\"btn_excluir_registro\"><i class=\"fas fa-trash-alt fa-1x\"></i></a> &nbsp;";
					?>
				</td>
				<td><?php echo $dado['cod_fornecedor']; ?></td>
				<td><?php echo $dado['razao_social'];?></td>
				<td><?php echo $dado['fantasia']; ?></td>
				<td><?php echo $cnpj; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
		
		<tfoot>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</tfoot>
	</table>
</div>

<div id="container-botoes" >
	<a onclick="cadastrarRegistro('FORNECEDORES')" ><button class="button_redondo button1">+</button></a>
</div>

