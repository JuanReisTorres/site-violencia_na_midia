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
            $mensagem = "JÁ EXISTE UM DEPOIMENTO IGUAL AO SEU CADASTRADO NO SISTEMA.<br>";
            $erro=1;
        }

        if (empty($nome) or strstr ($nome, '' == false)){
            $mensagem = "FAVOR DIGITAR SEU NOME CORRETAMENTE.<br>";
            $erro=1;
        }
    
        if (strlen($email) < 8 || strstr ($email, '@' == false)){
            $mensagem .= "FAVOR DIGITAR SEU EMAIL CORRETAMENTE.<br>";
            $erro=1;
        }  

         if (strlen($relato) < 100){
            $mensagem .= "FAVOR DIGITAR UM RELATO DE NO MÍNIMO 100 CARACTERES.<br>";
            $erro=1;
         }
        
        if(empty($sexo)){
            $mensagem .= "FAVOR DIGITAR O SEU SEXO.<br>";
            $erro=1;
        }
    
        if (strlen($estado) != 2){
            $mensagem .= "FAVOR DIGITAR O SEU ESTADO.<br>";
            $erro=1;
        }
    
        if(empty($relato)){
            $mensagem .= "SEU RELATO NÃO PODE SER EM BRANCO.<br>";
            $erro=1;
        }
    
        if($erro == 0){
            include 'depSucesso.php';
        }else{
            include 'formerros.php';
        }
            
?>