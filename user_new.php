<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Novo Usuário</title>
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
    $ordem=$_GET['o'] ?? "n";
    $chave=$_GET['c'] ?? "";
    ?>
    <div id="corpo">
    <?php
        if(!isset($_POST['email'])){
            require "user_new_form.php";
        }else{

            $email=$_POST['email'] ?? null;
            $nome=$_POST['nome'] ?? null;
            $senha1=$_POST['senha1'] ?? null;
            $senha2=$_POST['senha2'] ?? null;

            $q2= "SELECT * FROM usuario WHERE nome = '$nome' AND LOGIN_EMAIL = '$email'";
            $query = $banco->query($q2);
            if(!$query->num_rows > 0){
            $valideemail=valida_email($email);
            if($valideemail==$email){
            if($senha1 === $senha2){
                if(empty($email)||empty($nome)||empty($senha1)||empty($senha2)){
                    echo msg_erro('Todos os dados são obrigatórios');
                }else{
                    $senha=gerarHash($senha1);
                    $q="INSERT INTO usuario(id_usuario,login_email, nome, senha, ADM)VALUES('','$email','$nome','$senha','3')";
                    if($banco->query($q)){
                        echo msg_sucesso("Usuário $nome cadastrado com sucesso");
                    }else{
                        echo msg_erro("Não foi possivel criar o usuário $nome");
                    }
                }
                
            }else{
                echo msg_erro('Senhas não conferem. Repita o procedimento!');
            }
        }else{
            echo msg_erro('Email incorreto');
        }
    }else{
        echo msg_erro('Já exite um usuário registrado com os mesmo dados! Faça login...');
    }
        }

    echo voltar();

    ?>
    </div>
    <?php/* require_once "rodape.php" */?>
    </body>
</html>