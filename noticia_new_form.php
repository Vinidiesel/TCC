<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="formatacao/jquery.cleditor.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="formatacao/jquery.cleditor.min.js"></script>
    <script>
        $(document).ready(function () { $("#descricao").cleditor(); });
        $(document).ready(function () { $("#texto").cleditor(); });
        $(document).ready(function () { $("#titulo").cleditor(); });
    </script>
    <style>
</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php 
  require_once "funcoes.php";
?>
<section class="vh-full">
<div id="corpo">
<center><h1>NOVA NOTÍCIA </h1></center>

<?php
$q="select ID_CATEGORIA,NOME from CATEGORIA ";
$busca= $banco->query($q);
?>


<center><form action="noticia_new.php" method="post" name="novofilme">
<table>
    <tr><td><h1>Titulo:</h1><td><textarea type="text" name="titulo" id="titulo" size="30" maxlength="30" style =""></textarea></td></tr>
    <br>
    <tr><td><h1>Descricão:</h1><td><textarea  id="descricao" name="descricao"  rows="5"> </textarea></td></tr>
    <br>
    <tr><td><h1>Texto:</h1><td><textarea  id="texto" name="texto"  rows="5"> </textarea></td></tr>
    <br>
    <tr><td><h1>Foto:</h1><input type="file" id="imagem" name="imagem"></td></tr>
    <br>
          <tr><td><h1>Categoria:</h1><td><select class="form-select" aria-label="Default select example" name="categoria" id="categoria">
              <?php
              while($reg=$busca->fetch_object()){
                  
                  echo "<option value='$reg->ID_CATEGORIA'>$reg->NOME</option>";
              }
              
            ?>
                 </select></td></tr>   

                 <br>
    <tr><td><input type="submit" class="btn btn-outline-secondary" value="Salvar" ></td></tr>
    </table>
</form>
</center>
        </div>
        
    </body>
</html>
</section>