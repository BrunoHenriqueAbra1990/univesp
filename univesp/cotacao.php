<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<title>B. H. ABRA</title>
		<link rel="shortcut icon" href="img/B3.ico" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		
		<!-- Preciso destas duas linhas abaixo para funcionar a mascara do DINHEIRO-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$('.dinheiro').mask('#.##0,00', {reverse: true});
		</script>
		
		<?php $diretorio = ""; ?>

		<!-- MENU -->
		<style type="text/css">
			@import "css/style3.css";  
		</style>
		<!-- MENU -->
		
		<!-- DATA TABLES -->
		<style type="text/css">
			@import "DataTables/DataTables-1.10.18/css/jquery.dataTables.css";
			@import "DataTables/DataTables-1.10.18/css/bootstrap2.css";
		</style>
		
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		
		
		<!-- CSS do Bootstrap -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
		<!-- jQuery (obrigatório para o Bootstrap 4) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<!-- JS do Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
		
		<link rel="stylesheet" href="<?php echo $diretorio; ?>/Font-Awesome-6.x/css/all.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo $diretorio; ?>/DataTables/Buttons-1.5.6/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="<?php echo $diretorio; ?>/DataTables/FixedHeader-3.1.4/css/fixedHeader.dataTables.min.css"> 
		<link rel="stylesheet" href="<?php echo $diretorio; ?>/DataTables/FixedColumns-3.2.5/css/fixedColumns.bootstrap.min.css"> 

		<!-- DATA TABLES -->
		<style type="text/css">
			@import "<?php echo $diretorio; ?>/DataTables/DataTables-1.10.18/css/jquery.dataTables.css";
			@import "<?php echo $diretorio; ?>/DataTables/DataTables-1.10.18/css/bootstrap2.css";
		</style>

		<script src="<?php echo $diretorio; ?>/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
		<script src="<?php echo $diretorio; ?>/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

		<script src="<?php echo $diretorio; ?>/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>

		<script src="<?php echo $diretorio; ?>/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
		<script src="<?php echo $diretorio; ?>/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
		<script src="<?php echo $diretorio; ?>/DataTables/Buttons-1.5.6/js/buttons.flash.min.js"></script>
		<script src="<?php echo $diretorio; ?>/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

		<script src="<?php echo $diretorio; ?>/ajax/jszip.min.js"></script>

		<script src="<?php echo $diretorio; ?>/DataTables/FixedHeader-3.1.4/js/dataTables.fixedHeader.min.js"></script>
		<script src="<?php echo $diretorio; ?>/DataTables/FixedColumns-3.2.5/js/dataTables.fixedColumns.min.js"></script>
		
		<link rel="stylesheet" href="estilos/style_cotacao.css">

		<style>
			body {
				background-color: #435165;
				margin:3%;
			}
			
			.contorno_reto{
				border:#1d1d1d solid 1px; 
				border-radius:0px;
				margin-top: 1px;
				padding: 2px !important;
				margin-left: 0px;
				background-color: white;
			}


			#titulo-formulario {
				text-align: center !important;
				background-color: #435165;
				font-family: Verdana;
				font-size: 30px !important;
				font-weight: bold;
				color: black;
			}

			#titulo-formulario b{
				font-family: Verdana;
				font-size: 30px !important;
				font-weight: bold;
				color: black;
			}
			
			#btnSalvarCadastroCotacao{
				margin-top:20px;
				margin-bottom:20px;
			}
			
			#sub_conteudo b{
				font-size: 12px !important;
			}
			
		</style>

    </head>
	<?php
		$tem_cotacao = false;
		$Empresa = "";
		$Cotacao = "";
		
		if((isset($_GET['Empresa']))and(isset($_GET['Cotacao']))){
			$Empresa = $_GET['Empresa'] ?? '0';
			$Cotacao = $_GET['Cotacao'] ?? '0';
			$tem_cotacao = true;
		}
	?>
    <body>
        <div class="">
			<div class="col-md-12"  id="titulo-formulario">
				<b>Sistema de Cotação <?php echo "$Empresa: $Cotacao";?></b>
			</div>
			
			<div class='col-md-12 contorno_reto '>
				<div class="col-md-12 form-row  ">
					<?php if($tem_cotacao == true){ ?>
						<div class="col-md-12 form-row">
							<div class="col-md-4 " id="div_escondida"></div>
						
							<div class="col-md-2 ">
								<p class="col-md-12 ">CPF/CNPJ Fornecedor:</p>
								<input type="" id="cpf_cnpj_pesquisar" name="cpf_cnpj_pesquisar" onkeypress='mascaraMutuario(this,cpfCnpj)' maxLength="18" />
								<input type="hidden" id="empresa_cotacao" name="empresa_cotacao" value="<?php echo $Empresa;?>" />
								<input type="hidden" id="codigo_cotacao" name="codigo_cotacao" value="<?php echo $Cotacao;?>" />
							</div>
							
							<div class="col-md-1" id="" style='text-align: right'>
								<br>
								<button id="" class="btn btn_imprimir btn-default btn-xs" title="Recarregar Informações" onClick="pesquisaNotas()">
									Pesquisar
								</button>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="form-row col-md-12" id="sub_conteudo">
					
				</div>
			</div>
        </div>
		<script src="js/custom_cotacao.js?v=<?= time(); ?>"></script>
		
		<script type='text/javascript'>
			function mascaraMutuario(o,f){
				v_obj=o
				v_fun=f
				setTimeout('execmascara()',1)
			}
			 
			function execmascara(){
				v_obj.value=v_fun(v_obj.value)
			}
			 
			function cpfCnpj(v){
			 
				//Remove tudo o que não é dígito
				v=v.replace(/\D/g,"")
			 
				if (v.length <= 11) { //CPF
					//Coloca um ponto entre o terceiro e o quarto dígitos
					v=v.replace(/(\d{3})(\d)/,"$1.$2")
			 
					//Coloca um ponto entre o terceiro e o quarto dígitos
					//de novo (para o segundo bloco de números)
					v=v.replace(/(\d{3})(\d)/,"$1.$2")
			 
					//Coloca um hífen entre o terceiro e o quarto dígitos
					v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				} else { //CNPJ
					//Coloca ponto entre o segundo e o terceiro dígitos
					v=v.replace(/^(\d{2})(\d)/,"$1.$2")
			 
					//Coloca ponto entre o quinto e o sexto dígitos
					v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
			 
					//Coloca uma barra entre o oitavo e o nono dígitos
					v=v.replace(/\.(\d{3})(\d)/,".$1/$2") 
			 
					//Coloca um hífen depois do bloco de quatro dígitos
					v=v.replace(/(\d{4})(\d)/,"$1-$2")
				}
				return v
			}


			// Funções de validação de CPF e CNPJ
			function validarCPF(cpf) {
				cpf = cpf.replace(/[^\d]+/g, '');

				// Verifica se o CPF tem 11 dígitos
				if (cpf.length !== 11) return false;

				// Verifica se todos os dígitos são iguais
				if (/^(\d)\1{10}$/.test(cpf)) return false;

				// Valida o primeiro dígito verificador
				let sum = 0;
				for (let i = 0; i < 9; i++) sum += parseInt(cpf.charAt(i)) * (10 - i);
				let remainder = 11 - (sum % 11);
				if (remainder === 10 || remainder === 11) remainder = 0;
				if (remainder !== parseInt(cpf.charAt(9))) return false;

				// Valida o segundo dígito verificador
				sum = 0;
				for (let i = 0; i < 10; i++) sum += parseInt(cpf.charAt(i)) * (11 - i);
				remainder = 11 - (sum % 11);
				if (remainder === 10 || remainder === 11) remainder = 0;
				if (remainder !== parseInt(cpf.charAt(10))) return false;

				return true;
			}

			function validarCNPJ(cnpj) {
				cnpj = cnpj.replace(/[^\d]+/g, '');

				// Verifica se o CNPJ tem 14 dígitos
				if (cnpj.length !== 14) return false;

				// Verifica se todos os dígitos são iguais
				if (/^(\d)\1{13}$/.test(cnpj)) return false;

				// Valida o primeiro dígito verificador
				let size = cnpj.length - 2;
				let numbers = cnpj.substring(0, size);
				const digits = cnpj.substring(size);
				let sum = 0;
				let pos = size - 7;
				for (let i = size; i >= 1; i--) {
					sum += numbers.charAt(size - i) * pos--;
					if (pos < 2) pos = 9;
				}
				let remainder = sum % 11 < 2 ? 0 : 11 - (sum % 11);
				if (remainder !== parseInt(digits.charAt(0))) return false;

				// Valida o segundo dígito verificador
				size += 1;
				numbers = cnpj.substring(0, size);
				sum = 0;
				pos = size - 7;
				for (let i = size; i >= 1; i--) {
					sum += numbers.charAt(size - i) * pos--;
					if (pos < 2) pos = 9;
				}
				remainder = sum % 11 < 2 ? 0 : 11 - (sum % 11);
				if (remainder !== parseInt(digits.charAt(1))) return false;

				return true;
			}
			
			document.getElementById('cpf_cnpj_pesquisar').addEventListener('blur', function() {
				var input = this;
				var valor = input.value;
				
				if (valor.length <= 14) { // Verifica se é um CPF
					if (validarCPF(valor)) {
						//alert('CPF válido');
					} else {
						alert('CPF inválido');
					}
				} else { // Verifica se é um CNPJ
					if (validarCNPJ(valor)) {
						//alert('CNPJ válido');
					} else {
						alert('CNPJ inválido');
					}
				}
			});
			
			async function pesquisaNotas(){
				var cpf_cnpj_pesquisar = document.getElementById("cpf_cnpj_pesquisar").value;
				var empresa_cotacao = document.getElementById("empresa_cotacao").value;
				var codigo_cotacao = document.getElementById("codigo_cotacao").value;
				
				document.getElementById("sub_conteudo").innerHTML = "<div class='alert alert-warning' role='alert'>Aguarde, carregando registros! <img src='/img/loading.gif' style='width:50px; heigth:50px'></img></div>";
				$.post('processa/div_lista_cotacao.php?CpfCnpjPesquisar='+cpf_cnpj_pesquisar+'&Empresa='+empresa_cotacao+'&Cotacao='+codigo_cotacao, function(retorna){
					$("#sub_conteudo").html(retorna);
				});
			}
		</script>
    </body>
</html>
