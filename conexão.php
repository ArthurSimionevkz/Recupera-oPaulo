<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "recuperacao_db";

try {
    $conn = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["erro" => "Falha na conexão: " . $e->getMessage()]));
}
?>
