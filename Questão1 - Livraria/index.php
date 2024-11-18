<?php

include('database.php');

$query = "SELECT * FROM livros";
$statement = $db->query($query);
$livros = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
</head>
<body>
    <h1>Cadastro de livros</h1>

   
    <h2>Adicionar Livro</h2>
    <form action="add_book.php" method="post">
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" required><br>

        <label for="autor">Autor:</label><br>
        <input type="text" name="autor" id="autor" required><br>

        <label for="ano">Ano de Publicação:</label><br>
        <input type="number" name="ano" id="ano" required><br><br>

        <button type="submit">Adicionar</button>
    </form>

    
    <h3>Livros Cadastrados</h3>
    <table border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['ano']; ?></td>
                    <td>
                        <form action="delete_book.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<style> 
  
  h1 {
     text-align: center;
     border: 2px solid #444;
     padding: 5px;
     border-radius: 5px;
     margin: 10px;
     background-color: #f0d2ff;
   }
  
  table {
      width: 50%;
      border-collapse: collapse;
      margin: 10px 0;
    }

   th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

   th {
     background-color: #bf2190;
     color: white;
   }
</style>
