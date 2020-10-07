<?php
    require_once('Classes/Funcao.class.php');
    require_once('conect.php');

    $funcao = new Funcao( (int)$_POST["id"], $_POST["nome"] );
    
    if( $_POST['acao'] === 'cadastrar' ){
        if( isset($_POST['nome']) && !empty($_POST['nome']) ){
            if( $funcao->adicionar_funcao() ){
                echo "Função cadastrada com sucesso.";
            } else {
                echo "Erro ao cadastrar a função.";
            }
        } else {
            echo "O nome da Função não pode estar vazio.";
        }
    } 
    
    if( $_POST['acao'] === 'excluir' ){
        if( $funcao->excluir_funcao() ){
            echo "Função excluída com sucesso";
        } else {
            echo "Falha ao excluir a função";
        }
    }

    if( $_POST['acao'] === 'carregar' ){
        $funcao->carregar_funcao();
    }

    if( $_POST['acao'] === 'listar' ){
        $funcoes = $funcao->consultar_funcao();
    }

    if( $_POST['acao'] === 'alterar' ){
        $funcao->alterar_funcao();
    }
?>