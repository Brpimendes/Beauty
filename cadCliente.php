<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        ini_set('display_errors', true);

        require_once('Controller/controllerCliente.php');
        // header("location:login.php");
    ?>

    <header class="header-login">
        <div class="header-login-menu">
            <div class="logo">
                <a href="/"><img src="img/logo salao.png" alt="logo salão Beauty"></a>
            </div>
            
            <div class="welcome">
                <h1>Bem vindo!</h1>

                <p>Faça seu cadastro para acessar sua área personalizada</p>
            </div>
        </div>
    </header>

    <main>
        <div class="login-form">
            <h1>CADASTRO</h1>

            <form action="" method="post">
                <div class="login-form-det">
                    <input type="hidden" name="id" value="<?php $cliente->cliente_id ?>">
    
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="<?php $cliente->nome ?>">
    
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" value="<?php $cliente->cpf ?>">
    
                    <label for="data_nasc">Data Nascimento</label>
                    <input type="date" name="data_nasc" value="<?php $cliente->data_nasc ?>">
    
                    <label for="sexo">Sexo</label>
                    <span>
                        <input type="radio" name="sexo" value="F" 
                            <?php if( $cliente->sexo == 'F' ){
                                checked;
                            } ?>
                        />
                    </span>Feminino
                    <span>
                        <input type="radio" name="sexo" value="M" 
                            <?php if( $cliente->sexo == 'M' ){
                                checked;
                            } ?>
                        />
                    </span>Masculino
    
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" value="<?php $cliente->telefone ?>">
    
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php $cliente->email ?>">

                    <label for="senha">Senha</label>
                    <input type="password" name="senha">
                </div>
                
                <div class="cad_btn">
                    <button name="acao" value="cadastrar">Cadastrar</button>
                    <button name="acao" value="excluir">Excluir</button>
                </div>
            </form>
            </div>

    </main>

</body>
</html>