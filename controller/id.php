<?php include('Conexao.php');

$sql = "SELECT * FROM estado";
mysqli_query($conn, $sql);
$linha =  mysqli_affected_rows($conn);
echo "Numero de linhas afetadas: " . $linha;

?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>

	<form method="POST" action="pedido.php">
		<label>Pedido: </label>
		<input type="text" name="id_pedido" value="<?php echo $linha; ?>">
		<input type="submit" name="enviar" value="enviar">
	</form>


</body>

</html>