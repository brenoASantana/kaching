<?php include('../Kaching/Conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Cadastro de Usuários</h1>


	<form method="POST" action="Entidades/Usuarios/CadUsuBack.php">
		<label>Email:</label>
		<input type="text" name="email" placeholder="email@dominio.com">
		<label>Senha:</label>
		<input type="text" name="senha">
		<br><br>
		<input type="submit" name="cadastrar" value="Cadastrar">
	</form>
</body>

</html>