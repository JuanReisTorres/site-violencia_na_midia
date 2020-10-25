<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css?version=0">
        <title></title>
    </head>
    <body>
        <header>
            <!-- (CABECALHO) NAVBAR/LOGO -->    
            <?php include("../content/cabecalho.php");?>
        </header>
        <article class="loginpainel">
            <h1>Faça login para continuar</h1>
            <form action="loginaction.php" method="post">
                <label for="email">E-mail: </label> <input name="email" type="email"><br><br>
                <label for="senha">Senha: </label> <input name="senha" type="password"><br><br>
                <input type="submit" value="ENTRAR">
            </form>
        </article>
        <footer>
            <!-- (FOOTER) FOOTER -->
            <?php include("../content/footer.php");?>
        </footer>
    </body>
</html>