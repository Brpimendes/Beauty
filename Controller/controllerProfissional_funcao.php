<?php
    require_once('Classes/Profissional_funcao.class.php');
    require_once('Classes/Usuario.class.php');
    require_once('Classes/Profissional.class.php');
    require_once('Classes/Funcao.class.php');
    require_once('conect.php');

    $prof_fun = new Profissional_funcao();
    $prof_fun->profissional_id = new Profissional( (int)$_POST['profissional_id'] );
    $prof_fun->funcao_id = new Funcao( (int)$_POST['funcao_id'] );

    $profissional = new Profissional();
    $profissionais = $profissional->consultar_profissional();

    $funcao = new Funcao();
    $funcoes = $funcao->consultar_funcao();

    $prof_funcs = $prof_fun->consultar_profissional_funcao();

    switch($_POST['acao']){
        case 'cadastrar':
            if( $prof_fun->adicionar_profissional_funcao() ){
                echo "Profissional adicionado a função com sucesso";
            } else {
                echo "Falha ao cadastrar o profissional a funcao";
            }
        break;
    }
?>