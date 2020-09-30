<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Profissionais</title>
</head>
<body>
    <?php
        ini_set('display_errors', true);
        require_once('Controller/controllerProfissional.php');
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?php $profissional->profissional_id ?>">

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?php $profissional->nome ?>" />

        <label for="data_nasc">Data Nascimento</label>
        <input type="date" name="data_nasc" value="<?php $profissional->data_nasc ?>" />

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" value="<?php $profissional->cpf ?>" />

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" value="<?php $profissional->telefone ?>" />

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php $profissional->email ?>" />

        <label for="senha">Senha</label>
        <input type="password" name="senha">

        <button name="acao" value="cadastrar">Cadastrar</button>
        <button name="acao" value="excluir">Excluir</button>
    </form>
</body>
</html>