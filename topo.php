<?php
echo "<header>";

if(empty($_SESSION['email'])){
echo "<a href='user_login.php'>Entrar</a>";
}

else{
echo "Olá ". $_SESSION['nome']."</strong> |";
echo "<a href='user_edit.php'> Meus Dados </a>| ";
echo "<a href='chat.php'> Chat </a>|";
if(is_admin()){
    echo "<a href='user_new.php'> Novo usuario </a>| ";
    echo "<a href='noticia_new.php'> Nova Noticia </a> |";
}
echo "<a href='user_logout.php'>Sair</a>";
}

echo "</header>";
?>