<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>

    <?php
    require_once "banco.php";
    require_once "funcoes.php";
    require_once "login.php";
    ?>
    <div id="corpo">
    <?php
     $c= $_GET['cod'] ?? 0;
    ?>
    <script><a href="deletar?id=1" onclick="return confirm('Tem certeza que deseja deletar este registro?')">Excluir</a></script>
        <?php
        if(!is_admin()){
            echo msg_erro('Área restrita você não tem permisão');
        }else{
                    $q="DELETE FROM noticia WHERE ID_NOTICIA = '$c'";
                    
                    if($banco->query($q)){
                        echo msg_sucesso("Notícia deletada com sucessos");
                    }else{
                        echo msg_erro("erro ao deletar a notícia");
                    }
        }  
        ?>
        
        </div>
    <?php echo voltar(); ?>
    <?php /*include_once "rodape.php";*/?>
    </body>
</html>