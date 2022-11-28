<?php include('../Kaching/Conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Pesquisar Produtos</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>Código:</legend>
			<input type="text" name="codigo" placeholder="XXX-XXXX-XXX">
			<input type="submit" name="enviar" value="OK">
		</fieldset>
	</form>

	<?php
	if (isset($_POST['codigo']) === TRUE) {
		$codigo = $_POST['codigo'];

		$sql = "SELECT prod.id as id_produto,
		prod.nome as produto,
		prod.codigo as codigo,
		categ.nome as categoria,
		categ.id as id_categoria,
		subcateg.nome as sub_categoria,
		subcateg.id as id_sub_categoria,
		forn.nome_fantasia as fornecedor,
		forn.id as id_fornecedor
	FROM produtos as prod
		INNER JOIN categorias as categ ON prod.id_categoria = categ.id
		INNER JOIN sub_categorias as subcateg ON prod.id_sub_categoria = subcateg.id
		INNER JOIN fornecedores as forn ON prod.id_fornecedor = forn.id
	WHERE codigo = '$codigo';";

		$resultado = $conn->query($sql);

		if (mysqli_num_rows($resultado) >= 1) {
			$linha = $resultado->fetch_assoc();

			echo "Produto: " . $linha['produto'] . "<BR>";
			echo "Codigo: " . $linha['codigo'] . "<BR>";
			echo "Categoria: " . $linha['categoria'] . "<BR>";
			echo "Sub Categoria: " . $linha['sub_categoria'] . "<BR>";
			echo "Fornecedor: " . $linha['fornecedor'] . "<BR>";
			echo "<a href='produtos/excluir.php?id=" . $linha['id_produto'] . "' class='btn-excluir'>excluir</a>";
		} else {
			echo "Produto não encontrado";
		}
	}
	?>
	<br>
</body>

</html>