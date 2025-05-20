<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="shortcut icon" href="img/B3.ico" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="estilos/style_login.css">
		
		<?php
			if(isset($_SESSION['nome'])){ header ("location: home.php"); }
		?>
    </head>
    <body>
        <div class="login">
            <h1>Login</h1>
            <?php
				if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
				
				//$login = md5("https://univesp.escritoriovotuporanga.xyz/?usuario=admin&senha=123456");echo "$login";
				//$login = md5("https://univesp.escritoriovotuporanga.xyz/?usuario=tester&senha=123456");echo "$login";
				//$login = md5("https://univesp.escritoriovotuporanga.xyz/?usuario=teste&senha=123456");echo "$login";
            ?>
            <form action="bd/authenticate.php" method="post" id="div_form">
				<label for="username" class="col-md-2">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Usuário" id="username" required autofocus="autofocus" class="col-md-10" />

				<label for="password" class="col-md-2">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Senha" id="password" required class="col-md-10" />
				<i class="fas fa-eye" id="olho"></i>

				<input type="submit" value="Acessar">
            </form>
        </div>
    </body>
    <script src="js/custom_index.js"></script>
</html>
