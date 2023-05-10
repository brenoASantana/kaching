<?php include('conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Estoque</title>
</head>

<body>
	<h1>Controle de estoque</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>Localiza produto:</legend>
			<label>Produto:</label>
			<input type="text" name="codigo">
			<input type="submit" name="enviar" value="OK">
		</fieldset>
	</form>

	<?php
	if (isset($_POST['codigo']) === TRUE) {
		$codigo = $_POST['codigo'];

		$sql = "SELECT * FROM produto WHERE codigo = '$codigo'";
		$resultado = $conn->query($sql);
		while ($linha = $resultado->fetch_assoc()) {
			$id = $linha['id'];
			$produto = $linha['nome'];
			$id_categoria = $linha['id_categoria'];
			$id_sub_categoria = $linha['id_sub_categoria'];

			/*echo "ID: ".$id."<br>";
			echo "Produto: ".$produto."<br>";
			echo "categoria: ".$id_categoria."<br>";
			echo "Sub categoria: ".$id_sub_categoria."<br>";*/
		}

		$sql = "SELECT * FROM categorias WHERE id = '$id_categoria'";
		$resultado = $conn->query($sql);
		while ($linha = $resultado->fetch_assoc()) {
			$id = $linha['id'];
			$categoria = $linha['nome'];

			/*echo "ID: ".$id."<br>";
			echo "categoria: ".$categoria."<br>";*/
		}

		$sql = "SELECT * FROM sub_categorias WHERE id = '$id_sub_categoria'";
		$resultado = $conn->query($sql);
		while ($linha = $resultado->fetch_assoc()) {
			$id = $linha['id'];
			$sub_categoria = $linha['nome'];

			/*echo "ID: ".$id."<br>";
			echo "Sub Categoria: ".$sub_categoria."<br>";*/
		}
	}

	?>

	<form method="POST" action="../model/IncluirEstoque.php">
		<fieldset>
			<legend>Estoque</legend>
			<label>Produto:</label>
			<input type="text" name="produto" value="<?php if (isset($produto) === TRUE) {
															echo $produto;
														} ?>">
			<label>Categoria:</label>
			<input type="text" name="categoria" value="<?php if (isset($categoria) === true) {
															echo $categoria;
														} ?>">
			<label>Sub Categoria:</label>
			<input type="text" name="sub_categoria" value="<?php if (isset($sub_categoria) === true) {
																echo $sub_categoria;
															} ?>"><br><br>
			<label>Quantidade:</label>
			<input type="text" name="quantidade">

			<input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
			<input type="hidden" name="id_sub_categoria" value="<?php echo $id_sub_categoria; ?>">
			<input type="hidden" name="id_produto" value="<?php echo $id; ?>">
			<input type="submit" name="enviar" value="Cadastro">
		</fieldset>
	</form>

	<h1>Posição de estoque</h1>
	<?php

	$sql = "SELECT produto.nome as produto, SUM(CASE WHEN estoque.movimentacao = \"ENTRADA\" THEN estoque.quantidade ELSE - estoque.quantidade END) as saldo FROM estoque INNER JOIN produto ON estoque.id_produto = produto.id GROUP BY id_produto;";
	$resultado = $conn->query($sql);
	while ($linha = $resultado->fetch_assoc()) {
		echo "Produto: " . $linha['produto'] . " - Saldo: " . $linha['saldo'] . "<br>";
	}
	?>
</body>

</html>