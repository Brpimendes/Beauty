<?php
    require_once('Classes/Funcao.class.php');
    require_once('conect.php');

    $funcao = new Funcao();
    $funcao->funcao_id = (int)$_POST['id'];
    $funcao->nome_funcao = $_POST['nome'];
    
    echo "<pre>";
    print_r($funcao);
    echo "</pre>";
    
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
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        if( $funcao->alterar_funcao() ){
            echo "Função alterada com sucesso";
        } else {
            echo "Erro ao alterar a função";
        }
    }
?>