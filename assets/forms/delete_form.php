<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
.ala{
    padding-top: 1%;
    padding-left: 10%;
    padding-right: 10%;
}
</style>
</head>
<body>
    <div class="ala">
<div class="alert alert-warning" role="alert">
<?php
$c= $_GET['cod'] ?? 0;
echo "<h4 class='alert-heading'>Quer mesmo excluir essa noticia?</h4>";
echo "<p>Ao clicar em sim a noticia será excluída permanentemente</p>
<hr>";
echo "<p class='mb-0'><a href='delete.php?cod=$c'>Sim</a> | <a href='../index.php'>Não</a></p>";
?>
</div>
</div>
</body>
