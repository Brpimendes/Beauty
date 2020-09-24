<?php
    require_once('Controller/verificaAcesso.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Agendamento</title>
</head>
<body>
    <h1>
        Você está logado como <?php echo $_SESSION['cliente']->nome; echo "<br />"; ?> 
        Sua identificação de login é <?php echo $_SESSION['id']; ?>
    </h1>
</body>
</html>