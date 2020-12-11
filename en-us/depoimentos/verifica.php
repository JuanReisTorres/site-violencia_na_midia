<?php
        $depid = 0;
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $sexo = $_POST['sexo'];
        $relato =  $_POST['relato'];
        $data_atual = date("Y-m-d H:i:s");

        $acompanha = $_POST['redessociais'];
        $redesResult = "";
        foreach($acompanha as $redes){
            $redesResult .= $redes . ", ";
        }

        $mensagem = "";

        //checar clone
        include("../bd/conectar.php");
        $clonesql = "select depid from depoimentos where relato = '".$relato."'";
        $resultClone = $conexao -> query($clonesql);
        if($resultClone -> num_rows > 0){
            $mensagem = "THERE IS ALREADY A REPORT JUST LIKE YOURS REGISTERED IN THE SYSTEM.<br>";
            $erro=1;
        }

        if (empty($nome) or strstr ($nome, '' == false)){
            $mensagem = "PLEASE ENTER YOUR NAME CORRECTLY.<br>";
            $erro=1;
        }
    
        if (strlen($email) < 8 || strstr ($email, '@' == false)){
            $mensagem .= "PLEASE ENTER YOUR E-MAIL CORRECTLY.<br>";
            $erro=1;
        }  

         if (strlen($relato) < 100){
            $mensagem .= "PLEASE ENTER A REPORT WITH AT LEAST 100 CHARACTERS.<br>";
            $erro=1;
         }

         if (strlen($relato) > 450){
            $mensagem .= "YOUR REPORT MUST BE LESS THAN 450 CHARACTERS.<br>";
            $erro=1;
         }
        
        if(empty($sexo)){
            $mensagem .= "PLEASE ENTER YOUR GENDER.<br>";
            $erro=1;
        }
    
        if (strlen($estado) != 2){
            $mensagem .= "PLEASE ENTER YOUR STATE.<br>";
            $erro=1;
        }
    
        if(empty($relato)){
            $mensagem .= "YOUR REPORT CAN NOT BE BLANK.<br>";
            $erro=1;
        }
    
        if($erro == 0){
            include 'depSucesso.php';
        }else{
            include 'formerros.php';
        }
            
?>