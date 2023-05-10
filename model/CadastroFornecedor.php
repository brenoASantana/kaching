<?php
include('../controller/conexao.php');

$razao_social = $_POST['razao_social'];
$nome_fantasia = $_POST['nome_fantasia'];
$cnpj = $_POST['cnpj'];
$representante = $_POST['representante'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$estados = $_POST['estados'];
$atividade = $_POST['atividade'];

if ($razao_social == null || $nome_fantasia == null || $cnpj == null || $representante == null || $email == null || $bairro == null || $estados == "SELECIONE" || $atividade == null || $endereco == null) {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=fornCad'</script>";
} else {

	$sql = "INSERT INTO fornecedores (razao_social, nome_fantasia, cnpj, representante, email, endereco, bairro, id_estados, atividade) VALUES ('$razao_social','$nome_fantasia','$cnpj','$representante', '$email','$endereco', '$bairro', '$estados', '$atividade')";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='../controller/PainelAdmin.php?menu=fornCad'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
