<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <img src="images/logo.png" alt="" width="55" height="60">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../assets/lol.php" class="nav-link px-2 text-white">League of Legends</a></li>
        <li><a href="../assets/cs.php" class="nav-link px-2 text-white">CSGO</a></li>
        <li><a href="../assets/ff.php" class="nav-link px-2 text-white">Free Fire</a></li>
        <?php
        if($_SESSION['email']){
    $busca = $banco->query("SELECT * from usuario WHERE NOME='".$_SESSION['nome']."'");
    $reg=$busca->fetch_object();
    echo "<li><a href='chat.php' class='nav-link px-2 text-white'> Chat </a></li>";
    if(is_admin()){
    echo "<li><a href='user_new_admin.php' class='nav-link px-2 text-white'> Novo usuario </a></li>";
    echo "<li><a href='noticia_new.php' class='nav-link px-2 text-white'> Nova Noticia </a></li>";
}elseif(is_editor()){
  echo "<li><a href='noticia_new.php' class='nav-link px-2 text-white'> Nova Noticia </a></li>";
}
}
?>
        </ul>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="post" id="busca" action="busca.php">
<input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search" name="busca">
</form> 
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
        </div>
      </div>
    </div>
  </header>
