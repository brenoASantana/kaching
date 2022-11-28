<?php
include('../../Conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$estados = $_POST['estados'];
$cargo = $_POST['cargo'];

if ($nome == null || $email == null || $data_nascimento == null || $cpf == null || $endereco == null || $bairro == null || $estados == "SELECIONE" || $cargo == "SELECIONE") {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=funcCad'</script>";
} else {

	if (isset($_POST['ativo']) == "S") {
		$ativo = "S";
	} else {
		$ativo = "N";
	}

	$sql = "INSERT INTO funcionarios (nome, email, data_nascimento, cpf, endereco, bairro, id_estados, id_cargo, ativo) VALUES ('$nome','$email','$data_nascimento','$cpf','$endereco','$bairro','$estados','$cargo', '$ativo')";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='../../painelAdmin.php?menu=funcCad'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
