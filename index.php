<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <style>

img.mini{
    width: 250px;
}

img.full{
    height: 400px;
}
</style>
</head>
<body>
    <?php
    /*Com incluide se ele não encontrar o banco ele continua o site
    já com o require se ele não acha o site mata o resto*/
    require_once "banco.php";
    require_once "funcoes.php";
    require_once "login.php";
    $ordem=$_GET['o'] ?? "n";
    $chave=$_GET['c'] ?? "";
    ?>
    <div id="corpo">
        <?php include_once "topo.php"; ?>
        <h1>Site de noticias</h1>
        <form method="get" id="busca" action="index.php">
        Buscar: <input type="text" name="c" size="10" maxlength="40">
        <input type="submit" value="OK">
        </form>
        <table class="listagem">
            <?php
            $q="select n.ID_NOTICIA, n.TITULO, n.DESCRICAO, n.IMAGEM, n.DIA, c.NOME from NOTICIA n join CATEGORIA c on n.CATEGORIA=c.ID_CATEGORIA ";
            if(!empty($chave)){
                $q.=" where n.TITULO like '%$chave%' or c.CATEGORIA like '%$chave%' ";
            }
            $busca=$banco->query($q);
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca->num_rows==0){
                    echo "<tr><td>Nenhum registro encontardo";
                }else{
                    while($reg=$busca->fetch_object()){
                        $t = thumb($reg->IMAGEM); 
                        echo "<tr><td><img src='$t' class='mini'>";
                        echo "<td><a href='detalhes.php?cod=$reg->ID_NOTICIA'>$reg->TITULO</a>";
                        echo "<br>[$reg->NOME]";
                        echo "<br>$reg->DESCRICAO";
                        echo "<br>[$reg->DIA]";

                        if(is_admin()){
                            echo "<td><a href='noticia_edit.php?cod=$reg->ID_NOTICIA '<i class='material-icons'>edit</i></a>";
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