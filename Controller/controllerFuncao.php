<?php
    require_once('Classes/Funcao.class.php');
    require_once('conect.php');

    $funcao = new Funcao( (int)$_POST['id'], $_POST['nome'] );

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    
    if( $_POST['acao'] === 'cadastrar' ){
        if( $funcao->adicionar_funcao() ){
            echo "Função cadastrada com sucesso.";
        } else {
            echo "Erro ao cadastrar a função.";
        }
    }

    echo "<pre>";
    var_dump($funcao);
    echo "</pre>";
?>