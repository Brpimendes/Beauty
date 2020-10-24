<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Beauty Cadastramento</title>
</head>
<body>
    <?php
        ini_set('display_errors', true);
        //require_once('Controller/controllerUsuario.php');
    ?>
    
    <div class="container-login"> 
        <div class="container-conteudo"> 
            <div class="login-img"> 
                <img src="img/escova.jpg">
            </div>
            <div class="login-form">
                <span>Faça seu Cadastro</span>
                <form>
                    <input type="nome" placeholder="Digite seu nome">   
                    <input type="sobrenome" placeholder="Digite seu sobrenome">        
                    <input type="email" placeholder="E-mail">
                    <input type="password" placeholder="Insira uma senha">
                    <input type="repsenha" placeholder="Repita a senha">
                    <button> Cadastrar </button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>