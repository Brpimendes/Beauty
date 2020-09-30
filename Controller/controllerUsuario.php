<?php
    require_once('Classes/Usuario.class.php');
    require_once('Classes/Perfil_acesso.class.php');
    require_once('Classes/Cliente.class.php');
    require_once('Classes/Funcionario.class.php');
    require_once('Classes/Profissional.class.php');
    require_once('conect.php');

    $usuario = new Usuario();
    
    if( isset($_POST['login']) && isset($_POST['senha']) ){
        $usuario->login = $_POST['login'];
        $usuario->senha = $_POST['senha'];
    }

    if( $_POST['acao'] === 'entrar'){
        if( $usuario->login_usuario() ){
            $usuario = new Usuario((int)$_POST['usuario_id'], $_POST['perfil_acesso_id'], $_POST['cliente_id'], $_POST['funcionario_id'], $_POST['profissional_id'], $_POST['login'], $_POST['senha']);
            echo "";
        } else {
            echo " Acesso negado ";
        }
    }
?>