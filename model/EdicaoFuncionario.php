<?php
include('../controller/conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$id_estados = $_POST['id_estados'];
$id_cargo = $_POST['id_cargo'];
$ativo = $_POST['ativo'];

if ($id == null || $nome == null || $email == null || $data_nascimento == null || $cpf == null || $endereco == null || $bairro == null || $id_estados == "" || $id_cargo == null || $ativo == null) {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../controller/PainelAdmin.php?menu=funcEdit'</script>";
} else {
	$sql = "UPDATE funcionarios SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento', cpf = '$cpf', endereco = '$endereco', bairro = '$bairro', id_estados = '$id_estados', id_cargo = '$id_cargo', ativo = '$ativo' WHERE id = '$id';";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro alterado com sucesso!');window.location.href='../controller/PainelAdmin.php?menu=funcEdit'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
