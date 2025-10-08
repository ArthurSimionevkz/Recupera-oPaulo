<?php
require_once "conexão.php";

class UsuarioModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    // Cadastrar usuário
    public function cadastrar($nome, $email) {
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }

    // Consultar todos usuários
    public function listar() {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
