<?php
include ('../controller/conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('Usuário excluído!');window.location.href='../controller/PainelAdmin.php?menu=usuExcl.php'</script>";
}else{
	echo "erro ao incluir".$conn->error;
}
