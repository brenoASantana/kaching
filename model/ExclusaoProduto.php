<?php
include('../controller/conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('Produto excluído!');window.location.href='../controller/PainelAdmin.php?menu=prodExcl.php'</script>";
} else {
	echo "erro ao incluir" . $conn->error;
}
