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
    /*require_once "includes/funcoes.php";
    require_once "includes/login.php";*/
    $ordem=$_GET['o'] ?? "n";
    $chave=$_GET['c'] ?? "";
    ?>
    <div id="corpo">
        <?php //include_once "topo.php"; ?>
        <h1>Divirta-se com os filmes</h1>
        <form method="get" id="busca" action="index.php">
        Buscar: <input type="text" name="c" size="10" maxlength="40">
        <input type="submit" value="OK">
        </form>
        <table class="listagem">
            <?php
            $q="select n.ID_NOTICIA from NOTICIA n ";
            if(!empty($chave)){
                $q.="where n.TITULO like '%$chave%' or c.CATEGORIA like '%$chave%' ";
            }
            $busca=$banco->query($q);
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca->num_rows==0){
                    echo "<tr><td>Nenhum registro encontardo";
                }else{
                    while($reg=$busca->fetch_object()){
                        $t = thumb($reg->FOTO);
                        echo "<tr><td><img src='$t' class='mini'>";
                        echo "<td><a href='detalhes.php?cod=$reg->COD'>$reg->NOME</a>";
                        echo "[$reg->GENERO]";
                        echo "<br>$reg->PRODUTORA";
                        if(is_admin()){
                            echo "<td><i class='material-icons'>add_circle</i>";
                            echo "<a href='filme_edit.php?cod=$reg->COD '<i class='material-icons'>edit</i></a>";
                            echo "<i class='material-icons'>delete</i>";
                        }elseif(is_editor()){
                            echo "<td>Alterar";
                        }
                    }
                }
            }
            ?>    
        </table>
    </div>
    <?php 
    //include_once "rodape.php";
    ?>
</body>
</html>