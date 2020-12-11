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
                <a href="../index.html"><img src="../images/logo.png" alt="logo-site" class="logo" alt="logo"/></a> 
            <ul class="menugeral">
                <li>
                    <span class="navimage"><img src="../images/icones/inicio.png" class="iconmenu"></span>
                    <a href="../index.html"> INÍCIO </a>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/mascara.png" class="iconmenu"></span>
                    <a href="../content/index.html"> A MÍDIA E O MEDO </a>
                    <ul class="submenugeral"> 
                        <li><a href="../content/index.html">EXPOSIÇÃO</a></li>
                        <li><a href="../content/page2.html">MAIS CONECTADOS?</a></li>
                        <li><a href="../content/page3.html">O IMPACTO SOCIAL DA VIOLÊNCIA NA MÍDIA</a></li>
                        <li><a href="../content/page4.html">PARTICIPAÇÃO DA MÍDIA</a></li>
                        <li><a href="../content/page5.html">MÍDIA E HARMONIA</a></li>
                    </ul>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/depoimento.png" class="iconmenu"></span>
                    <a href="">DEPOIMENTOS</a>
                    <ul class="submenugeral"> 
                        <li><a href="../depoimentos/mostrarDepoimentos.php">VER <br>DEPOIMENTOS</a></li>
                        <li><a href="../depoimentos/index.html">ENVIAR <br>DEPOIMENTOS</a></li>
                        <li><a href="../depoimentos/verdep.php">PROCURAR DEPOIMENTO</a></li>
                        <li><a href="../depoimentos/statusDep.php">VER SITUAÇÃO DO MEU DEPOIMENTO</a></li>
                    </ul>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/galeria.png" class="iconmenu"></span>
                    <a href="../galeria.html"> GALERIA </a>
                </li>
                <li>
                    <span class="navimage"><img src="../images/icones/contatoo.png" class="iconmenu"></span>
                    <a href="../contato.html"> CONTATO </a>
                </li>            
            </ul>
        </div>
        </header>
        <!-- CENTRO SITE --> 
                <div class="paginatitulo">
                    <span class="pagename"> DEPOIMENTOS </span>
                </div>
            <article class="depoimentoarticle">
                <div class="semifundo">
                        <div class="textopagetitulo" style="color:white;">
                            DEPOIMENTOS ENVIADOS POR USUÁRIOS
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
                    $sql = "select *, DATE_FORMAT(data_envio,'%d/%m/%Y') from depoimentos where depstatus = '1' LIMIT ".$maxpage." OFFSET ".$min.";"; /*Seleciona os campos com LIMIT já predefindos e o OFFSET diz para saltar esta quantidade de linhas antes de começar a retornar as linhas. */
                    $resultado = $conexao->query($sql);
                    
                    $qntde_pages = ceil($resultado_linhas->num_rows/$maxpage); //Calcular número de páginas, arrendondandos (resolver possíveis bug)
                    $conexao -> close();
                    
                    if($resultado->num_rows > 0){ //Se a quantidade de linhas forem maior que 0
                        echo '<div class="depoimentobox">';
                        while($linha = $resultado->fetch_assoc()){ //Recebendo a array resultado
                            echo '<div class="depoimento">';
                            echo '<span class="data">'.$linha["DATE_FORMAT(data_envio,'%d/%m/%Y')"].'</span><br>';
                            echo '<b>Depoimento ID:</b>' . $linha["depid"].'<br><br>';
                            echo '<b>Relato: </b>' . mb_strimwidth($linha["relato"], 0, 100, "...").'<br>';
                            echo '<div class="verdepcompleto">';
                            echo '<a href="verdep.php?id='.$linha["depid"].'"> Ver depoimento completo </a> <br>';
                            echo '</div>';
                            echo "<br>";
                            echo '</div>';
                        }
                        echo '</div>';
                    echo '<div class="linksproximapagina">';
                    //Primeira pagina e ultima pagina sem Próxima/Anterior
                    switch($pagina_atual){
                        case 1:
                            echo '<br><br><a class="tentardnv2"href="?pagina='.($pagina_atual+1).'">PRÓXIMA PÁGINA</a> <br>';
                            break;
                        case $qntde_pages:
                            echo '<br><br><a class= "tentardnv2" href="?pagina='.($pagina_atual-1).'">ANTERIOR</a><br>';
                            break;
                        default:
                            echo '<br><br><a class= "tentardnv2" href="?pagina='.($pagina_atual+1).'">PRÓXIMA PÁGINA</a><br>';
                            echo '<a href="?pagina='.($pagina_atual-1).'">ANTERIOR</a><br>';
                            break;
                    }
                    echo '</div>';
                    }else{
                        echo "NÃO ENCONTRAMOS DEPOIMENTOS PARA SEREM MOSTRADOS <br><br><br>";
                    }

                    //Mostrar quantidade de páginas
                    echo '<br>';
                    echo '<div class="linksproximapagina">';
                    for($i=1;$i <= $qntde_pages; $i++){
                        echo '<a class="tentardnv2" href="?pagina='.$i.'">PÁGINA '.$i.'</a> ';

                    }
                    echo '</div>';
                    echo '<br><br>';


                ?>
                </div>
            </article>
        <footer>
            <!-- (FOOTER) FOOTER -->
            <div class="footer">
            <p class="tituloindex">O QUE DA PRA FAZER NO SITE?</p>
            <div class="footerflex">
            <ul class="menufooter">
                <span class="footermenutitulo">CONTEÚDOS</span>
                <a href="../index.html"><li>PÁGINA INICIAL</li></a>
                <a href="../content/"><li>A MÍDIA INTEREFERE EM VIDAS?</li></a>
                <a href="../content/"><li>COMO A MÍDIA ESTÁ PRESENTE NA MINHA VIDA?</li></a>
            </ul>
            <ul class="menufooter">
                <span class="footermenutitulo">PARTICIPE</span>
                <a href="../depoimentos/"><li>ENVIAR DEPOIMENTOS</li></a>
                <a href="../depoimentos/mostrarDepoimentos.php"><li>VER DEPOIMENTOS</li></a>
                <a href="../depoimentos/statusDep.php"><li>VER SIT. DEPOIMENTO</li></a>
            </ul>
            <ul class="menufooter">
                <span class="footermenutitulo">SOBRE-NÓS</span>
                <a href="../galeria.html"><li>GALERIA</li></a>
                <a href="../contato.html"><li>CONTATO</li></a>
                <a href="../faq.html"><li>CRÉDITOS</li></a>
            </ul> 
            <ul class="menufooter">
                <span class="footermenutitulo">SEGURANÇA DAS INFORMAÇÕES</span>
                <a href="../faq.html"><li>AO PRESTAR DEPOIMENTO TODOS VERÃO MEU NOME?</li></a>
                <a href="../faq.html"><li>VÃO USAR MEUS DADOS?</li></a>
                <a href="../faq.html"><li>COMO VEJO MEU DEPOIMENTO?</li></a>
            </ul> 
                </div>
            </div>
            <div class="pedacinho">
                MÍDIAFEAR - VIOLÊNCIA NA MÍDIA
            </div>
        </footer>
    </body>
</html>