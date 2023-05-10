<?php include('../controller/conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Pesquisar Fornecedores</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>CNPJ:</legend>
			<input type="text" name="cnpj" placeholder="XX.XXX.XXX/0001-XX">
			<input type="submit" name="enviar" value="OK">
		</fieldset>
	</form>

	<?php
	if (isset($_POST['cnpj']) === TRUE) {
		$cnpj = $_POST['cnpj'];

		$sql = "SELECT forn.id,
		forn.razao_social,
		forn.nome_fantasia,
		forn.cnpj,
		forn.representante,
		forn.email,
		forn.endereco,
		forn.id_estados,
		forn.bairro,
		forn.atividade,
		estado.nome as estado
	FROM fornecedores AS forn
		INNER JOIN estado on estado.id = forn.id_estados
	WHERE cnpj = '$cnpj';";

		$resultado = $conn->query($sql);

		if (mysqli_num_rows($resultado) >= 1) {
			$linha = $resultado->fetch_assoc();

			$id = $linha['id'];
			$razao_social = $linha['razao_social'];
			$nome_fantasia = $linha['nome_fantasia'];
			$cnpj = $linha['cnpj'];
			$representante = $linha['representante'];
			$email = $linha['email'];
			$endereco = $linha['endereco'];
			$bairro = $linha['bairro'];
			$id_estados = $linha['id_estados'];
			$atividade = $linha['atividade'];
			$estados = $linha['estado'];
		} else {
			echo "Fornecedor não encontrado";
		}
	}
	?>
	<br><br>
	<h2 style="text-align: left; ">Fornecedor:</h2>

	<form method="POST" action="../model/EdicaoFornecedor.php">
		<label>Razão Social:</label>
		<input type="text" name="razao_social" value="<?php if (isset($razao_social) === TRUE) {
															echo $razao_social;
														} ?>">
		<label>Nome Fantasia:</label>
		<input type="text" name="nome_fantasia" value="<?php if (isset($nome_fantasia) === TRUE) {
															echo $nome_fantasia;
														} ?>">
		<label>CNPJ:</label>
		<input type="text" placeholder=" XX.XXX.XXX/0001-XX" name="cnpj" value="<?php if (isset($cnpj) === TRUE) {
																					echo $cnpj;
																				} ?>">
		<label>Representante:</label>
		<input type="text" placeholder="Nome completo" name="representante" value="<?php if (isset($representante) === TRUE) {
																						echo $representante;
																					} ?>">
		<label>Email:</label>
		<input type="text" placeholder="email@dominio.com" name="email" value="<?php if (isset($email) === TRUE) {
																					echo $email;
																				} ?>">
		<label>Endereço:</label>
		<input type="text" name="endereco" value="<?php if (isset($endereco) === TRUE) {
														echo $endereco;
													} ?>">
		<label>Bairro:</label>
		<input type="text" name="bairro" value="<?php if (isset($bairro) === TRUE) {
													echo $bairro;
												} ?>">
		<label>Ramo de Atividade:</label>
		<input type="text" name="atividade" value="<?php if (isset($atividade) === TRUE) {
														echo $atividade;
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