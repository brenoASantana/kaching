<?php include('../controller/conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Pesquisar Funcionários</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>CPF:</legend>
			<input type="text" name="cpf" placeholder="XXX.XXX.XXX-XX">
			<input type="submit" name="enviar" value="OK">
		</fieldset>
	</form>

	<?php
	if (isset($_POST['cpf']) === TRUE) {
		$cpf = $_POST['cpf'];

		$sql = "SELECT func.id,
		func.nome,
		func.email,
		func.data_nascimento,
		func.cpf,
		func.endereco,
		func.bairro,
		func.ativo,
		func.id_estados,
		func.id_cargo,
		cargo.id as id_cargo,
		cargo.nome as cargo,
		estado.uf as estados
	FROM funcionarios as func
		INNER JOIN estado ON id_estados = estado.id
		INNER JOIN cargo ON id_cargo = cargo.id
	WHERE cpf = '$cpf';";

		$resultado = $conn->query($sql);

		if (mysqli_num_rows($resultado) >= 1) {
			$linha = $resultado->fetch_assoc();
			$id = $linha['id'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$cpf = $linha['cpf'];
			$data_nascimento = $linha['data_nascimento'];
			$endereco = $linha['endereco'];
			$bairro = $linha['bairro'];
			$id_estados = $linha['id_estados'];
			$estados = $linha['estados'];
			$cargo = $linha['cargo'];
			$id_cargo = $linha['id_cargo'];
		} else {
			echo "Funcionário não encontrado";
		}
	}
	?>
	<br><br>
	<h2 style="text-align: left; ">Funcionário:</h2>

	<form method="POST" action="../model/EdicaoFuncionario.php">
		<label>Nome:</label>
		<input type="text" name="nome" value="<?php if (isset($nome) === TRUE) {
													echo $nome;
												} ?>">
		<label>Email:</label>
		<input type="text" name="email" placeholder="email@dominio.com" value="<?php if (isset($email) === TRUE) {
																					echo $email;
																				} ?>">
		<label>Data de Nascimento:</label>
		<input type="text" name="data_nascimento" placeholder="DD/MM/AAAA" value="<?php if (isset($data_nascimento) === TRUE) {
																						echo $data_nascimento;
																					} ?>">
		<label>CPF:</label>
		<input type="text" name="cpf" placeholder="XXX.XXX.XXX-XX" value="<?php if (isset($cpf) === TRUE) {
																				echo $cpf;
																			} ?>">
		<label>Endereço:</label>
		<input type="text" name="endereco" value="<?php if (isset($endereco) === TRUE) {
														echo $endereco;
													} ?>">
		<label>Bairro:</label>
		<input type="text" name="bairro" value="<?php if (isset($bairro) === TRUE) {
													echo $bairro;
												} ?>">
		<label>Estado:</label>

		<select name="id_estados" id="id_estados">
			<option value="<?php if (isset($id_estados) === TRUE) {
								echo $id_estados;
							} ?>"><?php if (isset($estados) === TRUE) {
										echo $estados;
									} ?></option>

			<?php
			$sql = "SELECT id, uf FROM estado";
			$resultado = $conn->query($sql);
			while ($linha = $resultado->fetch_assoc()) {
				echo "<option value=" . $linha['id'] . ">" . $linha['uf'] . "</option>";
			}

			?>
		</select>
		<label>ID Cargo:</label>
		<input type="text" name="id_cargo" value="<?php if (isset($id_cargo) === TRUE) {
														echo $id_cargo;
													} ?>">

		<input type="hidden" name="id" value="<?php if (isset($id) === TRUE) {
													echo $id;
												} ?>">
		<label>Ativo:</label>
		<input type="checkbox" name="ativo" value="S" checked>
		<br><br>
		<input type="submit" name="cadastrar" value="Atualizar">
	</form>
</body>

</html>