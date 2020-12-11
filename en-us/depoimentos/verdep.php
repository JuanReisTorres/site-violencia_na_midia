<?php
    if(!isset($_GET['id'])){
        $id = "<h1>SEARCH ID</h1>";
        $form =  '<form action="'.$PHP_SELF.'" method="GET">';
        $form .= '<label for="id">ID: </label><input type="number" name="id"><br><br>';
        $form .= '<input class="tentardnv2" type="submit" value="SEARCH"> ';
        $form .= '</form>';
    }else{
       include("../bd/conectar.php");
        $id = $_GET['id'];
        $sql= "select relato, DATE_FORMAT(data_envio,'%d/%m/%Y')from depoimentos where depid='".$id."' and depstatus='1';";
        $resultado = $conexao -> query($sql);
        if($resultado -> num_rows > 0){
            while($linha = $resultado -> fetch_assoc()){
                $form = '<span class="data">'.$linha["DATE_FORMAT(data_envio,'%d/%m/%Y')"].'</span><br>';
                $form .= $linha['relato'];
                $form .= "";
            }
       
        }else{
            $form = "NOT FOUND ON SYSTEM! THERE ARE NO APROVED TESTIMONIES WITH THIS ID";
        }
        $form .= '<br><br><br><a class="tentardnv2" href="verdep.php">SEARCH ANOTHER ID</a>';
        $form .= ' - <a class="tentardnv2" href="mostrarDepoimentos.php">SEE OTHER TESTIMONIALS</a>';
    }
?>

<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css?version=0.51">
        <link rel="icon" href="../images/logo.png" type="image/png" sizes="16x16">
        <title>MídiaFear | SEE TESTIMONY</title>
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
        
            <div class="paginatitulo">
                <span class="pagename"> SEE TESTIMONY </span>
            </div>
            <article class="shadowconteudopage">
                <div class="shadowboxtextopagedep">
                        <div class="textopagetitulo">
                           SEE TESTIMONY...
                            <hr>
                        </div>
                    <span class="boxtextopage">
                        <center>
                        <?php 
                        if(isset($_GET['id'])){
                            echo '<center><h3> ID: '.$_GET['id'].'</h3></center>';
                        }else{
                            echo '<h1>SEARCH ID</h1>';
                        }
                        ?>
                        <?php echo $form; ?>
                        <br>
                        </center>
                    </span>
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
