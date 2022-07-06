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
</head>
<body>
<div id="corpo">
<center><h1>NOVA NOTÍCIA </h1></center>
<?php
$q1="select titulo,descricao,texto,CATEGORIA,imagem from NOTICIA where ID_NOTICIA = '$c'";
$q2="select ID_CATEGORIA,NOME from categoria";
$busca= $banco->query($q1);          
$busca2= $banco->query($q2);
$reg= $busca->fetch_object();
?>



<center><form action="noticia_edit.php?cod=<?php echo $c ?>" method="post" name="novonoticia">
<table>
<tr><td><h1>Titulo:</h1><td><textarea  name="titulo" id="titulo" rows="5"> <?php echo $reg->titulo ?></textarea></td></tr>
    <br>
    <tr><td><h1>Descricão:</h1><td><textarea  id="descricao" name="descricao"  rows="5" > <?php echo $reg->descricao?></textarea></td></tr>
    <br>
    <tr><td><h1>Texto:</h1><td><textarea  id="texto" name="texto"  rows="5" ><?php echo $reg->texto?> </textarea></td></tr>
    <br>
    <tr><td><h1>Foto:</h1><input  type="file" id="foto" name="foto">
    <br>
    <tr><td><h1>Categoria:</h1><td><select class="form-select" aria-label="Default select example" name="CATEGORIA" id="CATEGORIA" >     
<?php
      while($reg2=$busca2->fetch_object())
      {
          if($reg2->ID_CATEGORIA == $reg2->NOME){
              echo"<option value='$reg2->ID_CATEGORIA'>$reg2->NOME</option>";
          
          }
          else{
               echo "<option value='$reg2->ID_CATEGORIA'>$reg2->NOME</option>";
          }
      }
              
?>
    </select>
                          
    <tr><td><input type="submit" class="btn btn-outline-secondary" value="Salvar Notícia" ></td></tr>
    
    </table>
</form>
        </div></center>
    </body>
</html>
                       


