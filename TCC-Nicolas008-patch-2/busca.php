<?php

           require_once('banco.php');
           include_once('funcoes.php');
$busca = $_POST['busca'];

$sql = "SELECT * FROM noticia WHERE titulo LIKE '%$busca%' or texto LIKE '%$busca%' or descricao LIKE '%$busca%'";

$result = $banco->query($sql);

while($dados = $result->fetch_object()){
    echo $dados->TITULO;
    echo $dados->TEXTO;
    echo $dados->DESCRICAO;
}

?>