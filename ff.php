<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
img.mini{
    width: 400px;
    padding: 10px;
}

img.full{
    height: 600px;
    
}

.ala{
    padding-top: 2%;
    padding-left: 10%;
    padding-right: 10%;
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
    <div> 
    <div class="ala">
        <table class="listagem">
            <?php
            $q="SELECT * from noticia WHERE CATEGORIA=3";
            $busca2 = $banco->query("SELECT * FROM categoria WHERE ID_CATEGORIA=3");
            $busca1=$banco->query($q);
            if(!$busca1){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca1->num_rows==0){
                    echo "<tr><td>Nenhum registro encontardo";
                }else{
                    $reg=$busca1->fetch_object(); // FFF foco força e fe//
                    $reg2=$busca2->fetch_object();
                    while($reg=$busca1->fetch_object()){
                        $t = thumb($reg->IMAGEM); 
                        echo "<tr><td><a href='detalhes.php?cod=$reg->ID_NOTICIA'><img src='$t' class='mini'></a>";
                        echo "<pre><td><a href='detalhes.php?cod=$reg->ID_NOTICIA'>$reg->TITULO</a></pre>";
                        echo "<br>$reg2->NOME";
                        echo "<br>$reg->DESCRICAO";
                        echo "<br>$reg->DIA";

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