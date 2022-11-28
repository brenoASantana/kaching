<?php include('../Kaching/Conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Pesquisar Usuários</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>Email:</legend>
			<input type="text" name="email" placeholder="email@dominio.com">
			<input type="submit" name="enviar" value="OK">
		</fieldset>
	</form>

	<?php
	if (isset($_POST['email']) === TRUE) {
		$email = $_POST['email'];

		$sql = "SELECT id,
		id_funcionario,
		id_cargo,
		email,
		senha
	FROM usuarios
	WHERE email = '$email';";

		$resultado = $conn->query($sql);
		$linha = mysqli_affected_rows($conn);

		if ($linha > 0) {
			$linha = $resultado->fetch_assoc();

			$id = $linha['id'];
			$id_funcionario = $linha['id_funcionario'];
			$id_cargo = $linha['id_cargo'];
			$email = $linha['email'];
			$senha = $linha['senha'];

			echo "ID Funcionário: " . $id_funcionario . "<br>";
			echo "ID Cargo: " . $id_cargo . "<br>";
			echo "Email: " . $email . "<br>";
			echo "<a href='Entidades/Usuarios/ExclUsuBack.php?id=" . $id . "' class='btn-excluir'>Excluir</a>";
		} else {
			echo "Dados não encontrado";
		}
	}
	?>
	<br>
</body>

</html>