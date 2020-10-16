<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Beauty Login</title>
</head>
<body>
    <?php
        ini_set('display_errors', true);
        //require_once('Controller/controllerUsuario.php');
    ?>
    <div class="container-login"> 
        <div class="container-conteudo"> 
            <div class="login-img"> 
                <img src="img/logo.png">
            </div>
            <div class="login-form">
                <span>Faça seu login</span>
                <form>
                    <input type="email" placeholder="E-mail">
                    <input type="password" placeholder="Senha">
                    <button> Entrar </button>
                </form>
                <div class="linha"></div>
                <div class="login-opcoes">
                    <a href=""> Esqueceu sua senha?</a>
                    <a href=""> Ainda não tem cadastro? <strong>Cadastre-se!</strong></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>