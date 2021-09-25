<?php
echo "<header>";

if(empty($_SESSION['email'])){
echo "<a href='user_login.php'>Entrar</a>";
}

else{
echo "Olá ". $_SESSION['nome']."</strong> |";
/*echo "<a href='user_edit.php'> Meus Dados </a>| ";*/
/*if(is_admin()){
    echo "<a href='user_new.php'> Novo usuario </a>| ";
    echo "<a href='filme_new.php'> Novo filme </a> |";
}*/
echo "<a href='user_logout.php'>Sair</a>";
}

echo "</header>";
?>