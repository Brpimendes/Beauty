<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Beauty Login</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/form.css">
</head>
<body>
    <?php
        ini_set('display_errors', false);
        require_once('Controller/controllerUsuario.php');
    ?>
    <div class="out-container">
        <header class="header-login">
            <div class="header-login-menu">
                <div class="logo">
                    <a href="/"><img src="img/logo.png" alt="logo salão Beauty"></a>
                </div>
                
                <div class="welcome">
                    <h1>Bem vindo!</h1>
    
                    <p>Faça login para acessar sua área personalizada</p>
                </div>
            </div>
        </header>
        <main>
            <div class="login-form">
                <form method="post">
                    <div class="form-pics">
                        <img src="img/cabelo1.jpg" alt="cabelo">
                    </div>

                    <div class="login-form-det">
                        <h1>LOGIN</h1>
                        <label for="login">Seu e-mail: </label>
                        <input type="email" name="login" placeholder="fulanim1234@mail.com" />
                        
                        <label for="senha">Sua senha: </label>
                        <input type="password" name="senha" />
                        
                        <button name="acao" value="entrar">Entrar</button>

                        <span class="bars"></span>

                        <div class="cad_btn">
                            <span>Ainda não tem conta? <a href="cadCliente.php">Cadastre-se</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>