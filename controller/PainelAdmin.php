<!DOCTYPE html>
<html>

<head>
	<title>Sistema de Métricas de Vendas</title>
	<link rel="stylesheet" type="text/css" href="../view/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../view/css/style.css">
	<link rel="stylesheet" type="text/css" href="../view/css/fonts-icones.css">
</head>

<body>
	<h1>Painel do Administrador</h1>
	<div class="linha">
		<div class="coluna-1">
			<h2>Menu Principal</h2>
			<table>
				<tr>
					<th>Funcionários</th>
					<th>Clientes</th>
				</tr>
				<tr>
					<td><a href="?menu=funcCad" class="btn-alterar">Cadastrar</a></td>
					<td><a href="?menu=cliCad" class="btn-alterar">Cadastrar</a></td>
				</tr>
				<tr>
					<td><a href="?menu=funcEdit" class="btn-incluir">Editar</a></td>
					<td><a href="?menu=cliEdit" class="btn-incluir">Editar</a></td>
				</tr>
				<tr>
					<td><a href="?menu=funcExcl" class="btn-excluir">Excluir</a></td>
					<td><a href="?menu=cliExcl" class="btn-excluir">Excluir</a></td>
				</tr>
			</table>

			<table>
				<tr>
					<th>Fornecedores</th>
					<th>Produtos</th>
				</tr>
				<tr>
					<td><a href="?menu=fornCad" class="btn-alterar">Cadastrar</a></td>
					<td><a href="?menu=prodCad" class="btn-alterar">Cadastrar</a></td>
				</tr>
				<tr>
					<td><a href="?menu=fornEdit" class="btn-incluir">Editar</a></td>
					<td><a href="?menu=prodEdit" class="btn-incluir">Editar</a></td>
				</tr>
				<tr>
					<td><a href="?menu=fornExcl" class="btn-excluir">Excluir</a></td>
					<td><a href="?menu=prodExcl" class="btn-excluir">Excluir</a></td>
				</tr>
			</table>
		</div>

		<div class="coluna-2">
			<br><br>
			<h2>Visão Geral do Sistema</h2>


			<?php

			if (isset($_GET['menu'])) {
				$menu = $_GET['menu'];

				switch ($menu) {
						//Funcionários
					case 'funcCad':
						include('../view/CadastroFuncionario.php');
						break;
					case 'funcEdit':
						include('../view/EdicaoFuncionario.php');
						break;
					case 'funcExcl':
						include('../view/ExclusaoFuncionario.php');
						break;

						//Clientes
					case 'cliCad':
						include('../view/CadastroCliente.php');
						break;
					case 'cliEdit':
						include('../view/EdicaoCliente.php');
						break;
					case 'cliExcl':
						include('../view/ExclusaoCliente.php');
						break;

						//Fornecedores
					case 'fornCad':
						include('../view/CadastroFornecedor.php');
						break;
					case 'fornEdit':
						include('../view/CadastroFornecedor.php');
						break;
					case 'fornExcl':
						include('../view/ExclusaoFornecedor.php');
						break;

						//Produtos
					case 'prodCad':
						include('../view/CadastroProduto.php');
						break;
					case 'prodEdit':
						include('../view/EdicaoProduto.php');
						break;
					case 'prodExcl':
						include('../view/ExclusaoProduto.php');
						break;

						//Usuários
					case 'usuCad':
						include('../view/CadastroUsuario.php');
						break;
					case 'usuEdit':
						include('../view/EdicaoUsuario.php');
						break;
					case 'usuExcl':
						include('../view/ExclusaoUsuario.php');
						break;


					default:
						header('location: PainelAdmin.php');
						break;
				}
			}

			?>
		</div>

		<div class="coluna-3">
			<h2>Extra</h2>
			<table>
				<td>Usuários</td>
				<tr>
					<td><a href="?menu=usuCad" class="btn-alterar">Cadastrar</a></td>
				</tr>
				<tr>
					<td><a href="?menu=usuEdit" class="btn-incluir">Editar</a></td>
				</tr>
				<tr>
					<td><a href="?menu=usuExcl" class="btn-excluir">Excluir</a></td>
					</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td>Ranking de Clientes (EM BREVE)</td>
				</tr>
				<tr>
					<td><a href="../index.php" class="btn-excluir">Sair</a></td>
				</tr>
			</table>
		</div>

	</div>
</body>

</html>