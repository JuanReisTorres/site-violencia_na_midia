<?php
    $servidor= "localhost";
    $porta = "3307";
    $usuario = "admin";
    $senha = "admin";
    $dbname = "violencia_midia";
    //Criar conexão
    $conexao = mysqli_connect($nomeservidor.":".$porta, $usuario, $senha, $dbname);
    if(!$conexao){
        die("A conexão falhou:" . mysqli_connect_error() . "<br>Entre em contato com o administrador do site");
    }

?>