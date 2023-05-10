<?php
include('../../Conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$estados = $_POST['estados'];


if ($nome == null || $email == null || $data_nascimento == null || $cpf == null || $endereco == null || $bairro == null || $estados == "SELECIONE") {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=cliCad'</script>";
} else {

	$sql = "INSERT INTO clientes (nome, email, data_nascimento, cpf, endereco, bairro, id_estados) VALUES ('$nome','$email','$data_nascimento','$cpf','$endereco','$bairro','$estados')";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='../../painelAdmin.php?menu=cliCad'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
