<?php
    session_start();
    if(isset($_SESSION['logado'])){
    //Mexer nos voltar pagina quando mexer nos status
    include("../../bd/conectar.php");
    $analise = "select * from depoimentos where depstatus='0'";
    $aceitos = "select * from depoimentos where depstatus='1'";
    $rejeitados = "select * from depoimentos where depstatus='2'";

    $resultado_analise = $conexao -> query($analise);
    $resultado_aceitos = $conexao -> query($aceitos);
    $resultado_rejeitados = $conexao -> query($rejeitados); 

    if (isset($_GET['aprovar'])) {
        $id = $_GET['aprovar'];
        $sql = "update depoimentos SET depstatus='1' where depid='".$id."'";
        if($conexao -> query($sql)){
            echo '<script type="text/javascript">alert("O depoimento de ID '.$id.' foi aprovado!")</script>';
            echo '<script language="javascript">javascript:history.go(-1)</script>';
        }else{
            echo '<script type="text/javascript">alert("Ocorreu um erro:'.$conexao -> error.'")</script>';
            echo '<script language="javascript">javascript:history.go(-1)</script>';
        }
    }

    if(isset($_GET['reprovar'])){
        $id = $_GET['reprovar'];
        $sql = "update depoimentos SET depstatus='2' where depid='".$id."'";
        if($conexao -> query($sql)){
            echo '<script type="text/javascript">alert("O depoimento de ID '.$id.' foi reprovado!")</script>';
            echo '<script language="javascript">javascript:history.go(-1)</script>';
        }else{
            echo '<script type="text/javascript">alert("Ocorreu um erro:'.$conexao -> error.'")</script>';
            echo '<script language="javascript">javascript:history.go(-1)</script>';
        }
    }

    if(isset($_GET['analise'])){
        $id = $_GET['analise'];
        $sql = "update depoimentos SET depstatus='0' where depid='".$id."'";
        if($conexao -> query($sql)){
            echo '<script type="text/javascript">alert("O depoimento de ID '.$id.' foi deixado em analise!")</script>';
            echo '<script language="javascript">javascript:history.go(-1)</script>';
        }else{
            echo '<script type="text/javascript">alert("Ocorreu um erro:'.$conexao -> error.'")</script>';
            echo '<script language="javascript">javascript:history.go(-1)</script>';

        }
    }

    if(isset($_GET['pesquisa'])){
        $id = $_GET['pesquisa'];
        $sql = "select depstatus from depoimentos where depid='".$id."'";
        $resultado = $conexao -> query($sql);
        if($resultado->num_rows > 0){
            switch ($resultado){
                case 0:
                    echo '<script type="text/javascript">alert("O depoimento de número'.$id.' está em analise")</script>';
                    break;
                case 1:
                    echo '<script type="text/javascript">alert("O depoimento de número'.$id.' está aprovado")</script>';
                    break;
                case 2:
                    echo '<script type="text/javascript">alert("O depoimento de número'.$id.' foi rejeitado")</script>';
                    break;
            }
            echo '<script language="javascript">javascript:history.go(-1)</script>';
        }else{
            echo '<script type="text/javascript">alert("Não foi encontrado no sistema")</script>';
            echo '<script language="javascript">javascript:history.go(-1)</script>';

        }
    }
    }else{
        header("Location: index.php");
    }
    $conexao -> close();
?>