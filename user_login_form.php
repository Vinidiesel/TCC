<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php 
  require_once "funcoes.php";
?>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Coloque seu Email e sua Senha!</p>
              <form action="user_login.php" method="post">
              <div class="form-outline form-white mb-4">
                <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="senha" name="senha" placeholder="Senha" class="form-control form-control-lg" />
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Logar</button>
            </div>
            </form>
            <div>
              <p class="mb-0">Não tem uma conta? <a href="user_new.php" class="text-white-50 fw-bold">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
  ?>
  </div>
</section>
