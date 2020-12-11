<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css?version=0.42">
        <link rel="icon" href="../images/logo.png" type="image/png" sizes="16x16">
        <title>MídiaFear | VER DEPS</title>
    </head>
    <body>
        <header>
            <!-- (CABECALHO) NAVBAR/LOGO -->
            <div class="navbar">
                <a href="#"><img src="../images/logo.png" alt="logo-site" class="logo" alt="logo"/></a> 
            <ul class="menugeral">
                <li>
                    <span class="navimage"><img src="../images/icones/inicio.png" class="iconmenu"></span>
                    <a href="../index.html"> HOME </a>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/mascara.png" class="iconmenu"></span>
                    <a href="../content/index.html"> THE MIDIA AND THE FEAR </a>
                    <ul class="submenugeral"> 
                        <li><a href="../content/index.html">EXPOSURE</a></li>
                        <li><a href="../content/page2.html">MORE CONNECTED?</a></li>
                        <li><a href="../content/page3.html">THE SOCIAL IMPACT OF VIOLENCE ON MIDIA</a></li>
                        <li><a href="../content/page4.html">PARTICIPATION IN THE MEDIA</a></li>
                        <li><a href="../content/page5.html">MIDIA AND HARMONY</a></li>
                    </ul>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/depoimento.png" class="iconmenu"></span>
                    <a href="">TESTIMONIES</a>
                    <ul class="submenugeral"> 
                        <li><a href="../depoimentos/mostrarDepoimentos.php">SEE <br>TESTIMONY</a></li>
                        <li><a href="../depoimentos/index.html">SEND <br>TESTIMONY</a></li>
                        <li><a href="../depoimentos/verdep.php">SEARCH TESTIMONY</a></li>
                        <li><a href="../depoimentos/statusDep.php">SEE SITUATION OF MY TESTIMONY</a></li>
                    </ul>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/galeria.png" class="iconmenu"></span>
                    <a href="../galeria.html"> GALLERY </a>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/contatoo.png" class="iconmenu"></span>
                    <a href="../contato.html"> CONTACT </a>
                </li>            
            </ul>
        </div>
        </header>
        <!-- CENTRO SITE --> 
                <div class="paginatitulo">
                    <span class="pagename"> TESTIMONY </span>
                </div>
            <article class="depoimentoarticle">
                <div class="semifundo">
                        <div class="textopagetitulo" style="color:white;">
                            TESTIMONYS SENT BY USERS
                            <hr>
                        </div>
                    
                <?php
                    include("../bd/conectar.php");
                    $maxpage = 4; //Definindo o máximo de item a serem exibidos nas páginas
                    if(isset($_GET['pagina'])){ //Caso receba algum valor por método GET
                        $pagina_atual = $_GET['pagina']; //Vai transformar a pagina atual, em pagina atual
                        $min = ($pagina_atual * $maxpage) - $maxpage;
                        /* Calculará o registro (linha) mínimo para ser exibido, será pagina atual vezes quantidade de itens a serem exibidos menos quantidade de itens a serem exibidos, simplificando, se a pagina for = 3;
                            (3*5) - 5 = 10
                            Ou seja, o registro minimo que deve ser exibido é a partir do registro 10
                        */
                    }else{ //Caso estejamos na primeira página
                        $pagina_atual = 1; //Começaremos pela página 1
                        $min = 0; //Minimo 0
                    }

                    $sql_linhas_totais = "select depid from depoimentos where depstatus='1';";
                    $resultado_linhas = $conexao->query($sql_linhas_totais);
                    $sql = "select *, DATE_FORMAT(data_envio,'%m/%d/%Y') from depoimentos where depstatus = '1' LIMIT ".$maxpage." OFFSET ".$min.";"; /*Seleciona os campos com LIMIT já predefindos e o OFFSET diz para saltar esta quantidade de linhas antes de começar a retornar as linhas. */
                    $resultado = $conexao->query($sql);
                    
                    $qntde_pages = ceil($resultado_linhas->num_rows/$maxpage); //Calcular número de páginas, arrendondandos (resolver possíveis bug)
                    $conexao -> close();
                    
                    if($resultado->num_rows > 0){ //Se a quantidade de linhas forem maior que 0
                        echo '<div class="depoimentobox">';
                        while($linha = $resultado->fetch_assoc()){ //Recebendo a array resultado
                            echo '<div class="depoimento">';
                            echo '<span class="data">'.$linha["DATE_FORMAT(data_envio,'%m/%d/%Y')"].'</span><br>';
                            echo '<b>TESTIMONY ID:</b>' . $linha["depid"].'<br><br>';
                            echo '<b>Report: </b>' . mb_strimwidth($linha["relato"], 0, 100, "...").'<br>';
                            echo '<div class="verdepcompleto">';
                            echo '<a href="verdep.php?id='.$linha["depid"].'"> See full testimony </a> <br>';
                            echo '</div>';
                            echo "<br>";
                            echo '</div>';
                        }
                        echo '</div>';
                    echo '<div class="linksproximapagina">';
                    //Primeira pagina e ultima pagina sem Próxima/Anterior
                    switch($pagina_atual){
                        case 1:
                            echo '<br><br><a class="tentardnv2"href="?pagina='.($pagina_atual+1).'">NEXT PAGE</a> <br>';
                            break;
                        case $qntde_pages:
                            echo '<br><br><a class= "tentardnv2" href="?pagina='.($pagina_atual-1).'">PREVIOUS</a><br>';
                            break;
                        default:
                            echo '<br><br><a class= "tentardnv2" href="?pagina='.($pagina_atual+1).'">NEXT PAGE</a><br>';
                            echo '<a href="?pagina='.($pagina_atual-1).'">PREVIOUS</a><br>';
                            break;
                    }
                    echo '</div>';
                    }else{
                        echo "We didn't find testimonials to show <br><br><br>";
                    }

                    //Mostrar quantidade de páginas
                    echo '<br>';
                    echo '<div class="linksproximapagina">';
                    for($i=1;$i <= $qntde_pages; $i++){
                        echo '<a class="tentardnv2" href="?pagina='.$i.'">PAGE '.$i.'</a> ';

                    }
                    echo '</div>';
                    echo '<br><br>';


                ?>
                </div>
            </article>

        <footer>
            <!-- (FOOTER) FOOTER -->
            <div class="footer">
            <p class="tituloindex">WHAT CAN YOU DO ON THIS WEBSITE?</p>
            <div class="footerflex">
            <ul class="menufooter">
                <span class="footermenutitulo">CONTENT</span>
                <a href="../index.html"><li>HOME PAGE</li></a>
                <a href="../content/"><li>DOES MIDIA AFFECTS OUR LIVES?</li></a>
                <a href="../content/"><li>HOW THE MIDIA IS PRESENT IN YOUR LIFE?</li></a>
            </ul>
            <ul class="menufooter">
                <span class="footermenutitulo">PARTICIPATE</span>
                <a href="../depoimentos/"><li>SEND TESTIMONIES</li></a>
                <a href="../depoimentos/mostrarDepoimentos.php"><li>SEE TESTIMONIES</li></a>
                <a href="../depoimentos/statusDep.php"><li>SEE SITUATION OF MY TESTIMONY</li></a>
            </ul>
            <ul class="menufooter">
                <span class="footermenutitulo">ABOUT US</span>
                <a href="../galeria.html"><li>GALLERY</li></a>
                <a href="../contato.html"><li>CONTACT</li></a>
                <a href="../faq.html"><li>CREDITS</li></a>
            </ul> 
            <ul class="menufooter">
                <span class="footermenutitulo">INFORMATION SECURITY</span>
                <a href="../faq.html"><li>BY PROVIDING A TESTIMONY, WILL EVERYONE SEE MY NAME?</li></a>
                <a href="../faq.html"><li>WILL SOMEONE USE MY DATA?</li></a>
                <a href="../faq.html"><li>HOW CAN I SEE MY TESTIMONY?</li></a>
            </ul> 
                </div>
            </div>
            <div class="pedacinho">
                MIDIAFEAR - VIOLENCE IN MEDIA
            </div>
        </footer>
    </body>
</html>