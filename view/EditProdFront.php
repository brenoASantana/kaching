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
			<legend>Código :</legend>
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

			$id_produto = $linha['id_produto'];
			$nome = $linha['produto'];
			$codigo = $linha['codigo'];
			$categoria = $linha['categoria'];
			$sub_categoria = $linha['sub_categoria'];
			$id_categoria = $linha['id_categoria'];
			$id_sub_categoria = $linha['id_sub_categoria'];
			$fornecedor = $linha['fornecedor'];
			$id_fornecedor = $linha['id_fornecedor'];
		} else {
			echo "Produto não encontrado";
		}
	}
	?>
	<br><br>
	<h2 style="text-align: left; ">Produto:</h2>
	<fieldset>
		<form method="POST" action="Entidades/Produtos/EditProdBack.php">
			<label>Nome:</label>
			<input type="text" name="produto" value="<?php if (isset($nome) === TRUE) {
															echo $nome;
														} ?>">
			<label>Código:</label>
			<input type="text" name="codigo" value="<?php if (isset($codigo) === TRUE) {
														echo $codigo;
													} ?>">
			<label>Categoria:</label>
			<select name="categoria" id="categoria">
				<option value="<?php if (isset($id_categoria) === TRUE) {
									echo $id_categoria;
								} ?>"><?php if (isset($categoria) === TRUE) {
											echo $categoria;
										} ?></option>
				<?php
				$sql = "SELECT * from categorias";
				$resultado = $conn->query($sql);
				while ($linha = $resultado->fetch_assoc()) {
					echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
				}
				?>
			</select>
			<label>Sub-Categoria:</label>
			<select name="sub_categoria" id="sub_categoria">

				<option value="<?php if (isset($id_sub_categoria) === TRUE) {
									echo $id_sub_categoria;
								} ?>"><?php if (isset($sub_categoria) === TRUE) {
											echo $sub_categoria;
										} ?></option>
				<?php
				$sql = "SELECT * from sub_categorias";
				$resultado = $conn->query($sql);
				while ($linha = $resultado->fetch_assoc()) {
					echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
				}
				?>

			</select>
			<label>Fornecedor:</label>
			<select name="fornecedor" id="fornecedor">
				<option value="<?php if (isset($id_fornecedor) === TRUE) {
									echo $id_fornecedor;
								} ?>"><?php if (isset($fornecedor) === TRUE) {
											echo $fornecedor;
										} ?></option>
				<?php
				$sql = "SELECT * FROM fornecedores";
				$resultado = $conn->query($sql);
				while ($linha = $resultado->fetch_assoc()) {
					echo "<option value=" . $linha['id'] . ">" . $linha['nome_fantasia'] . "</option>";
				}

				?>
			</select>
			<label>Ativo:</label>
			<input type="checkbox" name="ativo" value="S" checked>
			<input type="hidden" name="id" value="<?php if (isset($id) === TRUE) {
														echo $id;
													} ?>">
			<br><br>
			<input type="submit" name="cadastrar" value="Atualizar">
	</fieldset>
	</form>
</body>

</html>