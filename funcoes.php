<?php
    function thumb($arq){
        $caminho="$arq";
        if(is_null($arq) || !file_exists($caminho)){
            return "indisponivel.png";
        }else{
            return $caminho;
        }
    }
    function voltar(){
        return "<a href='index.php'><span class='material-icons'>arrow_back</span></a>";
    }
    function msg_sucesso($m){
        $resp= "<div class='sucesso'><span class='material-icons'>check_circle</span> $m </div>";
        
        return $resp;
    }
    function msg_aviso($m){
        $resp= "<div class='aviso'><span class='material-icons'>info</span> $m </div>";
        
        return $resp;
    }
    function msg_erro($m){
        $resp= "<div class='erro'><span class='material-icons'>error</span> $m </div>";
        
        return $resp;
    }
    function valida_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function ExisteUsuario($u, $e){

        $cmd = "SELECT * FROM usuario WHERE nome = '$u' AND LOGIN_EMAIL = '$e';";
        $result = mysql_query($cmd);
        $rows = mysql_num_rows($result);

        if(1 == $rows){
            return true;
        }

        else{
            return false;
        }
    }
?>