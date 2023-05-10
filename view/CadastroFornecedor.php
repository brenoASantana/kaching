<?php include('../controller/conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Cadastro de Fornecedores</h1>


	<form method="POST" action="../model/CadastroFornecedor.php">
		<label>Razão Social:</label>
		<input type="text" name="razao_social">
		<label>Nome Fantasia:</label>
		<input type="text" name="nome_fantasia">
		<label>CNPJ:</label>
		<input type="text" placeholder=" XXX.XXX/0001-XX" name="cnpj">
		<label>Representante / Vendedor:</label>
		<input type="text" placeholder="Nome completo" name="representante">
		<label>Email:</label>
		<input type="text" placeholder="email@dominio.com" name="email">
		<label>Endereço:</label>
		<input type="text" name="endereco">
		<label>Bairro:</label>
		<input type="text" name="bairro">

		<label>Estado:</label>
		<select name="estados" id="estados">
			<option>SELECIONE</option>
			<?php
			$sql = "SELECT * FROM estado";
			$resultado = $conn->query($sql);
			while ($linha = $resultado->fetch_assoc()) {
				echo "<option value=" . $linha['id'] . ">" . $linha['uf'] . "</option>";
			}
			?>
		</select>

		<label>Ramo de Atividades:</label>
		<input type="text" name="atividade">
		<br><br>
		<input type="submit" name="cadastrar" value="Cadastrar">
	</form>
</body>

</html>