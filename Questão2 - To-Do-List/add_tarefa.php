<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $data_de_vencimento = $_POST['data_de_vencimento'];
    $stmt = $pdo->prepare("INSERT INTO tarefas (descricao, data_de_vencimento) VALUES (:descricao, :data_de_vencimento)");
    $stmt->execute([
        'descricao' => $descricao,
        'data_de_vencimento' => $data_de_vencimento
    ]);

    header('Location: index.php');
}
?>
