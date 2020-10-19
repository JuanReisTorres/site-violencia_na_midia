<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css?version=1">
        <script language="javascript">
            
        </script>
        <title></title>
    </head>
    <body>
        <header>
            <!-- (CABECALHO) NAVBAR/LOGO -->    
            <?php include("../content/cabecalho.php");?>
        </header>
        <article class="articlepainel">
            <p> Bem-vindo ao painel, hoje é dia <?php echo date("d-m-y");?> </p>
            <form action="manager/manager.php" method="get">
                <label for="pesquisa">Efetuar pesquisa de ID: </label> <input type="number" name="pesquisa" id="pesquisa">
                <input type="submit" value="Pesquisar">
            </form>
            <div class="listaropcao">
            <ul>
            <li><a id="analisehref" href="manager/analise.php">Ver depoimentos que estão em analise</a></li><br>
            <li><a id="aceitohref" href="manager/aceito.php">Ver depoimentos que foram aceitos</a></li><br>
            <li><a id="recusadohref" href="manager/rejeitado.php">Ver depoimentos que foram recusados</a></li>
            </ul>
            </div>
        </article>
        <footer>
            <!-- (FOOTER) FOOTER -->
            <?php include("../content/footer.php");?>
        </footer>
    </body>
</html>