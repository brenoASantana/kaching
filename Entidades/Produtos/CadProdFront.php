<?php include('../Kaching/Conexao.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Cadastro de Produtos</h1>
	<form method="POST" action="Entidades/Produtos/CadProdBack.php">
		<fieldset>
			<label>Nome do Produto:</label>
			<input type="text" name="produto">
			<label>Código de Produto:</label>
			<input type="text" name="codigo" placeholder="XXX-XXXX-XXX">

			<label>Categoria:</label>
			<select name="categoria" id="categoria">
				<option>SELECIONE</option>
				<?php
				$sql = "SELECT * FROM categorias";
				$resultado = $conn->query($sql);
				while ($linha = $resultado->fetch_assoc()) {
					echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . " - " . $linha['id'] . "</option>";
				}
				?>
			</select>
			<label>Sub Categoria:</label>
			<select name="sub_categorias" id="sub_categorias">
				<option>SELECIONE</option>
				<?php
				$sql = "SELECT * FROM sub_categorias";
				$resultado = $conn->query($sql);
				while ($linha = $resultado->fetch_assoc()) {
					echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . " - " . $linha['id_categoria'] . "</option>";
				}

				?>
			</select>
			<label>Fornecedor:</label>
			<select name="fornecedores" id="fornecedores">
				<option>SELECIONE</option>
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
			<br><br>
			<input type="submit" name="enviar" value="Cadastrar">
		</fieldset>
	</form>
</body>

</html>