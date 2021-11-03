
<html> 
<head>
    <link rel="stylesheet" href="jquery.cleditor.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="jquery.cleditor.min.js"></script>
    <script>
        $(document).ready(function () { $("#descricao").cleditor(); });
        $(document).ready(function () { $("#texto").cleditor(); });
    </script>
</head>
<body>
<div id="corpo">
<h1>NOVA NOTÍCIA </h1>
<?php
$q1="select titulo,descricao,texto,CATEGORIA,foto from NOTICIA where cod = '$c'";
$q2="select ID_CATEGORIA,NOME from categoria";

               
$busca= $banco->query($q1);
$busca2= $banco->query($q2);
$reg=$busca->fetch_object();
?>
<?php
$q="select ID_CATEGORIA,NOME from CATEGORIA ";
$busca= $banco->query($q);
?>


<form action="noticia_new.php" method="post" name="novofilme">
<table>
    <tr><td>titulo<td><input type="text" name="titulo" id="titulo" size="30" maxlength="30" value="<?php echo $reg->titulo ?>"></td></tr>
    <br>
    <tr><td>descricão<td><textarea  id="descricao" name="descricao"  rows="5" value="<?php echo $reg->descricao?>"> </textarea></td></tr>
    <br>
    <tr><td>texto<td><textarea  id="texto" name="texto"  rows="5" value="<?php echo $reg->texto ?>"> </textarea></td></tr>
    <br>
    <tr><td>imagem<td><input type="submit"  id="foto" name="foto" value="<?php echo $reg->foto?>" ></td></tr>
    <br>
    <tr><td>CATEGORIA<td><select  name="CATEGORIA" id="CATEGORIA" value="<?php echo $reg->CATEGORIA ?>" >     
<?php
      while($reg=$busca3->fetch_object())
      {
          if($reg->cod == $reg->CATEGORIA){
              echo"<option value='$reg->ID_CATEGORIA'selected>$reg->NOME</option>";
          
          }
          else{
               echo "<option value='$reg->ID_CATEGORIA'selected>$reg->NOME</option>";
          }
      }
              
?>
    </select>
                          
    
    
    </table>
</form>
        </div>
    </body>
</html>
                       


