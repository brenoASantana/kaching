<!DOCTYPE html>
<html>

<head>
	<title>Sistema de Métricas de Vendas</title>
	<link rel="stylesheet" type="text/css" href="Front+/css/reset.css">
	<link rel="stylesheet" type="text/css" href="Front+/css/style.css">
	<link rel="stylesheet" type="text/css" href="Front+/css/fonts-icones.css">
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
						include('Entidades/Funcionarios/CadFuncFront.php');
						break;
					case 'funcEdit':
						include('Entidades/Funcionarios/EditFuncFront.php');
						break;
					case 'funcExcl':
						include('Entidades/Funcionarios/ExclFuncFront.php');
						break;

						//Clientes
					case 'cliCad':
						include('Entidades/Clientes/CadCliFront.php');
						break;
					case 'cliEdit':
						include('Entidades/Clientes/EditCliFront.php');
						break;
					case 'cliExcl':
						include('Entidades/Clientes/ExclCliFront.php');
						break;

						//Fornecedores
					case 'fornCad':
						include('Entidades/Fornecedores/CadFornFront.php');
						break;
					case 'fornEdit':
						include('Entidades/Fornecedores/EditFornFront.php');
						break;
					case 'fornExcl':
						include('Entidades/Fornecedores/ExclFornFront.php');
						break;

						//Produtos
					case 'prodCad':
						include('Entidades/Produtos/CadProdFront.php');
						break;
					case 'prodEdit':
						include('Entidades/Produtos/EditProdFront.php');
						break;
					case 'prodExcl':
						include('Entidades/Produtos/ExclProdFront.php');
						break;

						//Usuários
					case 'usuCad':
						include('Entidades/Usuarios/CadUsuFront.php');
						break;
					case 'usuEdit':
						include('Entidades/Usuarios/EditUsuFront.php');
						break;
					case 'usuExcl':
						include('Entidades/Usuarios/ExclUsuFront.php');
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
					<td><a href="../Kaching/index.php" class="btn-excluir">Sair</a></td>
				</tr>
			</table>
		</div>

	</div>
</body>

</html>