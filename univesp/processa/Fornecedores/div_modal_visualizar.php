<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	
	include "../../conectar.php"; 
	$ID 		= filter_input(INPUT_GET, "ID");

	$verifica = "Select * from fornecedores where id_fornecedor = '$ID'";
	$resultado = mysqli_query($con, $verifica);
	$row = mysqli_fetch_assoc($resultado);
	if ($row > 0){
?>
	<input type="hidden" value="<?php echo $ID;?>" id="edit_id" name="edit_id" />
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-1">
			<label for="">Código: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['cod_fornecedor'];?>" readonly />
		</div>	

		<div class="col-md-5">
			<label for="">Razão Social: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['razao_social'];?>" readonly />
		</div>

		<div class="col-md-6 form-row">
			<div class="col-md-7">
				<label for="">Fantasia: </label>
				<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['fantasia'];?>" readonly />
			</div>

			<div class="col-md-5">
				<label for="">CPF/CNPJ: </label>
				<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['cnpj'];?>" readonly />
			</div>
		</div>
	</div>
<?php
	}
?>