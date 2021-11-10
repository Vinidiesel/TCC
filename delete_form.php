<?php
$c= $_GET['cod'] ?? 0;
echo "Quer mesmo excluir essa noticia? ";
echo "<a href='delete.php?cod=$c'>sim</a> |";
echo "<a href='index.php'>não</a>";
?>