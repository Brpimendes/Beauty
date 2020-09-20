<?php
    require_once('Classes/Perfil_acesso.class.php');
    require_once('Classes/Usuario.class.php');
    require_once('Classes/Funcionario.class.php');
    require_once('Classes/Cliente.class.php');
    require_once('Classes/Profissional.class.php');
    require_once('conect.php');

    $usuario = new Usuario();
    $usuario->usuario_id = $_POST['usuario_id'];

    $cliente = new Cliente();
    $cliente->id = consultar_cliente();
    // $funcionario = new Funcionario();
    
    // $profissional = new Profissional();
    
    // $perfil = new Perfil_acesso();


    if( isset($_POST['id']) && isset($_POST['login']) && isset($_POST['senha']) ){
        // $usuario->perfil_acesso_id;
        $usuario->login = $_POST['login'];
        $usuario->senha = $_POST['senha'];
    }

    //ver depois com o Denis como fazer para consumir os dados na aplicação.
    if( $_POST['acao'] === 'login'){
        if( $usuario->login_usuario() ){
            $usuario = new Usuario((int)$_POST['usuario_id'], $_POST['perfil_acesso_id'], $_POST['cliente_id'], $_POST['funcionario_id'], $_POST['profissional_id'], $_POST['login'], $_POST['senha']);
            echo "";
        } else {
            echo " Acesso negado ";
        }
    }
?>