<?php
include ('../controller/conexao.php');

$produto = $_POST['produto'];
$id_produto = $_POST['id_produto'];
$id_categoria = $_POST['id_categoria'];
$id_sub_categoria = $_POST['id_sub_categoria'];
$quantidade = $_POST['quantidade'];
//$valor = str_replace(",", ".", $_POST['valor']); // tratar valor monetario.
$movimentacao = "ENTRADA";

$sql = "INSERT INTO estoque (id_produto, id_categoria, id_sub_categoria, quantidade, movimentacao) VALUES ('$id_produto','$id_categoria', '$id_sub_categoria', '$quantidade','$movimentacao')";
if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('O produto: ".$produto." Cadastrado com sucesso!');window.location.href='../view/Estoque.php'</script>";
}else{
	echo "erro ao incluir".$conn->error;
}
