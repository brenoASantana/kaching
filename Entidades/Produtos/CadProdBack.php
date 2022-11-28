<?php
include('../../Conexao.php');

$produto = $_POST['produto'];
$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];
$sub_categorias = $_POST['sub_categorias'];
$fornecedores = $_POST['fornecedores'];

if ($produto == null || $codigo == null || $categoria == "SELECIONE" || $sub_categorias == "SELECIONE" || $fornecedores == "SELECIONE") {
	echo "<script language='javascript' type='text/javascript'>alert('Preencha todos os campos corretamente!');window.location.href='../../painelAdmin.php?menu=prodCad'</script>";
} else {
	if (isset($_POST['ativo'])) {
		$ativo = $_POST['ativo'];
	} else {
		$ativo = "N";
	}

	$sql = "INSERT INTO produtos (nome, codigo, id_categoria, id_sub_categoria, id_fornecedor, ativo) VALUES ('$produto','$codigo','$categoria','$sub_categorias', '$fornecedores','$ativo')";

	if ($conn->query($sql) === TRUE) {
		echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='../../painelAdmin.php?menu=prodCad'</script>";
	} else {
		echo "erro ao incluir" . $conn->error;
	}
}
