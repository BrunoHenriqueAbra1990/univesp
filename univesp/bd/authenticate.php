<?php
	session_start();
	// Altere isso para suas informações de conexão.
	include "../conectar.php";

	if ( mysqli_connect_errno() ) {
		// Se houver um erro com a conexão, pare o script e exiba o erro.
		exit('Falha ao conectar ao MySQL: ' . mysqli_connect_error());
	}
	// Agora verificamos se os dados do formulário de login foram enviados, isset() verificará se os dados existem.
	
	if ( !isset($_POST['username'], $_POST['password']) ) {
		// Não foi possível obter os dados que deveriam ter sido enviados.
		exit('Por favor, preencha os campos de nome de usuário e senha!');
    }
	
	$usuario = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$link = "https://univesp.escritoriovotuporanga.xyz/?usuario=$usuario&senha=$senha";
	$pass = "$link";
	
	$password = md5($link);
	
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT * FROM usuarios WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($con, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);

			if(($password == $row_usuario['senha']) and (!($row_usuario['status']== 'INATIVO'))){
				$_SESSION['id_usuario'] 				= $row_usuario['id_usuario'];
				//$_SESSION['fk_departamento_usuario'] 	= $row_usuario['fk_departamento_usuario'];
				//$_SESSION['fk_setor_usuario'] 			= $row_usuario['fk_setor_usuario'];
				//$_SESSION['fk_secao_usuario'] 			= $row_usuario['fk_secao_usuario'];
				$_SESSION['nome'] 						= $row_usuario['nome'];
				$_SESSION['nivel'] 						= $row_usuario['nivel'];
				$_SESSION['usuario'] 					= $row_usuario['usuario'];
				//$_SESSION['responsavel_secao'] 			= $row_usuario['responsavel_secao'];
				//$_SESSION['status'] 					= $row_usuario['status'];

				$usuario = $_SESSION['nome'];
				header("Location: ../index.php");
				$_SESSION['msg'] = "$usuario Login bem sucedido!";
				//echo $_SESSION['msg'];
			}
			else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: ../index.php");
				//echo mysqli_error($conn);
			}
		}
	}
	
	/*
	// Prepare nosso SQL, preparando a instrução SQL evitará a injeção de SQL.
	if ($stmt = $con->prepare('SELECT * FROM usuarios WHERE usuario='$usuario' LIMIT 1')) {
		// Parâmetros de ligação (s = string, i = int, b = blob, etc), no nosso caso o nome de usuário é uma string, então usamos "s"
		$stmt->bind_param('s', $_POST['username']);
		$stmt->execute();
		// Armazena o resultado para que possamos verificar se a conta existe no banco de dados.
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$stmt->bind_result($id, $senha);
			$stmt->fetch();
			// A conta existe, agora verificamos a senha.
			// Nota: lembre-se de usarsenha_hash em seu arquivo de registro para armazenar as senhas com hash.
			
			
			if(($senha == $row_usuario['senha']) and (!($row_usuario['status']== 'DEMITIDO'))){
				$_SESSION['id_usuario'] 				= $row_usuario['id_usuario'];
				$_SESSION['fk_departamento_usuario'] 	= $row_usuario['fk_departamento_usuario'];
				$_SESSION['fk_setor_usuario'] 			= $row_usuario['fk_setor_usuario'];
				$_SESSION['fk_secao_usuario'] 			= $row_usuario['fk_secao_usuario'];
				$_SESSION['nome'] 						= $row_usuario['nome'];
				$_SESSION['nivel'] 						= $row_usuario['nivel'];
				$_SESSION['usuario'] 					= $row_usuario['usuario'];
				$_SESSION['responsavel_secao'] 			= $row_usuario['responsavel_secao'];
				$_SESSION['status'] 					= $row_usuario['status'];


				// Verificação bem-sucedida! O usuário fez login!
				// Cria sessões, para sabermos que o usuário está logado, elas basicamente agem como cookies, mas lembram dos dados no servidor.
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['id'] = $id;
				echo 'Bem-vindo' . $_SESSION['nome'] . '!';
			} 
	*/
		
	else {
	// Senha incorreta
	echo 'Nome de usuário e/ou senha incorretos!';
	}

    $con->close();
?>
