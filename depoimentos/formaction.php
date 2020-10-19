<?php 
    if (!isset($_POST['nome'])) {
        echo "Por favor preencha o formulário!";
        return;
    }

    $depid = 0;
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $sexo = $_POST['sexo'];
    $redessociais = $_POST['redessociais'];
    $redes = "";
    foreach($redessociais as $redesocial){ // Transformando o array (lista) das redes sociais em apenas uma linha
        $redes .= $redesocial . ', ';
    }
    $relato =  $_POST['relato'];
    $anonimo = $_POST['anonimo'];
    $data_atual = date("Y-m-d H:i:s");
    //Em construção
    include("../bd/conectar.php");

    $sql = "insert into depoimentos(depstatus, nome, idade, email, estado, sexo, redessociais, relato, anonimo, data_envio
    )VALUES(
	   0,
       '$nome',
        $idade,
        '$email',
        '$estado',
        '$sexo',
        '$redes',
        '$relato',
        '$anonimo',
        '$data_atual'
    );";
    
    if($conexao -> query($sql) == true){
        $id = "select depid from depoimentos where nome='".$nome."' and data_envio ='".$data_atual."' ";
        $id_resultado = $conexao -> query($id);
         while($id = $id_resultado->fetch_assoc()){
            $depid = $id["depid"];
         }
    }else{
        echo "Algo deu errado: " . $conexao -> error;
    }
    //Finalizar contato com o banco de dados
    $conexao -> close();
?>

<!DOCTYPE html>
<html>
    <!-- EM CONSTRUÇÃO -->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type=text/css href="../css/estilo.css?version=0">
        <title>Formulário enviado</title>
    </head>
    <body>
        <header>
            <!-- (CABECALHO) NAVBAR/LOGO -->    
            <?php include("../content/cabecalho.php");?>
        </header>
        <article class="formsend">
            <h1>Seu depoimento foi enviado com sucesso</h1>
            <p> Agora seu depoimento precisa ser aprovado para ser adicionado ao site<br> 
                Você pode conferir a situação do seu depoimento clicando <a href="versituacao.php?id=<?php echo $depid; ?>" > AQUI </a>. <br>
                Ou indo no menu e clicando em "verificar depoimento", o ID de seu depoimento é: <?php echo $depid; ?>
            </p>
        </article>
        <footer>
            <!-- (FOOTER) FOOTER -->
            <?php include("../content/footer.php");?>
        </footer>
    </body>
</html>