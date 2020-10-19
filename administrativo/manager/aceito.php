<?php
    include("manager.php");
    echo "<h1> Aceitos </h1>";
    if($resultado_aceitos -> num_rows > 0){
        while($linha = $resultado_aceitos -> fetch_assoc()){
            echo "ID:" . $linha['depid'] . "<br>";
            echo "Status: " . "Aceito". "<br>";
            echo "Nome: " . $linha['nome']. "<br>";
            echo "Idade: " . $linha['idade']. "<br>";
            echo "Email: " . $linha['email']. "<br>";
            echo "Estado: " . $linha['estado']. "<br>";
            echo "Sexo: " . $linha['sexo']. "<br>";
            echo "Redes sociais: " . $linha['redessociais']. "<br>";
            echo "Relato: " . $linha['relato']. "<br>";
            echo "Como quer se apresentar: " . $linha['anonimo']. "<br>";
            echo "Data de envio: " . $linha['data_envio']. "<br>";
            echo '<a href="manager.php?reprovar='.$linha['depid'].'">Rejeitar</a> <br>';
            echo '<a href="manager.php?analise='.$linha['depid'].'">Deixar em analise</a> <br>';
            echo "<br> <br>";
        }
    }
?>