<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Forma de Pagamento</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/table.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="out-container">
        <?php
            ini_set('display_errors', false);
            require_once('Controller/controllerFormaPagamento.php');
        ?>
        <header class="header-login">
            <div class="header-login-menu">
                <div class="logo">
                    <a href="/"><img src="img/logo.png" alt="logo salão Beauty"></a>
                </div>

                <div class="welcome">
                    <h1>Bem vindo!</h1>

                    <p>Cadastre as suas formas de pagamento para que tenha mais opções no recebimento.</p>
                </div>
            </div>
        </header>

        <h1>Cadastro de Formas de Pagamentos</h1>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $forma_pagamento->forma_pagamento_id ?>" />

            <label for="forma_pagamento">Forma de Pagamento</label>
            <input type="text" name="forma_pagamento" value="<?php echo $forma_pagamento->forma_pagamento ?>" />

            <button name="acao" value="cadastrar">Cadastrar</button>
            <button name="acao" value="alterar">Alterar</button>
        </form>

        <div class="table">
            <?php
                if( $formasPagamentos ){
                    echo"<table>
                        <thead>
                            <tr>
                                <th>Forma de Pagamento</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                    ";
                    echo "<tbody>";
                    foreach($formasPagamentos as $formas){
                        echo "<tr>
                                <td>{$formas['forma_pagamento']}</td>
                                <td>
                                    <form method='post'>
                                        <input type='hidden' name='id' value='{$formas['forma_pagamento_id']}' />                                            
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
                    echo"</table>";
                }
            ?>
        </div>
    </div>
</body>
</html>