<?php
    require_once('Classes/FormaPagamento.class.php');
    require_once('conect.php');

    $forma_pagamento = new FormaPagamento((int)$_POST['id'], $_POST['forma_pagamento']);

    if( $_POST['acao'] === 'cadastrar' ){
        if( $forma_pagamento->adicionar_forma_pagamento() ){
            echo "Forma de pagamento cadastrado com sucesso.";
        } else {
            echo "Falha ao cadastrar a forma de pagamento.";
        }
    }

    if( $_POST['acao'] === 'excluir' ){
        if( $forma_pagamento->excluir_forma_pagamento() ){
            echo "Forma de pagamento excluído com sucesso.";
        } else {
            echo "Falha ao excluir a forma de pagamento.";
        }
    }

    if( $_POST['acao'] === 'alterar' ){
        echo"<pre>";
        var_dump($_POST);
        echo"<pre>";
        if( $forma_pagamento->alterar_forma_pagamento() ){
            echo "Forma de pagamento alterado com sucesso.";
        } else {
            echo "Falha ao alterar a forma de pagamento.";
        }
    }

    if( $_POST['acao'] === 'listar' ){
        
        $formasPagamentos = $forma_pagamento->consultar_forma_pagamento();
    }

    if( $_POST['acao'] === 'carregar' ){
        $forma_pagamento->carregar_forma_pagamento();
    }
?>