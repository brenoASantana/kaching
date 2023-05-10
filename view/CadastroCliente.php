<?php include('../Kaching/Conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../Front+/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../../Front+/style.css">
	<link rel="stylesheet" type="text/css" href="../../Front+/fonts-icones.css">
</head>

<body>
	<h1>Cadastro de Clientes</h1>


	<form method="POST" action="Entidades/Clientes/CadCliBack.php">
		<label>Nome:</label>
		<input type="text" name="nome">
		<label>Email:</label>
		<input type="text" name="email" placeholder="email@dominio.com">
		<label>Data de Nascimento:</label>
		<input type="text" name="data_nascimento" placeholder="DD/MM/AAAA">
		<label>CPF:</label>
		<input type="text" name="cpf" placeholder="XXX.XXX.XXX-XX">
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
		</select><br><br>
		<input type="submit" name="cadastrar" value="Cadastrar">
	</form>
</body>

</html>