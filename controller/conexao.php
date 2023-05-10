<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "kaching_db";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
	die("Conexão falhou" . $con->connect_error);
} else {
	echo "Conectado com o banco de dados";
}
