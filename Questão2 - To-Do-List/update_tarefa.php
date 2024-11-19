<?php
require 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("UPDATE tarefas SET finalizada = 1 WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header('Location: index.php');
}
?>
