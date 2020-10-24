<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Serviços</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/table.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="out-container">
        <?php
            ini_set('display_errors', true);

            require_once('Controller/controllerServico.php');
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $servico->servicos_id ?>" />
            
            <label for="funcao">Função</label>
            <select name="funcao_id" >
                <?php
                    foreach( $funcoes as $fun ){
                        if( $servico ){
                            if ($servico->funcao_id == $fun['funcao_id']){
                                echo "<option value='{$fun['funcao_id']}' selected=true>{$fun['nome_funcao']}</option>";
                            } else {
                                echo "<option value='{$fun['funcao_id']}' >{$fun['nome_funcao']}</option>";
                            }
                        }
                    }
                    ?>
            </select> <br>
            
            <label for="nome">Nome do Servico</label>
            <input type="text" name="nome" value="<?php echo $servico->nome ?>" /> <br>
            
            <label for="valor">Valor do Servico</label>
            <input type="text" name="valor" value="<?php echo $servico->valor ?>" /> <br>
            
            <label for="comissao">Comissão</label>
            <input type="text" name="comissao" value="<?php echo $servico->comissao.'%' ?>" /> <br>
            
            <label for="tempo_servico">Tempo de execução do Servico</label>
            <input type="text" name="tempo_servico" value="<?php echo $servico->tempo_servico ?>" /> <br>
            
            <button name="acao" value="cadastrar">Cadastrar</button>
            <button name="acao" value="alterar">Alterar</button>
        </form>

        <div class="table">
            <?php
                if( $servicos ){
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>Função de quem faz o serviço</th>
                                    <th>Nome do Serviço</th>
                                    <th>Valor</th>
                                    <th>Comissão</th>
                                    <th>Tempo do serviço</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                        ";
                        echo "<tbody>";
                            foreach( $servicos as $ser ){
                                $serv = new Servicos($ser['servicos_id']);
                                echo "<tr>
                                        <td>{$serv->funcao_id->nome_funcao}</td>
                                        <td>{$serv->nome}</td>
                                        <td>{$serv->valor}</td>
                                        <td>{$serv->comissao}%</td>
                                        <td>{$serv->tempo_servico}</td>
                                        <td>
                                            <form method='post'>
                                                <input type='hidden' name='id' value='{$serv->servicos_id}' />
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
                    echo "</table";
                }
            ?>
    </div>
</body>
</html>