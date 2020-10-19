<?php
    include("../bd/conectar.php");
    $maxpage = 5; //Definindo o máximo de item a serem exibidos nas páginas
    if(isset($_GET['pagina'])){ //Caso receba algum valor por método GET
        $pagina_atual = $_GET['pagina']; //Vai transformar a pagina atual, em pagina atual
        $min = ($pagina_atual * $maxpage) - $maxpage;
        /* Calculará o registro (linha) mínimo para ser exibido, será pagina atual vezes quantidade de itens a serem exibidos menos quantidade de itens a serem exibidos, simplificando, se a pagina for = 3;
            (3*10) - 10 = 20
            Ou seja, o registro minimo que deve ser exibido é a partir do registro 20
        */
        $limit = $pagina_atual * $maxpage;
        /* Calculará o registro(linha) máximo que pode ser exibido na página. Exemplo, se a pagina for = 3;
            3 * 10 = 30
            Ou seja, até o registro 30 deverá ser exibido
            Como anteriormente foi calculado que o mínimo é 20 e agora foi calculado que o máximo é 30, temos uma
            interpolação de 10 registros, que seria o máximo por página :)
        */
    }else{ //Caso estejamos na primeira página
        $pagina_atual = 1; //Começaremos pela página 1
        $min = 0; //Minimo 0
        $limit = $pagina_atual * $maxpage; // Até o 10
    }
    $sql = "select * from depoimentos where depstatus='1' LIMIT ".$min.",".$limit.""; //Seleciona os campos com LIMIT já predefindos
    $resultado = $conexao->query($sql);
    if($resultado->num_rows > 0){ //Se a quantidade de linhas forem maior que 0
        echo "Exibindo de " .$min." até ".$limit."<br><br>";
        while($linha = $resultado->fetch_assoc()){ //Recebendo a array resultado
            echo 'Depoimento ID:' . $linha["depid"].'<br>';
            echo 'Relato: ' . mb_strimwidth($linha["relato"], 0, 10, "...").'<br>';
            echo '<a href="verdep.php?='.$linha["depid"].'"> Ver depoimento completo </a> <br>';
            echo "<br>";
        }
    }else{
        echo "Não encontramos depoimentos para serem mostrados";
    }
    $conexao -> close();
    if($resultado->num_rows > $min){ //Caso a quantidade de linhas for maior que o minimo cria um link p/ proxima pagina
        echo '<a href="?pagina='.($pagina_atual+1).'">Proxima página</a> <br>'; 
        if($_GET['pagina'] > 1){
            echo '<a href="?pagina='.($pagina_atual-1).'">Página anterior</a>';
        }
    }else{
        echo '<a href="?pagina='.($pagina_atual-1).'">Página anterior</a>';
    }
?>