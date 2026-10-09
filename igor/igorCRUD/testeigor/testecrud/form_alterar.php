<?php
include("conexao.php");

$idfilme = $_GET['idfilme'];
$sql = "SELECT * FROM filmes WHERE idfilme = $idfilme";
$resultado = mysqli_query($conexao, $sql);
$filme = mysqli_fetch_assoc($resultado);

if (!$filme) {
    die("Filme não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Filme</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h1>Alterar Filme</h1>
        <form action="salvar_alteracao.php" method="POST">
            <input type="hidden" name="idfilme" value="<?php echo $filme['idfilme']; ?>">

            <label for="nome">Nome do Filme:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($filme['nome']); ?>" required>

            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($filme['genero']); ?>" required>

            <label for="data_lancamento">Data de Lançamento:</label>
            <input type="date" id="data_lancamento" name="data_lancamento" value="<?php echo $filme['data_lancamento']; ?>" required>

            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" value="<?php echo htmlspecialchars($filme['diretor']); ?>" required>

            <button type="submit" class="btn">Salvar Alterações</button>
        </form>
        <div class="nav-links">
            <a href="consultar.php" class="btn">Cancelar</a>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($conexao); ?>