<?php
include('../../Conexao.php');

$id = $_POST['id'];
$razao_social = $_POST['razao_social'];
$nome_fantasia = $_POST['nome_fantasia'];
$cnpj = $_POST['cnpj'];
$representante = $_POST['representante'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$id_estados = $_POST['id_estados'];
$atividade = $_POST['atividade'];

if ($id == null || $razao_social == null || $nome_fantasia == null || $cnpj == null || $representante == null || $email == null || $endereco == null || $bairro == null || $id_estados == null || $atividade == null) {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=fornEdit'</script>";
} else {
	$sql = "UPDATE fornecedores SET razao_social = '$razao_social', nome_fantasia = '$nome_fantasia', cnpj = '$cnpj', representante = '$representante', email = '$email', endereco = '$endereco', bairro = '$bairro', id_estados = '$id_estados', atividade = '$atividade' WHERE id = '$id';";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro alterado com sucesso!');window.location.href='../../painelAdmin.php?menu=fornEdit'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
