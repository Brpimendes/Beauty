<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/table.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php
        ini_set('display_errors', false);

        require_once('Controller/controllerCliente.php');
    ?>

    <header class="header-login">
        <div class="header-login-menu">
            <div class="logo">
                <a href="/"><img src="img/logo.png" alt="logo salão Beauty"></a>
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
                    <div>
                        <input type="hidden" name="id" value="<?php $cliente->cliente_id ?>">
    
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" value="<?php echo $cliente->nome ?>">
    
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" value="<?php echo $cliente->cpf ?>">
    
                        <label for="data_nasc">Data Nascimento</label>
                        <input type="date" name="data_nasc" value="<?php echo $cliente->data_nasc ?>">

                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" value="<?php echo $cliente->telefone ?>">
                    </div>
                    <div>
                        <label for="sexo">Sexo</label>
                        <span>
                            <input type="radio" name="sexo" value="F"
                                <?php if( $cliente->sexo == 'F' ){
                                    echo 'checked';
                                } ?>
                            />
                            Feminino
                        </span>
                        <span>
                            <input type="radio" name="sexo" value="M"
                                <?php if( $cliente->sexo == 'M' ){
                                   echo 'checked';
                                } ?>
                            />
                            Masculino
                        </span>

                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $cliente->email ?>">
    
                        <label for="senha">Senha</label>
                        <input type="password" name="senha">
                    </div>
                </div>

                <div class="cad_btn">
                    <button name="acao" value="cadastrar">Cadastrar</button>
                </div>
            </form>
        </div>

        <div class="table">
            <?php
                if($clientes){
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Data_Nascimento</th>
                                    <th>Sexo</th>
                                    <th>Telefone</th>
                                    <th>Email</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                    ";
                    echo "<tbody>";
                    foreach($clientes as $cli){
                        echo "
                            <tr>
                                <td>{$cli['nome']}</td>
                                <td>{$cli['cpf']}</td>
                                <td>{$cli['data_nasc']}</td>
                                <td>{$cli['sexo']}</td>
                                <td>{$cli['telefone']}</td>
                                <td>{$cli['email']}</td>
                                <td>
                                    <form method='post'>
                                        <input type='hidden' name='id' value='{$cli['cliente_id']}' />
                                        <div class='material' id='excluir'>
                                            <span class='material-icons'>delete_forever</span>
                                            <button name='acao' value='excluir'>Excluir</button>
                                        </div>
                                        <div class='material'>
                                            <span class='material-icons carregar'>upgrade</span>
                                            <button name='acao' value='carregar'>Carregar</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
            ?>
        </div>
    </main>
</body>
</html>