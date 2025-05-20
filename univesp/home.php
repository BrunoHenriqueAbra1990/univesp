<?php
    // Precisamos usar sessões, então você deve sempre iniciar sessões usando o código abaixo.
    session_start();
    // Se o usuário não estiver logado redireciona para a página de login...
    if (!isset($_SESSION['nome'])) {
        header('Local: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
			include "links_includes/head.php";
			include "links_includes/head_home.php";
		?>
		<link rel="stylesheet" href="estilos/style_home.css">
    </head>
    <body class="loggedin col-md-12" id="body_home">
        <nav class="navtop col-md-12">
			<div class="col-md-12">
				<h1 class="col-md-6 col-6">Univesp</h1>
				<div class="col-md-6  form-row">
					<p>Bem-vindo de volta, <?=$_SESSION['nome']?>!</p>
					<a href="profile.php"><i class="fas fa-user-circle"></i>Perfil</a>
					<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				</div>
			</div>
        </nav>
        <div class="conteudo">
			<div class='col-md-12 form-row '>
				<h3 id="titulo-formulario" class="col-md-12 col-6" > Página inicial</h3>
				<!--<button class="btn  col-md-1 col-5" id="" >	Voltar</button>-->
			</div>
			
			<div class='col-md-12 contorno_reto '>
				<div class="col-md-12 form-row botoes_principais ">
					<button class="btn btn-default btn-xs col-md-2" id="" onclick="Mudarestado('listarUsuarios')">		Cadastro Usuários		</button>&nbsp;
					<button class="btn btn-default btn-xs col-md-2" id="" onclick="Mudarestado('listarFornecedores')">	Cadastro Fornecedores	</button>&nbsp;
					<button class="btn btn-default btn-xs col-md-2" id="" onclick="Mudarestado('listarProdutos')">		Cadastro Produtos		</button>&nbsp;
					<button class="btn btn-default btn-xs col-md-2" id="" onclick="Mudarestado('listarEmpresas')">		Cadastro Empresas	 	</button>&nbsp;
					<button class="btn btn-default btn-xs col-md-2" id="" onclick="Mudarestado('listarCotacoes')">		Cadastro Cotações		</button>&nbsp;
					<button class="btn btn-default btn-xs col-md-1" data-toggle="modal" data-target="#modalImportacao">	Importação		 		</button>&nbsp;
				</div>



				<div class="form-row col-md-12" id="sub_conteudo">
				
					<div class="form-group col-md-12 contorno_reto" id="listarUsuarios" style='display: none;'> 
						<!-- /processa/usuarios -->
					</div>
					
					<div class="form-group col-md-12 contorno_reto" id="listarFornecedores" style='display: none;'> 
						<!-- /processa/usuarios -->
					</div>
					
					<div class="form-group col-md-12 contorno_reto" id="listarProdutos" style='display: none;'> 
						<!-- /processa/usuarios -->
					</div>
					
					<div class="form-group col-md-12 contorno_reto" id="listarCotacoes" style='display: none;'> 
						<!-- /processa/usuarios -->
					</div>
					
					<div class="form-group col-md-12 contorno_reto" id="listarEmpresas" style='display: none;'> 
						<!-- /processa/usuarios -->
					</div>
				</div>
			</div>
        </div>
		<?php  include_once "modais.php";  ?>
		<script src="js/custom_home.js?v=<?= time(); ?>"></script>
    </body>
</html>
