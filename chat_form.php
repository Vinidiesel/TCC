<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: lightgrey">
<?php include_once "topo.php"; ?>
        <form method="get" id="busca" action="index.php">
        Buscar: <input type="text" name="c" size="20" maxlength="40">
        <input type="submit" value="OK" style="position: absolute; left: 249px">
        </form>
        <div style="margin: auto; width: 60%;: 5px solid # FFFF00; fill: 10px; max-width: 50%; border-style: solid; border-width: 1px">
        <table class="chat">
        <?php
        $dataerrada=date('Y-m-d H:i:s');
        $fuso = new DateTimeZone('America/Sao_Paulo');
        $data = new DateTime($dataerrada);
        $data->setTimezone($fuso);
        $diaanterior = gmdate('Y-m-d H:i:s', time()-(3600*27));
        $q="select m.ID_MENSAGEM,m.TEXTO,m.DATA_ENVIO,u.NOME from MENSAGEM m join USUARIO u on m.ID_USUARIO=u.ID_USUARIO WHERE DATA_ENVIO > '$diaanterior' ORDER BY DATA_ENVIO DESC;";
        $busca=$banco->query($q);
        if(!$busca){
            echo "<tr><td>Infelizmente a busca deu errado";
        }else{
            if($busca->num_rows==0){
                echo "<tr><td>Nenhum mensagem encontrada";
            }else{
                $x=0;
                while($reg=$busca->fetch_object()){
                    if($x<7){
                    
                    echo "<div style='color: Blue'><br><br>$reg->NOME: </div>";
                    echo "<div style='color: Black'><br>$reg->TEXTO: </div> ";
                    echo "<div style='color: gray'>[$reg->DATA_ENVIO]</div>";
                    }
                    $x++;

                }
            }
        }
        ?>
        </table>
        <br><br/>
        <form action="" method="post">
            <div style="position: fixed; bottom: 30px;">
            <input placeholder="Conversar" class="chat" name="texto" rows="1" cols="96">
        <input class="chat" type="submit" value="Enviar" style="position: fixed; top: 20">
    </div>
        <p style="position: fixed; bottom: -20px">
        <?php echo voltar();?>
        </p>
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
                    echo msg_sucesso("Mensagem $mensagem Enviado com sucesso");
                }else{
                    echo msg_erro("Não foi possivel enviar a mensagem");
                }
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        ?>
        </body>
</html>