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
            echo msg_erro('<h2>Área restrita você não tem permisão</h2>');
        }else{
                    $q="DELETE FROM noticia WHERE ID_NOTICIA = '$c'";
                    
                    if($banco->query($q)){
                        echo msg_sucesso("<h2>Notícia deletada com sucessos</h2>");
                    }else{
                        echo msg_erro("<h2>erro ao deletar a notícia</h2>");
                    }
        }  
        ?>
        
    </div>
    <?php /*include_once "rodape.php";*/?>
    </body>
</html>