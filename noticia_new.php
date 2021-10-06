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
        if(!is_admin()){
            echo msg_erro('Área restrita você não tem permisão');
        }else{
            if(!isset($_POST['titulo'])){
                require "noticia_new_form.php";
            }else{
                     $titulo = $_POST['titulo'] ?? null;
                     $descricao = $_POST['descricao'] ?? null;
                     $texto = $_POST['texto'] ?? null;
                     $imagem = $_POST['imagem'] ?? null;
                     $categoria= $_POST['categoria'] ?? null;
                     $data = date('Y-m-d H:i:s');
                     $usuario = $_SESSION['usuario'] ?? null;
                    if(empty($titulo)||empty($descricao)||empty($texto)||empty($imagem)||empty($categoria)){
                        echo msg_erro('todos são obrigatorios preencher');
                    }else{
            
  $q= "INSERT INTO NOTICIA(ID_NOTICIA,TITULO,DESCRICAO,TEXTO,DIA,IMAGEM,CATEGORIA,ID_USUARIO) VALUES('','$titulo','$descricao','$texto','$data','$imagem','$categoria','$usuario')";
                        if($banco->query($q)){
                             echo msg_sucesso(" $titulo publicada");
                        }else{
                            echo msg_erro("erro ao publicar a noticia $titulo");
                        }
                    }
                }
            }
            ?>
            
            
</div>
<?php echo voltar(); ?>
    <?php /* include_once "rodape.php";*/?>
    </body>
</html>