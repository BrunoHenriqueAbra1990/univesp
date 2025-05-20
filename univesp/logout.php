<?php
    // Redireciona para a página de login:
    session_start();
    session_destroy();
    unset($_SESSION['id-usuario'], $_SESSION['nome'], $_SESSION['email']);
    
    $_SESSION['msg'] = "Deslogado com sucesso";
    header("Location: index.php");
?>