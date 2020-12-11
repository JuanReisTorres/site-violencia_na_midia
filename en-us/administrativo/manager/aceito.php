<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css?version=0.52">
        <link rel="icon" href="../../images/logo.png" type="image/png" sizes="16x16">
        <title>MídiaFear | ADMINPAINEL</title>
    </head>
    <body>
        <header>
            <!-- (CABECALHO) NAVBAR/LOGO -->
            <div class="navbar">
                <a href="../../index.html"><img src="../../images/logo.png" alt="logo-site" class="logo" alt="logo"/></a> 
            <ul class="menugeral">
                <li>
                    <span class="navimage"><img src="../../images/icones/inicio.png" class="iconmenu"></span>
                    <a href="../../index.html"> INÍCIO </a>
                </li>
                <li>
                    <span class="navimage"><img src="../../images/icones/mascara.png" class="iconmenu"></span>
                    <a href="../../content/index.html"> A MÍDIA E O MEDO </a>
                    <ul class="submenugeral"> 
                        <li><a href="../../content/index.html">EXPOSIÇÃO</a></li>
                        <li><a href="../../content/page2.html">MAIS CONECTADOS?</a></li>
                        <li><a href="../../content/page3.html">O IMPACTO SOCIAL DA VIOLÊNCIA NA MÍDIA</a></li>
                        <li><a href="../../content/page4.html">PARTICIPAÇÃO DA MÍDIA</a></li>
                        <li><a href="../../content/page5.html">MÍDIA E HARMONIA</a></li>
                    </ul>
                </li>
                <li>
                    <span class="navimage"><img src="../../images/icones/depoimento.png" class="iconmenu"></span>
                    <a href="">DEPOIMENTOS</a>
                    <ul class="submenugeral"> 
                        <li><a href="../../depoimentos/mostrarDepoimentos.php">VER <br>DEPOIMENTOS</a></li>
                        <li><a href="../../depoimentos/index.html">ENVIAR <br>DEPOIMENTOS</a></li>
                        <li><a href="../../depoimentos/verdep.php">PROCURAR DEPOIMENTO</a></li>
                        <li><a href="../../depoimentos/statusDep.php">VER SITUAÇÃO DO MEU DEPOIMENTO</a></li>
                    </ul>
                </li>
                <li>
                    <span class="navimage"><img src="../../images/icones/galeria.png" class="iconmenu"></span>
                    <a href="../../galeria.html"> GALERIA </a>
                </li>
                <li>
                    <span class="navimage"><img src="../../images/icones/contatoo.png" class="iconmenu"></span>
                    <a href="../../contato.html"> CONTATO </a>
                </li>            
            </ul>
        </div>
        </header>
        <div class="paginatitulo">
            <span class="pagename"> ACEITOS </span>
        </div>
        <article class="articlepainel">
            <a class="tentardnv" style="color: black; margin-left: 20px;" href="../painel.php">VOLTAR AO PAINEL</a>
            <br><br>
            <?php
                session_start();
                if(isset($_SESSION['logado'])){
                echo '<div class="resultado_container">';
                include("manager.php");
                if($resultado_aceitos -> num_rows > 0){
                    while($linha = $resultado_aceitos -> fetch_assoc()){
                        echo '<div class="resultado_sql">';
                        echo "<b>ID:</b>" . $linha['depid'] . "<br>";
                        echo "<b>Status: </b>" . "Aceito". "<br>";
                        echo "<b>Nome: </b>" . $linha['nome']. "<br>";
                        echo "<b>Idade: </b>" . $linha['idade']. "<br>";
                        echo "<b>Email: </b>" . $linha['email']. "<br>";
                        echo "<b>Estado: </b>" . $linha['estado']. "<br>";
                        echo "<b>Sexo: </b>" . $linha['sexo']. "<br>";
                        echo "<b>Mídias: </b>" . $linha['redessociais']. "<br>";
                        echo "<b>Relato: </b>" . $linha['relato']. "<br>";
                        echo "<b>Data de envio: </b>" . $linha['data_envio']. "<br><br>";
                        echo '<a class="tentardnv2" href="manager.php?reprovar='.$linha['depid'].'">Rejeitar</a> <br><br><br>';
                        echo '<a class="tentardnv2" href="manager.php?analise='.$linha['depid'].'">Deixar em analise</a> <br>';
                        echo "<br> <br>";
                        echo '</div>';
                    }
                }
                }else{
                    echo "Acesso negado! Você só pode fazer isso logado";
                }
            ?>
        </article>

        <footer>
            <!-- (FOOTER) FOOTER -->
            <div class="footer">
            <p class="tituloindex">O QUE DA PRA FAZER NO SITE?</p>
            <div class="footerflex">
            <ul class="menufooter">
                <span class="footermenutitulo">CONTEÚDOS</span>
                <a href="../../index.html"><li>PÁGINA INICIAL</li></a>
                <a href="../../content/"><li>A MÍDIA INTEREFERE EM VIDAS?</li></a>
                <a href="../../content/"><li>COMO A MÍDIA ESTÁ PRESENTE NA MINHA VIDA?</li></a>
            </ul>
            <ul class="menufooter">
                <span class="footermenutitulo">PARTICIPE</span>
                <a href="../../../depoimentos/"><li>ENVIAR DEPOIMENTOS</li></a>
                <a href="../../depoimentos/mostrarDepoimentos.php"><li>VER DEPOIMENTOS</li></a>
                <a href="../../depoimentos/statusDep.php"><li>VER SIT. DEPOIMENTO</li></a>
            </ul>
            <ul class="menufooter">
                <span class="footermenutitulo">SOBRE-NÓS</span>
                <a href="../../galeria.html"><li>GALERIA</li></a>
                <a href="../../contato.html"><li>CONTATO</li></a>
                <a href="../../seguranca.html"><li>CRÉDITOS</li></a>
            </ul> 
            <ul class="menufooter">
                <span class="footermenutitulo">SEGURANÇA DAS INFORMAÇÕES</span>
                <a href="../../seguranca.html"><li>AO PRESTAR DEPOIMENTO TODOS VERÃO MEU NOME?</li></a>
                <a href="../../seguranca.html"><li>VÃO USAR MEUS DADOS?</li></a>
                <a href="../../seguranca.html"><li>COMO VEJO MEU DEPOIMENTO?</li></a>
            </ul> 
                </div>
            </div>
            <div class="pedacinho">
                MÍDIAFEAR - VIOLÊNCIA NA MÍDIA
            </div>
        </footer>
    </body>