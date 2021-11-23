<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
    function thumb($arq){
        $caminho="$arq";
        if(is_null($arq) || !file_exists($caminho)){
            return "indisponivel.png";
        }else{
            return $caminho;
        }
    }
    function voltar(){
        return "<a href='index.php'><span class='material-icons'>arrow_back</span></a>";
    }
    $c=voltar();
    function msg_sucesso($m){
        $c=voltar();
        $resp= "<div class='container'>
        <div class='row'>
          <div class='col'>
          <div class='alert alert-success' role='alert'>
          <h4 class='alert-heading'>$m!</h4>
          </div>
          </div>
          $c
          </div>
          </div>";
        return $resp;
    }
    function msg_aviso($m){
        $resp= "<div class='aviso'><span class='material-icons'>info</span> $m </div>";
        
        return $resp;
        echo voltar(); 
    }
    function msg_erro($m){
        $resp= "<div class='erro'><span class='material-icons'>error</span> $m </div>";
        
        return $resp;
        echo voltar(); 
    }
    function valida_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function ExisteUsuario($u, $e){

        $cmd = "SELECT * FROM usuario WHERE nome = '$u' AND LOGIN_EMAIL = '$e';";
        $result = mysql_query($cmd);
        $rows = mysql_num_rows($result);

        if(1 == $rows){
            return true;
        }

        else{
            return false;
        }
    }
?>