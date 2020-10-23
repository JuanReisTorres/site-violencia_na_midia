<?php
    include("../bd/conectar.php");
    $maxpage = 5; //Definindo o máximo de item a serem exibidos nas páginas
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

    $sql_linhas_totais = "select depid from depoimentos;";
    $resultado_linhas = $conexao->query($sql_linhas_totais);
    $sql = "select * from depoimentos where depstatus='1' LIMIT ".$maxpage." OFFSET ".$min.";"; /*Seleciona os campos com LIMIT já predefindos e o OFFSET diz para saltar esta quantidade de linhas antes de começar a retornar as linhas. */
    $resultado = $conexao->query($sql);
    if($resultado->num_rows > 0){ //Se a quantidade de linhas forem maior que 0
        while($linha = $resultado->fetch_assoc()){ //Recebendo a array resultado
            echo 'Depoimento ID:' . $linha["depid"].'<br>';
            echo 'Relato: ' . mb_strimwidth($linha["relato"], 0, 10, "...").'<br>';
            echo '<a href="verdep.php?='.$linha["depid"].'"> Ver depoimento completo </a> <br>';
            echo "<br>";
        }
    }else{
        echo "Não encontramos depoimentos para serem mostrados <br>";
    }
    $conexao -> close();
    $qntde_pages = ceil($resultado_linhas->num_rows/$maxpage); //Calcular número de páginas, arrendondandos (resolver possíveis bug)

    //Mostrar quantidade de páginas
    for($i=1;$i <= $qntde_pages; $i++){
        echo '<a href="?pagina='.$i.'">Página'.$i.'</a> <br>';
        
    }
    //Primeira pagina e ultima pagina sem Próxima/Anterior
    switch($pagina_atual){
        case 1:
            echo '<br><a href="?pagina='.($pagina_atual+1).'">Próxima página</a> <br>';
            break;
        case $qntde_pages:
            echo '<br><a href="?pagina='.($pagina_atual-1).'">Anterior</a><br>';
            break;
        default:
            echo '<br><a href="?pagina='.($pagina_atual+1).'">Próxima página</a><br>';
            echo '<a href="?pagina='.($pagina_atual-1).'">Anterior</a><br>';
            break;
    }

?>