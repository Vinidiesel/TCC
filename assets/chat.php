<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
</head>
<body>
<?php
    /*Com incluide se ele não encontrar o banco ele continua o site
    já com o require se ele não acha o site mata o resto*/
    require_once "banco.php";
    require_once "funcoes.php";
    require_once "login.php";
?>
    <div id="corpo">
    <?php
    if(!is_logado()){
        echo msg_erro('<h2>Você não está logado</h2>');
    }else{
        if(!isset($_POST['nome'])){
            require "forms/chat_form.php";
        }
    }
        ?>
    </body>
</html>