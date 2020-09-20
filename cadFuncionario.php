<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionario</title>
</head>
<body>
<?php
        ini_set('display_errors', true);

        require_once('Controller/controllerFuncionario.php');

        // header("location:login.php");
    ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php $funcionario->id ?>">

        <label for="cargo">Cargo</label>
        <select name="cargo">
            <option value=" <?php $funcionario->cargo ?> "> Recepcionista </option>
            <option value=" <?php $funcionario->cargo ?> "> Gerente </option>
        </select>

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?php $funcionario->nome ?>">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" value="<?php $funcionario->cpf ?>">

        <label for="data_nasc">Data Nascimento</label>
        <input type="date" name="data_nasc" value="<?php $funcionario->data_nasc ?>">

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" value="<?php $funcionario->telefone ?>">

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php $funcionario->email ?>">

        <button name="acao" value="cadastrar">Cadastrar</button>
        <button name="acao" value="excluir">Excluir</button>
    </form>
</body>
</html>