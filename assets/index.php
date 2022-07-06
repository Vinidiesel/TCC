<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
img.mini{
    width: 400px;
    height: 250px;
    padding: 10px;
}

img.full{
    height: 600px;
    
}
img.carrosel{
  width: 91% ;
}
.ala{
    padding-top: 2%;
    padding-left: 10%;
    padding-right: 10%;
}
.ale{
  padding-top: 1%;
}
</style>
</head>
<body>
    <?php
    /*Com incluide se ele não encontrar o banco ele continua o site
    já com o require se ele não acha o site mata o resto*/
    require_once "banco.php";
    require_once "funcoes.php";
    require_once "login.php";
    $ordem=$_GET['o'] ?? "n";
    $chave=$_GET['c'] ?? "";
    ?>
    <div id="corpo">
        <?php include_once "topo.php"; ?>
        <center><div class="ale">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <a href='detalhes.php?cod=7'><img class="carrosel" src="images/navi-campea-pgl-major.jpg" alt="...">
  <div class="carousel-caption d-none d-md-block">
  <font color="white"><h5><b>PGL Major Stockholm: NAVI derrota G2 e conquista o título; s1mple MVP</b></h5>
    <p>Em um jogo pegado, e com um grande erro do Niko, a NAVI sai vencedora e com uma trajetória perfeita</p></font></a>
  </div>
  
</div>
    <div class="carousel-item">
    <a href='detalhes.php?cod=8'><img class="carrosel" src="images/tinin2.jpg" alt="...">
  <div class="carousel-caption d-none d-md-block">
  <font color="white"><h5><b>LoL: Tinowns anuncia saída da Pain; "Que sorte a nossa", diz organização</b></h5>
    <p>Em postagem de despedida, meio diz que colocou "sonhos, objetivos e carreira acima de tudo" ao anunciar a não renovação de contrato com a Pain</p></font></a>

  </div>
</div>
<div class="carousel-item">
<a href='detalhes.php?cod=9'><img class="carrosel" src="images/TACO-GODSENT-PGL-Major-Stockholm-csgo-800x534.jpg" alt="...">
  <div class="carousel-caption d-none d-md-block">
  <font color="white"><h5><b>IEM Winter: GODSENT vence BIG de virada e vai aos playoffs</b></h5>
    <p>A GODSENT conquistou a segunda vitória na IEM Winter ao derrotar a BIG de virada nesta sexta-feira (3). Com a vitória, a equipe brasileira segue na Upper Bracket e está garantida nos playoffs.</p>
    </font></a>
  </div>
</div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="sr-only">Próximo</span>
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
    
  </a>
</div></div></div></center>


    <div> 
    <div class="ala">
        <table class="listagem">
            <?php
            $q="select n.ID_NOTICIA, n.TITULO, n.DESCRICAO, n.IMAGEM, n.DIA, c.NOME from NOTICIA n join CATEGORIA c on n.CATEGORIA=c.ID_CATEGORIA ORDER BY n.DIA DESC";
            $busca=$banco->query($q);
            if(!$busca){
                echo "<tr><td><h2>Infelizmente a busca deu errado</h2>";
            }else{
                if($busca->num_rows==0){
                    echo "<tr><td><h2>Nenhum registro encontrado</h2>";
                }else{
                    while($reg=$busca->fetch_object()){
                        $t = thumb($reg->IMAGEM); 
                        echo "<tr><td><a href='detalhes.php?cod=$reg->ID_NOTICIA'><img src='$t' class='mini'></a>";
                        echo "<font color='black'><pre><td><a href='detalhes.php?cod=$reg->ID_NOTICIA'><font color='black'>$reg->TITULO</font></a></pre>";
                        echo "<br>$reg->NOME";
                        echo "<br>$reg->DESCRICAO";
                        echo "<br>$reg->DIA";

                        if(is_admin()){
                            echo "<td><a href='noticia_edit.php?cod=$reg->ID_NOTICIA'<i class='material-icons'>edit</i></a>";
                            echo "<a href='forms/delete_form.php?cod=$reg->ID_NOTICIA'<i class='material-icons'>delete</i></a>";
                        }elseif(is_editor()){
                          echo "<td><a href='noticia_edit.php?cod=$reg->ID_NOTICIA'<i class='material-icons'>edit</i></a>";
                        }
                    }
                }
            }
            ?>  
        </table>
        <div>  
       
    </div>
    <?php 
    //include_once "rodape.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
        </section>
</html>