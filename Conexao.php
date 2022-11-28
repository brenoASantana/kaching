<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "kaching_db";

$conn = new mysqli($servidor, $usuario, $senha, $db);

if ($conn->connect_error) {
	die("Conexão falhou" . $con->connect_error);
} else {
	echo "Conectado com o banco de dados";
}
