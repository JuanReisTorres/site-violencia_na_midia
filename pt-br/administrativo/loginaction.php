<?php
    if(!isset($_POST['email']) || !isset($_POST['senha'])){
        return;
    }

    include("../bd/conectar.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $checar = "select * from admins where email='" .$email. "' and senha='".$senha."';";
    $linhas = $conexao -> query($checar);
    if($linhas -> num_rows > 0){
            $id = 0;
            while($adminID = $linhas -> fetch_assoc()){
                $id = $adminID['adminid'];
            }
            session_start();
            $_SESSION['logado'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: painel.php');
    }else{
        $erro = "Verifique as informações e tente novamente <br> <a href='index.php'>Tentar novamente</a>";
    }

    $conexao -> close();
?>