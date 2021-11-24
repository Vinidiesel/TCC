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
<style>
   h1{
    text-align: center;
   }
   .gradient-custom {
    /* fallback for old browsers */
    background: #6a11cb;
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to center, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
} 
</style>
<body>
<section class="vh-full gradient-custom">
<div id="corpo">
<h1>NOVA NOTÍCIA </h1>

<?php
$q="select ID_CATEGORIA,NOME from CATEGORIA ";
$busca= $banco->query($q);
?>


<form action="noticia_new.php" method="post" name="novofilme">
<table>
    <tr><td><h1>Titulo:</h1><td><textarea type="text" name="titulo" id="titulo" size="30" maxlength="30" style =""></textarea></td></tr>
    <br>
    <tr><td><h1>Descricão:</h1><td><textarea  id="descricao" name="descricao"  rows="5"> </textarea></td></tr>
    <br>
    <tr><td><h1>Texto:</h1><td><textarea  id="texto" name="texto"  rows="5"> </textarea></td></tr>
    <br>
    <tr><td><h1>Foto:</h1><input type="file" id="imagem" name="imagem"></td></tr>
    <br>
          <tr><td><h1>Categoria:</h1><td><select name="categoria" id="categoria">
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
                       

<?php echo voltar(); ?> 
</section>