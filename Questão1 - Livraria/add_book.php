<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];


    $query = "INSERT INTO livros (titulo, autor, ano) VALUES (:titulo, :autor, :ano)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':ano', $ano);
    $stmt->execute();
}

header('Location: index.php');
exit();
?>


