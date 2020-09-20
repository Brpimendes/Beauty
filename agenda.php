<?php
    ini_set('display_errors', true);

    if( !empty($_SESSION['id']) ){
        require_once('Classes/Usuario.class.php');            
    } else {
        // header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Agendamento</title>
</head>
<body>
    <h1>
        Você está logado como <?php session_start(); $_SESSION['nome'] ?> 
        Sua identificação de login é <?php $_SESSION['id'] ?>
    </h1>
</body>
</html>