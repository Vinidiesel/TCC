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
    <div id="corpo">
    <?php
     $c= $_GET['cod'] ?? 0;
    ?>
        <?php
        if(is_admin()||is_editor()){
            if(!isset($_POST['titulo'])){
                include "noticia_edit_form.php";
            }else{
               $titulo=$_POST['titulo']??null;
                $descricao=$_POST['descricao']??null;
                $texto=$_POST['texto']??null;
                 $foto=$_POST['foto']??null;
                $CATEGORIA=$_POST['CATEGORIA']??null;
               
               
                if(empty($titulo)||empty($descricao)||empty($texto)||empty($CATEGORIA)){
                    echo msg_erro('<h2>todos os dados devem estar preechidos</h2>');
                }else{
                    $q="UPDATE noticia SET titulo='$titulo', descricao='$descricao', texto='$texto', categoria='$CATEGORIA',  imagem='$foto'  WHERE ID_NOTICIA = '$c'";
                    
                    if($banco->query($q)){
                        echo msg_sucesso("<h2>Notícia</h2> $titulo <h2>salvo com alterações</h2>");
                    }else{
                        echo msg_erro("<h2>erro ao editar a notícia $titulo</h2>");
                    }
                }
            
               
                
            }
            
        }else{
            echo msg_erro('<h2>Área restrita você não tem permisão</h2>');
        }
        ?>
        
        </div>
    <?php /*include_once "rodape.php";*/?>
    </body>
</html>

