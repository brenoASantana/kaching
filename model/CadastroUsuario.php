<?php
include('../../Conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT id, id_cargo
	FROM funcionarios
	WHERE email = '$email'";

$resultado = $conn->query($sql);

if (mysqli_num_rows($resultado) < 1) {
	echo "<script language='javascript' type='text/javascript'>alert('O Usuário deve ter o mesmo email do Funcionário!');window.location.href='../../painelAdmin.php?menu=usuCad'</script>";
} else {
	$linha = $resultado->fetch_assoc();
	$id_funcionario = $linha['id'];
	$id_cargo = $linha['id_cargo'];

	if ($email == null || $senha == null) {
		echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=usuCad'</script>";
	} else {

		switch ($id_cargo) {
			case "Gerente":
				$id_cargo = 1;
			case "Vendedor":
				$id_cargo = 2;
		}
		$sql = "INSERT INTO usuarios (senha, email, id_cargo, id_funcionario ) VALUES ('$senha','$email','$id_cargo','$id_funcionario')";

		if ($conn->query($sql) === TRUE) {
			echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado!');window.location.href='../../painelAdmin.php?menu=usuCad'</script>";
		} else {
			echo "erro ao incluir" . $conn->error;
		}
	}
}
