<?php
    require_once('Classes/Usuario.class.php');
    require_once('Classes/Funcionario.class.php');
    require_once('Classes/Perfil_acesso.class.php');
    require_once('conect.php');

    $funcionario = new Funcionario((int)$_POST['id'], $_POST['cargo'], $_POST['nome'], $_POST['cpf'], $_POST['data_nasc'], $_POST['telefone'], $_POST['email'], $_POST['senha']);

    if( $_POST['acao'] === 'cadastrar' ){
        if( $funcionario->adicionar_funcionario() ){
            echo "Funcionario cadastrado com sucesso.";
        } else {
            echo "Falha ao cadastrar o funcionário";
        }
    }

    if( $_POST['acao'] === 'excluir' ){
        if( $funcionario->excluir_funcionario() ){
            echo "Funcionario excluído com sucesso.";
        } else {
            echo "Falha ao excluir o funcionário";
        }
    }
?>