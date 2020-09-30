<?php
    //echo basename(__FILE__); //__FILE__ retorna o caminho do arquivo onde ele foi chamado
    //echo basename($_SERVER['SCRIPT_FILENAME']) // $_SERVER retorna informações do servidor e do requerente da solicitação.
    ini_set('display_errors', true);
    require_once('Classes/Usuario.class.php');
    require_once('Classes/Cliente.class.php');
    require_once('Classes/Funcionario.class.php');

    session_start();

    if( empty($_SESSION['id']) ){
        header('location: login.php');
    }

    $array = array (
        "agenda.php" => array(1,2),
        "cadCliente.php" => array(1,2,3),
        "tabelaPreco.php" => array(2,3,4)
    );

    if( in_array($_SESSION['usuario']->perfil_acesso_id, $array[basename($_SERVER['SCRIPT_FILENAME'])]) ){
        basename($_SERVER['SCRIPT_FILENAME']);
    } else {
        header('location: login.php');
    }

    echo "<pre>";
    print_r($_SESSION['usuario']);
    echo "</pre>";
?>