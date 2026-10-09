<?php
require_once "conexao.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: consultar_filme.php");
    exit();
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM filmes WHERE id_filme = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<link rel='stylesheet' href='estilo_filmes.css'><div class='container'><div class='alert-message alert-error'>Filme não encontrado!</div></div>";
    exit();
}

$filme = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Telefilms - Editar Filme</title>
    <link rel="stylesheet" href="estilo_filmes.css">
</head>
<body>
    <div class="container">
        <h1>Editar Filme</h1>

        <nav class="nav-bar">
            <a href="cadastro_filme.html" class="nav-link">Cadastrar Filme</a>
            <a href="consultar_filme.php" class="nav-link">Voltar ao Catálogo</a>
        </nav>

        <form action="salvar_alteracao_filme.php" method="POST">
            <input type="hidden" name="id_filme" value="<?php echo $filme['id_filme']; ?>">

            <div class="form-row">
                <div class="form-group">
                    <label for="titulo">Título do Filme *</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($filme['titulo']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="genero">Gênero *</label>
                    <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($filme['genero']); ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="diretor">Diretor *</label>
                    <input type="text" id="diretor" name="diretor" value="<?php echo htmlspecialchars($filme['diretor']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="duracao_minutos">Duração (minutos)</label>
                    <input type="number" id="duracao_minutos" name="duracao_minutos" value="<?php echo $filme['duracao_minutos']; ?>">
                </div>

                <div class="form-group">
                    <label for="data_lancamento">Lançamento</label>
                    <input type="date" id="data_lancamento" name="data_lancamento" value="<?php echo $filme['data_lancamento']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse</label>
                <textarea id="sinopse" name="sinopse" rows="4"><?php echo htmlspecialchars($filme['sinopse']); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>