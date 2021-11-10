
<html> 
<head>
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
<h1>NOVA NOTÍCIA </h1>
<?php
$q1="select titulo,descricao,texto,CATEGORIA,imagem from NOTICIA where ID_NOTICIA = '$c'";
$q2="select ID_CATEGORIA,NOME from categoria";
$busca= $banco->query($q1);          
$busca2= $banco->query($q2);
$reg= $busca->fetch_object();
?>



<form action="noticia_edit.php?cod=<?php echo $c ?>" method="post" name="novonoticia">
<table>
    <tr><td>titulo<td><textarea  name="titulo" id="titulo" rows="5"> <?php echo $reg->titulo ?></textarea></td></tr>
    <br>
    <tr><td>descricão<td><textarea  id="descricao" name="descricao"  rows="5" > <?php echo $reg->descricao?></textarea></td></tr>
    <br>
    <tr><td>texto<td><textarea  id="texto" name="texto"  rows="5" ><?php echo $reg->texto?> </textarea></td></tr>
    <br>
    <tr><td>Foto:<input class="filme" type="file" id="foto" name="foto">
    <br>
    <tr><td>CATEGORIA<td><select  name="CATEGORIA" id="CATEGORIA" >     
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
                          
    <tr><td><input type="submit" value="salvar notícia" ></td></tr>
    
    </table>
</form>
        </div>
    </body>
</html>
                       


