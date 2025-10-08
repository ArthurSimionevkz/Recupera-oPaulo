<?php
header("Content-Type: application/json; charset=utf-8");

require_once "model.php";

$model = new UsuarioModel($conn);
$acao = $_REQUEST["acao"] ?? "";

if ($acao === "cadastrar") {
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";

    if ($nome && $email) {
        $model->cadastrar($nome, $email);
        echo json_encode(["mensagem" => "Cadastro realizado com sucesso!"]);
    } else {
        echo json_encode(["mensagem" => "Preencha todos os campos!"]);
    }

} elseif ($acao === "consultar") {
    $usuarios = $model->listar();
    echo json_encode($usuarios);

} else {
    echo json_encode(["mensagem" => "Ação inválida."]);
}
?>
