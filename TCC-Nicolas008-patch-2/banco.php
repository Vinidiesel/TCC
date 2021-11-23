<?php
/*linha de conexão com o BD*/
$banco= new mysqli("localhost","root","","esports");

/*Se houver algum erro na conexão sera emitido uma mensagem de die() mata tudo*/
if($banco->connect_errno){
    echo "<p>Encontrei um erro $banco->errno --> $banco->connect_error</p>";
    die();
}

/*Transformar os resultados com padrões utf8*/
$banco->query("SET NAMES 'utf8'");
$banco->query("SET character_set_connection=utf8");
$banco->query("SET character_set_client=utf8");
$banco->query("SET character_set_results=utf8");
?>