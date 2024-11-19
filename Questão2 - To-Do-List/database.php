<?php
try {
    $pdo = new PDO('sqlite:database.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE TABLE IF NOT EXISTS tarefas (
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        descricao TEXT NOT NULL,
        finalizada INTEGER NOT NULL DEFAULT 0, 
        data_de_vencimento TEXT NOT NULL
    )");
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
