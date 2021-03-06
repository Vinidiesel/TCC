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
    $dataerrada=date('Y-m-d H:i:s');
    $fuso = new DateTimeZone('America/Sao_Paulo');
    $data = new DateTime($dataerrada);
    $data->setTimezone($fuso);
        if(!isset($_POST['email'])){
            require "forms/user_new_form.php";
        }else{

            $email=$_POST['email'] ?? null;
            $nome=$_POST['nome'] ?? null;
            $senha1=$_POST['senha1'] ?? null;
            $senha2=$_POST['senha2'] ?? null;
            $databanco=$data->format('Y-m-d H:i:s');

            $q2= "SELECT * FROM usuario WHERE nome = '$nome' AND LOGIN_EMAIL = '$email'";
            $query = $banco->query($q2);
            if(!$query->num_rows > 0){
            $valideemail=valida_email($email);
            if($valideemail==$email){
            if($senha1 === $senha2){
                if(empty($email)||empty($nome)||empty($senha1)||empty($senha2)){
                    echo msg_erro('<h2>Todos os dados são obrigatórios</h2>');
                }else{
                    $senha=gerarHash($senha1);
                    $q="INSERT INTO usuario(id_usuario,login_email, nome, senha, ADM, DATA_CADASTRO)VALUES('','$email','$nome','$senha','3','$databanco')";
                    if($banco->query($q)){
                        echo msg_sucesso("<h2>Usuário</h2> $nome <h2>cadastrado com sucesso</h2>");
                    }else{
                        echo msg_erro("<h2>Não foi possivel criar o usuário</h2> $nome");
                    }
                }
                
            }else{
                echo msg_erro('<h2>Senhas não conferem. Repita o procedimento!</h2>');
            }
        }else{
            echo msg_erro('<h2>Email incorreto</h2>');
        }
    }else{
        echo msg_erro('<h2>Já exite um usuário registrado com os mesmo dados! Faça login...</h2>');
    }
        }


    ?>
    </div>
    </body>
</html>