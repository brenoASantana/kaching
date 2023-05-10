<?php
include('../controller/conexao.php');

$id = $_POST['id'];
$id_funcionario = $_POST['id_funcionario'];
$id_cargo = $_POST['id_cargo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($id == null || $id_funcionario == null || $id_cargo == null || $email == null || $senha == null) {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../controller/PainelAdmin.php?menu=usuEdit'</script>";
} else {
	$sql = "UPDATE usuarios SET id = '$id', id_funcionario = '$id_funcionario', id_cargo = '$id_cargo', email = '$email', senha = '$senha' WHERE id = '$id';";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro alterado com sucesso!');window.location.href='../controller/PainelAdmin.php?menu=usuEdit'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
