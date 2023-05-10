<?php include('../controller/conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Tabela de preços</title>
</head>

<body>
	<h1>Tabela de preços</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>Codigo do Produto:</legend>
			<input type="text" name="codigo"><br><br>
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
		}
	}

	?>
	<br><br>
	<form method="POST" action="../model/IncluirPreco.php">
		<fieldset>
			<h2>Precificação</h2>
			<label>Produto:</label>
			<input type="text" name="produto" value="<?php if (isset($produto) === TRUE) {
															echo $produto;
														} ?>">

			<label>Valor R$:</label>
			<input type="text" name="valor">
			<input type="hidden" name="id_produto" value="<?php echo $id; ?>"><br><br>
			<input type="submit" name="enviar" value="Cadastro">
		</fieldset>
	</form>

	<fieldset>
		<legend>Tabela de Preços</legend>
		<?php

		//$sql = "SELECT * FROM tb_precos";
		$sql = "SELECT tb_precos.id as id, produto.nome as produto, tb_precos.valor as valor FROM produto INNER JOIN tb_precos ON produto.id = tb_precos.id_produto";
		$resultado = $conn->query($sql);
		while ($linha = $resultado->fetch_assoc()) {
			echo "#" . $linha['id'] . " - " . $linha['produto'] . " - R$" . str_replace(".", ",", $linha['valor']) . "<br>";

			//echo $linha['id']." - ".$linha['id_produto']." - R$ ".str_replace(".", ",", $linha['valor'])."<br>";			
		}
		?>
	</fieldset>
</body>

</html>