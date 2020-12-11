<?php
    session_start();
    if(isset($_SESSION["logado"])){
        if(isset($_GET['id'])){
            include("../bd/conectar.php");
            $id = $_GET['id'];
            $sql = "select *, DATE_FORMAT(data_envio,'%d/%m/%Y') from depoimentos where depid='".$id."'";
            $resultado = $conexao -> query($sql);
            if($resultado -> num_rows > 0){
            $situacao = 0;
            $situacaoText = "<b>SITUAÇÃO: </b>";
            $relato = "<b>RELATO: </b>";
            $email = "<b>EMAIL: </b>";
            $nome = "<b>NOME: </b>";
            $data = "";
                    while($linha = $resultado -> fetch_assoc()){
                    $situacao = $linha['depstatus'];
                    $relato .= $linha['relato'] . '<br><br>';
                    $email .= $linha['email'] . '<br><br>';
                    $nome .= $linha['nome'] . '<br><br>';
                    $data = $linha["DATE_FORMAT(data_envio,'%d/%m/%Y')"];
                }

                switch($situacao){
                    case 0:
                        $situacaoText .= "Em análise <br><br>";
                        break;
                    case 1:
                        $situacaoText .= "Aprovado <br><br>";
                        break;
                    case 2:
                        $situacaoText .= "Rejeitado <br><br>";
                        break;
                    default:
                        $situacaoText .= "Não foi possível identificar <br><br>";
                }
                
                $manager = '<a href="manager/manager.php?aprovar='.$id.'">APROVAR</a> -
                <a href="manager/manager.php?reprovar='.$id.'">REPROVAR</a> - 
                <a href="manager/manager.php?analise='.$id.'">DEIXAR EM ANÁLISE</a>';
            
            }else{
                $data = "NÃO ENCONTRADO NO SISTEMA!";
            }
            
        }
    }else{
        header("Location: index.php");
        return;
    }
?>

<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css?version=0.42">
        <link rel="icon" href="../images/logo.png" type="image/png" sizes="16x16">
        <title>MídiaFear | VER DEP</title>
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
                    <span class="pagename">ADMIN - ID: <?php echo $id; ?> </span>
                </div>
            <article class="shadowconteudopage">
                <div class="shadowboxtextopage">
                    
                        <div class="textopagetitulo">
                            <?php echo $data; ?>
                        </div>
                    <span class="boxtextopage">
                        <?php echo $nome; ?>
                        <?php echo $email; ?>
                        <?php echo $relato; ?>
                        <?php echo $situacaoText; ?>
                        <?php echo $manager; ?>
                    </span>
                    <br><br>
                    <form action="manunico.php" method="get">
                            <label for="id">Efetuar pesquisa de ID: </label> <input type="number" name="id" id="id">
                            <input type="submit" value="Pesquisar">
                     </form>

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