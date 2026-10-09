<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Avaliação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>Alterar Avaliação de Carro</h2>

  <form action="form_alterar.php" method="POST">
    <label for="id">ID da Avaliação:</label>
    <input type="text" id="id" name="id" placeholder="Digite o ID" required>
    <button type="submit">Buscar Cadastro</button>
  </form>

  <?php
  if (isset($_POST['id'])) {
      echo "<hr>";
      require_once 'conexao.php';

      $id = $_POST['id'];

      $sql = "SELECT * FROM avaliacoes_carros WHERE id = '$id'";
      $resultado = $conexao->query($sql);

      if ($resultado->num_rows > 0) {
          $carro = $resultado->fetch_assoc();
  ?>

  <form action="salvar_alteracao.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $carro['id']; ?>">

    <label>Modelo Atual:</label>
    <input type="text" name="modelo" value="<?php echo $carro['modelo']; ?>" required>

    <label>Marca Atual:</label>
    <input type="text" name="marca" value="<?php echo $carro['marca']; ?>" required>

    <label>Nota Atual:</label>
    <input type="number" name="nota" value="<?php echo $carro['nota']; ?>" min="0" max="10" required>

    <label>Comentário Atual:</label>
    <input type="text" name="comentario" value="<?php echo $carro['comentario']; ?>" required>

    <button type="submit">Gravar Alterações</button>
  </form>

  <?php 
      } else { 
          echo "<p style='color:#dc2626;'>Avaliação não localizada.</p>"; 
      } 
      $conexao->close();
  }
  ?>
</div>

</body>
</html>