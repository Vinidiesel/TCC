<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
</head>
<body>
    <?php
    /*Com incluide se ele não encontrar o banco ele continua o site
    já com o require se ele não acha o site mata o resto*/
    require_once "banco.php";
    require_once "funcoes.php";
    require_once "login.php";
    ?>
    <div id="corpo">
        <?php include_once "topo.php"; ?>
        <h1>Meus Dados</h1>
            <?php
            $c= $_GET['cod'] ?? 0;
            if(!is_logado()){
                echo msg_erro("Efetue o login para editar seus dados");
            }else{
            $busca = $banco->query("SELECT * from usuario where ID_USUARIO='$c'");
            $busca2 = $banco->query("SELECT * from mensagem where ID_USUARIO='$c'");
            $reg=$busca->fetch_object();
            $reg2=$busca2->fetch_object();
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca->num_rows == 1){
                    echo "<tr><td>Nome: $reg->NOME";
                    echo "<br><tr><td>Email: $reg->LOGIN_EMAIL";
                    while($reg2=$busca2->fetch_object()){
                    echo "<br><tr><td>[$reg2->DATA_ENVIO] Mensagem: $reg2->TEXTO ";
                    }
                }else{ 
                        echo "<tr><td>Nenhum registro encontardo";
                }
            }
        }
            ?>    
        </table>
    </div>
    <?php echo voltar();?>
    <?php 
    //include_once "rodape.php";
    ?>
</body>
</html>