<?php
    require_once('Classes/Usuario.class.php');
    require_once('Classes/Profissional.class.php');
    require_once('Classes/Perfil_acesso.class.php');
    require_once('conect.php');

    $profissional = new Profissional( (int)$_POST['id'], $_POST['nome'], $_POST['data_nasc'], $_POST['cpf'], $_POST['telefone'], $_POST['email'], $_POST['senha'] );

    if( $_POST['acao'] === 'cadastrar' ){
        if( $profissional->adicionar_profissional() ){
            echo "Cadastrado com sucesso";
        } else {
            echo "Falha ao cadastrar profissional";
        }
    }
?>