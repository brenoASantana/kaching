<?php
include('../../Conexao.php');

$id_produto = $_POST['id_produto'];
$produto = $_POST['produto'];
$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];
$sub_categoria = $_POST['sub_categorias'];
$fornecedor = $_POST['fornecedores'];


if ($id_produto == null || $produto == null || $codigo == null || $categoria == null || $sub_categoria == null || $fornecedor == null) {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=prodEdit'</script>";
} else {
	$sql = "UPDATE produtos SET id_produto = '$id_produto', produto = '$produto', codigo = '$codigo', categoria = '$categoria', sub_categoria = '$sub_categoria', id_fornecedor = '$fornecedor' WHERE id = '$id';";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro alterado com sucesso!');window.location.href='../../painelAdmin.php?menu=prodEdit'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
