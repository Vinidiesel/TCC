<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <?php
        if($_SESSION['email']){
    $busca = $banco->query("SELECT * from usuario WHERE NOME='".$_SESSION['nome']."'");
    $reg=$busca->fetch_object();
    echo "<li><a href='chat.php' class='nav-link px-2 text-white'> Chat </a></li>";
    if(is_admin()){
    echo "<li><a href='user_new_admin.php' class='nav-link px-2 text-white'> Novo usuario </a></li>";
    echo "<li><a href='noticia_new.php' class='nav-link px-2 text-white'> Nova Noticia </a></li>";
}
}
?>
          <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <form method="get" id="busca" action="busca.php">
        Buscar: <input type="text" name="busca" size="10" maxlength="40" text_align="center">
        
        <input type="submit" value="OK">
        </form>
        </ul>

        <div class="text-end">
        <?php
echo "<header>";

if(empty($_SESSION['email'])){
echo "<a href='user_login.php'><button type='button' class='btn btn-outline-light me-2'>Entrar</button></a>";
echo "<a href='user_new.php'><button type='button' class='btn btn-warning'>Sign-up</button></a>";
}else{
    echo "<a href='dados.php?cod=$reg->ID_USUARIO'><button type='button' class='btn btn-outline-light me-2'>Olá ". $_SESSION['nome']."</button></a>";
    echo "<a href='user_logout.php'><button type='button' class='btn btn-warning'>Sair</button></a>";
}
?>
<?php /*else{
    $busca = $banco->query("SELECT * from usuario WHERE NOME='".$_SESSION['nome']."'");
    $reg=$busca->fetch_object();
echo "Olá ". $_SESSION['nome']."</strong> |";
ECHO "<a href='dados.php?cod=$reg->ID_USUARIO'><button type='button' class='btn btn-outline-light me-2'> Meus Dados </button></a>|";
echo "<a href='chat.php'> Chat </a>|";
if(is_admin()){
    echo "<a href='user_new_admin.php'> Novo usuario </a>| ";
    echo "<a href='noticia_new.php'> Nova Noticia </a> |";
}
echo "<a href='user_logout.php'>Sair</a>";
}

echo "</header>";
*/?>
        </div>
      </div>
    </div>
  </header>



<?php 
/*
echo "<header>";

if(empty($_SESSION['email'])){
echo "<a href='user_login.php'><button type='button' class='btn btn-outline-light me-2'>Entrar</button></a>";
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
*/?>