<?php
include('database.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $query = "DELETE FROM livros WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header('Location: index.php');
exit();
?>
