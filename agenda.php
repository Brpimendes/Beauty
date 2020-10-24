<?php
    //require_once('Controller/verificaAcesso.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<div class="container-login"> 
        <div class="container-conteudo"> 
            <div class="login-img"> 
                <img src="img/relogio.jpg">
            </div>
            <div class="login-form">
                <span>Agende seu serviço aqui!</span>
            <form method="post">
                <input type="date" placeholder="Escolha uma data">
                <input type="profissional" placeholder="Escolha o serviço">
                <input type="text" placeholder="escolha um profissional">
                <input type="time" placeholder="horário">           
                <button> Agendar </button>
            </form>
                <div class="linha"></div>
                <div class="login-opcoes">
                    <a href=""> <b>Novo agendamento</b></a>
                    <a href="cadastro.php"> <b>Sua página</b></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>