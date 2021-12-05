<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php
    require_once "banco.php";
    require_once "funcoes.php";
    require_once "login.php";
    ?>
    <div id="corpo">
    <?php
    $u=$_POST['email']?? null;
    $s=$_POST['senha']?? null;

    if(is_null($u)|| is_null($s)){
        require "user_login_form.php";
    }else{
        $q="select id_usuario,login_email, nome, senha, ADM from usuario where login_email='$u' limit 1";
        $busca = $banco->query($q);
        if(!$busca){
            echo msg_erro("<h2>Falha ao acessar o banco!</h2>"); 
        }else{
            if($busca->num_rows>0){
             $reg = $busca->fetch_object();
             //print_r($reg);
             if(testarHash($s,$reg -> senha)){
                echo msg_sucesso('<h2>Logado Com sucesso</h2>');
                $_SESSION['usuario'] = $reg -> id_usuario;
                $_SESSION['email'] = $reg -> login_email;
                $_SESSION['nome'] = $reg -> nome;
                $_SESSION['adm'] = $reg -> ADM;
             }else{
                echo msg_erro('<h2>Senha inválida</h2>');
             }
            }else{
                echo msg_erro('<h2>Usuário não existe</h2>');
            }
        }
    }
   
    ?>
    </div>
    <?php/* require_once "rodape.php" */?>
</body>

</html>