<?php
include('../../Conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM funcionarios WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('Funcionário excluído!');window.location.href='../../painelAdmin.php?menu=funcExcl.php?menu=funcExcl'</script>";
} else {
	echo "erro ao incluir" . $conn->error;
}
