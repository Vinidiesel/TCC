<!DOCTYPE html>
<html lang="pt-br">
<section class="vh-100 gradient-custom">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
img.mini{
    width: 250px;
    padding: 10px;
}

img.full{
    height: 600px;
    
}
</style>
</head>
<body>
<?php

           require_once('banco.php');
           include_once('funcoes.php');
           require_once "login.php";
           ?>
           <div id="corpo"><center>
        <?php include_once "topo.php"; ?>
        <h1>Site de noticias</h1>
</div>
<?php
$busca = $_POST['busca'];

$sql = "SELECT * FROM noticia WHERE titulo LIKE '%$busca%' or texto LIKE '%$busca%' or descricao LIKE '%$busca%'";

$result = $banco->query($sql);
if(!$result){
    echo "<tr><td>Infelizmente a busca deu errado";
}else{
    if($result->num_rows==0){
        echo "<tr><td>Nenhum registro encontardo";
    }else{
        
        while($dados = $result->fetch_object()){
            $t = thumb($dados->IMAGEM); 
            echo "<tr><td><img src='$t' class='mini'>";
            echo "<td><a href='detalhes.php?cod=$dados->ID_NOTICIA'>$dados->TITULO</a>";
            echo "<br>[$dados->NOME]";
            echo "<br>$dados->DESCRICAO";
            echo "<br>[$dados->DIA]";

            if(is_admin()){
                echo "<td><a href='noticia_edit.php?cod=$dados->ID_NOTICIA'<i class='material-icons'>edit</i></a>";
                echo "<a href='delete_form.php?cod=$dados->ID_NOTICIA'<i class='material-icons'>delete</i></a>";
            }elseif(is_editor()){
                echo "<td>Alterar";
            }
        }
    }
}
?>    
</table>

</div></center>
<?php 
//include_once "rodape.php";
?>
</body>
</selection>
</html>
<?php
/*
$busca = $_POST['busca'];

$sql = "SELECT * FROM noticia WHERE titulo LIKE '%$busca%' or texto LIKE '%$busca%' or descricao LIKE '%$busca%'";

$result = $banco->query($sql);

while($dados = $result->fetch_object()){
    echo $dados->TITULO;
    echo $dados->TEXTO;
    echo $dados->DESCRICAO;
}
*/
?>