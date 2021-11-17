<?php

           require_once('banco.php');
           include_once('funcoes.php');
$busca = $_GET['busca'];

$sql = $banco->query("SELECT * FROM noticia WHERE texto LIKE '%|$busca|%' ");

echo "<h1>O resultado da pesquisa é:</h1>".$sql."<br>";

?>