<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	$Parametro 		= filter_input(INPUT_GET, "Parametro");
	$ID 		= filter_input(INPUT_GET, "Id");

	include "../conectar.php"; 
	
	echo "$Parametro";
	
	echo "<input type='hidden' value='$Parametro' id='edit_parametro' name='edit_parametro' />";
	echo "<input type='hidden' value='$ID' id='edit_id' name='edit_id' />";
	
if($Parametro == 'usuario'){
	
	$verifica = "Select * from usuarios where id_usuario = '$ID'";
	$resultado = mysqli_query($con, $verifica);
	$row = mysqli_fetch_assoc($resultado);
	if ($row > 0){

?>
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-5">
			<label for="edit_usuario">Nome do Usuário: </label>
			<input type="" class="col-md-12 form-control" name="edit_usuario" id="edit_usuario" value="<?php echo $row['nome'];?>" required />
		</div>

		<div class="col-md-3">
			<label for="edit_login">Login: </label>
			<input type="" class="col-md-12 form-control" name="edit_login" id="edit_login" value="<?php echo $row['usuario'];?>" required />
		</div>
		
		<div class="col-md-2">
			<label for="edit_nivel">Nível: </label>
			<select class="col-md-12 form-control" name="edit_nivel" id="edit_nivel" required >
				<option value="" >------</option>
				<option <?php if ($row['nivel']=='1') echo 'selected' ; ?> value="1" >1</option>
				<option <?php if ($row['nivel']=='2') echo 'selected' ; ?> value="2" >2</option>
				<option <?php if ($row['nivel']=='3') echo 'selected' ; ?> value="3" >3</option>
				<option <?php if ($row['nivel']=='4') echo 'selected' ; ?> value="4" >4</option>
				<option <?php if ($row['nivel']=='5') echo 'selected' ; ?> value="5" >5</option>
			</select>
		</div>	
		
		<div class="col-md-2">
			<label for="edit_senha">Senha: </label>
			<input type="password" class="col-md-12 form-control" name="edit_senha" id="edit_senha" value="<?php echo $row['senha'];?>" required />
		</div>
	</div>
<?php
	}

	

}
elseif($Parametro == 'fornecedor'){
	
	$verifica = "Select * from fornecedores where id_fornecedor = '$ID'";
	$resultado = mysqli_query($con, $verifica);
	$row = mysqli_fetch_assoc($resultado);
	if ($row > 0){
?>
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-6 form-row">
			<div class="col-md-3">
				<label for="edit_codigo_fornecedor">Código: </label>
				<input type="number" class="col-md-12 form-control" name="edit_codigo_fornecedor" id="edit_codigo_fornecedor" value="<?php echo $row['cod_fornecedor'];?>" min="0"   />
			</div>	

			<div class="col-md-9">
				<label for="edit_razao_fornecedor">Razão Social: </label>
				<input type="" class="col-md-12 form-control" name="edit_razao_fornecedor" id="edit_razao_fornecedor" value="<?php echo $row['razao_social'];?>"  />
			</div>
		</div>

		<div class="col-md-6 form-row">
			<div class="col-md-7">
				<label for="edit_fantasia_fornecedor">Fantasia: </label>
				<input type="" class="col-md-12 form-control" name="edit_fantasia_fornecedor" id="edit_fantasia_fornecedor" value="<?php echo $row['fantasia'];?>" required />
			</div>

			<div class="col-md-5">
				<label for="edit_cnpj_forncedor">CPF/CNPJ: </label>
				<input type="" class="col-md-12 form-control" name="edit_cnpj_forncedor" id="edit_cnpj_forncedor"  onkeypress='mascaraMutuario(this,cpfCnpj)' maxLength="18" value="<?php echo $row['cnpj'];?>" required />
			</div>
		</div>
	</div>
<?php
	}
}
elseif($Parametro == 'produto'){
	
	$verifica = "Select * from produtos where id_produto = '$ID'";
	$resultado = mysqli_query($con, $verifica);
	$row = mysqli_fetch_assoc($resultado);
	if ($row > 0){
?>
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-2">
			<label for="edit_codigo_produto">Código: </label>
			<input type="number" class="col-md-12 form-control" name="edit_codigo_produto" id="edit_codigo_produto" value="<?php echo $row['codigo_produto'];?>" min="0"   />
		</div>

		<div class="col-md-6">
			<label for="edit_produto">Descrição: </label>
			<input type="" class="col-md-12 form-control" name="edit_produto" id="edit_produto" value="<?php echo $row['desc_produto'];?>"  />
		</div>
		
		<div class="col-md-1">
			<label for="edit_unidade">Unidade: </label>
			<input type="" class="col-md-12 form-control" name="edit_unidade" id="edit_unidade" value="<?php echo $row['unidade'];?>"  />
		</div>	
		
		<div class="col-md-3">
			<label for="edit_grupo">Grupo: </label>
			<input type="" class="col-md-12 form-control" name="edit_grupo" id="edit_grupo" value="<?php echo $row['grupo'];?>"  />
		</div>
	</div>
<?php
	}
}
elseif($Parametro == 'cotacao'){
?>
	
<?php
}
elseif($Parametro == 'empresa'){
	
	$verifica = "Select * from produtos where id_produto = '$ID'";
	$resultado = mysqli_query($con, $verifica);
	$row = mysqli_fetch_assoc($resultado);
	if ($row > 0){
?>
<div class="form-row contorno_reto col-md-12" id="">
	<div class="col-md-1">
		<label for="edit_codigo_empresa">Código: </label>
		<input type="number" class="col-md-12 form-control" name="edit_codigo_empresa" id="edit_codigo_empresa" value="<?php echo $row['cod_unidade'];?>" min="0"  />
	</div>

	<div class="col-md-5">
		<label for="edit_razao_social">Razão Social: </label>
		<input type="" class="col-md-12 form-control" name="edit_razao_social" id="edit_razao_social" value="<?php echo $row['descricao_empresa'];?>"  />
	</div>
	
	<div class="col-md-3">
		<label for="edit_fantasia">Fantasia: </label>
		<input type="" class="col-md-12 form-control" name="edit_fantasia" id="edit_fantasia" value="<?php echo $row['apelido_empresa'];?>"  />
	</div>	
	
	<div class="col-md-3">
		<label for="edit_cnpj">CNPJ: </label>
		<input type="" class="col-md-12 form-control" name="edit_cnpj_empresa" id="edit_cnpj_empresa" value="<?php echo $row['cnpj'];?>" onkeypress='mascaraMutuario(this,cpfCnpj)' maxLength="18"/>
	</div>
</div>
<?php
	}
}
?>