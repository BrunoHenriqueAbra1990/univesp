<?php
	if(!isset($_SESSION)) { session_start(); }
	$id_usuario 		= $_SESSION['id_usuario'];
	$nivel 				= $_SESSION['nivel'];
	$usuario 			= $_SESSION['nome'];
	$date_time 			= date("Y-m-d");
	
	include "../../conectar.php"; 
	$ID 		= filter_input(INPUT_GET, "ID");
	$Parametro 		= filter_input(INPUT_GET, "Parametro");

	//$verifica = "Select * from controle_ponto where id_controle_ponto = '$ID'";
	//$resultado = mysqli_query($con, $verifica);
	//$row = mysqli_fetch_assoc($resultado);
	//if ($row > 0){
	//	$data_registro 		= $row['data_registro'];
	//	$nome_funcionario 	= $row['nome_funcionario'];
	//	$celular 			= $row['celular'];
	//	$fk_id_usuario 		= $row['fk_id_usuario'];
	//	$hash 				= $row['hash'];
	
	echo "<input type=\"hidden\" value=\"$ID\" id=\"edit_id_irregularidade\" name=\"edit_id_irregularidade\" />";
	echo "<input type=\"hidden\" value=\"$Parametro\" id=\"parametro\" name=\"parametro\" />";
	
$verifica = "Select * from cotacao where id_cotacao = '$ID'";
$resultado = mysqli_query($con, $verifica);
$row = mysqli_fetch_assoc($resultado);
if ($row > 0){
	$empresaCotacao = $row['cod_empresa'];
	$numeroCotacao = $row['cod_cotacao'];
}
else{
	$empresaCotacao = "0";
	$numeroCotacao = "0";
}
	
	echo "<input type=\"hidden\" value=\"$empresaCotacao\" id=\"empresaCotacao\" name=\"empresaCotacao\" />";
	echo "<input type=\"hidden\" value=\"$numeroCotacao\" id=\"numeroCotacao\" name=\"numeroCotacao\" />";


	if($Parametro == 'WHATSAPP'){
?>
	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-md-6">
			<label for="">Telefone: </label>
			<input type="tel" class="col-md-12 form-control" name="telefone" id="telefone" value="" placeholder="(99) 99999-9999" />
		</div>
		
		<div class="col-md-6">
			<br>
			<button type="submit" class="btn btn-success far fa-save" id="" name="" style="float: right;">&nbsp; Enviar</button>
		</div>
	</div>
	
	<b style="font-size:14px">Link de acesso: <a href='https://univesp.escritoriovotuporanga.xyz/cotacao.php?Empresa=<?php echo $empresaCotacao;?>&Cotacao=<?php echo $numeroCotacao;?>' target='_blank'>
		https://univesp.escritoriovotuporanga.xyz/cotacao.php?Empresa=<?php echo $empresaCotacao;?>&Cotacao=<?php echo $numeroCotacao;?>
	</b>
<?php
	}	
	if($Parametro == 'EMAIL'){
?>

	<div class="form-row contorno_reto col-md-12" id="">
		<div class="col-sm-12">
			<p class="col-md-12">Para:</p>
			<input type="text" id="email_enviar" name="email_enviar" value="" placeholder="Ex.: fulano@gmail.com; beltrano@hotmail.com" class="form-control col-md-12" />
		</div>
		
		<div class="col-sm-12">
			<p class="col-md-12">Assunto:</p>
			<input type="text" id="assunto" name="assunto" value="Link de Acesso para Cotação de Preços" class="form-control col-md-12" />
		</div>
		
		<div class="col-sm-12">
			<p class="col-md-12"></p>
			<textarea type="text_area" rows='5' id="corpo_email" name="corpo_email" class="form-control col-md-12">Segue abaixo um link para participar da cotação de preços de produtos:	
				https://univesp.escritoriovotuporanga.xyz/cotacao.php?Empresa=<?php echo $empresaCotacao;?>&Cotacao=<?php echo $numeroCotacao;?>
			</textarea>
		</div>
		
		<div class="col-md-12">
			<br>
			<button type="submit" class="btn btn-success far fa-save" id="" name="" style="float: right;">&nbsp; Enviar</button>
		</div>
	</div>
	
<?php
	}
	//}
?>
