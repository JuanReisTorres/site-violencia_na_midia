<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Formulário </title>
        <link rel="stylesheet" type=text/css href="../css/form.css?version=0">
        <link rel="stylesheet" type=text/css href="../css/estilo.css?version=0">
    </head>
    <body>
        <header>
            <!-- (CABECALHO) NAVBAR/LOGO -->    
            <?php include("../content/cabecalho.php");?>
        </header>
<form id="form1" name="form1" method="post" action="formaction.php">
  <fieldset class="dados">
  	<legend>Dados pessoais</legend>
    <label for="nome">Nome completo:</label>
    <input type="text" name="nome" id="nome" required/>
  <p>
    <label for="idade">Idade: </label>
    <input type="number" name="idade" id="idade" min="1" max="200" 
    required
    />
  </p>
  <p>
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required/>
  </p>
  <p>
	<label for="estado">Estado:</label>
	<select id="estado" name="estado" required>
		<option value="AC">Acre</option>
		<option value="AL">Alagoas</option>
		<option value="AP">Amapá</option>
		<option value="AM">Amazonas</option>
		<option value="BA">Bahia</option>
		<option value="CE">Ceará</option>
		<option value="DF">Distrito Federal</option>
		<option value="ES">Espírito Santo</option>
		<option value="GO">Goiás</option>
		<option value="MA">Maranhão</option>
		<option value="MT">Mato Grosso</option>
		<option value="MS">Mato Grosso do Sul</option>
		<option value="MG">Minas Gerais</option>
		<option value="PA">Pará</option>
		<option value="PB">Paraíba</option>
		<option value="PR">Paraná</option>
		<option value="PE">Pernambuco</option>
		<option value="PI">Piauí</option>
		<option value="RJ">Rio de Janeiro</option>
		<option value="RN">Rio Grande do Norte</option>
		<option value="RS">Rio Grande do Sul</option>
		<option value="RO">Rondônia</option>
		<option value="RR">Roraima</option>
		<option value="SC">Santa Catarina</option>
		<option value="SP">São Paulo</option>
		<option value="SE">Sergipe</option>
		<option value="TO">Tocantins</option>
		<option value="EX">Estrangeiro</option>
	</select>
  </p>
  <p>
    <label for="sexo">Sexo:</label>
	<select id="sexo" name="sexo" required>
        <option value="m">Masculino</option>
        <option value="f">Feminino</option>
        <option value="nb">Não binário</option>
        <option value="nenhum">Prefiro não falar</option>
    </select>
  </p>
</fieldset>
<fieldset class="experiencia">
  	<legend>Sua experiência</legend>
  <p>
  	<label>Selecione as redes sociais ou aplicativos que você usa: </label><br />
    <label>
      <input type="checkbox" name="redessociais[]" value="facebook" id="redessociais_0"/>
      Facebook</label>
    <br />
    <label>
      <input type="checkbox" name="redessociais[]" value="twitter" id="redessociais_1" />
      Twitter</label>
    <br />
    <label>
      <input type="checkbox" name="redessociais[]" value="instagram" id="redessociais_2" />
      Instagram</label>
    <br />
    <label>
      <input type="checkbox" name="redessociais[]" value="snapchat" id="redessociais_3" />
      Snapchat</label>
    <br />
    <label>
      <input type="checkbox" name="redessociais[]" value="whatsapp" id="redessociais_4" />
      Whatsapp</label>
      <br />
      <label>
      <input type="checkbox" name="redessociais[]" value="outros" id="redessociais_5" />
      Outros</label>
      <br />
      <label>
      <input type="checkbox" name="redessociais[]" value="Nenhuma" id="redessociais_6" />
      Nenhuma</label>
      <br />      
    <br />      
  </p>
  <p>
    <label for="relato">Você já identificou algum xingamento ou ofensa dentro de um aplicativo ou rede social? Como foi?</label><br />
    <textarea name="relato" id="relato" cols="45" rows="5" max="300" required></textarea><br>
      <label>Máximo de 300 caracteres</label>
  </p>
  </fieldset>
  <fieldset class="opcoes">
  	<legend>Opções</legend>
  <p>
      <label>Caso meu depoimento apareça no site, desejo que refiram-se a mim através de:</label><br />
    <label>
      <input type="radio" name="anonimo" value="anonimo" id="anonimo_0" required/>
      Anônimo</label>
    <br />
    <label>
      <input type="radio" name="anonimo" value="nome" id="anonimo_1" />
      Pelo nome</label>
  </p>
  </fieldset>
  <fieldset class="termos">
  	<legend>Termos</legend>
  <p>
    <input type="checkbox" name="checkbox" id="concorda" value="concorda" required />
    <label for="concorda">Eu aceito todos os termos de uso estabelecidos por este site</label>
  </p>
  <p>
    <input type="checkbox" name="checkbox" id="concordo2" value="concordo2" required/>
    <label for="concordo2">Eu aceito que meu depoimento pode ser exibido dentro da aba depoimentos do site</label>.  </p>
</fieldset>
	<p>
  <input type="reset" value="Limpar"/>
  <input type="submit" value="Enviar"/>
  </p>
</form>
        <footer>
            <!-- (FOOTER) FOOTER -->    
            <?php include("../content/footer.php");?> <!--Bugado, arrumar-->
        </footer>
    </body>
</html>