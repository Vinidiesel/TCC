<!DOCTYPE html>
<html lang="pt-br">
<section class="vh-100 gradient-custom">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
img.mini{
    width: 250px;
    padding: 10px;
}

img.full{
    height: 600px;
    
}
</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
    /*Com incluide se ele não encontrar o banco ele continua o site
    já com o require se ele não acha o site mata o resto*/
    require_once "banco.php";
    require_once "funcoes.php";
    require_once "login.php";
    $ordem=$_GET['o'] ?? "n";
    $chave=$_GET['c'] ?? "";
    ?>
    <div id="corpo"><center>
        <?php include_once "topo.php"; ?>
        <h1>Site de noticias</h1>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 70%">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
    <a href="https://cdn.folhape.com.br/upload/dn_arquivo/2021/11/arcane.jpg"><img class="d-block w-100" src="https://cdn.folhape.com.br/upload/dn_arquivo/2021/11/arcane.jpg" alt="First slide"></a>
    </div>

    <div class="item">
    <a href="https://i.ytimg.com/vi/skkMrvjQkM0/maxresdefault.jpg"><img class="d-block w-100" src="https://i.ytimg.com/vi/skkMrvjQkM0/maxresdefault.jpg" alt="Second slide"></a>
    </div>

    <div class="item">
      <img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>
    <div class="vh-100 gradient-custom"><center>
        <table class="listagem">
            <?php
            $q="select n.ID_NOTICIA, n.TITULO, n.DESCRICAO, n.IMAGEM, n.DIA, c.NOME from NOTICIA n join CATEGORIA c on n.CATEGORIA=c.ID_CATEGORIA ";
            $busca=$banco->query($q);
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca->num_rows==0){
                    echo "<tr><td>Nenhum registro encontardo";
                }else{
                    while($reg=$busca->fetch_object()){
                        $t = thumb($reg->IMAGEM); 
                        echo "<tr><img src='$t' class='mini'>";
                        echo "<a href='detalhes.php?cod=$reg->ID_NOTICIA'>$reg->TITULO</a>";
                        echo "<br>[$reg->NOME]";
                        echo "<br>$reg->DESCRICAO";
                        echo "<br>[$reg->DIA]";

                        if(is_admin()){
                            echo "<td><a href='noticia_edit.php?cod=$reg->ID_NOTICIA'<i class='material-icons'>edit</i></a>";
                            echo "<a href='delete_form.php?cod=$reg->ID_NOTICIA'<i class='material-icons'>delete</i></a>";
                        }elseif(is_editor()){
                            echo "<td>Alterar";
                        }
                    }
                }
            }
            ?>    
        </table>
       
    </div></center>
    <?php 
    //include_once "rodape.php";
    ?>
</body>
        </selection>
</html>