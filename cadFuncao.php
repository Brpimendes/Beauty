<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Função</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        ini_set('display_errors', true);
        require_once('Controller/controllerFuncao.php');
    ?>
    <div class="out-container">
        <header class="header-login">
            <div class="header-login-menu">
                <div class="logo">
                    <a href="/"><img src="img/logo salao.png" alt="logo salão Beauty"></a>
                </div>
                
                <div class="welcome">
                    <h1>Bem Vindo</h1>
                    <p>Cadastre a função que o seu profissional irá desempenhar.</p>
                </div>
            </div>
        </header>

        <main>
            <div class="login-form">
                <h1>Cadastro da Função</h1>

                <form action="" method="post">
                    <div class="login-form-det">
                        <input type="hidden" name="id" value="<?php echo $funcao->funcao_id ?>" />

                        <label for="nome">Nome da Função</label>
                        <input type="text" name="nome" value="<?php echo $funcao->nome_funcao ?>" />
                    </div>
                    
                    <div class="cad_btn">
                        <button name="acao" value="cadastrar">Cadastrar</button>
                        <button name="acao" value="listar">Listar</button>
                        <button name="acao" value="alterar">Atualizar</button>
                    </div>
                </form>
            </div>

            <div class="table-cad">
                <?php
                    if($funcoes){
                        echo "<table>
                            <tr>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                        ";
                            foreach($funcoes as $fun){
                                echo "
                                    <tr>
                                        <td>{$fun['nome_funcao']}</td>
                                        <td>
                                            <form method='post'>
                                                <input type='hidden' name='id' value='{$fun['funcao_id']}' />
                                                <button name='acao' value='excluir'>Excluir</button>
                                                <button name='acao' value='carregar'>Carregar</button>
                                            </form>
                                        </td>
                                    </tr>
                                ";
                            }
                        echo "</table";
                    }
                ?>
            </div>
        </main>
    </div>
</body>
</html>