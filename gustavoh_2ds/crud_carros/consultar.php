<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Avaliações</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>Consultar Avaliações de Carros Esportivos</h2>
  
  <form method="GET" action="consultar.php">
    <label>Digite o Modelo do Carro:</label>
    <input type="text" name="modelo" value="Porsche">
    <button type="submit">Buscar</button>
  </form>

  <hr>

  <?php
  if (isset($_GET['modelo'])) {
      require_once 'conexao.php';

      $busca = $_GET['modelo'];
      $sql = "SELECT * FROM avaliacoes_carros WHERE modelo LIKE '%$busca%'";
      $resultado = $conexao->query($sql);

      echo "<h3>Resultados Encontrados:</h3>";
      if ($resultado->num_rows > 0) {
          while ($linha = $resultado->fetch_assoc()) {
              echo "<div class='resultado-item'>";
              echo "<strong>ID:</strong> " . $linha['id'] . " | <strong>Modelo:</strong> " . $linha['modelo'] . " | <strong>Marca:</strong> " . $linha['marca'] . "<br>";
              echo "<strong>Nota:</strong> " . $linha['nota'] . " | <strong>Comentário:</strong> " . $linha['comentario'];
              echo "</div>";
          }
      } else {
          echo "<p>Nenhum carro encontrado.</p>";
      }
      $conexao->close();
  }
  ?>
</div>

</body>
</html>