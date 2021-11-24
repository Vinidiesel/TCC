<!DOCTYPE html>
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
        $c1= $_GET['cod'] ?? 0;
        $busca1 = $banco->query("SELECT * from noticia WHERE ID_NOTICIA=$c1");
        $busca2 = $banco->query("SELECT * FROM categoria WHERE ID_CATEGORIA=$c");
       include_once "topo.php";
        ?>
        <table class='detalhes'>
            <?php
            if(!$busca1){
                echo "<tr><td>Busca Falhou! $banco->error";
            }else{
                if($busca1->num_rows == 1){
                    $reg=$busca1->fetch_object(); *// FFF foco força e fe//
                    $reg2=$busca2->fetch_object();
                    $t=thumb($reg->IMAGEM ?? ""); 
                    echo "<h2>$reg->TITULO</h2>";
                    echo "<p>$reg->DESCRICAO";
                    echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                    echo "[$reg2->NOME]";
                    echo "<p>$reg->TEXTO";
                    if(is_admin()){
                        echo "<i class='material-icons'>add_circle</i>";
                        echo "<a href='noticia_edit.php?cod=$reg->ID_NOTICIA '<i class='material-icons'>edit</i></a>";
                        echo "<a href='delete.php?cod=$reg->ID_NOTICIA '<i class='material-icons'>delete</i>";
                    }elseif(is_editor()){
                        echo "Alterar";
                    }
                    echo "<tr><td>$reg->DESCRICAO";
                    
                }else{
                    echo "<tr><td>Nenhum registro encontardo";
                }
            }
            ?>
        </table>
        <?php
        echo voltar();
        ?>
    </div>
    <?php/*
    include_once "rodape.php";
    */?>
</body>
</html>