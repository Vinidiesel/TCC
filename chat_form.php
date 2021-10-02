<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
</head>
<body>
<?php include_once "topo.php"; ?>
        <form method="get" id="busca" action="index.php">
        Buscar: <input type="text" name="c" size="10" maxlength="40">
        <input type="submit" value="OK">
        </form>
        <table class="chat">
        <?php
        $q="select m.ID_MENSAGEM,m.TEXTO,m.DATA_ENVIO,u.NOME from MENSAGEM m join USUARIO u on m.ID_USUARIO=u.ID_USUARIO ";
        $q.="ORDER BY DATA_ENVIO ASC; ";
        $busca=$banco->query($q);
        if(!$busca){
            echo "<tr><td>Infelizmente a busca deu errado";
        }else{
            if($busca->num_rows==0){
                echo "<tr><td>Nenhum mensagem encontrada";
            }else{
                while($reg=$busca->fetch_object()){
                    echo "<br>$reg->TEXTO";
                    echo "[$reg->DATA_ENVIO]";
                    echo "[$reg->NOME]";
                    /*
                    if(is_admin()){
                    }elseif(is_editor()){
                    }*/
                }
            }
        }
        ?>
        <br><br/>
        <form action="" method="post">
        <td><textarea placeholder="Conversar" class="chat" name="texto" rows="1" cols="30"></textarea> 
        <td><input class="chat" type="submit" value="Enviar">
    </form>
        
    <?php
        if(isset($_POST['texto'])){
            $mensagem=  $_POST['texto'] ?? null;
            $data = date('Y-m-d H:i:s');
            $usuario = $_SESSION['usuario'] ?? null;
            if(empty($mensagem)||empty($data)||empty($usuario)){
                echo msg_erro('Você precisa digitar um texto');
            }else{
                $q= "INSERT INTO mensagem(ID_MENSAGEM,TEXTO,DATA_ENVIO,ID_USUARIO) VALUES('','$mensagem','$data','$usuario')";
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