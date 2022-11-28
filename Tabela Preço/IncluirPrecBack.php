<?php include('../conn/conexao.php');

$id_produto = $_POST['id_produto'];
$valor = str_replace(",", ".", $_POST['valor']);
$produto = $_POST['produto'];


$sql = "INSERT INTO tb_precos (id_produto, valor) VALUES ('$id_produto','$valor')";

if ($conn->query($sql) === TRUE) {
	echo "<script language='javascript' type='text/javascript'>alert('Produto: ".$produto." Preço: R$".$valor."');window.location.href='../tbpreco.php'</script>";
}else{
	echo "erro ao incluir".$conn->error;
}
