<?php
require_once "conexao.php";

$mensagem = "";
$tipo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_filme = (int)$_POST['id_filme'];
    $titulo = trim($_POST['titulo'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $diretor = trim($_POST['diretor'] ?? '');
    $duracao_minutos = !empty($_POST['duracao_minutos']) ? (int)$_POST['duracao_minutos'] : NULL;
    $data_lancamento = !empty($_POST['data_lancamento']) ? $_POST['data_lancamento'] : NULL;
    $sinopse = trim($_POST['sinopse'] ?? '');

    $sql = "UPDATE filmes SET titulo = ?, genero = ?, diretor = ?, duracao_minutos = ?, data_lancamento = ?, sinopse = ? WHERE id_filme = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssissi", $titulo, $genero, $diretor, $duracao_minutos, $data_lancamento, $sinopse, $id_filme);
        if ($stmt->execute()) {
            $mensagem = "Filme atualizado com sucesso!";
            $tipo = "success";
        } else {
            $mensagem = "Erro ao atualizar filme: " . $stmt->error;
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
    <title>Telefilms - Resultado da Alteração</title>
    <link rel="stylesheet" href="estilo_filmes.css">
</head>
<body>
    <div class="container">
        <h1>Resultado da Alteração</h1>

        <div class="alert-message alert-<?php echo $tipo; ?>">
            <?php echo $mensagem; ?>
        </div>

        <nav class="nav-bar">
            <a href="cadastro_filme.html" class="nav-link">Cadastrar Novo Filme</a>
            <a href="consultar_filme.php" class="nav-link">Voltar ao Catálogo</a>
        </nav>
    </div>
</body>
</html>