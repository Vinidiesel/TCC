<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
.ala{
    padding-top: 5%;
    padding-left: 35%;
    padding-right: 35%;
}
.forms{
    padding-top: 60%;
}
</style>
</head>
<body>
<?php include_once "topo.php"; ?>
        <div class="ala">
        <table>
        <?php
        $dataerrada=date('Y-m-d H:i:s');
        $fuso = new DateTimeZone('America/Sao_Paulo');
        $data = new DateTime($dataerrada);
        $data->setTimezone($fuso);
        $diaanterior = gmdate('Y-m-d H:i:s', time()-(3600*27));
        $q="select m.ID_MENSAGEM,m.TEXTO,m.DATA_ENVIO,u.NOME from MENSAGEM m join USUARIO u on m.ID_USUARIO=u.ID_USUARIO WHERE DATA_ENVIO > '$diaanterior' ORDER BY DATA_ENVIO DESC;";
        $busca=$banco->query($q);
        if(!$busca){
            echo "<tr><td><h2>Infelizmente a busca deu errado</h2>";
        }else{
            if($busca->num_rows==0){
                echo "<tr><td><h2>Nenhum mensagem encontrada</h2>";
            }else{
                $x=0;
                while($reg=$busca->fetch_object()){
                    if($x<7){
                    echo "<div style='color: black'><b>$reg->NOME: </b></div>";
                    echo "<div style='color: black'>$reg->TEXTO </div> ";
                    echo "<div style='color: gray'>$reg->DATA_ENVIO</div><br>";
                    }
                    $x++;

                }
            }
        }
        ?>
        </table>
        <br><br/>
        <form action="" method="post">
<div class="forms">
        <div class="input-group mb-3">
  <div class="input-group-prepend">
  <button class="btn btn-outline-secondary" type="submit">Enviar</button>
  </div>
  <input placeholder="Conversar"  class="form-control" aria-label="" aria-describedby="basic-addon1" type="text" name="texto">
    </div>
    </div>
    </form>
        
    <?php
        if(isset($_POST['texto'])){
            $mensagem=  $_POST['texto'] ?? null;
            $databanco=$data->format('Y-m-d H:i:s');
            $usuario = $_SESSION['usuario'] ?? null;
            if(empty($mensagem)||empty($data)||empty($usuario)){
                echo msg_erro('Você precisa digitar um texto');
            }else{
                $q= "INSERT INTO mensagem(ID_MENSAGEM,TEXTO,DATA_ENVIO,ID_USUARIO) VALUES('','$mensagem','$databanco','$usuario')";
                if($banco->query($q)){
                }else{
                    echo msg_erro("Não foi possivel enviar a mensagem");
                }
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        ?>
        </body>
</html>