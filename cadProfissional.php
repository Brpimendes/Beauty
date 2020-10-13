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
        <input type="hidden" name="id" value="<?php echo $profissional->profissional_id ?>">

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?php echo $profissional->nome ?>" /> <br>

        <label for="data_nasc">Data Nascimento</label>
        <input type="date" name="data_nasc" value="<?php echo $profissional->data_nasc ?>" /> <br>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" value="<?php echo $profissional->cpf ?>" /> <br>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" value="<?php echo $profissional->telefone ?>" /> <br>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $profissional->email ?>" /> <br>

        <label for="senha">Senha</label>
        <input type="password" name="senha"> <br>

        <button name="acao" value="cadastrar">Cadastrar</button>
        <button name="acao" value="listar">Listar</button>
        <button name="acao" value="alterar">Alterar</button>
    </form>

    <?php
        if( $profissionais ){
            echo "<table>
                    <tr>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ação</th>
                    </tr>
                ";
                foreach( $profissionais as $prof ){
                    echo "
                        <tr>
                            <td>{$prof['nome']}</td>
                            <td>{$prof['data_nasc']}</td>
                            <td>{$prof['cpf']}</td>
                            <td>{$prof['telefone']}</td>
                            <td>{$prof['email']}</td>
                            <td>
                                <form method='post'>
                                    <input type='hidden' name='id' value='{$prof['profissional_id']}' />
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