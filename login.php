<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <title>Beauty Login</title>
</head>
<body>
    <?php
        ini_set('display_errors', true);
        //require_once('Controller/controllerUsuario.php');        
    ?>
    <div class="out-container">
        <header class="header-login">
            <div class="header-login-menu">
                <div class="logo">
                    <a href="/"><img src="img/logo salao.png" alt="logo salão Beauty"></a>
                </div>
                
                <div class="welcome">
                    <h1>Bem vindo!</h1>
    
                    <p>Faça login para acessar sua área personalizada</p>
                </div>
            </div>
        </header>
        <main>
            <div class="login-form">
                <h1>LOGIN</h1>

                <form method="post">
                    <div class="login-form-det">
                        <input type="hidden" name="usuario_id" value=" <?php $usuario->usuario_id ?> ">

                        <label for="login">Seu e-mail: </label>
                        <input type="email" name="login" placeholder="fulanim1234@mail.com" />
                        
                        <label for="senha">Sua senha: </label>
                        <input type="password" name="senha" />
                    </div>
                    
                    <div class="login-form-btn">
                        <button name="acao" value="entrar">Entrar</button>
                        <button name="acao" value="esqueci">Esqueci a senha</button>
                    </div>
                    
                </form>
                <div class="cad_btn">
                    <span>Ainda não tem conta? <a href="cadCliente.php">Cadastre-se</a></span>
                </div>
            </div>
        </main>
    </div>
</body>
</html>