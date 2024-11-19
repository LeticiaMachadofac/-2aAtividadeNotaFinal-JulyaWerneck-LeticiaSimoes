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

   <div class = "layout">
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
   </div> 
    
   <div class = "layout2">    
        <h2>Livros Cadastrados</h2>
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
   </div>
</body>
</html>
<style> 
  
  h1 {
     text-align: center;
     border: 2px solid #444;
     padding: 5px;
     border-radius: 5px;
     margin: auto;
     margin-bottom: 15px;
     background-color: #f0d2ff;
     width: 400px;
  }

  .layout {
      padding: 10px;
      margin: auto; 
      text-align: center;
      width: 400px;
      
   }
    
   table {
      width: 400px;
      border-collapse: collapse;
      margin: auto;
    
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

   .layout2 {
   text-align: center;
       
   }
</style>
