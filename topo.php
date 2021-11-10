<?php
echo "<header>";

if(empty($_SESSION['email'])){
echo "<a href='user_login.php'>Entrar</a>";
}

else{
    $busca = $banco->query("SELECT * from usuario WHERE NOME='".$_SESSION['nome']."'");
    $reg=$busca->fetch_object();
echo "Olá ". $_SESSION['nome']."</strong> |";
ECHO "<a href='dados.php?cod=$reg->ID_USUARIO'> Meus Dados </a>|";
echo "<a href='chat.php'> Chat </a>|";
if(is_admin()){
    echo "<a href='user_new_admin.php'> Novo usuario </a>| ";
    echo "<a href='noticia_new.php'> Nova Noticia </a> |";
}
echo "<a href='user_logout.php'>Sair</a>";
}

echo "</header>";
?>