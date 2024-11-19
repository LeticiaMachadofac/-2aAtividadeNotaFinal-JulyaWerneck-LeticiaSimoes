<?php
require 'database.php'; 
$stmt = $pdo->query("SELECT * FROM tarefas");
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
  <head>
    <title>Gerenciador de tarefas</title>
    <style>

      .title{
        text-align: center;
        border-bottom: 1px solid black;
        padding: 20px;
      }
      
      .add{
        padding: 50px;
        width: 600px;
        border-radius: 6px;
        margin: auto;
        text-align: center;
      }

      .face{
        border-top: 1px solid black;
        margin: auto;
        text-align: center;
        padding: 25px;
      }

      .layout{
        display: flex;
        gap: 10px;
      }

      .toDo{
        text-align: center;
        width: 500px;
        margin: auto;
        border: 1px solid black;
        border-radius: 6px;
        padding: 30px;
      }

      .done{
        text-align: center;
        width: 500px;
        margin: auto;
        border: 1px solid black;
        border-radius: 6px;
        padding: 30px;
      }

      a{
        text-decoration: none;
        background-color: purple;
        color: white;
        padding: 10px 15px;
        border-radius: 6px;
        
      }

      button{
        background-color: purple;
        color: white;
        padding: 12px 15px;
        border-radius: 6px;
        border: none;
      }

      input{
        padding: 10px 15px;
        border-radius: 6px;
        border: 1px soft-light;
      }

      ul{
        text-align: left;
      }
    </style>
  </head>
  <body>
    <div class="title">
      <h1>To-do List</h1>
      <p>O site perfeito para o seu dia a dia!</p>
    </div>
    <div class="add">
      <h2>Adicionar Tarefa</h2>
      <form action="add_tarefa.php" method="POST">
        <input type="text" name="descricao" placeholder="Descrição da tarefa" required>
        <input type="date" name="data_de_vencimento" class="data-vencimento" required>
        <button type="submit">Adicionar</button>
      </form>
    </div>  
    <div class="face">
      <h2>Lista de tarefa</h2>
      <p>Gerencie todas as suas tarefas diarárias:</p>
    </div>

    <div class="layout">
      <div class="toDo">
        <h2>Tarefas pendentes</h2>
        <?php
        $tarefasPendentes = array_filter($tarefas, function($tarefa) {
            return $tarefa['finalizada'] == 0;
        });
  
        if (count($tarefasPendentes) > 0): ?>
          <ul>
            <?php foreach ($tarefasPendentes as $tarefa): ?>
              <li>
                <?php echo htmlspecialchars($tarefa['descricao']); ?> <br>
                <p>Vencimento:</p> 
                <?php 
                  $data_vencimento = new DateTime($tarefa['data_de_vencimento']);
                  echo $data_vencimento->format('d/m/Y'); 
                ?>
                <a href="update_tarefa.php?id=<?php echo $tarefa['id']; ?>">Finalizar tarefa</a>
                <a href="delete_tarefa.php?id=<?php echo $tarefa['id']; ?>">Excluir</a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>Você não possui tarefas pendentes.</p>
        <?php endif; ?>
      </div>
  
      <div class="done">
        <h2>Tarefas finalizadas</h2>
        <?php
        $tarefasFinalizadas = array_filter($tarefas, function($tarefa) {
            return $tarefa['finalizada'] == 1;
        });
  
        if (count($tarefasFinalizadas) > 0): ?>
          <ul>
            <?php foreach ($tarefasFinalizadas as $tarefa): ?>
              <li>
                <?php echo htmlspecialchars($tarefa['descricao']); ?>
                <a href="delete_tarefa.php?id=<?php echo $tarefa['id']; ?>">Excluir</a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>Você não possui tarefas finalizadas.</p>
        <?php endif; ?>
      </div>
    </div>
</html>
