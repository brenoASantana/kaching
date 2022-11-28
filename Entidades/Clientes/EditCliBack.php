<?php
include ('../../Conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$id_estados = $_POST['id_estados'];

if ($id == null||$nome == null || $email == null || $data_nascimento == null || $cpf == null || $endereco == null || $bairro == null || $id_estados == "") {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=cliEdit'</script>";
} else {
$sql = "UPDATE clientes SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento', cpf = '$cpf', endereco = '$endereco', bairro = '$bairro', id_estados = '$id_estados' WHERE id = '$id';";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('Cadastro alterado com sucesso!');window.location.href='../../painelAdmin.php?menu=cliEdit'</script>";
}else{
	echo "erro ao incluir".$conn->error;
}
}