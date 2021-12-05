<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <?php
    require_once "banco.php";
    require_once "funcoes.php";
     require_once "login.php";
    ?>
<div> 
<?php
$dataerrada=date('Y-m-d H:i:s');
$fuso = new DateTimeZone('America/Sao_Paulo');
$data = new DateTime($dataerrada);
$data->setTimezone($fuso);
        if(is_admin()||is_editor()){
            if(!isset($_POST['titulo'])){
                require "noticia_new_form.php";
            }else{
                     $titulo = $_POST['titulo'] ?? null;
                     $descricao = $_POST['descricao'] ?? null;
                     $texto = $_POST['texto'] ?? null;
                     $imagem = $_POST['imagem'] ?? null;
                     $categoria= $_POST['categoria'] ?? null;
                     $databanco=$data->format('Y-m-d H:i:s');
                     $usuario = $_SESSION['usuario'] ?? null;
                    if(empty($titulo)||empty($descricao)||empty($texto)||empty($databanco)||empty($categoria)||empty($usuario)){
                        echo msg_erro('todos são obrigatorios preencher');
                    }else{
            
  $q= "INSERT INTO NOTICIA(ID_NOTICIA,TITULO,DESCRICAO,TEXTO,DIA,IMAGEM,CATEGORIA,ID_USUARIO) VALUES('','$titulo','$descricao','$texto','$databanco','$imagem','$categoria','$usuario')";
                        if($banco->query($q)){
                             echo msg_sucesso("$titulo <h2>Publicada!</h2>");
                        }else{
                            echo msg_erro("<h2>Erro ao publicar a noticia</h2> $titulo");
                        }
                    }
                }
            
        }else{
            echo msg_erro('<h2>Área restrita você não tem permisão</h2>');
            }
            ?>
            
            
</div>
    <?php /* include_once "rodape.php";*/?>
    </body>
</html>