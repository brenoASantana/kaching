<?php include('../Kaching/Conexao.php'); ?>
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
			<input type="submit" name="enviar" value="Pesquisar">
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
		$linha = mysqli_affected_rows($conn);

		if ($linha > 0) {
			$linha = $resultado->fetch_assoc();

			$id = $linha['id'];
			$nome = $linha['nome'];
			$email = $linha['email'];
			$id_cargo = $linha['id_cargo'];

			echo "Nome: " . $nome . "<br>";
			echo "Email: " . $email . "<br>";
			echo "ID Cargo: " . $id_cargo . "<br>";
			echo "<a href='Entidades/Funcionarios/ExclFuncBack.php?id=" . $id . "' class='btn-excluir'>Excluir</a>";
		} else {
			echo "Dados não encontrados";
		}
	}
	?>
	<br>
</body>

</html>