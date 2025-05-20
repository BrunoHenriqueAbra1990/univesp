<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	
	include "../../conectar.php"; 
	$ID 		= filter_input(INPUT_GET, "ID");

	$verifica = "Select * from usuarios where id_usuario = '$ID'";
	$resultado = mysqli_query($con, $verifica);
	$row = mysqli_fetch_assoc($resultado);
	if ($row > 0){
?>
	<input type="hidden" value="<?php echo $ID;?>" id="edit_id" name="edit_id" />
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-5">
			<label for="">Nome do Usuário: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['nome'];?>" readonly />
		</div>

		<div class="col-md-3">
			<label for="">Login: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['usuario'];?>" readonly />
		</div>
		
		<div class="col-md-2">
			<label for="">Nível: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['nivel'];?>" readonly />
		</div>	
		
		<div class="col-md-2">
			<label for="">Status: </label>
			<input type="" class="col-md-12 form-control" name="" id="" value="<?php echo $row['status'];?>" readonly />
		</div>
	</div>
<?php
	}
?>