<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Avaliação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>Cadastrar Avaliação de Carro Esportivo</h2>
  
  <form action="cadastrar.php" method="POST">
    <label>Modelo do Carro:</label>
    <input type="text" name="modelo" placeholder="Ex: Porsche 911" required>

    <label>Marca:</label>
    <input type="text" name="marca" placeholder="Ex: Porsche" required>

    <label>Nota (0 a 10):</label>
    <input type="number" name="nota" min="0" max="10" required>

    <label>Avaliação / Comentário:</label>
    <textarea name="comentario" rows="4" placeholder="Escreva sobre o desempenho..." required></textarea>

    <button type="submit">Salvar Avaliação</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      require_once 'conexao.php';

      $modelo = $_POST['modelo'];
      $marca = $_POST['marca'];
      $nota = $_POST['nota'];
      $comentario = $_POST['comentario'];

      $sql = "INSERT INTO avaliacoes_carros (modelo, marca, nota, comentario) VALUES ('$modelo', '$marca', '$nota', '$comentario')";

      if ($conexao->query($sql) === TRUE) {
          echo "<hr><h3 style='color:#16a34a;'>Avaliação Cadastrada com Sucesso!</h3>";
      } else {
          echo "<hr><p style='color:#dc2626;'>Erro ao cadastrar: " . $conexao->error . "</p>";
      }
      $conexao->close();
  }
  ?>
</div>

</body>
</html>