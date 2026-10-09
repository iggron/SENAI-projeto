<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Avaliação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>Excluir Avaliação</h2>
  
  <form action="excluir.php" method="POST">
    <label for="id">ID da Avaliação a ser Removida:</label>
    <input type="text" id="id" name="id" placeholder="Digite o ID" required>
    <button type="submit">Excluir Avaliação</button>
  </form>

  <?php
  if (isset($_POST['id'])) {
      echo "<hr>";
      require_once 'conexao.php';

      $id = $_POST['id'];

      $sql_delete = "DELETE FROM avaliacoes_carros WHERE id = '$id'";

      if ($conexao->query($sql_delete) === TRUE) {
          echo "<h3 style='color:#dc2626;'>Avaliação Removida com Sucesso!</h3>";
      } else {
          echo "<p style='color:#dc2626;'>Erro ao excluir: " . $conexao->error . "</p>";
      }
      $conexao->close();
  }
  ?>
</div>

</body>
</html>