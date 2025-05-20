<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	$Parametro 		= filter_input(INPUT_GET, "Parametro");

	include "../conectar.php"; 
	
	echo "$Parametro";
	
	echo "<input type='hidden' value='$Parametro' id='cad_parametro' name='cad_parametro' />";
	
if($Parametro == 'USUARIO'){
?>
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-5">
			<label for="cad_usuario">Nome do Usuário: </label>
			<input type="" class="col-md-12 form-control" name="cad_usuario" id="cad_usuario" value="" required />
		</div>

		<div class="col-md-3">
			<label for="cad_login">Login: </label>
			<input type="" class="col-md-12 form-control" name="cad_login" id="cad_login" value="" required />
		</div>
		
		<div class="col-md-2">
			<label for="cad_nivel">Nível: </label>
			<select class="col-md-12 form-control" name="cad_nivel" id="cad_nivel" required >
				<option value="" >------</option>
				<option value="1" >1</option>
				<option value="2" >2</option>
				<option value="3" >3</option>
				<option value="4" >4</option>
				<option value="5" >5</option>
			</select>
		</div>	
		
		<div class="col-md-2">
			<label for="cad_senha">Senha: </label>
			<input type="password" class="col-md-12 form-control" name="cad_senha" id="cad_senha" value="" required />
		</div>
	</div>
<?php
}
elseif($Parametro == 'FORNECEDORES'){
?>
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-6 form-row">
			<div class="col-md-3">
				<label for="cad_codigo_fornecedor">Código: </label>
				<input type="number" class="col-md-12 form-control" name="cad_codigo_fornecedor" id="cad_codigo_fornecedor" value="" min="0"   />
			</div>	

			<div class="col-md-9">
				<label for="cad_razao_fornecedor">Razão Social: </label>
				<input type="" class="col-md-12 form-control" name="cad_razao_fornecedor" id="cad_razao_fornecedor" value=""  />
			</div>
		</div>

		<div class="col-md-6 form-row">
			<div class="col-md-7">
				<label for="cad_fantasia_fornecedor">Fantasia: </label>
				<input type="" class="col-md-12 form-control" name="cad_fantasia_fornecedor" id="cad_fantasia_fornecedor" value="" required />
			</div>

			<div class="col-md-5">
				<label for="cad_cnpj_forncedor">CPF/CNPJ: </label>
				<input type="" class="col-md-12 form-control" name="cad_cnpj_forncedor" id="cad_cnpj_forncedor"  onkeypress='mascaraMutuario(this,cpfCnpj)' maxLength="18" required />
			</div>
		</div>
	</div>
<?php
}
elseif($Parametro == 'PRODUTOS'){
?>
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-2">
			<label for="cad_codigo_produto">Código: </label>
			<input type="number" class="col-md-12 form-control" name="cad_codigo_produto" id="cad_codigo_produto" value="" min="0"   />
		</div>

		<div class="col-md-6">
			<label for="cad_produto">Descrição: </label>
			<input type="" class="col-md-12 form-control" name="cad_produto" id="cad_produto" value=""  />
		</div>
		
		<div class="col-md-1">
			<label for="cad_unidade">Unidade: </label>
			<select class="col-md-12 form-control" name="cad_unidade" id="cad_unidade" required >
				<!--<option value="">Escolha uma Unidade</option>-->
				<?php
				$result_empresas = "SELECT * FROM produtos group by unidade order by unidade";
				$resultado_empresas = mysqli_query($con, $result_empresas);
				while($row_empresas = mysqli_fetch_assoc($resultado_empresas)){ 
				?> 
				<option value="<?php echo $row_empresas['unidade'];?>" >
					<?php echo $row_empresas['unidade']; ?>
				</option> 
				<?php
					}
				?>
			</select>
		</div>	
		
		<div class="col-md-3">
			<label for="cad_grupo">Grupo: </label>
			<select class="col-md-12 form-control" name="cad_grupo" id="cad_grupo" required >
				<option value="">Escolha um Grupo</option>
				<?php
				$result_empresas = "SELECT * FROM produtos group by grupo order by grupo";
				$resultado_empresas = mysqli_query($con, $result_empresas);
				while($row_empresas = mysqli_fetch_assoc($resultado_empresas)){ 
				?> 
				<option value="<?php echo $row_empresas['grupo'];?>" >
					<?php echo $row_empresas['grupo']; ?>
				</option> 
				<?php
					}
				?>
			</select>
		</div>
	</div>
<?php
}
elseif($Parametro == 'COTAÇÕES'){
?>
	
<?php
}
elseif($Parametro == 'EMPRESA'){
?>
<div class="form-row contorno_reto col-md-12" id="">
	<div class="col-md-1">
		<label for="cad_codigo_empresa">Código: </label>
		<input type="number" class="col-md-12 form-control" name="cad_codigo_empresa" id="cad_codigo_empresa" value="" min="0"  />
	</div>

	<div class="col-md-5">
		<label for="cad_razao_social">Razão Social: </label>
		<input type="" class="col-md-12 form-control" name="cad_razao_social" id="cad_razao_social" value=""  />
	</div>
	
	<div class="col-md-3">
		<label for="cad_fantasia">Fantasia: </label>
		<input type="" class="col-md-12 form-control" name="cad_fantasia" id="cad_fantasia" value=""  />
	</div>	
	
	<div class="col-md-3">
		<label for="cad_cnpj">CNPJ: </label>
		<input type="" class="col-md-12 form-control" name="cad_cnpj_empresa" id="cad_cnpj_empresa" value="" onkeypress='mascaraMutuario(this,cpfCnpj)' maxLength="18"/>
	</div>
</div>
<?php
}
?>