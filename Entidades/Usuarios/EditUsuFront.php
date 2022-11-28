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

		if (mysqli_num_rows($resultado) >= 1) {
			$linha = $resultado->fetch_assoc();

			$id = $linha['id'];
			$id_funcionario = $linha['id_funcionario'];
			$id_cargo = $linha['id_cargo'];
			$email = $linha['email'];
			$senha = $linha['senha'];
		} else {
			echo "Usuário não encontrado";
		}
	}
	?>
	<br><br>
	<h2 style="text-align: left; ">Usuário:</h2><br>

	<form method="POST" action="Entidades/Usuarios/EditUsuBack.php">
		<label>Email:</label>
		<input type="text" name="email" placeholder="email@dominio.com" value="<?php if (isset($email) === TRUE) {
																					echo $email;
																				} ?>">
		<label>Senha:</label>
		<input type="text" name="senha" value="<?php if (isset($senha) === TRUE) {
													echo $senha;
												} ?>">
		<label> ID Funcionário:</label>
		<input type="text" name="id_funcionario" value="<?php if (isset($id_funcionario) === TRUE) {
															echo $id_funcionario;
														} ?>">
		<label>ID Cargo:</label>
		<input type="text" name="id_cargo" value="<?php if (isset($id_cargo) === TRUE) {
														echo $id_cargo;
													} ?>">
		</select>
		<br><br>
		<input type="hidden" name="id" value="<?php if (isset($id) === TRUE) {
													echo $id;
												} ?>">
		<label>Ativo:</label>
		<input type="checkbox" name="ativo" value="S" checked>
		<input type="submit" name="cadastrar" value="Atualizar">
	</form>
</body>

</html>