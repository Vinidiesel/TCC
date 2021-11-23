<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php 
  require_once "funcoes.php";
?>
<section class="vh-full gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Novo Usuário</h2>
              <p class="text-white-50 mb-5">Faça o Cadastro!</p>
              <form action="user_new_admin.php" method="post">
              <div class="form-outline form-white mb-4">
                <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="email" id="email" name="email" placeholder="E-mail" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="senha1" name="senha1" placeholder="Senha" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="senha2" name="senha2" placeholder="Confirme a Senha" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <select name="tipo" id="tipo">
               <option value="1">Administrador</option>
               <option value="2">Escritor</option>
              </select>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Cadastrar</button>
            </div>
            </form>
            <div>
              <p class="mb-0">Já tem uma conta? <a href="user_new.php" class="text-white-50 fw-bold">Entrar</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
   echo voltar(); 
  ?>
  </div>
</section>