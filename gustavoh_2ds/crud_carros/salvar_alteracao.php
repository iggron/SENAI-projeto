<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Alteração</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      require_once 'conexao.php';

      $id = $_POST['id'];
      $novo_modelo = $_POST['modelo'];
      $nova_marca = $_POST['marca'];
      $nova_nota = $_POST['nota'];
      $novo_comentario = $_POST['comentario'];

      $sql_update = "UPDATE avaliacoes_carros SET modelo = '$novo_modelo', marca = '$nova_marca', nota = '$nova_nota', comentario = '$novo_comentario' WHERE id = '$id'";

      if ($conexao->query($sql_update) === TRUE) {
          echo "<h2 style='color:#16a34a;'>Dados Atualizados com Sucesso!</h2>";
          echo "<div class='resultado-item'>";
          echo "<p><strong>Cadastro Final no Banco:</strong></p>";
          echo "<strong>ID:</strong> " . $id . "<br>";
          echo "<strong>Modelo:</strong> " . $novo_modelo . "<br>";
          echo "<strong>Marca:</strong> " . $nova_marca . "<br>";
          echo "<strong>Nota:</strong> " . $nova_nota . "<br>";
          echo "<strong>Novo Comentário:</strong> " . $novo_comentario . "<br>";
          echo "</div>";
      } else {
          echo "<h3 style='color:#dc2626;'>Erro ao atualizar: " . $conexao->error . "</h3>";
      }
      $conexao->close();
  }
  ?>
  <hr>
  <a href="consultar.php" style="color: #2563eb; font-weight: bold; text-decoration: none;">← Voltar para Consultas</a>
</div>

</body>
</html>