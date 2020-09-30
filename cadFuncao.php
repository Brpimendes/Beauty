<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Função</title>
</head>
<body>
    <?php
        ini_set('display_errors', true);

        require_once('Controller/controllerFuncao.php');
    ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php $funcao->funcao_id ?>" />

        <label for="nome">Nome da Função</label>
        <input type="text" name="nome" value="<?php $funcao->nome_funcao ?>" />
        
        <button name="acao" value="cadastrar">Cadastrar</button>
    </form>
</body>
</html>