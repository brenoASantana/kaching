<?php
include ('../../Conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM fornecedores WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('Fornecedor excluido!');window.location.href='../../painelAdmin.php?menu=fornExcl.php'</script>";
}else{
	echo "erro ao incluir".$conn->error;
}
