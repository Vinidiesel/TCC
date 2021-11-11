<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<section class="background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity)) !important;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              
              <form action="user_login.php" method="post">
                <table> 
              <div class="form-outline form-white mb-4">
              <input type="text" id="email" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email:</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="senha" class="form-control form-control-lg" name="senha" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              
              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Enviar</button>
              </table>
            </form>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Não possui conta ? <a href="user_new.php" class="text-white-50 fw-bold">Sign Up</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section><h1><input type="submit"  value="Enviar"></h1>
<form action="user_login.php" method="post">
 <table>
  <tr><td>Email: <td><input type="text" name="email" id="email" >
  <tr><td>Senha: <td><input type="password" name="senha" id="senha" size="10" maxlenght="10">
  <tr><td> <?php echo "<a href='user_new.php'>Novo usuario</a> "; ?>
  <tr><td><input type="submit"  value="Enviar">
 </table>
</form>
