<?php
require_once "conexao.php";

$mensagem = "";
$tipo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['titulo'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $diretor = trim($_POST['diretor'] ?? '');
    $duracao_minutos = !empty($_POST['duracao_minutos']) ? (int)$_POST['duracao_minutos'] : NULL;
    $data_lancamento = !empty($_POST['data_lancamento']) ? $_POST['data_lancamento'] : NULL;
    $sinopse = trim($_POST['sinopse'] ?? '');

    $sql = "INSERT INTO filmes (titulo, genero, diretor, duracao_minutos, data_lancamento, sinopse) VALUES (?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssiss", $titulo, $genero, $diretor, $duracao_minutos, $data_lancamento, $sinopse);
        if ($stmt->execute()) {
            $mensagem = "Filme registado com sucesso!";
            $tipo = "success";
        } else {
            $mensagem = "Erro ao guardar no banco de dados: " . $stmt->error;
            $tipo = "error";
        }
        $stmt->close();
    } else {
        $mensagem = "Erro na consulta SQL: " . $conn->error;
        $tipo = "error";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Telefilms - Resultado do Cadastro</title>
    <link rel="stylesheet" href="estilo_filmes.css">
</head>
<body>
    <div class="container">
        <h1>Resultado do Cadastro</h1>

        <div class="alert-message alert-<?php echo $tipo; ?>">
            <?php echo $mensagem; ?>
        </div>

        <nav class="nav-bar">
            <a href="cadastro_filme.html" class="nav-link">Cadastrar Outro Filme</a>
            <a href="consultar_filme.php" class="nav-link">Ver Catálogo</a>
        </nav>
    </div>
</body>
</html>