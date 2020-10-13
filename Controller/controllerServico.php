<?php
    require_once('Classes/Servico.class.php');
    require_once('Classes/Funcao.class.php');
    require_once('conect.php');

    $servico = new Servicos();
    $servico->servicos_id = (int)$_POST['id'];
    $servico->funcao_id = new Funcao($_POST['funcao_id']);
    $servico->nome = $_POST['nome'];
    $servico->valor = (float)$_POST['valor'];
    $servico->comissao = (float)$_POST['comissao'];
    $servico->tempo_servico = $_POST['tempo_servico'];

    $funcao = new Funcao();
    $funcoes = $funcao->consultar_funcao();

    if( $_POST['acao'] === 'cadastrar' ){
        if( $servico->adicionar_servico() ){
            echo "Serviço cadastrado com sucesso.";
        } else {
            echo "Erro ao cadastrar o serviço.";
        }
    }

    if( $_POST['acao'] === 'excluir' ){
        if( $servico->excluir_servico() ){
            echo "Servico excluído com sucesso.";
        } else {
            echo "Falha ao excluir o servico.";
        }
    }

    if( $_POST['acao'] === 'alterar' ){
        if( $servico->alterar_servico() ){
            echo "Servico alterado com sucesso.";
        } else {
            echo "Falha ao alterar o servico.";
        }
    }

    if( $_POST['acao'] === 'listar' ){
        $servicos = $servico->consultar_servico();
    }

    if( $_POST['acao'] === 'carregar' ){
        $servico->carregar_servico();
    }
?>