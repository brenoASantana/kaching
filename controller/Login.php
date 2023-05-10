<?php
include('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT email,
senha,
id_cargo,
id_funcionario
FROM usuarios
WHERE email = '$email'
AND senha = '$senha';";

$verifica = $conn->query($sql);

if (mysqli_num_rows($verifica) <= 0) {
	echo "<script language='javascript' type='text/javascript'>alert('Usuário ou senha invalida!');window.location.href='../index.php'</script>";
} else {
	$linha = $verifica->fetch_assoc();

	$id_cargo = $linha['id_cargo'];

	if ($id_cargo == 1) {
		header('location: PainelAdmin.php');
	} else if ($id_cargo == 2) {
		header('location: Pedidos.php');
	} else {
		echo "<script language='javascript' type='text/javascript'>alert('Usuário com cargo desconhecido');window.location.href='../index.php'</script>";
	}
}
