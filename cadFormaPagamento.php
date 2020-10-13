<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Forma de Pagamento</title>
</head>
<body>
    <?php
        ini_set('display_errors', true);

        require_once('Controller/controllerFormaPagamento.php');
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $forma_pagamento->forma_pagamento_id ?>" />

        <label for="forma_pagamento">Forma de Pagamento</label>
        <input type="text" name="forma_pagamento" value="<?php echo $forma_pagamento->forma_pagamento ?>" />

        <button name="acao" value="cadastrar">Cadastrar</button>
        <button name="acao" value="listar">Listar</button>
        <button name="acao" value="alterar">Alterar</button>
    </form>

    <?php
        if( $formasPagamentos ){
            echo"<table>
                <tr>
                    <th>Forma de Pagamento</th>
                    <th>Ação</th>
                </tr>
            ";
                foreach($formasPagamentos as $formas){
                    echo "<tr>
                            <td>{$formas['forma_pagamento']}</td>
                            <td>
                                <form method='post'>
                                    <input type='hidden' name='id' value='{$formas['forma_pagamento_id']}' />
                                    <button name='acao' value='excluir'>Excluir</button>
                                    <button name='acao' value='carregar'>Carregar</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }
            echo"</table>";
        }
    ?>
</body>
</html>