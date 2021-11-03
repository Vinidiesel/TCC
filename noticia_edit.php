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
        if(!is_logado()){
            echo msg_erro("efetue login para editar como editor para isso");
        }else{
            if(!isset($_POST['nome'])){
                include "noticia_edit_form.php";
            }else{
               $titulo=$_POST['titulo']??null;
                $descricao=$_POST['descricao']??null;
                $texto=$_POST['texto']??null;
                 $foto=$_POST['foto']??null;
                $CATEGORIA=$_POST['CATEGORIA']??null;
               
               
                if(empty($titulo)||empty($descricao)||empty($texto)||empty($foto)||empty($CATEGORIA)){
                    echo msg_erro('todos os dado devem estar preechido');
                }else{
                    $q="update filmes SET titulo='$titulo', descrição='$descricao', texto='$texto', CATEGORIA='$CATEGORIA',  FOTO='$foto'  WHERE ID_NOTICIA = '$c'";
                    
                    if($banco->query($q)){
                        echo msg_sucesso("Notícia $titulo salvo com alterações");
                    }else{
                        echo msg_erro("erro ao editar a notícia $titulo");
                    }
                }
            
               
                
            }
            
        }
        ?>
        
        </div>
    <?php echo voltar(); ?>
    <?php /*include_once "rodape.php";*/?>
    </body>
</html>

