<?php
    require_once('Classes/Usuario.class.php');
    require_once('Classes/Cliente.class.php');
    require_once('Classes/Perfil_acesso.class.php');
    require_once('conect.php');
    
    $cliente = new Cliente($_POST['id'], $_POST['nome'], $_POST['cpf'], $_POST['data_nasc'], $_POST['sexo'], $_POST['telefone'], $_POST['email'], $_POST['senha']);

    if ( $_POST['acao'] === 'cadastrar' ) {
        if( $cliente->adicionar_cliente() ){
            echo "Cadastrado com sucesso.";
        } else {
            echo "Falha no cadastro";
        }
    }

    if( $_POST['acao'] === 'excluir' ) {
        if( $cliente->excluir_cliente() ){
            echo "Cadastrado com sucesso.";
        } else {
            echo "Falha no cadastro";
        }
    }

    if( $_POST['acao'] === 'login' ) {
        if( $cliente->login_cliente() ){
            echo " Login feito com sucesso! ";
        } else {
            echo " Erro ao tentar logar! ";
        }
    }
?>