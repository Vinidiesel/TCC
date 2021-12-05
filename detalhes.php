<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <style>
.ala{
    padding-top: 2%;
    padding-left: 23%;
    padding-right: 10%;
}
</style>
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
       include_once "topo.php";
        ?>
        <div class="ala">
        <table class='detalhes'>
            <?php
            if(!$busca1){
                echo "<tr><td><h2>Busca Falhou! $banco->error</h2>";
            }else{
                if($busca1->num_rows == 1){
                    $reg=$busca1->fetch_object(); // FFF foco força e fe//
                    if(is_admin()){
                        echo "<a href='noticia_edit.php?cod=$reg->ID_NOTICIA '<i class='material-icons'>edit</i></a>";
                        echo "<a href='delete_form.php?cod=$reg->ID_NOTICIA '<i class='material-icons'>delete</i></a>";
                    }elseif(is_editor()){
                        echo "<td><a href='noticia_edit.php?cod=$dados->ID_NOTICIA'<i class='material-icons'>edit</i></a>";
                    }
                    $t=thumb($reg->IMAGEM ?? ""); 
                    echo "<h2>$reg->TITULO</h2>";
                    $ola=$reg->CATEGORIA;
            $sql2= "SELECT * FROM categoria WHERE ID_CATEGORIA=$ola";
            $result2 = $banco->query($sql2);
            $reg2 = $result2->fetch_object();
                    echo "<br>$reg2->NOME";
                    echo "<p>$reg->DESCRICAO";
                    echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                    echo "<p>$reg->TEXTO<br>";
                }else{
                    echo "<tr><td><h2>Nenhum registro encontardo</h2>";
                }
            }
            ?>
        </table>
        </div>
    </div>
    <?php/*
    include_once "rodape.php";
    */?>
</body>
</html>