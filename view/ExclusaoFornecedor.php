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
			<input type="text" name="cnpj" placeholder=" XX.XXX.XXX/0001-XX">
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
		forn.bairro,
		forn.id_estados,
		forn.atividade,
		estado.nome as estado
	FROM fornecedores AS forn
		INNER JOIN estado on estado.id = forn.id_estados
	WHERE cnpj = '$cnpj';";

		$resultado = $conn->query($sql);
		$linha = mysqli_affected_rows($conn);

		if ($linha > 0) {
			$linha = $resultado->fetch_assoc();

			$id = $linha['id'];
			$razao_social = $linha['razao_social'];
			$nome_fantasia = $linha['nome_fantasia'];
			$representante = $linha['representante'];
			$atividade = $linha['atividade'];

			echo "Razão Social: " . $razao_social . "<br>";
			echo "Nome Fantasia: " . $nome_fantasia . "<br>";
			echo "Representante: " . $representante . "<br>";
			echo "Ramo de Atividade: " . $atividade . "<br>";
			echo "<a href='../model/ExclusaoFornecedor.php?id=" . $id . "' class='btn-excluir'>Excluir</a>";
		} else {
			echo "Dados não encontrado";
		}
	}
	?>
	<br>
</body>

</html>