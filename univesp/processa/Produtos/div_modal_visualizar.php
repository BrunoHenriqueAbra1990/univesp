<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	
	include "../../conectar.php"; 
	$ID 		= filter_input(INPUT_GET, "ID");

	$verifica = "Select * from produtos where id_produto = '$ID'";
	$resultado = mysqli_query($con, $verifica);
	$row = mysqli_fetch_assoc($resultado);
	if ($row > 0){
?>
	<input type="hidden" value="<?php echo $ID;?>" id="edit_id" name="edit_id" />
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-2">
			<label for="">Código: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['codigo_produto'];?>" readonly />
		</div>

		<div class="col-md-6">
			<label for="">Descrição: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['desc_produto'];?>" readonly />
		</div>
		
		<div class="col-md-1">
			<label for="">Unidade: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['unidade'];?>" readonly />
		</div>	
		
		<div class="col-md-3">
			<label for="">Grupo: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['grupo'];?>" readonly />
		</div>
	</div>
<?php
	}
?>