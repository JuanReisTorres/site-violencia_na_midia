<?php
    include("manager.php");
    echo "<h1> Rejeitados </h1>";
    if($resultado_rejeitados -> num_rows > 0){
        while($linha = $resultado_rejeitados -> fetch_assoc()){
            echo "ID:" . $linha['depid'] . "<br>";
            echo "Status: " . "Rejeitado". "<br>";
            echo "Nome: " . $linha['nome']. "<br>";
            echo "Idade: " . $linha['idade']. "<br>";
            echo "Email: " . $linha['email']. "<br>";
            echo "Estado: " . $linha['estado']. "<br>";
            echo "Sexo: " . $linha['sexo']. "<br>";
            echo "Redes sociais: " . $linha['redessociais']. "<br>";
            echo "Relato: " . $linha['relato']. "<br>";
            echo "Como quer se apresentar: " . $linha['anonimo']. "<br>";
            echo "Data de envio: " . $linha['data_envio']. "<br>";
            echo '<a href="manager.php?aprovar='.$linha['depid'].'">Aprovar</a> <br>';
            echo '<a href="manager.php?analise='.$linha['depid'].'">Deixar em analise</a> <br>';
            echo "<br> <br>";
        }
    }
?>