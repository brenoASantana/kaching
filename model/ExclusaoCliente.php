<?php
include('../controller/conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('Cliente excluído!');window.location.href='../controller/PainelAdmin.php?menu=cliExcl'</script>";
} else {
	echo "erro ao incluir" . $conn->error;
}
