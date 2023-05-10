<?php include('../Kaching/Conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Pesquisar Clientes</h1>
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

		$sql = "SELECT client.id,
		client.nome,
		client.email,
		client.data_nascimento,
		client.cpf,
		client.endereco,
		client.bairro,
		client.id_estados,
		estado.uf as estados
	FROM clientes as client
		INNER JOIN estado ON id_estados = estado.id
	WHERE client.cpf = '$cpf';";
		$resultado = $conn->query($sql);

		if (mysqli_num_rows($resultado) >= 1) {
			$linha = $resultado->fetch_assoc();

			$id = $linha['id'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$data_nascimento = $linha['data_nascimento'];
			$endereco = $linha['endereco'];
			$bairro = $linha['bairro'];
			$id_estados = $linha['id_estados'];
			$estados = $linha['estados'];
		} else {
			echo "Cliente não encontrado";
		}
	}
	?>
	<br><br>
	<h2 style="text-align: left; ">Cliente:</h2>

	<form method="POST" action="Entidades/Clientes/EditCliBack.php">
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
		<input type="hidden" name="id" value="<?php if (isset($id) === TRUE) {
													echo $id;
												} ?>">
		<br><br>
		<input type="submit" name="cadastrar" value="Atualizar">
	</form>
</body>

</html>