<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <style>
      div#corpo{
          width: 270px;
          font-size:15pt;
      }
      td{
          padding:6px;
      }
      </style>
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
            echo msg_erro("Falha ao acessar o banco!");
        }else{
            if($busca->num_rows>0){
             $reg = $busca->fetch_object();
             //print_r($reg);
             if(testarHash($s,$reg -> senha)){
                echo msg_sucesso('Logado Com sucesso');
                $_SESSION['usuario'] = $reg -> id_usuario;
                $_SESSION['email'] = $reg -> login_email;
                $_SESSION['nome'] = $reg -> nome;
                $_SESSION['adm'] = $reg -> ADM;
             }else{
                echo msg_erro('Senha inválida');
             }
            }else{
                echo msg_erro('Usuário não existe');
            }
        }
    }
    echo voltar();
    ?>
    </div>
    <?php/* require_once "rodape.php" */?>
</body>

</html>