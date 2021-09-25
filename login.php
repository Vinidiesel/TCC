<?php

session_start();
if(!isset($_SESSION['email'])){
    $_SESSION['email']="";
    $_SESSION['nome']="";
    $_SESSION['adm']="";
}
function logout(){
    unset($_SESSION['email']);
    unset($_SESSION['nome']);
    unset($_SESSION['adm']);
}
function is_logado(){
    if(empty($_SESSION['email'])){
        return false;
    }else{
        return true;
    }
}
function is_admin(){
    $t = $_SESSION['adm'] ?? null;
    if(is_null($t)){
        return false;
    }else{
        if($t == '0'){
            return true;
        }else{
            return false;
        }
    }
}
function is_editor(){
    $t = $_SESSION['adm'] ?? null;
    if(is_null($t)){
        return false;
    }else{
        if($t == '1'){
            return true;
        }else{
            return false;
        }
    }
}
function gerarHash($senha){
    $txt=cripto($senha);
    $hash=password_hash($txt,PASSWORD_DEFAULT);
    return $hash;
}
function testarHash($senha,$hash){
    $ok=password_verify(cripto($senha),$hash);
    return $ok;
}

function cripto($senha){
    $c="";
    for($pos=0; $pos < strlen($senha); $pos++){
        $letra=ord($senha[$pos])+1;
        $c.=chr($letra);
    }
    return $c;
}
/*
$original="user";
echo "$original<br>";
echo cripto($original);
echo "<br>";
echo gerarHash($original);
echo "<br>";
echo testarHash($original,'$2y$10$yj.JDPfpy1KEkSZluh7.KuLkqcpBgmsGfrgCKZbIyYwjeM33jcvmq')?"SIM":"NAO";
*/

/*
echo gerarHash('Nota10');
echo "<br>";
echo testarHash('teste123','$2y$10$FFrXDTGYj.upqQg/prpi..L1Q2O0svJHxykp7peNsx0f4XRtbY9.C');
echo "<br>";
echo gerarHash('Nota1000');
echo "<br>";
echo testarHash('infonet2019IndustrialAraraquara','$2y$10$37nZEw0oNybQlvETEg2ayud9CGZKDRcwpVJw/sUQ8skm5RSKdax.2');
echo "<br>";

if(testarHash('teste123','$2y$10$FFrXDTGYj.upqQg/prpi..L1Q2O0svJHxykp7peNsx0f4XRtbY9.C')){
    echo "Senha confere";
}else{
    echo "Senha não confere";
}
*/
?>