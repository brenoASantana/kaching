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
			<input type="submit" name="enviar" value="Pesquisar">
		</fieldset>
	</form>

	<?php
	if (isset($_POST['cpf']) === TRUE) {
		$cpf = $_POST['cpf'];

		$sql = "SELECT cli.id,
		cli.nome,
		cli.email,
		cli.data_nascimento,
		cli.cpf,
		cli.endereco,
		cli.bairro,
		cli.id_estados,
		estado.uf as estados
	FROM clientes as cli
		INNER JOIN estado ON id_estados = estado.id
	WHERE cli.cpf = $cpf;";

		$resultado = $conn->query($sql);
		$linha =  mysqli_affected_rows($conn);

		if ($linha > 0) {

			$linha = $resultado->fetch_assoc();

			$id = $linha['id'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$data_nascimento = $linha['data_nascimento'];
			$uf = $linha['estados'];


			echo "<br>";
			echo "Nome: " . $nome . "<br>";
			echo "Email: " . $email . "<br>";
			echo "Data de Nascimento: " . $data_nascimento . "<br>";
			echo "UF: " . $uf . "<br><br>";
			echo "<a href='Entidades/Clientes/ExclCliBack.php?id" . $id . "' class='btn-excluir'>Excluir</a>";
		} else {
			echo "Dados não encontrados";
		}
	}
	?>
	<br>
</body>
</html>