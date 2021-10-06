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
$q="select ID_CATEGORIA,NOME from CATEGORIA ";
$busca= $banco->query($q);
?>


<form action="noticia_new.php" method="post" name="novofilme">
<table>
    <tr><td>Titulo:<td><input type="text" name="titulo" id="titulo" size="30" maxlength="30"></td></tr>
    <br>
    <tr><td>Descricão:<td><textarea  id="descricao" name="descricao"  rows="5"> </textarea></td></tr>
    <br>
    <tr><td>Texto:<td><textarea  id="texto" name="texto"  rows="5"> </textarea></td></tr>
    <br>
    <tr><td>Foto:<input type="file" id="imagem" name="imagem"></td></tr>
    <br>
          <tr><td>Categoria:<td><select name="categoria" id="categoria">
              <?php
              while($reg=$busca->fetch_object()){
                  
                  echo "<option value='$reg->ID_CATEGORIA'>$reg->NOME</option>";
              }
              
            ?>
                 </select></td></tr>   

                 <br>
    <tr><td><input type="submit" value="salvar filme" ></td></tr>
                          
    
    
    </table>
</form>
        </div>
    </body>
</html>
                       


</html>