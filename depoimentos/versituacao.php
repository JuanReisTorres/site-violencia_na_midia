<?php
    include("../bd/conectar.php");
    if(!isset($_GET["id"])) {
        $titulo = "Digite abaixo o ID:";
        $statusText= '<form action="?id" method="get">
        <label for="id"> </label><br>
        <input name="id" type="number"> </input>
        <input type="submit" value="Procurar">
        </form>
        ';
    }else{
    $titulo = "Resultado:";
    $id = $_GET["id"];
    $status = 0;
    $statusText = "";
    $sql = "select depstatus from depoimentos where depid='".$id."'"; 
    $resultado = $conexao -> query($sql);
    if($resultado -> num_rows > 0){
        while($depstatus = $resultado -> fetch_assoc()){
            $status = $depstatus['depstatus'];
        }
        switch($status){
        case 0:
            $statusText = 'Em análise<br><a href="versituacao.php">Procurar novamente</a>';
            break;
        case 1:
            $statusText = 'Aprovado<br><a href="versituacao.php">Procurar novamente</a>';
            break;
        case 2:
            $statusText = 'Reprovado<br><a href="versituacao.php">Procurar novamente</a>';
            ;
    }
        
    }else{
        $statusText = "ID não encontrado no sistema";
    }
    $conexao ->close();
}
    
?>
<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type=text/css href="../css/estilo.css?version=0">
        <title>Situação</title>
    </head>
    <body>
        <header>
            <!-- (CABECALHO) NAVBAR/LOGO -->    
            <?php include("../content/cabecalho.php");?>
        </header>
        <article class="formsend">
            <h1><?php echo $titulo; ?></h1>
            <p><?php echo $statusText; ?>
            </p>
        </article>
        <footer>
            <!-- (FOOTER) FOOTER -->
            <?php include("../content/footer.php");?>
        </footer>
    </body>
</html>